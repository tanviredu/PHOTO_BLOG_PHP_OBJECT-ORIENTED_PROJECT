<?php
    require_once('config.php');

    class MySqlDatabse{
        private $connection;

        function __construct(){
            $this->open_connection();

        }

        public function open_connection(){
            $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            if(!$this->connection){
                die("Connection failed");
            }
        }

        public function close_connection(){
            //closing connection
            if(isset($this->connection)){
                mysqli_close($this->connection);
                unset($this->connection);
            }

        }


        public function confirm_query($result){
            if(!result){
                die("Database query failed");
            }
        }

        public function query($sql){
            $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            $result = mysqli_query($sql,$$this->connection);
            $this->confirm_query($result);
            return $result;
        }

        public function mysql_prep($value){
            // functionality will be added later;
            return $value;
        }





    }

$databse = new MySqlDatabse();
$databse->close_connection();

?>