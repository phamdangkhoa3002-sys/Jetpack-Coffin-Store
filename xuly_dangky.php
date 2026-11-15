
<?php
session_start();
include 'cons.php';

// Only accept POST requests
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: dangky.php");
    exit();
}

// Get form data
$ten = trim($_POST['ten'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$dienthoai = trim($_POST['dienthoai'] ?? '');
$email = trim($_POST['email'] ?? '');

// Check required fields
if ($ten == '' || $username == '' || $password == '' || $email == '') {
    die("Vui lòng nhập đầy đủ thông tin!");
}

// Check password confirmation
if ($password !== $confirm_password) {
    die("Mật khẩu xác nhận không khớp!");
}

// Minimum password length
if (strlen($password) < 6) {
    die("Mật khẩu phải có ít nhất 6 ký tự!");
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Địa chỉ email không hợp lệ!");
}

// Check duplicate username or email
$sql = "SELECT id FROM users WHERE username = ? OR email = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    die("Tên tài khoản hoặc email đã tồn tại!");
}

mysqli_stmt_close($stmt);

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Generate random key
$randomkey = bin2hex(random_bytes(16));

// Default account information
$hinh = "";
$idgroup = 1;       // Nhân viên
$khoa = 1;          // Tài khoản đang hoạt động

// Insert new account
$sql = "INSERT INTO users
(
    ten,
    hinh,
    username,
    password,
    dienthoai,
    email,
    nickyahoo,
    nickskype,
    ngaydangky,
    xem,
    ngayvaocuoi,
    idgroup,
    listquanly,
    khoa,
    randomkey
)
VALUES (?, ?, ?, ?, ?, ?, '', '', NOW(), 0, NOW(), 1, '', 1, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "sssssss",
    $ten,
    $hinh,
    $username,
    $hashed_password,
    $dienthoai,
    $email,
    $randomkey
);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('Đăng ký tài khoản thành công!');
        window.location.href = 'login.php';
    </script>";
} else {
    echo "Lỗi đăng ký: " . htmlspecialchars(mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
?>
