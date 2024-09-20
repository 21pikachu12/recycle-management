<?php
session_start();
if(isset($_POST['submit']))
{
    
    include('_db.php');
    
    $email=$_POST['email'];
    $name=$_POST['name'];
    $mob=$_POST['mobile'];
    $address=$_POST['address'];

    $sql="update staff set  name='$name',email='$email',mobile='$mob' where id=".$_SESSION['sid'];
    mysqli_query($conn,$sql);

    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-image: url("images/edit.jpg");
        background-size: 100%;
        background-position: center center;
        background-repeat: no-repeat;
    }

    legend {
        background-color: #9ca09a;
        border: 1px solid #662323;
        border-radius: 10px;
        padding: 10px 20px;
        text-align: left;
        text-transform: uppercase;
    }

    fieldset {
        width: 350px;
        border: 1px solid #c12e2e;
        border-radius: 10px;
        padding: 20px;
        background: #dad6d6;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }

    input[type=submit] {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    </style>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Edit Profile</legend>
            <label for="email">Email:</label><br><br>
            <input type="text" name="email"><br><br>
            <label for="">Name:</label><br><br>
            <input type="text" name="name"><br><br>
            <label for="">Mobile No:<?php echo $_SESSION['sid'] ?></label><br><br>
            <input type="text" name="mobile"><br><br>
            <label for="">Address:</label><br><br>
            <input type="text" name="address"><br><br>
            <input type="submit" name="submit">
        </fieldset>
    </form>
</body>

</html>