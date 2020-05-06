<?php
session_start();
require_once('config.php');
$student = $_SESSION['student_user'];
$query = "SELECT * FROM s20am_team1.Student WHERE SUsername='".$student."';";

$result = $conn->query($query);
if ($result->num_rows <= 0) {
    echo "Error";
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Profile</title>
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
            <a class="nav-item nav-link active" href="student_view_event.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="student_report_offers.php">Report Offers</a>
            <?php
            $advoc = "SELECT Advocate from s20am_team1.student where SUsername = '.$user.'and Advocate = 1;";

            $connection = mysqli_connect($host,$username, $password, $db);
            if(!$connection)
            {
                echo "Error connecting to mysql";
                echo mysqli_connect_error();
            }

            $result = mysqli_query($connection, $advoc);
            if($result->num_rows == 1) {
                echo '<a class="nav-item nav-link active" href="student_create_event.php">Create Event </a>';
                echo '<a class="nav-item nav-link active" href="student_edit_event.php">Edit Event</a>';
            }
            ?>
        </div>
    </div>
    <div class="pull-right">
        <ul class="nav pull-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION['student_user']; ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="student_profile.php"><i class="icon-cog"></i>Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="/logout.php"><i class="icon-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="images/useri.png" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?php echo $row['FName']." ".$row['LName'];?>
                    </h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>    <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Name</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['SUsername'];?></p>
                            </div>
                        </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control input_user" >
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control input_user" >
                            </div>
                            <div class="from-group">
                                <label>Age</label>
                                <input type="text" name="age" class="form-control input_pass">
                            </div>
                            <div class="form-group">
                                <label>Institution</label>
                                <input type="text" name="institution" class="form-control input_pass" >
                            </div>
                            <div class="form-group">
                                <label>Employment Status</label>
                                <input type="text" name="employment_Status" class="form-control input_pass">
                            </div>
                            <div class="from-group">
                                <label>Classification</label>
                                <input type="text" name="classification" class="form-control input_pass">
                            </div>
                            <div class="from-group">
                                <label>Nationality</label>
                                <input type="text" name="nationality" class="form-control input_pass">
                            </div>
                            <div class="from-group">
                                <label>Ethnicity</label>
                                <input type="text" name="ethnicity" class="form-control input_pass">
                            </div>
                            <div class="from-group">
                                <label>Gender</label>
                                <input type="text" name="gender" class="form-control input_pass">
                            </div>

                            <div class="from-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control input_pass"  >
                            </div>
                            <div class="from-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control input_pass"  >
                            </div>
                            <div class="from-group">
                                <label>Retype Password</label>
                                <input type="password" name="retype_password" class="form-control input_pass"  >
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <input type="submit" name="Submit" value="Submit" class="btn login_btn"/>
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button name="Cancel" href="index.html" class="btn login_btn">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</head>

<?php


if (isset($_POST['Submit'])) {

    /**
     * Grab information from the form submission and store values into variables.
     */
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
    $studentId = isset($_POST['studentId']) ? $_POST['studentId'] : " ";
    $institution = isset($_POST['institution']) ? $_POST['institution'] : " ";
    $employment_Status = isset($_POST['employment_Status']) ? $_POST['employment_Status'] : " ";
    $classification = isset($_POST['classification']) ? $_POST['classification'] : " ";
    $gender = isset($_POST['gender']) ? $_POST['gender'] : " ";
    $nationality = isset($_POST['nationality']) ? $_POST['nationality'] : " ";
    $ethnicity = isset($_POST['ethnicity']) ? $_POST['ethnicity'] : " ";
    $username = isset($_POST['username']) ? $_POST['username'] : " ";
    $age = isset($_POST['age']) ? $_POST['age'] : " ";
    $password = isset($_POST['password']) ? $_POST['password'] : " ";
    $retyPassword = isset($_POST['retype_password']) ? $_POST['retype_password'] : " ";

    if ($password != $retyPassword) {
        echo "Passwords don't match";
    }


    //insert to student table;
    #Todo Fix query

    $queryUser = "UPDATE s20am_team1.student set SUsername, Classification, Ethnicity, Employment_Status, Nationality, Gender, Age, Password, FName, LName VALUES
                VALUES '" . $username . "', '" . $classification . "', '" . $ethnicity . "','" . $employment_Status . "',  '" . $nationality . "',  '" . $gender . "', '" . $age . "', '" . $password . "','" . $first_name . "', '" . $last_name . "' where SUsername = $student;";
    if ($conn->query($queryUser) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }
}
?>

