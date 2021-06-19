<?php
session_start();
session_destroy();

header('location:registration.php'); //redirects the user to the registration/login page after destroying session

?>