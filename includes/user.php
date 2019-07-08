<?php
    require_once(LIB_PATH.DS.'database.php');



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
 * as long as you use fetch_array() you will get an array insted of user object
 * so have to change that
 *
 * now we make a instantiate method so we pass the data with sql and the User class
 * make a user object by instantiating all the method;
 *
 * we instantiating using a loop and before we check the attributes

 */

    class User extends DatabaseObject{

        /**
         * importing from parent class thats why we have to write the table name
         * it DatabaseObject will be imported multiple time by different claas
         */
        protected static $table_name = "users";
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;




        // these are are the unique classs
        public function full_name(){
            if(isset($this->first_name) && isset($this->last_name)){
                return $this->first_name . " " .$this->last_name;
            }else{
                return "";
            }
        }

        public static function authenticate($username='',$password=''){

            $result_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE username='$username' AND password='$password' LIMIT 1");
            /**$found = $database->fetch_array($result_set);
             *return $found;
             * WE CANT USE IT NOW CAUSE ITS RETURING OBJECT ARRAY NOW
             * */
            return !empty($result_array) ? array_shift($result_array) : false;


        }


    }

$user = new User();

?>