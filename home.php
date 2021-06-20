<?php
session_start();
if(!isset($_SESSION['username'])){ //if the session variable is not set, then the location will be index.php
    header('location:index.php'); //so that we cannot enter the home page without the login after logging out.
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Style Sheets Sources -->
    <link rel="stylesheet" href="css/style.css">

    <title>Homepage</title>
</head>

<body>
    <!-- bootstrap container fluid -->
    <div class="container-fluid">


        <!-- Side Pannel -->
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <img id="profile-img" src="assets/users/Sara.png" alt="Avatar">
                <h2 id="user-name"> <?php echo $_SESSION['username']; ?></h2> <!-- The registration variable -->
                <hr>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Rooms</a></li>
                    <li> <a href="logout.php">Logout</a></li>
                </ul>
                <hr>

                <h4 id="room"> <b> Web Technology Room</b></h4>
                <!-- bootstrap Collapsible Panel -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">Active Users</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <!-- Bootstrap Collapsible List Group -->
                            <ul class="list-group">
                                <li class="list-group-item">Sara Tarek</li>
                                <li class="list-group-item">Afifah Afifah</li>
                                <li class="list-group-item">Syed Syed</li>
                                <li class="list-group-item">Amir Amir</li>
                                <li class="list-group-item">Sara Tarek</li>
                                <li class="list-group-item">Afifah Afifah</li>
                                <li class="list-group-item">Syed Syed</li>
                                <li class="list-group-item">Amir Amir</li>
                                <li class="list-group-item">Sara Tarek</li>
                                <li class="list-group-item">Afifah Afifah</li>
                                <li class="list-group-item">Syed Syed</li>
                                <li class="list-group-item">Amir Amir</li>
                                <li class="list-group-item">Sara Tarek</li>
                                <li class="list-group-item">Afifah Afifah</li>
                                <li class="list-group-item">Syed Syed</li>
                                <li class="list-group-item">Amir Amir</li>
                                <li class="list-group-item">Sara Tarek</li>
                                <li class="list-group-item">Afifah Afifah</li>
                                <li class="list-group-item">Syed Syed</li>
                                <li class="list-group-item">Amir Amir</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content Goes Here -->
            <div class="content">

            </div>

        </div>
    </div>

    <!-- Script Sources -->
    <script src="js/script.js"></script>
    <script src="js/ajax.js"></script>
    <script src="/web_rtc/sender/sender.js"></script>
    <script src="/web_rtc/receiver/receiver.js"></script>
</body>

</html>