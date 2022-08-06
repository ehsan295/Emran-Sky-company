<?php require_once("connection.php"); ?>
<?php

	$employee = mysqli_query($con,"SELECT photo FROM employee WHERE employee_id = " . $_GET["employee_id"]);
	$row_employee = mysqli_fetch_assoc($employee);

	unlink($row_employee["photo"]);

	$result = mysqli_query($con,"DELETE FROM employee WHERE employee_id = " . $_GET["employee_id"]);
	if($result) {
		header("location:employee_list.php?delete=done");
	}
	else {
		header("location:employee_list.php?error=notdelete");
	}

?>