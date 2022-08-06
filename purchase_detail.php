<?php require_once("connection.php"); ?>
<?php
	$purchase = mysql_query("SELECT * FROM purchase_detail WHERE purchase_id = " . $_GET["purchase_id"] . " ORDER BY detail_id ASC", $con);
	$row_purchase = mysql_fetch_assoc($purchase);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h1>جزییات خریداری</h1>
	</div>

	<div class="panel-body">
		
		<table class="table table-striped table-hover">
			<tr>
				<th>شماره</th>
				<th>نام جنس</th>
				<th>بخش</th>
				<th>تعداد</th>
				<th>قیمت</th>
				<th>قیمت مجموعی</th>
				<th>ویرایش</th>
				<th>حذف</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_purchase["item_name"]; ?>
				<td><?php echo $row_purchase["category"]; ?>
				<td><?php echo $row_purchase["quantity"]; ?>
				<td><?php echo $row_purchase["unitprice"]; ?>
				<td><?php echo $row_purchase["totalprice"]; ?>
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
			<?php } while($row_purchase = mysql_fetch_assoc($purchase)); ?>
			
		</table>
		
		
	</div>

</div>



<?php require_once("footer.php"); ?>