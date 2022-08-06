<?php require_once("connection.php"); ?>
<?php

	$condition = "";
	if(isset($_GET["search"])) {
		$condition = " WHERE employee_id = '" . $_GET["search"] . "' OR firstname LIKE '%" . $_GET["search"] . "%' OR phone LIKE '%" . $_GET["search"] . "%' OR position LIKE '%" . $_GET["search"] . "%' ";
	}
	
	$employee = mysqli_query($con,"SELECT * FROM employee $condition ORDER BY firstname ASC" );
	$row_employee = mysqli_fetch_assoc($employee);
	$totalRows_employee = mysqli_num_rows($employee);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h1>لیست کارمندان</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				کارمند مورد نظر با موفقیت حذف گردید!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				کارمند مورد نظر با موفقیت ویرایش گردید!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				کارمند مورد نظر متاسفانه حذف نگردید!
			</div>
		<?php } ?>
	
	
		<?php if($totalRows_employee > 0) { ?>
	
		<table class="table table-striped table-hover">
			<tr>
				<th>شماره</th>
				<th>نام کارمند</th>
				<th>تلیفون</th>
				<th>وظیفه</th>
				<th>عکس</th>
				<th>ویرایش</th>
				<th>حذف</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_employee["employee_id"]; ?></td>
				<td><?php echo $row_employee["firstname"]; ?> <?php echo $row_employee["lastname"]; ?></td>
				<td><?php echo $row_employee["phone"]; ?></td>
				<td><?php echo $row_employee["position"]; ?></td>
				<td><img src="<?php echo $row_employee["photo"]; ?>" width="50"></td>
				<td>
					<a href="employee_edit.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
					<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="employee_delete.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
			
		</table>
		
		<?php } else if(isset($_GET["search"])) { ?>
			<div class="alert alert-warning">
				کارمندی با این مشخصات وجود ندارد!
			</div>
		<?php } ?>
	
	</div>


</div>



<?php require_once("footer.php"); ?>