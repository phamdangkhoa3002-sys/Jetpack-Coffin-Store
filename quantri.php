<?php
session_start();

if(!isset($_SESSION['login'])){
    header("location:login.php");
}

include 'cons.php';

$sql = "SELECT * FROM gh_sp_sp";

$result = getData($sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Quản trị sản phẩm</title>

<style>

body{
    font-family: Arial;
    margin: 20px;
}

header, footer{
    text-align: center;
    margin-bottom: 20px;
}

table{
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td{
    border: 1px solid #ccc;
    padding: 10px;
}

th{
    background: #f2f2f2;
}

.add-btn{
    background: green;
    color: white;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 5px;
}

.action-btn{
    text-decoration: none;
    margin-right: 10px;
}

.delete-btn{
    color: red;
}

img{
    border-radius: 5px;
}

</style>

</head>

<body>

<header>

<a href="login.php">
TRANG ĐĂNG NHẬP
</a>

|

<a href="quantri.php">
DANH SÁCH SẢN PHẨM
</a>

|

<a href="addbutton.php">
THÊM MỚI
</a>

|

<a href="logout.php">
ĐĂNG XUẤT
</a>

</header>

<h1>TRANG QUẢN TRỊ VIÊN</h1>

<p>
Dữ liệu được quản lý cho:
<b>gh_sp_sp</b>
</p>

<a href="addbutton.php"
   class="add-btn">

+ Thêm Mới

</a>

<table>

<tr>

<th>ID</th>

<th>Tên</th>

<th>Price</th>

<th>Hình</th>

<th>Ẩn hiện</th>

<th>Thao tác</th>

</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td>
<?= $row['id']; ?>
</td>

<td>
<?= $row['ten']; ?>
</td>

<td>
<?= $row['price']; ?>
</td>

<td>

<img src="<?= $row['hinh1']; ?>"
     width="80">

</td>

<td>

<?= $row['anhien'] == 1 ? "Hiện" : "Ẩn"; ?>

</td>

<td>

<a href="updatebutton.php?id=<?= $row['id']; ?>"
   class="action-btn">

Sửa

</a>

<a href="deletebutton.php?id=<?= $row['id']; ?>"
   class="action-btn delete-btn"
   onclick="return confirm('Xóa sản phẩm?')">

Xóa

</a>

</td>

</tr>

<?php
}
?>

</table>

<footer>

</footer>

</body>
</html>