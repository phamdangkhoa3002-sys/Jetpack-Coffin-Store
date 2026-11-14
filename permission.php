<?php

session_start();

if(!isset($_SESSION['user'])){

    header("location:login.php");

    exit();
}

function checkPermission($roleRequired){

    if($_SESSION['idgroup'] < $roleRequired){

        echo "
        <h2>
        Bạn không có quyền truy cập!
        </h2>
        ";

        exit();
    }
}
?>