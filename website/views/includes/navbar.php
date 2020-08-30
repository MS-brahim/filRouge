        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="../public/assets/images/logo1.png" width=100></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="promo.php">Promotion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Catégories
                            </a>
                            <div class="dropdown-menu">
                                <?php 
                                include_once "../models/cat-class.php";
                                $categ = new Category();
                                $mr = $categ->selectProd("category");
                                foreach ($mr as $catRows){
                                ?>
                                <a class="dropdown-item" href="#"><?php echo $catRows['catName']; ?></a>
                                <?php }?>
                            </div>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <?php if(isset($_SESSION['user'])): ?>                       
                            <div class="btn-group">
                                <dt class="dropdown-toggle mr-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hi <a class="text-warning" type="button"><b><?php echo $row['username'];?></b></a>
                                </dt>
                                &nbsp;
                                <div class="dropdown-menu dropdown-menu-right" id="btn-down">
                                    <a href="login.php" class="dropdown-item" type="button">
                                        <i class="fa fa-user" aria-hidden="true"></i> Account
                                    </a>
                                    <a href="../controllers/logout.php" class="dropdown-item" type="button">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-light">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Log in
                            </a>
                            &nbsp;
                            <div style="width:1px;background:black; height:25px;"></div>
                            &nbsp;
                            <a href="register.php" class="btn btn-light">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                Sign Up
                            </a>
                        <?php endif; ?>
                        &nbsp;
                        <a class="nav-link btn btn-warning" href="blog.php">Carts <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </nav>
        
        <style>
        @media screen and (max-width: 600px){
            #btn-down{
                left:0;
            }
        }
        </style>