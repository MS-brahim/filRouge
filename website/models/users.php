<?php
include_once('connect.php');
 
class User extends DbConnect{

    public function __construct(){

        parent::__construct();
    }

    public function register($username, $password,$email){
        
        if(empty($username) or empty($email) or empty($password)){
            return false;
        }else{
            
            $sql3 = mysqli_query($this->connection,"SELECT email 
                                                    FROM users 
                                                    WHERE email='$email'");

            if(mysqli_num_rows($sql3)>0){
                header ("location: ../views/register.php");
                exit;
            }else{

                $sql2 = "INSERT INTO users (username, password, email) 
                        VALUES ('$username', '$password', '$email')";

                if(mysqli_query($this->connection,$sql2)){
                    return true;
                }else{
                    die("Error : ".mysqli_error($this->connection));
                }
            } 
        }          
    }

    
    public function check_login($username, $password){
        $sql = "SELECT * FROM users 
                WHERE username = '$username' 
                AND password = '$password'";

        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
    
    public function details($sql){

        $query = $this->connection->query($sql);
        
        $row = $query->fetch_array();
            
        return $row;       
    }
    

    public function santString($value){
        $str = trim($value);
        $str = filter_var($str,FILTER_SANITIZE_STRING);
        return $str;
    }
}