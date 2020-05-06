<?php
require_once('config.php');
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}



//View to Event table;
if (isset($_POST['eventId'])) {
    $connection = mysqli_connect($host,$username, $password, $db); 

    if(!$connection) {
        echo "Error connecting to mysql"; 
        echo mysqli_connect_error(); 
    }

    $event_id = $_POST['eventId']; 
    $student_username = $_SESSION['student_user']; 
    $userId = "SELECT SID from s20am_team1.Student where Username='.$student_username.';"; 
    $result = $connection->query($userId);
    if (!$result) { 
        echo "Error: " . $connection->error; 
    }

    $row = $result->fetch_row(); 
    $sid = $row[0]; 

    $insert_query  = "INSERT INTO s20am_team1.checkin (EventID, SID) values ('".$event_id."', '".$sid."');"; 

    if ($connection->query($insert_query) === FALSE) {
        echo "Error: " . $connection->error;
    }

}

// $studentQuery = "Select SID from s20am_team1.Student where SUsername = ";

if (isset($_GET['logout'])) {
    session_destroy();
    exit();
}
?>

