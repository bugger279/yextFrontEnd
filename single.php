<?php
global $id;
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    Header('Location: index.php');
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
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="logo"><a href="index.php"><img class="img-responsive" src="images/123localLogo.png" alt="123local logo"></a></div>
      </div>
    </div>
  </div>
</div>
<div class="main-content">
  <div class="inner-top-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <h1 id="name"><?php print_r($locations_json["records"][0]["name"]); ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="cat-and-location">
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
                $closed = $locations_json["records"][0]["closed"];
                if (empty($closed)) {
                    $closed = "Not Set";
                }
                $locationDescription = $locations_json["records"][0]["description"];
                $yearEstablished = $locations_json["records"][0]["yearEstablished"];
                $latitude = $locations_json["records"][0]["geoData"]["displayLatitude"];
                $longitude = $locations_json["records"][0]["geoData"]["displayLongitude"];
                $specialMessage = $locations_json["records"][0]["specialOffer"]["message"];
                $specialUrl = $locations_json["records"][0]["specialOffer"]["url"];
                $twitterHandle = $locations_json["records"][0]["twitterHandle"];
                $facebookHandle = $locations_json["records"][0]["facebookPageUrl"];
                $ratings = ($locations_json["records"][0]["rating"]/5)*100;
                ?>
                    <h2 class="location-name">
                    <?php if (!empty($logo)) { ?>
                        <span class="main-logo"><img class="img-responsive" src="<?php print_r($logo); ?>" alt="<?php print_r($locationName); ?>"></span>
                    <?php } ?>    
                    <?php print_r($locationName); ?> <span class="attribution"><img src="<?php print_r($attributionImage); ?>" height="<?php print_r($attributionImageHeight); ?>" width="<?php print_r($attributionImageWidth); ?>" alt="<?php print_r($attributionImageDescription); ?>"></span><span class="closed">Closed: <?php print_r($closed); ?></span></h2>
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
                                <div class="message">Special Offer: <?php print_r($specialMessage);?></div>
                                <div class="url"><a target="_blank" class="btn btn-dark" href="<?php print_r($specialUrl);?>">View Offer</a></div>
                            </div>
                        </div>
                        <div class="social-links col-md-4">
                            <div class="card card-body bg-secondary text-white">
                                <h3>Social Links</h3>
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
                <?php
                    $locationAddress = $locations_json["records"][0]["address"];
                ?>
                    <div id="addresses">
                        <div id="address">
                            <span class="address"><?php print_r($locationAddress["address"]); ?></span> ,
                            <?php
                                if (empty($locationAddress["address2"])) {
                                    $locationAddress["address2"] = ""; ?>

                                    <span class="address2"><?php print_r($locationAddress["address2"]); ?></span>
                                <?php } else { ?>
                                    <span class="address2"><?php  print_r($locationAddress["address2"]); ?></span>
                                <?php }
                                
                            ?>,
                            <?php
                                if (empty($locationAddress["city"])) {
                                    $locationAddress["city"] = ""; ?>
                                    <span class="city"><?php print_r($locationAddress["city"]); ?></span>
                                <?php } else { ?>
                                    <span class="city"><?php print_r($locationAddress["city"]); ?></span>
                                <?php }
                                
                            ?>,
                            <?php
                                if (empty($locationAddress["displayAddress"])) {
                                    $locationAddress["displayAddress"] = ""; ?>
                                    <span class="displayAddress"><?php print_r($locationAddress["displayAddress"]);?></span>
                                <?php } else { ?>
                                    <span class="displayAddress"><?php print_r($locationAddress["displayAddress"]); ?></span>
                                <?php }
                            ?>,
                            <?php
                                if (empty($locationAddress["countryCode"])) {
                                    $locationAddress["countryCode"] = ""; ?>
                                    <?php print_r($locationAddress["countryCode"]); ?>
                                <?php } else { ?>
                                    <?php print_r($locationAddress["countryCode"]); ?>
                                <?php }
                            ?>,
                            <?php
                                if (empty($locationAddress["postalCode"])) {
                                    $locationAddress["postalCode"] = ""; ?>
                                    <span class="postalCode"><?php print_r($locationAddress["postalCode"]); ?></span>
                                <?php } else { ?>
                                    <span class="postalCode"><?php print_r($locationAddress["postalCode"]); ?></span>
                                <?php }
                            ?>,
                            <?php
                                if (empty($locationAddress["state"])) {
                                    $locationAddress["state"] = ""; ?>
                                    <span class="state"><?php print_r($locationAddress["state"]); ?></span>
                                <?php } else { ?>
                                    <span class="state"><?php print_r($locationAddress["state"]); ?></span>
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
                        $phoneCountryCode = $details["number"]["countryCode"];
                    ?>
                        <div class="number">
                            <div class="phone-number">Phone Number: <a type="<?php print_r($details["type"]); ?>" href="tel:<?php print_r($phoneCountryCode); ?>-<?php print_r($phoneNumber); ?>"><?php print_r($phoneCountryCode); ?>-<?php print_r($phoneNumber); ?></a></div>
                            <div class="phone-description">Description: <?php print_r($details["description"]); ?></div>
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
                                        if (empty($day["starts"])) {
                                            $day["starts"] = "00:00:00";
                                        }
                                        if (empty($day["ends"])) {
                                            $day["ends"] = "00:00:00";
                                        }
                                        ?>
                                            <td>
                                                <div class="start"><span>Starts:</span> <?php print_r($day["starts"]); ?></div>
                                                <div class="ends"><span>Ends:</span> <?php print_r($day["ends"]); ?></div>
                                            </td>
                                    <?php }
                                ?>
                    <?php }
                ?>
                        </tr>
                    </tbody>
                </table>
                <div class="additional-hours">
                    <?php
                        $additionalHours = $locations_json["records"][0]["hoursText"];
                        if (empty($additionalHours["display"])) {
                            $additionalHours["display"] = "Not Set";
                        }
                    ?>
                    <p><strong>Additional Hours:</strong> <?php print_r($additionalHours["display"]); ?></p>
                </div>
            </div>
            <div id="image" class="location-images">
                <h3>Gallery</h3>
                <div class="gallery-container">
                    <?php
                    $images = $locations_json["records"][0]["images"];
                    foreach ($images as $image) {
                        $imageWidth = $image["width"];
                        $imageType = $image["type"];
                        $imageHeight = $image["height"];
                        $imageUrl = $image["url"]; ?>
                        <div class="mySlides">
                            <img class="img-responsive" type="<?php print_r($imageType); ?>" src="<?php print_r($imageUrl)?>" style="width:100%">
                            <span class="img-caption"><?php print_r($imageType); ?></span>
                        </div>
                        <?php
                        }
                        ?>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
            <div id="videos" class="location-videos">
                <h3>Videos</h3>
                <div class="row">
                    <?php
                    $videos = $locations_json["records"][0]["videos"];
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
            <div class="location-urls">
                <h3>Urls</h3>
                <div class="row">
                    <?php
                    $urls = $locations_json["records"][0]["urls"];
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
                            <div class="mainUrl"><p><a class="btn btn-dark" href="<?php print_r($url["url"]); ?>" target="_blank" rel="noopener noreferrer">View Website</a></p></div>
                            <div class="displayUrl">Display Url: <a href="<?php print_r($url["displayUrl"]); ?>" target="_blank" rel="noopener noreferrer"><?php print_r($url["displayUrl"]); ?></a> </div>
                            <div class="displayUrlType">Type: <?php print_r($url["type"]); ?></div>
                        </div>
                    </div>
                    <?php  } ?>
                </div>
            </div>
            <div class="location-lists">
                <h3>Lists</h3>
                <?php
                $lists = $locations_json["records"][0]["lists"];
                foreach ($lists as $list) { ?>
                    <div class="lists card card-body bg-light">
                        <div class="list-name"><?php print_r($list["name"]); ?></div>
                        <div class="list-description"><?php print_r($list["description"]); ?></div>
                        <div class="list-type"><?php print_r($list["type"]); ?></div>
                    </div>
                <?php }
                ?>
            </div>
            <div class="location-specific">
                <h3>Other Details</h3>
                <div class="specific-buttons">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewSpecialities">View Specialities</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewBrands">View Brands</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewProducts">View Products</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewAssociations">View Accociations</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewLanguages">View Languages</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewPayments">Payment Options</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewEcl">View ECL</button>
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
                                    $specialities = $locations_json["records"][0]["specialities"];
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
                                    $brands = $locations_json["records"][0]["brands"];
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
                                    $products = $locations_json["records"][0]["products"];
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
                                    $associations = $locations_json["records"][0]["associations"];
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
                                    $languages = $locations_json["records"][0]["languages"];
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
                                    $paymentOptions = $locations_json["records"][0]["paymentOptions"];
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
                <div class="modal fade" id="viewEcl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </div>
                <!-- End All Modals -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="reviews-wrapper">
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
</body>
</html>