<?php require_once("connection.php"); ?>
<?php
	$employee = mysqli_query($con,"SELECT * FROM employee ORDER BY firstname ASC");
	$row_employee = mysqli_fetch_assoc($employee);
	
	if(isset($_POST["purchase_date"])) {
		$date = $_POST["purchase_date"];
		$employee_id = $_POST["employee_id"];
		
		$result = mysqli_query($con,"UPDATE purchase SET purchase_date='$date', employee_id=$employee_id WHERE purchase_id = " . $_GET["purchase_id"]); 
		
		if($result) {
			header("location:purchase_list.php?edit=done");
		}
		else {
			header("location:purchase_edit.php?error=notedit&purchase_id=" . $_GET["purchase_id"]);
		}
		
	}
	
	$purchase = mysqli_query($con,"SELECT * FROM purchase WHERE purchase_id = " . $_GET["purchase_id"]);
	$row_purchase = mysqli_fetch_assoc($purchase);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h1>ویرایش خریداری</h1>
	</div>
	
	<div class="panel-body">
		
		<form method="post">
			
			<div class="input-group">
				<span class="input-group-addon">
					تاریخ خریداری:
				</span>
			<input value="<?php echo $row_purchase["purchase_date"]; ?>" class="form-control" type="text" name="purchase_date">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					کارمند:
				</span>
			<select class="form-control" name="employee_id">
				<?php do { ?>
					<option <?php if($row_purchase["employee_id"] == $row_employee["employee_id"]) echo "selected"; ?> value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"] ?> <?php echo $row_employee["lastname"] ?></option>
				<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
			</select>
			</div>
			
			<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
			
		</form>
		
	</div>
	

</div>



<?php require_once("footer.php"); ?>