<?php
//	error_reporting(0);
	try{
		session_start();
		if(!$_SESSION['loggin_status'] = 1){
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
	<title>Home</title>
	<link rel="stylesheet" href="styles/menu.css" type="text/css"/>
	
</head>

<body>
	<form action="home.php" method="post">
		<div id="div_tbl" align="center">
		<table align="center" cellpadding= "10px">
			<tr id="topraw" align="center">
				<td>
					<ul>
						<li><a href="#"> Home</a>
							<ul>
								<li><a href="access_control.php" target="subpages">Access Conctrol</a></li>
								<li><a href="login.php" target="subpages">Logout</a></li>
								<li><a href="#" target="subpages">Exit</a></li>
							</ul> </li>
						<li><a href="#">Products</a>
							<ul>
								<li><a href="newproduct.php" target="subpages">New Product</a></li>
								<li><a href="#" target="subpages">Edit Product</a></li>
								<li><a href="#" target="subpages">New Category</a></li>
							</ul></li>
						<li><a href="#">Stock</a>
							<ul>
								<li><a href="#" target="subpages">Add Quantities</a></li>
								<li><a href="#" target="subpages">Available</a></li>
								<li><a href="#" target="subpages">Available</a></li>
							</ul></li>
						<li><a href="#">Prices</a>
							<ul>
								<li><a href="#" target="subpages">Add Prices</a></li>
								<li><a href="#" target="subpages">Available</a></li>
								<li><a href="#" target="subpages">Available</a></li>
							</ul></li>
						<li><a href="#">Reports</a>
							<ul>
								<li><a href="#" target="subpages">Stock Report</a></li>
								<li><a href="#" target="subpages">Daily Sales Report</a></li>
								<li><a href="#" target="subpages">Available</a></li>
							</ul></li>			
					</ul>
				</td>			
			</tr>
		</table>
		<table align="center">
			<tr>
				<iframe name="subpages" width="100%" height="100%"></iframe>
			</tr>
		</table>
		</div>
	</form>
	
	

</body>
</html>
