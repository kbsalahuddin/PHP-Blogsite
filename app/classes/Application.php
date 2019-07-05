<?php
	
	namespace App\classes;
	use App\classes\Database;


	ini_set('display_errors', '0');     # don't show any errors for static call...
	error_reporting(E_ALL | E_STRICT);  # ...but do log them
	


	class Application{
		public function getAllPublishedBlogInfo(){
			$sql="SELECT * FROM blogs WHERE status='published'";
			if(mysqli_query(Database::dbConnection(), $sql) ) {
				$queryResult=mysqli_query(Database::dbConnection(),$sql);
				return $queryResult;
			}else{
				die('Query problem'.mysqli_query(Database::dbConnection()));

			}
		}
	}
?>