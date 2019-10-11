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
    $readAll = "http://127.0.0.1/123local-API/product/detail.php?id=$id";
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
    $reviews_call = "http://127.0.0.1/123local-API/reviews/reviews.php?id=$id";
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
	<script src="../js/xvalidation.js"></script>
    <link rel="stylesheet" href="styles/style.css">

	<script type="text/javascript">
            $(document).ready(function () {
                $("#form").xvalidation({
                    theme: "bootstrap",

                });
                $("#form").submit(function (evt) {
                    evt.preventDefault();
                    evt.stopPropagation();
                    if ($("#form").data().xvalidation.methods.validate()) {
						//console.log($('#form').serialize());
							$.ajax({
							type: "POST",
							url: "edit-action.php",
							data: $('#form').serialize(),
							success: function(response)
							{
								json = JSON.parse(response)
								final_response = json["description"]["message"];
								
								if(final_response === "Location was updated."){
									//console.log(response);
									alert("Listing Updated");
								}
								else {
									alert("There is some problem while updating!");
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
			  <form action="" enctype="multipart/form-data" method="post" novalidate id="form">
					  <div class="form-group">
				  <label>Yext ID</label>
				  <input type="text" name="yext-id" value="<?php echo $locations_json["records"][0]["yextID"];?>" class="form-control" readonly>
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
				  <input type="text" name="name" value="<?php echo $locations_json["records"][0]["name"];?>" class="form-control" data-validation="noempty" data-content="Name cannot be empty" >
					  </div>
				  <div class="form-group">
				  <h3><strong>ADDRESS</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Address</label>
					  <input type="text" name="address" value="<?php echo $locations_json["records"][0]["address"]["address"];?>" class="form-control" data-validation="noempty" data-content="Address cannot be empty">
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
					  <input type="text" name="city" value="<?php echo $locations_json["records"][0]["address"]["city"];?>" class="form-control" data-validation="noempty" data-content="City cannot be empty">
				  </div>
				  
				  <div class="form-group">
					  <label>Display Address</label>
					  <input type="text" name="display-address" value="<?php echo $locations_json["records"][0]["address"]["displayAddress"];?>" class="form-control" data-validation="noempty" data-content="Display Address cannot be empty">
				  </div>
				  
				  <div class="form-group">
					  <label>Country Code</label>
					  <input type="text" name="country-code" value="<?php echo $locations_json["records"][0]["address"]["countryCode"];?>" class="form-control" data-validation="noempty" data-content="Country cannot be empty">
				  </div>
				  
				   <div class="form-group">
					  <label>Postal Code</label>
					  <input type="text" name="postal-code" value="<?php echo $locations_json["records"][0]["address"]["postalCode"];?>" class="form-control" data-validation="numericonly" data-content="Postal Code cannot be empty">
				  </div>
				  
				  <div class="form-group">
					  <label>State</label>
					  <input type="text" name="state" value="<?php echo $locations_json["records"][0]["address"]["state"];?>" class="form-control" data-validation="noempty" data-content="State cannot be empty">
				  </div>
				  
				  <div class="form-group">
				  <h3><strong>PHONE NUMBERS</strong></h3>
				  </div>
				  <div id="phone-number">
				 <?php
				  $pinc = 0;
                    $phones = $locations_json["records"][0]["phones"];
                    foreach ($phones as $details) {
						
						$pinc = $pinc +1;
                    ?>
				  <div class="row phone-number" id="phone-number-<?php echo $pinc?>">
				  <div class="col-3">
				  <div class="form-group">
					  <label>Number</label>
					  <input type="tel" name="number[]" value="<?php echo $details["number"]["number"];?>" class="form-control" data-validation="phone" data-content="Number cannot be empty">
				  </div>
				  </div>
				  
				  <div class="col-3">
				  <div class="form-group">
					  <label>Country Code</label>
					  <input type="tel" name="phone-country-code[]" value="<?php echo $details["number"]["countryCode"];?>" class="form-control" data-validation="noempty" data-content="Country Code cannot be empty">
				  </div>
				  </div>
				  
				  <div class="col-3">
				  <div class="form-group">
					  <label>Description</label>
					  <input type="text" name="phone-description[]" value="<?php echo $details["description"];?>" class="form-control" data-validation="noempty" data-content="Description cannot be empty">
				  </div>
				  </div>
				  
				  <div class="col-2">
				  <div class="form-group">
					  <label>Type</label>
					  <input type="text" name="type[]" value="<?php echo $details["type"];?>" class="form-control" data-validation="noempty" data-content="Type cannot be empty">
				  </div>
				  </div>
					  <?php if ($pinc > 1) {?>
					  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_phone_number_<?php echo $pinc;?>" class="remove-phone-number">X</span></div></div>
					  <?php } ?>
					  </div>
				  
                    <?php }
				  
                ?>
				  <div class="form-group add-btn">
					  <span class='add-phone-number btn btn-danger'>Add Phone Number</span>
				  </div>
				  </div>
				  
				  
				  <div class="form-group">
				  <h3><strong>CATEGORIES</strong></h3>
				  </div>
				   <div id="categories">
					  <div class="inner-categories">
				 <?php
				  $cinc = 0;
                    $category = $locations_json["records"][0]["categories"];
                    foreach ($category as $category_details) {
						
						$cinc = $cinc +1;
                    ?>
						  <div class="row categories" id="categories-<?php echo $cinc?>">
							  <div class="col-5">
				  <div class="form-group">
					  <label>Name</label>
					  <input type="text" name="category-name[]" value="<?php echo $category_details["name"];?>" class="form-control">
				  </div>
							  </div>
							  <div class="col-5">
				  
				  <div class="form-group">
					  <label>ID</label>
					  <input type="text" name="category-id[]" value="<?php echo $category_details["id"];?>" class="form-control">
				  </div>
							  </div>
				  
                  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_categories_<?php echo $cinc;?>" class="remove-categories">X</span></div></div>
				  
				</div>                    
				
				<?php }
				?>
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
					  <input type="text" name="description" value="<?php if(!empty($locations_json["records"][0]["description"])) {echo $locations_json["records"][0]["description"];}?>" class="form-control">
				  </div>
				  
				   <div class="form-group">
				  <h3><strong>EMAILS</strong></h3>
				  </div>
				  <div id="email">
					  <div class="inner-email">
				 <?php
				  $einc = 0;
                    $email = $locations_json["records"][0]["emails"];
                    foreach ($email as $email_details) {
						
						$einc = $einc +1;
					?>
					<div class="row email" id="email-<?php echo $einc?>">
					<div class="col-5">
				  <div class="form-group">
					  <label>Email ID</label>
					  <input type="email" name="email-address[]" value="<?php echo $email_details["address"];?>" class="form-control" data-validation="email" data-content="Email cannot be empty">
				  </div>
				</div>
				  <div class="col-5">
				  <div class="form-group">
					  <label>Description</label>
					  <input type="text" name="email-description[]" value="<?php echo $email_details["description"];?>" class="form-control" data-validation="noempty" data-content="Description cannot be empty">
				  </div>
				</div>

				<div class="col-1 padding-top-30"><div class="form-group"><span id="remove_email_<?php echo $einc;?>" class="remove-email">X</span></div></div>
				  
				</div>                    
				
				<?php }
				?>
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
					  <input type="text" name="display-latitude" value="<?php echo $locations_json["records"][0]["geoData"]["displayLatitude"];?>" class="form-control" data-validation="noempty" data-content="Latitude cannot be empty">
				  </div>
				  
				  <div class="form-group">
					  <label>Display Longitude</label>
					  <input type="text" name="display-longitude" value="<?php echo $locations_json["records"][0]["geoData"]["displayLongitude"];?>" class="form-control" data-validation="noempty" data-content="Longitude cannot be empty">
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
                    <?php } ?>
				  
				  
				  
				  <div class="form-group">
					  <label>Hours Text</label>
					  <input type="text" name="hours-text" value="<?php echo $locations_json["records"][0]["hoursText"]["display"];?>" class="form-control">
				  </div>
				  
          			
				   <div class="form-group">
				  <h3><strong>IMAGES</strong></h3>
				  </div>
				  
				  <div id="images">
					  <div class="inner-images">
				   <?php
				  $iinc = 0;
                    $images = $locations_json["records"][0]["images"];
                    foreach ($images as $image) {
				  $iinc = $iinc +1;
				  ?>
				   <div class="row images" id="images-<?php echo $iinc?>">
				   <div class="col-3">
				  <div class="form-group">
					  <label>Image Width</label>
					  <input type="text" name="image-width[]" value="<?php echo $image["width"];?>" class="form-control" data-validation="numericonly" data-content="Image Width cannot be empty">
				  </div>
					</div>
					<div class="col-3">
				  <div class="form-group">
					  <label>Image Height</label>
					  <input type="text" name="image-height[]" value="<?php echo $image["height"];?>" class="form-control" data-validation="numericonly" data-content="Image Height cannot be empty">
				  </div>
					</div>
					<div class="col-2">
				  <div class="form-group">
					  <label>Image Type</label>
					  <select class="form-control" name="image-type[]">
						<option value="LOGO" <?php if($image["type"] == 'LOGO'){echo 'selected';} ?>>LOGO</option>
						<option value="STOREFRONT" <?php if($image["type"] == 'STOREFRONT'){echo 'selected';} ?>>STOREFRONT</option>
						<option value="GALLERY" <?php if($image["type"] == 'GALLERY'){echo 'selected';} ?>>GALLERY</option>
						<option value="HEADSHOT" <?php if($image["type"] == 'HEADSHOT'){echo 'selected';} ?>>HEADSHOT</option>
					</select>
				  </div>
					</div>
					<div class="col-3">
                       <div class="form-group">
					  <label>Image URL</label>
					  <input type="url" name="image-url[]" value="<?php echo $image["url"];?>" class="form-control" data-validation="url" data-content="Image URL cannot be empty">
						  </div>
						  </div>
					  
					  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_images_<?php echo $iinc;?>" class="remove-images">X</span></div></div>
					  
					  </div>
                        <?php } ?>
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
				    <?php
				  $vinc = 0;
                    $videos = $locations_json["records"][0]["videos"];
                    foreach ($videos as $video) {
						$vinc = $vinc +1; 
                            
						?>
						<div class="row videos" id="videos-<?php echo $vinc?>">
						<div class="col-5">
                        <div class="form-group">
					  <label>Video URL</label>
					  <input type="url" name="video-url[]" value="<?php echo $video["url"];?>" class="form-control" data-validation="url" data-content="Video URL cannot be empty">
				  </div>
					</div>
					<div class="col-5">
				  <div class="form-group">
					  <label>Video Description</label>
					  <input type="text" name="video-description[]" value="<?php echo $video["description"];?>" class="form-control" data-validation="noempty" data-content="Video Description cannot be empty">
				  </div>
					</div>
					
					  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_videos_<?php echo $vinc;?>" class="remove-videos">X</span></div></div>
					  
					  </div>
                    <?php }
					?>
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
					  <input type="text" name="special-offer-message" value="<?php echo $locations_json["records"][0]["specialOffer"]["message"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>URL</label>
					  <input type="url" name="special-offer-url" value="<?php echo $locations_json["records"][0]["specialOffer"]["url"];?>" class="form-control">
				  </div>
					</div>
				  
				   <div class="form-group">
				  <h3><strong>PAYMENT OPTION</strong></h3>
				  </div>
				  <div id="payments">
					  <div class="inner-payments">
				   <?php
				  $pyinc = 0;
                $paymentOption = $locations_json["records"][0]["paymentOptions"];
                foreach ($paymentOption as $paymentOptions) { 
				  $pyinc = $pyinc +1; 
				 ?>
				   <div class="row payments" id="payments-<?php echo $pinc?>">
					   <div class="col-11">
				  <div class="form-group">
					  <label>Payment Option</label>
					  <input type="text" name="payment-option[]" value="<?php echo $paymentOptions;?>" class="form-control" data-validation="noempty" data-content="Payment Option cannot be empty">
				  </div>
					   </div>
				  
					  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_payments_<?php echo $pyinc;?>" class="remove-payments">X</span></div></div>
					 
					  </div>
				  
                    <?php }
				  
                ?>
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
				  <?php
				  $uinc = 0;
                $urls = $locations_json["records"][0]["urls"];
                foreach ($urls as $url) { 
				  $uinc = $uinc +1; 
				 ?>
				  <div class="row urls" id="urls-<?php echo $uinc?>">
					  <div class="col-3">
				  <div class="form-group">
					  <label>Display URLs</label>
					  <input type="url" name="url-display[]" value="<?php echo $url["displayUrl"];?>" class="form-control" data-validation="url" data-content="Display URL cannot be empty">
				  </div>
					  </div>
					  <div class="col-3">
				  <div class="form-group">
					  <label>Description</label>
					  <input type="text" name="url-description[]" value="<?php echo $url["description"];?>" class="form-control" data-validation="noempty" data-content="Description cannot be empty">
				  </div>
					  </div>
					  <div class="col-2">
				  <div class="form-group">
					  <label>Type</label>
					  <input type="text" name="url-type[]" value="<?php echo $url["type"];?>" class="form-control" data-validation="noempty" data-content="Type cannot be empty">
				  </div>
					  </div>
					  <div class="col-3">
				  <div class="form-group">
					  <label>URL</label>
					  <input type="url" name="url-url[]" value="<?php echo $url["url"];?>" class="form-control" data-validation="url" data-content="URL cannot be empty">
				  </div>
					  </div>
					  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_email_<?php echo $uinc;?>" class="remove-urls">X</span></div></div>
				  
				</div>
				  
                <?php  } ?>
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
					  <input type="text" name="twitter" value="<?php echo $locations_json["records"][0]["twitterHandle"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
					  <label>Facebook URL</label>
					  <input type="url" name="facebook" value="<?php echo $locations_json["records"][0]["facebookPageUrl"];?>" class="form-control">
				  </div>
				  
				  <div class="form-group">
				  <h3><strong>ATTRIBUTION</strong></h3>
				  </div>
				  
				  <div class="form-group">
					  <label>Image Width</label>
					  <input type="text" name="attribution-image-width" value="<?php echo $locations_json["records"][0]["attribution"]["image"]["width"];?>" class="form-control" data-validation="numericonly" data-content="Image Width cannot be empty">
				  </div>
				  
				  <div class="form-group">
					  <label>Image Height</label>
					  <input type="text" name="attribution-image-height" value="<?php echo $locations_json["records"][0]["attribution"]["image"]["height"];?>" class="form-control" data-validation="numericonly" data-content="Image Height cannot be empty">
				  </div>
				  <div class="form-group">
					  <label>Image Description</label>
					  <input type="text" name="attribution-image-description" value="<?php echo $locations_json["records"][0]["attribution"]["image"]["description"];?>" class="form-control" data-validation="noempty" data-content="Description cannot be empty">
				  </div>
				  
				  <div class="form-group">
					  <label>Image URL</label>
					  <input type="url" name="attribution-image-url" value="<?php echo $locations_json["records"][0]["attribution"]["image"]["url"];?>" class="form-control" data-validation="url" data-content="URL cannot be empty">
				  </div>
				  <div class="form-group">
					  <label>Attribution URL</label>
					  <input type="url" name="attribution-url" value="<?php echo $locations_json["records"][0]["attribution"]["attributionUrl"];?>" class="form-control" data-validation="url" data-content="Attribution URL cannot be empty">
				  </div>

				  <div class="form-group">
				  <h3><strong>KEYWORDS</strong></h3>
				  </div>
				  
				  <div id="keywords">
					  <div class="inner-keywords">
				  <?php
				  $kinc = 0;
                    $keywords = $locations_json["records"][0]["keywords"];
                    foreach ($keywords as $key) { 
				  	$kinc = $kinc +1; 
				  ?>
						  <div class="row keywords" id="keywords-<?php echo $kinc?>">
							  <div class="col-11">
				  <div class="form-group">
					  <label>Keyword</label>
					  <input type="text" name="keyword[]" value="<?php echo $key;?>" class="form-control" data-validation="noempty" data-content="Keyword cannot be empty">
				  </div>
							  </div>
							  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_keywords_<?php echo $kinc;?>" class="remove-keywords">X</span></div></div>
				  
				</div>  
                    <?php }
                ?>
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
				   <?php
				  $linc = 0;
                $lists = $locations_json["records"][0]["lists"];
                foreach ($lists as $list) { 
				  $linc = $linc +1; 
				  ?>
						  <div class="row lists" id="lists-<?php echo $linc?>">
						  <div class="col-3">
				  <div class="form-group">
					  <label>Name</label>
					  <input type="text" name="list-name[]" value="<?php echo $list["name"];?>" class="form-control" data-validation="noempty" data-content="Twitter cannot be empty">
				  </div>
						  </div>
						  <div class="col-3">
				  <div class="form-group">
					  <label>Description</label>
					  <input type="text" name="list-description[]" value="<?php echo $list["description"];?>" class="form-control" data-validation="noempty" data-content="Description cannot be empty">
				  </div>
						  </div>
						  <div class="col-3">
				  <div class="form-group">
					  <label>Type</label>
				  <select class="form-control" name="list-type[]">
						<option value="MENU" <?php if($list["type"] == 'MENU'){echo 'selected';} ?>>MENU</option>
						<option value="PRODUCTS" <?php if($list["type"] == 'PRODUCTS'){echo 'selected';} ?>>PRODUCTS</option>
						<option value="BIOS" <?php if($list["type"] == 'BIOS'){echo 'selected';} ?>>BIOS</option>
						<option value="EVENTS" <?php if($list["type"] == 'EVENTS'){echo 'selected';} ?>>EVENTS</option>
					</select>
				  </div>
						  </div>
               <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_email_<?php echo $linc;?>" class="remove-lists">X</span></div></div>
				  
				</div>                    
				
				<?php }
				?>
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
						<option value="true" <?php if($locations_json["records"][0]["closed"] == 'true'){echo 'selected';} ?>>TRUE</option>
						<option value="false" <?php if($locations_json["records"][0]["closed"] == 'false'){echo 'selected';} ?>>FALSE</option>
					</select>
				  </div>
				  
				   <div class="form-group">
				  <h3><strong>SPECIALITIES</strong></h3>
				  </div>
				  <div id="specialities">
					  <div class="inner-specialities">
					<?php
				  $sinc = 0;
                           $specialities = $locations_json["records"][0]["specialities"];
                           foreach ($specialities as $speciality) { 
				  			$sinc = $sinc +1; 
				  			?>
						  <div class="row specialities" id="specialities-<?php echo $sinc?>">
							  <div class="col-11">
                           <div class="form-group">
						  <label>Speciality</label>
						  <input type="text" name="speciality[]" value="<?php echo $speciality;?>" class="form-control" data-validation="noempty" data-content="Speciality cannot be empty">
						  </div>
							  </div>
								  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_specialities_<?php echo $sinc;?>" class="remove-specialities">X</span></div></div>
				  
				</div>     
                           <?php }
                                ?>
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
					<?php
				  $binc = 0;
                           $brands = $locations_json["records"][0]["brands"];
                           foreach ($brands as $brand) { 
				  			$binc = $binc +1; 
				  			?>
						  <div class="row brands" id="brands-<?php echo $binc?>">
							  <div class="col-11">
                           <div class="form-group">
						  <label>Brand</label>
						  <input type="text" name="brand[]" value="<?php echo $brand;?>" class="form-control" data-validation="noempty" data-content="Brand cannot be empty">
						  </div>
						  </div>
						  <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_brands_<?php echo $binc;?>" class="remove-brands">X</span></div></div>
				  
						</div>                    

						<?php }
						?>
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
					<?php
				  $princ = 0;
                           $products = $locations_json["records"][0]["products"];
                           foreach ($products as $product) { 
				  			$princ = $princ +1; 
				  			?>
						  <div class="row products" id="products-<?php echo $princ?>">
							<div class="col-11">
                           <div class="form-group">
						  <label>Product</label>
						  <input type="text" name="product[]" value="<?php echo $product;?>" class="form-control" data-validation="noempty" data-content="Products cannot be empty">
						  </div>
							  </div>
                          <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_products_<?php echo $princ;?>" class="remove-products">X</span></div></div>
				  
				</div>                    
				
				<?php }
				?>
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
				  <?php
				  $seinc = 0;
                           $services = $locations_json["records"][0]["services"];
                           foreach ($services as $service) { 
				  			$seinc = $seinc +1; 
				  			?>
						  <div class="row services" id="services-<?php echo $seinc?>">
					<div class="col-11">
				  <div class="form-group">
					  <label>Service</label>
					  <input type="text" name="service[]" value="<?php echo $service;?>" class="form-control" data-validation="noempty" data-content="Service cannot be empty">
				  </div>
				 </div>

				<div class="col-1 padding-top-30"><div class="form-group"><span id="remove_services_<?php echo $seinc;?>" class="remove-services">X</span></div></div>
				  
				</div>                    
				
				<?php }
				?>
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
					  <input type="text" name="year-of-establish" value="<?php echo $locations_json["records"][0]["yearEstablished"];?>" class="form-control" data-validation="numericonly" data-content="Twitter cannot be empty">
				  </div>
				  
				  
				  <div class="form-group">
				  <h3><strong>ASSOCIATION</strong></h3>
				  </div>
				  
				   <div id="associations">
					  <div class="inner-associations">
					<?php
				  $ainc = 0;
                           $associations = $locations_json["records"][0]["associations"];
                           foreach ($associations as $association) { 
				  			$ainc = $ainc +1; 
				  			?>
						  <div class="row associations" id="associations-<?php echo $ainc?>">
					<div class="col-11">
                           <div class="form-group">
						  <label>Association</label>
						  <input type="text" name="association[]" value="<?php echo $association;?>" class="form-control" data-validation="noempty" data-content="Association cannot be empty">
						  </div>
							  </div>
                          <div class="col-1 padding-top-30"><div class="form-group"><span id="remove_associations_<?php echo $ainc;?>" class="remove-associations">X</span></div></div>
				  
				</div>                    
				
				<?php }
				?>
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
				  
				  
					<?php
				  $lainc = 0;
                           $languages = $locations_json["records"][0]["languages"];
                           foreach ($languages as $language) { 
				  			$lainc = $lainc +1; 
				  			?>
						  	<div class="row languages" id="languages-<?php echo $lainc?>">
					<div class="col-11">
                           <div class="form-group">
						  <label>Speciality</label>
						  <input type="text" name="language[]" value="<?php echo $language;?>" class="form-control" data-validation="noempty" data-content="Speciality cannot be empty">
						  </div>
                           </div>

						<div class="col-1 padding-top-30"><div class="form-group"><span id="remove_languages_<?php echo $lainc;?>" class="remove-languages">X</span></div></div>

						</div>                    

						<?php }
						?>
						</div>
						<div class="form-group add-btn">
							  <span class='add-languages btn btn-danger'>Add Languages</span>
						  </div>
						  </div>
				  
				  
				  
				  
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