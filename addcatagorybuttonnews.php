<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

if($_SESSION['idgroup'] < 2){
    die("Bạn không có quyền thêm danh mục tin tức!");
}

include 'cons.php';

if(isset($_POST['btnAdd'])){

    $ten         = mysqli_real_escape_string($conn,$_POST['ten']);
    $title       = mysqli_real_escape_string($conn,$_POST['title']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $keywords    = mysqli_real_escape_string($conn,$_POST['keywords']);
    $thutu       = (int)$_POST['thutu'];
    $noibat      = (int)$_POST['noibat'];
    $anhien      = (int)$_POST['anhien'];
    $lang        = 1;

    $sql = "
        INSERT INTO gh_sp_theloai_news
        (
            ten,
            title,
            description,
            keywords,
            thutu,
            noibat,
            anhien,
            lang
        )
        VALUES
        (
            '$ten',
            '$title',
            '$description',
            '$keywords',
            '$thutu',
            '$noibat',
            '$anhien',
            '$lang'
        )
    ";

    getData($sql);

    header("location:index.php?act=admin-news");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Thêm Danh Mục Tin Tức</title>

<style>

body{
    background:#222222;
    color:#fff;
    font-family:Segoe UI,Arial,sans-serif;
    margin:0;
    padding:30px;
}

.box{
    max-width:800px;
    margin:auto;
    background:#111;
    border-radius:15px;
    padding:30px;
    box-shadow:0 0 25px rgba(0,0,0,.5);
}

h2{
    color:#ff6b00;
    margin-top:0;
    text-align:center;
}

label{
    display:block;
    margin-bottom:8px;
    color:#ffb366;
    font-weight:bold;
}

input,
textarea,
select{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #444;
    border-radius:8px;
    background:#1a1a1a;
    color:#fff;
    box-sizing:border-box;
}

input:focus,
textarea:focus,
select:focus{
    outline:none;
    border-color:#ff6b00;
}

.row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
}

.btn-submit{
    width:100%;
    padding:14px;
    background:#ff6b00;
    border:none;
    color:#fff;
    font-size:16px;
    font-weight:bold;
    border-radius:10px;
    cursor:pointer;
}

.btn-submit:hover{
    background:#ff8533;
}

.back-link{
    display:inline-block;
    margin-top:20px;
    color:#ff6b00;
    text-decoration:none;
}

.back-link:hover{
    color:#fff;
}

</style>

</head>
<body>

<div class="box">

<h2>📰 Thêm Danh Mục Tin Tức</h2>

<form method="POST">

    <label>Tên danh mục</label>
    <input type="text"
           name="ten"
           required>

    <label>SEO Title</label>
    <input type="text"
           name="title">

    <label>SEO Description</label>
    <textarea name="description"
              rows="4"></textarea>

    <label>SEO Keywords</label>
    <input type="text"
           name="keywords">

    <div class="row">

        <div>
            <label>Thứ tự</label>
            <input type="number"
                   name="thutu"
                   value="0">
        </div>

        <div>
            <label>Nổi bật</label>
            <select name="noibat">
                <option value="0">Không</option>
                <option value="1">Có</option>
            </select>
        </div>

    </div>

    <label>Hiển thị</label>
    <select name="anhien">
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option>
    </select>

    <button
        type="submit"
        name="btnAdd"
        class="btn-submit">
        ➕ Thêm Danh Mục
    </button>

</form>

<a href="index.php?act=admin-news"
   class="back-link">
    ← Quay lại quản lý tin tức
</a>

</div>

</body>
</html>