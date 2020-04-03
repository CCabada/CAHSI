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

<!DOCTYPE html>
<html>
    
<head>
    <title>CAHSI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/cahsilogo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="student_login.php" method="post">
						<div class="form-group">
                            <label>Username</label>
							<input type="text" name="legal_name" class="form-control input_user" >
						</div>
						<div class="form-group">
                            <label>Student ID</label>
							<input type="text" name="studentId" class="form-control input_pass" >
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
                            <label>Username</label>
							<input type="text" name="username" class="form-control input_pass"  >
                        </div>
                        <div class="from-group">
                            <label>Password</label>
							<input type="password" name="password" class="form-control input_pass"  >
                        </div>
                        <div class="from-group">
                            <label>Retype Password</label>
							<input type="password" name="Retype_password" class="form-control input_pass"  >
						</div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <input type="submit" name="Submit" value="Create" class="btn login_btn"/>
                        </div>
					</form>
				</div>
			</div>
		</div>
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
