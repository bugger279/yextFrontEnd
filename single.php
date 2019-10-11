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
                <div class="menu-group">
                    <ul class="main-menu">
                    <li><a id="explore-header" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-compass" aria-hidden="true"></i> Explore</a>
                      <ul class="dropdown-menu">
                        <?php foreach ($categories_json as $keys) {
                          foreach ($keys as $key) { ?>
                            <li><a class="dropdown-item" href="categories.php?category=<?php print_r($key["categoriesNameAlias"]); ?>"><i class="fa fa-list-alt" aria-hidden="true"></i><?php print_r($key["categoryName"]); ?></a></li>
                          <?php } } ?>
                      </ul>
                    </li>
                    <!-- <li><a class="add-listing" href="#"><i class="fa fa-user" aria-hidden="true"></i>Join Now</a></li> -->
                    <li><a class="add-listing" href="add.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Add Listings</a></li>
                    </ul>
                  </div>
                  <form id="searchForm" action="search.php" method="post">
                      <div class="form-row align-items-center">
                          <div class="col-auto fieldInput">
                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="listing name" required  autocomplete="off">
                            <div class="result"><ul></ul></div>
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </div>
                  </form>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
    </div> -->
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
    $images = $locations_json["records"][0]["images"];
    $emails = $locations_json["records"][0]["emails"];
    $keywords = $locations_json["records"][0]["keywords"];
    $closed = $locations_json["records"][0]["closed"];
    $additionalHours = $locations_json["records"][0]["hoursText"];
    $yearEstablished = $locations_json["records"][0]["yearEstablished"];
