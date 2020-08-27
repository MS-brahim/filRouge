<?php
include_once "../controllers/admin-controller.php";
include "../models/prod-class.php";
$prodObj = new Product();
$id = $_GET['U_ID'];
// $prodObj->updateProd();
$resault = $prodObj->getProdId($id);
$data = mysqli_fetch_assoc($resault);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit | Produits</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

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
								<i class="fa fa-home" aria-hidden="true"></i>
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
					<h1 class="h2">Produits</h1>
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

				<!-- add new item -->
				<div class="modal-content my-4">
							<form  method="POST" >
								<div class="modal-header">
									<h5 class="modal-title" type="button">
										Modifie des produits
										<i class="fa fa-plus-circle" aria-hidden="true"></i>
									</h5>
								</div>
								<div class="modal-body" >
									<div class="row">
                                        <input type="hidden" name="prodId" value="<?php echo $data['prodId']; ?>">
										<div class="col-12">
											<div class="form-group">
												<label for="">Nom de produit</label>
												<input type="text" name="prName" id="prName" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $data['prodName']; ?>">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label for="">Discription</label>
												<input class="form-control" name="prDescription" id="prDescription" rows="3" value="<?php echo $data['description']; ?>"></input>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											<div class="form-group">
												<label for="">Prix</label>
												<input type="text" name="prPrice" id="prPrice" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $data['price']; ?>">
											</div>
										</div>
										<div class="col-4">						
											<label for="">Catégorie</label>
											<select class="form-control" name="prCateg" id="prCateg" value="<?php echo $data['catId']; ?>">
												<option>Default select</option>
												<option>Default select</option>
												<option>Default select</option>
												<option>Default select</option>
											</select>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="">image</label>
												<input type="file" class="form-control-file" name="prImage" id="prImage" placeholder="" aria-describedby="fileHelpId" value="<?php echo $data['image']; ?>">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<input type="submit" name="update" class="btn btn-primary" value="Enregistrer">
									</div>
								</div>
							</form>
						</div>
				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
                                <th class="text-center"><i class="fas fa-edit"></i></th>
								<th class="text-center"><i class="fas fa-trash-alt"></i></th>
							</tr>
						</thead>
						<tbody>
						<?php 
						include_once "../models/prod-class.php";
						$prod = new Product();
						$mr = $prod->selectProd("products");
						foreach ($mr as $prodRows){
							?>
						
                            <tr>
                                <td><img src="../public/images/<?php echo $prodRows['image'];?>" width=60</td>
                                <td><?php echo $prodRows['prodName'];?></td>
                                <td><?php echo $prodRows['description'];?></td>
                                <td><?php echo $prodRows['price'];?></td>
								<td width=40 >
									<a type="button" href="../views/update.php?U_ID=<?php echo $prodRows['prodId'];?>" class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-edit"></i>
									</a>
								</td>
								<td width=40>
									<a type="button" href="../controllers/delete.php?D_ID=<?php echo $prodRows['prodId'];?>" class="btn btn-outline-danger btn-sm">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
                            </tr>
						<?php	}?>
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
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
</body>
</html>