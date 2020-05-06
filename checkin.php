<?php
require_once('config.php');
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}



//View to Event table;

$student_username = ;

$studentQuery = "Select SID from s20am_team1.Student where SUsername = "
$query = "INSERT INTO s20am_team1.CheckIn(SID, EventID) VALUES (3,3); ";


if (isset($_GET['logout'])) {
    session_destroy();
    exit();
}
?>