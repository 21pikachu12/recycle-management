<?php
session_start();

$uid = isset($_POST['uid']) ? $_POST['uid'] : '';

echo "uid: $uid";

if ($uid != '') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wms";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "update delivery_assign set complete=1 where uid=$uid";

    if ($conn->query($sql) === TRUE) {
        echo "status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>