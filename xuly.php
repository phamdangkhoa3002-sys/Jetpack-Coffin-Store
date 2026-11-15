
<?php
session_start();
include 'cons.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['fail'])) {
    $_SESSION['fail'] = 0;
}

if ($_SESSION['fail'] >= 3) {
    die("Bạn đã nhập sai quá nhiều lần!");
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE username = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['password'];

    // Check modern hashed passwords
    $valid_password = password_verify($password, $stored_password);

    // Support old plain-text passwords
    if (!$valid_password && hash_equals($stored_password, $password)) {
        $valid_password = true;
    }

    // Support old MD5 passwords
    if (!$valid_password && hash_equals($stored_password, md5($password))) {
        $valid_password = true;
    }

    if ($valid_password) {

        if ($row['khoa'] == 0) {
            die("Tài khoản đã bị khóa!");
        }

        // Upgrade old passwords to secure hashes
        if (!password_verify($password, $stored_password)) {

            $new_password = password_hash($password, PASSWORD_DEFAULT);

            $update = mysqli_prepare(
                $conn,
                "UPDATE users SET password = ? WHERE id = ?"
            );

            mysqli_stmt_bind_param(
                $update,
                "si",
                $new_password,
                $row['id']
            );

            mysqli_stmt_execute($update);
            mysqli_stmt_close($update);
        }

        $_SESSION['user'] = $row['username'];
        $_SESSION['idgroup'] = $row['idgroup'];
        $_SESSION['ten'] = $row['ten'];
        $_SESSION['fail'] = 0;

        header("Location: index.php");
        exit();

    } else {

        $_SESSION['fail']++;

        echo "Sai tài khoản hoặc mật khẩu!<br>";
        echo "Số lần sai: " . $_SESSION['fail'];
    }

} else {

    $_SESSION['fail']++;

    echo "Sai tài khoản hoặc mật khẩu!<br>";
    echo "Số lần sai: " . $_SESSION['fail'];
}

mysqli_stmt_close($stmt);
?>
