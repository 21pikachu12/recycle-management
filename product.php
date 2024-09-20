<?php
session_start();
include('_db.php');

// Ensure a user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirect to login page or handle authentication
    exit();
}

$uid = $_SESSION['id'];

if (isset($_GET['add_to_cart']) && isset($_GET['product_id'])) {
    $product_id = $_GET["product_id"];

 echo $sql = "SELECT * FROM product WHERE id='$product_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Check if the user has a cart in the session
        if (!isset($_SESSION['cart'][$uid])) {
       echo $_SESSION['cart'][$uid] = array();
        }

        // Add the product to the user's cart
        $_SESSION['cart'][$uid][] = $row;

        header("Location: cart.php");
        //exit();
    } else {
        echo "Error fetching product.";
    }
}

$res = mysqli_query($conn, "SELECT * FROM product");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Product Listings</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        color: #333;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #a0a5a0;
    }

    table,
    th,
    td {
        border: 1px solid;
    }

    th {
        padding: 8px;
        background: #ff7979;
    }

    td {
        padding: 8px;
        text-align: left;
    }

    img {
        display: block;
        margin: 0 auto;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        color: #0056b3;
    }

    .container {
        max-width: 100%;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: auto;
        /* Add overflow property to handle scrolling if needed */
    }

    h2 {
        color: #007bff;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Products</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price (Rs)</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            if (mysqli_num_rows($res)) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["product_price"] . "</td>";
                    echo "<td>" . $row["product_details"] . "</td>";
                    echo '<td><img src="files/products/' .$row["product_image"]  . '" width="100px" height="100px" alt="' . $row["product_name"] . '"></td>';
                    echo '<td><a href="?add_to_cart=true&product_id=' . $row["id"] . '">Add to Cart</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "No products found.";
            }

            // Close the database connection
            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>