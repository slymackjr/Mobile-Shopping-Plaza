<?php
// require functions.php file
require ('../functions.php');

// check session if valid
include ('include/session.php');

include ('include/head.php');

include ('include/top-navbar.php');

include ('include/sidebar_updateadmin_email.php');

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Admin Email</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Manage Contacts</li>
                <li class="breadcrumb-item active">Update Admin Email</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Admin Email</h5>
                        <div class="text-center">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Update Admin Email Here</h5>
                                    <p class="text-center small">Update Email</p>
                                </div>
                                <?php
                                if (!empty($contact->getAdminReceiveEmail())):
                                foreach ($contact->getAdminReceiveEmail() as $receiveEmail):
                                ?>
                                <form class="row g-3 needs-validation" method="post">
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="text" name="email" class="form-control" id="yourEmail" value="<?php echo htmlentities($receiveEmail['emailId']);?>" required>
                                    </div>
                                <?php
                                endforeach;
                                else:
 ?>
                                    <form class="row g-3 needs-validation" method="post">
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="text" name="email" class="form-control" id="yourEmail" required>
                                    </div>
                                    <?php
                                endif;
 ?>
                                    <div class="col-12">
                                        <button class="btn btn-outline-warning" type="submit" name="save" value="save">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['save'])){
                                echo "<div class='col-12 p-3'>
                                    <button type='button' class='btn btn-outline-warning btn-lg'>".
                                    htmlentities($contact->updateAdminEmailId($_POST['email'])).
                                    "</button></div>";
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

