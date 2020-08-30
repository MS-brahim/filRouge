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
		<title>Categorie | BarberTools</title>
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
                        <h1 class="mt-4">Catégories</h1>
                        <!-- Button trigger modal -->
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="../controllers/category-controller.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ajouter nouveau catégorie</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nom de catégorie</label>
                                                <input type="text" name="catname" id="" class="form-control" placeholder="EX : Tendeusse ..." aria-describedby="helpId">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea type="text" name="catdescip" id="" cols="" rows="5" class="form-control" placeholder="Description ..." aria-describedby="helpId"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="addItem" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ENd Button trigger modal -->
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modelId">
                                    Ajouter nouveau catégorie +
                                </button>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom</th>
                                                <th>Description </th>
												<th width="20">Modifier</th>
                                                <th width="20">Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom</th>
                                                <th>Description </th>
												<th width="20">Modifier</th>
                                                <th width="20">Supprimer</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
											<?php 
												include_once "../models/prod-class.php";
												$categ = new Product();
												$mr = $categ->selectProd("category");
												foreach ($mr as $catRows){
												?>
                                            <tr>
                                                <td><?php echo $catRows['catId'];?></td>
                                                <td><?php echo $catRows['catName'];?></td>
                                                <td><?php echo $catRows['description'];?></td>
                                                <td>
                                                    <a type="button" href="../views/cat-update.php?U_ID=<?php echo $catRows['catId'];?>" class="btn btn-outline-secondary btn-sm">
                                                        <i class="fas fa-edit "></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a type="button" href="../controllers/cat-delete.php?D_ID=<?php echo $catRows['catId'];?>" class="btn btn-outline-secondary btn-sm">
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