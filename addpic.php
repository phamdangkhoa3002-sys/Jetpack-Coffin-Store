<?php

if(isset($_POST['btnUpload'])){

    $fileName = $_FILES['hinh']['name'];

    $tmpName = $_FILES['hinh']['tmp_name'];

    $path = "uploads/sanpham/" . time() . $fileName;

    move_uploaded_file($tmpName, $path);

    echo "Upload thành công!";

    echo "<br><br>";

    echo "<img src='$path' width='200'>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload hình</title>
</head>
<body>

<h2>Upload hình sản phẩm</h2>

<form method="POST"
      enctype="multipart/form-data">

    <input type="file"
           name="hinh"
           required>

    <br><br>

    <input type="submit"
           name="btnUpload"
           value="Upload">

</form>

</body>
</html>