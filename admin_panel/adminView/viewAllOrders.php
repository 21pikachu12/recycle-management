<div id="ordersBtn">
    <h2>Order Details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Email</th>
                <!-- <th>Payment Status</th> -->
                <th>Mobile on</th>
                <th>Address</th>
                <th>Amount</th>
                <th>OrderDate</th>
                <th>Order status</th>
                <th>Payment</th>
                <th>Payment</th>
            </tr>
        </thead>
        <?php
      include_once "../config/dbconnect.php";
      include_once "../config/_db.php";
       $sql="SELECT orders.*,user.name AS customer_name,user.address,user.email,user.mobile,product.product_price FROM orders JOIN user ON orders.customerId = user.id JOIN product ON orders.product_id = product.id";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
        <tr>
            <td><?=$row["customer_name"]?></td>
            <td><?=$row["email"]?></td>
            <!-- <td><?=$row["status"]?></td> -->
            <td><?=$row["mobile"]?></td>
            <td><?=$row["address"]?></td>
            <td><?=$row["product_price"]?></td>
            <td><?=$row["added_on"]?></td>
            <?php 
                if($row["order_status"]==0){
                            
            ?>
            <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['id']?>')">Pending </button>
            </td>
            <?php
                        
                }else{
            ?>
            <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['id']?>')">Delivered</button>
            </td>

            <?php
            }
                if($row["order_status"]=="failed"){
            ?>
            <td><button class="btn btn-danger" onclick="ChangePay('<?=$row['id']?>')">Unpaid</button></td>
            <?php
                        
            }else{
            ?>
            <td><button class="btn btn-success" onclick="ChangePay('<?=$row['id']?>')">Paid </button></td>
            <?php
                }
            ?>
            <td><a href="./delivery.php?id=<?php echo $row["id"]?>"><button class="btn btn-primary"
                        style="height:40px">Assign</button></a>
                <!-- <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['id']?>"
                    href="javascript:void(0);">View</a></td> -->
        </tr>
        <?php
            
        }
      }
    ?>

    </table>
    <a href="assign.php ">other</a>
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Order Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="order-view-modal modal-body">

            </div>
        </div>
        <!--/ Modal content-->
    </div><!-- /Modal dialog-->
</div>
<script>
//for view order modal  
$(document).ready(function() {
    $('.openPopup').on('click', function() {
        var dataURL = $(this).attr('data-href');

        $('.order-view-modal').load(dataURL, function() {
            $('#viewModal').modal({
                show: true
            });
        });
    });
});
</script>