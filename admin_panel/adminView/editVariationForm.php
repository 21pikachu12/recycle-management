<div class="container p-5">

    <h4>Edit Variation Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    include_once "../config/_db.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * from staff where id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $pID=$row1["id"];
     // $sID=$row1["size_id"]
?>
    <form id="update-Items" onsubmit="updateVariations()" enctype='multipart/form-data'>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id" value="<?=$row1['id']?>" hidden>
            <div class="input-box"><input type="text" class="form-control" id="name" value="<?=$row1['name']?>"></div>
            <div class="input-box"><input type="text" class="form-control" id="email" value="<?=$row1['email']?>"></div>
            <div class="input-box"><input type="text" class="form-control" id="mobile" value="<?=$row1['mobile']?>">
            </div>

        </div>

        <div class="form-group">
            <button type="submit" style="height:40px" class="btn btn-primary">Update Variation</button>
        </div>
        <?php
    		}
    	}
    ?>
    </form>


</div>