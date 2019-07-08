<?php
    require_once(LIB_PATH.DS.'database.php');

    class DatabaseObject{
        /**
         * @var $table_name is making avilable for every clalled class
         *
         */
        protected static $table_name;
        // these are the common class
        public static function find_all(){
            global $database;
            //$result_set = $database->query("SELECT * FROM users");
            //return $result_set;
            return self::find_by_sql("SELECT * FROM ".static::$table_name." ");
            // now it automatically return object array
        }

        public static function find_by_id($id){
            global $database;
            //$result_set = $database->query("SELECT * FROM users WHERE id='$id'");

            $result_array = self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id={$id} LIMIT 1");
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

        private function has_attribute($attribute){
            // first find all the attribute and store it
            $object_vars = get_object_vars($this); //this instant
            return array_key_exists($attribute,$object_vars);
        }

        private static function  instantiate($record){

            /**
             * because get_called_class() if anu other class extends this class
             *
             *this called class is intantiate
             *
             */
            $class_name = get_called_class();
            $object = new $class_name;
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

?>