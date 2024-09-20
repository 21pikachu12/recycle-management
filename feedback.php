<?php
include('_db.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Feedback Form</title>
    <style>
    /* Reset some default styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        color: #333;
        margin: 0;
        padding: 0;
        background-image: url("images/bottles.jpg");
        background-size: 100%;
        background-position: center center;
        background-repeat: no-repeat;
    }

    h1,
    p,
    label,
    input,
    select,
    textarea,
    button {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Vertically center the form */
        height: 100vh;
        /* Make sure the body takes up the full viewport height */
    }

    h1 {
        color: #333;
        background-color: #61908c;
        padding: 20px;
        margin: 0;
    }


    #feedback-form {
        max-width: 470px;
        margin: auto;
        padding: 84px;
        background-color: #20583e;
        border: 1px solid #171616;
        border-radius: 5px;
        text-align: left;
    }


    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #555;
    }
    </style>
</head>

<body>
    <h1>Feedback Form</h1>
    <form id="feedback-form" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating">
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
        </select>

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" rows="4" required></textarea>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>
<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $rating=$_POST['rating'];
    $comments=$_POST['comments'];

    $sql="INSERT INTO `feedback` (`name`, `email`, `rating`, `comment`) VALUES ('$name', '$email', '$rating', '$comments')";
    $res=mysqli_query($conn,$sql);

    if($res)
    {
        header("Location: /eva/user.php");
    }
}