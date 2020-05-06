<?php
require_once('config.php');
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>

<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Create Event</title>
</head>
<body>

<!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="images/cahsilogo.png" width="150" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="view_event.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Create Event</a>
            </div>
        </div>

        <!-- TODO: Figure out how print the user name here... -->
        <div class="pull-right">
            <ul class="nav pull-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-cog"></i>Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="/auth/logout"><i class="icon-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex justify-content-center">
        <h1>Create Event</h1>
    </div>
<div id=menu>


<!-- <form action="admin_create_event.php" method="post">
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
</form> -->
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
?>

</body>
</html>
