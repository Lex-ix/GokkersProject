<?php

    if (isset($_GET['email']) && !empty($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) && isset($_GET['password']) && !empty($_GET['password']) ) {
        $userEmail    = $_GET['email'];
        $userPassword = $_GET['password'];

        include('databaseConnector.php');

        $stmt = $database->prepare("SELECT * FROM users WHERE email=:userMail");
        $stmt->execute(array('userMail' => $userEmail));

        if ( $stmt->rowCount() > 0 ) {
            $message = "This email is already taken ($userEmail)";
        }
        else {
            $stmt = $database->prepare("INSERT INTO users(password, email) VALUES (:userPass,:userMail)");
            $stmt->execute(array('userPass' => $userPassword, 'userMail' => $userEmail));

            $message = 'You succesfully created an account.';
        }
    }
    else {
        $message = 'Please verify if you entered a proper email and/or password.';
    }

    header("Location: ../index.php?message=$message");
    exit();