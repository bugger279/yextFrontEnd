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

<?php
    // $writeReview = "http://123local.com/powerlistings/reviews/create.php";
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     'key: ieurtjkosakwehua1457821244amsnashjad',
	// 	'Content-Type: application/json',
    // 	'Content-Length: ' . strlen($json)
    // ));
    // curl_close($ch);
    // echo $response;
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
  <div class="review-form">
      <div class="container">
          <div class="row">
                <form action="self">
                    <div class="form-group">
                        <label for="authorName">Name:</label>
                        <input type="authorName" class="form-control" id="authorName">
                    </div>
                    <div class="form-group">
                        <label for="title">Review Brief:</label>
                        <input type="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <input type="content" class="form-control" id="content">
                    </div>
                    <div class="form-group">
                        <label for="source">Source:</label>
                        <input type="source" class="form-control" id="source">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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