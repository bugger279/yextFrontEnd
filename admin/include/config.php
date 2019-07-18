<?php 

$servername = "182.50.133.80:3306";
    $username = "avish";
    $password = "avish@123";
    $dbname = "rateme";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }


 ?>