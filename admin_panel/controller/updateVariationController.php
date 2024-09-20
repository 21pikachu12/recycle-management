<?php
    include_once "../config/dbconnect.php";
    include_once "../config/_db.php";

    $id=$_POST['id'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
   
    $updateItem = mysqli_query($conn,"update staff set name='$name',email='$email',mobile='$mobile' where id='$id'");


    if($updateItem)
    {
        echo "true";
    }
?>