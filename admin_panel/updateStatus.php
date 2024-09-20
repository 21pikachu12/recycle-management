<?php
// updateStatus.php

// Include your database connection file
include_once "config/_db.php";

// Check if the required parameters are set
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    // Assuming your table has a 'status' column
    $status = ($type === 'active') ? 1 : 0;

    // Update the status in the database
    $sql = "UPDATE staff SET status = '$status' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo 'Status updated successfully';
    } else {
        echo 'Error updating status: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid parameters';
}

// Close the database connection
mysqli_close($conn);
?>