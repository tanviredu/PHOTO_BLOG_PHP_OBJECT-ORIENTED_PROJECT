<?php
require_once 'config.php';
/**
 * @author ornob
 *
 */
class MysqlDatabase
{
    
    private $connection;
    
    public function __construct(){
        $this->open_connection();
    }
    
    public function open_connection(){
        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(!$this->connection){
            die("connection Unsuccessful");
        }
    }
    
    public function close_connection(){
        if(isset($this->connection)){
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }
    
    public function confirm_query($result){
        // this will only used in the query function
        if(!$result){
            die("query failed");
        }
    }
    
    public function query($sql){
        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $result = mysqli_query($this->connection,$sql);
        $this->confirm_query($result);
        return $result;
    }
    
    public function fetch_array($result_set){
        return mysqli_fetch_array($result_set);
    }
    public function affected_row(){
        return mysqli_affected_row($this->connection);
    }

    
    
    
}

$database = new MysqlDatabase();