<?php

session_start();

include 'cons.php';
include 'function.php';

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

if($_SESSION['idgroup'] < 2){

    die("Bạn không có quyền thêm sản phẩm!");
}


$categories = getRecords(
    $conn,
    "*",
    "gh_sp_theloai",
    "",
    "ten ASC"
);
if(isset($_POST['btnAdd'])){

    $idtheloai  = (int)$_POST['idtheloai'];

    $ten        = mysqli_real_escape_string($conn,$_POST['ten']);
    $title      = mysqli_real_escape_string($conn,$_POST['title']);
    $description= mysqli_real_escape_string($conn,$_POST['description']);
    $keywords   = mysqli_real_escape_string($conn,$_POST['keywords']);
    $tomtat     = mysqli_real_escape_string($conn,$_POST['tomtat']);
    $noidung    = mysqli_real_escape_string($conn,$_POST['noidung']);

    $price      = $_POST['price'];

    $anhien     = (int)$_POST['anhien'];

    $noibat     = (int)$_POST['noibat'];

    $ngaycapnhat = date("Y-m-d H:i:s");

    $path = "";

    if(
        isset($_FILES['hinh1']) &&
        $_FILES['hinh1']['name'] != ""
    ){

        $fileName = time()."_".$_FILES['hinh1']['name'];

        $path = "uploads/sanpham/".$fileName;

        move_uploaded_file(
            $_FILES['hinh1']['tmp_name'],
            $path
        );
    }

    $sql = "

    INSERT INTO gh_sp_sp
    (
        idtheloai,
        ten,
        title,
        description,
        keywords,
        tomtat,
        noidung,
        price,
        hinh1,
        ngaycapnhat,
        anhien,
        noibat
    )

    VALUES
    (
        '$idtheloai',
        '$ten',
        '$title',
        '$description',
        '$keywords',
        '$tomtat',
        '$noidung',
        '$price',
        '$path',
        '$ngaycapnhat',
        '$anhien',
        '$noibat'
    )

    ";

    mysqli_query($conn,$sql);

    header("Location:index.php?act=admin-product");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Thêm sản phẩm</title>

<style>

body{

    background:
    linear-gradient(
        135deg,
        #111,
        #222
    );

    font-family:
    'Segoe UI',
    sans-serif;
}

.box{

    max-width:800px;

    margin:40px auto;

    background:
    rgba(0,0,0,.85);

    padding:35px;

    border-radius:20px;

    box-shadow:
    0 15px 40px rgba(0,0,0,.4);
}

.box h2{

    text-align:center;

    color:#ff6b00;

    margin-bottom:30px;
}

label{

    display:block;

    color:white;

    margin-bottom:6px;

    font-weight:bold;
}

input,
select,
textarea{

    width:100%;

    padding:12px;

    margin-bottom:18px;

    border:none;

    border-radius:10px;

  background:#222222;

    color:white;

    box-sizing:border-box;
}

textarea{

    resize:vertical;
}

button{

    width:100%;

    border:none;

    padding:15px;

    border-radius:12px;

    font-size:16px;

    font-weight:bold;

    color:white;

    cursor:pointer;

    background:
    linear-gradient(
        135deg,
        #ff6b00,
        #ffb347
    );
}

button:hover{

    transform:translateY(-2px);
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

<h2>⚰️ THÊM QUAN TÀI MỚI</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Danh mục</label>

    <select name="idtheloai" required>

        <?php while($dm = mysqli_fetch_assoc($categories)){ ?>

            <option value="<?= $dm['id']; ?>">

                <?= $dm['ten']; ?>

            </option>

        <?php } ?>

    </select>

    <label>Tên sản phẩm</label>

    <input
        type="text"
        name="ten"
        required
    >

    <label>Giá bán</label>

    <input
        type="number"
        name="price"
        required
    >

    <label>SEO Title</label>

    <input
        type="text"
        name="title"
    >

    <label>Description</label>

    <textarea
        name="description"
        rows="3"
    ></textarea>

    <label>Keywords</label>

    <input
        type="text"
        name="keywords"
    >

    <label>Tóm tắt</label>

    <textarea
        name="tomtat"
        rows="4"
    ></textarea>

    <label>Nội dung chi tiết</label>

    <textarea
        name="noidung"
        rows="8"
    ></textarea>

    <label>Hình sản phẩm</label>

    <input
        type="file"
        name="hinh1"
        accept="image/*"
    >

    <label>Nổi bật</label>

    <select name="noibat">

        <option value="1">
            Có
        </option>

        <option value="0">
            Không
        </option>

    </select>

    <label>Hiển thị</label>

    <select name="anhien">

        <option value="1">
            Hiện
        </option>

        <option value="0">
            Ẩn
        </option>

    </select>

    <button
        type="submit"
        name="btnAdd"
    >
        ⚰️ Thêm sản phẩm
    </button>

</form>

<a
    href="index.php?act=admin-product"
    class="back-link"
>
    ← Quay lại quản trị
</a>

</div>

</body>
</html>