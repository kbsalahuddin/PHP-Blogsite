<?php
	session_start();
	if($_SESSION['id']==null){
		header('Location: index.php');
	}

	require_once '../vendor/autoload.php';
	$login= new App\classes\Login;
	$showBlog=new App\classes\Login;
	
	$show=$showBlog->showBlogInfo();
	

	//id from view btn click of manage-blog.php pg
	$forView= new App\classes\Login;
	$idFromView=$_GET['id'];
	$res=$forView->getBlogInfo($idFromView);
	$info=mysqli_fetch_assoc($res);

	//active after clicking the logout btn
	if(isset($_GET['logout'])){
		$login->adminLogout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard-Manage View</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="">-->
</head>
<body>
	<?php include 'includes/menu.php';?>

	<div class="container" style="margin-top: 10px;">
		<!--<p><?php echo $messa;?></p>-->
		<div class="row">
			<div class="col-sm-12 mx-auto">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered">
  							<tr>
  								<th>Blog ID</th>
  								<td><?php echo $info['id'];?></td>
  							</tr>
  							<tr>
  								<th>Blog Title</th>
  								<td><?php echo $info['blg_title'];?></td>
  							</tr>
  							<tr>
  								<th>Category Name</th>
  								<td><?php echo $info['cat_id'];?></td>
  							</tr>
  							<tr>
  								<th>Short Description</th>
  								<td><?php echo $info['st_des'];?></td>
  							</tr>
  							<tr>
  								<th>Long Description</th>
  								<td><?php echo $info['lg_des'];?></td>
  							</tr>
  							<tr>
  								<th>Blog Image</th>
  								<td><img src="<?php echo $info['blog_image'];?>" alt="" height="100" width="150" /></td>
  							</tr
  							<tr>
  								<th>Status</th>
  								<td><?php echo $info['status']=='published'? 'Published': 'Unpublished' ; ?></td>
  							</tr>
						</table>	
							

					</div>
				</div>
			</div>
		</div>
	</div>
	

	

	
	<script src="../assets/js/jquery-3.4.1.js"></script>
	<script src="../assets/js/bootstrap.bundle.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>


	
</body>
