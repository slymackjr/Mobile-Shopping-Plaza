<?php
// require functions.php file
require ('../functions.php');

// check session if valid
include ('include/session.php');

include ('include/head.php');

include ('include/top-navbar.php');

include ('include/sidebar_product_list.php');

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Product Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Manage Products</li>
                <li class="breadcrumb-item">Product List</li>
                <li class="breadcrumb-item active">Product Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product Details</h5>
                        <a href="product-list.php">
                            <button type="submit" name="cid" class="btn btn-outline-success"><i class="bi bi-arrow-left"></i>Product List</button>
                        </a>
                        <div class="text-center">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Product Details</h5>
                                </div>
                                <?php
                                $details = $product->getProductFullDetails($_POST['user'])
                                ?>
                                <!-- General Form Elements -->
                                <form method="post" action="edit-product.php" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label fw-bolder">Product Brand</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="brand" value="<?php echo htmlentities($details['item_brand']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label fw-bolder">Product Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="<?php echo htmlentities($details['item_name']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Product Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="price" value="<?php echo htmlentities($details['item_price']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Quantity</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="quantity" value="<?php echo htmlentities($details['quantity']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Shipping Charge</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="shipping" value="<?php echo htmlentities($details['shipping_charge']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Product Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="formFile" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Product Memory</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="memory" value="<?php echo htmlentities($details['item_memory']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Product Storage</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="storage" value="<?php echo htmlentities($details['item_storage']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Product Resolution</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="resolution" value="<?php echo htmlentities($details['item_resolution']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Product Camera</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="camera" value="<?php echo htmlentities($details['item_camera']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Product Processor</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="processor" value="<?php echo htmlentities($details['item_processor']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label fw-bolder">Product Battery</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="battery" value="<?php echo htmlentities($details['item_battery']);?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label fw-bolder">Date Registered</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" value="<?php echo htmlentities($details['item_register']);?>" disabled>
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary fw-bolder" name="submit">Edit Product</button>
                                            <input type="hidden" name="id" value="<?php echo htmlentities($details['item_id']);?>">
                                        </div>
                                    </div>
                                </form><!-- End General Form Elements -->
                            </div>
                            <?php
                            if(isset($_SESSION['error'])){
                                echo "
                            <div class='alert alert-danger bg-danger text-light border-0 alert-dismissible fade show' role='alert'>
                            ".$_SESSION['error']."
                            <button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                                ";
                                unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['success'])){
                                echo "
                             <div class='alert alert-success bg-success text-light border-0 alert-dismissible fade show' role='alert'>
                            ".$_SESSION['success']."
                            <button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                                ";
                                unset($_SESSION['success']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        JerryCode's <strong><span>Enterprises</span></strong>.
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Developed by <a href="https://bootstrapmade.com/">JerryCode</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
