<?php require_once("connection.php"); ?>
<?php
	$purchase = mysqli_query($con,"SELECT * FROM purchase INNER JOIN employee ON employee.employee_id = purchase.employee_id ORDER BY purchase_id DESC");
	$row_purchase = mysqli_fetch_assoc($purchase);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h1>لیست خریداری ها</h1>
	</div>

	<div class="panel-body">
		
		<table class="table table-striped table-hover">
			<tr>
				<th>شماره خریداری</th>
				<th>تاریخ خریداری</th>
				<th>خریدار</th>
				<th>ویرایش</th>
				<th>حذف</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_purchase["purchase_id"]; ?></td>
				<td>
				<a href="purchase_detail.php?purchase_id=<?php echo $row_purchase["purchase_id"]; ?>">
				<?php echo $row_purchase["purchase_date"]; ?>
				</a>
				</td>
				<td><?php echo $row_purchase["firstname"]; ?> <?php echo $row_purchase["lastname"]; ?></td>
				<td>
					<a href="purchase_edit.php?purchase_id=<?php echo $row_purchase["purchase_id"]; ?>">
					<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="purchase_delete.php?purchase_id=<?php echo $row_purchase["purchase_id"]; ?>">
					<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_purchase = mysqli_fetch_assoc($purchase)); ?>
			
		</table>
		
		
	</div>

</div>



<?php require_once("footer.php"); ?>