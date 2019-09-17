<?php
global $id;
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    Header('Location: index.php');
}
?>

<?php 
    if (isset($_POST['submit'])) {
        $s = $nameData = $_POST['name'];
        if(empty($s)) {
            Header('Location: index.php');
        }
    }
?>

<?php
    $readAll = "http://123local.com/powerlistings/product/detail.php?id=$id";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'key: ieurtjkosakwehua1457821244amsnashjad'
    ));
    curl_setopt($ch, CURLOPT_URL, $readAll);
    $locations = curl_exec($ch);
    $locations_json = json_decode($locations, true);
    // print_r($locations_json);
    curl_close($ch);
?>

<?php
    $reviews_call = "http://123local.com/powerlistings/reviews/reviews.php?id=$id";
    $ch_reviews = curl_init();
    curl_setopt($ch_reviews, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_reviews, CURLOPT_HTTPHEADER, array(
        'key: ieurtjkosakwehua1457821244amsnashjad'
    ));
    curl_setopt($ch_reviews, CURLOPT_URL, $reviews_call);
    $reviews = curl_exec($ch_reviews);
    $reviews_json = json_decode($reviews, true);
    curl_close($ch_reviews);
?>

<?php
    $pid = "5RSdyCCmND";
    $ecl_call = "https://lists.yext-pub.com/lists?pid=".$pid."&listingId=22&type=PRODUCTS";
    $ecl_datas = curl_init();
    curl_setopt($ecl_datas, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ecl_datas, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    curl_setopt($ecl_datas, CURLOPT_URL, $ecl_call);
    $ecl = curl_exec($ecl_datas);
    $ecl_json = json_decode($ecl, true);
    curl_close($ecl_datas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php print_r($locations_json["records"][0]["name"]); ?> | Powerlisting</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome/css/font-awesome.min.css">
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="top-header">
<?php
    $readAllCategories = "http://123local.com/powerlistings/product/category.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'key: ieurtjkosakwehua1457821244amsnashjad'
    ));
    curl_setopt($ch, CURLOPT_URL, $readAllCategories);
    $categories = curl_exec($ch);
    $categories_json = json_decode($categories, true);
    curl_close($ch);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo"><a href="index.php"><img class="img-responsive" src="images/123localLogo.png" alt="123local logo"></a></div>
            </div>
            <div class="col-md-9">
                <form action="search.php" method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="listing name" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <div class="menu-group">
                    <ul class="main-menu">
                        <li><a class="dropdown-toggle" data-toggle="dropdown">Explore</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($categories_json as $keys) {
                                foreach ($keys as $key) { ?>
                                    <li><a class="dropdown-item" href="categories.php?category=<?php print_r($key["categoriesNameAlias"]); ?>"><?php print_r($key["categoryName"]); ?></a></li>
                                <?php }
                                } ?>
                            </ul>
                        </li>
                        <!-- <li><a class="add-listing" href="#"><i class="fa fa-user" aria-hidden="true"></i>Join Now</a></li> -->
                        <li><a class="add-listing" href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add Listings</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="img-fluid" src="images/slider1.jpg" alt="First slide">
        <div class="slider-content">
            <h2>Find the Best Local Results for whatever You Need! Near Me is our Job.</h2>
            <h4>All You Need is 123 Local.  We have done the research and only deliver the best local results for you.  When you need to find anything Near Me, 123 Local is the Best!</h4>
        </div>
        </div>
        <div class="carousel-item">
        <img class="img-fluid" src="images/slider2.jpg" alt="Second slide">
        <div class="slider-content">
            <h2>Find the Best Local Results for whatever You Need! Near Me is our Job.</h2>
            <h4>All You Need is 123 Local.  We have done the research and only deliver the best local results for you.  When you need to find anything Near Me, 123 Local is the Best!</h4>
        </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php
    $locationName = $locations_json["records"][0]["name"];
    $attributionImage = $locations_json["records"][0]["attribution"]["image"]["url"];
    $attributionImageHeight = $locations_json["records"][0]["attribution"]["image"]["height"];
    $attributionImageWidth = $locations_json["records"][0]["attribution"]["image"]["width"];
    $attributionImageDescription = $locations_json["records"][0]["attribution"]["image"]["description"];
    $images = $locations_json["records"][0]["images"];
    foreach ($images as $image) {
        $logoType = $image["type"];
        if ($logoType === "LOGO") {
            $logo = $image["url"];
        }
    }
    $locationDescription = $locations_json["records"][0]["description"];
    $yearEstablished = $locations_json["records"][0]["yearEstablished"];
    $latitude = $locations_json["records"][0]["geoData"]["displayLatitude"];
    $longitude = $locations_json["records"][0]["geoData"]["displayLongitude"];
    $specialMessage = $locations_json["records"][0]["specialOffer"]["message"];
    $specialUrl = $locations_json["records"][0]["specialOffer"]["url"];
    $twitterHandle = $locations_json["records"][0]["twitterHandle"];
    $facebookHandle = $locations_json["records"][0]["facebookPageUrl"];
    $total_reviews = $locations_json["records"][0]["total_reviews"];
    $ratings = ($locations_json["records"][0]["rating"]);
    // $ratings = ($locations_json["records"][0]["rating"]/5)*100;
    $specialities = $locations_json["records"][0]["specialities"];
    $brands = $locations_json["records"][0]["brands"];
    $products = $locations_json["records"][0]["products"];
    $associations = $locations_json["records"][0]["associations"];
    $languages = $locations_json["records"][0]["languages"];
    $paymentOptions = $locations_json["records"][0]["paymentOptions"];
    $phones = $locations_json["records"][0]["phones"];
    $locationAddress = $locations_json["records"][0]["address"];
    $hours = $locations_json["records"][0]["hours"];
    $videos = $locations_json["records"][0]["videos"];
    $urls = $locations_json["records"][0]["urls"];
    $lists = $locations_json["records"][0]["lists"];
    $reviews = $reviews_json["records"][0]["reviews"];
    $reviewLength = sizeof($reviews);

