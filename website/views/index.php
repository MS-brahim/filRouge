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
                        <ul class="list-group">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" type="button"  id="navbardrop" data-toggle="dropdown">
                                    Catégories
                                </a>
                                <div class="dropdown-menu w-100">
                                    <?php 
                                    include_once "../models/cat-class.php";
                                    $categ = new Category();
                                    $mr = $categ->selectProd("category");
                                    foreach ($mr as $catRows){
                                    ?>
                                    <a class="dropdown-item" href="show-product.php?id=<?php echo $catRows['catId'];?>"><i class="fas fa-hand-point-right"></i> <?php echo $catRows['catName']; ?></a>
                                    <?php }?>
                                </div>
                            </li>
                        </ul>
                        <div class="card text-left mt-4 h-75">
                          <img class="card-img-top" src="../public/assets/images/ch4.jpg" alt="">
                          <div class="card-body">
                            <h4 class="card-title">Chair</h4>
                            <p class="card-text">900 Dh</p>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
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
                    <div class="col-sm-3 ">
                        <div class="d-flex flex-column">
                            <div class="card text-left mb-3">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Body</p>
                              </div>
                            </div>
                            <div class="card text-left mb-3">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Body</p>
                              </div>
                            </div>
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Body</p>
                              </div>
                            </div>
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