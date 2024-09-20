<?php
include('_db.php');

$sql="select * from payment where email=".$_SESSION['useremail'];
$result=($conn,$sql);
$row=mysqli_fetch_assoc($result);
$row['status'];
?>