<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "jetpack_store";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

function getData($sql){
    global $conn;

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }

    return $result;
}
?>