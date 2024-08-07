<?php
// Start the session

if (!isset($_SESSION)) {
    session_start();
};

//connect to database
$server = "localhost";
$user = "root";
$pass = "mysqlroot"; 
$database = "toyshop";


$dbconnect = mysqli_connect($server, $user, $pass, $database);
// $conn = new mysqli($servername,$username,$dbpassword);

// check whether database connection is successful
if (!$dbconnect) {
    echo "Database failed to Connect" . mysqli_connect_error();
}


//check whether the user is logged in
if (!isset($_SESSION['user_id'])) {
    //redirect user to login page
    // header('Location:/home.php');
}
