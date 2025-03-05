<?php
$database = mysqli_connect("localhost","root","","hospital");
$query = "SELECT * FROM blood_sample";
$result = mysqli_query($database,$query);
if(isset($_POST['request'])){
  echo "<script>alert('request submitted');</script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="avail-blood-sample.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Available blood</title>
  </head>
  <body>
    <div class="row">
       
          <?php
          if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
              ?>
               <div class="col-3">
              <div class="card" style="width: 18rem;">
                <img src="<?php
                if($row['blood']=='A+'){
                  echo "https://cdn.pixabay.com/photo/2017/08/21/21/23/blood-group-2667005_640.png";
                }else if($row['blood']=='A-'){
                  echo "https://cdn.pixabay.com/photo/2017/08/22/11/55/blood-group-2668689_640.png";
                }
                else if($row['blood']=='B+'){
                  echo "https://cdn.pixabay.com/photo/2017/08/22/11/56/blood-group-2668701_640.png";
                }
                else if($row['blood']=='B-'){
                  echo "https://cdn.pixabay.com/photo/2017/08/22/16/49/blood-group-2669655_640.png";
                }
                else if($row['blood']=='AB+'){
                  echo "https://cdn.pixabay.com/photo/2017/08/22/11/56/blood-group-2668697_640.png";
                }
                else if($row['blood']=='AB-'){
                  echo "https://cdn.pixabay.com/photo/2017/08/22/11/55/blood-group-2668694_640.png";
                }else if($row['blood']=='O+'){
                  echo "https://cdn.pixabay.com/photo/2017/08/22/11/54/blood-group-2668684_640.png";
                }else if($row['blood']=='O-'){
                  echo "https://cdn.pixabay.com/photo/2017/08/22/11/54/blood-group-2668682_640.png";
                }
                ?>" id="image" class="card-img-top w-50 d-block mx-auto" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['Donor_name'];?></h5>
                  <p>Blood sample : <?php echo $row['blood'];?></p>
                  <p>Mobile : <?php echo $row['mobile'];?></p>
                  <p>Contact with : <?php echo $row['Doctor_name'];?></p>
                  <form action="" method="POST">
                  <button type="submit" class="btn btn-primary w-50 d-block mx-auto" name="request">Request</button>
                  </form>
                </div>
              </div>
              </div>
              <?php
            }
          }
          ?>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>