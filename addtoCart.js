let carts = document.querySelectorAll('.add-to-cart-btn');

let products =[
  {
    name: 'Acer Spin',
    price: 69.99,
    tag: 'acerspin',
    inCart: 0
  },
  {
    name: 'Chromebook',
    price: 49.98,
    tag: 'chromebook',
    inCart: 0
  },
  {
    name: 'Dell Insperion',
    price: 119.99,
    tag: 'dellinsperion',
    inCart: 0
  },
  {
    name: 'Macbook Air 13 Inch',
    price: 549.99,
    tag: 'macbookair13inch',
    inCart: 0
  },
  {
    name: 'Iphone X',
    price: 329.99,
    tag: 'iphonex',
    inCart: 0
  },
  {
    name: 'Iphone XR',
    price: 229.99,
    tag: 'iphonexr',
    inCart: 0
  },
  {
    name: 'Galaxy Note 10',
    price: 439.99,
    tag: 'galaxynote10',
    inCart: 0
  },
  {
    name: 'Galaxy S20',
    price: 519.99,
    tag: 'galaxys20',
    inCart: 0
  },
  {
    name: 'Samsung Curved 55 Inch',
    price: 339.59,
    tag: 'samsung_curved55Inch',
    inCart: 0
  },
  {
    name: 'Samsung Q70 65 Inch',
    price: 699.95,
    tag: 'samsung_Q70_65Inch',
    inCart: 0
  },
  {
    name: 'Airpods Pro',
    price: 89.99,
    tag: 'airpodsPro',
    inCart: 0
  },
  {
    name: 'Apple Watch',
    price: 125.49,
    tag: 'applewatch',
    inCart: 0
  },
]

for (let i=0; i<carts.length; i++){
  carts[i].addEventListener('click', () => {
    cartNum(products[i]);
    totalCost(products[i])
  })
}

function onloadCartNum(){
  let productNum = localStorage.getItem('cartNum');

  if(productNum){
    document.querySelector('.cart-icon span').textContent = productNum;
  }
}

function cartNum(products){
  let productNum = localStorage.getItem('cartNum');

  productNum = parseInt(productNum);

  if(productNum){
    localStorage.setItem('cartNum',productNum + 1);
    document.querySelector('.cart-icon span').textContent = productNum +  1;

  } else{
    localStorage.setItem('cartNum',1);
    document.querySelector('.cart-icon span').textContent = 1;
  }

  setItems(products);

}

function setItems(products){
  let cartItems = localStorage.getItem('productsInCart');
  cartItems = JSON.parse(cartItems);

  if(cartItems != null) {

    if(cartItems[products.tag] == undefined ){
      cartItems = {
        ...cartItems,
        [products.tag]: products
      }
    }
    cartItems[products.tag].inCart += 1;
  } else{
    products.inCart = 1
    cartItems = {
      [products.tag]:products
    }
  }
  localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(products){
  //console.log("The product price is", products.price);
  let cartValue = localStorage.getItem('totalCost');

  console.log("My cart costs", cartValue);
  console.log(typeof cartValue);

  if(cartValue != null){
    cartValue = parseInt(cartValue);
    localStorage.setItem("totalCost", cartValue + products.price);
  } else{
    localStorage.setItem("totalCost",products.price);
  }

}

function displayCart(){
  let cartValue = localStorage.getItem('totalCost');

  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);
  let productContainer = document.querySelector(".products");
  if(cartItems && productContainer){
    productContainer.innerHTML = '';
    Object.values(cartItems).map(item => {
      productContainer.innerHTML += `
      <div class="product">
        <img src="../products/productPictures/${item.tag}.jpeg">
        <span>${item.name}</span>
      </div>
      <div class="price"><span>$${item.price}</span></div>
      <div class="quantity"><span>${item.inCart}</span></div>
      `
    });
    productContainer.innerHTML += `
      <div class="basketTotalContainer">
        <h4 class="Title">Your total</h4>
        <h4 class="cartTotal">$${cartValue}</h4>
      </div>
    `;
  }
}

onloadCartNum();
displayCart();
