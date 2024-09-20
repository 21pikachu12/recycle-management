<?php
include('_db.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sell Your Product</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    h1 {
        color: #333;
        background-color: #61908c;
        padding: 20px;
        margin: 0;
    }


    form {
        background-color: #1e563d;
        max-width: 415px;
        margin: 50px auto 0 auto;
        padding: 39px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
        width: 80%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        form {
            max-width: 90%;
        }
    }
    </style>
</head>

<body>

    <h1>Sell Your Product</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required><br><br>

        <label for="product_description">Product Description:</label>
        <textarea name="product_description" rows="4" required></textarea><br><br>

        <label for="product_price">Price:</label>
        <input type="text" name="product_price" required><br><br>

        <label for="product_image">Product Image:</label>
        <input type="file" name="product_image" accept="image/*" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html><?php
if (isset($_POST['submit'])) {
   
    $product_name = $_POST['product_name'];
    $product_details = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    $uid=$_SESSION['id'];

  
    if (isset($_FILES['product_image'])) {
        $directory= 'files/products/'; 
        $image= $_FILES['product_image']['name'];
        $image_tmp = $_FILES['product_image']['tmp_name'];
        $image_path = $directory . $image;
        $_SESSION['path']=$image_path;

       
        move_uploaded_file($image_tmp, $image_path);
        $sql="INSERT INTO `product` (`uid`,`product_name`, `product_details`, `product_price`, `product_image`) VALUES ('$uid','$product_name', '$product_details', '$product_price', '$image')";
        mysqli_query($conn,$sql);
      
        echo "Product uploaded successfully! ";
    } else {
        echo "Failed to upload product.";
    }

    
}
?>