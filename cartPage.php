<?php
session_start();
	$connect = new mysqli('localhost','root','teamVERM123!','efc');
  if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
       $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
       if(!in_array($_GET["id"], $item_array_id))
       {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                 'item_id'               =>     $_GET["id"],
                 'item_name'               =>     $_POST["hidden_name"],
                 'item_price'          =>     $_POST["hidden_price"],
                 'item_quantity'          =>     $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
       }
       else
       {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="cartPage.php"</script>';
       }
  }
  else
  {
       $item_array = array(
            'item_id'               =>     $_GET["id"],
            'item_name'               =>     $_POST["hidden_name"],
            'item_price'          =>     $_POST["hidden_price"],
            'item_quantity'          =>     $_POST["quantity"],
       );
       $_SESSION["shopping_cart"][0] = $item_array;
  }
}
if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
       foreach($_SESSION["shopping_cart"] as $keys => $values)
       {
            if($values["item_id"] == $_GET["id"])
            {
                 unset($_SESSION["shopping_cart"][$keys]);
                 echo '<script>alert("Item Removed")</script>';
                 echo '<script>window.location="cartPage.php"</script>';
            }
       }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head lang="en">
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width">
				<link rel="stylesheet" type="text/css" href="/html/navbar.css">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<title>Your Cart</title>

<style>
html, body, {
		width:100%;
		height:100%;
}
.products-container{
	max-width:650px;
	justify-content:space-between;
	margin: 0 auto;
	margin-top: 100px;
	display:flex;
	flex-wrap:wrap;
	padding-bottom: 50px;
}

.products-header{
	width:100%;
	max-width: 750px;
	display: flex;
	justify-content: flex-start;
	margin: 0 auto;
	border-bottom: 4px solid purple;
	font-size: 25px;
	border-radius: 5px;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
.product-title{
	width: 45%;
}
.products img{
	width:25%;
}
.products{
	display: flex;
	width: 100%;
	flex-wrap: wrap;
}
.product{
	width: 45%;
	display: flex;
	justify-content: space-around;
	align-items: center;
	padding: 10px 0;
}
.price{
	display: flex;
	width: 15%;
	align-items: center;
}
.quantity{
	display: flex;
	width: 15%;
	align-items: center;
}
.check-price{
	display:flex;
	width:10%;
	align-items: center;
}
.remove-btn{
	display:flex;
	width:20%;
	align-items: center;
}
.basketTotalContainer{
	display: flex;
	justify-content: flex-end;
	width: 100%;
	padding: 10px 0;
	border-top: 4px solid purple;
	border-radius: 5px;
}
.Title{
	width:50%;
}
.cartTotal{
	width:10%;
}

.shipping{
	display: flex;
	justify-content:flex-end;
	width: 100%;
	padding: 10px 0;
}

.backtocart-btn {
	background-color: black;
	color: white;
	width: 145px;
	height: 33px;
	padding: 10px 8px;
	border: none;
	cursor: pointer;
	text-align: center;
}

.backtocart-btn:hover {
	background-color: purple;
}

#thistext{
	text-align:right;
	font-size:80%;
	font:small-caption;
}
#thisbutton{
	background-color: black;
	color: white;
	padding: 18px 30px;
	border: none;
	cursor: pointer;
}
#thisbutton:hover{
	background-color: purple;
}
	a {
		text-decoration: none;
	}
	.tab {
		display: inline-block;
		margin-left: 280px;
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
    <div class="products-container">
         <div class="products-header">
					 <h5 class="product-title">PRODUCT(S)</h5>
					 <h5 class="price">Price</h5>
					 <h5 class="quantity">Quantity</h5>
				 </div>
        	<?php
          	if(!empty($_SESSION["shopping_cart"]))
              {
                $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values)
              {
              ?>
        <div class="products">
                   <div class="product">
										 <span><?php echo $values["item_name"]; ?><span>
									 </div>
									 <div class="price">$ <?php echo $values["item_price"]; ?></div>
                   <div class="quantity"><?php echo $values["item_quantity"]; ?></div>
                   <div class="remove-btn"><a href="cartPage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove Item</span></a></div>
								 </div>
              <?php
                      $total = $total + ($values["item_quantity"] * $values["item_price"]);
                   }
              ?>
							<div class="basketTotalContainer">
                   <h4 class="Title">Your total</h4>
                   <h4 class="cartTotal">$<?php echo number_format($total, 2); ?></h4>
              </div>
							<button onclick="location.href = '/html/allProductsPage.php';" class="backtocart-btn">Back to Products</button>
							<button onclick="location.href = '/html/checkout/paymentPage.html';" class="backtocart-btn">Pay</button>
              <?php
              }
              ?>
    </div>
  </body>
	<footer style='text-align: center;'>
    <p><a href="/html/infoPages/faq.html">FAQ</a><span class="tab"><a href="/html/infoPages/contact.html">Contact Us</a><span class="tab"><a href="/html/infoPages/return.html">Return Policy</a></p>
    </div>
  </footer>
  <span class="message">
    <p style="text-align: center;">ElectronicsForCheap Ltd.</p>
  </span>
</html>
