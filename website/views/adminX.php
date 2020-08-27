<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}

include_once('../models/users.php');

$user = new User();

//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);
if($row['groupID']==0){
	header('location: account.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
</head>
<body>	
	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light ">
				<div class="sidebar-sticky pt-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link " href="index.php"><img src="../public/assets/images/logo1.png" width=100></a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="admin.php">
							<i class="fas fa-tachometer-alt nav-icon"></i>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="order.php">
								<i class="fa fa-file" aria-hidden="true"></i>
								Orders
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="category.php">
								<i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
								Catégorie
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="produits.php">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								Produits
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fa fa-users" aria-hidden="true"></i>
								Users
							</a>
						</li>
					</ul>

					<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
						<span>Saved reports</span>
						<a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
							<span data-feather="plus-circle"></span>
						</a>
					</h6>
					<ul class="nav flex-column mb-2">
						<li class="nav-item">
							<a class="nav-link" href="#">
							<span data-feather="file-text"></span>
							Current month
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
							<span data-feather="file-text"></span>
							Last quarter
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
							<span data-feather="file-text"></span>
							Social engagement
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
							<span data-feather="file-text"></span>
							Year-end sale
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Dashboard</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group">
                            <dt class="dropdown-toggle mr-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hi <a class="text-warning" type="button"><b><?php echo $row['username'];?></b></a>
                            </dt>
                            &nbsp;
                            <div class="dropdown-menu dropdown-menu-right" id="btn-down">
                                <a href="login.php" class="dropdown-item" type="button">
                                    <i class="fa fa-user" aria-hidden="true"></i> 
									Account
                                </a>
                                <a href="../controllers/logout.php" class="dropdown-item" type="button">
                                    <i class="fas fa-sign-out-alt"></i> 
									Logout
                                </a>
                            </div>
                        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="card text-white bg-success mb-3">
							<div class="card-body">
								<h5 class="card-title">Ventes</h5>
								<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card text-white bg-warning mb-3">
							<div class="card-body">
								<h5 class="card-title">Stock</h5>
								<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card text-white bg-secondary mb-3">
							<div class="card-body">
								<h5 class="card-title">Commentaires</h5>
								<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card text-white bg-danger mb-3">
							<div class="card-body">
								<h5 class="card-title">Clients</h5>
								<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							</div>
						</div>
					</div>
				</div>
				
				<h2 class="mt-4">Orders</h2>
				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th>#</th>
								<th>Order</th>
								<th>Date</th>
								<th>Status</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</main>
		</div>
	</div>


	<?php 
    include_once "includes/footer.php";
    
    // Optional JavaScript 
    // jQuery first, then Popper.js, then Bootstrap JS 
    include_once "includes/scripts.php";
    ?>
</body>
</html>