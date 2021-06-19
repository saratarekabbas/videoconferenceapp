<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php'); //so that we cannot enter the home page without the login after logging out.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
</body>
</html>