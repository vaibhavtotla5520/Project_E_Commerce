<?php
class Database {
	protected $hostname = 'localhost';
	protected $username = 'root';
	protected $password = '';
	protected $database = 'e_commerce';
	
	protected function conn() {
		$conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
		if ($conn->connect_error) {
			return false;
		}
		return $conn;
	}
}