<?php
session_start();
 $login=false;
 $showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
  include 'partials/_dbconnect.php';
  $email=$_POST["email"];
  $password=$_POST["password"];
    $sql="Select * from users where email='$email'";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    if($num == 1){
      while($row=mysqli_fetch_assoc($result)){
      
        if (password_verify($password, $row['password'])){ 
      $login=true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['email']=$email;
     
      header("location:welcome.php");
      if($email==="admin@gmail.com"){
        header("location:admin.php");
        
      }
    }else{
      $showError="Invalid Credential";
    }
  
  
  }}
  
  else{
    $showError="Invalid Credential";
  }
}
?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="login.js"></script>
</head>
  <body>
  <?php require 'partials/_nav.php'?>
  <?php
  if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
  }
  
  if($login){
 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';}
if($showError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error!</strong> '. $showError.'
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 ';}
?>
<form action="/loginSystem/login.php" method="post">
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-black" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-1 mt-md-1 pb-5">

              <div id="add"><h2 class="fw-bold mb-2 text-uppercase">Login</h2></div>
              <div class="form-outline form-black mb-4">
                <input type="email" id="email" name="email"  for="email" class="form-control form-control-lg" placeholder="Email" />
               </div>

              <div class="form-outline form-black mb-4">
                <input type="password" id="password" name="password" for="password" class="form-control form-control-lg" placeholder="Password" />
              </div>

              <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->

              <button class="btn btn-outline-dark btn-lg px-5" type="submit">Login</button>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="signup.php" class="text-black-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
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