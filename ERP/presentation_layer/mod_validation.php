<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
	function validation($value){
		$value = trim($value);
		$value = stripcslashes($value);
		$value = htmlspecialchars($value);
		return $value;
	}
?>

</body>
</html>
