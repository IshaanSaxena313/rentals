<?php
include("header.php");

if(isset($_POST['login_username'])){
// Receive the username and password input from the login form
$login_username = $_POST['login_username'];
$login_password = $_POST['login_password'];

// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the username exists in the Customers table
$sql_customers = "SELECT * FROM rentals.customers WHERE user_name = '$login_username'";
$result_customers = mysqli_query($conn, $sql_customers);

// Check if the username exists in the Agency table
$sql_agency = "SELECT * FROM rentals.agencies WHERE user_name = '$login_username'";
$result_agency = mysqli_query($conn, $sql_agency);

if (mysqli_num_rows($result_customers) > 0) {
    echo "Welcome customer";
    // Username exists in the Customers table
    // After successful login
    session_start();
    $_SESSION['username'] = $login_username; // Store username
    $_SESSION['logged_in'] = true; // Flag to indicate the user is logged in
    header("Location:index.php");
    
} elseif (mysqli_num_rows($result_agency) > 0) {
    //echo "Welcome agency";
    session_start();
    $_SESSION['username'] = $login_username; // Store username
    $_SESSION['logged_in'] = true; // Flag to indicate the user is logged in
    header("Location:index.php");
    // Username exists in the Agency table
} else {
    echo "ERR no user or agency found";
    // Username not found in either table
}

// Close the database connection
mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1 class="text-center">Login</h1>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="login_username">Username:</label>
                        <input type="text" class="form-control" id="login_username" name="login_username" required>
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password:</label>
                        <input type="password" class="form-control" id="login_password" name="login_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="styles/login.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>