<?php
include('../_db.php');

$name="";
$loc="";

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $row=mysqli_fetch_assoc(mysqli_query($conn,"select * from schedule_pickup where id='$id'"));
    $name=$row['name'];
    $loc=$row['pickup_location'];
    $pickup_date=$row['pickup_date'];
    $pickup_time=$row['pickup_time'];
}

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $loc=$_POST['loc'];
    $collector_id = $_POST['collector'];

    $res=mysqli_query($conn,"insert into `assign_table`(`uid`,`user_name`,`address`,`date`,`pickup_time`,`collector_id`) values('$id','$name','$loc','$pickup_date','$pickup_time','$collector_id')");
}

$res=mysqli_query($conn,"select * from staff where status=1 order by id asc");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garbage Collection Request Form</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    select,
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>

    <div class="container">
        <h2>Garbage Collection Request Form</h2>

        <?php
        if (mysqli_num_rows($res) > 0) {
        ?>
        <form method="post" action="">
            <!-- Replace with the actual processing page -->

            <label for="collector">Select Collector:</label>
            <select name="collector" required>
                <option value="" disabled selected>Select Collector</option>
                <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
            </select><br>

            <label for="name"> Name:</label>
            <input type="text" name="name" value="<?php echo $name ?>" required><br>

            <label for="phone">Location:</label>
            <input type="text" name="loc" value="<?php echo $loc ?>" required><br>

            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        } else {
            echo "<p>No staff members available for collection.</p>";
        }
        ?>
    </div>

</body>

</html>