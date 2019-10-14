<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Listing | Powerlisting</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome/css/font-awesome.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/xvalidation.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="admin/styles/style.css">
    <script type="text/javascript">
        $(document).ready(function() {
            $("#form").xvalidation({
                theme: "bootstrap",

            });
            $("#form").submit(function(evt) {
                evt.preventDefault();
                evt.stopPropagation();
                if ($("#form").data().xvalidation.methods.validate()) {
                    $.ajax({
                        type: "POST",
                        url: "add-action.php",
                        data: $('#form').serialize(),
                        success: function(response) {
                            var json = JSON.parse(response);
                            if (json.url) {
                                alert("Listing created successfully, Click Ok To visit your created listing!");
                                location.href = json.url;
                            } else {
                                alert("There is some problem while creating Please Try again later!");
                            }
                        }
                    });
                }
                return false;
            });
        });
    </script>
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
                        <div class="logo">
                            <a href="index.php"><img class="img-responsive" src="images/123localLogo.png" alt="123local logo"></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="menu-group">
                            <ul class="main-menu">
                            <li><a id="explore-header" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-compass" aria-hidden="true"></i> Explore</a>
                              <ul class="dropdown-menu">
                                <?php foreach ($categories_json as $keys) {
                                  foreach ($keys as $key) { ?>
                                    <li><a class="dropdown-item" href="categories.php?category=<?php print_r($key["categoriesNameAlias"]); ?>"><?php print_r($key["categoryName"]); ?></a></li>
                                  <?php }
                                } ?>
                              </ul>
                            </li>
                            <!-- <li><a class="add-listing" href="#"><i class="fa fa-user" aria-hidden="true"></i>Join Now</a></li> -->
                            <li><a class="add-listing" href="#"><i class="fa fa-list-alt" aria-hidden="true"></i> Add Listings</a></li>
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
        <div class="inner-top-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Add New Listing</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="cat-and-location">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="right-side">
                            <form action="" enctype="multipart/form-data" method="post" novalidate id="form">
                                <div class="form-group">
                                    <label>Yext ID</label>
                                    <input type="text" name="yext-id" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
										<option value="LIVE">LIVE</option>
										<option value="AVAILABLE">AVAILABLE</option>
										<option value="ACTIVE">ACTIVE</option>
										<option value="CLAIMED">CLAIMED</option>
										<option value="SUPPRESSED">SUPPRESSED</option>
										<option value="BLOCKED">BLOCKED</option>
									</select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" data-validation="noempty" data-content="Name cannot be empty">
                                </div>
                                <div class="form-group">
                                    <h3><strong>ADDRESS</strong></h3>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" data-validation="noempty" data-content="Address cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Visible</label>
                                    <select class="form-control" name="visible">
										<option value="false">FALSE</option>
										<option value="true">TRUE</option>
									</select>
                                </div>
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input type="text" name="address-2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" data-validation="noempty" data-content="City cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Display Address</label>
                                    <input type="text" name="display-address" class="form-control" data-validation="noempty" data-content="Display Address cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Country Code</label>
                                    <input type="text" name="country-code" class="form-control" data-validation="noempty" data-content="Country cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" name="postal-code" class="form-control" data-validation="numericonly" data-content="Postal Code cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" name="state" class="form-control" data-validation="noempty" data-content="State cannot be empty">
                                </div>
                                <div class="form-group">
                                    <h3><strong>PHONE NUMBERS</strong></h3>
                                </div>
                                <div id="phone-number">
                                    <div class="row phone-number" id="phone-number-1">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Number</label>
                                                <input type="tel" name="number[]" class="form-control" data-validation="phone" data-content="Number cannot be empty">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Country Code</label>
                                                <input type="tel" name="phone-country-code[]" class="form-control" data-validation="noempty" data-content="Country Code cannot be empty">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="phone-description[]" class="form-control" data-validation="noempty" data-content="Description cannot be empty">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <input type="text" name="type[]" class="form-control" data-validation="noempty" data-content="Type cannot be empty">
                                            </div>
                                        </div>
                                        <div class="col-1 padding-top-30">
                                            <!-- <div class="form-group"><span id="remove_phone_number_1" class="remove-phone-number">X</span></div> -->
                                        </div>
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-phone-number btn btn-danger'>Add Phone Number</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>CATEGORIES</strong></h3>
                                </div>
                                <div id="categories">
                                    <div class="inner-categories">
                                        <div class="row categories" id="categories-1">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="category-name[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label>ID</label>
                                                    <input type="text" name="category-id[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-1 padding-top-30">
                                                <!-- <div class="form-group"><span id="remove_categories_1" class="remove-categories">X</span></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-categories btn btn-danger'>Add Categories</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>DESCRIPTION</strong></h3>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h3><strong>EMAILS</strong></h3>
                                </div>
                                <div id="email">
                                    <div class="inner-email">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-email btn btn-danger'>Add Email</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>GEO DATA</strong></h3>
                                </div>
                                <div class="form-group">
                                    <label>Display Latitude</label>
                                    <input type="text" name="display-latitude" class="form-control" data-validation="noempty" data-content="Latitude cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Display Longitude</label>
                                    <input type="text" name="display-longitude" class="form-control" data-validation="noempty" data-content="Longitude cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Routable Latitude</label>
                                    <input type="text" name="routable-latitude" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Routable Longitude</label>
                                    <input type="text" name="routable-longitude" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h3><strong>HOURS</strong></h3>
                                </div>
                                <!-- <?php
