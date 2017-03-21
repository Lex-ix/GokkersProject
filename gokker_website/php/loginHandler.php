<?php

session_start();

/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 3/20/17
 * Time: 15:03
 */

$loginInformation = false;

$dbUser = 'root';
$dbPassword = '';
$dbHostname = 'localhost';
$dbName = 'gokkers';

$dbHandle = new mysqli($dbHostname, $dbUser, $dbPassword, $dbName) or die($message = "Unable to connect to the MySQL database.");

if ( isset( $_GET['email'] ) && !empty( $_GET['email'] ) && filter_var( $_GET['email'], FILTER_VALIDATE_EMAIL ) ) {
    if ( isset($_GET['password']) && !empty($_GET['password']) ) {
        $userEmail = $_GET['email'];
        $userPassword = $_GET['password'];

        $querry = "SELECT * FROM users WHERE email='$userEmail' AND password='$userPassword'";
        mysqli_query( $dbHandle, $querry );

        if ( mysqli_affected_rows($dbHandle) > 0) {
            $_SESSION['loginInformation'] = true;
            $_SESSION['messageLogin'] = "Succesfully logged in";
        } else {
            $_SESSION['messageLogin'] = "You should register to login.";
        }
    } else {
        $_SESSION['messageLogin'] = "This isn't a valid password";
    }
} else {
    $_SESSION['messageLogin'] = "This isn't a valid email.";
}

header("Location: ../index.php");
exit();