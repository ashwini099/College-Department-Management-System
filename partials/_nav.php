
<?php

 
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/loginsystem">SITYOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/loginsystem/welcome.php">HOME</a>
      </li>
      ';

      if(!$loggedin){
      echo '<li class="nav-item active">
      <a class="nav-link" href="/loginsystem/login.php">LOGIN</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="/loginsystem/signup.php">SIGNUP</a>
    </li>
     ';
      }
      if($loggedin){
      echo '<li class="nav-item active">
        <a class="nav-link" href="/loginsystem/assignment.php">ASSIGNMENTS</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/loginsystem/result.php">RESULTS</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/loginsystem/notice.php">NOTICES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/loginsystem/logout.php">LOGOUT</a>
      </li>';
    }
       
      
    echo '</ul>
  </div>
</nav>'; ?>
