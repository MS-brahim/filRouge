<?php
session_start();
include "../models/cat-class.php";

$catObj = new Category();
if (isset($_GET['D_ID'])) {
    $id = $_GET['D_ID'];
    $res = $catObj->delete($id);
    if($res){
        header('location: ../views/add-categ.php');
    }else{
        echo "Failed to Delete Record";
    }
}
?>