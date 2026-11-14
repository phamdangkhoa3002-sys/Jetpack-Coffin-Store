<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

if($_SESSION['idgroup'] < 2){
    die("Bạn không có quyền sửa!");
}

include 'cons.php';
include 'function.php';

$categories = getData("
    SELECT *
    FROM gh_sp_theloai
    WHERE anhien = 1
    ORDER BY ten ASC
");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM gh_sp_sp WHERE id = $id";
$result = getData($sql);
$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Sản phẩm không tồn tại!");
}

if(isset($_POST['btnUpdate'])){

$idtheloai = (int)$_POST['idtheloai'];

    $ten         = mysqli_real_escape_string($conn, $_POST['ten']);
    $title       = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $keywords    = mysqli_real_escape_string($conn, $_POST['keywords']);
    $tomtat      = mysqli_real_escape_string($conn, $_POST['tomtat']);
    $noidung     = mysqli_real_escape_string($conn, $_POST['noidung']);
    $price       = mysqli_real_escape_string($conn, $_POST['price']);
    $anhien      = mysqli_real_escape_string($conn, $_POST['anhien']);

    $path = $row['hinh1'];

    if(isset($_FILES['hinh1']) && $_FILES['hinh1']['name'] != ""){

        $fileName = $_FILES['hinh1']['name'];
        $tmpName  = $_FILES['hinh1']['tmp_name'];

        $path = "uploads/sanpham/" . time() . "_" . $fileName;

        move_uploaded_file($tmpName, $path);

        if($row['hinh1'] != "" && file_exists($row['hinh1'])){
            unlink($row['hinh1']);
        }
    }

 $sqlUpdate = "UPDATE gh_sp_sp SET
                idtheloai = '$idtheloai',
                ten = '$ten',
                title = '$title',
                description = '$description',
                keywords = '$keywords',
                tomtat = '$tomtat',
                noidung = '$noidung',
                price = '$price',
                hinh1 = '$path',
                anhien = '$anhien'
              WHERE id = $id";

    getData($sqlUpdate);

    header("location:index.php?act=admin-product");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <style>
     body{
    font-family:'Segoe UI',sans-serif;
    background:
    
        #222222;
    min-height:100vh;
    padding:30px;
}

      .box{

    max-width:900px;

    margin:auto;

    background:
    #000000;

    color:white;

    padding:35px;

    border-radius:25px;

    box-shadow:
    0 20px 50px rgba(0,0,0,.4);
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

     button{

    width:100%;

    padding:14px;

    border:none;

    border-radius:12px;

    background:
    linear-gradient(
        135deg,
        #ff6b00,
        #ff9800
    );

    color:white;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;
}

button:hover{

    transform:translateY(-2px);
}

        img{
            border-radius: 5px;
            margin-top: 10px;
            display: block;
        }

        .back-link{
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #ffa600;
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

 <h2>
⚰️ Chỉnh sửa sản phẩm JETPACK COFFIN
</h2>

    <form method="POST" enctype="multipart/form-data">
<label>Danh mục sản phẩm</label>

<select name="idtheloai" required>

<?php
while($cat = mysqli_fetch_assoc($categories)){
?>

<option
    value="<?= $cat['id']; ?>"
    <?= ($row['idtheloai'] == $cat['id']) ? 'selected' : ''; ?>
>
    <?= htmlspecialchars($cat['ten']); ?>
</option>

<?php
}
?>

</select>


        Tên sản phẩm:
        <input type="text" name="ten" value="<?= htmlspecialchars($row['ten']); ?>" required>

        Title:
        <input type="text" name="title" value="<?= htmlspecialchars($row['title']); ?>">

        Description:
        <textarea name="description" rows="3"><?= htmlspecialchars($row['description']); ?></textarea>

        Keywords:
        <input type="text" name="keywords" value="<?= htmlspecialchars($row['keywords']); ?>">

        Tóm tắt:
        <textarea name="tomtat" rows="5"><?= htmlspecialchars($row['tomtat']); ?></textarea>

        Nội dung:
        <textarea name="noidung" rows="10"><?= htmlspecialchars($row['noidung']); ?></textarea>

        Giá:
        <input type="number" name="price" value="<?= htmlspecialchars($row['price']); ?>" required>

        Ẩn hiện:
        <select name="anhien">
            <option value="1" <?= $row['anhien'] == 1 ? 'selected' : ''; ?>>Hiện</option>
            <option value="0" <?= $row['anhien'] == 0 ? 'selected' : ''; ?>>Ẩn</option>
        </select>

        Hình hiện tại:
        <br>

        <?php if($row['hinh1'] != "" && file_exists($row['hinh1'])){ ?>
            <img src="<?= $row['hinh1']; ?>" width="150">
        <?php }else{ ?>
            Không có hình
        <?php } ?>

        <br><br>

        Chọn hình mới:
        <input type="file" name="hinh1">

        <button type="submit" name="btnUpdate">
            Cập nhật
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