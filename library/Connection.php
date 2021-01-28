<?php
	class Connection{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $db = DB_NAME;

		public $link;
		public $error;

		public function __construct(){
			$this->connectDB();
		}

		private function connectDB(){
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->db);
			if(!$this->link){
				$this->error = "Connection Failed".$this->link->connect_error;
				return false;
			}
		}

		// Select data from database
		public function select($sql){
			$result = $this->link->query($sql) or die($this->link->error.__LINE__);
			if($result->num_rows > 0){
				return $result;
			}
			else{
				return false;
			}
		}
	}
?>