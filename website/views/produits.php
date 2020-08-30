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
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example 
                                <a class="float-right" href="addprod.php"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Nom de produit</th>
                                                <th>Catégorie</th>
                                                <th>Description </th>
												<th>Prix <small>(Dh)</small></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>Image</th>
                                                <th>Nom de produit</th>
                                                <th>Catégorie</th>
                                                <th>Description </th>
												<th>Prix <small>(Dh)</small></th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
											<?php 
												include_once "../models/prod-class.php";
												$prod = new Product();
												$mr = $prod->selectProd("products");
												foreach ($mr as $prodRows){
												?>
                                            <tr>
                                                <td><img src="../public/images/<?php echo $prodRows['image'];?>" width=60></td>
                                                <td><?php echo $prodRows['prodName'];?></td>
                                                <td><?php echo $prodRows['catId'];?></td>
                                                <td><?php echo $prodRows['description'];?></td>
                                                <td><?php echo $prodRows['price'];?><small> <del><?php echo $prodRows['oldP'];?></del></small></td>
                                                <td class="d-flex justify-content-around">
                                                    <a type="button" href="../views/update.php?U_ID=<?php echo $prodRows['prodId'];?>" class="btn btn-outline-secondary btn-sm">
                                                        <i class="fas fa-edit    "></i>
                                                    </a>
                                                    <a type="button" href="../controllers/delete.php?D_ID=<?php echo $prodRows['prodId'];?>" class="btn btn-outline-secondary btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
											<?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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