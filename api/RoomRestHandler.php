<?php
require_once("SimpleRest.php");
require_once("Room.php");

class RoomRestHandler extends SimpleRest {

	function getAllRoom() {

		$room = new Room();
		$rawData = $room->getAllRoom();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No rooms were found, the db is empty!');
		} else {
			$statusCode = 200;
		}

        // Select format type JSON or XML
        $requestContentType='application/json';

		$this->setHttpHeaders($requestContentType, $statusCode);

		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}

	public function getRoom($id) {
		$room = new Room();
		$rawData = $room->getRoom($id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No room was found!');
		} else {
			$statusCode = 200;
		}

        // Select format type JSON, HTML or XML
        $requestContentType='application/json';


		$this ->setHttpHeaders($requestContentType, $statusCode);

		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}

	function createRoom() {
        $room = new Room();
		$rawData = $room->createRoom();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'Failed to create room!');
		} else {
			$statusCode = 200;
		}

        // Select format type JSON or XML
        $requestContentType='application/json';

		$this->setHttpHeaders($requestContentType, $statusCode);

		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}

	function updateRoom() {
        $room = new Room();
		$rawData = $room->updateRoom();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'Fail to Update Room!');
		} else {
			$statusCode = 200;
		}

        // Select format type JSON or XML
        $requestContentType='application/json';

		$this->setHttpHeaders($requestContentType, $statusCode);

		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}

	function deleteRoom() {
        $room = new Room();
		$rawData = $room->deleteRoom();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'Failed to Delete Room!');
		} else {
			$statusCode = 200;
		}

        // Select format type JSON or XML
        $requestContentType='application/json';

		$this->setHttpHeaders($requestContentType, $statusCode);

		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}

    // THISSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    // THISSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
	public function encodeHtml($responseData) {

		$htmlResponse = "<table border='1'>";
		foreach($responseData as $key=>$value) {
    			$htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
		}
		$htmlResponse .= "</table>";
		return $htmlResponse;
	}
    // THISSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    // THISSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;
	}

	public function encodeXml($responseData) {

		// creating object of SimpleXMLElement

		 $xml = new SimpleXMLElement('<?xml version="1.0"?><room> </room>');


		  foreach($responseData as $key=>$value) {
		     $xml->addChild('key', $key);
		 	 $xml->addChild('value', $value);

		  }


         return $xml->asXML();
	}
}
?>
