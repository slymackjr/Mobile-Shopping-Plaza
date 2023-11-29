<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link to Local Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Link to Local Owl Carousel CSS -->
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <!-- Link to Local Default Theme CSS (optional) -->
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <!-- Link to font awesome icons CSS -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!-- customized style css-->
    <link rel="stylesheet" href="style.css">
    <?php
    // require functions.php file
    require_once ('functions.php');
    require_once ('include/session.php')
    ?>
</head>
<body>

<!-- header section-->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-2 bg-light">
        <p class="font-rale font-size-12 text-black-50 m-0">Dar es Salaam Kinondoni Kawe st. Maluma town (+255)767413968</p>
        <div class="font-rale font-size-14">
            <a href="contactform/index.php" class="px-3 border-right border-left text-dark" style="text-decoration-line: none"><i class="fas fa-phone"></i> Contact Us</a>
            <?php
            if (isset($_SESSION['user'])):
            ?>
                <span class="px-3 border-right border-left text-dark"><strong><?php echo $userResult['name'];?></strong></span>
                <?php
                else:
                ?>
            <a href="login.php" class="px-3 border-right border-left text-dark" style="text-decoration-line: none"><i class="fas fa-arrow-up-right-from-square"></i> Login</a>
                <?php
                endif;
                ?>
            <a href="cart.php" class="px-3 border-right text-dark" style="text-decoration-line: none"><i class="fas fa-heart"></i> Wishlist (0)</a>
        </div>
    </div>
    <div class="strip d-flex justify-content-between px-4 py-2 bg-light">
        <div class="font-rale font-size-14">
            <?php
            if(isset($_SESSION['error'])){
                echo "
	        					<div class='ale alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
                unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>

    <!-- primary navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Mobile Shopping Plaza</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">On Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products<i class="fas fa-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Category<i class="fas fa-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Coming Soon</a>
                    </li>
                </ul>
                <form action="#" class="font-size-14 font-rale">
                    <a href="cart.php" class="py-2 rounded-pill color-primary-bg" style="text-decoration-line: none">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light">
                        <?php
                        if (isset($_SESSION['user'])):
                            echo count($Cart->getCartData($_SESSION['user'],'cart'));
                        else:
                            echo 0;
                        endif;?>
                        </span>
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <!-- end of primary navigation-->

</header>
<!-- header section end-->

<!-- main site-->
<main id="main-site">