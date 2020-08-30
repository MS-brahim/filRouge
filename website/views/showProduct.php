<?php
session_start();
include_once('../models/cat-class.php');
include_once('../models/users.php');
include_once '../controllers/showProductById.php';

$user = new User();
if (isset($_SESSION['user'])){
//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>BarberTools</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <?php include_once "includes/navbar.php"?>
    <div class="container mt-5 pt-5">
        <div class="row">
            <?php 
            $categ = new Product();
            $mr = $categ->selectProd("category");
            foreach ($mr as $catRows){
            ?>
            <a href="show-product.php"><span class="mr-2"> <?php echo $catRows['catName']; ?> </span></a>
            <?php } ?>
        </div>
        <h1 class="text-center py-3 mt-5"><b><?php echo $prodById['prodName'];?> Coupe Finition</b></h1>
        <div class="row mt-3">
            <div class="col-sm-6">
                <img class="border border-secondary" src="../public/images/<?php echo $prodById['image'];?>" width=100% alt="">
            </div>
            <div class="col-sm-6 mt-3">
                <div class="row">
                    <div class="col-3">
                        <img class="border border-secondary" src="../public/images/<?php echo $prodById['image'];?>" width=100% alt="">
                    </div>
                    <div class="col-3">
                        <img class="border border-secondary" src="../public/images/<?php echo $prodById['image1'];?>" width=100% alt="">
                    </div>
                    <div class="col-3">
                        <img class="border border-secondary" src="../public/images/<?php echo $prodById['image2'];?>" width=100% alt="">
                    </div>
                    <div class="col-3">
                        <img  class="border border-secondary" src="../public/images/<?php echo $prodById['image3'];?>" width=100% alt="">
                    </div>
                </div>
                <div class="my-3">
                    <h4><b><?php echo $prodById['prodName'];?></b></h4>
                    <h3><b><?php echo $prodById['price'];?> Dhs</b></h3>
                    <h3 class="text-secondary"><b><del><?php echo $prodById['oldP'];?> Dhs</del></b></h3>
                    <p><?php echo $prodById['description'];?></p>
                    <div class="row form-group">
                      <label class="col-2 mr-2" for="">Quantité </label>
                      <div class="col-2">
                        <select class="w-100" name="" id="">
                            <option value="">1</option>
                            <option value="">1</option>
                            <option value="">1</option>
                            <option value="">1</option>
                            <option value="">1</option>
                        </select>
                      </div>
                      <div class="col-4">
                            <?php $statProd = $prodById['statusProd']; if($statProd ==1){ ?>
                            <?php echo '<h5 class="text-success"><b>En Stock</b></h5>';?>
                            <?php }else{ echo '<h5 class="text-secondary"><b>Not available</b></h5>'; ?>
                            <?php }?>
                      </div>
                      
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-warning">Ajouter au panier</button>
                        <button type="button" class="btn btn-success">Achéte</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5">
        <h2>Description</h2>
                <div class="mt-4">
                    <p><b><?php echo $prodById['description'];?></b></p>
                <p><?php echo $prodById['descriptionGeneral'];?></p>
                </div>
                
            
        </div>

    </div>
    
</body>
</html>