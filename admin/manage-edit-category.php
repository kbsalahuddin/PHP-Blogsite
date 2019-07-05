<?php
	session_start();
	if($_SESSION['id']==null){
		header('Location: index.php');
	}
	//active after clicking the logout btn
	if(isset($_GET['logout'])){
		$login->adminLogout();
	}

	require_once '../vendor/autoload.php';
	$message='';
	


	//$idFromEditBtn= new App\classes\Login;
	$idFromEditBtn=$_GET['id'];
		$res=new App\classes\Login;
		$result=$res->getCatInfoById($idFromEditBtn);
		$catInfo= mysqli_fetch_assoc($result);

	//after update btn click
	$mes='';
	$message=new App\classes\Login;
	if(isset($_POST['btn'])){
		$mes=$message->updateCatInfo($_POST);
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Category</title>
	<meta charset="utf-8">
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
</head>
<body>
	<body>
		<?php include 'includes/menu.php';?>
		<div class="container" style="margin-top: 200px;">
			<div class="row">
				<div class="col-sm-6 mx-auto">
					<div class="card">
						<div class="card-title">
							<h4 style="text-align: center"><b>Editor Panel</b></h4>
							<p style="text-align: center"><?php echo $mes;?></p>
						</div>
						<div class="card-body">
							
							<form action="" method="POST">
								<table>
									<tr>
										<th>Category Name</th>
										<td>
											<input type="text" name="id" value="<?php echo $catInfo['id'];?>">
											<input type="text" name="category_name" value="<?php echo $catInfo['category_name'];?>">
										</td>
									</tr>
									<tr>
										<th>Category Description</th>
										<td>
											<textarea type="text" name="category_description" ><?php echo $catInfo['category_description'];?></textarea>
										</td>
									</tr>
									<tr>
										<th>Status</th>
										<td>
											<!--<input type="text" name="status" value="<?php echo $catInfo['status'];?>">-->
											<input type="radio" name="status" value="published">Published</input>
											<input type="radio" name="status" value="unpublished">Unpublished</input>
										</td>
									</tr>
									<tr>
										<th></th>
										<td>
											<input type="submit" name="btn" value="Update">
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</body>
</html>