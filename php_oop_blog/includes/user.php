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
        public static function instantiate($record){
            //automatically instantiate this propertise
            // create an object
            $object = new self;
            $object->id = $record['id'];
            $object->username = $record['username'];
            $object->password = $record['password'];
            $object->first_name = $record['first_name'];
            $object->last_name = $record['last_name'];
            return $object;
            
            
        }
        
        public function has_attribute($attribute){
            // find if the attribute exists in the object
            //object_vars-> find the attributes from the class
            //return array and 
            // with array_ke_exists we find if attributes exists
            $object_vars = get_object_vars($this);
            return array_key_exists($attribute, $object_vars);
            
        }
    }
?>