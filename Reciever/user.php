<?php
$database = mysqli_connect("localhost","root","","hospital");
if(isset($_POST['submit'])){
  $id = $_POST['Id'];
  $fname = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $mobileNo = $_POST['mobileNo'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $blood = $_POST['bloodGroup'];
  $aadhar = $_POST['aadharNo'];
  $check1 = "SELECT * FROM user WHERE `mobileNo`='$mobileNo' AND `email`='$email' AND `aadharNo`='$aadhar'";
  $result1 = mysqli_query($database,$check1);
  if(mysqli_num_rows($result1)>0){
    echo "<script>alert('user already exists');</script>";
  }else{
    $sql = "INSERT INTO user(`Id`, `firstName`, `lastName`, `mobileNo`, `email`,`username`,`password`, `address`, `bloodGroup`, `aadharNo`)VALUES
    ('$id','$fname','$lastName','$mobileNo','$email','$username','$password','$address','$blood','$aadhar')";
    $result = mysqli_query($database,$sql);
    if($result){
      echo "submitted successfully";
      echo "<script>window.location.assign('avail-blood-sample.php');</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Donation Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Custom CSS -->
 <link rel="stylesheet" href="user.css">
</head>
<body>

<div class="container">
  <div class="form-container">
    <h2 class="mb-4 text-light text-center">Blood Donation Form</h2>
    <form id="bloodDonationForm" method="POST" onsubmit="return validateForm()">
      <div class="row">
        <input type="hidden" name="Id">
        <div class="mb-3 col-6 mb-lg-12 form-floating">
          <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Firstname" required>
          <label for="firstName" class="form-label">First Name:</label>
        </div>
        <div class="mb-3 col-6 mb-lg-12 form-floating">
          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Lastname" required>
          <label for="lastName" class="form-label">Last Name:</label>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-6 mb-lg-12 form-floating">
          <input type="tel" class="form-control" id="mobileNo" name="mobileNo" pattern="[0-9]{10}" placeholder="mobileno" required>
          <label for="mobileNo" class="form-label">Mobile Number:</label>
        </div>
        <div class="mb-3 col-6 mb-lg-12 form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
          <label for="email" class="form-label">Email ID:</label>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-6 mb-lg-12 form-floating">
          <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
          <label for="username" class="form-label">Username:</label>
        </div>
        <div class="mb-3 col-6 mb-lg-12 form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
          <label for="password" class="form-label">Password:</label>
        </div>
      </div>
      <div class="mb-3 form-floating">
        <textarea class="form-control" id="address" name="address" rows="3" placeholder="address" required></textarea>
        <label for="address" class="form-label">Address:</label>
      </div>
      <div class="row">
        <div class="mb-3 col-6 mb-lg-12 form-floating">
          <label for="bloodGroup" class="form-label">Blood Group:</label>
          <select class="form-select" id="bloodGroup" name="bloodGroup" required>
            <option value=""></option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
        </div>
        <div class="mb-3 col-6 mb-lg-12 form-floating">
          <input type="text" class="form-control" id="aadharNo" name="aadharNo" pattern="[0-9]{12}" placeholder="aadhar" required>
          <label for="aadharNo" class="form-label">Aadhar Number:</label>
        </div>
      </div>
      <button type="submit" class="btn btn-success w-50 d-block mx-auto" name="submit">Submit</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>


<!-- Custom JavaScript for form validation -->
<script>
  function validateForm() {
    // Basic form validation example (you can extend this as needed)
    var form = document.getElementById('bloodDonationForm');
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
      return false;
    }
    return true;
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
