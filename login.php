<?php
require_once ('functions.php');
include_once 'include/session.php';

if (isset($_SESSION['user'])){
    header('location: cart.php');
}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mobile Shopping Plaza</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Link to font awesome icons CSS -->
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">

  <!-- Vendor CSS Files -->
  <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="image">
                  <span class="d-none d-lg-block">Mobile Shopping Plaza</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                      <?php
                      if(isset($_SESSION['error'])){
                          echo "
          <div class='text-danger text-center'>
            <h5 class='card-title text-center pb-0 fs-4 font-rubik font-size-20'>".$_SESSION['error']."</h5>
          </div>
        ";
                          unset($_SESSION['error']);
                      }
                      if(isset($_SESSION['success'])){
                          echo "
          <div class='text-success text-center'>
            <h5 class='card-title text-center pb-0 fs-4 font-rubik font-size-20'>".$_SESSION['success']."</h5>
          </div>
        ";
                          unset($_SESSION['success']);
                      }
                      ?>
                    <h5 class="card-title text-center pb-0 fs-4 font-rubik font-size-20">Login to Your Account</h5>
                    <p class="text-center small font-rubik font-size-16">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" action="verify.php" method="post" novalidate>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label font-rubik font-size-16">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback  font-rubik font-size-16">Please enter your Email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label  font-rubik font-size-16">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback font-rubik font-size-16">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label font-rubik font-size-16" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100  font-rubik font-size-16" type="submit" name="login">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0 font-rubik font-size-16">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits font-rubik font-size-16">
                Created by <a href="#" class="font-rubik font-size-16">Jerry Code Enterprises</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

