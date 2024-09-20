<?php

    include_once "_db.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM feedback where id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Size Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>