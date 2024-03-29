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
                <img id="profile-img" src="assets/users/default.jpg" alt="Avatar"> <!-- This is hard-coded -->
                <h3 id="user-name">@<?php echo $_SESSION['username']; ?></h3> <!-- The registration variable -->
                <hr>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#" onclick="displayHome()">Home</a></li>
                    <li><a href="#" >Rooms</a></li>
                    <li><a href="#">Edit Profile</a></li>
                    <li> <a id="logout-btn" href="">Logout</a></li>
                </ul>
                <hr>
            </div>
            <!-- Page Content Goes Here -->
           
            <div id="home-content">   
            <h1>Create a Room</h1>
            <p class="lead">Create your own video conferencing room now! </p>
            <form>
            <div id="create-room">
                  <label for="room-name">Room Name</label>
                  <br>
                  <input type="text" id="room-name" name="name" placeholder="Room name..">
                  <br>
                  <label for="room-description">Room Description</label>
                 <br>
                  <textarea type="text" id="room-description" name="description" placeholder="Room description.."></textarea>
                  <br>
                  <button class="button" onclick="addRoom()" style="vertical-align:middle"><span>Create</span></button>
            </div>
              </form>
            <hr class="my-4">

            <!-- <p>Or, maybe you would like to join a room instead? All you have to do is simply insert the room
                name
                you want to join in the input box, then click on join room!</p>
            <a href="receiver.html" class="button" style="vertical-align:middle"><span>Click here to join a
                    room!</span></a> -->
        </div>

        <div id="alert-room-add"> 
        </div>

          <!-- div -->

<br><br><br><br><br>
<!-- remember to display it separately later on.. -->
<!-- SECTION 2: ROOM LIST -->
<div id="roomListContent">
    

</div>





            <!-- <h4 id="room"> <b> Web Technology Room</b></h4> -->
            <!-- bootstrap Collapsible Panel -->
            <!-- <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">Users</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse"> -->
            <!-- Bootstrap Collapsible List Group -->
            <!-- <ul class="list-group">
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
                </div> -->



        <!-- Script Sources -->
        <script src="js/script.js"></script>
</body>

</html>