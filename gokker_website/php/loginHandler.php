<?php
/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 3/20/17
 * Time: 15:03
 */

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

        if ( mysqli_affected_rows($dbHandle) > 0) {
            $messageLogin = "Succesfully logged in";
        } else {
            $messageLogin = "You should register to login.";
        }
    } else {
        $messageLogin = "This isn't a valid password";
    }
} else {
    $messageLogin = "This isn't a valid email.";
}

header("Location: ../index.php?messageLogin=$messageLogin");
exit();