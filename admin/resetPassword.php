<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "api_db";
    try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POWERLISTING | RESET PASSWORD</title>
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
    <div class="form-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="h-100">
                        <div class="justify-content-center h-100">
                            <div class="user_card">
                                <div class="d-flex justify-content-center"><h3 class="card-title">Reset Password</h3></div>
                                <div class="d-flex justify-content-center form_container">
                                    <form action="" name="loginForm" method="POST">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" name="new_password" class="form-control input_user" value="" placeholder="Type your new password" required="true">
                                        </div>
                                        <div class="d-flex justify-content-center mt-3 login_container">
                                            <button type="submit" name="reset_btn" class="btn login_btn">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                <?php
                                // username = user_admin pwd = gsmadmin@123;
                                if (isset($_POST['new_password'])) {
                                    $new_pass = $_POST['new_password'];
                                  
                                    // Grab to token that came from the email link
                                    $token = $_GET['token'];
                                    print_r($token);
                                    // if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
                                    $resetSql = "SELECT emailAddress FROM admin WHERE token='$token' LIMIT 1";
                                    $stmt = $conn->prepare($resetSql);
                                    $stmt->execute();
                                    $count = $stmt->rowCount();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    extract($row);
                                    $email = $emailAddress;
                                    echo $email;
                                    if ($email) {
                                    $new_pass = md5($new_pass);
                                    $resetPass = "UPDATE admin SET password='$new_pass' WHERE emailAddress='$email'";
                                    $stmt = $conn->prepare($resetPass);
                                    $stmt->execute();
                                    header('location: index.php');
                                    }
                                  }
                                ?>
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