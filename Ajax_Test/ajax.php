<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
	
	header('Content-Ty	pe: text/xml');
	echo '<?xml version="1.0" encoding="UTF-8" standalone="YES" ?>';
	
	echo '<response>';
	
		 $food = $_GET['food'];
		 $foodarray = array('Mango','Banana','Apple','Orange','Graph');
		 if(in_array($food,$foodarray)){
			echo "We do have".$food;
		 }
		 elseif $food == "" {
			echo "Enter food name..... ....";
		 }
		 else{
			echo "We dont have that food..";
		 }
	
	echo '</response>';
?>



</body>
</html>
