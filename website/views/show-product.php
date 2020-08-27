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
                    <div class="card"  style="height:50%">
                        <div class="card-body"  style="height:50%; background-image: url('../public/images/tenduses/wahl19194.jpg')" >
                            <img src="../public/images/tenduses/wahl19194.jpg"alt="" width=100%>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="../public/images/tenduses/wahl19194.jpg" alt="" width=100%>
                        </div>
                    </div>
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