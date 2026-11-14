<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

if($_SESSION['idgroup'] < 2){
    die("Bạn không có quyền thêm tin tức!");
}

include 'cons.php';

if(isset($_POST['btnAdd'])){

    $idtheloai   = (int)$_POST['idtheloai'];
    $title       = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $keywords    = mysqli_real_escape_string($conn, $_POST['keywords']);
    $ten         = mysqli_real_escape_string($conn, $_POST['ten']);
    $tomtat      = mysqli_real_escape_string($conn, $_POST['tomtat']);
    $noidung     = mysqli_real_escape_string($conn, $_POST['noidung']);
    $noibat      = isset($_POST['noibat']) ? (int)$_POST['noibat'] : 0;
    $anhien      = isset($_POST['anhien']) ? (int)$_POST['anhien'] : 1;
    $lang        = mysqli_real_escape_string($conn, $_POST['lang']);
    $thutu       = (int)$_POST['thutu'];
    $songuoixem  = 0;
    $ngaycapnhat = date("Y-m-d H:i:s");

    $hinh = "";
}

    if(isset($_FILES['hinh']) && $_FILES['hinh']['name'] != ""){
        $fileName = time() . "_" . basename($_FILES['hinh']['name']);
        $tmpName  = $_FILES['hinh']['tmp_name'];
if(!is_dir("uploads/news")){
    mkdir("uploads/news",0777,true);
}

move_uploaded_file(
    $tmpName,
    "uploads/news/".$fileName
);

$hinh = "uploads/news/".$fileName;

    $sql = "INSERT INTO gh_sp_news
            (
                idtheloai,
                title,
                description,
                keywords,
                ten,
                ngaycapnhat,
                tomtat,
                noidung,
                hinh,
                songuoixem,
                noibat,
                anhien,
                lang,
                thutu
            )
            VALUES
            (
                '$idtheloai',
                '$title',
                '$description',
                '$keywords',
                '$ten',
                '$ngaycapnhat',
                '$tomtat',
                '$noidung',
                '$hinh',
                '$songuoixem',
                '$noibat',
                '$anhien',
                '$lang',
                '$thutu'
            )";

    getData($sql);

    header("location:index.php?act=admin-news");
    exit();
}

$sqlLoai = "SELECT * FROM gh_sp_theloai_news ORDER BY ten ASC";
$resultLoai = getData($sqlLoai);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Thêm tin tức</title>
<style>
body{
    font-family:Segoe UI,Arial,sans-serif;
    background:#222222;
    margin:0;
    padding:30px;
    color:#fff;
}

.box{
    max-width:900px;
    margin:auto;
    background:#111;
    border:1px solid #333;
    border-radius:16px;
    padding:30px;
    box-shadow:0 15px 35px rgba(0,0,0,.4);
}

h2{
    margin-top:0;
    color:#ff6b00;
    text-align:center;
    font-size:28px;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:8px;
    color:#ffb066;
    font-weight:600;
}

input,
select,
textarea{
    width:100%;
    padding:12px;
    background:#1a1a1a;
    border:1px solid #444;
    border-radius:8px;
    color:#fff;
    box-sizing:border-box;
    margin-bottom:18px;
    transition:.25s;
}

input:focus,
select:focus,
textarea:focus{
    outline:none;
    border-color:#ff6b00;
    box-shadow:0 0 10px rgba(255,107,0,.3);
}

textarea{
    resize:vertical;
}

input[type=file]{
    background:#111;
    padding:10px;
}

.row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
}

.btn-submit{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#ff6b00;
    color:#fff;
    font-size:16px;
    font-weight:700;
    cursor:pointer;
    transition:.25s;
}

.btn-submit:hover{
    background:#ff8533;
    transform:translateY(-2px);
}

.back-link{
    display:inline-block;
    margin-top:20px;
    text-decoration:none;
    color:#ff6b00;
    font-weight:600;
}

.back-link:hover{
    color:#fff;
}
</style>
</head>
<body>

<div class="box">
    <h2>Thêm tin tức</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Danh mục tin tức</label>
    <select name="idtheloai" required>

        <option value="">
            -- Chọn danh mục --
        </option>

        <?php while($loai = mysqli_fetch_assoc($resultLoai)){ ?>

            <option value="<?= $loai['id']; ?>">

                <?= htmlspecialchars($loai['ten']); ?>

            </option>

        <?php } ?>

    </select>

    <label>Tiêu đề tin tức</label>
    <input
        type="text"
        name="ten"
        required
    >

    <label>Tóm tắt ngắn</label>
    <textarea
        name="tomtat"
        rows="4"
        required
    ></textarea>

    <label>Nội dung đầy đủ</label>
    <textarea
        name="noidung"
        rows="10"
        required
    ></textarea>

    <div class="row">

        <div>
            <label>SEO Title</label>
            <input type="text" name="title">
        </div>

        <div>
            <label>SEO Keywords</label>
            <input type="text" name="keywords">
        </div>

    </div>

    <label>SEO Description</label>
    <textarea
        name="description"
        rows="3"
    ></textarea>

    <label>Ảnh đại diện</label>
    <input
        type="file"
        name="hinh"
    >

    <div class="row">

        <div>

            <label>Tin nổi bật</label>

            <select name="noibat">
                <option value="1">Có</option>
                <option value="0" selected>Không</option>
            </select>

        </div>

        <div>

            <label>Hiển thị</label>

            <select name="anhien">
                <option value="1" selected>Hiện</option>
                <option value="0">Ẩn</option>
            </select>

        </div>

    </div>

    <div class="row">

        <div>

            <label>Ngôn ngữ</label>

            <input
                type="text"
                name="lang"
                value="1"
            >

        </div>

        <div>

            <label>Thứ tự</label>

            <input
                type="number"
                name="thutu"
                value="0"
            >

        </div>

    </div>

    <button
        type="submit"
        name="btnAdd"
        class="btn-submit"
    >
        📰 Đăng tin tức
    </button>

</form>
    <a href="index.php?act=admin-news" class="back-link">← Quay lại</a>
</div>

</body>
</html>