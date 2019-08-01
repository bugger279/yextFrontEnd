<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "api_db";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
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
    <div class="form-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="h-100">
                        <div class="d-flex justify-content-center h-100">
                            <div class="user_card">
                                <div class="d-flex justify-content-center"><h3 class="card-title">Login</h3></div>
                                <div class="d-flex justify-content-center form_container">
                                    <form action="login.php" name="loginForm" method="POST">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" name="login_name" class="form-control input_user" value="" placeholder="username" required="true">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="password" name="login_pwd" class="form-control input_pass" value="" placeholder="password"  required="true">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3 login_container">
                                            <button type="submit" name="login_btn" class="btn login_btn">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// username = user_admin pwd = gsmadmin@123;
if (isset($_POST['login_btn'])) {
    $username = $_POST['login_name'];
    $password = $_POST['login_pwd'];
    $encryptedPassword = md5($password);
    print_r($encryptedPassword);

    // $cipher_method = 'aes-128-ctr';
    // $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
    // $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
    // $crypted_password = openssl_encrypt($password, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
    // unset($password, $cipher_method, $enc_key, $enc_iv);


    // list($crypted_password, $enc_iv) = explode("::", $crypted_password);;
    // $cipher_method = 'aes-128-ctr';
    // $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
    // $password = openssl_decrypt($crypted_password, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
    // unset($crypted_password, $cipher_method, $enc_key, $enc_iv);
    

    // $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ";
    // var_dump($sql);
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $count = $stmt->rowCount();
    // print_r($count);

    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     echo "1";
    // } else {
    //     echo "oopps!";
    // }
}

?>