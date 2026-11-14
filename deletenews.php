<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

if($_SESSION['idgroup'] != 3){
    die("Chỉ Admin được xóa!");
}

include 'cons.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "
SELECT n.*, l.ten AS tentheloai
FROM gh_sp_news n
LEFT JOIN gh_sp_theloai_news l
ON n.idtheloai = l.id
WHERE n.id = $id
";

$result = getData($sql);
$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Tin tức không tồn tại!");
}

/* XÓA DỮ LIỆU */
if(isset($_POST['btnDeleteData'])){

    $sqlDelete = "
    DELETE FROM gh_sp_news
    WHERE id = $id
    ";

    getData($sqlDelete);

    header("location:index.php?act=admin-news");
    exit();
}

/* XÓA HÌNH */
if(isset($_POST['btnDeleteImage'])){

    if(
        !empty($row['hinh'])
        &&
        file_exists($row['hinh'])
    ){
        unlink($row['hinh']);
    }

    $sqlUpdate = "
    UPDATE gh_sp_news
    SET hinh = ''
    WHERE id = $id
    ";

    getData($sqlUpdate);

    header("location:index.php?act=admin-news");
    exit();
}

/* XÓA CẢ HAI */
if(isset($_POST['btnDeleteBoth'])){

    if(
        !empty($row['hinh'])
        &&
        file_exists($row['hinh'])
    ){
        unlink($row['hinh']);
    }

    $sqlDelete = "
    DELETE FROM gh_sp_news
    WHERE id = $id
    ";

    getData($sqlDelete);

    header("location:index.php?act=admin-news");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Xóa tin tức</title>

<style>

body{
    background:#222222;
    font-family:Arial,sans-serif;
    color:white;
    margin:30px;
}

.box{
    max-width:800px;
    margin:auto;
    background:#111111;
    padding:30px;
    border-radius:15px;
    border:2px solid #ff6b00;
    box-shadow:0 0 20px rgba(255,107,0,.25);
}

h2{
    color:#ff6b00;
    margin-bottom:25px;
    text-align:center;
}

.info{
    margin-bottom:15px;
    padding:12px;
    background:#1a1a1a;
    border-radius:8px;
}

.info b{
    color:#ffb366;
}

.preview{
    text-align:center;
    margin:20px 0;
}

.preview img{
    max-width:250px;
    border-radius:10px;
    border:2px solid #ff6b00;
}

.buttons{
    display:flex;
    gap:10px;
    margin-top:25px;
    flex-wrap:wrap;
}

button{
    flex:1;
    padding:14px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    color:white;
    font-weight:bold;
    transition:.3s;
}

.data-btn{
    background:#ff9800;
}

.data-btn:hover{
    background:#ffb74d;
}

.img-btn{
    background:#2196f3;
}

.img-btn:hover{
    background:#42a5f5;
}

.both-btn{
    background:#dc3545;
}

.both-btn:hover{
    background:#ff4d5f;
}

.back-btn{
    display:block;
    text-align:center;
    margin-top:20px;
    color:#ff6b00;
    text-decoration:none;
    font-weight:bold;
}

.back-btn:hover{
    color:white;
}

</style>
</head>
<body>

<div class="box">

<h2>🗑 Xóa Tin Tức</h2>

<div class="info">
<b>ID:</b>
<?= $row['id']; ?>
</div>

<div class="info">
<b>Danh mục:</b>
<?= htmlspecialchars($row['tentheloai']); ?>
</div>

<div class="info">
<b>Tiêu đề:</b>
<?= htmlspecialchars($row['ten']); ?>
</div>

<div class="info">
<b>SEO Title:</b>
<?= htmlspecialchars($row['title']); ?>
</div>

<div class="info">
<b>Tóm tắt:</b><br>
<?= nl2br(htmlspecialchars($row['tomtat'])); ?>
</div>

<div class="info">
<b>Nội dung:</b><br>

<?php
echo htmlspecialchars(
    mb_substr($row['noidung'],0,300)
);

if(mb_strlen($row['noidung']) > 300){
    echo "...";
}
?>

</div>

<div class="preview">

<?php
if(
    !empty($row['hinh'])
    &&
    file_exists($row['hinh'])
){
?>

<img src="<?= $row['hinh']; ?>">

<?php
}else{
    echo "Không có hình";
}
?>

</div>

<form method="POST">

<div class="buttons">

<button
    type="submit"
    name="btnDeleteData"
    class="data-btn"
    onclick="return confirm('Xóa dữ liệu tin tức?')">
    🟧 Xóa dữ liệu
</button>

<button
    type="submit"
    name="btnDeleteImage"
    class="img-btn"
    onclick="return confirm('Xóa hình ảnh?')">
    🟦 Xóa hình
</button>

<button
    type="submit"
    name="btnDeleteBoth"
    class="both-btn"
    onclick="return confirm('Xóa cả dữ liệu và hình ảnh?')">
    🟥 Xóa cả hai
</button>

</div>

</form>

<a
href="index.php?act=admin-news"
class="back-btn">
← Quay lại quản lý tin tức
</a>

</div>

</body>
</html>