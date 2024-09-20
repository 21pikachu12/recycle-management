<?php
session_start();
include('_db.php');



$uid = $_SESSION['id'];

// Remove item from cart if requested
if (isset($_GET['remove_from_cart']) && isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Loop through the cart items and remove the specified product
    foreach ($_SESSION['cart'][$uid] as $key => $product) {
        if ($product['id'] == $product_id) {
            unset($_SESSION['cart'][$uid][$key]);
            break;
        }
    }

    // Redirect to the cart page after removing the item
    header("Location: cart.php");
    exit();
}

// Your other database queries and HTML content remain unchanged below

$res = mysqli_query($conn, "SELECT * FROM product");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: #f69c24;
        background-image: url("images/cart.jpg");
        background-size: 100%;
        background-position: center center;
        background-repeat: no-repeat;
    }

    header {
        background-color: #333;
        color: white;
        padding: 1em;
        text-align: center;
    }

    main {
        padding: 1em;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1em;
        background: #95a3af;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    .total {
        margin-top: 1em;
        text-align: right;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Shopping Cart</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price (Rs)</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            if (!empty($_SESSION['cart'][$uid])) {
                foreach ($_SESSION['cart'][$uid] as $cartItem) {
                    echo "<tr>";
                    echo "<td>" . $cartItem["product_name"] . "</td>";
                    echo "<td>" . $cartItem["product_price"] . "</td>";
                    echo "<td>" . $cartItem["product_details"] . "</td>";
                    echo '<td><img src="files/products/' . $cartItem["product_image"] . '" width="100px" height="100px" alt="' . $cartItem["product_name"] . '"></td>';
                    echo '<td><a href="?remove_from_cart=true&product_id=' . $cartItem["id"] . '">Remove from Cart</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
            }
            ?>
        </table>
        <?php
        if (!empty($_SESSION['cart'])) {
            echo '<button type="button" onclick="window.location.href=\'checkout.php\'">Proceed to Checkout</button>';
        }
        ?>
    </div>
</body>

</html>