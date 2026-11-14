<?php
//Khai báo mạc định tại upload
$folderUpload="upload";


function uploadFile($file,$folderUpload){

    //Lấy tên file
    $fileName = $file['name'];

    //Đường dẫn upload
    $path = $folderUpload . "/" . $fileName;

    // Upload file
    if(move_uploaded_file(
        $file['tmp_name'],
        $path
    )){
        return $fileName;
    }

    return false;

}


// Kiểm tra submit
if(isset($_POST['btnUpload'])){

    $result = uploadFile($_FILES['hinh'],$folderUpload);

    if($result){

        echo "Upload thành công <br>";

        echo "Tên file: ".$result."<br>";

        echo "<img src='upload/$result' width='200'>";

    }else{

        echo "Upload thất bại";

    }

}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Upload File</title>
</head>

<body>

<h2>FORM UPLOAD FILE</h2>

<form
    action="#"
    method="POST"
    enctype="multipart/form-data"
>

    Chọn hình:
    <input type="file" name="hinh">

    <br><br>

    <input type="submit" name="btnUpload" value="Upload File">

</form>

</body>
</html>