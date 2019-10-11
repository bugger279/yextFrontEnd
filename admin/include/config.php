<?php 
    // $servername = "localhost";
    // $username = "local_123localyext";
    // $password = "DR-bx(HBSFk[";
    // $dbname = "local_123localyext";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "new_dbs_yext";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }


 ?>