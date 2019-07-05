<?php
	$message='';
	session_start();
	if($_SESSION['id']==null){
		header('Location: index.php');
	}

	require_once '../vendor/autoload.php';
	$login=new App\classes\Login;
	$addBlog=new App\classes\Login;
	$adBlog=new App\classes\Login;

	$queryResult=$adBlog->getAllPublishedCategoryInfo();

	if(isset($_POST)){
		if(isset($_POST['btn'])){
		$message= $addBlog->addBlogInfo($_POST);
		
	}
	}

	//active after clicking the logout btn
	if(isset($_GET['logout'])){
		$login->adminLogout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard-Add Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	
</head>
<body>
	<?php include 'includes/menu.php';?>

	<div class="container" style="margin-top: 10px;">
			<div class="row">
				<div class="col-sm-10 mx-auto">
					<div class="card">
						
						<div class="card-body">
							
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
								    <div class="col-sm-9">
								    	<select name="cat_id" class="form-control">
								    		<option>
								    			---Select Category---
								    		</option>
								    		<?php while ($category=mysqli_fetch_assoc($queryResult)){?>
								    		<option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option><?php }?>
								    		
								    	</select>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword3" class="col-sm-3 col-form-label" >Blog Title</label>
								    <div class="col-sm-9">
								    	<input type="text" name="blg_title" class="form-control"/>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label">Short Description</label>
								    <div class="col-sm-9">
								    	<textarea class="form-control" name="st_des"></textarea>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label">Long Description</label>
								    <div class="col-sm-9">
								    	<textarea class="form-control textarea" name="lg_des" rows="10"></textarea>
								    </div>
								</div>

								  
								<div class="form-group row">
								    <label class="col-sm-3 col-form-label" for="">Blog Image</label>
								    <div class="col-sm-9">
								      	<input type="file" name="blog_image" accept="image/*"></input>
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
									<div class="col-sm-8"></div>
									<div class="col-sm-4">
										<button type="submit" name="btn" class="btn btn-block btn-success">Add Blog</button>
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
	<!--for tinymce plugins above-->
	<script src="../assets/tinymce/js/tinymce/tinymce.min.js"></script>
 	<script>tinymce.init({selector:'.textarea'});</script>

	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>