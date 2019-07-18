<?php
    session_start();
include "include/config.php";
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POWERLISTING | FORGOT PASSWORD</title>
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
                                <div class="d-flex justify-content-center"><h3 class="card-title">Forgot Password</h3></div>
                                <div class="d-flex justify-content-center form_container">
                                    <form action="" name="loginForm" method="POST">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="email" name="login_email" class="form-control input_user" value="" placeholder="Email Address" required="true">
                                        </div>
                                        <div class="d-flex justify-content-center mt-3 login_container">
                                            <button type="submit" name="reset_btn" class="btn login_btn">Send Reset Link</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                <?php
                                // username = user_admin pwd = gsmadmin@123;
                                if (isset($_POST['reset_btn'])) {
                                    $emailAddress = $_POST['login_email'];

                                    $sql = "SELECT * FROM admin WHERE emailAddress = '$emailAddress' ";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $count = $stmt->rowCount();
									

                                    if ($count > 0) {
										
													$str=rand(); 
												 $token = md5($str); 
										
                                            $resetSql = "UPDATE admin SET token='$token' WHERE emailAddress = '$emailAddress'";
                                            $stmt = $conn->prepare($resetSql);
                                            $stmt->execute();
                                            $to = $emailAddress;

                                            $subject = "Reset your password on 123local.com Website";
                                            $msg = "Hi there, click on this <a href=\"http://www.123local.com/admin/resetPassword.php?token=" . $token . "\">link</a> to reset your password on our site";
                                            //print_r($msg);
											$headers = "MIME-Version: 1.0" . "\r\n";
											$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                            $headers .= "From: info@123local.com";
										
                                            mail($to, $subject, $msg, $headers)
                                        ?>
                                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                            <strong class="mr-auto text-info">Message</strong>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                            Reset Link has been sent to you email address.
                                        </div>
                                        </div>

                                    <?php
                                    } else { ?>
                                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                            <strong class="mr-auto text-danger">Error</strong>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                            <!-- <span id="closeToast" aria-hidden="true">&times;</span> -->
                                            </button>
                                        </div>
                                        <div class="toast-body">
                                            Email Address:<br><strong><?php echo $emailAddress; ?></strong><br>doesn't exists.
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