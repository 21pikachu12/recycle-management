<?php
session_start();
$showerror = "false";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include '_db.php';
    
    
    $email=$_POST["loginEmail"];
    $pass=$_POST["loginPass"];

    $sql="select * from user where email='$email'";
    $result=mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);

        if($numRows==1)
        {   
            $row= mysqli_fetch_assoc($result);
            //echo $row['id'];
            $_SESSION['id']=$row['id'];
            $_SESSION['useremail']=$row['email'];
            echo $_SESSION['useremail'];
            
            if(password_verify($pass,$row['password']))
            {
                $_SESSION['loggedin']=true;
                $_SESSION['useremail']=$email;
                
                echo "logged in".$email;
            }
               header("Location: /eva/user.php");
              
        }
    

    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type='text/css' href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="edit_profile.php">My Profile</a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="sellproduct.php">sell product</a>
            </li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="pickup.php">Schedule Pickup</a></li>
            <li><a href="cart.php">cart</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="loginEmail" placeholder="email" required>
            <input type="password" name="loginPass" placeholder=" Password" required>
            <input type="submit" name="submit" nvalue="Login">
        </form>
    </div>
</body>

</html>