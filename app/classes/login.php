<?php 
namespace App\classes;
/**
* 
*/
//ini_set('display_errors', '0');     # don't show any errors for static call...
//error_reporting(E_ALL | E_STRICT);  # ...but do log them



use App\classes\Database;
class Login
{
	
	public function adminLoginCheck($data)//$data array carrying email and pass from admin login page
	{
		$email=$data['email'];
		$password= md5($data['password']);
		$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
		if(mysqli_query(Database::dbConnection(),$sql)){
				$queryResult= mysqli_query(Database::dbConnection(),$sql);
				$user=mysqli_fetch_assoc($queryResult);
				if($user){
					session_start();
					$_SESSION['id']=$user['id'];
					$_SESSION['name']=$user['name'];

					header('Location: dashboard.php');
				}else{
					$message="Please enter the correct email or password";
					return $message;
				}
				
		}else{
				die('Query problem'.mysqli_error(Database::dbConnection()));
		}
	}
	
	//from dashboard.php
	public function adminLogout(){
		unset($_SESSION['id']);	
		unset($_SESSION['name']);
		
		header('Location: index.php');
	}
	

	public function addCategoryInfo($data){
		//$email=$data['email'];
		//$password= md5($data['password']);
		$sql="INSERT INTO categories (category_name,category_description,status) VALUES('$data[category_name]','$data[category_description]','$data[status]')";
		if(mysqli_query(Database::dbConnection(),$sql))
			{
					
					$message='Insertion was successful!';
					return $message;
					header('Location: add-category.php');
				
			}else
				
			{
					die('Query problem'.mysqli_error(Database::dbConnection()));
			}
	}
	

	//for getting all the records to show in a table on a page
	public function showCatInfo(){
		$sql="SELECT * FROM categories";
		if(mysqli_query(Database::dbConnection(), $sql)){
			$showCatInfo= mysqli_query(Database::dbConnection(), $sql);
			return $showCatInfo;
		}else{
			die('Query Failed'.mysqli_error(Database::dbConnection()));
		}
	}
	

	//query request after edit button click
	public function getCatInfoById($idFromEditBtn){
		$sql= "SELECT * FROM categories WHERE id='$idFromEditBtn'";
		
		if(mysqli_query(Database::dbConnection(), $sql)){
			$res= mysqli_query(Database::dbConnection(), $sql);
			return $res;
		}else{
			die('Query Failed'.mysqli_error(Database::dbConnection()));
		}
	}


	public function updateCatInfo($dat){
		$sql= "UPDATE categories SET category_name='$dat[category_name]', category_description='$dat[category_description]', status='$dat[status]' WHERE id='$dat[id]'";
		//query execution code
		if(mysqli_query(Database::dbConnection(), $sql))
		{
			header('Location: manage-category.php');
			
		}else
		{
			die('Query Problem'.mysqli_error(Database::dbConnection()));
		}
	}
	public function deleteCatInfo($idToDelete)
	{
		
		$sql = "DELETE FROM categories WHERE id='$idToDelete'";
		if(mysqli_query(Database::dbConnection(),$sql))
		{
			$message='User Information deleted successfully!';
			return $message;
		}else
		{
			die('Query Problem'.mysqli_error(Database::dbConnection()));
		}
	}

	//add blog information
	public function addBlogInfo($data){
		//$link=mysqli_connect('localhost','root','','image_upload');
		$fileName=$_FILES['blog_image']['name'];
		$directory='../assets/images/';
		$imageUrl=$directory.$fileName; 
			$fileType= pathinfo($fileName,PATHINFO_EXTENSION);
		$check=getimagesize($_FILES['blog_image']['tmp_name']);
		
		if($check){
			if(file_exists($imageUrl)){
				die('this file already exists');
			}else{
				if($_FILES['blog_image']['size']>1000000){
					die('file size is greater than what is recommended');
				}else{
					if($fileType != 'JPG' && $fileType != 'PNG' && $fileType != 'jpg' && $fileType != 'png'){	
						die('image type has to be only .jpg or .png ');
					}else{
						move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
						$sql="INSERT INTO blogs (cat_id,blg_title,st_des, lg_des, blog_image,status) VALUES('$data[cat_id]','$data[blg_title]','$data[st_des]','$data[lg_des]','$imageUrl','$data[status]')";
						if(mysqli_query(Database::dbConnection(),$sql)){
					
							$message='Insertion was successful!';
						return $message;
						header('Location: add-blog.php');
				
			}else
				
			{
					die('Query problem'.mysqli_error(Database::dbConnection()));
			}
						
					}
				}
			}

		}else{
			die('Please choose an image file');
		}






		//$email=$data['email'];
		//$password= md5($data['password']);
		
	}

	

