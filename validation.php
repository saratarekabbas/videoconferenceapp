<!-- Validation for user login -->
<?php

session_start();

$con = mysqli_connect('localhost', '{Sara}', 'Sara@12345');
// mysqli_connect => Server name, username, password, db name

mysqli_select_db($con, 'dev_vca');

// Stores the name with the POST method from the registration form
$username = $_POST['username']; //getting "name:username" from index.html input
$pass = $_POST['password'];
$name = $_POST['name'];
$avatar = $_POST['avatar'];

// Query
$s = " select * from users where username = '$username' && password = '$pass'"; //this will match the username & password from the database
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result); //counts the number of rows and how many times this name appeared in the db table

if ($num == 1){
    $_SESSION['username'] = $username; // <= creating a session variable (imp). This session variable will be used/retrieved in home page
    $_SESSION['name'] = $name;
    $_SESSION['avatar'] = $avatar;
    header('location:home.php'); // if successful then redirect to home
}else{
    // Please try to display some error message here
    header('location:index.php'); //if not successful, then stay on the login page (index.php)
}
?>