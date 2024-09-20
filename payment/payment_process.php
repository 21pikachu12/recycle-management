<?php
session_start();
include('../_db.php');

if(isset($_POST['amt']) && isset($_POST['name'])){
    $amt = $_POST['amt'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobno = $_POST['mobno'];
    $payment_status = "success";
    $added_on = date('Y-m-d h:i:s');
    //$useremail = $_SESSION['useremail'];

    mysqli_query($conn, "INSERT INTO payment (user_name, email, status, customer_phonenumber, customer_address, paymentAmount, added_on) VALUES ('$name', '".$_SESSION['useremail']."', '$payment_status', '$mobno', '$address', '$amt', '$added_on')");

}
//     if(mysqli_error($conn)) {
//         echo "Error: " . mysqli_error($conn);
//     } else {
//         echo "Payment details inserted successfully!";
//     }
// }

// if(isset($_SESSION['useremail'])){
//     mysqli_query($conn, "UPDATE payment SET status='complete' WHERE email='".$_SESSION['useremail']."'");

//     if(mysqli_error($conn)) {
//         echo "Error: " . mysqli_error($conn);
//     } else {
//         echo "Payment status updated successfully!";
//     }
// }

mysqli_close($conn);
?>