<?php
session_start();
global $id;
if(isset($_GET['id'])) {
   $_SESSION['id'] = $id = $_GET['id'];
	
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php print_r($locations_json["records"][0]["name"]); ?> | Powerlisting</title>
     <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="top-header">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="logo"><a href="index.php"><img class="img-responsive" src="../images/123localLogo.png" alt="123local logo"></a></div>
        </div>
        </div>
    </div>
    </div>
    <div class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="admin_nick">Welcome <?php print_r($_SESSION["username"]); ?><a href="logout.php" class="btn btn-warning logOut"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></h2>
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
		  <?php 
			$status =  $locations_json["records"][0]["status"];
			$address_visibility = $locations_json["records"][0]["address"]["visible"];
		  ?>
        <div class="col-12">
          <div class="right-side">
			  <form action="edit-action.php" enctype="multipart/form-data" method="post">
					  <div class="form-group">
				  <label>Yext ID</label>
				  <input type="text" name="yext-id" value="<?php echo $locations_json["records"][0]["yextID"];?>" class="form-control">
					  </div>
				  <div class="form-group">
				  <label>Status</label>
					  <select class="form-control" name="status">
						<option value="LIVE" <?php if($status == 'LIVE'){echo 'selected';} ?>>LIVE</option>
						<option value="AVAILABLE" <?php if($status == 'AVAILABLE'){echo 'selected';} ?>>AVAILABLE</option>
						<option value="ACTIVE" <?php if($status == 'ACTIVE'){echo 'selected';} ?>>ACTIVE</option>
						<option value="CLAIMED" <?php if($status == 'CLAIMED'){echo 'selected';} ?>>CLAIMED</option>
						<option value="SUPPRESSED" <?php if($status == 'SUPPRESSED'){echo 'selected';} ?>>SUPPRESSED</option>
						<option value="BLOCKED" <?php if($status == 'BLOCKED'){echo 'selected';} ?>>BLOCKED</option>
					</select>
				  </div>
				  <div class="form-group">
				  <label>Name</label>
				  <input type="text" name="name" value="<?php echo $locations_json["records"][0]["name"];?>" class="form-control">
					  </div>
				  <div class="form-group">
				  <h3><strong>ADDRESS</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Address</label>
					  <input type="text" name="address" value="<?php echo $locations_json["records"][0]["address"]["address"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Visible</label>
					  <select class="form-control" name="visible">
						<option value="false" <?php if($address_visibility == 'false'){echo 'selected';} ?>>FALSE</option>
						<option value="true" <?php if($address_visibility == 'true'){echo 'selected';} ?>>TRUE</option>
					</select>
				  </div>
				  
				  <div class="form-group">
					  <label>Address 2</label>
					  <input type="text" name="address-2" value="<?php echo $locations_json["records"][0]["address"]["address2"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>City</label>
					  <input type="text" name="city" value="<?php echo $locations_json["records"][0]["address"]["city"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Display Address</label>
					  <input type="text" name="display-address" value="<?php echo $locations_json["records"][0]["address"]["displayAddress"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Country Code</label>
					  <input type="text" name="country-code" value="<?php echo $locations_json["records"][0]["address"]["countryCode"];?>" class="form-control">
				  </div>
				  
				   <div class="form-group">
					  <label>Postal Code</label>
					  <input type="text" name="postal-code" value="<?php echo $locations_json["records"][0]["address"]["postalCode"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>State</label>
					  <input type="text" name="state" value="<?php echo $locations_json["records"][0]["address"]["state"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
				  <h3><strong>PHONE NUMBERS</strong></h3>
				  </div>
				  <div id="phone-number">
				 <?php
				  $increment = 0;
                    $phones = $locations_json["records"][0]["phones"];
                    foreach ($phones as $details) {
						
						$increment = $increment +1;
                    ?>
				  <div class="row phone-number" id="phone-number-<?php echo $increment?>">
				  <div class="col-3">
				  <div class="form-group">
					  <label>Number <?php echo $increment;?></label>
					  <input type="tel" name="number[]" value="<?php echo $details["number"]["number"];?>" class="form-control">
				  </div>
				  </div>
				  
				  <div class="col-3">
				  <div class="form-group">
					  <label>Country Code <?php echo $increment;?></label>
					  <input type="tel" name="country-code[]" value="<?php echo $details["number"]["countryCode"];?>" class="form-control">
				  </div>
				  </div>
				  
				  <div class="col-3">
				  <div class="form-group">
					  <label>Description <?php echo $increment;?></label>
					  <input type="text" name="description[]" value="<?php echo $details["description"];?>" class="form-control">
				  </div>
				  </div>
				  
				  <div class="col-2">
				  <div class="form-group">
					  <label>Type <?php echo $increment;?></label>
					  <input type="text" name="type[]" value="<?php echo $details["type"];?>" class="form-control">
				  </div>
				  </div>
					  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_<?php echo $increment;?>" class="remove">X</span></div></div>
					  </div>
				  
                    <?php }
				  
                ?>
				  <div class="form-group">
					  <span class='add'>Add Skill</span>
				  </div>
				  </div>
				  <div class="form-group">
				  <h3><strong>CATEGORIES</strong></h3>
				  </div>
				  
				 <?php
				  $increment = 0;
                    $category = $locations_json["records"][0]["categories"];
                    foreach ($category as $category_details) {
						
						$increment = $increment +1;
                    ?>
				  <div class="form-group">
					  <label>Number <?php echo $increment;?></label>
					  <input type="text" name="category-name[]" value="<?php echo $category_details["name"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>ID <?php echo $increment;?></label>
					  <input type="text" name="category-id[]" value="<?php echo $category_details["id"];?>" class="form-control">
				  </div>
				  
                    <?php }
                ?>
				  
				   <div class="form-group">
				  <h3><strong>DESCRIPTION</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Description</label>
					  <input type="text" name="description" value="<?php echo $locations_json["records"][0]["description"];?>" class="form-control">
				  </div>
				  
				   <div class="form-group">
				  <h3><strong>EMAILS</strong></h3>
				  </div>
				  
				 <?php
				  $increment = 0;
                    $email = $locations_json["records"][0]["emails"];
                    foreach ($email as $email_details) {
						
						$increment = $increment +1;
                    ?>
				  <div class="form-group">
					  <label>Email ID <?php echo $increment;?></label>
					  <input type="email" name="email-address[]" value="<?php echo $email_details["address"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Description <?php echo $increment;?></label>
					  <input type="text" name="email-description[]" value="<?php echo $email_details["description"];?>" class="form-control">
				  </div>
				  
                    <?php }
                ?>
				  
				  <div class="form-group">
				  <h3><strong>GEO DATA</strong></h3>
				  </div>
				  
				   <div class="form-group">
					  <label>Display Latitude</label>
					  <input type="text" name="display-latitude" value="<?php echo $locations_json["records"][0]["geoData"]["displayLatitude"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Display Longitude</label>
					  <input type="text" name="display-longitude" value="<?php echo $locations_json["records"][0]["geoData"]["displayLongitude"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Routable Latitude</label>
					  <input type="text" name="routable-latitude" value="<?php echo $locations_json["records"][0]["geoData"]["routableLatitude"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Routable Longitude</label>
					  <input type="text" name="routable-longitude" value="<?php echo $locations_json["records"][0]["geoData"]["routableLongitude"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
				  <h3><strong>HOURS</strong></h3>
				  </div>
				  
				  <?php
                    $hours = $locations_json["records"][0]["hours"];
                    foreach ($hours as $hour) { ?>

								 <div class="form-group">
				  <h4><?php print_r($hour["day"]); ?></h4>
				  </div>
                                <?php
											   $increment = 0;
                                    foreach ($hour["intervals"] as $day) { 
				  $increment = $increment +1;
				  ?>
                            
				  <div class="form-group">
					  <label>Starts <?php echo $increment;?></label>
					  <input type="text" name="start-<?php print_r($hour["day"]); ?>[]" value="<?php echo $day["start"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>End <?php echo $increment;?></label>
					  <input type="text" name="end-<?php print_r($hour["day"]); ?>[]" value="<?php echo $day["end"];?>" class="form-control">
				  </div>
                                    <?php }
                                ?>
                    <?php }
                ?>
				  
				  <div class="form-group">
					  <label>Hours Text</label>
					  <input type="text" name="hours-text" value="<?php echo $locations_json["records"][0]["hoursText"]["display"];?>" class="form-control">
				  </div>
				  
          			
				   <div class="form-group">
				  <h3><strong>IMAGES</strong></h3>
				  </div>
				  
				   <?php
				  $increment = 0;
                    $images = $locations_json["records"][0]["images"];
                    foreach ($images as $image) {
				  $increment = $increment +1;
				  ?>
				  <div class="form-group">
					  <label>Image Width <?php echo $increment;?></label>
					  <input type="text" name="image-width[]" value="<?php echo $image["width"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>Image Height <?php echo $increment;?></label>
					  <input type="text" name="image-height[]" value="<?php echo $image["height"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>Image Type <?php echo $increment;?></label>
					  <select class="form-control" name="image-type[]">
						<option value="LOGO" <?php if($image["type"] == 'LOGO'){echo 'selected';} ?>>LOGO</option>
						<option value="STOREFRONT" <?php if($image["type"] == 'STOREFRONT'){echo 'selected';} ?>>STOREFRONT</option>
						<option value="GALLERY" <?php if($image["type"] == 'GALLERY'){echo 'selected';} ?>>GALLERY</option>
						<option value="HEADSHOT" <?php if($image["type"] == 'HEADSHOT'){echo 'selected';} ?>>HEADSHOT</option>
					</select>
				  </div>
                       <div class="form-group">
					  <label>Image URL <?php echo $increment;?></label>
					  <input type="url" name="image-url[]" value="<?php echo $image["url"];?>" class="form-control">
				  		</div>
                        <?php }
                        ?>
				  
				  <div class="form-group">
				  <h3><strong>VIDEOS</strong></h3>
				  </div>
				  
				    <?php
				  $increment = 0;
                    $videos = $locations_json["records"][0]["videos"];
                    foreach ($videos as $video) {
						$increment = $increment +1; 
                            
                        ?>
                        <div class="form-group">
					  <label>Video URL <?php echo $increment;?></label>
					  <input type="url" name="video-url[]" value="<?php echo $video["url"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>Video Description <?php echo $increment;?></label>
					  <input type="text" name="video-description[]" value="<?php echo $video["description"];?>" class="form-control">
				  </div>
                    <?php }
                    ?>
				  
				  <div class="form-group">
				  <h3><strong>SPECIAL OFFER</strong></h3>
				  </div>
				  
				   <div class="form-group">
					  <label>Message</label>
					  <input type="text" name="special-offer-message" value="<?php echo $locations_json["records"][0]["specialOffer"]["message"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>URL</label>
					  <input type="url" name="special-offer-url" value="<?php echo $locations_json["records"][0]["specialOffer"]["url"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
				  <h3><strong>URLS</strong></h3>
				  </div>
				  
				  <?php
				  $increment = 0;
                $urls = $locations_json["records"][0]["urls"];
                foreach ($urls as $url) { 
				  $increment = $increment +1; 
				 ?>
				  
				  <div class="form-group">
					  <label>Display URLs<?php echo $increment;?></label>
					  <input type="url" name="url-display[]" value="<?php echo $url["displayUrl"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>Description <?php echo $increment;?></label>
					  <input type="text" name="url-description[]" value="<?php echo $url["description"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>Type <?php echo $increment;?></label>
					  <input type="text" name="url-type[]" value="<?php echo $url["type"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>URL <?php echo $increment;?></label>
					  <input type="url" name="url-url[]" value="<?php echo $url["url"];?>" class="form-control">
				  </div>
				  
                <?php  } ?>
				  
				  <div class="form-group">
				  <h3><strong>SOCIAL MEDIA</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Twitter</label>
					  <input type="text" name="twitter" value="<?php echo $locations_json["records"][0]["twitterHandle"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Facebook</label>
					  <input type="url" name="facebook" value="<?php echo $locations_json["records"][0]["facebookPageUrl"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
				  <h3><strong>ATTRIBUTION</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Image Width</label>
					  <input type="text" name="attribution-image-width" value="<?php echo $locations_json["records"][0]["attribution"]["image"]["width"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Image Height</label>
					  <input type="text" name="attribution-image-height" value="<?php echo $locations_json["records"][0]["attribution"]["image"]["height"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>Image Description</label>
					  <input type="text" name="attribution-image-description" value="<?php echo $locations_json["records"][0]["attribution"]["image"]["description"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Image URL</label>
					  <input type="url" name="attribution-image-url" value="<?php echo $locations_json["records"][0]["attribution"]["image"]["url"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>Attribution URL</label>
					  <input type="url" name="attribution-url" value="<?php echo $locations_json["records"][0]["attribution"]["attributionUrl"];?>" class="form-control">
				  </div>

				  <div class="form-group">
				  <h3><strong>KEYWORDS</strong></h3>
				  </div>
				  <?php
				  $increment = 0;
                    $keywords = $locations_json["records"][0]["keywords"];
                    foreach ($keywords as $key) { 
				  	$increment = $increment +1; 
				  ?>
				  <div class="form-group">
					  <label>Keyword <?php echo $increment;?></label>
					  <input type="text" name="keyword[]" value="<?php echo $key;?>" class="form-control">
				  </div>
                    <?php }
                ?>
				  
				   <div class="form-group">
				  <h3><strong>LISTS</strong></h3>
				  </div>
				  
				   <?php
				  $increment = 0;
                $lists = $locations_json["records"][0]["lists"];
                foreach ($lists as $list) { 
				  $increment = $increment +1; 
				  ?>
				  <div class="form-group">
					  <label>Name <?php echo $increment;?></label>
					  <input type="text" name="list-name[]" value="<?php echo $list["name"];?>" class="form-control">
				  </div>
				  <div class="form-group">
					  <label>Description <?php echo $increment;?></label>
					  <input type="text" name="list-description[]" value="<?php echo $list["description"];?>" class="form-control">
				  </div>
				  <div class="form-group">
				  <select class="form-control" name="list-type[]">
						<option value="MENU" <?php if($list["type"] == 'MENU'){echo 'selected';} ?>>MENU</option>
						<option value="PRODUCTS" <?php if($list["type"] == 'PRODUCTS'){echo 'selected';} ?>>PRODUCTS</option>
						<option value="BIOS" <?php if($list["type"] == 'BIOS'){echo 'selected';} ?>>BIOS</option>
						<option value="EVENTS" <?php if($list["type"] == 'EVENTS'){echo 'selected';} ?>>EVENTS</option>
					</select>
				  </div>
                <?php }
                ?>
				  
				  <div class="form-group">
				  <h3><strong>CLOSED</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Closed</label>
					  <select class="form-control" name="closed">
						<option value="true" <?php if($locations_json["records"][0]["closed"] == 'true'){echo 'selected';} ?>>TRUE</option>
						<option value="false" <?php if($locations_json["records"][0]["closed"] == 'false'){echo 'selected';} ?>>FALSE</option>
					</select>
				  </div>
				  
				   <div class="form-group">
				  <h3><strong>SPECIALITIES</strong></h3>
				  </div>
					<?php
				  $increment = 0;
                           $specialities = $locations_json["records"][0]["specialities"];
                           foreach ($specialities as $speciality) { 
				  			$increment = $increment +1; 
				  			?>
                           <div class="form-group">
						  <label>Speciality <?php echo $increment;?></label>
						  <input type="text" name="speciality[]" value="<?php echo $speciality;?>" class="form-control">
						  </div>
                           <?php }
                                ?>
				  <div class="form-group">
				  <h3><strong>BRANDS</strong></h3>
				  </div>
					<?php
				  $increment = 0;
                           $brands = $locations_json["records"][0]["brands"];
                           foreach ($brands as $brand) { 
				  			$increment = $increment +1; 
				  			?>
                           <div class="form-group">
						  <label>Brand <?php echo $increment;?></label>
						  <input type="text" name="brand[]" value="<?php echo $brand;?>" class="form-control">
						  </div>
                           <?php }
                                ?>
				  <div class="form-group">
				  <h3><strong>PRODUCTS</strong></h3>
				  </div>
					<?php
				  $increment = 0;
                           $products = $locations_json["records"][0]["products"];
                           foreach ($products as $product) { 
				  			$increment = $increment +1; 
				  			?>
                           <div class="form-group">
						  <label>Product <?php echo $increment;?></label>
						  <input type="text" name="product[]" value="<?php echo $product;?>" class="form-control">
						  </div>
                           <?php }
                                ?>
				  
				  <div class="form-group">
				  <h3><strong>SERVICES</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Service</label>
					  <input type="text" name="service" value="<?php echo $locations_json["records"][0]["services"][0];?>" class="form-control">
				  </div>
				  
				  
				  <div class="form-group">
				  <h3><strong>ESTABLISHED</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Year</label>
					  <input type="text" name="year-of-establish" value="<?php echo $locations_json["records"][0]["yearEstablished"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
				  <h3><strong>ASSOCIATION</strong></h3>
				  </div>
					<?php
				  $increment = 0;
                           $associations = $locations_json["records"][0]["associations"];
                           foreach ($associations as $association) { 
				  			$increment = $increment +1; 
				  			?>
                           <div class="form-group">
						  <label>Association <?php echo $increment;?></label>
						  <input type="text" name="product[]" value="<?php echo $association;?>" class="form-control">
						  </div>
                           <?php }
                                ?>
				  
				  
				  <div class="form-group">
				  <h3><strong>LANGUAGES</strong></h3>
				  </div>
					<?php
				  $increment = 0;
                           $languages = $locations_json["records"][0]["languages"];
                           foreach ($languages as $language) { 
				  			$increment = $increment +1; 
				  			?>
                           <div class="form-group">
						  <label>Speciality <?php echo $increment;?></label>
						  <input type="text" name="product[]" value="<?php echo $language;?>" class="form-control">
						  </div>
                           <?php }
                                ?>
				  <div class="form-group">
				  <button type="submit" name="update" class="btn btn-primary">Submit</button>
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

</body>
</html>