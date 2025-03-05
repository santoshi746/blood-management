<?php
// require '../Reciever/avail-blood-sample.php';
$database = mysqli_connect("localhost","root","","hospital");
  $sql = "SELECT * FROM `user`";
  $result =mysqli_query($database,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="request-samples.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Requested sample</title>
  </head>
  <body>
<table class="table table-hover ">
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Blood required</th>
        <th>Mobile</th>
        <th>Aadhar no</th>
    </tr>
    <?php
    if(mysqli_num_rows($result)>0){
      while($row= mysqli_fetch_array($result)){
        ?>
         <tr>
        <td><?php echo $row['Id'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['bloodGroup'];?></td>
        <td><?php echo $row['mobileNo'];?></td>
        <td><?php echo $row['aadharNo'];?></td>
    </tr>
        <?php
      }
    }
    ?>
   
</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>