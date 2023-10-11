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
                <form action="add_car.php" method="POST">
                    <div class="form-group">
                        <label for="car_model">Vehicle Model:</label>
                        <input type="text" class="form-control" id="car_model" name="car_model" required>
                    </div>
                    <div class="form-group">
                        <label for="vehicle_number">Vehicle Number:</label>
                        <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
                    </div>
                    <div class="form-group">
                        <label for="seating_capacity">Seating Capacity:</label>
                        <input type="number" class="form-control" id="seating_capacity" name="seating_capacity" required>
                    </div>
                    <div class="form-group">
                        <label for="rent_per_day">Rent per Day:</label>
                        <input type="number" class="form-control" id="rent_per_day" name="rent_per_day" required>
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
