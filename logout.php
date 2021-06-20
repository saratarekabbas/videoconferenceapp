<?php
session_start();
session_destroy(); //to terminate the session

header('location:index.php'); //redirects the user to the index/login page after destroying session

?>