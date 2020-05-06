<?php
session_start();
require_once('config.php');
$student = $_SESSION['student_user']
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
        <title>Report Offers</title>
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
    <form action="student_edit_profile.php" method="post">
        <div class="row">
            <div class="col-md-4">
                <h1>Report Offers</h1>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Type</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="type" class="form-control input_user" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date Received</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="Date Received" class="form-control input_user" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Interview</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="Interview" class="form-control input_pass">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Company</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="Company" class="form-control input_pass" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Response</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="Response" class="form-control input_pass">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="submit" class="profile-edit-btn" name="Submit" value="Submit"/>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="profile-edit-btn" name="Cancel" value="Cancel"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>
<?php


if (isset($_POST['Submit'])){

    /**
     * Grab information from the form submission and store values into variables.
     */
    $type = isset($_POST['type']) ? $_POST['type'] : " ";
    $Date_Recieved = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
    $Interview = isset($_POST['Interview']) ? $_POST['Interview'] : " ";
    $Company = isset($_POST['Company']) ? $_POST['Company'] : " ";
    $Response = isset($_POST['Response']) ? $_POST['Response'] : " ";

    //insert to student table;
    $queryUser  = "INSERT INTO s20am_team1.offers(SUsername, type,Date_Recieved,Interview,Company, Response) VALUES
                VALUES ('".$user."', '".$type."', '".$Date_Recieved."','".$Interview."',  '".$Company."',  '".$Response."');";
    if ($conn->query($queryUser) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }

}
?>
    </body>
</html>

