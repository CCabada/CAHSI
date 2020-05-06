<?php
session_start();
require_once('config.php');
$user = $_SESSION['student_user']
?>

    <!DOCTYPE HTML>
    <head>
        <style>
            body{
                background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            }
            .emp-profile{
                padding: 3%;
                margin-top: 3%;
                margin-bottom: 3%;
                border-radius: 0.5rem;
                background: #fff;
            }
            .profile-img{
                text-align: center;
            }
            .profile-img img{
                width: 70%;
                height: 100%;
            }
            .profile-img .file {
                position: relative;
                overflow: hidden;
                margin-top: -20%;
                width: 70%;
                border: none;
                border-radius: 0;
                font-size: 15px;
                background: #212529b8;
            }
            .profile-img .file input {
                position: absolute;
                opacity: 0;
                right: 0;
                top: 0;
            }
            .profile-head h5{
                color: #333;
            }
            .profile-head h6{
                color: #0062cc;
            }
            .profile-edit-btn{
                border: none;
                border-radius: 1.5rem;
                width: 70%;
                padding: 2%;
                font-weight: 600;
                color: #6c757d;
                cursor: pointer;
            }
            .proile-rating{
                font-size: 12px;
                color: #818182;
                margin-top: 5%;
            }
            .proile-rating span{
                color: #495057;
                font-size: 15px;
                font-weight: 600;
            }
            .profile-head .nav-tabs{
                margin-bottom:5%;
            }
            .profile-head .nav-tabs .nav-link{
                font-weight:600;
                border: none;
            }
            .profile-head .nav-tabs .nav-link.active{
                border: none;
                border-bottom:2px solid #0062cc;
            }
            .profile-work{
                padding: 14%;
                margin-top: -15%;
            }
            .profile-work p{
                font-size: 12px;
                color: #818182;
                font-weight: 600;
                margin-top: 10%;
            }
            .profile-work a{
                text-decoration: none;
                color: #495057;
                font-weight: 600;
                font-size: 14px;
            }
            .profile-work ul{
                list-style: none;
            }
            .profile-tab label{
                font-weight: 600;
            }
            .profile-tab p{
                font-weight: 600;
                color: #0062cc;
            }
        </style>
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

<!-- <div class="d-flex justify-content-center form_container">
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
</div> -->
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

