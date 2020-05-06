<?php
session_start();
require_once('config.php');

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

    if ($result->num_rows > 0) { 
        $row = $result->fetch_row(); 
        $sid = $row[0]; 
        // $insert_query  = "INSERT INTO s20am_team1.checkin (EventID, SID) values (?, ?);";
        $insert_checkin = "CALL registerCHECKIN(?,?)"; 
        $stmt = $conn->prepare($insert_checkin); 
        $stmt->bind_param("ii", $sid, $event_id); 

        if ($stmt->execute()) {
            $return['msg'] = "Registered to event";
            header('Content-type: application/json'); 
            die(json_encode($return)); 
        } else {
            $return['msg'] = "Error in database ".$conn->error; 
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

?>

