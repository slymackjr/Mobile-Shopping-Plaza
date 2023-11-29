<?php

// require functions.php file
require ('../functions.php');

// check session if valid
include ('include/session.php');

include ('include/head.php');

include ('include/top-navbar.php');

include ('include/sidebar_users.php');

$rows = [];
if(!isset($_POST['user'])){
    header('location: users.php');
    exit();
}
else{
    $rows = $users->getRegisteredUserData($_POST['user']);
}

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>User Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlentities($rows['name'])?>'s Cart</h5>
                        <a href="users.php" ">
                        <button type="submit" name="cid" class="btn btn-outline-success"><i class="bi bi-arrow-left"></i>Users</button>
                        </a>

                        <table class="table datatable">
                            <tbody>
                                <tr>
                                    <th scope="row"><b>UserId</b></th>
                                    <td><p><?php echo htmlentities($rows['id']);?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Name</b></th>
                                    <td><p><?php echo htmlentities($rows['name']);?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Username</b></th>
                                    <td><p><?php echo htmlentities($rows['username']);?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Email</b></th>
                                    <td><p><?php echo htmlentities($rows['email']);?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Address</b></th>
                                    <td><p><?php echo htmlentities($rows['address']);?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Contact Info</b></th>
                                    <td><p><?php echo htmlentities($rows['contact_info']);?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Created On</b></th>
                                    <td><p><?php echo htmlentities($rows['created_on']);?></p>
                                    </td>
                                </tr>
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
