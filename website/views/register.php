
<?php
	//start session
	session_start();
    
    //redirect if logged in
    
	// if(isset($_SESSION['user'])){
	// 	header('location: account.php');
    // }
   
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Login using OOP Approach</title>
    <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <?php include_once "includes/navbar.php"?>

    <!-- start content register  -->
    <section class="conetnt-search">
        <div class="container ">
            <form class="form-search" method="POST" action="../controllers/register-controller.php">                                                           
                <div class="row justify-content-md-center d-flex flex-column">
                    <div class="form-group">
                        <input type="text" name="username" id="" class="form-control" placeholder="username" aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Your Adress email" aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="***********" aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password1" id="password1" class="form-control" placeholder="***********" aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" value="Register" class="col btn btn-dark">
                    </div>
                    <p>have an account ? <a href="login.php">Login</a> New</p>
                </div>
            </form>
        </div>
    </section>
    <!-- end content register  -->
    
    <?php 
    include_once "includes/footer.php";
    
    // Optional JavaScript 
    // jQuery first, then Popper.js, then Bootstrap JS 
    include_once "includes/scripts.php";
    ?>
</body>
</html>