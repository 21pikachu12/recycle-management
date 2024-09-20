<!DOCTYPE html>
<html>

<head>
    <title>Product Page</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        padding: 20px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product-box {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        margin: 10px;
        padding: 15px;
        width: calc(33.33% - 20px);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .product-box:hover {
        transform: scale(1.05);
    }

    .product-image {
        max-width: 100%;
        display: block;
        margin: 0 auto 10px;
    }

    .product-title {
        font-weight: bold;
        font-size: 18px;
        margin: 0;
    }

    .product-description {
        font-size: 14px;
        margin: 10px 0;
    }

    .product-price {
        font-size: 16px;
        color: #007BFF;
        margin: 0;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .product-box {
            width: 100%;
        }
    }
    </style>

</head>



</html>
<!DOCTYPE html>
<html>

<head>
    <title>Product Page</title>
    <style>
    /* Your existing CSS styles go here */

    .buy-button {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    .buy-button:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <h1>Products</h1>
    <?php
    $products = [
        [
            'id' => 1, // Product ID
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'image' => 'product1.jpg',
            'price' => '$19.99',
        ],
        [
            'id' => 2, // Product ID
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'image' => 'product2.jpg',
            'price' => '$29.99',
        ],
        [
            'id' => 3, // Product ID
            'name' => 'Product 3',
            'description' => 'Description for Product 3',
            'image' => 'product3.jpg',
            'price' => '$39.99',
        ],
        // Add more products as needed
    ];

    foreach ($products as $product) {
        echo '<div class="product-box">';
        echo '<img class="product-image" src="' . $product['image'] . '" alt="' . $product['name'] . '">';
        echo '<h2>' . $product['name'] . '</h2>';
        echo '<p>' . $product['description'] . '</p>';
        echo '<p>Price: ' . $product['price'] . '</p>';
        echo '<form action="payment.php" method="post">';
        echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
        echo '<button class="buy-button" type="submit">Book Now</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
</body>

</html>