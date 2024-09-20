<?php
session_start();
include('_db.php');
$uid = $_SESSION['id'];

// Assuming you have a function to calculate the total price
function calculateTotalPrice($cart) {
    $total = 0;
    foreach ($cart as $cartItem) {
        $total += $cartItem['product_price'];
    }
    return $total;
}

// Check if the user's cart is set
$cart = isset($_SESSION['cart'][$uid]) ? $_SESSION['cart'][$uid] : [];

// Redirect to the shopping cart page if the cart is empty
if (empty($cart)) {
    header("Location: shopping_cart.php");
    exit();
}
if(isset($_POST['submit']))
{
// Get additional customer details
$paymentSuccessful = true; 
$customerName = $_POST['customerName'];
$customerAddress = $_POST['customerAddress'];
$phoneNumber = $_POST['phoneNumber'];

// Get payment amount
$paymentAmount = $_POST['paymentAmount'];





$sql = "INSERT INTO payment (user_name, payment_mode, status, customer_phonenumber, customer_address, paymentAmount)
        VALUES ('$customerName', '$paymentMode', '$paymentStatus', '$phoneNumber', '$customerAddress', '$paymentAmount')";

if (mysqli_query($conn, $sql)) {
    echo "Payment details inserted successfully!";
} else {
    echo "Error inserting payment details: " . mysqli_error($conn);
}
}
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Add your styles or use an external stylesheet -->
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #333;
        color: white;
        padding: 1em;
        text-align: center;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-list {
        margin-top: 1em;
    }

    .product {
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .total {
        margin-top: 1em;
        text-align: right;
        font-size: 18px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        margin: auto;
        box-sizing: border-box;
        /* To include padding and border in the width */
    }

    h2 {
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 12px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 18px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .hidden {
        display: none;
    }

    .hidden {
        display: none;
    }

    .center-button {
        text-align: center;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 12px 15px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <header>
        <h2>Checkout</h2>
    </header>
    <div class="container">
        <div class="product-list">
            <?php foreach ($cart as $cartItem) : ?>
            <div class="product">
                <span><?php echo $cartItem['product_name']; ?></span>
                <span>Rs <?php echo $cartItem['product_price']; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="total">
            <strong>Total Price: Rs <?php echo calculateTotalPrice($cart); ?></strong>
        </div>
    </div>
    <div class="center-button">
        <a href="payment/index.php" class="payment-button">
            <button>Proceed to Payment</button>
        </a>
    </div>
</body>

</html>