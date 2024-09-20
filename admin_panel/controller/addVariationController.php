<?php
    include_once "../config/dbconnect.php";
    include_once "../config/_db.php";
    
    if(isset($_POST['upload']))
    {
       
        $name = $_POST['name'];
        $email= $_POST['email'];
        $mobile = $_POST['mobile'];
        $pass = $_POST['pass'];

         $insert = mysqli_query($conn,"INSERT INTO staff
         (name,email,mobile,password,status) VALUES ('$name','$email','$mobile','$pass',1)");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?variation=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../dashboard.php?variation=success");
         }
     
    }
        
?>