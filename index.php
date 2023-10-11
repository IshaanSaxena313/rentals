<?php
    include("header.php");
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
                <div class="col" style="background-color: #a47272;">
                    <p style="text-align: left; color: white;" class="mt-3">
                        Model:
                        <br>
                        Number:
                        <br>
                        Seating Capacity:
                        <br>
                        Rent per day:
                        <br>
                    </p>
                    <button type="button" class="btn btn-primary mt-4 mb-4"
                        style="width: 100%; background: rgb(76, 160, 160);">RENT CAR</button>
                </div>
                <div class="col">
                    <img src="images/car_ex_home.png" alt="" style="width: 120%;">
                </div>
                <div class="col" style="background-color: #a47272;">
                    <p style="text-align: left; color: white;" class="mt-3">
                        Model:
                        <br>
                        Number:
                        <br>
                        Seating Capacity:
                        <br>
                        Rent per day:
                        <br>
                    </p>
                    <button type="button" class="btn btn-primary mt-4 mb-4"
                        style="width: 100%; background: rgb(76, 160, 160);">RENT CAR</button>
                </div>
                <div class="col">
                    <img src="images/car_ex_home.png" alt="" style="width: 120%;">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>