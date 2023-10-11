<?php
// add_car.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $vehicle_no = $_POST['vehicle_no'];
    $seating_capacity = $_POST['seating_capacity'];
    $rent = $_POST['rent'];

    // Perform database connection and insertion here
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "rentals";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the 'cars' table
    $sql = "INSERT INTO cars (vehicle_no, seating_capacity, rent) VALUES ('$vehicle_no', '$seating_capacity', '$rent')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Car added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Cars</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1 class="text-center">Add New Car</h1>
                <form action="add_new_cars.php" method="POST">
                    <div class="form-group">
                        <label for="vehicle_no">Vehicle Number:</label>
                        <input type="text" class="form-control" id="vehicle_number" name="vehicle_no" required>
                    </div>
                    <div class="form-group">
                        <label for="seating_capacity">Seating Capacity:</label>
                        <input type="number" class="form-control" id="seating_capacity" name="seating_capacity" required>
                    </div>
                    <div class="form-group">
                        <label for="rent">Rent per Day:</label>
                        <input type="number" class="form-control" id="rent_per_day" name="rent" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Car</button>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="styles/add_new_cars.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
