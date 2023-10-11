<?php
include("header.php");
$is_user = false;
$is_agency = false;

$is_logged_in = false;
session_start(); // Start the session
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $is_logged_in = true;
    // The user is logged in
} else {
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

$server = "localhost";
$username = "root";
$password = "root";

$conn = mysqli_connect($server,$username,$password);
if(!$conn){
    die("Failed due to".mysqli_connect_error());
}
$name = $_SESSION['username'];
$check = "SELECT COUNT(*) FROM rentals.agencies WHERE(user_name = '$name')";
$row = mysqli_fetch_row(mysqli_query($conn,$check));
if($row > 0){
    $is_agency = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Cars</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Available Cars to Rent</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vehicle Model</h5>
                        <p class="card-text">Vehicle Number</p>
                        <p class="card-text">Seating Capacity</p>
                        <p class="card-text">Rent per Day</p>
                        <select class="form-control mb-2">
                            <option value="1">1 day</option>
                            <option value="2">2 days</option>
                        </select>
                        <input type="date" class="form-control mb-2">
                        <button class="btn btn-primary btn-block">Rent Car</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if($is_agency == true){
            echo "<div class='card' style='width: 18rem;'>
                <img src='...' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>Card title</h5>
                    <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                    <a href='#' class='btn btn-primary'>Go somewhere</a>
                </div>
            </div>";
        }
    ?>

    <link rel="stylesheet" href="styles/available_cars.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>