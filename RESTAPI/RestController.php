<!-- Controller -->
<!-- Capability of API to request data without having access to the database -->

<?php
require_once("RESTAPI/UserRestHandler.php");

$view = "";
if(isset($_GET["view"])){
    $view = $_GET["view"];
}

/*
controls the RESTful services
URL mapping
*/

switch($view){

	case "all":

		// to handle REST Url /user/list/
         $userRestHandler = new UserRestHandler(); //create an obj of the handler
         $userRestHandler->getAllUsers(); //point to func getAllUsers()

		break;

	case "single":
		//to handle REST Url /user/show/<id>/
		$userRestHandler = new UserRestHandler();
		$userRestHandler->getUser($_GET["id"]); //point to func getUser($id) in UserRestHandler()
		break;

	case "" :
		//404 - not found;
		break;
}


?>