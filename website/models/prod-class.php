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

    public function insertProd($prodN, $prodD, $prodP, $prodCat, $prodImg)
    {
        if(empty($prodN) or empty($prodD) or empty($prodP)){
            return false;
        }else{
            $sql = "INSERT INTO products (prodName, description, price, catId, image) VALUES ('$prodN', '$prodD', '$prodP', '$prodCat', '$prodImg')";
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