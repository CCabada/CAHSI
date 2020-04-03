<?php

session_start();
require_once("config.php");
$_SESSION['logged_in'] = false;

if (!empty($_POST)){
  if (isset($_POST['Submit'])){
    $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
    $input_password = isset($_POST['password']) ? $_POST['password'] : " ";
    $input_username = stripslashes($input_username);
    $input_username = mysqli_escape_string($input_username);

    $queryStudent = "SELECT * FROM Student WHERE SUsername='".$input_username."' AND Password='".$input_password."';";
    $resultStudent = $conn->query($queryStudent);

    if ($resultStudent ->num_rows > 0  ) {
      //if there is a result, that means that the user was found in the database
      $_SESSION['student_user'] = $input_username; 
      $_SESSION['logged_in'] = true;
      header("Location: home.php");
    } else {
      echo "User not found.";
    }
  }
}
?>

<!-- <!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="css/styles.css"> 
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
<title>CS 4342 Test Login</title>
</head>
<body>
<h1>USER LOG IN</h1>
<div id="menu">
<form action="student_login.php" method="post">
username: <input type="text" name="username"><br><br>
password: <input type="text" name="password"><br><br>
<input name='Submit' type="submit" value="Submit">
</form>
</div>
<a href="student_create_account.php">CREATE USER ACCOUNT</a><br>

<br>
</div>
<a href="index.html">Back</a><br>

</body>
</html> -->

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
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit" name="Submit" class="btn login_btn"/>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="student_create_account.php" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
