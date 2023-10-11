<?php
include("header.php");
$is_user = false;
$is_agency = false;

$is_logged_in = false;
//session_start(); // Start the session
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
$database = "rentals";

$conn = mysqli_connect($server,$username,$password,$database);
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
    
    <div class="container mt-5 mb-5">
        <div class="container">
            <div class="align-items-center">
                
                    <?php
                            $sql = "SELECT agency_id, vehicle_no, seating_capacity, rent FROM cars";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // Step 3: Display data in cards
                                while ($row = $result->fetch_assoc()) {
                                    // echo '<div class="col" style="background-color: #a47272;">';
                                    echo '<div class="card">';
                                    echo '<div class="card-body" style="background-color: #a47272;>';
                                    echo '<h5 class="card-title">Vehicle No: ' . $row['vehicle_no'] . '</h5>';
                                    echo '<p class="card-text">Agency ID: ' . $row['agency_id'] . '</p>';
                                    echo '<p class="card-text">Seating Capacity: ' . $row['seating_capacity'] . '</p>';
                                    echo '<p class="card-text">Rent: ' . $row['rent'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<a href="<button type="button" class="btn btn-primary mt-4 mb-4"
                                        style="width: 100%; background: rgb(76, 160, 160);">RENT CAR</button>';
                                    echo '</div>';
                                    // echo '<div class="col">
                                    //     <img src="images/car_ex_home.png" alt="" style="width: 120%;">
                                    // </div>';
                                }
                            } else {
                                echo "No cars available.";
                            }
                    ?>
            </div>
        </div>
    </div>

    <div class="addcar text-center">
        <a href="add_new_cars.php"><button type="button" class="btn btn-primary">Add New Car</button></a>
    </div>

    <!-- <div class="addcar text-center">
        <?php
        echo "$is_agency";
        if($is_agency == true){
            echo "<div class='card mx-auto' style='width: 18rem'; align='center'>
            <div class='card-body'>
            <h5 class='card-title'>Add New Car</h5>
            <form id='addCarForm' method='post' action='add_new_cars.php'>
            <div class='inputs'>
            <input class='mb-2' type='number' placeholder='Enter car number'></input>
            <input class='mb-2' type='number' placeholder='Seating capacity'></input>
            <input class='mb-2' type='number' placeholder='Rent per day'></input>
            </div>
            <a href='#' class='btn btn-primary'>Add</a>
            </div>
            </div>";
        }
        ?>
    </div> -->

    <link rel="stylesheet" href="styles/available_cars.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
            <!-- <div class="container mt-5">
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
            </div> -->