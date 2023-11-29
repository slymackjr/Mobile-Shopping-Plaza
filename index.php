<?php
ob_start();
//include header.php file
include_once ('header.php');
?>

<?php

/* include banner area */
include_once ('Template/_banner-area.php');
/* include banner area end */

/* include top sale */
include_once ('Template/_top-sale.php');
/* include top sale end */

/* include special price */
include_once ('Template/_special-price.php');
/* include special price end */

/* include banner-ads */
include_once ('Template/_banner-ads.php');
/* include banner-ads end */

/* include new phones */
include_once ('Template/_new-phones.php');
/* include new phones end */

/* brands slider */
include_once ('Template/brands-slider.php');
/* end of brand slider*/

/* include blogs */
include_once ('Template/_blogs.php');
/* include blogs end */


?>

<?php
//include footer.php file
include_once ('footer.php');
?>
