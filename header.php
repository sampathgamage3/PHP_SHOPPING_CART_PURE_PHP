<!DOCTYPE html>
<?php
 $product = new Product_controller();
?>
<html lang="en">
    <head>
        

        <title>Sam Shop</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/style.css">
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        
        <!--start slider -->
        <link rel="stylesheet" href="css/fwslider.css" media="all">
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/css3-mediaqueries.js"></script>
        <script src="js/fwslider.js"></script>
        <!--end slider -->
        <script type="text/javascript" src="js/script.js"></script>
        
    </head>
    <body>
        <div class="row-fluid span12 form_sec header_menu">
            <h1 class="row-fluid span12 h1_tag">Sam Shop</h1>
                <div class="row-fluid menu">
                    <div style="position: static;" class="navbar navbar-inverse">
                    <div class="navbar-inner">
                        <div class="container">
                            <a data-target=".navbar-inverse-collapse" data-toggle="collapse" class="btn btn-navbar collapsed">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <div class="nav-collapse navbar-inverse-collapse collapse" style="height: 0px;">
                                <ul class="nav">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="products.html">Products</a></li>
                                    <?php if($login->loggedIn()!=true){ ?>
                                    <li><a href="login.html">Sign In</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <?php }else{ ?>
                                    <li><a href="logout.html">Log Out</a></li>
                                    <?php } ?>
                                    
                                    
                                    <li><a href="cart.html">Cart <?php (isset($_SESSION["products"]) && count($_SESSION["products"])!=0?$pc=count($_SESSION["products"]):$pc=0); echo '('.$pc.')';?></a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div><!-- /.nav-collapse -->
                        </div>
                    </div><!-- /navbar-inner -->
                </div>
                <span class="cart"> 
                <a class="cart-ico" href="cart.html">&nbsp;</a> <strong>$ <?php echo $product->getTotal();?></strong> 
            </span>    
                </div>
            
                <div class="row-fluid span12 form_sec header_cart">
                </div>
            
            
        </div>
        
        
                