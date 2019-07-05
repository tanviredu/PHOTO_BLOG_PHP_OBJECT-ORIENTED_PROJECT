<?php
    require_once('config.php');

    class MySqlDatabse{
        private $connection;

        function __construct(){
            $this->open_connection();

        }

        public function open_connection(){
            $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if(!$connection){
                die("Connection failed");
            }
        }

        public function close_connection(){

        }
    }

$databse = new MySqlDatabse();

?>