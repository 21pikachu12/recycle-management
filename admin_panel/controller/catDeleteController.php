<?php

    include_once "_db.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM product where id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Category Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>