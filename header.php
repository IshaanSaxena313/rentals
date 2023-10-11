<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="visibility: 10%;">
    <div class="container">
        <a class="navbar-brand" href="#">Car Rental System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php
                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                        echo "<li class='nav-item mr-4'>
                        <a class='nav-link' href='available_cars.php'>Available Cars</a>
                        </li>
                        <li class='nav-item mr-4'>
                        <a class='nav-link' href='view_booked_cars.php'>Booked Cars</a>
                        </li>
                        <li class='nav-item mr-4'>
                        <a class='nav-link' href='logout.php'>Logout</a>
                        </li>";   
                    }else{
                        echo "<li class='nav-item mr-4'>
                            <a class='nav-link' href='registration.php'>Registration</a>
                        </li>
                        <li class='nav-item mr-4'>
                            <a class='nav-link' href='login.php'>Login</a>
                        </li>
                        <li class='nav-item mr-4'>
                            <a class='nav-link' href='available_cars.php'>Available Cars</a>
                        </li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>