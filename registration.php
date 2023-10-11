<?php
include("header.php");

$user_exists = false;
$server = "localhost";
$username = "root";
$password = "root";
    if(isset($_POST['customer_username'])){
        $conn = mysqli_connect($server,$username,$password);
        
        if(!$conn){
            die("Failed due to".mysqli_connect_error());
        }
        $name = $_POST['customer_username'];
        $pass = $_POST['customer_password'];
        
        $check = "SELECT count(*) FROM rentals.customers WHERE (user_name = '$name')";
        $result = mysqli_query($conn,$check);

        if ($result !== false) {
            $row = mysqli_fetch_row($result);
            $count = $row[0];
            if($count > 0)
                $user_exists = true;
            else{
                $q = "INSERT INTO rentals.customers (user_name,password) VALUES ('$name','$pass');";
                if($conn->query($q) == true){
                    $user_exists = false;
                }
            }
        }
        $conn->close();
    }else if(isset($_POST['agency_username'])){
        $user_exists = false;
        $conn = mysqli_connect($server,$username,$password);
        if(!$conn){
            die("Failed due to".mysqli_connect_error());
        }
        $name = $_POST['agency_username'];
        $pass = $_POST['agency_password'];
        
        $check = "SELECT count(*) FROM rentals.agencies WHERE (user_name = '$name')";
        $result = mysqli_query($conn,$check);

        if ($result !== false) {
            $row = mysqli_fetch_row($result);
            $count = $row[0];
            if($count > 0)
                $user_exists = true;
            else{
                $q = "INSERT INTO rentals.agencies (user_name,password) VALUES ('$name','$pass');";
                if($conn->query($q) == true){
                    $user_exists = false;
                }
            }
        }
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Customer Registration</h1>
                <form action="registration.php" method="POST">
                    <div class="form-group">
                        <label for="customer_username">Username:</label>
                        <input type="text" class="form-control" id="customer_username" name="customer_username" required>
                    </div>
                    <div class="form-group">
                        <label for="customer_password">Password:</label>
                        <input type="text" class="form-control" id="customer_password" name="customer_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register as Customer</button>
                </form>
            </div>
            <div class="col-md-6">
                <h1>Car Rental Agency Registration</h1>
                <form action="registration.php" method="POST">
                    <div class="form-group">
                        <label for="agency_username">Username:</label>
                        <input type="text" class="form-control" id="agency_username" name="agency_username" required>
                    </div>
                    <div class="form-group">
                        <label for="agency_password">Password:</label>
                        <input type="text" class="form-control" id="agency_password" name="agency_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register as Agency</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Generate error if user already exists and ask to go on login page -->
    <?php
        if($user_exists == true){
            echo "<div class='alert alert-primary d-flex align-items-centrole='alert'>
            <svg xmlns='http://www.w3.org/2000/svg' class=bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 role='img' aria-label='Warning:'>
              <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.09767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
            </svg>
            <div>
              User/Agency already exists please login.
            </div>
          </div>";                              
        }
    ?>

    <link rel="stylesheet" href="styles/registration.css">


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>