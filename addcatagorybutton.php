<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

require("cons.php");

if(isset($_POST['btnAdd'])){

    $ten = mysqli_real_escape_string(
        $conn,
        $_POST['ten']
    );

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $description = mysqli_real_escape_string(
        $conn,
        $_POST['description']
    );

    $keywords = mysqli_real_escape_string(
        $conn,
        $_POST['keywords']
    );

    $thutu = (int)$_POST['thutu'];

    $anhien = (int)$_POST['anhien'];

    $hinh1 = "";
    $hinh2 = "";

    if(!empty($_FILES['hinh1']['name'])){

        $hinh1 =
            "uploads/theloai/" .
            time() .
            "_" .
            $_FILES['hinh1']['name'];

        move_uploaded_file(
            $_FILES['hinh1']['tmp_name'],
            $hinh1
        );
    }

    if(!empty($_FILES['hinh2']['name'])){

        $hinh2 =
            "uploads/theloai/logo/" .
            time() .
            "_" .
            $_FILES['hinh2']['name'];

        move_uploaded_file(
            $_FILES['hinh2']['tmp_name'],
            $hinh2
        );
    }

    $sql = "
        INSERT INTO gh_sp_theloai
        (
            ten,
            title,
            description,
            keywords,
            thutu,
            anhien,
            hinh1,
            hinh2,
            lang
        )
        VALUES
        (
            '$ten',
            '$title',
            '$description',
            '$keywords',
            '$thutu',
            '$anhien',
            '$hinh1',
            '$hinh2',
            1
        )
    ";

    mysqli_query($conn,$sql);

    header(
        "location:index.php?act=admin-product"
    );
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Thêm danh mục</title>

<style>

body{
    background: #222222;
    font-family:Segoe UI;
    color:white;
}

.box{

    max-width:700px;

    margin:40px auto;

        background:
    #000000;;

    padding:30px;

    border-radius:20px;
}

input,
textarea,
select{

      width:100%;

    padding:12px;

    margin-bottom:18px;

    border:none;

    border-radius:10px;

  background:#222222;

    color:white;

    box-sizing:border-box;
}

button{

    width:100%;

    padding:14px;

    border:none;

    border-radius:10px;

    background:#ff6b00;

    color:white;

    font-weight:bold;

    cursor:pointer;
}

button:hover{

    background:#ff8500;
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

<h2>📂 Thêm danh mục sản phẩm</h2>

<form
method="POST"
enctype="multipart/form-data">

<label>Tên danh mục</label>

<input
type="text"
name="ten"
required>

<label>SEO Title</label>

<input
type="text"
name="title">

<label>SEO Description</label>

<textarea
name="description"
rows="3"></textarea>

<label>SEO Keywords</label>

<input
type="text"
name="keywords">

<label>Ảnh danh mục</label>

<input
type="file"
name="hinh1">

<label>Logo danh mục</label>

<input
type="file"
name="hinh2">

<label>Thứ tự</label>

<input
type="number"
name="thutu"
value="0">

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
name="btnAdd">

➕ Thêm danh mục

</button>

<a
    href="index.php?act=admin-product"
    class="back-link"
>
    ← Quay lại quản trị
</a>


</form>

</div>

</body>
</html>