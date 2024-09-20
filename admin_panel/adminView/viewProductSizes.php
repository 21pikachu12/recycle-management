<?php
// updateStatus.php

// Include your database connection file
include_once "_db.php";

// Check if the required parameters are set
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    // Assuming your table has a 'status' column
    $status = ($type === 'active') ? 1 : 0;

    // Update the status in the database
    $sql = "UPDATE staff SET status = '$status' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo 'Status updated successfully';
    } else {
        echo 'Error updating status: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid parameters';
}

// Close the database connection
mysqli_close($conn);


?>
<div>
    <h2>Staffs</h2>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Name</th>
                <th class="text-center">email</th>
                <th class="text-center">mobile</th>
                <th class="text-center">timestamp</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php
      include_once "../config/dbconnect.php";
      include_once "../config/_db.php";
      $sql="SELECT * from staff ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
        <tr>
            <td><?=$count?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["mobile"]?></td>
            <td><?=$row["timestamp"]?></td>
            <td><button class="btn btn-primary" style="height:40px"
                    onclick="variationEditForm('<?=$row['id']?>')">Edit</button>
                <button class="btn btn-danger" style="height:40px"
                    onclick="variationDelete('<?=$row['id']?>')">Delete</button>
                <?php
                if ($row['status'] == 1) {
                 echo '<a href="javascript:void(0);" onclick="toggleStatus(' . $row['id'] . ', \'unassigned\')" data-id="' . $row['id'] . '">';
                 echo '<label class="">Assign</label>';
                 echo '</a>';
                } else {
                    echo '<a href="javascript:void(0);" onclick="toggleStatus(' . $row['id'] . ', \'assigned\')" data-id="' . $row['id'] . '">';
                    echo '<label class="">Unassigned</label>';
                    echo '</a>';
                }
                ?>
            </td>
        </tr>
        <?php
            $count=$count+1;
          }
        }
      ?>
    </table>

    <!-- Trigger the modal with a button -->
    <button type=" button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Staffs
    </button>
    <a href="assign.php ">other</a>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Staff</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addVariationController.php" method="POST">
                        <div class="form-group">
                            <label for="product_name">Name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Email:</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Mobile No:</label>
                            <input type="text" class="form-control" name="mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Password:</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-secondary" name="upload" style="height:40px">
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                        style="height:40px">Close</button>
                </div>
            </div>

        </div>
    </div>


</div>