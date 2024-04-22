<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "sorter";

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    exit("Connection failed: " . mysqli_connect_error());
}