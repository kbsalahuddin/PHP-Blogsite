<?php 
	//after admin login validation at adminLoginCheck(), it will start..
	session_start();
	if(isset($_SESSION['id'])){
		header('Location:dashboard.php');
	}
	

	require_once '../vendor/autoload.php';
	$login= new App\classes\Login;//classname
	$message='';
	if(isset($_POST['btn'])){
		$message=$login->adminLoginCheck($_POST);//object is calling the class when btn is pressed
		//
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
	</head>
	<body>
		<div class="container" style="margin-top: 200px;">
			<div class="row">
				<div class="col-sm-6 mx-auto">
					<div class="card">
						<div class="card-title">
							<p style="text-align: center"><b>Admin Panel</b></p>
							<h3 style="text-align: center"><?php echo $message;?></h3>
						</div>
						<div class="card-body">
							
							<form action="" method="POST">
								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
								    <div class="col-sm-9">
								      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="inputPassword3" class="col-sm-3 col-form-label" >Password</label>
								    <div class="col-sm-9">
								      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" >
								    </div>
								  </div>
								  
								  <div class="form-group row">
								    <div class="col-sm-12">
								      <button type="submit" class="btn btn-success btn-block"  name="btn" >Sign in</button>
								    </div>
								  </div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>