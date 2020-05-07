<?php
session_start();
require_once('config.php');
$admin = $_SESSION['admin_user']; 
if (!$admin) {
    header("Location: access_denied.php"); 
}


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
    <title>Create Event</title>
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
            <a class="nav-item nav-link active" href="admin_view_event.php">Home </a>
            <a class="nav-item nav-link" href="admin_create_event.php">Create Events<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="admin_edit_event.php">Edit Events</a>
            <a class="nav-item nav-link" href="admin_student_table.php">Students</a>
            <a class="nav-item nav-link" href="admin_generate_reports.php">Reports</a>
        </div>
    </div>
    <div class="pull-right">
        <ul class="nav pull-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php
                    echo $admin;
                    ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="admin_profile.php"><i class="icon-cog"></i>Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <h1>Create Event</h1>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Event Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Event Name" name="event_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Type</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Type" name="type">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Venue</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Venue" name="venue">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Event Room</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Event Room" name="eventRoom">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Address" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="City" name="city">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>State</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="State" name="state">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Zip</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Zip" name="zipCode">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" href="student_edit_profile.php" class="profile-edit-btn" name="Submit" value="Submit"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>
<?php


if (isset($_POST['Submit'])){

    $userID = " ";
    /**
     * Grab information from the form submission and store values into variables.
     */
    $event_name = isset($_POST['event_name']) ? $_POST['event_name'] : " ";
    $eventId = isset($_POST['eventId']) ? $_POST['eventId'] : " ";
    $eventRoom = isset($_POST['eventRoom']) ? $_POST['eventRoom'] : " ";
    $date = isset($_POST['date']) ? $_POST['date'] : " ";
    $type = isset($_POST['type']) ? $_POST['type'] : " ";
    $venue = isset($_POST['venue']) ? $_POST['venue'] : " ";
    $address = isset($_POST['address']) ? $_POST['address'] : " ";
    $city = isset($_POST['city']) ? $_POST['city'] : " ";
    $state = isset($_POST['state']) ? $_POST['state'] : " ";
    $country = isset($_POST['county']) ? $_POST['country'] : " ";
    $zipCode = isset($_POST['zipCode']) ? $_POST['zipCode'] : " ";

    //insert to Event table;

    $queryUser  = "INSERT INTO s20am_team1.Events (AUsername, Dates, Name, Type) VALUES (?,?,?,?);";
    $stmt = $conn->prepare($queryUser); 
    $stmt->bind_param("ssss", $admin, $date, $event_name, $type); 
    if ($stmt->execute()) {
        echo "New Event created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }

    // insert to location table
    $queryLoc = "INSERT INTO s20am_team1.Location(zipCode, City, Address) VALUES (?,?,?);";
    $stmt2 = $conn->prepare($queryLoc); 
    $stmt2->bind_param("sss", $zipCode, $city, $address); 
    if ($stmt2->execute()) {
        echo "New Location created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }

    // getting location id
    $locquery = "SELECT LocationID FROM s20am_team1.Location WHERE ZipCode = '".$zipCode."' AND City='".$city."' AND Address='".$address."';"; 
    $resultl = $conn->query($locquery); 

    if ($resultl->num_rows > 0) {
        $row = $resultl->fetch_row(); 
        $locId = $row[0];

        // getting event id
        $eventidquery = "SELECT EventID FROM s20am_team1.Events WHERE Name='".$event_name."' AND Type='".$type."' AND Date='".$date."';"; 
        $resulte = $conn->query($locquery); 
        if ($resulte->num_rows > 0) {
            $row = $resulte->fetch_row(); 
            $eventId = $row[0];

            //inserting into event located
            $venueQuery = "INSERT INTO s20am_team1.event_located (LocationID, EventID, EventVenue, EventRoom) VALUES (?,?,?,?)"; 
            $stmt3 = $conn->prepare($venueQuery); 
            $stmt3->bind_param("ssss", $locId, $eventId, $venue, $eventRoom); 

            if ($stmt3->execute()) {
                echo "<script>alert('Event Created');</script>";
            }
            else {
                echo "failed on insert to event located"; 
            }
        } else {
            echo "failed at getting event id";
        }
    } else {
        echo "failed at getting location id";
    }

}

?>

</body>
</html>
