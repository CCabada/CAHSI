<?php

$host = "ilinkserver.cs.utep.edu";
$db = 's20am_team1';   # enter your team database here.

$username = "eirodriguez5";  # enter your username here.
$password = "almostInterface";  # enter your password here.

/**
 * Making the connection to the database.
 * Parameters - host, username, password, team database.
 */
$conn = new mysqli($host, $username, $password, $db);

/**
 * Validating the connection to server.
 */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>