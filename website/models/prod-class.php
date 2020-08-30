<?php
include_once('connect.php');
 
class Product extends DbConnect{

    public function __construct(){

        parent::__construct();
    }

    public function selectProd($table)
    {
        $sql = "SELECT * FROM ".$table;
        $array = array();
        $query = mysqli_query($this->connection,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    public function selectProd3()
    {
        $sql = "SELECT * FROM products LIMIT 3";
        $array = array();
        $query = mysqli_query($this->connection,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    public function selectProd4()
    {
        $sql = "SELECT * FROM products LIMIT 4";
        $array = array();
        $query = mysqli_query($this->connection,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function showProductById($id)
    {
        $sql = "SELECT * FROM products WHERE prodId = '$id'";
        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            echo $row['prodI'];
        }
    }

    public function insertProd($prodN, $prodD, $prodP, $prodOp, $prodCat, $prodImg, $prodImg1, $prodImg2, $prodImg3)
    {
        if(empty($prodN) or empty($prodD) or empty($prodP) or empty($prodOp) or empty($prodImg)){
            return false;
        }else{
            $sql = "INSERT INTO products (prodName, description, price, oldP, catId, image, image1, image2, image3) VALUES ('$prodN', '$prodD', '$prodP', '$prodOp','$prodCat', '$prodImg', '$prodImg1', '$prodImg2', '$prodImg3')";
            if(mysqli_query($this->connection,$sql)){
                return true;
            }else{
                die("Error : ".mysqli_error($this->connection));
            }
        }
    }

    public function getProdId($id)
    {
        $sql = "SELECT * FROM products WHERE prodId = '$id'";
        $data = mysqli_query($this->connection,$sql);
        return $data;
    }

    public function update()
    {
        # code...
    }
    
    public function updateProd($id, $prodN, $prodD, $prodP, $prodCat, $prodImg)
    {
        $sql ="UPDATE products set prodName='$prodN', description='$prodD', price='$prodP', catId='$prodCat', image='$prodImg' WHERE prodId='$id'";
        $resault = mysqli_query($this->connection,$sql);
        if($resault){
            return true;
        }else{
            return false;
        }
    }
  
    public function delete($id){
        $sql = "DELETE FROM products WHERE prodId = '$id'";
        $res = mysqli_query($this->connection, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function santString($value){
        $str = trim($value);
        $str = filter_var($str,FILTER_SANITIZE_STRING);
        return $str;
    }

}
?>