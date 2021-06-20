<!-- Validation for user login -->
<?php

session_start();

$con = mysqli_connect('localhost', '{Sara}', 'Sara@12345');
// mysqli_connect => Server name, username, password, db name

mysqli_select_db($con, 'dev_vca');

// Stores the name with the POST method from the registration form
$name = $_POST['user'];
$pass = $_POST['password'];

// Query
$s = " select * from users where name = '$name' && password = '$pass'"; //this will match the username & password from the database
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result); //counts the number of rows and how many times this name appeared in the db table

if ($num == 1){
    $_SESSION['username'] = $name; // <= creating a session variable (imp). This session variable will be used/retrieved in home page
    header('location:home.php'); // if successful then redirect to home
}else{
    header('location:index.php'); //if not successful, then stay on the login page (index.php)
}
?>