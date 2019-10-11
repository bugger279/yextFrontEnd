<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    }

include "include/config.php";

$id = $_SESSION['id'];
	
if(isset($_POST['yext-id']))
{
	$number = $_POST['number'];
	$country_code = $_POST['phone-country-code'];
	$description = $_POST['phone-description'];
	$type = $_POST['type'];
	$numbers = "";
	foreach($number as $a => $b){
	
	$numbers .= ' {"number": {
                "number": "'.$number[$a].'",
                "countryCode": "'.$country_code[$a].'"
            },
            "description": "'.$description[$a].'",
            "type": "'.$type[$a].'"
        },';
	}
	
	$phone_number_array = substr($numbers, 0, -1);
	
	
	
	$category_name = $_POST['category-name'];
	$category_id = $_POST['category-id'];
	$category = "";
	foreach($category_name as $a => $b){
	
	$category .= ' {
            "name": "'.$category_name[$a].'",
            "id": "'.$category_id[$a].'"
        },';
	}
	
	$category_array = substr($category, 0, -1);

	
	
	
	$email_address = isset($_POST['email-address'])? $_POST['email-address'] : "" ;
	$email_description = isset($_POST['email-description'])? $_POST['email-description'] : "" ;
	$email = "";
    if($email_address == "" && $email_description == "")
    {
        $email_array = "";
    }
    else
    {
    foreach($email_address as $a => $b){
	
	$email .= ' {
            "address": "'.$email_address[$a].'",
            "description": "'.$email_description[$a].'"
        },';
	}
	
	$email_array = substr($email, 0, -1);
}
	
	
	$start_MONDAY = isset($_POST['start-MONDAY'])? $_POST['start-MONDAY'] : "" ;
	$end_MONDAY = isset($_POST['end-MONDAY'])? $_POST['end-MONDAY'] : "";
    $monday = "";
    if($start_MONDAY == "" && $end_MONDAY == "")
    {
        $monday_array = "";
    }
    else
    {
	foreach($start_MONDAY as $a => $b){
	
	$monday .= '  {
                    "start": "'.$start_MONDAY[$a].'",
                    "end": "'.$end_MONDAY[$a].'"
                },';
	}
	
	$monday_array = substr($monday, 0, -1);
    }
	
	
	$start_TUESDAY = isset($_POST['start-TUESDAY'])? $_POST['start-TUESDAY'] : "" ;
	$end_TUESDAY = isset($_POST['end-TUESDAY'])? $_POST['end-TUESDAY'] : "";
    $tuesday = "";
    if($start_TUESDAY == "" && $end_TUESDAY == "")
    {
        $tuesday_array = "";
    }
    else
    {
	foreach($start_TUESDAY as $a => $b){
	
	$tuesday .= '  {
                    "start": "'.$start_TUESDAY[$a].'",
                    "end": "'.$end_TUESDAY[$a].'"
                },';
	}
	
	$tuesday_array = substr($tuesday, 0, -1);
    }
	
	
	
	$start_WEDNESDAY = isset($_POST['start-WEDNESDAY'])? $_POST['start-WEDNESDAY'] : "" ;
	$end_WEDNESDAY = isset($_POST['end-WEDNESDAY'])? $_POST['end-WEDNESDAY'] : "";
    $wednesday = "";
    if($start_WEDNESDAY == "" && $end_WEDNESDAY == "")
    {
        $wednesday_array = "";
    }
    else
    {
	foreach($start_WEDNESDAY as $a => $b){
	
	$wednesday .= '  {
                    "start": "'.$start_WEDNESDAY[$a].'",
                    "end": "'.$end_WEDNESDAY[$a].'"
                },';
	}
	
	$wednesday_array = substr($wednesday, 0, -1);
    }
	
	
	
    $start_THURSDAY = isset($_POST['start-THURSDAY'])? $_POST['start-THURSDAY'] : "" ;
	$end_THURSDAY = isset($_POST['end-THURSDAY'])? $_POST['end-THURSDAY'] : "";
    $thursday = "";
    if($start_THURSDAY == "" && $end_THURSDAY == "")
    {
        $thursday_array = "";
    }
    else
    {
	foreach($start_THURSDAY as $a => $b){
	
	$thursday .= '  {
                    "start": "'.$start_THURSDAY[$a].'",
                    "end": "'.$end_THURSDAY[$a].'"
                },';
	}
	
	$thursday_array = substr($thursday, 0, -1);
    }
	
	
	$start_FRIDAY = isset($_POST['start-FRIDAY'])? $_POST['start-FRIDAY'] : "" ;
	$end_FRIDAY = isset($_POST['end-FRIDAY'])? $_POST['end-FRIDAY'] : "";
    $friday = "";
    if($start_FRIDAY == "" && $end_FRIDAY == "")
    {
        $friday_array = "";
    }
    else
    {
	foreach($start_FRIDAY as $a => $b){
	
	$friday .= '  {
                    "start": "'.$start_FRIDAY[$a].'",
                    "end": "'.$end_FRIDAY[$a].'"
                },';
	}
	
	$friday_array = substr($friday, 0, -1);
    }


	
	
	$start_SATURDAY = isset($_POST['start-SATURDAY'])? $_POST['start-SATURDAY'] : "" ;
	$end_SATURDAY = isset($_POST['end-SATURDAY'])? $_POST['end-SATURDAY'] : "";
    $saturday = "";
    if($start_SATURDAY == "" && $end_SATURDAY == "")
    {
        $saturday_array = "";
    }
    else
    {
	foreach($start_SATURDAY as $a => $b){
	
	$saturday .= '  {
                    "start": "'.$start_SATURDAY[$a].'",
                    "end": "'.$end_SATURDAY[$a].'"
                },';
	}
	
	$saturday_array = substr($saturday, 0, -1);
    }
	
	
	$start_SUNDAY = isset($_POST['start-SUNDAY'])? $_POST['start-SUNDAY'] : "" ;
	$end_SUNDAY = isset($_POST['end-SUNDAY'])? $_POST['end-SUNDAY'] : "";
    $sunday = "";
    if($start_SUNDAY == "" && $end_SUNDAY == "")
    {
        $sunday_array = "";
    }
    else
    {
	foreach($start_SUNDAY as $a => $b){
	
	$sunday .= '  {
                    "start": "'.$start_SUNDAY[$a].'",
                    "end": "'.$end_SUNDAY[$a].'"
                },';
	}
	
	$sunday_array = substr($sunday, 0, -1);
    }
    
    

    
    $image_width = isset($_POST['image-width'])? $_POST['image-width'] : "" ;
    $image_height = isset($_POST['image-height'])? $_POST['image-height'] : "";
    $image_type = isset($_POST['image-type'])? $_POST['image-type'] : "" ;
	$image_url = isset($_POST['image-url'])? $_POST['image-url'] : "";
    $image = "";
    if($image_width == "" && $image_height == "" && $image_type == "" && $image_url == "")
    {
        $image_array = "";
    }
    else
    {
	foreach($image_width as $a => $b){
	
	$image .= ' {
        "width": "'.$image_width[$a].'",
        "type": "'.$image_type[$a].'",
        "url": "'.$image_url[$a].'",
        "height": "'.$image_height[$a].'"
    },';
}
	
	$image_array = substr($image, 0, -1);
    }





    $video_url = isset($_POST['video-url'])? $_POST['video-url'] : "" ;
    $video_description = isset($_POST['video-description'])? $_POST['video-description'] : "";
    $video = "";
    if($video_description == "" && $video_url == "")
    {
        $video_array = "";
    }
    else
    {
	foreach($video_description as $a => $b){
	
	$video .= ' {
        "url": "'.$video_url[$a].'",
            "description": "'.$video_description[$a].'"
    },';
}
	
	$video_array = substr($video, 0, -1);
    }



    $url_display = isset($_POST['url-display'])? $_POST['url-display'] : "" ;
    $url_description = isset($_POST['url-description'])? $_POST['url-description'] : "";
    $url_type = isset($_POST['url-type'])? $_POST['url-type'] : "" ;
	$url_url = isset($_POST['url-url'])? $_POST['url-url'] : "";
    $url = "";
    if($url_display == "" && $url_description == "" && $url_type == "" && $url_url == "")
    {
        $url_array = "";
    }
    else
    {
	foreach($url_display as $a => $b){
	
	$url .= ' {
        "displayUrl": "'.$url_display[$a].'",
            "description": "'.$url_description[$a].'",
            "type": "'.$url_type[$a].'",
            "url": "'.$url_url[$a].'"
    },';
}
	
	$url_array = substr($url, 0, -1);
    }
	
    
    $keywords = isset($_POST['keyword'])? $_POST['keyword'] : "" ;
    $keyword = "";
    if($keywords == "")
    {
        $keyword_array = "";
    }
    else
    {
	foreach($keywords as $a => $b){
	
	$keyword .= '"'.$keywords[$a].'", ';
}
	
	$keyword_array = rtrim($keyword,", ");
    }



    $payment_option = isset($_POST['payment-option'])? $_POST['payment-option'] : "" ;
    $payment_options = "";
    if($payment_option == "")
    {
        $payment_option_array = "";
    }
    else
    {
	foreach($payment_option as $a => $b){
	
	$payment_options .= '"'.$payment_option[$a].'", ';
}
	
	$payment_option_array = rtrim($payment_options,", ");
    }


    $list_name = isset($_POST['list-name'])? $_POST['list-name'] : "" ;
    $list_description = isset($_POST['list-description'])? $_POST['list-description'] : "";
    $list_type = isset($_POST['list-type'])? $_POST['list-type'] : "" ;
    $list = "";
    if($list_name == "" && $list_description == "" && $list_type == "")
    {
        $list_array = "";
    }
    else
    {
	foreach($list_name as $a => $b){
	
	$list .= ' {
        "name": "'.$list_name[$a].'",
        "description": "'.$list_description[$a].'",
        "type": "'.$list_type[$a].'"
    },';
}
	
	$list_array = substr($list, 0, -1);
    }


    $specialities = isset($_POST['speciality'])? $_POST['speciality'] : "" ;
    $speciality = "";
    if($specialities == "")
    {
        $speciality_array = "";
    }
    else
    {
	foreach($specialities as $a => $b){
	
	$speciality .= '"'.$specialities[$a].'", ';
}
	
	$speciality_array = rtrim($speciality,", ");
    }




    $brands = isset($_POST['brand'])? $_POST['brand'] : "" ;
    $brand = "";
    if($brands == "")
    {
        $brand_array = "";
    }
    else
    {
	foreach($brands as $a => $b){
	
	$brand .= '"'.$brands[$a].'", ';
}
	
	$brand_array = rtrim($brand, ", ");
    }



    $products = isset($_POST['product'])? $_POST['product'] : "" ;
    $product = "";
    if($products == "")
    {
        $product_array = "";
    }
    else
    {
	foreach($products as $a => $b){
	
	$product .= '"'.$products[$a].'", ';
}
	
	$product_array = rtrim($product, ", ");
    }



    $services = isset($_POST['service'])? $_POST['service'] : "" ;
    $service = "";
    if($services == "")
    {
        $service_array = "";
    }
    else
    {
	foreach($services as $a => $b){
	
	$service .= '"'.$services[$a].'", ';
}
	
	$service_array = rtrim($service, ", ");
    }



    $associations = isset($_POST['association'])? $_POST['association'] : "" ;
    $association = "";
    if($associations == "")
    {
        $association_array = "";
    }
    else
    {
	foreach($associations as $a => $b){
	
	$association .= '"'.$associations[$a].'", ';
}
	
	$association_array = rtrim($association, ", ");
    }



    $languages = isset($_POST['language'])? $_POST['language'] : "" ;
    $language = "";
    if($languages == "")
    {
        $language_array = "";
    }
    else
    {
	foreach($languages as $a => $b){
	
	$language .= '"'.$languages[$a].'", ';
}
	
	$language_array = rtrim($language,", ");
    }

	
	$json_array = '{
    "yextID": "'. $_POST['yext-id'] .'",
    "status": "'.$_POST['status'].'",
    "name": "'.$_POST['name'].'",
    "address": {
        "address": "'.$_POST['address'].'",
        "visible": "'.$_POST['visible'].'",
        "address2": "'.$_POST['address-2'].'",
        "city": "'.$_POST['city'].'",
        "displayAddress": "'.$_POST['display-address'].'",
        "countryCode": "'.$_POST['country-code'].'",
        "postalCode": "'.$_POST['postal-code'].'",
        "state": "'.$_POST['state'].'"
    },
    "phones": [
       '.$phone_number_array.'
    ],
    "categories": [
        '.$category_array.'
    ],
    "description": "'.$_POST['description'].'",
    "emails": [
        '.$email_array.'
    ],
    "geoData": {
        "displayLatitude": "'.$_POST['display-latitude'].'",
        "displayLongitude": "'.$_POST['display-longitude'].'",
        "routableLatitude": "'.$_POST['routable-latitude'].'",
        "routableLongitude": "'.$_POST['routable-longitude'].'"
    },
    "hours": [
        {
            "day": "MONDAY",
            "intervals": [
               '.$monday_array.'
            ]
        },
        {
            "day": "TUESDAY",
            "intervals": [
                '.$tuesday_array.'
            ]
        },
        {
            "day": "WEDNESDAY",
            "intervals": [
               '.$wednesday_array.'
            ]
        },
        {
            "day": "THURSDAY",
            "intervals": [
               '.$thursday_array.'
            ]
        },
        {
            "day": "FRIDAY",
            "intervals": [
                '.$friday_array.'
            ]
        },
        {
            "day": "SATURDAY",
            "intervals": [
                '.$saturday_array.'
            ]
        },
        {
            "day": "SUNDAY",
            "intervals": [
				'.$sunday_array.'
			]
        }
    ],
    "hoursText": {
        "display": "'.$_POST['hours-text'].'"
    },
    "images": [
        '.$image_array.'
    ],
    "videos": [
        '.$video_array.'
    ],
    "specialOffer": {
        "message": "'.$_POST['special-offer-message'].'",
        "url": "'.$_POST['special-offer-url'].'"
    },
    "paymentOptions": [
        '.$payment_option_array.'
    ],
    "urls": [
        '.$url_array.'
    ],
    "twitterHandle": "'.$_POST['twitter'].'",
    "facebookPageUrl": "'.$_POST['facebook'].'",
    "attribution": {
        "image": {
            "width": "'.$_POST['attribution-image-width'].'",
            "description": "'.$_POST['attribution-image-description'].'",
            "url": "'.$_POST['attribution-image-url'].'",
            "height": "'.$_POST['attribution-image-height'].'"
        },
        "attributionUrl": "'.$_POST['attribution-url'].'"
    },
    "keywords": [
        '.$keyword_array.'
    ],
    "lists": [
        '.$list_array.'
    ],
    "closed": "'.$_POST['closed'].'",
    "specialities": [
        '.$speciality_array.'
    ],
    "brands": [
        '.$brand_array.'
    ],
    "products": [
        '.$product_array.'
    ],
    "services": ['.$service_array.'],
    "yearEstablished": "'.$_POST['year-of-establish'].'",
    "associations": [
        '.$association_array.'
    ],
    "languages": [
        '.$language_array.'
    ]
}';
	
	

	
	$readAll = "http://127.0.0.1/123local-API/product/update.php?id=$id";
    $ch = curl_init($readAll);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_array);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'key: ieurtjkosakwehua1457821244amsnashjad',
		'Content-Type: application/json',
    	'Content-Length: ' . strlen($json_array)
    ));
	$response  = curl_exec($ch);
    curl_close($ch);
	echo $response;
	
	
}




?>