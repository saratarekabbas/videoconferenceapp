<?php

session_start();
header('location:registration.php');

$con = mysqli_connect('143.138.209.123', '{Sara}', 'Sara@12345');
// mysqli_connect => Server name, username, password, db name
// $con = mysqli_connect('143.138.209.123', '{Sara}', 'Sara@12345');

mysqli_select_db($con, 'dev_vca');

// Stores the name with the POST method from the registration form
$name = $_POST['user'];
$pass = $_POST['password'];

// Query
$s = " select * from users where name = '$name'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result); //counts the number of rows and how many times this name appeared in the db table

if ($num == 1){
    echo"Sorry, this Username is already taken.";
}else{
    $reg = "insert into users(name, password) values ('$name', '$pass')";
    mysqli_query($con, $reg);
    echo "You have been registered successfully.";
}
?>