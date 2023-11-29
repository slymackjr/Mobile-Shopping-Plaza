<?php
ob_start();
//include header.php file
include_once ('header.php');
?>
<?php
if (isset($_SESSION['user'])):
/* include cart item if it is not empty */
count($Cart->getCartData($_SESSION['user'],'cart')) ? include ('Template/_cart-template.php') : include ('Template/notFound/_cart_notFound.php');
/* include cart item if it is not empty end */

/* include wishlist-template section */
count($Cart->getCartData($_SESSION['user'],'wishlist')) ? include ('Template/_wishlist_template.php') : include ('Template/notFound/_wishlist_notFound.php');
/* include wishlist-template section end */

/* include new phones section */
include ('Template/_new-phones.php');
/* include new phone section end */

?>
<?php
//include footer.php file
include ('footer.php');
else:
    header('location: login.php');
endif;
?>



