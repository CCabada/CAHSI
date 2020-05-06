<?php
require_once('config.php');
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>

<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>View Event</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="images/cahsilogo.png" width="150" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="admin_view_event.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="admin_create_event.php">Create Events</a>
            <a class="nav-item nav-link" href="admin_student_table.php">Students</a>

        </div>

        <!-- TODO: Figure out how print the user name here... -->
        <div class="pull-right">
            <ul class="nav pull-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-cog"></i>Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="/index.html" method="post"><i class="icon-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex justify-content-center">
        <h1>Create Event</h1>
    </div>
<div id=menu>
    <div class="d-flex justify-content-lg-center">
        <form action="admin_create_event.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Event Name</label>
                    <input type="text" class="form-control" placeholder="Event Name" name="event_name">
                </div>
                <div class="form-group col-md-6">
                    <label>Event ID</label>
                    <input type="text" class="form-control" placeholder="Event ID" name="eventId">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Date</label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text">
                </div>
                <div class="form-group col-md-4">
                    <label>Type</label>
                    <input type="text" class="form-control" placeholder="Type" name="type">
                </div>
                <div class="form-group col-md-4">
                    <label>Venue</label>
                    <input type="text" class="form-control" placeholder="Venue" name="venue">
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Address" name="address">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text" class="form-control" placeholder="City" name="city">
                </div>
                <div class="form-group col-md-4">
                    <label>State</label>
                    <input type="text" class="form-control" placeholder="State" name="state">
                </div>
                <div class="form-group col-md-2">
                    <label>Zip</label>
                    <input type="text" class="form-control" placeholder="Zip" name="zipCode">
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
        </form> 
    </div>

<br>
<a href="admin_view_event.php">Back</a></br>
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
    $address = isset($_POST['address']) ? $_POST['address'] : " ";
    $city = isset($_POST['city']) ? $_POST['city'] : " ";
    $state = isset($_POST['state']) ? $_POST['state'] : " ";
    $country = isset($_POST['county']) ? $_POST['country'] : " ";
    $zipCode = isset($_POST['zipCode']) ? $_POST['zipCode'] : " ";

    //insert to Event table;

    $queryUser  = "INSERT INTO s20am_team1.Events (EventID, Event_Location, Time, DATE, Name, type) 
                VALUES ('".$event_name."', '".$eventId."', '".$date."', '".$type."', '".$venue."', '".$address."', '".$city."', '".$state."', '".$country."', '".$zipCode."');";
    if ($conn->query($queryUser) === TRUE) {
        echo "New Event created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }

    $queryLoc = "INSERT INTO s20am_team1.Locations(LocationID, zipCode, Country, State, City, Address) VALUES ('".$venue."', '".$address."', '".$city."', '".$state."', '".$country."', '".$zipCode."');";
    if ($conn->query($queryLoc) === TRUE) {
        echo "New Event created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }
}
if (isset($_POST['logout'])) {
    session_destroy();
    exit();
}
?>

</body>
</html>
