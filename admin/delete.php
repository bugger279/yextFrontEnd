<?php
    session_start();
	ob_start();
    if (!isset($_SESSION["username"]) && !isset($_GET['id'])) {
        header("Location: login.php");
    }
	else
	{
	$listingId = $_GET['id'];
		
	$readAll = "http://123local.com/powerlistings/product/cancel.php?id='$listingId'";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'key: ieurtjkosakwehua1457821244amsnashjad'
        ));
        curl_setopt($ch, CURLOPT_URL, $readAll);
        $locations = curl_exec($ch);
        if($locations)
		{
			header('Location: index.php?id=success');
		}
		else
		{
			header('Location: index.php?id=error');	
		}
        curl_close($ch);
		
		
		
		
	}



?>


