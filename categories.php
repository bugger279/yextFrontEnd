<?php
global $category_name;
if(isset($_GET['cat_name'])) {
    $category_name = $_GET['cat_name'];
} else {
    Header('Location: index.php');
}
?>

<?php
    $readAll = 'http://123local.com/powerlistings/product/categoryDetails.php?cat_name="' . $category_name . '"';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'key: ieurtjkosakwehua1457821244amsnashjad'
    ));
    curl_setopt($ch, CURLOPT_URL, $readAll);
    $locations = curl_exec($ch);
    var_dump($locations);
    $locations_json = json_decode($locations, true);
    curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Find the Best Local Results | Powerlisting</title>
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
  <div class="top-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <h2>Find the Best Local Results for whatever You Need! Near Me is our Job.</h2>
            <h4>All You Need is 123 Local.  We have done the research and only deliver the best local results for you.  When you need to find anything Near Me, 123 Local is the Best!</h4>
            <p>123 Local is the only place you need when trying to find the best local search results.  123 Local is always "Near Me".</p>
        </div>
      </div>
    </div>
  </div>
  <div class="cat-and-location">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
              <h2>Listings</h2>
              <div class="locations">
                <div class="row">
                <?php
                foreach($locations_json as $keys) {
                  foreach ($keys as $key => $value) { ?>
                    <div class="location-wrappper col-md-3">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title location-name"><a href="single.php?id=<?php print_r($keys[$key]["partnerID"]); ?>"><?php print_r($keys[$key]["name"]); ?></a></h5>
                              <?php
                              $ratings = $keys[$key]["rating"];
                              $ratings = ($ratings/5)*100;
                              $reviewsCount = $keys[$key]["total_reviews"];
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
                                <span class="reviews-count">(<?php echo $reviewsCount; ?>)</span>
                              </span>
                              <h6 class="card-subtitle mb-2 text-muted"><a class="phone" href="tel:<?php print_r($keys[$key]["phones"][0]["number"]["countryCode"]); ?><?php print_r($keys[$key]["phones"][0]["number"]["number"]); ?>"><?php print_r($keys[$key]["phones"][0]["number"]["number"]); ?></a></h6>
                              <p class="card-text location-address"><?php print_r($keys[$key]["address"]["displayAddress"]); ?></p>
                              <a href="single.php?id=<?php print_r($keys[$key]["partnerID"]); ?>" class="card-link"><button type="button" class="btn btn-primary">Read More</button></a>
                          </div>
                      </div>
                    </div>
                <?php } 
              } ?>
                </div>
                <input type='hidden' id='current_page' />
                <input type='hidden' id='show_per_page' />
                <div id='page_navigation' class="text-right"></div>
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
<script src="js/pagination.js"></script>
</body>
</html>