<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
	include('db_connect.php');
	function Insert_Data($value){
		
		
		/*dbcon::set_sever('localhost');
		dbcon::set_user('root');
		dbcon::set_password('root');
		dbcon::set_database('db_test1');
		dbcon::set_dbtype('mysql');
		*/
	//	$ProductCode == $value[ProductCode];
		
		//echo ($value['ProductCode']);
		
		$strsql = "INSERT INTO tbl_Product (ProductCode,ProductName,ProductCategory,ProductCompany,ProductExpireDate,
					ProductPurchasePrice,ProductSellingPrice) VALUES($value[ProductCode],'$value[ProductName]','$value[ProductCategory]','$value[ProductCompany]',
				'$value[ProductExpireDate]',$value[ProductPurchasePrice],$value[ProductSellingPrice])";
		
		$cls_obj = new dbcon();
		$cls_obj->exec($strsql);
		$strsql==null;
		
	}
	
	function select_logging_data($loggingname,$loggingpass){
		
		$strsql = "Select * FROM tbl_logging Where Username = '$loggingname' && Password = '$loggingpass'";
		$cls_obj = new dbcon();
		$data = $cls_obj->fetch($strsql);
		return $data;		
		$strsql=null;
	}
	
	function user_availablity($username,$useremail){
		
		$strsql = "Select Username,Email FROM tbl_logging Where Username = '$username' || Email = '$useremail'";
		$cls_obj = new dbcon();
		$data = $cls_obj->fetch($strsql);
		print_r($data);
		return $data;		
		$strsql=null;	
	}
?>
	
</body>
</html>
