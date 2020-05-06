<?php
session_start();
require_once('config.php');
$user = $_SESSION['student_user']
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

        </div>
    </div>
    <div class="pull-right">
        <ul class="nav pull-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php
                    echo $user;
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

<div class="d-flex justify-content-center form_container">
    <form action="student_report_offers.php" method="post">
        <div class="form-group">
            <label>Type</label>
            <input type="text" name="type" class="form-control input_user" >
        </div>
        <div class="form-group">
            <label>Date Received</label>
            <input type="date" name="Date Received" class="form-control input_user" >
        </div>
        <div class="from-group">
            <label>Interview</label>
            <input type="text" name="Interview" class="form-control input_pass">
        </div>
        <div class="form-group">
            <label>Company</label>
            <input type="text" name="Company" class="form-control input_pass" >
        </div>
        <div class="form-group">
            <label>Response</label>
            <input type="text" name="Response" class="form-control input_pass">
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
            <input type="submit" name="Submit" value="Submit" class="btn login_btn"/>
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
            <button name="Cancel" href="student_view_event.php" class="btn login_btn">Cancel</button>
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

