<?php 
    if (isset($_POST['submit'])) {
        $s = $nameData = $_POST['name'];
        if(empty($s)) {
            Header('Location: index.php');
        }
    }
?>

<?php
    if (isset($_POST['addFilter'])) {
        $cityName = $_POST['city'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $locName = $_POST['name'];
        $searchedLocation = "http://123local.com/powerlistings/product/search.php?name=$locName&city=$cityName&address=$address&state=$state&zip=$zip";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'key: ieurtjkosakwehua1457821244amsnashjad'
        ));
        curl_setopt($ch, CURLOPT_URL, $searchedLocation);
        $searchedData = curl_exec($ch);
        $searchedData_json = json_decode($searchedData, true);
        curl_close($ch);
    }
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
                <?php }
              } ?>
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
</div>
<div class="main-content">
<div id="filter-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class="form-box">
                        <div class="form-group">
                            <!-- <label for="cityName">City Name: <input type="checkbox" id="cityName"></label> -->
                            <div class="field-hidden"><input type="text" placeholder="Name" name="name" id="name"></div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="cityName">City Name: <input type="checkbox" id="cityName"></label> -->
                            <div class="field-hidden"><input type="text" placeholder="city" name="city" id="city"></div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="addressName">Address: <input type="checkbox" id="addressName"></label> -->
                            <div class="field-hidden"><input type="text" placeholder="address" name="address" id="address"></div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="stateName">State: <input type="checkbox" id="stateName"></label> -->
                            <div class="field-hidden"><input type="text" placeholder="state" name="state" id="state"></div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="zipName">Zip: <input type="checkbox" id="zipName"></label> -->
                            <div class="field-hidden"><input type="text" placeholder="zip" name="zip" id="zip"></div>
                        </div>

                    </div>
                    <div class="form-button">
                        <button type="submit" class="btn btn-primary" name="addFilter">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="filteredContent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $lists = "";
                if (!empty($searchedData_json["records"])) {
                    echo "<ul>";
                    foreach($searchedData_json as $keys) {
                        foreach ($keys as $key => $value) {
                            $listingName = $keys[$key]["name"];
                            $listingId = $keys[$key]["id"];
                            $lists = '<li class="success"><a href="single.php?id=' . $listingId . '">' . $listingName . '</a></li>';
                            print_r($lists);
                        }
                    }
                    echo "</ul>";
                } else {
                    $lists = '<ul><li>No records found..</a></ul>';
                    print_r($lists);
                }
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