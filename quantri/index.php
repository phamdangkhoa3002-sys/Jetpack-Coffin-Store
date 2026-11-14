<?php
    //ket noi
    require("cons.php");

    //ham thu vien
    require("function.php");


    // ví dụ minh họa hàm:


    //them

    $result = addRecord(
        $cons,
        "users",
        "ten, hinh, username, password, dienthoai, email, nickyahoo, nickskype, ngaydangky, xem, ngayvaocuoi, idgroup, listquanly, khoa, randomkey",
        "'huyteo', '', 'huyteo2003', '123', '0123456789', 'huy@gmail.com', '', '', '', 1, '', 1, 0, 1, ''"
    );

    if($result){
        echo "Thêm dữ liệu thành công";
    }else{
        echo "Lỗi thêm dữ liệu";
    }

    // sua

    $result = updateRecord($cons,
    "users","ten='huyteo',hinh='',username='huyteo2003',
    password='123456',dienthoai='0988888888',email='huy@gmail.com',nickyahoo='',nickskype='',
    ngaydangky='2026-05-14',xem=1,
    ngayvaocuoi='2026-05-14',idgroup=1,listquanly=0,khoa=1,randomkey=''","id = 10");

    if($result){
        echo "Sửa dữ liệu thành công";
    }else{
        echo "Lỗi thêm dữ liệu";
    }

    //Xóa

    $result = deleteRecord($cons,"users","id = 10");

    if($result){
        echo "Xóa thành công";
    }else{
        echo "Xóa thất bại";
    }


    


    $result = getRecords($cons,"*","users");

    while($row = mysqli_fetch_assoc($result)){

        echo $row['username']."<br>";

    }


?>