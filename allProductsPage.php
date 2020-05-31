<?php
session_start();
$connect = new mysqli('localhost','root','teamVERM123!','efc');
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="/html/navbar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>All Products</title>

	<style>
		* {
			box-sizing: border-box;
			font-family: Raleway;
		}

		html,
		body {
			margin: 0;
			padding: 0;
			min-height: 100%;
		}

		.content-section {
			margin: 2em;
		}

		.tab {
			display: inline-block;
			margin-left: 280px;
		}

		a {
			text-decoration: none;
		}

		.shop-container{
			display: grid;
  		grid-template-columns: repeat(4, 1fr);
			justify-content: space-between;
		}
		.form-control{
			width: 70px;
			height: 25px;
		}
		.add-to-cart-btn {
			background-color: black;
			color: white;
			width: 145px;
			height: 33px;
			padding: 10px 8px;
			border: none;
			cursor: pointer;
		}

		.add-to-cart-btn:hover {
			background-color: purple;
		}

		.shop-item {
			margin: 20px;
			width: 280px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			padding: 16px;
			text-align: center;
			background-color: white;
		}

		.shop-item-title {
			display: block;
			width: 100%;
			text-align: center;
			font-weight: bold;
			font-size: 2em;
			color: #333;
			margin-bottom: 10px;
			margin-left: 10px;

		}

		.shop-item-image {
			height: 120px;
		}

		.shop-item-details {
			display: grid;
			align-items: center;
			padding: 5px;
		}

		.shop-item-price {
			color: #333;
			font-size: 1.6em;
		}

	</style>
	<nav class="navbar">
		<div class="container">
			<div class="logo_div">
				<a href= "/html/index.html"><img src="logo.jpeg" alt="" class="logo"></a>
			</div>

		<div class="navbar_links">
			<ul class="menu">
			<li><a href="/html/index.html">Home</a></li>
			<li><a href="/html/allProductsPage.php">Products</a></li>
			<li><a href="/html/infoPages/aboutPage.html">About</a></li>
			<li><a href="/html/loginPages/loginPage.html">Login</a></li>
			<li class="cart-icon">
						<a href="/html/cartPage.php">
						<i class="fa fa-shopping-cart" style="font-size:20px;color:white"></i><span></span>
						</a>
						</li>
				</ul>
		</div>
	</div>
	</nav>
</head>
<body>
       <br />
       <div class="shop-container">
            <?php
            $query = "SELECT * FROM products ORDER BY id ASC";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                 while($row = mysqli_fetch_array($result))
                 {
            ?>
            <div class="shop-items">
                 <form method="post" action="cartPage.php?action=add&id=<?php echo $row["id"]; ?>">
									 <div style="border:0px solid #333; background-color:white; border-radius:0px; padding:0px;" align="center">
										 <div class="shop-item-details">
										 <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br/>
										 <a href='<?php echo $link; ?>'><b><?php echo $title; ?></b></a>
												<div class="shop-item-title"> <h4 class="text-info"><?php echo $row["name"]; ?></h4> </div>
												<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
												<input type="text" name="quantity" class="form-control" value="1" />
												<div class="shop-item-price"><input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" /></div>
												<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
         								<input type="submit" name="add_to_cart" style="margin-top:5px;" class="add-to-cart-btn" value="Add to Cart" />
			 									</div>
								 </div>
                 </form>
            </div>
            <?php
                 }
            }
            ?>
            <div style="clear:both"></div>
            <br />
       </div>
       <br />
  </body>
	<footer style='text-align: center;'>
    <p><a href="/html/infoPages/faq.html">FAQ</a><span class="tab"><a href="/html/infoPages/contact.html">Contact Us</a><span class="tab"><a href="/html/infoPages/return.html">Return Policy</a></p>
    </div>
  </footer>
  <span class="message">
    <p style="text-align: center;">ElectronicsForCheap Ltd.</p>
  </span>
</html>
