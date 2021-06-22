<?php
require_once("RoomRestHandler.php");

$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/

switch($view){
	case "all":
         $RoomRestHandler = new RoomRestHandler();
         $RoomRestHandler->getAllRoom();
		break;
	case "single":
		$RoomRestHandler = new RoomRestHandler();
		$RoomRestHandler->getRoom($_GET["id"]);
		break;
	case "create":
		$RoomRestHandler = new RoomRestHandler();
		$RoomRestHandler->createRoom();
		break;
	case "update":
		$RoomRestHandler = new RoomRestHandler();
		$RoomRestHandler->updateRoom();
		break;
	case "delete":
		$RoomRestHandler = new RoomRestHandler();
		$RoomRestHandler->deleteRoom();
		break;
	case "" :
		//404 - not found;
		break;
}
?>
