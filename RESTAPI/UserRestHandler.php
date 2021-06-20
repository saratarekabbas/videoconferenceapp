<!-- Handler -->
<!-- The idea of the handler is to encode the raw data of JSON (or whatever the request content type is: XML/HTML) -->

<?php
require_once("RESTAPI/SimpleRest.php");
require_once("RESTAPI/User.php");

class UserRestHandler extends SimpleRest {
    //HTML ENCODE
    public function encodeHtml($responseData) {

		$htmlResponse = "<table border='1'>";
		foreach($responseData as $key=>$value) {
    			$htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
		}
		$htmlResponse .= "</table>";
		return $htmlResponse;
	}

    //JSON ENCODE
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;
	}

    //XML ENCODE
	public function encodeXml($responseData) {

		// creating object of SimpleXMLElement
		 $xml = new SimpleXMLElement('<?xml version="1.0"?><user> </user>');
		  foreach($responseData as $key=>$value) {
		     $xml->addChild('key', $key);
		 	 $xml->addChild('value', $value);
		  }
         return $xml->asXML();
	}

    // --------------------------

    // A function to get all users
    function getAllUsers(){

        $user = new User();
        $rawData = $user->getAllUser(); //get all user is retrieved from User.php

        if(empty($rawData)){ //empty db
            $statusCode = 404;
            $rawData = array('error' => 'No users found!');
        }else{
            $statusCode = 200; //OK
        }

        // Select the format type (JSON, XML or HTML)  & DECODING
        $requestContentType='application/json';

        $this ->setHttpHeaders($requestContentType, $statusCode); //HTTP REQUEST

        if(strpos($requestContentType, 'application/json') !== false){ //strpos() function finds the position of the first occurrence of a string inside another string.
            $response = $this->encodeJson($rawData);
            echo $response;
        } else if(strpos($requestContentType, 'text/html') !== false){
            $response = $this->encodeHtml($rawData);
			echo $response;
        }else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
    }

    // Function to get user via id
    public function getUser($id){
        $user = new User(); //from class User
        $rawData = $user->getUser($id);

        if(empty($rawData)){
            $statusCode = 404;
            $rawData = array('error' => 'No users found!');
            } else{
                $statusCode = 200;
            }

            // select the format type (JSON, HTML or XML)
            $requestContentType = 'application/json';

            $this ->setHttpHeaders($requestContentType, $statusCode); //ex: Header: JSON, 200

            if(strpos($requestContentType, 'application/json') !== false){ //strpos() function finds the position of the first occurrence of a string inside another string.
                $response = $this->encodeJson($rawData);
                echo $response;
            } else if(strpos($requestContentType, 'text/html') !== false){
                $response = $this->encodeHtml($rawData);
                echo $response;
            }else if(strpos($requestContentType,'application/xml') !== false){
                $response = $this->encodeXml($rawData);
                echo $response;
            }
    }
}

?>