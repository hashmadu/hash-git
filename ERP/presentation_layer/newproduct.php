
<?php
//	error_reporting(0);
	try{
		session_start();
		if($_SESSION['loggin_status'] = 0){
			throw new Exception("Please Login to the System...");
			header('Location: ../presentation_layer/login.php');
		}
	}
	catch(Exception $e){
		echo "Error : ".$e->getMessage();
	}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
	<link rel="stylesheet" href="styles/new_product.css" type="text/css"/>
</head>

<body>
	<form action="newproduct.php" method="post">
		<div id="div_product" align="center">
			<fieldset align="center">
				<legend>Insert Product Details</legend>
				<table id=tbl_product align="center" width="100%" cellspacing="15px">					
					<tr align="center"><td align="left">Product Code :</td><td align="left"><input type="text" name=product_code value=""/></td>
					<td align="left">Product Purchase Price :</td><td align="left"><input type="text" name=purchase_price value=""/></tr>
					<tr align="center"><td align="left">Product Name :</td><td align="left"><input type="text" name=product_name value=""/></td>
					<td align="left">Product Selling Price :</td><td align="left"><input type="text" name=selling_price value=""/></tr>
					<tr align="center"><td align="left">Product Category :</td><td align="left"><input type="text" name=product_category value=""/></td>
					<td align="left">Product Weight (KG):</td><td align="left"><input type="text" name=product_weight value=""/></td></tr>
					<tr align="center"><td align="left">Product Company:</td><td align="left"><input type="text" name=product_company value=""/></td>
					<td align="left">Product Expire Date :</td><td align="left"><input type="date" name=expire_date value=""/></td></tr>
					<tr><td></td><td><input type="submit" name="btnSubmit" value="Submit"</td></tr>
									
				</table>
			</fieldset>
		</div>
		<div id="div_product_data" align="center">
			<fieldset id="fld_Product_data" align="center">
				<legend align="top">Product Details</legend>
				<?php //select_product_data(); ?>
			</fieldset>
		</div>
	</form>

		
<?php
	include('mod_db.php');
	
	if(isset($_POST['btnSubmit'])){
		
		$array = insert_product_data();
		
		if(count($array > 0)){
			insert_data($array);
		}
	}


	function insert_product_data(){
		
		try{
			$values = array(
				'ProductCode' => $_POST['product_code'],
				'ProductName' => $_POST['product_name'],
				'ProductCategory' => $_POST['product_category'],
				'ProductCompany'=> $_POST['product_company'],
				'ProductExpireDate' => $_POST['expire_date'],
				'ProductPurchasePrice' => $_POST['purchase_price'],
				'ProductSellingPrice' => $_POST['selling_price'],
			);
			
			foreach($values AS $val){
				if(empty($val)){
					throw new Exception("Data fields cannot be blank...");
					exit();
				}				
			}			
			return $values;
		}	
		catch(Exception $e){
			echo "Error:". $e->getMessage();
		}
	}
	
	function select_Product_Data(){
		
	}
?>

</body>
</html>