?>
<div class="single-header">
    <div class="listing-name">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2><?php print_r($locationName); ?></h2>
                    <h4><?php print_r($locationDescription); ?></h4>
                </div>
                <div class="col-md-4">
                    <div class="rating-section"><span class="rating_obtainer"><?php print_r($ratings); ?></span>/5</div>
                    <div class="total-rating">(<?php print_r($total_reviews); ?>) Ratings</div>
                    <div class="submit-review"><a href="#submitReview"><i class="fa fa-star" aria-hidden="true"></i> Submit Review</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-info">
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="review-section">
                <h4><span class="reviews_count"><?php print_r($reviews_json["records"][0]["total"]); ?></span> reviews for <?php print_r($locationName); ?></h4>
                <?php foreach ($reviews as $reviews) { ?>
                <article class="review-post">
                    <div class="image-and-review">
                        <div class="figure">
                            <div class="review-thumbnail"><img src="<?php print_r($reviews["authorPhotoUrl"]); ?>" alt="<?php print_r($reviews["authorName"]); ?>"></div>
                            <div class="figcaption"><h4><?php print_r($reviews["authorName"]); ?></h4></div>
                        </div>
                        <div class="details">
                            <div class="top-section">
                                <h3><?php print_r($reviews["title"]); ?></h3>
                                <time><?php print_r($reviews["timestamp"]); ?></time>
                            </div>
                            <div class="content-section">
                                <p><?php print_r($reviews["content"]); ?></p>
                            </div>
                        </div>
                        <div class="review-stars">
                            <div class="rating-section"><span class="rating_obtainer"><?php print_r($reviews["rating"]); ?></span>/5</div>
                        </div>
                    </div>
                </article>
                <?php } ?>
            </div>
