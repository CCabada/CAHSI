<?php
/**
 * CS 4342 Database Management
 * @author Kevin Apodaca
 * @since 2/12/20
 * @version 1.0
 * Description: The purpose of this file is to serve as a template for students to create users and populate them into the database.
 */

require_once('config.php');
?>

<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">  
<title>CS4342 Test Sign Up</title>
</head>
<body>
<h1>CREATE ACCOUNT</h1>
<div id=menu>
<form action="student_create_account.php" method="post">
Name: <input type="text" name="legal_name"><br><br>
Student ID :<input type="text" name="studentId"><br><br>
Institution :<input type="text" name="institution"><br><br>
Employment Status :<input type="text" name="employment_Status"><br><br>
Classification :<input type="text" name="classification"><br><br>
username: <input type="text" name="username"><br><br>
password: <input type="password" required pattern = "[A-Za-z0-9]+" maxlength="15" name="password"><br><br>
Retype password: <input type="password" required pattern = "[A-Za-z0-9]+" maxlength="15" name="Retype_password"><br><br>
<input name='Submit' type="submit" value="Create">
</form>
<br>
<a href="index.html">Back</a></br>
</div>
<?php


if (isset($_POST['Submit'])){

    $userID = " ";
    /**
     * Grab information from the form submission and store values into variables.
     */
    $legal_name = isset($_POST['legal_name']) ? $_POST['legal_name'] : " ";
    $studentId = isset($_POST['studentId']) ? $_POST['studentId'] : " ";
    $institution = isset($_POST['institution']) ? $_POST['institution'] : " ";
    $employment_Status = isset($_POST['employment_Status']) ? $_POST['employment_Status'] : " ";
    $classification = isset($_POST['classification']) ? $_POST['classification'] : " ";
    $username = isset($_POST['username']) ? $_POST['username'] : " ";
    $password = isset($_POST['password']) ? $_POST['password'] : " ";
    $retyPassword = isset($_POST['password']) ? $_POST['password'] : " ";

    if ($password != $retyPassword){
        echo "Passwords don't match";
    }


    //insert to User table;
    $queryUser  = "INSERT INTO Student (username, password, legalName, studentId, institution, employmentStatus, classification)
                VALUES ('".$username."', '".$password."', '".$legal_name."', '".$studentId."', '".$institution."', '".$employment_Status."', '".$classification."');"; // TODO fix SQL query
    if ($conn->query($queryUser) === TRUE) {
       // echo "New record created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }
    echo "<p>Hello " .$legal_name."!<br> Your username is: ".$username."</p>";

}
?>

</body>
</html>
