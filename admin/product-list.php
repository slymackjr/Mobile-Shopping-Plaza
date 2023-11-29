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
        <h1>Product List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Manage Products</li>
                <li class="breadcrumb-item active">Product List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <a href="add-product.php" ">
                        <button type="submit" name="cid" class="btn btn-outline-success"><i class="bi bi-plus"></i>Add Product</button>
                        </a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $now = date('Y-m-d H:i:s');
                                foreach($product->getData() as $row){
                                    $image = (!empty($row['item_image'])) ? '.'.$row['item_image'] : '../assets/products/noimage.jpg';
                            ?>
                          <tr>
                            <td><?php echo htmlentities($row['item_name']);?></td>
                            <td>
                              <img src='<?php echo $image;?>' height='30px' width='30px'>
                            </td>
                            <td><?php echo htmlentities($row['item_brand']);?></td>
                            <td>&#36; <?php echo htmlentities($product->number_format_short($row['item_price'], 2));?></td>
                            <td><?php echo htmlentities($row['quantity']);?></td>
                            <td>
                                <form method="post" action="product-details.php">
                                    <button type="submit" name="user" class="btn btn-outline-secondary" value="<?php echo htmlentities($row['item_id']);?>">View Details</button>
                                </form>
                                <form method="post" action="#">
                                    <button type="submit" name="user" class="btn btn-outline-success" value="<?php echo htmlentities($row['item_id']);?>">Delete Product</button>
                                </form>
                            </td>
                          </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

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
