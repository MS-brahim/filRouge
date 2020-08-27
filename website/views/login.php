
<?php
	//start session
	session_start();

	//redirect if logged in
	if(isset($_SESSION['user'])){

        if( $_SESSION['groupID']==1){
            header('location: admin.php');
        }else{
            header('location: account.php');
        }
	}
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

    <section class="conetnt-search">
        <div class="container ">
        <div class="text-center">
            <i class="fas fa-user-circle" style="font-size:130px;"></i>
        </div>
            <form class="form-search" method="POST" action="../controllers/login-controller.php">
                <div class="row justify-content-md-center d-flex flex-column">
                    <?php
                        if(isset($_SESSION['message'])){
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            <?php

                            unset($_SESSION['message']);
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" type="text" name="username" autofocus required>
                        <small id="helpId" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="***********" type="password" name="password" required>
                        <small id="helpId" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-lg btn-dark btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                    </div>
                    <p>Don't have an accout ? <a href="register.php">Register</a> New</p>
                </div>
            </form>
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