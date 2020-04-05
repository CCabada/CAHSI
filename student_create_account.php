<?php
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
					<form action="index.php" method="post">
						<div class="form-group">
                            <label>First Name</label>
							<input type="text" name="first_name" class="form-control input_user" >
						</div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control input_user" >
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
                            <label>Nationality</label>
                            <input type="text" name="nationality" class="form-control input_pass">
                        </div>
                        <div class="from-group">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control input_pass">
                        </div>
                        <div class="from-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control input_pass">
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
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
    $studentId = isset($_POST['studentId']) ? $_POST['studentId'] : " ";
    $institution = isset($_POST['institution']) ? $_POST['institution'] : " ";
    $employment_Status = isset($_POST['employment_Status']) ? $_POST['employment_Status'] : " ";
    $classification = isset($_POST['classification']) ? $_POST['classification'] : " ";
    $nationality = isset($_POST['nationality']) ? $_POST['nationality'] : " ";
    $username = isset($_POST['username']) ? $_POST['username'] : " ";
    $age = isset($_POST['age']) ? $_POST['age'] : " ";
    $password = isset($_POST['password']) ? $_POST['password'] : " ";
    $retyPassword = isset($_POST['retype_password']) ? $_POST['retype_password'] : " ";

    if ($password != $retyPassword){
        echo "Passwords don't match";
    }


    //insert to User table;
    $queryUser  = "INSERT INTO Student (SUsername, SID, Classification, Ethnicity, Employment_Status, Nationality, Gender, Age, Password, FName, LName)
                VALUES ('".$username."', '".$password."',  '".$studentId."', '".$institution."', '".$employment_Status."', '".$classification."', '".$age."','".$first_name."', '".$last_name."');";
    if ($conn->query($queryUser) === TRUE) {
       // echo "New record created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }
    echo "<p>Hello " .$first_name."!<br> Your username is: ".$username."</p>";

}
?>
</body>
</html>
