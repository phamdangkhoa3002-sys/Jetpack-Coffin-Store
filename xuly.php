<?php
session_start();

include 'cons.php';

if(!isset($_SESSION['fail'])){
    $_SESSION['fail'] = 0;
}

if($_SESSION['fail'] >= 3){
    die("Bạn đã nhập sai quá nhiều lần!");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
        WHERE username='$username'
        AND password='$password'";

$result = getData($sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    if($row['khoa'] == 0){

        die("Tài khoản đã bị khóa!");
    }

    $_SESSION['user'] = $row['username'];

    $_SESSION['idgroup'] = $row['idgroup'];

    $_SESSION['ten'] = $row['ten'];

    $_SESSION['fail'] = 0;

    header("location:index.php");

}else{

    $_SESSION['fail']++;

    echo "Sai tài khoản hoặc mật khẩu!";

    echo "<br>";

    echo "Số lần sai: " . $_SESSION['fail'];

    if($_SESSION['fail'] >= 3){

        echo "<br><br>";

        echo "Bạn đã bị khóa!";
    }
}
?>