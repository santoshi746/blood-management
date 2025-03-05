<?php
$database = mysqli_connect("localhost","root","","hospital");
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $check1 = "SELECT * FROM register WHERE `username`!= '$username'";
  $result1 = mysqli_query($database,$check1);
  $check2 = "SELECT *FROM register WHERE  `password` != '$password'";
  $result2 = mysqli_query($database,$check2);
  if(mysqli_num_rows($result1)>0){
    echo '<script>alert("User not exist");</script>';
  }else if(mysqli_num_rows($result2)>0){
    echo '<script>alert("User not exist");</script>';
  }else{
    echo "<script> window.location.assign('add-blood-sample.php'); </script>";
  }
}
if(!$database){
  die('Connection failed: ' . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <link rel="stylesheet" href="login.css">
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="login-container">
          <h2 class="mb-4 text-center text-light">Login</h2>
          <form id="loginForm" method="POST" action="">
            
            <!-- Username or Email or Mobile Number -->
            <div class="mb-3 form-floating">
              <input type="text" class="form-control" id="username" name="username" placeholder="username" required >
              <label for="username" class="form-label">Username or Email or Mobile Number</label>
              
            </div>
            
            <!-- Password -->
            <div class="mb-3 form-floating">
              <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
              <label for="password" class="form-label">Password</label>
              
              <i class="bi bi-eye" id="eye" onclick="HideAndShow()"></i>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-50 mx-auto d-block" name="login">Login</button>
            <a href="hos.php" class="text-light text-decoration-none">Register here</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

  <!-- Custom JavaScript for Password Toggle -->
   <script>
    function HideAndShow(){
      var password = document.getElementById("password");
      var icon = document.getElementById("eye");
    if(password.type=="password"){
      password.type="text";
      icon.className="bi bi-eye-slash";
    }else{
      password.type="password";
      icon.className="bi bi-eye";
    }
    }
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html>
