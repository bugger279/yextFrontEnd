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
    curl_close($ch);
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
            <h1><?php print_r($locations_json["records"][0]["name"]); ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="cat-and-location">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="left-side">
              <div class="location-categories">
                <h3>Categories</h3>
                <?php
                    $categories = $locations_json["records"][0]["categories"];
                    foreach ($categories as $key) { ?>
                        <div class="category"><?php print_r($key["name"]); ?></div>
                    <?php }
                ?>
              </div>
              <div class="location-emails">
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
                $closed = $locations_json["records"][0]["closed"];
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
                    <h2 class="location-name"><?php print_r($locationName); ?> <span class="attribution"><img src="<?php print_r($attributionImage); ?>" height="<?php print_r($attributionImageHeight); ?>" width="<?php print_r($attributionImageWidth); ?>" alt="<?php print_r($attributionImageDescription); ?>"></span><span class="closed">Closed: <?php print_r($closed); ?></span></h2>
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
                    <div class="description"><?php print_r($locationDescription); ?></div>
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
                                <h3>Special Offer</h3>
                                <div class="message">Special Offer: <?php print_r($specialMessage);?></div>
                                <div class="url"><a class="btn btn-dark" href="<?php print_r($specialUrl);?>">View Offer</a></div>
                            </div>
                        </div>
                        <div class="social-links col-md-4">
                            <div class="card card-body bg-secondary text-white">
                                <h3>Social Links</h3>
                                <div class="twitter"><a href="<?php print_r($twitterHandle);?>">Twitter</a></div>
                                <div class="facebook"><a href="<?php print_r($facebookHandle);?>">Facebook</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="yearEstablished">
                        <p>Year Established: <?php print_r($yearEstablished); ?></p>
                    </div>
                </div>
            </div>
            <div class="location-phones">
                <h3>Phones</h3>
                <?php
                    $phones = $locations_json["records"][0]["phones"];
                    foreach ($phones as $details) {
                        $phoneNumber = $details["number"]["number"];
                        $phoneCountryCode = $details["number"]["countryCode"];
                    ?>
                        <div class="number">
                            <div class="phone-number">Phone Number: <?php print_r($phoneCountryCode); ?>-<?php print_r($phoneNumber); ?></div>
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
                                    foreach ($hour["intervals"] as $day) { ?>
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
            </div>
            <div class="location-images">
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
                            <img class="img-responsive" src="<?php print_r($imageUrl)?>" style="width:100%">
                        </div>
                        <?php }
                        ?>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
            <div class="location-videos">
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
                <?php
                $urls = $locations_json["records"][0]["urls"];
                foreach ($urls as $url) { ?>
                <div class="url card card-body bg-light">
                    <div class="displayUrl"><?php print_r($url["displayUrl"]); ?></div>
                    <div class="displayUrlType"><?php print_r($url["description"]); ?></div>
                </div>
                <?php  } ?>
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
                <!-- End All Modals -->
            </div>
          </div>
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