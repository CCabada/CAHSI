<?php
session_start();
require_once('config.php');
$student = $_SESSION['student_user'];
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
    <title>Edit Event</title>
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
            <a class="nav-item nav-link active" href="student_view_event.php">Home </a>
            <a class="nav-item nav-link" href="student_report_offers.php">Report Offers<span class="sr-only">(current)</span></a>
            <?php
            $advoc = "SELECT Advocate from s20am_team1.student where SUsername = '".$student."'and Advocate = 1;";

            $connection = mysqli_connect($host,$username, $password, $db);
            if(!$connection)
            {
                echo "Error connecting to mysql";
                echo mysqli_connect_error();
            }

            $result = mysqli_query($connection, $advoc);
            if($result->num_rows == 1) {
                echo '<a class="nav-item nav-link" href="student_create_event.php">Create Event </a>';
                echo '<a class="nav-item nav-link" href="student_edit_event.php">Edit Event</a>';
            }
            ?>

        </div>
    </div>
    <div class="pull-right">
        <ul class="nav pull-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php
                    echo $student;
                    ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/Classes/cs4342/Team1_am/student_profile.php"><i class="icon-cog"></i>Profile</a></li>
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
                                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text">
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
                            <input type="submit" href="student_edit_profile.php" class="profile-edit-btn" name="btnAddMore" value="Submit"/>
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
    $date = isset($_POST['date']) ? $_POST['date'] : " ";
    $type = isset($_POST['type']) ? $_POST['type'] : " ";
    $venue = isset($_POST['venue']) ? $_POST['venue'] : " ";
    $address = isset($_POST['address']) ? $_POST['address'] : " ";
    $city = isset($_POST['city']) ? $_POST['city'] : " ";
    $state = isset($_POST['state']) ? $_POST['state'] : " ";
    $country = isset($_POST['county']) ? $_POST['country'] : " ";
    $zipCode = isset($_POST['zipCode']) ? $_POST['zipCode'] : " ";

    //insert to Event table;

    $queryUser  = "INSERT INTO s20am_team1.Events (dates, Name, type) 
                VALUES ( '".$date."','".$event_name."', '".$type."');";
    if ($conn->query($queryUser) === TRUE) {
        echo "New Event created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }

    $queryLoc = "INSERT INTO s20am_team1.Location(zipCode, City, Address) VALUES ('".$zipCode."','".$city."', '".$address."' );";
    if ($conn->query($queryLoc) === TRUE) {
        echo "New Event created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }
}

?>

</body>
</html>
