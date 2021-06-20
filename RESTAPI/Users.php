<!-- Demonstration of RESTful web services -->
<?php
class Users{

    private $conn;

    //construct connection to connect to the database
    public function __construct(){ 
        $servername = 'localhost';
        $username = '{Sara}';
        $password = 'Sara@12345';
        $dbname = 'dev_vca';

        //Creating the connection
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
        // Checking the connection
        if(!$this->conn){
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // a function to get ALL users from the database
    public function getAllUsers(){ //this is needed for names retrieving
        $sql = "select name FROM users";
        $result = $this->conn->query($sql); //result (result of the prev sql line) = this connection append query

        $rows = array(); // to store the result in an array
        while($r = mysqli_fetch_assoc($result)){ //mysqli_fetch_assoc() function fetches a result row as an associative array.
            $rows[] = $r;
        }

        return $rows; //returns an array of the data => (names) stored in the users table
    }

    // a function to get one user from the database based on ID
    public function getAllsUsers($id){
        $sql = "select name FROM users WHERE id = ".$id."";
        $result = $this->conn->query($sql);

        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }

        return $rows;
    }
}
?>