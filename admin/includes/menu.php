<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<div class="container">
  			<a class="navbar-brand" href="#">Navbar</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
 		 	</button>

	  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
	   			<ul class="navbar-nav mr-auto">
	      			<!--<li class="nav-item active">
	       				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="#">Link</a>
	      			</li>-->
	      			<li class="nav-item dropdown">
	        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category Info
	        			</a>
	        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          				<!--<a class="dropdown-item" href="#">Action</a>-->
	          				<a class="dropdown-item" href="add-category.php">Add Category</a>
	          				<div class="dropdown-divider"></div>
	          				<a class="dropdown-item" href="manage-category.php">Manage Category</a>
	        			</div>
	      			</li>
	      			<li class="nav-item dropdown">
	        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog Info
	        			</a>
	        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          				<!--<a class="dropdown-item" href="#">Action</a>-->
	          				<a class="dropdown-item" href="add-blog.php">Add Blog</a>
	          				<div class="dropdown-divider"></div>
	          				<a class="dropdown-item" href="manage-blog.php">Manage Blog</a>
	        			</div>
	      			</li>
	      			<!--<li class="nav-item">
	        			<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
	      			</li>-->
	    		</ul>
	    		<form class="form-inline my-2 my-lg-0">
	      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    		</form>
	    		<ul class="navbar-nav">
	    			<li class="nav-item dropdown">
	        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?>
	        			</a>
	        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          				<a href="?logout=true" class="dropdown-item">Logout</a>
	        			</div>
	      			</li>
	    		</ul>
	  		</div>
  		</div>
</nav>