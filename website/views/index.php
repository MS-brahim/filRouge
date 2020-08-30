<?php
session_start();
include_once('../models/users.php');

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

    <!-- start content homepage  -->
    <section class="slideBg" style="background-image: url('../public/assets/images/2.jpg')">
        <div class="SlideContent">
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="list-group m-4">
                            <?php 
                            include_once "../models/prod-class.php";
                            $categ = new Product();
                            $mr = $categ->selectProd("category");
                            foreach ($mr as $catRows){
                            ?>	
                            <a href="show-product.php" class="list-group nav-link text-white">
                                 <span><?php echo $catRows['catName'];?></span>
                            </a>
                            <?php }?>
                            <a href="produits.php" class="list-group nav-link text-white">Les Tendeuses</a>
                            <a href="#" class="list-group nav-link text-white">Les Tendeuses</a>
                            <a href="#" class="list-group nav-link text-white">Les Tendeuses</a>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div id="carouselId" class="carousel slide " data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img src="../public/assets/images/slide1.jpg" width="100%">
                                </div>
                                <div class="carousel-item">
                                    <img src="../public/assets/images/ch4.jpg" width="100%" >
                                </div>
                                <div class="carousel-item">
                                    <img src="../public/assets/images/2.jpg" width="100%">
                                </div>
                                <div class="carousel-item">
                                    <img src="../public/assets/images/sc.jpg" width="100%">
                                </div>
                            </div>
                            <ol class="carousel-indicators mb-n5 pb-2">
                                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselId" data-slide-to="1"></li>
                                <li data-target="#carouselId" data-slide-to="2"></li>
                                <li data-target="#carouselId" data-slide-to="3"></li>
                            </ol>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        
    </section>										
    <section>
        <div class="container my-5">
            <h1 class="text-center"><b>Derniers produits</b></h1>
            <div class="row py-5 ">
                <?php 
                include_once "../models/prod-class.php";
                $prod = new Product();
                $mr = $prod->selectProd3();
                foreach ($mr as $prodRows){
                ?>	
                <div class="col-md-4">
                    <div class="thumbnail border border-light pl-2">
                        <a href="showProduct.php?id=<?php echo $prodRows['prodId'];?>">
                            <img src="../public/images/<?php echo $prodRows['image'];?>" alt="Lights" width=100%>
                            <div class="caption">
                                <a><?php echo $prodRows['prodName'];?></a><br>
                                <span><?php echo $prodRows['price'];?> Dh</span> 
                                <small><del><?php echo $prodRows['oldP'];?> Dh</del></small>
                            </div>
                        </a>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <h1 class="text-center"><b>Produits populaires</b></h1>
            <div class="row py-5 ">
                <?php 
                include_once "../models/prod-class.php";
                $prod = new Product();
                $mr = $prod->selectProd4();
                foreach ($mr as $prodRows){
                ?>	
                <div class="col-md-3" style="max-width:25%">
                    <div class="thumbnail border border-light pl-2">
                        <a href="showProduct.php?id=<?php echo $prodRows['prodId'];?>">
                            <img src="../public/images/<?php echo $prodRows['image'];?>" alt="Lights" width=100%>
                            <div class="caption">
                                <a><?php echo $prodRows['prodName'];?></a><br>
                                <span><?php echo $prodRows['price'];?> Dh</span> 
                                <small><del><?php echo $prodRows['oldP'];?> Dh</del></small>
                            </div>
                        </a>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    
    <!-- start content homepage  -->

    <?php 
    include_once "includes/footer.php";
    
    // Optional JavaScript 
    // jQuery first, then Popper.js, then Bootstrap JS 
    include_once "includes/scripts.php";
    ?>
</body>
</html>