	public function getAllPublishedCategoryInfo(){
		$sql="SELECT * FROM categories WHERE status='published' ";
		if(mysqli_query(Database::dbConnection(),$sql)){
			$queryResult=mysqli_query(Database::dbConnection(),$sql);
			return $queryResult;
		}else{
			die('query problem'.mysqli_error(Database::dbConnection()));
		}
	}


	public function showBlogInfo(){
		$sql="SELECT b.*,c.category_name FROM blogs as b, categories as c WHERE b.cat_id=c.id";//joint query..
		
		if(mysqli_query(Database::dbConnection(), $sql)){
			$showBlogInfo= mysqli_query(Database::dbConnection(), $sql);
			return $showBlogInfo;
		}else{
			die('Query Failed'.mysqli_error(Database::dbConnection()));
		}
	}




	//for showing detailed view of manage-blog.php pg
	public function getBlogInfo($idFromView){
		$sql= "SELECT * FROM blogs WHERE id='$idFromView'";
		
		if(mysqli_query(Database::dbConnection(), $sql)){
			$res= mysqli_query(Database::dbConnection(), $sql);
			return $res;
		}else{
			die('Query Failed'.mysqli_error(Database::dbConnection()));
		}
	}

	//after clicking update btn at manage-edit-blog.php
	public function updatingBlogInfo($data){
		$blogImage= $_FILES['blog_image']['name'];
		if($blogImage)
		{

				$sql="SELECT * FROM blogs WHERE id='$data[id]'";
				$queryResult=mysqli_query(Database::dbConnection(),$sql);
				$blogInfo=mysqli_fetch_assoc($queryResult);	
				unlink($blogInfo['blog_image']);

				$fileName=$_FILES['blog_image']['name'];
				$directory='../assets/images/';
				$imageUrl=$directory.$fileName; 
					$fileType= pathinfo($fileName,PATHINFO_EXTENSION);
				$check=getimagesize($_FILES['blog_image']['tmp_name']);
				
				if($check){
					if(file_exists($imageUrl)){
						die('this file already exists');
					}else
					{
						if($_FILES['blog_image']['size']>1000000)
						{
							die('file size is greater than what is recommended');
						}else
						{
							if($fileType != 'JPG' && $fileType != 'PNG' && $fileType != 'jpg' && $fileType != 'png'){	
								die('image type has to be only .jpg or .png ');
						}else
							{
								move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
								
								$sql="UPDATE blogs SET cat_id= '$data[cat_id]', blg_title='$data[blg_title]', st_des='$data[st_des]', lg_des='$data[lg_des]', blog_image='$imageUrl', status='$data[status]' WHERE id='$data[id]'";
								
								if(mysqli_query(Database::dbConnection(),$sql))
								{
							
									//$message='Insertion was successful!';
									//return $message;
									header('Location:manage-blog.php');
						
								}else
						
								{
									die('Query problem'.mysqli_error(Database::dbConnection()));
								}
								
							}
						}
					}

				}else
				{
					die('Please choose an image file');
				}
		}else{
			$sql="UPDATE blogs SET cat_id= '$data[cat_id]', blg_title='$data[blg_title]', st_des='$data[st_des]', lg_des='$data[lg_des]', status='$data[status]' WHERE id='$data[id]'";
			if(mysqli_query(Database::dbConnection(), $sql)){
				$message='Update Successfull.';
				header('Location:manage-blog.php');
			}else{
				die("Query Problem".mysqli_query(Database::dbConnection()));
			}
		}




	}	
}
?>