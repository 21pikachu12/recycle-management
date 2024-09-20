<?php

include('_db.php');

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $password=$_POST[`mobile`];

    $existSql="select * from user where email='$email'";
    $res=mysqli_query($conn,$existSql);
    
    if(mysqli_num_rows($res)>0)
    {
        $showError="email already exists";
    }
    else
    {
        if($password==$cpassword)
        {
            $sql= "insert into `user` (`name`,`email`,`address`,`password`,`added_on`) values ('$name','$email','$address','$password',`$mobile`,current_timestamp())";
            $res=mysqli_query($conn,$sql);
        }
    }

    
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" type='text/css' href="css/style.css">
</head>

<body>
    <div class="signup-container">
        <h1>Create an Account</h1>
        <form action="#" method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="number" name="password" placeholder="Password" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" required>
            <input type="mobile" name="mobile" placeholder="mobile number" required>
            < <button type=" submit" name="submit">Sign
                Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>

</html>