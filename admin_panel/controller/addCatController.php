<?php
    include_once "../config/_db.php";
    
    if(isset($_POST['upload']))
    {
       
        $pname = $_POST['p_name'];
        $pprice = $_POST['p_price'];
        $pdetails = $_POST['p_details'];
        $pname = $_POST['p_name'];
       
        if (isset($_FILES['product_image'])) {
            $directory= '../../files/products/'; 
            $image= $_FILES['product_image']['name'];
            $image_tmp = $_FILES['product_image']['tmp_name'];
            $image_path = $directory . $image;
            $_SESSION['path']=$image_path;
    
           
            move_uploaded_file($image_tmp, $image_path);
            $sql="INSERT INTO `product` (`uid`,`product_name`, `product_details`, `product_price`, `product_image`) VALUES (0,'$pname', '$pdetails', '$pprice', '$image')";
            mysqli_query($conn,$sql);
          
            echo "Product uploaded successfully! ";
        } else {
            echo "Failed to upload product.";
        }
    
        //  if(!$insert)
        //  {
        //      echo mysqli_error($conn);
        //      header("Location: ../dashboard.php?category=error");
        //  }
        //  else
        //  {
        //      echo "Records added successfully.";
        //      header("Location: ../dashboard.php?category=success");
        //  }
     
    }
        
?>