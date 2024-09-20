<?php
include('controller/_db.php');
session_start();
$showerror = "false";
if(isset($_POST['submit']))
{
 
    
    
    $name=$_POST["username"];
    $pass=$_POST["password"];

    $sql="select * from admin where name='$name'";
    $result=mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);

        if($numRows==1)
        {
            $row= mysqli_fetch_assoc($result);
            
            if(password_verify($pass,$row['password']))
            {
                $_SESSION['loggedin']=true;
                $_SESSION['useremail']=$email;
                
                echo "logged in".$name;
            }
               header("Location: index.php");
              
        }
    

    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type='text/css' href="/eva/css/style.css">
</head>

<body>
    <div class="login-container">
        <h2> admin Login</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder=" password" required>
            <input type="submit" name="submit" nvalue="Login">
        </form>
    </div>
</body>

</html>