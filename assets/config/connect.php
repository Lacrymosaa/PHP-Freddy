<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "freddy";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>