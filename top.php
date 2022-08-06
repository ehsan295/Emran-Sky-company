<?php require_once("connection.php"); ?>
<?php require_once("jdf.php"); ?>
<?php
if(!isset($_SESSION)) {
	session_start();
}
?>
<html>
<head>
	<title>Business Company MIS</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="cal/calendar-blue2.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="cal/calendar.js" type="text/javascript"></script>
	<script src="cal/calendar-en.js" type="text/javascript"></script>
	<script src="cal/calendar-setup.js" type="text/javascript"></script>
	
	<script src="js/script.js" type="text/javascript"></script>
	
	<meta charset="utf-8">
	
</head>

<body>

<div class="container">
	
	<div id="banner">
		<div id="logo">
			
		</div>
		<h1>
		<?php if(isset($_SESSION["user_id"])) { ?>
		سیستم مدیریت
			<?php } else { ?>
		شرکت صنعتی
		<?php } ?>
		عمران اسکای</h1>
		
		<div id="search" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			
			<?php if(isset($_SESSION["user_id"])) { ?>
			<form>
				<div class="input-group" style="margin-bottom:5px;">
					<span class="input-group-addon">
						جستجو: &nbsp;
					</span>
					<input placeholder="کلمه مورد نظر خود را تایپ کنید..." class="form-control" type="text" name="search">
					
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						در بخش:
					</span>
				<select class="form-control" name="section">
					<option value="-1">بخش را انتخاب کنید</option>
					<option value="employee">کارمندان</option>
					<option value="customer">مشتریان</option>
					<option value="product">محصولات</option>
					<option value="sales">فروشات</option>
				</select>
				
				<span class="input-group-btn">
				<button class="btn btn-primary">
					<span class="glyphicon glyphicon-search"></span>
					جستجو
				</button>
				</span>
				
				</div>
				
			</form>
			<?php } else { ?>
				
				<form style="margin-top:20px;">
				
				<div class="input-group" style="margin-bottom:5px;">
					<span class="input-group-addon">
						جستجو: &nbsp;
					</span>
					<input placeholder="محصول مورد نظر ..." class="form-control" type="text" name="search">
					
					<span class="input-group-btn">
					<button class="btn btn-primary">
						<span class="glyphicon glyphicon-search"></span>
						جستجو
					</button>
					</span>
				
				</div>
				
				
				
			</form>
				
			<?php } ?>
			
			
			
		</div>
		
		<div class="clearfix"></div>
		
		<?php if(isset($_SESSION["user_id"])) { ?>
			<div class="pull-left" style="color:white;direction:ltr;margin:5px;">
				<span class="glyphicon glyphicon-user"></span>
				<?php 
					$result = mysqli_query($con,"SELECT username FROM users WHERE user_id = " . $_SESSION["user_id"] );
					$row_result = mysqli_fetch_assoc($result);
					echo $row_result["username"];
				?>
			</div>
		<?php } ?>
	
		<div class="clearfix"></div>
	
	</div>
	
	<div id="menu">
		<nav class="navbar navbar-default navbar-inverse" role="navigation" style="z-index:9999;position:relative;">
			<?php if(!isset($_SESSION["user_id"])) { ?>	
				<a href="login.php" class="pull-left" style="margin-left:10px;text-decoration:none;">
					<span class="glyphicon glyphicon-chevron-right"></span>
					ورود
				</a>
			<?php } else { ?>	
				<a href="logout.php" style="float:left;text-decoration:none;margin-left:10px;">	
					<span class="glyphicon glyphicon-chevron-left"></span>
					خروج
				</a>
			<?php } ?>
				
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
			<div class="collapse navbar-collapse" id="collapse">
			
			<?php if(isset($_SESSION["user_id"])) { ?>
			<ul class="nav navbar-nav">
				<li><a href="home.php">صفحه اصلی</a></li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">کارمندان <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="employee_add.php">ثبت کارمند جدید</a></li>
						<li><a href="employee_list.php">لیست کارمندان</a></li>
						<li><a href="attendance_list.php">حاضری کارمندان</a></li>
						<li><a href="overtime_list.php">اضافه کاری کارمندان</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">خریداری <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="purchase_add.php">ثبت خریداری جدید</a></li>
						<li><a href="purchase_list.php">لیست خریداری ها</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">مشتریان <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">ثبت مشتری جدید</a></li>
						<li><a href="#">لیست مشتریان</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">گدام <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">ثبت محصول جدید</a></li>
						<li><a href="#">لیست محصولات</a></li>
						<li><a href="#">مواد خام</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">فروشات <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">ساخت بل جدید</a></li>
						<li><a href="#">بل های فروخته شده</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">مالی <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">پرداخت معاشات</a></li>
						<li><a href="#">مصارف</a></li>
						<li><a href="#">عایدات</a></li>
						<li><a href="#">قرضه ها</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">استفاده کنندگان<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">ثبت استفاده کننده جدید</a></li>
						<li><a href="#">لیست استفاده کنندگان</a></li>
						<li><a href="#">تغییر رمز ورود</a></li>
					</ul>
				</li>
			</ul>
			<?php } else { ?>
			<ul class="nav navbar-nav">
				<li><a href="#">صفحه اصلی</a></li>
				<li><a href="#">محصولات</a></li>
				<li><a href="#">مشتریان</a></li>
				<li><a href="#">درباره ما</a></li>
				<li><a href="#">ارتباط ما</a></li>
			</div>
			<?php } ?>
        </nav>
	</div>

	<?php if($_SERVER["PHP_SELF"] == "/business_company/login.php") { ?>
		<div id="content" style="float:left;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php } else { ?>
		<div id="content" style="float:left;" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	<?php } ?>
	
	
	
	
	