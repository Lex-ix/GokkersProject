<?php
/**
 * Created by PhpStorm.
 * User: lexkr
 * Date: 3/28/17
 * Time: 13:14
 */

    try {
        $database = new PDO('mysql:host=localhost;dbname=u512561452_gkkrs', 'u512561452_lex', 'abc123xyz');
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Something went wrong while trying to connect to the database.";
    }
