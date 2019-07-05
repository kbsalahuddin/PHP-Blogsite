<?php
	session_start();
	if($_SESSION['id']==null){
		header('Location: index.php');
	}

	require_once '../vendor/autoload.php';
	$login= new App\classes\Login;
	$showBlog=new App\classes\Login;
	
	$show=$showBlog->showBlogInfo();


	//active after clicking the logout btn
	if(isset($_GET['logout'])){
		$login->adminLogout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard-Manage Blog</title>
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
  							<thead class="table-dark">
    							<tr>
								    <th scope="col">SL NO.</th>
								    <th scope="col">Category Name</th>
								    <th scope="col">Blog Title</th>
								    <th scope="col">Publication Status</th>
								    <th scope="col">Action</th>
    							</tr>
  							</thead>
  							<tbody>
    							<?php $i=1; 
    								while($manageB=mysqli_fetch_assoc($show)){ ?>
    							<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $manageB['category_name']; ?></td>
									<td><?php echo $manageB['blg_title']; ?></td>
									
									<td><?php echo $manageB['status']=='published'? 'Published': 'Unpublished' ; ?></td>
									<td>
										<button type="button" class="btn btn-info btn-sm">
											<a style="color:white;text-decoration:none"  href="manage-edit-blog.php?id=<?php echo $manageB['id'];?>">Edit</a>
										</button>
										<button type="button" class="btn btn-success btn-sm">
											<a style="color:white; text-decoration:none" href="manage-view-blog.php?id=<?php echo $manageB['id'];?>">View</a>
										</button>
        								<button type="button" class="btn btn-warning btn-sm">
        									<a style="color:black; text-decoration:none" href="?delete=true&id=<?php echo $manageB['id'];?>" onclick="return confirm('Are you sure you want to delete this row of records?');">Delete</a>
        								</button>
									</td>
								</tr>
								<?php } ?>
  							</tbody>
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
