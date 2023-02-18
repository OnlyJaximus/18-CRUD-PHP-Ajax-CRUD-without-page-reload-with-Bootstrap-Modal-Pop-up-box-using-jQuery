<?php

$host = "localhost";
$db = "adminpanel";
$username = "root";
$password = "";

$mysqli = new mysqli(
    hostname: $host,
    database: $db,
    username: $username,
    password: $password
);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

// if ($mysqli) {
//     echo "Test, Yeee, Konektovani!";
// }

return $mysqli;
