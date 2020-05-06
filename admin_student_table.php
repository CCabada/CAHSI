<?php
session_start();
require_once('config.php');
$admin = $_SESSION['admin_user']
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
        <title>Student Table</title>
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
                <a class="nav-item nav-link" href="admin_create_event.php">Create Events</a>
                <a class="nav-item nav-link" href="admin_student_table.php">Students<span class="sr-only">(current)</span></a>

            </div>
        </div>
        <div class="pull-right">
            <ul class="nav pull-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome,<?php
                        echo $admin;
                        ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/Classes/cs4342/Team1_am/admin_profile.php"><i class="icon-cog"></i>Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout.php"><i class="icon-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <h1>View Events</h1>

    <table id="events" class="table table-striped">
        <tr>
            <th scope="col">Student Username</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Advocate</th>
            <th scope="col">Classification</th>
            <th scope="col">Ethnicity</th>
            <th scope="col">Employment Status</th>
            <th scope="col">Nationality</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
        </tr>
        <?php
        //View to Event table;

        $query = "select * from s20am_team1.student;";

        $connection = mysqli_connect($host,$username, $password, $db);
        if(!$connection)
        {
            echo "Error connecting to mysql";
            echo mysqli_connect_error();
        }

        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0){
            $index = 0;
            while ($row = mysqli_fetch_assoc($result)){
                $student_username = $row["SUsername"];
                $studentId = $row["SID"];
                $student_name = $row["FName"] + $row["LName"] ;
                $advocate = $row["Advocate"];
                $Classification = $row["Classification"];
                $Ethnicity = $row["Ethnicity"];
                $Employment_Status = $row["Employment_Status"];
                $Nationality = $row["Nationality"];
                $Gender = $row["Gender"];
                $Age = $row["Age"];

                echo '<tr> 
                    <td>'.$student_username.'</td> 
                    <td>'.$studentId.'</td> 
                    <td>'.$student_name.'</td> 
                    <td>'.$advocate.'</td> 
                    <td>'. $Classification.'</td>
                    <td>'.$Ethnicity.'</td>
                    <td>'.$Employment_Status.'</td>
                    <td>'.$Nationality.'</td>
                    <td>'.$Gender.'</td>
                    <td>'.$Age.'</td> 
                  </tr>';
            }
            $result->free();
        }
        else {
            echo '<tr> <td colspan=10>Data not available</td>';
        }
        ?>

    </body>
    </html>
<?php
