<?php include_once 'header.php'; ?>
<?php require_once 'functions.php'; ?>

<?php
        if (isset($_SESSION['loginName'])) {
            echo "<div class='alert alert-primary' role='alert' style='margin-bottom: 0px;'>
			Welcome " . $_SESSION['loginName'] . "! View your profile <a href='profile.php'>here</a>.
			</div>";
        }

        if (isset($_GET['status'])) {
			echo '<div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
  		Successfully logged out. Thank you for using our service!
		</div>';
        }

        if (isset($_GET['reserved'])) {
            echo '<div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
  		Room successfully reserved!
		</div>';
        }

        if (isset($_GET['reserveFail'])) {
			echo '<div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
  		Sorry, there are no more reservations available for that room. Please select another room.
		</div>';
        }
    ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/hotel1.jpg" alt="First slide" width=500px height=500px>
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Group 12 Hotel Reservation System!</h5>
                <p>Greetings People!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/hotel2.jpg" alt="Second slide" width=500px height=500px>
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Group 12 Hotel Reservation System!</h5>
                <p>Greetings!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/hotel3.jpg" alt="Third slide" width=500px height=500px>
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Group 12 Hotel Reservation System!</h5>
                <p>Greetings!</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="img/inside-hotel.jpg" width=100% height=100%>
        </div>
        <div class="col-md-6 justify-content-center align-self-center">
			<h2><a id="about">About Us</a></h2>
            <p>
                We're proud to be an award winning hotel family that makes your home away from home luxurious. We are certain you will feel welcome with your stay at our competitive to luxurious pricing!
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="img/hotel-rooms.jpg" width=100% height=100%>
        </div>
        <div class="col-md-6 justify-content-center align-self-center">
            <h2>Explore the Ten Hotel Buildings</h2>
            <p>
                We have ten lovely hotels to choose from. Different needs require different amenities and we welcome you to explore our different hotels for your relaxation destination.
            </p>
        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>