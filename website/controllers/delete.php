<?php
session_start();
include "../models/prod-class.php";

$prodObj = new Product();
if (isset($_GET['D_ID'])) {
    $id = $_GET['D_ID'];
    $res = $prodObj->delete($id);
    if($res){
        header('location: ../views/produits.php');
    }else{
        echo "Failed to Delete Record";
    }
}
?>