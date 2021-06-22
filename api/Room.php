<?php
/*
A domain Class to demonstrate RESTful web services
*/  
Class Room {

	private $conn;

	public function __construct() {
		$servername = "localhost";
		$username = "{Sara}";
		$password = "Sara@12345";
		$dbname = "dev_vca";

		// Create connection
		$this->conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function getAllRooms(){

		$sql = "select * FROM room";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}

	public function getRoom($id){

		$sql = "select * FROM room WHERE id = ".$id."";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}

	public function createRoom(){
		$name = $_POST['name'];
		$description = $_POST['description'];

		$response = array();

		$sql = "insert into room (name, description)" .
		" values ('" . $name . "', '" . $description . "')";
        
		if (mysqli_query($this->conn, $sql)) {
			$response = [
				'status' => 'success',
				'message' => 'New record created successfully',
			];
		}

		return $response;
	}

	public function updateRoom() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        $response = array();
        
        $sql = "update banner set name = '" . $name . "', description = '" . $description . "'" .
        " where id = '" . $id . "'";

        if (mysqli_query($this->conn, $sql)) {
          $response = [
            'status' => 'success',
            'message' => 'Record updated successfully',
          ];
        }
		
        return $response;
	}
	
	public function deleteRoom() {
        $id = $_POST['id'];
        
        $response = array();
        
        $sql = "delete from room where id = '$id'";

        if (mysqli_query($this->conn, $sql)) {
          $response = [
            'status' => 'success',
            'message' => 'Record deleted successfully',
          ];
        }
        
        return $response;
	}
}
?>
