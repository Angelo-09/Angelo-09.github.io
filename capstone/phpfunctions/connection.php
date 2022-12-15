<?php

    $serverName = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "bobba_brew";

    $con = mysqli_connect($serverName, $dbUser, $dbPass, $dbName);
    if(!$con)
    {
        die("Failed to connect with database: " . mysqli_connect_error());
    }

    function pdo_connect_mysql() {
        $serverName = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "bobba_brew";
        try {
            return new PDO('mysql:host=' . $serverName . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $dbPass);
        } catch (PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }

    $pdo = pdo_connect_mysql();