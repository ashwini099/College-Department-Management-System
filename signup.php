 <?php
 session_start();
 $showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
  include 'partials/_dbconnect.php';
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  
  // Check whether this email exists
  $existSql = "SELECT * FROM `users` WHERE email = '$email'";
 
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
    $showError = "Username Already Exists";
  }
  else{
    if(($password==$cpassword)){
      $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql="INSERT INTO `users` (`fname`,`lname`,`email`, `password`, `dt`) VALUES ('$fname','$lname','$email', '$hash', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if($result){
      // $showAlert=true;
      $_SESSION['status']= '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account has been created You may now login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    header("location:login.php");
      
    }
  }
  else{
    $showError="Password do not match";
  }
}}

?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup</title>
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">



  </head>
  <body>
  <?php require 'partials/_nav.php'?>
  <?php
if($showError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error!</strong> '. $showError.'
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 ';}
?>
<div class="col-md-4 col-md-offset-4" id="login">
						<section id="inner-wrapper" class="login">
							<article>
								<form action="/loginSystem/signup.php" method="post">
  <div class="row g-3 form-group">
  <div class="col input-group">
    <input type="text" class="form-control" maxlength="100" id="fname" 
      name="fname" for="fname"placeholder="First name" aria-label="First name">
  </div>
  <div class="col">
    <input type="text" class="form-control" maxlength="50" id="lname" 
                      name="lname" for="lname"placeholder="Last name" aria-label="Last name">
  </div>
</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
											<input type="email" class="form-control"  maxlength="35" id="email" 
                      name="email" for="email" placeholder="Email Address">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"> </i></span>
											<input type="password" class="form-control"  maxlength="23" id="password" placeholder="Password" name="password">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"> </i></span>
											<input type="password" class="form-control" id="cpassword" name="cpassword" for="cpassword" placeholder="Confirm Password">
										</div>
									</div>
									  <button type="submit" class="btn btn-success btn-block">Signup</button>
                    <div class="text-center ">
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php"
                class="link-danger">Login</a></p>
          </div>
								</form>
							</article>
						</section></div>
<!-- Footer -->
<footer class="text-center text-lg-start bg-black text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="https://www.facebook.com/sityogaurangabad" class="btn btn-outline-light btn-floating m-1" role="button">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg>
      </a>
      <a href="https://www.youtube.com/channel/UCqLpIqvF3GldPpZWso6AIlg" class="btn btn-outline-light btn-floating m-1" role="button">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
</svg>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-secondary"></i>SITYOG INSTITUTE OF TECHNOLOGY
          </h6>
          <p>
          Sityog Institute of Technology, Aurangabad, established in 2002, 
          is a prestigious engineering institute approved by 
          AICTE, CSAB, AKU, and State Board of Technical Education.
             
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            COURSES
          </h6>
          <p>
            <a href="#!" class="text-reset text-decoration-none">B.TECH</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none">BCA/BBA</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none">DIPLOMA</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none">ITI</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="http://akubihar.ac.in/" class="text-reset text-decoration-none" target="_blank">AKU University</a>
          </p>
          <p>
          <a href="http://sityog.edu.in/" class="text-reset text-decoration-none" target="_blank">SIT College</a>
          </p>
          <p>
            <a href="/loginsystem/signup.php" class="text-reset text-decoration-none">signup</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i>Growth Center, Jasoiya More, 
           Aurangabad,
           Bihar - 824102</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            sityog@gmail.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i>+91-9308392306</p>
          <p><i class="fas fa-print me-3 text-secondary"></i> +91-9102318888</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © <?php $year=date("Y");
    echo $year?> Copyright:
    <a class="text-reset fw-bold" href="http://sityog.edu.in/" target="_blank">sityog.edu.in</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>