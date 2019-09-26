<?php
    $term = $_POST['terms'];
    function searchAjax($term) {
        $searchedLocation = "http://123local.com/powerlistings/product/find.php?s=$term";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'key: ieurtjkosakwehua1457821244amsnashjad'
        ));
        curl_setopt($ch, CURLOPT_URL, $searchedLocation);
        $searchedData = curl_exec($ch);
        $searchedData_json = json_decode($searchedData, true);
        curl_close($ch);
        $lists = "";
        if (!empty($searchedData_json["records"])) {
            foreach($searchedData_json as $keys) {
                foreach ($keys as $key => $value) {
                    $listingName = $keys[$key]["name"];
                    $listingId = $keys[$key]["partnerID"];
        
                    $lists = '<li><a href="single.php?id=' . $listingId . '">' . $listingName . '</a></li>';
                    print_r($lists);
                }
            }
        } else {
            $lists = '<li><a href="">No records found..</a></li>';
            print_r($lists);
        }
        
    };


    searchAjax($term);  
?>