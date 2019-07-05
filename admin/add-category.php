<?php
	session_start();
	if($_SESSION['id']==null){
		header('Location: index.php');
	}

	require_once '../vendor/autoload.php';
	$login=new App\classes\Login;
	$addCat=new App\classes\Login;
	
	$message='';
	//after btn submit is clicked down below form
	if(isset($_POST['btn'])){
		$message= $addCat->addCategoryInfo($_POST);
		
	}

	//active after clicking the logout btn
	if(isset($_GET['logout'])){
		$login->adminLogout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard-Add Category</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="">-->
</head>
<body>
	<?php include 'includes/menu.php';?>

	<div class="container" style="margin-top: 10px;">
			<p><?php echo $message;?></p>
			<div class="row">
				<div class="col-sm-8 mx-auto">
					<div class="card">
						
						<div class="card-body">
							
							<form action="" method="POST">
								<div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
								    <div class="col-sm-9">
								    	<input type="text" class="form-control" name="category_name">
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword3" class="col-sm-3 col-form-label" >Description</label>
								    <div class="col-sm-9">
								    	<textarea class="form-control" name="category_description"></textarea>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
								    <div class="col-sm-9">
								    	<input type="radio" name="status" value="published">Published</input>
								    	<input type="radio" name="status" value="unpublished">Unpublished</input>
								    </div>
								</div>

								  
								<div class="form-group row">
								    <div class="col-sm-3"></div>
								    <div class="col-sm-9">
								      	<button type="submit" class="btn btn-success btn-block" name="btn" >Save</button>
								    </div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
	</div>


	
	<script src="../assets/js/jquery-3.4.1.js"></script>
	<script src="../assets/js/bootstrap.bundle.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>