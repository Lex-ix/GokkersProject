<?php
    /**
     * Created by PhpStorm.
     * User: Lex
     * Date: 3/20/17
     * Time: 15:03
     */

    include('databaseConnector.php');

    session_start();

    $loginInformation = false;

    if ( isset( $_GET['email'] ) && !empty( $_GET['email'] ) && filter_var( $_GET['email'], FILTER_VALIDATE_EMAIL ) ) {
        if ( isset($_GET['password']) && !empty($_GET['password']) ) {
            $userEmail = $_GET['email'];
            $userPassword = $_GET['password'];

            $stmt = $database->prepare("SELECT * FROM users WHERE email=:userMail AND password=:userPass");
            $stmt->execute(array("userMail" => $userEmail, "userPass" => $userPassword));

            if ( $stmt->rowCount() > 0) {
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