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
<h1>View Events</h1>

<form action="admin_view_event.php" method="POST">
    <input id="search" type="text" placeholder="Type here">
    <input id="submit" href = "admin_view_event.php" type="Submit" value="Search">
</form>

<table id="events" class="table table-striped">
    <tr>
        <th scope="col">Event Name</th>
        <th scope="col">Event ID</th>
        <th scope="col">Date</th>
        <th scope="col">Type</th>
        <th scope="col">Venue</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Country</th>
        <th scope="col">Zip Code</th>
    </tr>
    <?php
    //View to Event table;
    if (isset($_POST['Submit'])){
        $search = isset($_POST['Submit']);
        $query = "select * from events e join event_located el on e.EventID=el.EventID join location l on el.LocationID=l.LocationID where e.EventID = '.$search';";
    }else{
        $query = "select * from events e join event_located el on e.EventID=el.EventID join location l on el.LocationID=l.LocationID;";
    }
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
            $event_name = $row["Name"];
            // echo .event_name;
            $eventId = $row["EventID"];
            $date = $row["Dates"];
            $type = $row["Type"];
            $address = $row["Address"];
            $city = $row["City"];
            $venue = $row["EventVenue"];
            $country = $row["Country"];
            $zipCode = $row["ZipCode"];

            echo '<tr> 
                    <td>'.$event_name.'</td> 
                    <td>'.$eventId.'</td> 
                    <td>'.$date.'</td> 
                    <td>'.$type.'</td> 
                    <td>'.$venue.'</td>
                    <td>'.$address.'</td>
                    <td>'.$city.'</td>
                    <td>temp</td>
                    <td>temp</td>
                    <td>'.$zipCode.'</td> 
                  </tr>';
        }
        $result->free();
    }
    else {
        echo '<tr> <td colspan=10>Data not available</td>';
    }
    ?>
</table>
</form>
</div>

</body>
</html>
