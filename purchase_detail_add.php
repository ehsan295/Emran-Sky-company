<?php require_once("connection.php"); ?>
<?php

	if(isset($_POST["item_name"])) {  
		$item_name = $_POST["item_name"];
		$category = $_POST["category"];
		$quantity = $_POST["quantity"];
		$unitprice = $_POST["unitprice"];
		$totalprice = $_POST["totalprice"];
		$purchase_id = $_GET["purchase_id"];
		
		$result = mysqli_query( $con,"INSERT INTO purchase_detail VALUES (NULL, '$item_name', '$category', $quantity, $unitprice, $totalprice, $purchase_id)");
		if($result) {
			header("location:purchase_detail_add.php?add=done&purchase_id=" . $_GET["purchase_id"]);
		}
		else {
			header("location:purchase_detail_add.php?error=notadd&purchase_id=" . $_GET["purchase_id"]);
		}
	
	}

?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h1>اضافه نمودن جنس به خریداری</h1>
	</div>
	
	<div class="panel-body">
		
		<form method="post">
			<div class="input-group">
				<span class="input-group-addon">
					نام جنس:
				</span>
				<input type="text" name="item_name" class="form-control">
			</div>
			<div class="input-group">
				<span class="input-group-addon">
					بخش:
				</span>
				<input type="text" name="category" class="form-control">
			</div>
			<div class="input-group">
				<span class="input-group-addon">
					تعداد:
				</span>
				<input id="quantity" type="text" name="quantity" class="form-control">
			</div>
			<div class="input-group">
				<span class="input-group-addon">
					قیمت: 
				</span>
				<input id="unitprice" type="text" name="unitprice" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					قیمت مجموعی:
				</span>
				<input readonly id="totalprice" type="text" name="totalprice" class="form-control">
			</div>
			
			<input type="submit" value="اضافه نمودن" class="btn btn-primary">
							
			<a href="purchase_list.php" class="btn btn-success">
				<b>انجام شد</b>
			</a>
			
		</form>
	
	
	</div>
</div>



<?php require_once("footer.php"); ?>