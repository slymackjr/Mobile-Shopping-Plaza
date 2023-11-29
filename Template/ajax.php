<?php
// require MYSQL connection
require('../database/DBController.php');

// require Product.php class for fetching product data from database
require('../database/Product.php');

//DBController object
 $db = new DBController();

//product object
$product = new Product($db);

if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}
