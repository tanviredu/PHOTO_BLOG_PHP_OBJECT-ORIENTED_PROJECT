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
 *
 * we instantiating using a loop and before we check the attributes

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
            // now it automatically return object array
        }

        public static function find_by_id($id=0){
            global $database;
            //$result_set = $database->query("SELECT * FROM users WHERE id='$id'");

              $result_array = self::find_by_sql("SELECT * FROM users WHERE id='$id' LIMIT 1");
            /**$found = $database->fetch_array($result_set);
                *return $found;
             * WE CANT USE IT NOW CAUSE ITS RETURING OBJECT ARRAY NOW
             * */
             return !empty($result_array) ? array_shift($result_array) : false;

            // it means if it is not empty fetch the first element and if empty send false

        }

        public static function find_by_sql($sql=""){

            /**
             * we fetch data from the sql with query
             * then we declare an empty object array
             * then we iterate through the result_set and every row
             * is a record of the user object means every row of this result_set
             * has all the attribute info so we instantiate the object with every row
             * and then store this ionstantiated object in object array
             * */




            global $database;
            $result_set = $database->query($sql);
            $object_array = array();
            while($row = $database->fetch_array($result_set)){
                $object_array[] = self::instantiate($row);
            }

            //return $result_set;
            return $object_array;
        }

        public function full_name(){
            if(isset($this->first_name) && isset($this->last_name)){
                return $this->first_name . " " .$this->last_name;
            }else{
                return "";
            }
        }


        private function has_attribute($attribute){
            // first find all the attribute and store it
            $object_vars = get_object_vars($this); //this instant
            return array_key_exists($attribute,$object_vars);
        }

        private static function  instantiate($record){
           $object = new self;
            /**
             * BASIC WAY OF INSTANTIATE THE OBJECT
            $object->id = $record['id'];
            $object->username = $record['username'];
            $object->password = $record['password'];
            $object->first_name = $record['first_name'];
            $object->last_name = $record['last_name'];
            return $object;


            // this is more dynamic approach
            //check weather the object has a attribute
            // and if it is then add the value of that
            // attribute
            // iterte through a dictionary
             **/
            foreach($record as $attribute=> $value){
                if($object->has_attribute($attribute)){
                    $object->$attribute=$value;
                }
            }


            return $object;
        }

    }

$user = new User();

?>