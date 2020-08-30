<?php
session_start();
include "../models/prod-class.php";

$prodObj = new Product();
if (isset($_POST['addItem'])) {
    
    $prodN   = $prodObj->santString($_POST['prName']);
    $prodD   = $_POST['prDescription'];
    $prodP   = $prodObj->santString($_POST['prPrice']);
    $prodOp   = $prodObj->santString($_POST['oldPrice']);
    $prodCat = $prodObj->santString($_POST['prCateg']);
    $prodImg = $prodObj->santString($_POST['prImage']);
    $prodImg1 = $prodObj->santString($_POST['prImage1']);
    $prodImg2 = $prodObj->santString($_POST['prImage2']);
    $prodImg3 = $prodObj->santString($_POST['prImage3']);

    $resault = $prodObj->insertProd($prodN, $prodD, $prodP, $prodOp, $prodCat, $prodImg, $prodImg1, $prodImg2, $prodImg3);

    if(!$resault){
        echo "Error";
    }else{
        header('location: ../views/produits.php');
    }
}
