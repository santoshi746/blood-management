<?php
$database = mysqli_connect("localhost","root","","hospital");
if(isset($_GET['delete'])){
    $id = $_GET['abc'];
    $query = "DELETE FROM `blood_sample` WHERE `Id`='$id'";
    $result = mysqli_query($database,$query);
    if($result){
        echo "<Script>alert('Deleted Successfully');</script>";
    }else{
        echo "error found";
    }
}
?>