<?php
include_once('connect.php');
 
class Category extends DbConnect{

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

    public function insertProd($catName, $catDesc)
    {
        if(empty($catName) or empty($catDesc)){
            return false;
        }else{
            $sql = "INSERT INTO category (catName, description) VALUES ('$catName', '$catDesc')";
            if(mysqli_query($this->connection,$sql)){
                return true;
            }else{
                die("Error : ".mysqli_error($this->connection));
            }
        }
    }

    public function delete($id){
        $sql = "DELETE FROM category WHERE catId = '$id'";
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