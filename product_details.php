<?php
include_once 'header.php';
include 'car.php';
include 'client.php';
include_once 'reservation.php';
$car = new car();
$client = new client();
$reservation = new reservation();
$carinf = $car->GetCarDetails($_GET['id']);
$carid = $_GET['id'];
$cars = $car->GetAllCars();
$brand = $car->GetCarBrand($carinf['brand_id']);
$color = $car->GetCarColor($carinf['color_id']);
$type = $car->GetCarType($carinf['type_id']);
$year = $car->GetCarYear($carinf['year_id']);
$payment_methods = $reservation->GetPaymentMethods();

if (isset($_POST['reservation'])) {
    if (loggedin())
        $client->MakeReservation();
    else {
        echo '<script>alert("You Must Login First")</script>';
    }
}
?>
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <?php
            ?>
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                    <li><a href="products.php">Products</a> <span class="divider">/</span></li>
                    <li class="active">Product Details</li>
                </ul>	
                <div class="row">	  
                    <div id="gallery" class="span3">
                        <a  title="Car">
                            <img src="<?php echo $carinf['image'] ?>" style="width:100%" alt="car"/>
                        </a>
                        <div id="differentview" class="moreOptopm carousel slide">

                            <!--  
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
                            -->
                        </div>


                    </div>
                    <div class="span6">

                        <?php
                        echo'<h3> Brand :' . $brand . '</h3>';
                        echo'<h4> Model : ' . $carinf['model'] . '</h4>';
                        echo'<h4> Type :' . $type . '</h4>';
                        echo'<h4> Color :' . $color . '</h4>';
                        echo'<h4> Price :' . $carinf['price'] . '</h4';
                        ?>






                    </div>

                    <div class="span9">
                        <ul id="productDetail" class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                </br>
                                <h4>Product Information</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
                                        <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2"><?php echo $brand ?></td></tr>
                                        <tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2"><?php echo $carinf['model'] ?></td></tr>
                                        <tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"><?php echo $year ?> </td></tr>
                                        <tr class="techSpecRow"><td class="techSpecTD1">Color:</td><td class="techSpecTD2"><?php echo $color ?></td></tr>
                                        <tr class="techSpecRow"><td class="techSpecTD1">Price:</td><td class="techSpecTD2"><?php echo $carinf['price'] ?></td></tr>
                                    </tbody>
                                </table>
                                <?php if (loggedin()) { ?>
                                    <form class="form-horizontal" action="#" method="POST" >
                                        <div class="control-group">
                                            <label class="control-label" for="datetime">Start_Date : <sup>*</sup></label>
                                            <div class="controls">

                                                <input type="date" name="start_date" value="<?php echo date("Y-m-d"); ?>" required="required" style="width:250px;">

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="datetime">End_Date : <sup>*</sup></label>
                                            <div class="controls">
                                                <input type="date" name="end_date" value="<?php echo date("Y-m-d"); ?>" required="required" style="width:250px;">

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Payment">Payment Method : <sup>*</sup></label>
                                            <div class="controls">
                                                <select class="span1" name="payment_id" style="width:250px;">

                                                    <?php
                                                    foreach ($payment_methods as $payment_method) {
                                                        echo '<option value="' . $payment_method['id'] . '">' . $payment_method['type'] . '</option>';
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>


                                        <button type="submit" name="reservation" class="btn btn-large btn-primary pull-right"> Reserve Now <i class=" icon-shopping-cart"></i></button>

                                    </form>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div id="myTab" class="pull-right">
                                    <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                                    <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                                </div>
                                <br class="clr"/>
                                <hr class="soft"/>
                                <div class="tab-content">
                                    <div class="tab-pane" id="listView">
                                        <div class="row">	  
                                            <div class="span2">
                                                <img src="themes/images/products/4.jpg" alt=""/>
                                            </div>
                                            <div class="span4">
                                                <h3>New | Available</h3>				
                                                <hr class="soft"/>
                                                <h5>Product Name </h5>
                                                <p>
                                                    Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                    that is why our goods are so popular..
                                                </p>
                                                <a class="btn btn-small pull-right" href="product_details.php">View Details</a>
                                                <br class="clr"/>
                                            </div>
                                            <div class="span3 alignR">
                                                <form class="form-horizontal qtyFrm">
                                                    <h3> $222.00</h3>
                                                    <label class="checkbox">
                                                        <input type="checkbox">  Adds product to compair
                                                    </label><br/>
                                                    <div class="btn-group">
                                                        <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                        <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="soft"/>
                                        <div class="row">	  
                                            <div class="span2">
                                                <img src="themes/images/products/5.jpg" alt=""/>
                                            </div>
                                            <div class="span4">
                                                <h3>New | Available</h3>				
                                                <hr class="soft"/>
                                                <h5>Product Name </h5>
                                                <p>
                                                    Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                    that is why our goods are so popular..
                                                </p>
                                                <a class="btn btn-small pull-right" href="product_details.php">View Details</a>
                                                <br class="clr"/>
                                            </div>
                                            <div class="span3 alignR">
                                                <form class="form-horizontal qtyFrm">
                                                    <h3> $222.00</h3>
                                                    <label class="checkbox">
                                                        <input type="checkbox">  Adds product to compair
                                                    </label><br/>
                                                    <div class="btn-group">
                                                        <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                        <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="soft"/>
                                        <div class="row">	  
                                            <div class="span2">
                                                <img src="themes/images/products/6.jpg" alt=""/>
                                            </div>
                                            <div class="span4">
                                                <h3>New | Available</h3>				
                                                <hr class="soft"/>
                                                <h5>Product Name </h5>
                                                <p>
                                                    Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                    that is why our goods are so popular..
                                                </p>
                                                <a class="btn btn-small pull-right" href="product_details.php">View Details</a>
                                                <br class="clr"/>
                                            </div>
                                            <div class="span3 alignR">
                                                <form class="form-horizontal qtyFrm">
                                                    <h3> $222.00</h3>
                                                    <label class="checkbox">
                                                        <input type="checkbox">  Adds product to compair
                                                    </label><br/>
                                                    <div class="btn-group">
                                                        <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                        <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="soft"/>
                                        <div class="row">	  
                                            <div class="span2">
                                                <img src="themes/images/products/7.jpg" alt=""/>
                                            </div>
                                            <div class="span4">
                                                <h3>New | Available</h3>				
                                                <hr class="soft"/>
                                                <h5>Product Name </h5>
                                                <p>
                                                    Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                    that is why our goods are so popular..
                                                </p>
                                                <a class="btn btn-small pull-right" href="product_details.php">View Details</a>
                                                <br class="clr"/>
                                            </div>
                                            <div class="span3 alignR">
                                                <form class="form-horizontal qtyFrm">
                                                    <h3> $222.00</h3>
                                                    <label class="checkbox">
                                                        <input type="checkbox">  Adds product to compair
                                                    </label><br/>
                                                    <div class="btn-group">
                                                        <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                        <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <hr class="soft"/>
                                        <div class="row">	  
                                            <div class="span2">
                                                <img src="themes/images/products/8.jpg" alt=""/>
                                            </div>
                                            <div class="span4">
                                                <h3>New | Available</h3>				
                                                <hr class="soft"/>
                                                <h5>Product Name </h5>
                                                <p>
                                                    Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                    that is why our goods are so popular..
                                                </p>
                                                <a class="btn btn-small pull-right" href="product_details.php">View Details</a>
                                                <br class="clr"/>
                                            </div>
                                            <div class="span3 alignR">
                                                <form class="form-horizontal qtyFrm">
                                                    <h3> $222.00</h3>
                                                    <label class="checkbox">
                                                        <input type="checkbox">  Adds product to compair
                                                    </label><br/>
                                                    <div class="btn-group">
                                                        <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                        <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="soft"/>
                                        <div class="row">	  
                                            <div class="span2">
                                                <img src="themes/images/products/9.jpg" alt=""/>
                                            </div>
                                            <div class="span4">
                                                <h3>New | Available</h3>				
                                                <hr class="soft"/>
                                                <h5>Product Name </h5>
                                                <p>
                                                    Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                    that is why our goods are so popular..
                                                </p>
                                                <a class="btn btn-small pull-right" href="product_details.php">View Details</a>
                                                <br class="clr"/>
                                            </div>
                                            <div class="span3 alignR">
                                                <form class="form-horizontal qtyFrm">
                                                    <h3> $222.00</h3>
                                                    <label class="checkbox">
                                                        <input type="checkbox">  Adds product to compair
                                                    </label><br/>
                                                    <div class="btn-group">
                                                        <a href="product_details.php" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                        <a href="product_details.php" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="soft"/>
                                    </div>
                                    <div class="tab-pane active" id="blockView">
                                        <ul class="thumbnails">
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/10.jpg" alt=""/></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p> 
                                                            Lorem Ipsum is simply dummy text. 
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/11.jpg" alt=""/></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p> 
                                                            Lorem Ipsum is simply dummy text. 
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/12.jpg" alt=""/></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p> 
                                                            Lorem Ipsum is simply dummy text. 
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/13.jpg" alt=""/></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p> 
                                                            Lorem Ipsum is simply dummy text. 
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/1.jpg" alt=""/></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p> 
                                                            Lorem Ipsum is simply dummy text. 
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/2.jpg" alt=""/></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p> 
                                                            Lorem Ipsum is simply dummy text. 
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <hr class="soft"/>
                                    </div>
                                </div>
                                <br class="clr">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include_once 'footer.php';
?>