?>
<div class="single-header">
    <div class="listing-name">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="listing-title"><?php print_r($locationName); ?> <span class="established text-muted small">(<?php print_r($yearEstablished); ?>)</span>
                        <!-- <div class="header social-links">
                            <div class="twitter"><a id="twitterHandle" target="_blank" href="https://twitter.com/<?php print_r($twitterHandle);?>"></a></div>
                            <div class="facebook"><a id="facebookPageUrl" target="_blank" href="<?php print_r($facebookHandle);?>"></a></div>
                        </div> -->
                    </h2>
                    <h4><?php print_r(substr($locationDescription, 0, 140)); echo "..."; ?></h4>
                    <div class="popUpsInheader">
                        <?php if (!empty($emails)) { ?>
                        <a class="greenBtn" href="" data-toggle="modal" data-target="#emailPopUp">Email Us</a>
                        <?php } ?>
                        <?php if (!empty($phones)) { ?>
                        <a class="greenBtn" href="" data-toggle="modal" data-target="#phonePopUp">Phone Number</a>
                        <?php } ?>
                        <?php if (!empty($hours)) { ?>
                        <a class="greenBtn" href="" data-toggle="modal" data-target="#hoursPopUp">Working Hours</a>
                        <?php } ?>
                    </div>
                    <div class="headerAddress">
                        <div class="main-address">
                            Address: <?php print_r($locationAddress["address"]); ?>
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
                                    <span class="state"><?php print_r($locationAddress["state"]); ?> </span>
                                <?php }
                            ?>
                        </div>
                    </div>
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
            <div class="description-section section">
                <h4>Description</h4>
                <article><p><?php print_r($locationDescription); ?></p></article>
            </div>
            <div class="review-section section">
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

            <?php
            if (!empty($keywords)) { ?>
                <div class="keyword-section section">
                    <article>
                            <h4>Tags:&nbsp;&nbsp;</h4>
                            <ul>
                                <?php
                                foreach ($keywords as $key) { ?>
                                    <li class="keywords text-muted"><?php print_r($key); ?></li>
                                <?php } ?>
                            </ul>
                    </article>
                </div>
            <?php } ?>
            <?php
            if (!empty($brands)) { ?>
                <div class="keyword-section section">
                    <article>
                            <h4>Brands:&nbsp;&nbsp;</h4>
                            <ul>
                                <?php
                                    foreach ($brands as $brand) { ?>
                                        <li class="keywords text-muted"><?php print_r($brand); ?></li>
                                    <?php }
                                ?>
                            </ul>
                    </article>
                </div>
            <?php } ?>
            <?php
            if (!empty($products)) { ?>
                <div class="keyword-section section">
                    <article>
                            <h4>Product:&nbsp;&nbsp;</h4>
                            <ul>
                                <?php
                                    foreach ($products as $product) { ?>
                                        <li class="keywords text-muted"><?php print_r($product); ?></li>
                                    <?php }
                                ?>
                            </ul>
                    </article>
                </div>
            <?php } ?>
            <div class="imagesAndVideosSection">
                <?php if(!empty($images)) { ?>
                <div id="image" class="location-images">
                    <h4>Gallery</h4>
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
            if (!empty($videos)) { ?>
                <div id="videos" class="location-videos">
                    <h4>Videos</h4>
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
                            <div class="videos">
                                <div class="video-url"><iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php print_r($id); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                            </div>
                        <?php }
                        ?>
                </div>
            <?php } ?>
            </div>
            <?php
            if (!empty($lists)) { ?>
                <div class="keyword-section section">
                    <article>
                        <h4>Lists:&nbsp;&nbsp;</h4>
                        <ul>
                        <?php
                        foreach ($lists as $list) { ?>
                            <li class="keywords text-muted"><?php print_r($list["name"]); ?></li>
                        <?php } ?>
                        </ul>
                        <div class="ecl-btn"><a class="greenBtn" href="" data-toggle="modal" data-target="#eclPopUp">Explore More</a></div>
                    </article>
                </div>
            <?php } ?>
            <div id="submitReview" class="rate-review-section">
                    <?php
                    if (isset($_POST['submitReview'])) {
                        $status = $_POST['status'];
                        $authorName = $_POST['authorName'];
                        $authorPhotoUrl = $_POST['authorPhotoUrl'];
                        $title = $_POST['title'];
                        $content = $_POST['content'];
                        $source = $_POST['source'];
                        $url = $_POST['url'];
                        $rating = $_POST['rating'];
                        
                        $reviewArray = array(
                            'listingId' => $id,
                            'status' => $status,
                            'authorName' => $authorName,
                            'authorPhotoUrl' => $authorPhotoUrl,
                            'title' => $title,
                            'content' => $content,
                            'source' => $source,
                            'url' => $url,
                            'rating' => $rating
                        );
                        $payLoad = json_encode($reviewArray);
        
                        $postReview = "http://123local.com/powerlistings/reviews/create.php";
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $payLoad);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'key: ieurtjkosakwehua1457821244amsnashjad',
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen($payLoad)
                        ));
                        curl_setopt($ch, CURLOPT_URL, $postReview);
                        $reviewFeedback = curl_exec($ch);
                        $reviewFeedback_json = json_decode($reviewFeedback, true);
                        curl_close($ch);
                    }
                    ?>
                    <?php if (!empty($reviewFeedback_json)) { ?>
                            <script>
                                function newLocation() {
                                    window.location="single.php?id=<?php print_r($id); ?>";
                                }
                            </script>
                            <p><a class="btn btn-primary text-white" onclick="newLocation()">Reload Page</a></p>
                        <?php } ?>
                        <div id="accordion" role="tablist">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0"><a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-star" aria-hidden="true"></i> Rate us and Write a Review</a></h5>
                                </div>
                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="formWrapper">
                                        <form action="" id="form" method="POST">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" id="reviewStatus" required>
                                                    <option>ACTIVE</option>
                                                    <option>PENDING</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="authorName">Name</label>
                                                <input name="authorName" type="text" class="form-control" id="authorName" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="authorPhotoUrl">Author Photo Url</label>
                                                <input name="authorPhotoUrl" type="text" class="form-control" id="authorPhotoUrl" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Review Summary</label>
                                                <input name="title" type="text" class="form-control" id="title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="source">Source</label>
                                                <input name="source" type="text" class="form-control" id="source" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="url">Review Source Url</label>
                                                <input name="url" type="text" class="form-control" id="url" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="rating">Rating</label>
                                                <select name="rating" class="form-control" id="exampleFormControlSelect1" required>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Review</label>
                                                <textarea name="content" type="text" class="form-control" id="content" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="submitReview">Submit Review</button>
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
                <?php if (!empty($specialUrl)) { ?>    
                <div class="addtionalData">
                    <h4 class="side-header">Special Offers</h4>
                    <div class="message"><a href="<?php print_r($specialUrl); ?>"><?php print_r($specialMessage);?> <i class="fa fa-external-link" aria-hidden="true"></i></a></div>
                </div>
                <?php } ?>
                <?php if (!empty($paymentOptions)) { ?>
                <div class="addtionalData">
                    <h4 class="side-header">Payment Options</h4>    
                    <ul>
                    <?php
                    foreach ($paymentOptions as $paymentOption) { ?>
                        <li class="list-group-item"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp;<?php print_r($paymentOption); ?></li>
                    <?php } ?>
                    </ul>
                </div>
                <?php } ?>
                <?php
                    if (!empty($associations)) { ?>
                    <div class="addtionalData">
                        <h4 class="side-header">Associations</h4>    
                        <ul>
                        <?php
                        foreach ($associations as $association) { ?>
                            <li class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;<?php print_r($association); ?></li>
                        <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                <?php
                    if (!empty($brands)) { ?>
                        <div class="addtionalData">
                            <h4 class="side-header">Brands</h4>    
                            <ul>
                            <?php
                            foreach ($brands as $brand) { ?>
                                <li class="list-group-item"><i class="fa fa-cube" aria-hidden="true"></i> &nbsp;<?php print_r($brand); ?></li>
                            <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php
                    if (!empty($specialities)) { ?>
                        <div class="addtionalData">
                            <h4 class="side-header">Specialities</h4>    
                            <ul>
                            <?php
                            foreach ($specialities as $speciality) { ?>
                                <li class="list-group-item"><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp;<?php print_r($speciality); ?></li>
                            <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php
                    if (!empty($languages)) { ?>
                        <div class="addtionalData">
                            <h4 class="side-header">Languages</h4>    
                            <ul>
                            <?php
                            foreach ($languages as $language) { ?>
                                <li class="list-group-item"><i class="fa fa-language" aria-hidden="true"></i> &nbsp;<?php print_r($language); ?></li>
                            <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
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
<!-- POP UPS -->
<div class="modal fade" id="emailPopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Us via Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php
                    foreach ($emails as $key) {
                        if (empty($key["description"])) {
                            $key["description"] = "Email";
                        }
                        ?>
                        <div class="email modelBodySection">
                            <div class="email-address"><?php print_r($key["description"]); ?>: <a href="mailto:<?php print_r($key["address"]); ?>"><?php print_r($key["address"]); ?></a></div>
                        </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="greenBtn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="phonePopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Us via Phone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php
                    foreach ($phones as $details) {
                        $phoneNumber = $details["number"]["number"];
                        $input = $phoneNumber; 
                        $output = "(" . substr($input, -10, -7) . ") " . substr($input, -7, -4) . "-" . substr($input, -4);
                        $phoneCountryCode = $details["number"]["countryCode"];
                    ?>
                        <div class="number modelBodySection">
                            <div class="phone-number"><?php print_r($details["type"]); ?> : <a type="<?php print_r($details["type"]); ?>" href="tel:<?php print_r($phoneCountryCode); ?><?php print_r($phoneNumber); ?>"><?php print_r($phoneCountryCode); ?> <?php print_r($output); ?></a></div>
                        </div>
                    <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="greenBtn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hoursPopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Working Hours</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="location-hours">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col" colspan="3">Intervals</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="greenBtn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="eclPopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="greenBtn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- END POPUPS -->

<script src="js/simpleCarousel.js"></script>
<script type="text/javascript">
    function yext_track(target) {
        var track = new Image();
        track.src="http://pixel.yext-pub.com/plpixel?source=detailspage&action=click&pid=5RSdyCCmND&ids=<?php echo $_GET['id']; ?>" + "&target=" + target;
    }
</script>
<script>
$('a[href="#submitReview"]').click(() => {
	$('#collapseOne').addClass('show');
});
</script>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#searchForm input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(".result ul");
            if(inputVal.length){

                $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: "search-ajax.php",
                    data: { "terms": inputVal },
                    success: function(response) {
                        if (response) {
                            if ($(".result ul li").length > 0){
                                // console.log($(".result ul li").length);
                                $(".result").addClass("populated");
                            } else {
                                $(".result").removeClass("populated");
                            }
                            resultDropdown.html(response);
                        }
                    },
                    error: (error) => {
                        console.log(error);
                    } 
                });
            } else{
                resultDropdown.empty();
            }
        });
    });
    </script>
</body>
</html>