<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "courseappdb";

// MYSQLİ (object oriented, prosedur)
// RDO

$baglanti = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno() > 0) {
    die("Hata: " . mysqli_connect_errno());
}
