<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Bạn chưa đăng nhập!";
    exit;
}
?>

<h2>Trang chủ</h2>

<?php
echo "Xin chào: " . htmlspecialchars($_SESSION['user']);
?>

<br><br>
<a href="logout.php">Đăng xuất</a>