<?php
// require functions.php file
require ('../functions.php');

// check session if valid
include ('include/session.php');

include ('include/head.php');

include ('include/top-navbar.php');

include ('include/sidebar_contact_details.php');

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Contact Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Contact Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Details</h5>
                        <?php
                        $messageId = intval($_POST['cid']);
                        if (!empty($contact->getContactsInfo($messageId))):
                        foreach ($contact->getContactsInfo($messageId) as $info):
                        ?>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Full Name</div>
                            <div class="col-lg-9 col-md-8"><?php echo htmlentities($info['FullName']);?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">IP Address</div>
                            <div class="col-lg-9 col-md-8"><?php echo htmlentities($info['UserIp']);?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Phone Number</div>
                            <div class="col-lg-9 col-md-8"><?php echo htmlentities($info['PhoneNumber']);?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Email id</div>
                            <div class="col-lg-9 col-md-8"><?php echo htmlentities($info['EmailId']);?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Posting Date</div>
                            <div class="col-lg-9 col-md-8"><?php echo htmlentities($info['PostingDate']);?>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <tbody>
                                    <tr>
                                        <th scope="row"><b>Subject</b></th>
                                        <td><p><?php echo htmlentities($info['Subject']);?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><b>Message</b></th>
                                        <td><p><?php echo htmlentities($info['Message']);?></p>
                                        </td>
                                    </tr>
                                    <?php
                                    if (!empty($contact->getAdminRemarks($messageId))):
                                        foreach ($contact->getAdminRemarks($messageId) as $remarks):
                             ?>
                                    <tr>
                                        <th scope="row"><b>Admin Remarks</b></th>
                                        <td><p><?php echo htmlentities($remarks['adminRemark']);?>
                                            <br>
                                            <b>Remark Date :</b><?php echo htmlentities($remarks['remarkDate']);?>
                                            </p>
                                        </td>
                                    </tr>
                            <?php
                            endforeach;
                            endif;
                            ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                    <?php
                endforeach;
                endif;
                ?>
                    <div class="text-center card-body">
                        <form method="post" action="add-remark.php">
                        <button type='submit' name="addRemark" value="<?php echo $_POST['cid'];?>" class='btn btn-outline-warning btn-lg'>Add Remark</button>
                        </form>
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
