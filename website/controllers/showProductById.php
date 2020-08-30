<?php 
include_once '../models/prod-class.php';

$prodId = new Product();

$id = $_GET['id'];
$prodById = mysqli_fetch_assoc($prodId->getProdId($id));

?>