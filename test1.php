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
                    <li><a class="dropdown-toggle" data-toggle="dropdown">Explore</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories_json as $keys) {
                            foreach ($keys as $key) { ?>
                                <li><a class="dropdown-item" href="categories.php?category=<?php print_r($key["categoriesNameAlias"]); ?>"><?php print_r($key["categoryName"]); ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                    <li><a class="add-listing" href="#"><i class="fa fa-user" aria-hidden="true"></i>Join Now</a></li>
                    <li><a class="add-listing" href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add Listings</a></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="form-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="formContainer">
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

<script>

var form = document.getElementById("form");

form.addEventListener('submit', (even) => {
    event.preventDefault();
    
});
</script>

<div class="footer bg-dark text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; <?php echo(date('Y')-1); ?> -  <?php echo(date('Y')); ?>  | All Rights Reserved | <a href="https://www.gsmresults.com/" target="_blank">Web Design Tucson</a> by GSM Marketing Agency</p>
            </div>
        </div>
    </div>
</div>