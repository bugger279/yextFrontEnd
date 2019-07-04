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
                                            <input type="text" name="login_name" class="form-control input_user" value="" placeholder="username">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="password" name="login_pwd" class="form-control input_pass" value="" placeholder="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3 login_container">
                                            <button type="button" name="login_btn" class="btn login_btn">Login</button>
                                        </div>
                                    </form>
                                    <?php
                                        if (isset($_POST['login_btn'])) {
                                            echo $_POST['login_name'] . ' ' . $_POST['login_pwd'];
                                        }
                                    ?>
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
