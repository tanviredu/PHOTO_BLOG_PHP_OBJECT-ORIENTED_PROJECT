<?php 
    require_once 'config.php';
    
    class User{
        
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        
        public function find_all(){
            global $database;
            $result_set = $database->query("SELECT * FROM users");
            return $result_set;
        }
        
        public function find_by_id($id=0){
            global $database;
            $result_set = $database->query("SELECT * FROM users WHERE id='$id'");
            $found = $database->fetch_array($result_set);
            return $found;
        }
        
        public function find_by_sql($sql=''){
            global $database;
            $result_set = $database->query($sql);
            $found = $database->fetch_array($result_set);
            return $found;
        }
        
        public function full_name(){
            if(isset($this->first_name) && isset($this->last_name)){
                return $this->first_name . " " .$this->last_name;
                
            }else{
                return "";
            }
        }
    }
?>