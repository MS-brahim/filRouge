<?php 
session_start();
include "../models/cat-class.php";
$catObj = new Category();
if (isset($_POST['addItem'])) {
    $catName   = $catObj->santString($_POST['catname']);
    $catDesc   = $_POST['catdescip'];
                            
    $resault = $catObj->insertProd($catName, $catDesc);
    if(!$resault){
        echo "Error";
    }else{
        header('location:../views/add-categ.php');
    }
}
?>