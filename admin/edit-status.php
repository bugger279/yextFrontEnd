<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    }

include "include/config.php";


if(isset($_POST['status']) && isset($_POST['id']))
{
	$status = $_POST['status'];
	$id = $_POST['id'];
	
	echo $sql = "UPDATE locations SET status = '$status' WHERE locationId = '$id'";
	$stmt = $conn->prepare($sql);
    $stmt->execute();
	$count = $stmt->rowCount();

    if ($count > 0) {
		
		echo "true";
	}
	else{
		
		echo "false";
	}
}




?>