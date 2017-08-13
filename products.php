<?php include_once 'header.php'; ?>
<?php
include_once 'header.php';
include './car.php';
$car = new car();

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $cars = $car->GetCarBySearch($search);
} else {
    $cars = $car->GetAllCars();
}
if (isset($_GET['sort_choice'])) {
    $choice = $_GET['sort_choice'];

    if ($choice == "Name_asc") {

        $cars = $car->SortCarByBrandASC();
    } else if ($choice == "Name_dsc") {

        $cars = $car->SortCarByBrandDesc();
    } else if ($choice == "HighPriceIntoLow") {

        $cars = $car->SortCarByPriceDsc();
    } else if ($choice == "LowPriceIntoHigh") {

        $cars = $car->SortCarByPriceAsc();
    }
}
?>
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->

            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                    <li class="active">Products Name</li>
                </ul>
                <h3> Products Name <small class="pull-right"> </small></h3>	
                <hr class="soft"/>
                <p>
                    Nowadays the Cars industry is one of the most successful business spheres.We always stay in touch with the latest Models tendencies - that is why our goods are so popular and we have a great number of faithful customers all over the country.
                </p>
                <hr class="soft"/>
                <?php if (!isset($_GET['search'])) { ?>
                    <form class="form-horizontal span6" action="#" method="GET">
                        <div class="control-group">
                            <label class="control-label alignL">Sort By </label>
                            <select name='sort_choice' >
                                <option value="Name_asc" <?php if(isset($_GET['sort_choice'])&&($choice == "Name_asc")) echo 'selected="selected"' ?>>Brand name A - Z</option>
                                <option value="Name_dsc"<?php if(isset($_GET['sort_choice'])&&($choice == "Name_dsc")) echo 'selected="selected"' ?>>Brand name Z - A</option>
                                <option value="HighPriceIntoLow" <?php if(isset($_GET['sort_choice'])&&($choice == "HighPriceIntoLow")) echo 'selected="selected"' ?>>Highest Price First</option>
                                <option value="LowPriceIntoHigh"<?php if(isset($_GET['sort_choice'])&&($choice == "LowPriceIntoHigh")) echo 'selected="selected"' ?>>Lowest Price  First</option>
                            </select>
                            <button type="submit" name="sort" class="btn btn-large btn-primary pull-right"> Go <i class=""></i></button>
                        </div>

                    </form>
                <?php } ?>

                <br class="clr"/>
                <div class="tab-content"><?PHP
                    foreach ($cars as $value) {
                        echo '<li class="span3">';
                        echo '<div class="thumbnail">';
                        echo '<a href="product_details.php?id=' . $value['id'] . '"><img src="' . $value['image'] . '" alt="" /></a>';

                        echo '<div class="caption">';
                        echo '<h5>' . $car->GetCarBrand($value['brand_id']) . '</h5>';
                        echo '<h5>' . $value['model'] . '</h5>';
                        echo '<p>' . $car->GetCarType($value['type_id']) . '</p>';
                        echo '<h4 style="text-align:center"><a class="btn" href="product_details.php?id=' . $value['id'] . '"> <i class="icon-zoom-in"></i></a><a class="btn btn-primary" href="product_details.php?id=' . $value['id'] . '">&euro;' . $value['price'] . '</a></h4>';
                        echo '</div>';
                        echo '</div>';
                        echo '</li>';
                    }
                    ?>
                </div>


                <br class="clr"/>
            </div>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include_once 'footer.php';
?>