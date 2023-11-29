<?php

// require MYSQL connection
require_once('database/DBController.php');

// require Product.php class for fetching product data from database
require_once('database/Product.php');

// require Cart.php class
require_once('database/Cart.php');

// require Contact.php class
require_once('database/Contact.php');

// require Users.php class
require_once ('database/Users.php');

//DBController object
$db = new DBController();

//product object
$product = new Product($db);
$product_shuffle = $product->getData();

//cart object
$Cart = new Cart($db);

// Contact object
$contact = new Contact($db);

// Users object
$users = new Users($db);


