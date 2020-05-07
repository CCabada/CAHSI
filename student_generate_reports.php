<?php
session_start();
require_once('config.php');
$student = $_SESSION['student_user'];
$EventAttendees = "select * from s20am_team1.eventattendees;";

$connection = mysqli_connect($host,$username, $password, $db);
if(!$connection)
{
    echo "Error connecting to mysql";
    echo mysqli_connect_error();
}

$resultEventAttendees = mysqli_query($connection, $EventAttendees);

$numOffers = "select * from s20am_team1.numstudentoffers ;";

$connection = mysqli_connect($host,$username, $password, $db);
if(!$connection)
{
    echo "Error connecting to mysql";
    echo mysqli_connect_error();
}

$resultnumOffers = mysqli_query($connection, $numOffers);

$NumberStudentsInstitution = "select * from s20am_team1.NumberStudentsInstitution;";

$connection = mysqli_connect($host,$username, $password, $db);
if(!$connection)
{
    echo "Error connecting to mysql";
    echo mysqli_connect_error();
}

$resultNumberStudentsInstitution = mysqli_query($connection, $NumberStudentsInstitution);



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
    <title>Generate Reports</title>
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
            <a class="nav-item nav-link active" href="student_view_event.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="student_report_offers.php">Report Offers</a>
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
                echo '<a class="nav-item nav-link" href="student_generate_reports.php">Generate Reports</a>';
            }
            ?>
        </div>
    </div>
    <div class="pull-right">
        <ul class="nav pull-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome,  <?php echo $student; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="student_profile.php"><i class="icon-cog"></i>Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </div>

</nav>
<div class="container emp-profile">
    <form method="GET">
        <H3>Generate Reports</h3>
        <label>Event Attendees</label>
        <table id="attendees" class="table table-striped">
            <tr>
                <th scope="col">Event Name</th>
                <th scope="col"># of students</th>
                <?php
                if($resultEventAttendees->num_rows > 0){
                $index = 0;
                while ($row = mysqli_fetch_assoc($resultEventAttendees)){
                    $event_name = $row["NAME"];
                    // echo .event_name;
                    $numberOfStudents= $row["CHECKEDIN"];

                    echo '<tr> 
                        <td>'.$event_name.'</td> 
                        <td>'.$numberOfStudents.'</td> 
                    </tr>';
                } }
                else {
                    echo '<tr> <td colspan=10>Data not available</td>';
                }
                ?>
            </tr>
        </table>
        <label>Number Student Offers</label>
        <table id="FemaleOffers" class="table table-striped">
            <tr>

                <th scope="col">Student Username</th>
                <th scope="col"># of Offers</th>
                <?php
                if($resultnumOffers->num_rows > 0){
                $index = 0;
                while ($row = mysqli_fetch_assoc($resultnumOffers)){
                    $student = $row["Username"];
                    $count = $row["OfferCount"];
                    echo '<tr> 
                        <td>'.$student.'</td> 
                        <td>'.$count.'</td> 
                    </tr>';
                } }
                else {
                    echo '<tr> <td colspan=10>Data not available</td>';
                }
                ?>
            </tr>
        </table>
        <label>Number Of Students From Institution</label>
        <table id="numberStudents" class="table table-striped">
            <tr>
                <th scope="col">Institution</th>
                <th scope="col"># of students</th>
                <?php
                if($resultNumberStudentsInstitution->num_rows > 0){
                $index = 0;
                while ($row = mysqli_fetch_assoc($resultNumberStudentsInstitution)){
                    $institution_name = $row["INSTITUTION_NAME"];
                    $numberOfStudentsInst = $row["ATTENDING"];
                    echo '<tr> 
                        <td>'.$institution_name.'</td> 
                        <td>'.$numberOfStudentsInst.'</td> 
                    </tr>';
                }
                }
                else {
                    echo '<tr> <td colspan=10>Data not available</td>';
}
                ?>
            </tr>
        </table>
        <div class="d-flex justify-content-center mt-3 login_container">
            <button name="Update" href = "student_generate_reports.php" class="btn login_btn">Update</button>
        </div>
    </form>
</body>
</html>

