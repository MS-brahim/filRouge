<?php
session_start();
include "../models/prod-class.php";

$prodObj = new Product();
if (isset($_POST['addItem'])) {
    
    $prodN   = $prodObj->santString($_POST['prName']);
    $prodD   = $_POST['prDescription'];
    $prodP   = $prodObj->santString($_POST['prPrice']);
    $prodCat = $prodObj->santString($_POST['prCateg']);
    $prodImg = $prodObj->santString($_POST['prImage']);

    $resault = $prodObj->insertProd($prodN, $prodD, $prodP, $prodCat, $prodImg);

    if(!$resault){
        echo "Error";
    }else{
        header('location: ../views/produits.php');
    }
}