<div class="d-none">
                <!-- <div class="location-hours">
                <h3>Hours</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col" colspan="3">Intervals</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $hours = $locations_json["records"][0]["hours"];
                    foreach ($hours as $hour) { ?>
                            <tr>
                                <td class="day"><?php print_r($hour["day"]); ?></td>
                                <?php
                                    foreach ($hour["intervals"] as $day) {
                                        if (empty($day["start"])) {
                                            $day["start"] = "All day";
                                        }
                                        if (empty($day["end"])) {
                                            $day["end"] = "All day";
                                        }
                                        ?>
                                        <td>
                                            <div class="start"><span>Starts:</span> <?php print_r($day["start"]); ?></div>
                                            <div class="ends"><span>Ends:</span> <?php print_r($day["end"]); ?></div>
                                        </td>
                                    <?php }
                                ?>
                    <?php } ?>
                        </tr>
                    </tbody>
                </table>
                <?php
                if (empty($hours[0]['intervals'][0]['start'])) { ?>
                <div class="additional-hours">
                    <?php
                        $additionalHours = $locations_json["records"][0]["hoursText"];
                        if (!empty($additionalHours["display"])) { ?>
                            <p><strong>Additional Hours:</strong> <?php print_r($additionalHours["display"]); ?></p>
                        <?php }
                    ?>
                </div>
                <?php } ?>
            </div> -->
