<?php

    include_once "../config/dbconnect.php";
    include_once "../config/_db.php";
    
    $id=$_POST['record'];
    $query="delete from staff where id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"variation Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>