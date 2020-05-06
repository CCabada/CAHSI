<?php
session_start();
require_once('config.php');
// if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}

if (isset($_POST['eventId'])) { 
    if(!$conn) {
        echo "Error connecting to mysql"; 
        echo mysqli_connect_error(); 
    }
    $return = array(); 
    $event_id = $_POST['eventId']; 
    $student_username = $_SESSION['student_user']; 
    $userId = "SELECT SID from s20am_team1.Student where SUsername='".$student_username."';";
    $result = $conn->query($userId); 
    if ($result->num_rows > 0  ) { 
        $sid = $result->fetch_assoc()["SID"]; 
        printf("%s", $sid); 
        $insert_query  = "INSERT INTO s20am_team1.checkin (EventID, SID) values (?, ?);"; 
        $stmt = $conn->prepare($insert_query); 
        $stmt->bind_param("ss", $event_id, $sid); 
        
        if ($stmt->execute()) {
            $return['msg'] = "Registered to event"; 
            header('Content-type: application/json'); 
            die(json_encode($return)); 
        } else {
            $return['msg'] = "Error in database ".htmlspecialchars($stmt->error); 
            header('Content-type: application/json'); 
            die(json_encode($return)); 
        }
    } else {
        $return['msg'] = "User not found"; 
        $return['user'] = $student_username; 
        header('Content-type: application/json'); 
        die(json_encode($return)); 
    }
}

// $studentQuery = "Select SID from s20am_team1.Student where SUsername = ";

if (isset($_POST['logout'])) {
    session_destroy();
    exit();
}
?>