</div>
            <div id="submitReview" class="rate-review-section">
                <div id="accordion" role="tablist">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0"><a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-star" aria-hidden="true"></i> Rate us and Write a Review</a></h5>
                        </div>
                        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="formWrapper">
                                <form id="form" method="GET">
                                    <div class="form-group">
                                        <label for="authorName">Name</label>
                                        <input name="authorName" type="authorName" class="form-control" id="authorName">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Review Summary</label>
                                        <input name="title" type="title" class="form-control" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Review Source Url</label>
                                        <input name="url" type="url" class="form-control" id="url">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Review</label>
                                        <textarea name="content" type="content" class="form-control" id="content"></textarea>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit Review</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php
                $closed = $locations_json["records"][0]["closed"];
                $closed = strtolower($closed);
                if ($closed === "true" || $closed === 1) { ?>
                    <span class="time-bar closed"><i class="fa fa-clock-o" aria-hidden="true"></i>Closed</span>
            <?php } else { ?>
                <span class="time-bar opened"><i class="fa fa-clock-o" aria-hidden="true"></i>Open Now</span>
            <?php } ?>
            <div class="location-details">
            <iframe src = "https://maps.google.com/maps?q=<?php print_r($latitude); ?>,<?php print_r($longitude); ?>&hl=es;z=14&amp;output=embed"></iframe>
            <div class="main-address"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
            <span>
            <?php print_r($locationAddress["address"]); ?>
            <?php
                if (!empty($locationAddress["address2"])) { ?>
                    <span class="address2">, <?php  print_r($locationAddress["address2"]); ?>,</span>
                <?php }
            ?>
            <?php
                if (!empty($locationAddress["city"])) { ?>
                    <span class="city"><?php print_r($locationAddress["city"]); ?>, </span>
                <?php }
            ?>
            <?php
                if (!empty($locationAddress["countryCode"])) { ?>
                    <?php print_r($locationAddress["countryCode"]); ?>, 
                <?php }
            ?>
            <?php
                if (!empty($locationAddress["postalCode"])) { ?>
                    <span class="postalCode"><?php print_r($locationAddress["postalCode"]); ?>, </span>
                <?php }
            ?>
            <?php
                if (!empty($locationAddress["state"])) { ?>
                    <span class="state"><?php print_r($locationAddress["state"]); ?>, </span>
                <?php }
            ?>
            </span>
            </div>
            </div>
            <div class="social-links">
                <div class="twitter"><a id="twitterHandle" target="_blank" href="https://twitter.com/<?php print_r($twitterHandle);?>"></a></div>
                <div class="facebook"><a id="facebookPageUrl" target="_blank" href="<?php print_r($facebookHandle);?>"></a></div>
            </div>
            <div class="additional-data">
                <div class="addtionalData">
                    <h4 class="side-header">Payment Options</h4>    
                    <ul>
                    <?php
                    foreach ($paymentOptions as $paymentOption) { ?>
                        <li class="list-group-item"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp;<?php print_r($paymentOption); ?></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

  <div class="cat-and-location d-none">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="left-side">
              <div id="categories" class="location-categories">
                <h3>Categories</h3>
                <?php
                    $categories = $locations_json["records"][0]["categories"];
                    foreach ($categories as $key) { ?>
                        <div class="category"><?php print_r($key["name"]); ?></div>
                    <?php }
                ?>
              </div>
              <div id="emails" class="location-emails">
                <h3>Emails</h3>
                <?php
                    $emails = $locations_json["records"][0]["emails"];
                    foreach ($emails as $key) { ?>
                        <div class="email">
                            <div class="email-address"><a href="mailto:<?php print_r($key["address"]); ?>"><?php print_r($key["address"]); ?></a></div>
                            <div class="email-description"><?php print_r($key["description"]); ?></div>
                        </div>
                    <?php }
                ?>
              </div>
              <div class="location-keywords">
                <h3>Keywords</h3>
                <?php
                    $keywords = $locations_json["records"][0]["keywords"];
                    foreach ($keywords as $key) { ?>
                        <div class="keywords"><?php print_r($key); ?></div>
                    <?php }
                ?>
              </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="right-side">
            <div class="locations">
                <div class="single-location-wrapper">
                    <h2 class="location-name">
                    <?php if (!empty($logo)) { ?>
                        <span class="main-logo"><img class="img-responsive" src="<?php print_r($logo); ?>" alt="<?php print_r($locationName); ?>"></span>
                    <?php } ?>    
                    <?php print_r($locationName); ?> <span class="attribution"><img src="<?php print_r($attributionImage); ?>" height="<?php print_r($attributionImageHeight); ?>" width="<?php print_r($attributionImageWidth); ?>" alt="<?php print_r($attributionImageDescription); ?>"></span>
                    <?php
                    $closed = $locations_json["records"][0]["closed"];
                    $closed = strtolower($closed);
                    if ($closed === "true") { ?>
                        <span class="closed">Closed</span>                    
                    <?php } ?>

                    </h2>
                    <span class="score">
                    <div class="score-wrap">
                        <span class="stars-active" style="width:<?php echo $ratings; ?>%">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                        <span class="stars-inactive">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                    </div>
                    </span>
                    <div id="description" class="description"><?php print_r($locationDescription); ?></div>
                    <div class="row">
                        <div class="goeData col-md-4">
                            <div class="card card-body bg-secondary text-white">
                                <h3>Location</h3>
                                <div class="latitude">Latitude: <?php print_r($latitude);?></div>
                                <div class="longitude">Longitude: <?php print_r($longitude);?></div>
                            </div>
                        </div>
                        <div class="special-offer col-md-4">
                            <div class="card card-body bg-secondary text-white">
                                <h3 id="specialOffer">Special Offer</h3>
                                <div class="message"> <?php print_r($specialMessage);?></div>
                                <div class="url"><a target="_blank" class="btn btn-dark" href="<?php print_r($specialUrl);?>">Read More</a></div>
                            </div>
                        </div>
                        <div class="social-links col-md-4">
                            <div class="card card-body bg-secondary text-white">
                                <h3>Connect with us</h3>
                                <div class="twitter"><a id="twitterHandle" target="_blank" href="https://twitter.com/<?php print_r($twitterHandle);?>">Twitter</a></div>
                                <div class="facebook"><a id="facebookPageUrl" target="_blank" href="<?php print_r($facebookHandle);?>">Facebook</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="yearEstablished">
                        <p>Year Established: <?php print_r($yearEstablished); ?></p>
                    </div>
                </div>
            </div>
            <div class="location-address">
                <h3>Address</h3>
                <?php $locationAddress = $locations_json["records"][0]["address"]; ?>
                <div id="addresses">
                    <div id="address">
                        <span class="address"><?php print_r($locationAddress["address"]); ?></span> ,
                        <?php
                            if (empty($locationAddress["address2"])) {
                                $locationAddress["address2"] = ""; ?>

                                <span class="address2"><?php print_r($locationAddress["address2"]); ?></span>
                            <?php } else { ?>
                                <span class="address2">, <?php  print_r($locationAddress["address2"]); ?>,</span>
                            <?php }
                        ?>
                        <?php
                            if (empty($locationAddress["city"])) {
                                $locationAddress["city"] = ""; ?>
                                <span class="city"><?php print_r($locationAddress["city"]); ?></span>
                            <?php } else { ?>
                                <span class="city"><?php print_r($locationAddress["city"]); ?>, </span>
                            <?php }
                        ?>
                        <?php
                            if (empty($locationAddress["displayAddress"])) {
                                $locationAddress["displayAddress"] = ""; ?>
                                <span class="displayAddress"><?php print_r($locationAddress["displayAddress"]);?></span>
                            <?php } else { ?>
                                <span class="displayAddress"><?php print_r($locationAddress["displayAddress"]); ?>, </span>
                            <?php }
                        ?>
                        <?php
                            if (empty($locationAddress["countryCode"])) {
                                $locationAddress["countryCode"] = ""; ?>
                                <?php print_r($locationAddress["countryCode"]); ?>
                            <?php } else { ?>
                                <?php print_r($locationAddress["countryCode"]); ?>, 
                            <?php }
                        ?>
                        <?php
                            if (empty($locationAddress["postalCode"])) {
                                $locationAddress["postalCode"] = ""; ?>
                                <span class="postalCode"><?php print_r($locationAddress["postalCode"]); ?></span>
                            <?php } else { ?>
                                <span class="postalCode"><?php print_r($locationAddress["postalCode"]); ?>, </span>
                            <?php }
                        ?>
                        <?php
                            if (empty($locationAddress["state"])) {
                                $locationAddress["state"] = ""; ?>
                                <span class="state"><?php print_r($locationAddress["state"]); ?></span>
                            <?php } else { ?>
                                <span class="state"><?php print_r($locationAddress["state"]); ?>, </span>
                            <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="location-phones" id="phone">
                <h3>Phones</h3>
                <?php
                    $phones = $locations_json["records"][0]["phones"];
                    foreach ($phones as $details) {
                        $phoneNumber = $details["number"]["number"];
                        $input = $phoneNumber; 
                        $output = "(" . substr($input, -10, -7) . ") " . substr($input, -7, -4) . "-" . substr($input, -4);
                        $phoneCountryCode = $details["number"]["countryCode"];
                    ?>
                        <div class="number">
                            <div class="phone-number">Phone Number: <a type="<?php print_r($details["type"]); ?>" href="tel:<?php print_r($phoneCountryCode); ?><?php print_r($phoneNumber); ?>"><?php print_r($phoneCountryCode); ?> <?php print_r($output); ?></a></div>
                            <!-- <div class="phone-description">Description: <?php print_r($details["description"]); ?></div> -->
                            <div class="phone-type">Type: <?php print_r($details["type"]); ?></div>
                        </div>
                    <?php }
                ?>
            </div>
            <div class="location-hours">
                <h3>Hours</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col" colspan="3">Intervals</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $hours = $locations_json["records"][0]["hours"];
                    foreach ($hours as $hour) { ?>
                            <tr>
                                <td class="day"><?php print_r($hour["day"]); ?></td>
                                <?php
                                    foreach ($hour["intervals"] as $day) {
                                        if (empty($day["start"])) {
                                            $day["start"] = "All day";
                                        }
                                        if (empty($day["end"])) {
                                            $day["end"] = "All day";
                                        }
                                        ?>
                                        <td>
                                            <div class="start"><span>Starts:</span> <?php print_r($day["start"]); ?></div>
                                            <div class="ends"><span>Ends:</span> <?php print_r($day["end"]); ?></div>
                                        </td>
                                    <?php }
                                ?>
                    <?php } ?>
                        </tr>
                    </tbody>
                </table>
                <?php
                if (empty($hours[0]['intervals'][0]['start'])) { ?>
                <div class="additional-hours">
                    <?php
                        $additionalHours = $locations_json["records"][0]["hoursText"];
                        if (!empty($additionalHours["display"])) { ?>
                            <p><strong>Additional Hours:</strong> <?php print_r($additionalHours["display"]); ?></p>
                        <?php }
                    ?>
                </div>
                <?php } ?>
            </div>
            <?php
            $images = $locations_json["records"][0]["images"];
            if(!empty($images)) { ?>
            <div id="image" class="location-images">
                    <h3>Gallery</h3>
                    <div class="gallery-container">
                        <?php
                        // $images = $locations_json["records"][0]["images"];
                        foreach ($images as $image) {
                            $imageWidth = $image["width"];
                            $imageType = $image["type"];
                            $imageHeight = $image["height"];
                            $imageUrl = $image["url"]; ?>
                            <div class="mySlides">
                                <img class="img-responsive" type="<?php print_r($imageType); ?>" src="<?php print_r($imageUrl)?>" style="width:100%">
                                <span class="img-caption"><?php print_r($imageType); ?></span>
                            </div>
                            <?php } ?>
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                </div>
            <?php } ?>
            <?php
            $videos = $locations_json["records"][0]["videos"];
            if (!empty($videos)) { ?>
                <div id="videos" class="location-videos">
                        <h3>Videos</h3>
                        <div class="row">
                            <?php
                            // $videos = $locations_json["records"][0]["videos"];
                            foreach ($videos as $video) {
                                $videoUrl = $video["url"];
                                $videoDescription = $video["description"]; 
                                $str = $videoUrl;
                                $reg = '/v=(\w+)/';
                                preg_match($reg, $str, $ids);
                                    foreach ($ids as $id) { }
                                ?>
                                <div class="videos col-md-6">
                                    <div class="video-url"><iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php print_r($id); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
            <?php } ?>
            <?php
            $urls = $locations_json["records"][0]["urls"];
            if (!empty($urls)) { ?>
                <div class="location-urls">
                <h3>Website</h3>
                <div class="row">
                    <?php
                    foreach ($urls as $url) {
                        if (empty($url["url"])) {
                            $url["url"] = "";
                        }
                        if (empty($url["displayUrl"])) {
                            $url["displayUrl"] = "Not Set";
                        }
                        if (empty($url["type"])) {
                            $url["type"] = "Not Set";
                        }
                    ?>
                    <div class="col-md-4">
                        <div class="url card card-body bg-secondary text-white">
                            <div class="displayUrlType"><h3>Type: <?php print_r($url["type"]); ?></h3></div>
                            <div class="mainUrl"><a class="btn btn-dark" href="<?php print_r($url["url"]); ?>" target="_blank" rel="noopener noreferrer">View Site</a></div>
                        </div>
                    </div>
                    <?php  } ?>
                </div>
            </div>
             <?php } ?>
            <?php
            $lists = $locations_json["records"][0]["lists"];
            if (!empty($lists)) { ?>
            <div class="location-lists">
                <h3>Lists</h3>
                <?php
                foreach ($lists as $list) { ?>
                    <div class="lists card card-body bg-light">
                        <div class="list-name"><?php print_r($list["name"]); ?></div>
                        <div class="list-description"><?php print_r($list["description"]); ?></div>
                        <div class="list-type"><?php print_r($list["type"]); ?></div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="ecl-info">
            <h3 style="margin-bottom: 15px;border-bottom: 1px solid;display: inline-block;padding-bottom: 5px;">Enhanced Content List</h3>
                <?php foreach ($ecl_json as $eclsListings) { ?>
                    <div class="ecl-section">
                    <h4><?php print_r($eclsListings['name']); ?></h4>
                <?php foreach ($eclsListings['sections'] as $section) { ?>
                        <h4 class="section-name"><?php print_r($section['name']); ?></h4>
                        <?php foreach ($section['items'] as $itemData) { ?>
                            <div class="itemsInfo">
                                <p>Name: <?php print_r($itemData['name']); ?></p>
                                <p>Cost type: <?php print_r($itemData['cost']['type']); ?></p>
                                <p>Cost price: <?php print_r($itemData['cost']['price']); ?></p>
                            </div>
                        <?php }
                    } ?>
                    </div>
                <?php } ?>
            </div>
            <?php
                $specialities = $locations_json["records"][0]["specialities"];
                $brands = $locations_json["records"][0]["brands"];
                $products = $locations_json["records"][0]["products"];
                $associations = $locations_json["records"][0]["associations"];
                $languages = $locations_json["records"][0]["languages"];
                $paymentOptions = $locations_json["records"][0]["paymentOptions"];
            ?>
            <div class="location-specific">
                <h3>Other Details</h3>
                <div class="specific-buttons">
                    <?php if (!empty($specialities)) { ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewSpecialities">View Specialities</button>
                    <?php  } ?>
                    <?php if (!empty($brands)) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewBrands">View Brands</button>
                    <?php } ?>
                    <?php if (!empty($products)) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewProducts">View Products</button>
                    <?php } ?>
                    <?php if (!empty($associations)) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewAssociations">View Accociations</button>
                    <?php } ?>
                    <?php if (!empty($languages)) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewLanguages">View Languages</button>
                    <?php } ?>
                    <?php if (!empty($paymentOptions)) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewPayments">Payment Options</button>
                    <?php } ?>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewEcl">View ECL</button> -->
                </div>
                <!-- All Modals -->
                <!-- Specialities -->
                <div class="modal fade" id="viewSpecialities" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Specialities</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                <?php
                                    foreach ($specialities as $speciality) { ?>
                                        <li class="list-group-item"><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp;<?php print_r($speciality); ?></li>
                                    <?php }
                                ?>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Brand -->
                <div class="modal fade" id="viewBrands" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Brands</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                <?php
                                    foreach ($brands as $brand) { ?>
                                        <li class="list-group-item"><i class="fa fa-cube" aria-hidden="true"></i> &nbsp;<?php print_r($brand); ?></li>
                                    <?php }
                                ?>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product -->
                <div class="modal fade" id="viewProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Products</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                <?php
                                    foreach ($products as $product) { ?>
                                        <li class="list-group-item"><i class="fa fa-product-hunt" aria-hidden="true"></i> &nbsp;<?php print_r($product); ?></li>
                                    <?php }
                                ?>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Association -->
                <div class="modal fade" id="viewAssociations" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Associations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                <?php
                                    foreach ($associations as $association) { ?>
                                        <li class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;<?php print_r($association); ?></li>
                                    <?php }
                                ?>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Langauges -->
                <div class="modal fade" id="viewLanguages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Languages</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                <?php
                                    foreach ($languages as $language) { ?>
                                        <li class="list-group-item"><i class="fa fa-language" aria-hidden="true"></i> &nbsp;<?php print_r($language); ?></li>
                                    <?php }
                                ?>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Payments -->
                <div class="modal fade" id="viewPayments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Payment Options</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                <?php
                                    foreach ($paymentOptions as $paymentOption) { ?>
                                        <li class="list-group-item"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp;<?php print_r($paymentOption); ?></li>
                                    <?php }
                                ?>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ECL Modals -->
                <!-- <div class="modal fade" id="viewEcl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ECL</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <?php foreach ($ecl_json as $eclsListings) { ?>
                                    <div class="ecl-section">
                                    <h3>List Name: <?php print_r($eclsListings['name']); ?></h3>
                                <?php foreach ($eclsListings['sections'] as $section) { ?>
                                        <h4 class="section-name"><?php print_r($section['name']); ?></h4>
                                        <?php foreach ($section['items'] as $itemData) { ?>
                                            <div class="itemsInfo">
                                                <p>Name: <?php print_r($itemData['name']); ?></p>
                                                <p>Cost type: <?php print_r($itemData['cost']['type']); ?></p>
                                                <p>Cost price: <?php print_r($itemData['cost']['price']); ?></p>
                                            </div>
                                        <?php }
                                    } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- End All Modals -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="review" class="reviews-wrapper d-none">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <h3>Reviews&nbsp;<span class="reviews_count">(<?php print_r($reviews_json["records"][0]["total"]); ?>)</span></h3>
                <?php
                    $reviews = $reviews_json["records"][0]["reviews"];
                    $reviewLength = sizeof($reviews);
                    if ($reviewLength > 0) {
                        foreach ($reviews as $reviews) { ?>
                            <div class="jumbotron review_wrapper bg-light">
                                <h4 class="reviewer"><span><img class="review_user_thumbnail" src="images/users_icon.jpg" alt="users_icon"></span><?php print_r($reviews["authorName"]); ?></h4>
                                <div class="bg-secondary text-white main_review">
                                    <h4 class="review_lead"><?php print_r($reviews["title"]); ?></h4>
                                    <?php
                                        $ratings = $reviews["rating"];
                                        $ratings = ($ratings/5)*100;
                                    ?>
                                    <span class="score">
                                        <div class="score-wrap">
                                            <span class="stars-active" style="width:<?php echo $ratings; ?>%">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                            <span class="stars-inactive">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </span>
                                    <p class="review-txt"><?php print_r($reviews["content"]); ?></p>
                                    <span class="review-timestamp timestamp"><?php print_r($reviews["timestamp"]); ?></span>
                                </div>
                                    <div class="review_comments bg-secondary">
                                        <h5>Comments:</h5>
                                <?php
                                    foreach ($reviews["comments"] as $comment) { ?>
                                        <div class="comments-wrapper bg-dark">
                                            <div class="comment-author"><h5><?php print_r($comment["authorName"]); ?></h5></div>
                                            <div class="comment-content"><p><?php print_r($comment["content"]); ?></p></div>
                                            <div class="comment-timestamp timestamp"><p><?php print_r($comment["timestamp"]); ?></p></div>
                                        </div>
                                    <?php }
                                ?>
                                    </div>
                                </div>
                            <?php }
                    } else { ?>
                        <div class="jumbotron review_wrapper bg-secondary">
                            <h4 class="reviewer text-white">No Reviews</h4>
                        </div>
                    <?php }
                ?>
              </div>
          </div>
      </div>
  </div>
  <div class="write-reviews-wrapper d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <p><a href="review.php?id=<?php print_r($locations_json["records"][0]["partnerID"]); ?>" class="btn btn-prim">Write your review</a></p>
                </div>
            </div>
        </div>
  </div>
</div>
<div class="footer bg-dark text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; <?php echo(date('Y')-1); ?> -  <?php echo(date('Y')); ?>  | All Rights Reserved | <a href="https://www.gsmresults.com/" target="_blank">Web Design Tucson</a> by GSM Marketing Agency</p>
            </div>
        </div>
    </div>
</div>
<script src="js/simpleCarousel.js"></script>
<script type="text/javascript">
    function yext_track(target) {
        var track = new Image();
        track.src="http://pixel.yext-pub.com/plpixel?source=detailspage&action=click&pid=5RSdyCCmND&ids=<?php echo $_GET['id']; ?>" + "&target=" + target;
    }
</script>
</body>
</html>