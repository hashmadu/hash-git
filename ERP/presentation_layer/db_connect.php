<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
	class dbcon{
		
	private static
		$server = "localhost",
		$user   = "root",
		$password= "root",
		$database= "db_test1",
		$db_type = "mysql",
		$conn = null;
	
			
	/*	public static function set_sever($value){
			self::$server = $value;
		}
		public static function set_user($value){
			self::$user = $value;
		}
		public static function set_password($value){
			self::$password = $value;
		}
		public static function set_database($value){
			self::$database = $value;
		}
		public static function set_dbtype($value){
			self::$db_type = $value;
		}
		*/
//===========================================================================================	
		public static function exec($strsql){
			
			try{				
				if(self::$conn == null){
					self::$conn = new PDO(self::$db_type.':host='.self::$server.';dbname='.self::$database,self::$user,self::$password);
					self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					self::$conn->exec($strsql);
					//echo "connected successfully...";
				}							
			}
			catch(PDOException $e){
				echo "Error:".$e->getMessage();			
				exit;	
			}
		}
//============================================================================================		
		public static function fetch($strsql){
			try{				
				if(self::$conn == null){
					self::$conn = new PDO(self::$db_type.':host='.self::$server.';dbname='.self::$database,self::$user,self::$password);
					self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$data = self::$conn->prepare($strsql);
					$result = $data->execute();
					
					$result = $data->fetch(PDO::FETCH_OBJ);
					if(!empty($result)){
						return $result;
					}else{
						return false;
					}
				}							
			}
			catch(PDOException $e){
				echo "Error:".$e->getMessage();			
				exit;	
			}
		}
	}
	
	
?>

</body>
</html>
