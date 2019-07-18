<?php
    session_start();
    ob_start();
   include "include/config.php"; 
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
                                        <div class="d-flex justify-content-center mt-3 login_container">
                                            <p class="pwdReset" ><a href="forgotPassword.php">Forgot Password?</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                <?php
                                // username = user_admin pwd = gsmadmin@123;
                                if (isset($_POST['login_btn'])) {
                                    $username = $_POST['login_name'];
                                    $password = $_POST['login_pwd'];
                                    $encryptedPassword = md5($password);

                                    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$encryptedPassword' ";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $count = $stmt->rowCount();

                                    if ($count > 0) {
                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                        extract($row);
                                        $_SESSION["username"] = $nickname;
                                        if (isset($_SESSION["username"])) {
                                            header("Location: index.php");
                                        } else {
                                              header("Location: login.php");
                                        }
                                    } else { ?>
                                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                            <strong class="mr-auto text-danger">Error</strong>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                            <!-- <span id="closeToast" aria-hidden="true">&times;</span> -->
                                            </button>
                                        </div>
                                        <div class="toast-body">
                                            Invalid Credentials.
                                        </div>
                                        </div>
                                    <?php }
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