$hours = $locations_json["records"][0]["hours"];
foreach ($hours as $hour) { ?>

<div class="form-group">
<h4> <?php print_r($hour["day"]); ?> </h4>
</div>
<div id="<?php print_r($hour["day"]); ?>">
<div class="inner-<?php print_r($hour["day"]); ?>">
<?php
$hinc = 0;
foreach ($hour["intervals"] as $day) { 
$hinc = $hinc +1;
?>
<div class="row <?php print_r($hour["day"]); ?>" id="<?php print_r($hour["day"]); ?>-<?php echo $hinc?>">
<div class="col-5">
<div class="form-group">
<label>Starts</label>
<input type="text" name="start-<?php print_r($hour["day"]); ?>[]" value="<?php echo $day["start"];?>" class="form-control" data-validation="noempty" data-content="Start Time cannot be empty">
</div>
</div>
<div class="col-5">
<div class="form-group">
<label>End</label>
<input type="text" name="end-<?php print_r($hour["day"]); ?>[]" value="<?php echo $day["end"];?>" class="form-control" data-validation="noempty" data-content="End Time cannot be empty">
</div>
</div>
<div class="col-1 padding-top-30"><div class="form-group"><span id="remove_<?php print_r($hour["day"]); ?>_<?php echo $hinc;?>" class="remove-<?php print_r($hour["day"]); ?>">X</span></div></div>

</div>   
<?php }?>
</div>
<div class="form-group add-btn">
<span class='add-<?php print_r($hour["day"]); ?> btn btn-danger'>Add <?php print_r($hour["day"]); ?></span>
</div>
</div>
<?php } ?> -->
                                <div class="form-group">
                                    <label>Hours Text</label>
                                    <input type="text" name="hours-text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h3><strong>IMAGES</strong></h3>
                                </div>
                                <div id="images">
                                    <div class="inner-images">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-images btn btn-danger'>Add Images</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>VIDEOS</strong></h3>
                                </div>
                                <div id="videos">
                                    <div class="inner-videos">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-videos btn btn-danger'>Add Videos</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>SPECIAL OFFER</strong></h3>
                                </div>
                                <div id="offers">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <input type="text" name="special-offer-message" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="url" name="special-offer-url" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>PAYMENT OPTION</strong></h3>
                                </div>
                                <div id="payments">
                                    <div class="inner-payments">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-payments btn btn-danger'>Add Payments</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>URLS</strong></h3>
                                </div>
                                <div id="urls">
                                    <div class="inner-urls">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-urls btn btn-danger'>Add URL</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>SOCIAL MEDIA</strong></h3>
                                </div>
                                <div class="form-group">
                                    <label>Twitter User Name</label>
                                    <input type="text" name="twitter" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Facebook URL</label>
                                    <input type="url" name="facebook" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h3><strong>ATTRIBUTION</strong></h3>
                                </div>
                                <div class="form-group">
                                    <label>Image Width</label>
                                    <input type="text" name="attribution-image-width" class="form-control" data-validation="numericonly" data-content="Image Width cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Image Height</label>
                                    <input type="text" name="attribution-image-height" class="form-control" data-validation="numericonly" data-content="Image Height cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Image Description</label>
                                    <input type="text" name="attribution-image-description" class="form-control" data-validation="noempty" data-content="Description cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Image URL</label>
                                    <input type="url" name="attribution-image-url" class="form-control" data-validation="url" data-content="URL cannot be empty">
                                </div>
                                <div class="form-group">
                                    <label>Attribution URL</label>
                                    <input type="url" name="attribution-url" class="form-control" data-validation="url" data-content="Attribution URL cannot be empty">
                                </div>
                                <div class="form-group">
                                    <h3><strong>KEYWORDS</strong></h3>
                                </div>
                                <div id="keywords">
                                    <div class="inner-keywords">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-keywords btn btn-danger'>Add Keyword</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>LISTS</strong></h3>
                                </div>
                                <div id="lists">
                                    <div class="inner-lists">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-lists btn btn-danger'>Add List</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>CLOSED</strong></h3>
                                </div>
                                <div class="form-group">
                                    <label>Closed</label>
                                    <select class="form-control" name="closed">
										<option value="true">TRUE</option>
										<option value="false">FALSE</option>
									</select>
                                </div>
                                <div class="form-group">
                                    <h3><strong>SPECIALITIES</strong></h3>
                                </div>
                                <div id="specialities">
                                    <div class="inner-specialities">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-specialities btn btn-danger'>Add Speciality</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>BRANDS</strong></h3>
                                </div>
                                <div id="brands">
                                    <div class="inner-brands">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-brands btn btn-danger'>Add Brands</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>PRODUCTS</strong></h3>
                                </div>
                                <div id="products">
                                    <div class="inner-products">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-products btn btn-danger'>Add Products</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>SERVICES</strong></h3>
                                </div>
                                <div id="services">
                                    <div class="inner-services">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-services btn btn-danger'>Add Service</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>ESTABLISHED</strong></h3>
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" name="year-of-establish" class="form-control" data-validation="numericonly" data-content="Twitter cannot be empty">
                                </div>
                                <div class="form-group">
                                    <h3><strong>ASSOCIATION</strong></h3>
                                </div>
                                <div id="associations">
                                    <div class="inner-associations">
                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-associations btn btn-danger'>Add Associations</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3><strong>LANGUAGES</strong></h3>
                                </div>
                                <div id="languages">
                                    <div class="inner-languages">

                                    </div>
                                    <div class="form-group add-btn">
                                        <span class='add-languages btn btn-danger'>Add Languages</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="add-listing" class="btn btn-primary">Submit</button>
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
                        <p>&copy;
                            <?php echo(date('Y')-1); ?> -
                            <?php echo(date('Y')); ?> | All Rights Reserved | <a href="https://www.gsmresults.com/" target="_blank">Web Design Tucson</a> by GSM Marketing Agency</p>
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