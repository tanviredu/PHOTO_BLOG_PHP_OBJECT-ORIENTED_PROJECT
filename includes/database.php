<?php
    require_once(LIB_PATH.DS.'config.php');

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
            if(!$result){
                die("Database query failed");
            }
        }

        public function query($sql){
            $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            $result = mysqli_query($this->connection,$sql);
            $this->confirm_query($result);
            return $result;
        }

        public function mysql_prep($value){
            // functionality will be added later;
            return $value;
        }

        public function fetch_array($result_set){
            return mysqli_fetch_array($result_set);
        }


        public function num_rows($result_set){
            // finding  how many rows in  result set
            return mysqli_num_rows($result_set);

            }

        public function insert_id(){
            // fetch the last id of the databse
            return mysqli_insert_id($this->connection);
        }

        public function affected_row(){
            return mysql_affected_rows($this->connection);

        }




    }

$database = new MySqlDatabse();
//$databse->close_connection();

?>