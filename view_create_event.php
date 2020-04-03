<?php
require_once('config.php');
?>

<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <title>View Event</title>
</head>
<body>
<h1>View Events</h1>
<div id=menu>
<?php

//View to Event table;

    $query = "SELECT * FROM Events";

    echo '<table border="0" cellspacing="2" cellpadding="2"> 
          <tr> 
              <td> <font face="Arial">Event Name :</font> </td> 
              <td> <font face="Arial">Event ID :</font> </td> 
              <td> <font face= "Arial">Date :</font> </td> 
              <td> <font face="Arial">Type :</font> </td> 
              <td> <font face="Arial">Venue :</font> </td>
              <td> <font face="Arial">Address :</font> </td> 
              <td> <font face="Arial">City :</font> </td> 
              <td> <font face="Arial">State :</font> </td>
              <td> <font face="Arial">Country :</font> </td>
              <td> <font face="Arial">Zip Code :</font> </td>
         
          </tr>';

$mysqli = new mysqli("localhost", $username, $password, $database);
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
        <a href="index.html">Back</a></br>
    </div>
</body>
</html>
