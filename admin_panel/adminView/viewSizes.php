<div>
    <h3>Assign</h3>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Pickup</th>
                <th class="text-center">date</th>
                <th class="text-center">Time</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php
      include_once "_db.php";
      $id="";
      $sql="SELECT * from schedule_pickup";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
        <tr>
            <td><?=$count?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["pickup_location"]?></td>
            <td><?=$row["pickup_date"]?></td>
            <td><?=$row["pickup_time"]?></td>
            <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
            <td><a href="./assign.php?id=<?php echo $row["id"]?>"><button class="btn btn-primary"
                        style="height:40px">Assign</button></a>
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
        Add Size
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Size Record</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addSizeController.php" method="POST">
                        <div class="form-group">
                            <label for="size">Size Number:</label>
                            <input type="text" class="form-control" name="size" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add
                                Size</button>
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