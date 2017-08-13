<?php
require_once 'core.php';
require_once'user.php';

$loginerror = "";
$user = new user();
if (isset($_POST['login'])) {
    if (!$user->login()) {
        $loginerror = "Invalid Username or Password";
        echo '<script>alert("' . $loginerror . ' , Please Try Again ")</script>';
        header('#login');
    }
}


if (loggedin()) {
    $user_id = $_SESSION['user']['id'];
    $user_type_id = $_SESSION['user']['user_type_id'];
}
?>

﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Online Car Rental Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--Less styles -->
        <!-- Other Less css file //different less files has different color scheam
             <link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
             <link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
             <link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
        -->
        <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
        <script src="themes/js/less.js" type="text/javascript"></script> -->

        <!-- Bootstrap style --> 
        <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
        <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
        <!-- Bootstrap style responsive -->	
        <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
        <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
        <!-- Google-code-prettify -->	
        <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
        <!-- fav and touch icons -->
        <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
        <style type="text/css" id="enject"></style>
        <style>
            #brands .span3{
                margin: 10px;
            }
        </style>
    </head>
    <body style="background-color: #f7f7f7;">
        <div id="header">
            <div class="container">
                <div id="welcomeLine" class="row">

                    <div class="span6">Welcome<strong> <?php
                            if ($user->loggedin()) {
                                echo $_SESSION['user']['firstname'] . ' ';
                                echo $_SESSION['user']['lastname'];
                            }
                            ?> </strong></div>


                    <!--  <div class="span6">
                          <div class="pull-right">
                           <a href="product_summary.php"><span class="">Fr</span></a>
                              <a href="product_summary.php"><span class="">Es</span></a>
                              <span class="btn btn-mini">En</span>
                              <a href="product_summary.php"><span>&pound;</span></a>
                              <span class="btn btn-mini">$155.00</span>
                              <a href="product_summary.php"><span class="">$</span></a 
                              <a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
                          </div>
                      </div> -->
                </div>
                <!-- Navbar ================================================== -->
                <div id="logoArea" class="navbar">
                    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-inner">
                        <a class="brand" href="index.php"><img src="img/logo.png" alt="AutoTrader"/></a>

                        <form class="form-inline navbar-search"  method="GET" action="products.php" >
                            <input id="" class="srchTxt" type="text" name="search">
                          <!--   <select class="srchTxt">
                                <option>All</option>
                                <option>Compact Cars</option>
                                <option>SUVs & PickUps</option>
                                <option>Estate Saloons</option>
                                <option>Sedan Cars </option>
                                <option>Sports Cars</option>
                                <option>Van & Minibus</option>
                            </select>  -->
                            <button type="submit"  id="submitButton" class="btn btn-primary">Go</button>
                        </form>
                        <ul id="topMenu" class="nav pull-right">
                            <li class=""><a href="FAQ.php">Help</a></li>
                            <?php if ($user->loggedin()) { ?>
                                <li class=""><a href="history.php">Order History</a></li>
                            <?php } ?>
                            <li class=""><a href="products.php">Products</a></li>
                            <?php if ($user->loggedin() && ($user_type_id==2 )) { ?>
                                <li class=""><a href="contact.php">Contact Us</a></li>
                            <?php } ?>
                                <?php if ($user->loggedin() && ($user_type_id == 1)) { ?>
                                <li class=""><a href="contact.php">Feedbacks</a></li>
                            <?php } ?>
                            <?php if (!$user->loggedin()) { ?>
                                <li class=""><a href="register.php">Register</a></li>
                            <?php } ?>
                            <?php if ($user->loggedin()) { ?>
                                <li class=""><a href="myprofile.php">My Profile</a></li>
                            <?php } ?>
                            <?php if ($user->loggedin() && $user_type_id == 1) { ?>
                                <li class=""><a href="AdminPerm.php">Permissions</a></li>

                            <?php } ?>
                            <li class="">
                                <?php if ($user->loggedin()) { ?>
                                    <a href="logout.php" role="button" style="padding-right:0"><span class="btn btn-large btn-danger">Logout</span></a>
                                <?php } else { ?>
                                    <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
                                <?php } ?>
                                <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3>Login </h3>
                                    </div>
                                    <div class="modal-body">
                                        <span class="error alert-error"><?php echo $loginerror ?></span>
                                        <form class="form-horizontal loginFrm" action="index.php" method="POST">
                                            <div class="control-group">								
                                                <input type="text" name="Username" id="inputEmail" placeholder="Username">
                                            </div>
                                            <div class="control-group">
                                                <input type="password" name="Password" id="inputPassword" placeholder="Password">
                                            </div>
                                            <a href="forgetpass.php"<button name="forgetpass" href="" class="btn btn-link">Forget Password</button></a>
                                            <!--       <div class="control-group">
                                                       <label class="checkbox">
                                                           <input name="Remember" type="checkbox"> Remember me
                                                       </label>
                                                   </div>	 -->
                                            <br> 

                                            <button type="submit" name="login" class="btn btn-success">Sign in</button>
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                                        </form>	
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container center_div">
            <div class="col-md-6 col-md-offset-3">
                <!-- Header End====================================================================== -->

