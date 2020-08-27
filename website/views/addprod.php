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
		<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title>Produits | BarberTools</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
	</head>	
	<body class="sb-nav-fixed">
		<?php include_once 'includes/nav-top-ad.php';?>
		<div id="layoutSidenav">
			<?php include_once 'includes/sidenav.php';?>
			<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Produits</h1>
                        <div class="card mb-4">
                        <form  method="POST" action="../controllers/produit-controller.php">
								<div class="modal-header">
									<h5 class="modal-title">
										Ajouter des produits
									</h5>
								</div>
								<div class="modal-body"  >
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label for="">Nom de produit</label>
												<input type="text" name="prName" id="prName" class="form-control" placeholder="" aria-describedby="helpId">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label for="">Discription</label>
												<textarea class="form-control" name="prDescription" id="prDescription" rows="3"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											<div class="form-group">
												<label for="">Prix</label>
												<input type="text" name="prPrice" id="prPrice" class="form-control" placeholder="" aria-describedby="helpId">
											</div>
										</div>
										<div class="col-4">						
											<label for="">Catégorie</label>
											<select class="form-control" name="prCateg" id="prCateg">
												<option>Default select</option>
												<option>Default</option>
												<option>Default select</option>
												<option>select</option>
											</select>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="">image</label>
												<input type="file" class="form-control-file" name="prImage" id="prImage" placeholder="" aria-describedby="fileHelpId">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<input type="submit" name="addItem" class="btn btn-primary" value="Enregistrer">
									</div>
								</div>
							</form>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
		</div>


		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
	</body>
</html>