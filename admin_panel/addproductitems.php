<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Add Product Listing</h1>
        <form action="process_product.php" method="post" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required><br><br>

            <label for="product_description">Product Description:</label>
            <textarea name="product_description" required></textarea><br><br>

            <label for="product_price">Product Price:</label>
            <input type="number" name="product_price" required><br><br>

            <label for="product_image">Product Image:</label>
            <input type="file" name="product_image" accept="image/*" required><br><br>

            <input type="submit" value="Add Product">
        </form>
    </div>
</body>

</html><?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    // Handle the uploaded image
    if (isset($_FILES['product_image'])) {
        $file_name = $_FILES['product_image']['name'];
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_dest = 'product_images/' . $file_name;
        move_uploaded_file($file_tmp, $file_dest);
    }

    // Database connection
    $db_host = 'localhost';
    $db_name = "wms";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert product details into the database
        $sql = "INSERT INTO products (product_name, product_description, product_price, product_image) VALUES (:name, :description, :price, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $product_name);
        $stmt->bindParam(':description', $product_description);
        $stmt->bindParam(':price', $product_price);
        $stmt->bindParam(':image', $file_dest);
        $stmt->execute();

        echo "Product added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request";
}
?>