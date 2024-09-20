<?php
session_start();
include('_db.php');

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    
    $sql="select * from staff where name='$name'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)){
        if($row=mysqli_fetch_assoc($result))
        {
            $_SESSION['sid']=$row['id'];
            
            if($pass==$row['password']){
                header("Location: staff.php");                
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type='text/css' href="../css/style.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="name" required>
            <input type="password" name="pass" placeholder="Password" required>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>

</html>