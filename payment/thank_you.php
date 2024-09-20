<h1>Payment Complete
    <?php
    session_start();

    include('../_db.php');
    $uid = $_SESSION['id'];

    foreach ($_SESSION['cart'][$uid] as $item) {
        if (is_array($item)) {
            // Convert the array to a comma-separated string
            $item = implode(',', $item);
        }

        // Now $item is guaranteed to be a string
        $items = explode(',', $item);

        if (count($items) === 4) {
            list($col1, $col2, $col3, $col4) = $items;

            // Your SQL query here
            $sql = "INSERT INTO orders (customerId, items,product_id) VALUES ('$col2', '$col3','$col1')";
            mysqli_query($conn, $sql);
        } else {
            // Handle the case where $item doesn't have 4 values
            list($col1, $col2, $col3, $col4) = $items;
            $sql = "INSERT INTO orders (customerId, items,product_id,order_status) VALUES ('$col2', '$col3','$col1',0)";
            mysqli_query($conn, $sql);
        }
    }
    
    //var_dump($_SESSION['cart']);

   // unset($_SESSION['cart'][$uid]);
    ?>
</h1>