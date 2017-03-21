<?php
    session_start();

    if ( isset($_SESSION['loginInformation']) ) {
        if ( !$_SESSION['loginInformation'] ) {
            $_SESSION['loginInformation'] = false;
        }
    }
    else {
        $_SESSION['loginInformation'] = false;
    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header>
            <div class="container">
                <div class="logo">
                    <h1><span>Lizard</span><span>Race</span></h1>
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="#about">About</a></li>
                        <li><a href="#download">Download</a></li>
                        <li><a href="#register">Register</a></li>
                        <?php
                            if ($_SESSION['loginInformation']) {
                                echo '<li><a href="php/logoutHandler.php">Logout</a></li> ';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </header>

        <div class="main-content">
            <div class="info" id="about">
                <div class="container">
                    <h1>Our Game</h1>
                    <div class="info-info">
                        <div class="info-img">
                            <img src="img/game.png" alt="Game preview" style="width:400px; height:250px;">
                        </div>
                        <div class="info-text">
                            <p>Our game is all about winning or losing, In this game 5 Frilled Lizards race against eachother, and you get to bet on which one is going to win! You bet against 3 other players to see who has the best luck, and wits ;)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if ( $_SESSION['loginInformation'] ) {
                echo '
                    <div class="main-content">
                         <div class="download" id="download">
                            <div class="container">
                                <h1>Download</h1>
                                <h2>Lizard Race Version 0.1</h2>
                                <div class="gokkers-download">
                                    <a href="http://bluenik.com/ac" >
                                    <button type="button">Download</button>
                                    </a>
                                </div>
                            </div>
                         </div>
                    </div>
                ';
            } else {
                echo '
                    <div class="main-content">
                         <div class="download">
                            <div class="container">
                                <h1>Download</h1>
                                <h2>Lizard Race Version 0.1</h2>
                                <p>Please login to download</p>
                            </div>
                         </div>
                    </div>
                ';
            }
        ?>

        <div class="main-content">
            <div class="register" id="register">
                <div class="container">
                    <h1>Register and Login</h1>
                        <div class="form-register-login">
                            <div class="form-register">
                                <h2>Register</h2>
                                <?php
                                    if (isset($_GET['message'])) {
                                        echo "<p>{$_GET['message']}</p>";
                                    }
                                ?>
                                <form action="php/newUserHandler.php">
                                    <div class="form-group">
                                        <label for="usermail">E-mail:</label>
                                        <input type="email" name="email" id="usermail">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" id="password">
                                    </div>
                                    <div class="form-group">
                                        <input class="submit" type="submit" value="Register">
                                    </div>
                                </form>
                            </div>
                        <div class="form-login">
                            <h2>Login</h2>
                            <?php
                                if (isset($_GET['messageLogin'])) {
                                    echo "<p>{$_GET['messageLogin']}</p>";
                                }
                            ?>
                            <form action="php/loginHandler.php">
                                <div class="form-group">
                                    <label for="usermail">E-mail:</label>
                                    <input type="email" name="email" id="usermail">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <input class="submit" type="submit" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>











        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
