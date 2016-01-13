<?php
	
	session_start();
	include('mod_validation.php');
	include('mod_db.php');
	$_SESSION['Username'];
	$_SESSION['loggin_status'] = 0;
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Logging</title>
	<link rel="stylesheet" href="styles/loggin.css" type="text/css";
</head>

<body>
	<div id="div_logging">
		<form action="#" method="post">
			<table align="center" id="tbl_logging" border="0px" width="100%" cellpadding="10px" >
				<tr id="tr_logging">
					<td colspan="2" align="right">
					User Name&nbsp;&nbsp;<input type="text" name="txtUsername"/>
					&nbsp;&nbsp;&nbsp;Password&nbsp;&nbsp;<input type="password" name="txtPassword"/>
					&nbsp;&nbsp;<input type="submit" name="btnLogging" value="LOGGING"/>
					&nbsp;&nbsp;<input type="submit" name="btnSingup" value="SIGN UP"/></td>
				</tr>
					<tr height="50px"></tr>
					<tr ><td align="right">User Name</td><td><input type="text" name="txtNewuser"</td></tr>
					<tr><td align="right">E-Mail Address</td><td><input type="email" name="txtEmail"</td></tr>
					<tr><td align="right">Password</td><td><input type="password" name="txtNewpassword"</td></tr>
					<tr><td align="right">Confirm Password</td><td><input type="password" name="txtConfimpassword"</td></tr>
					<tr><td></td><td><input type="submit" name="btnCreate" value = "Sign Up"</td></tr>
			</table>
		</form>				
	</div>


<?php
	try{
		if(isset($_POST['btnLogging'])){
			if(!empty($_POST['txtUsername'])){
				$loggingname = validation($_POST['txtUsername']);				
			}else{
				throw new Exception("Username cannot be blank...");
				exit();
			}
			
			if(!empty($_POST['txtPassword'])){
				$loggingpass = validation($_POST['txtPassword']);				
			}else{
				throw new Exception("Password cannot be blank...");
			    exit();
			}
			
			$status = select_logging_data($loggingname,$loggingpass);
			if($status == true){
				//echo $status;
				echo "Successfully Logged to the system..";
				header('Location: ../presentation_layer/home.php');
				$_SESSION['Username'] = $loggingname;
				$_SESSION['Loggin_status'] = 1;
			}
			else{
				throw new Exception("Please check your user name and password..");
			}
			$status = null;
		}	
//=========================================================================================================			
		if(isset($_POST['btnCreate'])){
			if(!empty($_POST['txtNewuser'])){
				$username = validation($_POST['txtNewuser']);				
			}else{
				throw new Exception("Username cannot be blank...");
				//exit();
			}
			
			if(!empty($_POST['txtEmail'])){
				$useremail= validation($_POST['txtEmail']);				
			}else{
				throw new Exception("Email cannot be blank...");
			    exit();
			}
			
			if(!empty($_POST['txtNewpassword'])){
				$userpassword = validation($_POST['txtNewpassword']);				
			}else{
				throw new Exception("Password cannot be blank...");
				exit();
			}
			
			if(!($_POST['txtNewpassword'] == $_POST['txtConfimpassword'])){
				throw new Exception("passwords are not matching..");
				exit();
			}
			
			$status = user_availablity($username,$useremail);
			
			while($status){
				
				print_r($status['Username']);
				/*if($status[Username] == $username]){
					throw new Exception("User name is not available..");
					exit();
				}elseif($status[Email] == $status[Email]){
					throw new Exception("This email has an account already..");
					exit();
				}else{
					echo"Success...";
					exit();
				}*/
				
			}	
		
		}	
	}
	catch(Exception $e){
				echo "Error :". $e->getMessage();
		}
		
		
		
?>

</body>
</html>
