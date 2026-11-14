<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

if($_SESSION['idgroup'] < 2){
    die("Bạn không có quyền sửa tin tức!");
}

include 'cons.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM gh_sp_news WHERE id = $id";
$result = getData($sql);
$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Tin tức không tồn tại!");
}

if(isset($_POST['btnUpdate'])){

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
    $songuoixem  = (int)$row['songuoixem'];
    $ngaycapnhat = date("Y-m-d H:i:s");

    $hinh = $row['hinh'];

if(
    isset($_FILES['hinh'])
    &&
    $_FILES['hinh']['error'] == 0
){

    if(!is_dir("uploads/news")){
        mkdir("uploads/news",0777,true);
    }

    $fileName =
        time() . "_" .
        basename($_FILES['hinh']['name']);

    $target =
        "uploads/news/" .
        $fileName;

    if(
        move_uploaded_file(
            $_FILES['hinh']['tmp_name'],
            $target
        )
    ){

        if(
            !empty($row['hinh'])
            &&
            file_exists($row['hinh'])
        ){
            unlink($row['hinh']);
        }

        $hinh = $target;
    }
}

    $sqlUpdate = "UPDATE gh_sp_news SET
                    idtheloai = '$idtheloai',
                    title = '$title',
                    description = '$description',
                    keywords = '$keywords',
                    ten = '$ten',
                    ngaycapnhat = '$ngaycapnhat',
                    tomtat = '$tomtat',
                    noidung = '$noidung',
                    hinh = '$hinh',
                    songuoixem = '$songuoixem',
                    noibat = '$noibat',
                    anhien = '$anhien',
                    lang = '$lang',
                    thutu = '$thutu'
                  WHERE id = $id";

    getData($sqlUpdate);

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
<title>Sửa tin tức</title>
<style>
body{
    margin:0;
    padding:30px;
    background:#222222;
    font-family:Arial, sans-serif;
    color:#fff;
}

.box{
  max-width:1000px;
    width:95%;
        margin:auto;
    background:#111111;
    padding:30px;
    border-radius:15px;
    border:2px solid #ff6b00;
    box-shadow:0 0 20px rgba(255,107,0,.3);
}

input[type=file]{
    padding:10px;
    background:#222;
    border:1px dashed #ff6b00;
}

h2{
    text-align:center;
    color:#ff6b00;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:5px;
    color:#ffb366;
    font-weight:bold;
}

input,
select,
textarea{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    background:#1c1c1c;
    border:1px solid #333;
    color:#fff;
    border-radius:8px;
    box-sizing:border-box;
}

input:focus,
textarea:focus,
select:focus{
    border-color:#ff6b00;
    outline:none;
    box-shadow:0 0 8px rgba(255,107,0,.4);
}

textarea{
    resize:vertical;
    min-height:120px;
}


.preview{
    text-align:center;
    margin:15px 0;
}

.preview img{
    max-width:250px;
    border-radius:10px;
    border:2px solid #ff6b00;
}



.action-bar{
    display:flex;
    gap:15px;
    margin-top:30px;
    border-top:1px solid #333;
    padding-top:20px;
    }

.btn-save,
.btn-back,
.btn-delete{
    flex:1;

    text-align:center;

    padding:15px;

    border:none;

    border-radius:10px;

    text-decoration:none;

    font-weight:bold;

    cursor:pointer;

        transform:translateY(0);
    transition:.3s;
}

.btn-save{
    background:#ff6b00;
    color:white;
}

.btn-save:hover{
    background:#ff8533;
}



.btn-save:hover,
.btn-back:hover,
.btn-delete:hover{
    transform:translateY(-2px);
}
.btn-back{
    background:#333;
    color:white;
}

.btn-back:hover{
    background:#444;
}

.btn-delete{
    background:#dc3545;
    color:white;
}

.btn-delete:hover{
    background:#ff4d5f;
}

.back-link{
    display:block;
    text-align:center;
    margin-top:20px;
    color:#ff6b00;
    text-decoration:none;
}

.back-link:hover{
    color:white;
}

.section-title{
    margin:25px 0 15px;
    padding-bottom:10px;

    color:#ff6b00;

    border-bottom:1px solid #333;

    font-size:20px;
}

.current-image-card{
    background:#1a1a1a;
    border:1px solid #333;
    border-radius:12px;
    padding:20px;
    text-align:center;
    margin-bottom:20px;
}

.preview-image{
    max-width:280px;
    border-radius:10px;
    border:2px solid #ff6b00;
}

.no-image{
    color:#999;
    padding:40px;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.full-width{
    grid-column:1 / -1;
}

.page-header{
    text-align:center;
    margin-bottom:30px;
}

.page-header p{
    color:#999;
    margin-top:8px;
}
</style>
</head>
<body>

<div class="box">
<div class="page-header">

    <h2>📰 Chỉnh Sửa Tin Tức</h2>

    <p>
        ID Tin: <?= $row['id']; ?>
        •
        Cập nhật lần cuối:
        <?= date('d/m/Y H:i', strtotime($row['ngaycapnhat'])); ?>
    </p>

</div>
<form method="POST" enctype="multipart/form-data">

<div class="form-grid">
<div class="full-width">
    <h3 class="section-title">
        📰 Thông Tin Tin Tức
    </h3>
</div>

<label>Danh mục tin tức</label>

<select name="idtheloai" required>

<?php while($loai = mysqli_fetch_assoc($resultLoai)){ ?>

<option
    value="<?= $loai['id']; ?>"
    <?= ($row['idtheloai']==$loai['id']) ? 'selected' : ''; ?>
>
    <?= htmlspecialchars($loai['ten']); ?>
</option>

<?php } ?>

</select>

<label>Tiêu đề bài viết</label>

<input
    type="text"
    name="ten"
    value="<?= htmlspecialchars($row['ten']); ?>"
    required
>
<label>Tóm tắt</label>

<textarea
  
    name="tomtat"
    rows="15"
    required

><?= htmlspecialchars($row['tomtat']); ?></textarea>
<label>Nội dung chi tiết</label>

<textarea
    name="noidung"
    rows="15"
    required
><?= htmlspecialchars($row['noidung']); ?></textarea>

<div class="full-width">
    <h3 class="section-title">
        🔍 SEO
    </h3>
</div>

<label>SEO Title</label>

<input
    type="text"
    name="title"
    value="<?= htmlspecialchars($row['title']); ?>"
>

<label>SEO Description</label>

<textarea
    name="description"
    rows="3"
><?= htmlspecialchars($row['description']); ?></textarea>

<label>SEO Keywords</label>

<input
    type="text"
    name="keywords"
    value="<?= htmlspecialchars($row['keywords']); ?>"
>

<div class="full-width">
    <h3 class="section-title">
        🖼 Hình Ảnh
    </h3>
</div>

<label>Chọn hình mới</label>

<div class="current-image-card">

    <h4>Ảnh hiện tại</h4>

    <?php if($row['hinh'] != "" && file_exists($row['hinh'])){ ?>

        <img
            src="<?= $row['hinh']; ?>"
            class="preview-image"
        >

    <?php }else{ ?>

        <div class="no-image">
            Chưa có hình ảnh
        </div>

    <?php } ?>

    <input
    type="file"
    name="hinh"
>
</div>





<div class="full-width">
    <h3 class="section-title">
        ⚙ Cài Đặt
    </h3>
</div>
<label>Tin nổi bật</label>

<select name="noibat">
    <option value="1" <?= $row['noibat']==1 ? 'selected':''; ?>>
        Có
    </option>

    <option value="0" <?= $row['noibat']==0 ? 'selected':''; ?>>
        Không
    </option>
</select>

<label>Trạng thái</label>

<select name="anhien">
    <option value="1" <?= $row['anhien']==1 ? 'selected':''; ?>>
        Hiện
    </option>

    <option value="0" <?= $row['anhien']==0 ? 'selected':''; ?>>
        Ẩn
    </option>
</select>

<label>Ngôn ngữ</label>

<input
    type="number"
    name="lang"
    value="<?= $row['lang']; ?>"
>

<label>Thứ tự hiển thị</label>

<input
    type="number"
    name="thutu"
    value="<?= $row['thutu']; ?>"
>

</div>

<div class="action-bar">

    <button
        type="submit"
        name="btnUpdate"
        class="btn-save"
    >
        💾 Lưu Thay Đổi
    </button>

    <a
        href="index.php?act=admin-news"
        class="btn-back"
    >
        ← Quay Lại
    </a>

    <?php if($_SESSION['idgroup'] == 3){ ?>

    <a
        href="deletenews.php?id=<?= $row['id']; ?>"
        class="btn-delete"
        onclick="return confirm('Xóa tin tức này?')"
    >
        🗑 Xóa Tin
    </a>

    <?php } ?>

</div>

</form>
</body>
</html>