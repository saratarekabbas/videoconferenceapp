<?php

session_start();
header('location:index.php'); //redirect the user back to the login page (index.php)

// mysqli_connect => Server name, username, password, db name
$con = mysqli_connect('localhost', '{Sara}', 'Sara@12345');

//selecting the database we want to use
mysqli_select_db($con, 'dev_vca');

// Stores the name with the POST method from the registration form
$username = $_POST['username']; //stores the "name: username" from the form
$name = $_POST['name']; //stores the "name: name" from the form
$pass = $_POST['password']; //stores the "name: password" from the form
// $avatar = $_POST['avatar'];

// Query
$s = " select * from users where username = '$username'";
$result = mysqli_query($con, $s); //a result variable to store this query
$num = mysqli_num_rows($result); //counts the number of rows and how many times this name appeared in the db table

if ($num == 1){
    echo"Sorry, this username is already taken.";
}else{
    $reg = "insert into users(username, name, password) values ('$username', '$name','$pass')";
    mysqli_query($con, $reg);
    echo "You have been registered successfully.";
}
?>