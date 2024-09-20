<?php
include('_db.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Pickup Location Form</title>
    <style>
    /* Reset some default styles */

    h1,
    p,
    label,
    input,
    textarea,
    button {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f0f0;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;

        /* Center horizontally */
        height: 100vh;
        margin: 0;
    }

    h1 {


        color: #333;
        background-color: #61908c;
        padding: 20px;
        margin: 0;

    }

    #pickup-form {
        max-width: 400px;
        width: 100%;
        /* Ensure the form takes full width within its container */
        padding: 20px;
        background-color: #3498db;
        /* Change to your desired background color */
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #000;
        /* Set label text color */
    }

    input,
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        resize: vertical;
        /* Allow vertical resizing of the textarea */
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
    <h1>Pickup Location Form</h1>
    <form method="post">
        <label for="location">Pickup Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="date">Pickup Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Pickup Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="details">Additional Details:</label>
        <textarea id="details" name="details" rows="4"></textarea>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>
<?php
if(isset($_POST['submit']))
{
    $location=$_POST['location'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $details=$_POST['details'];

    $sql="INSERT INTO `schedule_pickup` (`pickup_location`, `pickup_date`, `pickup_time`, `additional_details`) VALUES (' $location', ' $date', ' $time', ' $details')";
    $res=mysqli_query($conn,$sql);

    if($res)
    {
        header("Location: /eva/user.php");
    }
}

?>