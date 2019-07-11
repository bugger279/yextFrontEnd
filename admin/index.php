<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POWERLISTING | ADMIN LOGIN</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.min.js"></script>
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
    <?php
        $readAll = "http://123local.com/powerlistings/product/read.php";
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
    <div class="listing-rows">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Listing Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($locations_json as $keys) {
                                foreach ($keys as $key => $value) { ?>
                                <tr>
                                <th scope="row"><?php print_r($keys[$key]["partnerID"]); ?></th>
                                <td><?php print_r($keys[$key]["name"]); ?></td>
                                <td><?php print_r($keys[$key]["status"]); ?></td>
                                <td class="action-btns">
                                    <a href="#"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                    <a href="delete.php?id=<?php print_r($keys[$key]["partnerID"]); ?>"  onclick="confirmDelete()" ><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php }
                        } ?>
                        </tbody>
                        </table>
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
    <script>
        function confirmDelete() {
            var r = confirm("Are you sure you want to delete this listing?");
            if (r == true) {
                txt = "You pressed OK!";
            } else {
                txt = "You pressed Cancel!";
            }
        }
    </script>
</body>
</html>