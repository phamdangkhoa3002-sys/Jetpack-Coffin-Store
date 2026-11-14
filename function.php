<?php
    function addRecord($cons, $table, $field, $value)
    {
        $sql = "INSERT INTO $table ($field)
                VALUES ($value)";

        return mysqli_query($cons, $sql);
    }

    function updateRecord($cons,$table,$field,$condition) {

       echo  $sql = "UPDATE $table
                SET $field WHERE $condition";

        return mysqli_query($cons, $sql);

    }

    function deleteRecord($cons,$table,$condition){

        $sql = "DELETE FROM $table
                WHERE $condition";

        return mysqli_query($cons, $sql);

    }

    // lấy nhiều bản ghi

    function getRecords($cons,$fieldGet,$table,$condition = "",$order = ""){

        $sql = "SELECT $fieldGet FROM $table";

        if($condition != ""){
            $sql .= " WHERE $condition";
        }
 
        if($order != ""){
            $sql .= " ORDER BY $order";
        }

        return mysqli_query($cons, $sql);

    }

    // lấy 1 bản ghi
function getOneRecord($conn,$id,$table,$fieldGet="*"){

    $sql = "SELECT $fieldGet
            FROM $table
            WHERE id = $id
            LIMIT 1";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function showProductImage($row){

    if(
        !empty($row['hinh1']) &&
        file_exists($row['hinh1'])
    ){
        echo '<img src="'.$row['hinh1'].'" alt="'.$row['ten'].'">';
    }
    else{
        echo '<img src="imgs/no-image.jpg" alt="No Image">';
    }
}
?>

