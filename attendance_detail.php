<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>
<?php require_once("tools.php"); ?>
<?php

	$year = $_GET["date_year"];
	$month = $_GET["date_month"];

	$attendance = mysqli_query($con,"SELECT * FROM attendance WHERE date_year=$year AND date_month=$month AND employee_id = " . $_GET["employee_id"]);
	$row_attendance = mysqli_fetch_assoc($attendance);

?>


<div class="panel panel-primary">

	<div class="panel-heading">
		<h1>جزییات حاضری کارمند
			در ماه 
			
			<?php echo monthName($_GET["date_month"]); ?>
			<?php echo $_GET["date_year"]; ?>
		</h1>
	</div>
	
	<div class="panel-body">
		
		<table class="table table-striped table-hover">
			<tr>
				<th>شماره</th>
				<th>تاریخ</th>
				<th>غیرحاضری</th>
				<th>ویرایش</th>
				<th>حذف</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_attendance["date_year"]; ?>/<?php echo $row_attendance["date_month"]; ?>/<?php echo $row_attendance["date_day"]; ?></td>
				<td><?php echo $row_attendance["absent_hour"]; ?> ساعت</td>
				<td>
					<a href="attendance_edit.php?employee_id=<?php echo $row_attendance["employee_id"]; ?>&date_year=<?php echo $row_attendance["date_year"]; ?>&date_month=<?php echo $row_attendance["date_month"]; ?>&date_day=<?php echo $row_attendance["date_day"]; ?>">
					<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="attendance_delete.php?employee_id=<?php echo $row_attendance["employee_id"]; ?>&date_year=<?php echo $row_attendance["date_year"]; ?>&date_month=<?php echo $row_attendance["date_month"]; ?>&date_day=<?php echo $row_attendance["date_day"]; ?>">
					<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
			
		</table>
		
		
	</div>

</div>



<?php require_once("footer.php"); ?>