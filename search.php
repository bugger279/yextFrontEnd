<?php 
    if (isset($_POST['submit'])) {
        $s = $nameData = $_POST['name'];
        if(empty($s)) {
            Header('Location: index.php');
        }
    } else {
        // Header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php print_r($s); ?> search results | Powerlisting</title>
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
    $searchedLocation = "http://123local.com/powerlistings/product/find.php?s=$s";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'key: ieurtjkosakwehua1457821244amsnashjad'
    ));
    curl_setopt($ch, CURLOPT_URL, $searchedLocation);
    $searchedData = curl_exec($ch);
    $searchedData_json = json_decode($searchedData, true);
    curl_close($ch);
?>

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
                <!-- <form action="" method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="listing name" required  autocomplete="off">
                            <div class="result"><ul></ul></div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form> -->
                <form id="searchForm" action="search.php" method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto fieldInput">
                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="listing name" required  autocomplete="off">
                            <div class="result"><ul></ul></div>
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
    <div class="single-header">
        <div class="listing-name">
            <div class="container">
                <div class="row">
                    <?php if (!empty($searchedData_json["records"])) { ?>
                    <div class="col-md-12">
                        <?php
                            $newArray = $searchedData_json["records"];
                            $resultsCount = count($newArray);
                        ?>
                        <h2>Search Results for "<?php print_r($s); ?>"</h2>
                        <h4>Total Listing(s) found: <?php print_r($resultsCount); ?></h4>
                    </div>
                    <?php } else { ?>
                    <div class="col-md-12">
                        <?php
                            $newArray = $searchedData_json["message"];
                        ?>
                        <h2>Search Results for "<?php print_r($s); ?>"</h2>
                        <h4>No Results found please refine your search</h4>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($searchedData_json["records"])) { ?>
    <div class="single-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="results-section">
                        <?php
                            foreach ($newArray as $key) { ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php print_r($key['name']); ?></h5>
                                    <p class="card-text"><?php print_r(substr($key['description'], 0, 120)); ?></p>
                                    <a href="single.php?id=<?php print_r($key["partnerID"]); ?>">View Details</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
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
                                console.log($(".result ul li").length);
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