<?php
    include("header.php");
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "rentals";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/index.css">
</head>

<body background="images/bg.jpg">
    <div class="container mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="text-center align-items-center">Search, Book and Rent vehicle easily</h1>
                </div>
                <div class="col">
                    <img src="images/home_cars.png" alt="" style="width: 120%;">
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 5%; text-align: start;">
        <h1 class="items-start">Featured Cars</h1>
    </div>

    <div class="container mt-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                
                    <?php
                            $sql = "SELECT agency_id, vehicle_no, seating_capacity, rent FROM cars";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // Step 3: Display data in cards
                                echo '<div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">';
                                while ($row = $result->fetch_assoc()) {
                                        echo '<div class="card">';
                                        echo '<div class="card-body" style="background-color: #a47272;>';
                                        echo '<h5 class="card-title">Vehicle No: ' . $row['vehicle_no'] . '</h5>';
                                        echo '<p class="card-text">Agency ID: ' . $row['agency_id'] . '</p>';
                                        echo '<p class="card-text">Seating Capacity: ' . $row['seating_capacity'] . '</p>';
                                        echo '<p class="card-text">Rent: ' . $row['rent'] . '</p>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<img src="images/car_ex_home.png" class="d-block w-100" alt="...">';
                                    }
                                    echo '</div>
                                </div>
                                </div>';
                            } else {
                                echo "No cars available.";
                            }
                    ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>