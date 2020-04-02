<?php
require_once('config.php');
?>

<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
<title>Create Event</title>
</head>
<body>
<h1>CREATE Event</h1>
<div id=menu>
<form action="admin_create_event.php" method="post">
Event Name : <input type="text" name="event_name"><br><br>
Event ID :<input type="text" name="studentId"><br><br>
Date :<input type="text" name="institution"><br><br>
Type :<input type="text" name="employment_Status"><br><br>
Venue :<input type="text" name="classification"><br><br>
Address : <input type="text" name="username"><br><br>
City : <input type="text " required pattern = "[A-Za-z]+"  name="city"><br><br>
State: <input type="text" required pattern = "[A-Za-z]+"  name="state"><br><br>
Country: <input type="text" required pattern = "[A-Za-z]+" name="county"><br><br>
Zip Code: <input type="number" required pattern = "[0-9]" maxlength="5" name="zipcode"><br><br>
<input name='Submit' type="submit" value="Create">
</form>
<br>
<a href="index.html">Back</a></br>
</div>
<?php


if (isset($_POST['Submit'])){

    $userID = " ";
    /**
     * Grab information from the form submission and store values into variables.
     */
    $event_name = isset($_POST['event_name']) ? $_POST['event_name'] : " ";
    $eventId = isset($_POST['eventId']) ? $_POST['eventId'] : " ";
    $date = isset($_POST['date']) ? $_POST['date'] : " ";
    $type = isset($_POST['type']) ? $_POST['type'] : " ";
    $venue = isset($_POST['venue']) ? $_POST['venue'] : " ";
    $address = isset($_POST['username']) ? $_POST['address'] : " ";
    $city = isset($_POST['city']) ? $_POST['city'] : " ";
    $state = isset($_POST['state']) ? $_POST['state'] : " ";
    $country = isset($_POST['county']) ? $_POST['country'] : " ";
    $zipCode = isset($_POST['zipCode']) ? $_POST['zipCode'] : " ";

    //insert to Event table;
    $queryUser  = "INSERT INTO Event (event_name, EventId, date, type, venue, address, city, state, country, zipCode)
                VALUES ('".$event_name."', '".$eventId."', '".$date."', '".$type."', '".$venue."', '".$address."', '".$city."', '".$state."', '".$country."', '".$zipCode."');"; // TODO fix SQL query
    if ($conn->query($queryUser) === TRUE) {
        echo "New Event created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }
}
?>

</body>
</html>
