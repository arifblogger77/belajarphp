<?php

    $host = "localhost"; // hostname local itu localhost
    $user = "root";      // root itu username mysql
    $pass = "";          // password defult mysql kosong
    $db   = "db_keuangan"; // nama database yang dihubungkan

    // mysqli_connect adalah perintah untuk menghubungkan ke database;
    $conn = mysqli_connect($host, $user, $pass, $db);

?>