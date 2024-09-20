<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar Example</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    nav {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
    }

    nav a {
        color: white;
        text-decoration: none;
        padding: 10px;
        margin: 0 10px;
        display: inline-block;
    }
    </style>
</head>

<body>

    <?php
// Check if the user is logged in (you can modify this based on your authentication logic)
$loggedIn = true;

// Display the navigation bar only if the user is logged in
if ($loggedIn) {
    ?>
    <nav>
        <a href="myprofile.php">My Profile</a>
        <a href="collectgarbage.php">Collect Garbage</a>
        <a href="delivery.php">Delivery</a>
        <a href="logout.php">Logout</a>
    </nav>
    <?php
}
?>

    <!-- Your content goes here -->

</body>

</html>