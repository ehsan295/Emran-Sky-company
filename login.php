<?php require_once("connection.php"); ?>
<?php

	if(isset($_POST["username"])) {
		
		$u = $_POST["username"];
		$p= $_POST["password"];
		$result = mysqli_query($con,"SELECT * FROM  users WHERE username = '$u' AND password = '$p'");
	
		if(mysqli_num_rows($result) == 1) {
			$row_result = mysqli_fetch_assoc($result);
			$_SESSION["user_id"] = $row_result["user_id"];
			header("location:home.php");
		}
		else {
			header("location:login.php?login=failed"); 
		}
	
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

<div class="panel-heading">
	<h1>
	<?php if(isset($_GET["notlogin"])) { ?>
		لطفا ابتدا به سیستم وارد شوید!
	<?php } else { ?>
	ورود به سیستم مدیریت
	<?php } ?>
	</h1>
</div>

<div class="panel-body">

<form method="post">
	
	<?php if(isset($_GET["login"])) { ?>
		<div class="alert alert-danger text-center">
			<button class="close pull-left" area-hidden="true" data-dismiss="alert">&times;</button>
			نام یا رمز اشتباه است!
		</div>
	<?php } ?>
	
	
	
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
	<div class="input-group">
		<span class="input-group-addon">نام:</span>
		<input class="form-control" type="text" name="username">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		رمز:
		</span>
		<input class="form-control" type="password" name="password">
	</div>
	
	<input type="submit" class="btn btn-primary" value="ورود">
	
	</div>
	
</form>

</div>

</div>


<?php require_once("footer.php"); ?>