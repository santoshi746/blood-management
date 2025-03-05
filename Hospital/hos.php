<?php
$database = mysqli_connect("localhost","root","","hospital");
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $fname = $_POST['fullName'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $mobile = $_POST['mobileNumber'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $medicalDegree = $_POST['medicalDegree'];
  $specialiy = $_POST['specialty'];
  $medicalLicense = $_POST['medicalLicense'];
  $Yearofexp = $_POST['yearsOfExperience'];
  $check1 = "SELECT * FROM register WHERE `Id`='$id'";
  $result1 = mysqli_query($database,$check1);
  $check2 = "SELECT * FROM register WHERE `email`='$email'";
  $result2 = mysqli_query($database,$check2);
  $check3 = "SELECT * FROM register WHERE `mobileNumber`='$mobile'";
  $result3 = mysqli_query($database,$check3);
  $check4 = "SELECT * FROM register WHERE `medicalLicense`='$medicalLicense'";
  $result4 = mysqli_query($database,$check4);
  if(mysqli_num_rows($result1)>0){
    echo "sorry this user is already added";
  }else if(mysqli_num_rows($result2)>0){
    echo "sorry this user is already added";
  }else if(mysqli_num_rows($result3)>0){
    echo "sorry this user is already added";
  }else if(mysqli_num_rows($result4)>0){
    echo "sorry this user is already added";
  }else{
    $sql = "INSERT INTO `register`(`Id`, `Firstname`, `dateofbirth`, `gender`, `email`, `mobileNumber`,`username`,`password`, `address`, `medicalDegree`, `speciality`, `medicalLicense`, `yearsOfExperience`) VALUES('$id','$fname','$dob','$gender','$email','$mobile','$username','$password','$address','$medicalDegree','$specialiy','$medicalLicense','$Yearofexp')";
    $result = mysqli_query($database,$sql);
    if($result){
      echo " submitted successfully";
      echo "<script> window.location.assign('add-blood-sample.php'); </script>";
    }else{
      echo " error found";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Custom CSS -->
   <link rel="stylesheet" href="hos.css">
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="form-container">
          <h2 class="mb-4 text-center text-light">Doctor Registration Form</h2>
          <form id="doctorRegistrationForm" method="POST"><!-- Personal Information -->
            <h3 class=" text-light">Personal Information</h3>
            <input type="hidden" name="id">
            <div class="row">
            <div class=" col mb-3 form-floating">
              <input type="text" class="form-control" id="fullName" name="fullName" placeholder="fullname" required>
              <label for="fullName" class="form-label">Full Name</label>
            </div>
            <div class="col mb-3 form-floating">
              <input type="date" class="form-control" id="dob" name="dob" placeholder="dob" required>
              <label for="dob" class="form-label">Date of Birth</label>
            </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Gender</label>
              <div class="row">
              <div class="form-check col">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check col">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                <label class="form-check-label" for="female">Female</label>
              </div>
              </div>
            </div>
            <div class="mb-3 form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
              <label for="email" class="form-label">Email</label>
            </div>
            <div class="mb-3 form-floating">
            <input type="number" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="mobile" required>
              <label for="mobileNumber" class="form-label">Mobile Number</label>
              
            </div>
            <div class="row">
            <div class="col mb-3 form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
              <label for="username" class="form-label">username</label>
            </div>
            <div class="col mb-3 form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
              <label for="password" class="form-label">password</label>
            </div>
            </div>
            <div class="invalid-feedback" style="display:block ; color:black">Please enter a valid 10-digit mobile number starting with 9, 8, 7, or 6.</div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            
            <!-- Professional Information -->
            <h3 class="text-light">Professional Information</h3>
            <div class="mb-3 form-floating">
              <input type="text" class="form-control" id="medicalDegree" name="medicalDegree" placeholder="medicaldegree" required>
              <label for="medicalDegree" class="form-label">Medical Degree</label>
            </div>
            <div class="mb-3 form-floating">
              <input type="text" class="form-control" id="specialty" name="specialty" placeholder="specialty" required>
              <label for="specialty" class="form-label">Specialty or Department</label>
            </div>
            <div class="mb-3 form-floating">
              <input type="text" class="form-control" id="medicalLicense" name="medicalLicense" placeholder="medicallicense" required>
              <label for="medicalLicense" class="form-label">Medical License Number</label>
            </div>
            <div class="mb-3 form-floating">
              <input type="number" class="form-control" id="yearsOfExperience" name="yearsOfExperience" placeholder="yearsofexperience" required>
              <label for="yearsOfExperience" class="form-label">Years of Experience</label>
            </div>
           
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary d-block m-auto w-50" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JavaScript for Mobile Number Validation -->
  <script>
    // Form validation using vanilla JavaScript
    (function () {
      'use strict';
      
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation');
      
      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }

            // Validate mobile number
            var mobileNumberInput = document.getElementById('mobileNumber');
            var mobileNumber = mobileNumberInput.value.trim();
            var mobileRegex = /^[6-9]\d{9}$/; // Regex to match 10-digit number starting with 6, 7, 8, or 9

            if (!mobileRegex.test(mobileNumber)) {
              mobileNumberInput.classList.add('is-invalid');
              event.preventDefault();
              event.stopPropagation();
            } else {
              mobileNumberInput.classList.remove('is-invalid');
            }

            form.classList.add('was-validated');
          }, false);
        });
    })();
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
