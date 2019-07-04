<?php
	require_once('config.php');

	class MysqlDatabase{
		private $connection;

		function __construct(){
			$this->open_connection();
		}
		public function open_connection(){
			$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if(!$this->connection){
				die("Database connection failed");
			}
		}

		public function close_connection(){
			if(isset($connection)){
				mysqli_close($connection);
				unset($connection);
			}
		}

		public function confirm_query($result){
			
		}

		public function query($sql){
			//query takes the connect variable  
			$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			$result = mysqli_query($sql,$this->connection);
			return result;
		}

	}

	//crerating object

	$databse = new MysqlDatabase();
	$database->close_connection();
?>