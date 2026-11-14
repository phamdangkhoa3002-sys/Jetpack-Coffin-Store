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

$sql = "SELECT * FROM gh_sp_sp WHERE id = $id";

$result = getData($sql);

$row = mysqli_fetch_assoc($result);

if(!$row){

    die("Sản phẩm không tồn tại!");
}

if(isset($_POST['btnDeleteData'])){

    $sqlDelete = "DELETE FROM gh_sp_sp WHERE id = $id";

    getData($sqlDelete);

    header("location:index.php?act=admin-product");
    exit();
}

if(isset($_POST['btnDeleteImage'])){

    if(
        $row['hinh1'] != ""
        &&
        file_exists($row['hinh1'])
    ){

        unlink($row['hinh1']);
    }

    $sqlUpdate = "UPDATE gh_sp_sp
                  SET hinh1=''
                  WHERE id=$id";

    getData($sqlUpdate);

    header("location:index.php?act=admin-product");
    exit();
}

if(isset($_POST['btnDeleteBoth'])){

    if(
        $row['hinh1'] != ""
        &&
        file_exists($row['hinh1'])
    ){

        unlink($row['hinh1']);
    }

    $sqlDelete = "DELETE FROM gh_sp_sp WHERE id = $id";

    getData($sqlDelete);

    header("location:index.php?act=admin-product");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Xóa sản phẩm</title>

<style>
body{

    font-family:'Segoe UI',sans-serif;

    background:#222222;

    margin:0;

    padding:40px;

    color:#fff;
}

.box{

    max-width:800px;

    margin:auto;

    background:#000000;

    padding:35px;

    border-radius:20px;

    border:1px solid #333;

    box-shadow:
        0 0 25px rgba(255,107,0,.15),
        0 10px 40px rgba(0,0,0,.5);
}

h2{

    margin-top:0;

    color:#ff6b00;

    text-align:center;

    font-size:32px;

    margin-bottom:25px;

    text-transform:uppercase;

    letter-spacing:2px;
}

p{

    background:#111;

    padding:12px 15px;

    border-radius:10px;

    border-left:4px solid #ff6b00;

    margin-bottom:12px;

    line-height:1.6;
}

b{

    color:#ffb347;
}

img{

    width:220px;

    border-radius:12px;

    border:3px solid #ff6b00;

    display:block;

    margin-top:15px;

    box-shadow:
        0 5px 20px rgba(255,107,0,.25);
}

form{

    margin-top:25px;

    display:flex;

    flex-wrap:wrap;

    gap:12px;
}

button{

    flex:1;

    min-width:180px;

    border:none;

    padding:14px;

    border-radius:12px;

    font-weight:bold;

    color:white;

    cursor:pointer;

    transition:.3s;
}

button:hover{

    transform:translateY(-3px);
}

.data-btn{

    background:
    linear-gradient(
        135deg,
        #ff9800,
        #ff6b00
    );
}

.img-btn{

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #1d4ed8
    );
}

.both-btn{

    background:
    linear-gradient(
        135deg,
        #dc2626,
        #991b1b
    );
}

.back-btn{

    display:block;

    margin-top:25px;

    text-align:center;

    text-decoration:none;

    color:white;

    background:#111;

    padding:14px;

    border-radius:12px;

    border:1px solid #333;

    transition:.3s;
}

.back-btn:hover{

    background:#ff6b00;
}

.warning-box{

    background:
    linear-gradient(
        135deg,
        #7f1d1d,
        #450a0a
    );

    border:1px solid #dc2626;

    padding:15px;

    border-radius:12px;

    margin-bottom:25px;

    text-align:center;

    font-weight:bold;

    color:#fecaca;
}

.back-link{

    display:block;

    text-align:center;

    margin-top:20px;

    color:#ffb347;

    text-decoration:none;
}
</style>

</head>

<body>

<div class="box">

<div class="warning-box">
⚠️ CẢNH BÁO: Hành động này có thể xóa vĩnh viễn sản phẩm khỏi JETPACK COFFIN STORE
</div>

<h2>⚰️ Xóa Sản Phẩm</h2>
<p>
Bạn muốn xóa gì?
</p>

<p>

<b>ID:</b>
<?= $row['id']; ?>

</p>

<p>

<b>Tên:</b>
<?= $row['ten']; ?>

</p>

<p>
<b>Title:</b>
<?= $row['title']; ?>
</p>

<p>
<b>Description:</b><br>
<?= nl2br(htmlspecialchars($row['description'])); ?>
</p>

<p>
<b>Keywords:</b><br>
<?= htmlspecialchars($row['keywords']); ?>
</p>

<p>
<b>Tóm tắt:</b><br>
<?= nl2br(htmlspecialchars($row['tomtat'])); ?>
</p>

<p>
<b>Nội dung:</b><br>

<?php
echo htmlspecialchars(
    mb_substr($row['noidung'], 0, 300)
);

if(mb_strlen($row['noidung']) > 300){
    echo "...";
}
?>

</p>

<p>

<b>Hình:</b>

<br>

<?php
if(
    $row['hinh1'] != ""
    &&
    file_exists($row['hinh1'])
){
?>

<img src="<?= $row['hinh1']; ?>">

<?php
}else{

    echo "Không có hình";
}
?>

</p>

<form method="POST">

<button type="submit"
        name="btnDeleteData"
        class="data-btn"
        onclick="return confirm('Xóa dữ liệu sản phẩm?')">

Xóa dữ liệu

</button>

<button type="submit"
        name="btnDeleteImage"
        class="img-btn"
        onclick="return confirm('Xóa hình ảnh?')">

Xóa hình

</button>

<button type="submit"
        name="btnDeleteBoth"
        class="both-btn"
        onclick="return confirm('Xóa cả dữ liệu và hình ảnh?')">

Xóa cả hai

</button>

</form>

<a
    href="index.php?act=admin-product"
    class="back-link"
>
    ← Quay lại quản trị
</a>


</a>

</div>

</body>
</html>