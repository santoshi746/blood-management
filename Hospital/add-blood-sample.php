<?php
$database = mysqli_connect("localhost","root","","hospital");
if(isset($_POST['add'])){
  $id = $_POST['Id'];
  $name = $_POST['name'];
  $medicalLicense = $_POST['license'];
  $bloodgroup = $_POST['bloodGroup'];
  $donor = $_POST['donorName'];
  $mobile = $_POST['mobile'];
  $check1 = "SELECT * FROM register WHERE `Firstname`='$name'AND `medicalLicense`='$medicalLicense'";
  $result1 = mysqli_query($database,$check1);
  if(mysqli_num_rows($result1)>0){
    $sql = "INSERT INTO `blood_sample`(`Id`, `Doctor_name`, `medicalLicense`, `Donor_name`, `mobile`, `blood`) VALUES ('$id','$name','$medicalLicense','$donor','$mobile','$bloodgroup')";
    $result = mysqli_query($database,$sql);
    if($result){
      echo "<script>alert('Submitted successfully')</script>";
    }else{
      echo "Already existing";
    }
  }else{
    echo "You're not a member of the hospital";
  }
}
?>
<?php
$final = "SELECT * FROM blood_sample";
$res = mysqli_query($database,$final);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="add-blood-sample.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add blood Samples </title>
  </head>
  <body>
    <div class="container">
      <h2>Medical Form</h2>
      <form id="medicalForm" method="POST">
        <input type="hidden" name="Id">
        <h1 class="">Professional information</h1>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="license">Medical License:</label>
          <input type="text" class="form-control" id="license" name="license" required>
        </div>
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
        <h1 >Donor information</h1>
        <div class="form-group">
          <label for="donorName" >Donor Name:</label>
          <input type="text" class="form-control" id="donorName" name="donorName" required>
        </div>
        <div class="form-group">
          <label for="mobile" >Mobile:</label>
          <input type="number" class="form-control" id="mobile" name="mobile" required>
        </div>
        <button type="submit" class="btn btn-primary w-25 d-block mx-auto mt-3" name="add">Add blood sample</button>
        <a href="requested-samples.php" class="text-light"> For Request samples</a>
      </form>
    </div>
   <table class="table table-hover text-light">
    <tr>
      <th>Id</th>
      <th>Doctor name</th>
      <th>Donor name</th>
      <th>Mobile </th>
      <th>Blood sample</th>
      <th>Actions</th>
    </tr>
    <?php
    if(mysqli_num_rows($res)>0){
      while($row = mysqli_fetch_array($res)){
        ?>
         <tr>
            <td>
              <?php echo $row['Id'];?>
            </td>
            <td>
              <?php echo $row['Doctor_name'];?>
            </td>
            <td>
              <?php echo $row['Donor_name'];?>
            </td>
            <td>
              <?php echo $row['mobile'];?>
            </td>
            <td>
              <?php echo $row['blood'];?>
            </td>
            <td>
            <form action="blood-delete.php">
                <input type="hidden" name="abc" value="<?php echo $row['Id']; ?>">
                <input type="submit" value="Delete" name="delete" class="btn btn-light my-1">
            </form>
            </td>
          </tr>
    <?php
      }
    }
    ?>
   </table>
        
   
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>