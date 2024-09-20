<?php
include('../_db.php');

// Fetch data from the assign_tables table along with the corresponding collector's name
$sql = "SELECT assign_table.*, staff.name AS collector_name FROM assign_table
        LEFT JOIN staff ON assign_table.collector_id = staff.id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigned Tables</title>
    <style>
    /* Your existing styles remain unchanged */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    thead {
        background-color: #4caf50;
        color: #fff;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:hover {
        background-color: #f5f5f5;
    }
    </style>
</head>

<body>

    <div class="container">
        <h2>Assigned Tables</h2>

        <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Pickup Time</th>
                    <th>Collector Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        if($row['complete']==0)
                        {
                        echo "<tr>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['pickup_time'] . "</td>";
                        echo "<td>" . $row['collector_name'] . "</td>";
                        echo "<td><button onclick=\"handleAction('" . $row['uid'] . "')\">Done</button></td>";
                        echo "</tr>";
                        }
                    }
                    ?>
            </tbody>
        </table>
        <?php
        } else {
            echo "<p>No records found in assign_tables.</p>";
        }
        ?>
    </div>

</body>

<script>
function handleAction(uid) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "updatestatus.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "uid=" + encodeURIComponent(uid);;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert("Error updating status. Please try again.");
            }
        }
    };

    // Send the request
    xhr.send(data);
    console.log("Data sent:", data);
}
</script>

</html>