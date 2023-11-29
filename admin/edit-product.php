<?php
// require functions.php file
require ('../functions.php');

// check session if valid
include ('include/session.php');

if (isset($_POST['submit'])){
    $product->updateProductInfo($_POST['submit'],$_POST['id'],$_POST['brand'],$_POST['name'],$_POST['filename'],$_POST['price'],$_POST['quantity'],$_POST['memory'],$_POST['storage'],$_POST['resolution'],$_POST['camera'],$_POST['processor'],$_POST['battery'],$_POST['availability'],$_POST['shipping'],$_POST['date']);
}else {

}
