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
                <form action="config.php" method="POST">
                    <div class="from-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control input_pass"  >
                    </div>
                    <div class="from-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control input_pass"  >
                    </div>

                    <div class="d-flex justify-content-center mt-3 login_container">
                        <input type="submit" name="Submit" value="Enter" href="index.php" class="btn login_btn"/>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button name="Cancel" href="index.php" class="btn login_btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

    $host = "ilinkserver.cs.utep.edu";
    $db = 's20am_team1';   # enter your team database here.
    $username = isset($_POST['username']) ? $_POST['username'] : " ";
    $password = isset($_POST['password']) ? $_POST['password'] : " ";
    echo $username;
    echo $password;
    $test = true;

    /**
     * Making the connection to the database.
     * Parameters - host, username, password, team database.
     */
    if($test){
        $username = $username;
        $password = $password;
        $conn = new mysqli($host, $username, $password, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            echo "Working";
        }
        header('Location: http://cssrvlab01.utep.edu/Classes/cs4342/Team1_am/index.html');
        exit();
        /**
        * Validating the connection to server.
        */

    }
?>
</body>
</html>
