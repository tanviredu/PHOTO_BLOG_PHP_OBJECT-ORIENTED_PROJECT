<?php
    require_once('database.php');



/** class method vs instance method
 when you try to use any method you have to instantiate the class make and object
 * then you have to call the method thats why they call it instance method
 * but if the method is static then you dont need to instantiate and make an object to call the method
 * instantiate method:
 * -----------------
 * $user = new User();
 * $found_user = $user->find_by_id()

 * class method/static
 * --------------------
 * $found_user = User::find_by_id()
 *
 * we use the self static method find_by_sql()
 *
 * as long as you use fetch_array() you will get an array instted of user object
 * so have to change that
 *
 * now we make a instantiate method so we pass the data with sql and the User class
 * make a user object by instantiating all the method;

 */

    class User{

        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;


        public static function find_all(){
            global $database;
            //$result_set = $database->query("SELECT * FROM users");
            //return $result_set;
            return self::find_by_sql("SELECT * FROM users");
        }

        public static function find_by_id($id=0){
            global $database;
            //$result_set = $database->query("SELECT * FROM users WHERE id='$id'");

              $result_set = self::find_by_sql("SELECT * FROM users WHERE id='$id' LIMIT 1");
            $found = $database->fetch_array($result_set);
            return $found;
        }

        public static function find_by_sql($sql=""){
            global $database;
            $result_set = $database->query($sql);
            return $result_set;
        }

        public function full_name(){
            if(isset($this->first_name) && isset($this->last_name)){
                return $this->first_name . " " .$this->last_name;
            }else{
                return "";
            }
        }

    }

$user = new User();

?>