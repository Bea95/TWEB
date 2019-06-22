<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="controller/checkLogin.js"></script>

</head>

<body>
<?php
session_start();
if($_SESSION['id']){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'home.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
?>

    <div class="text-center">
        <!-- Button HTML (to Trigger Modal) -->
        <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Login</a>
    </div>

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Welcome to Logo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="loginForm" method="post" onsubmit="checkLogin(this)">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input id="userEmail" type="text" class="form-control" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input id="userPassword" type="password" class="form-control" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Sign in">
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <a href="#">Forgot Password?</a> &nbsp&nbsp=>&nbsp&nbsp&nbsp
                    <a href="./signUp.php" style="color: white; text-decoration: none">
                        <button class="btn btn-lg">Sing up                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="feedback" style="background-color: #ccccff; border: solid 1px black; height: 10rem; margin: 1rem 10rem 1rem 10rem" hidden></div>

</body>
</html>
