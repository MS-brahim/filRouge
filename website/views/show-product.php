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
    <?php include_once "includes/navbar.php";?>
    <section class="pt-5">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-sm-6 " > 
                    <div class="">
                        <div class="card-body"  style="height:320px;width:auto" >
                            <img class="border border-secondary" src="../public/images/tenduses/wahl19194.jpg"alt="" width=100%>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="">
                        <div class="card-body">
                            <img src="../public/images/tenduses/wahl19194.jpg" alt="" width=100%>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php 
                    include_once "../models/prod-class.php";
                    $prod = new Product();
                    $mr = $prod->selectProd("products");
                    foreach ($mr as $prodRows){
                    ?>	
                    <div class="col-md-4 my-4 ">
                        <div class="fadeInbox">
                            <div class=" border border-secondary pb-3">
                                <div>
                                    <img class="imageFade" src="../public/images/<?php echo $prodRows['image'];?>" alt="Lights" width=100%>
                                    <div class="middleBtn">
                                        <a href="showProduct.php?id=<?php echo $prodRows['prodId'];?>" type="button" class="btn btn-success"> Achete </a>
                                    </div>
                                    <div class="caption my-3 pl-2">
                                        <a class="mb-2"><?php echo $prodRows['prodName'];?></a><br>
                                        <b><?php echo $prodRows['price'];?> Dh</b> 
                                        <small  class="ml-2"><del><?php echo $prodRows['oldP'];?> Dh</del></small>
                                    </div>
                                    <button type="button" class="btn btn-warning ml-2 ">Ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <?php 
    include_once "includes/footer.php";
    
    // Optional JavaScript 
    // jQuery first, then Popper.js, then Bootstrap JS 
    include_once "includes/scripts.php";
    ?>
</body>
</html>