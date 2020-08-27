<?php
session_start();
include "../models/prod-class.php";

$prodObj = new Product();

if (isset($_POST['update'])) {
    $id = $_POST['prodId'];
    $prodN   = $prodObj->santString($_POST['prName']);
    $prodD   = $prodObj->santString($_POST['prDescription']);
    $prodP   = $prodObj->santString($_POST['prPrice']);
    $prodCat = $prodObj->santString($_POST['prCateg']);
    $prodImg = $prodObj->santString($_POST['prImage']);

    if($this->updateProd($id, $prodN, $prodD, $prodP, $prodCat, $prodImg)){
        header('location: ../views/produits.php');
    }else{
        echo "Failed to Delete Record";
    }
}
?>