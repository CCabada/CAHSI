<?php
require_once('config.php');
?>

<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Add Info</a>
            </div>
        </div>
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
    <h1>View Events</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
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
        <!-- </thead>
        <tbody>
        </tbody>
    </table> -->
<div id=menu>
<?php

//View to Event table;



    $query = "SELECT * FROM Events";



$mysqli = new mysqli("localhost", $username, $password, $db);
if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $event_name = $row["col1"];
            $eventId = $row["col2"];
            $date = $row["col3"];
            $type = $row["col4"];
            $address = $row["col5"];
            $city = $row["col6"];
            $country = $row["col7"];
            $zipCode = $row["col7"];
    
            echo '<tr> 
                      <td>'.$event_name.'</td> 
                      <td>'.$eventId.'</td> 
                      <td>'.$date.'</td> 
                      <td>'.$type.'</td> 
                      <td>'.$address.'</td>
                      <td>'.$city.'</td>
                      <td>'.$country.'</td>
                      <td>'.$zipCode.'</td> 
                  </tr>';
        }
        $result->free();
    }
?>
    <br>
        <a href="index.php">Back</a></br>
    </div>
</body>
</html>
