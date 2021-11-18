<?php session_start() ?>

<!DOCTYPE html>
<html>
<?php require_once 'protoProcess.php' ?>
<head>
    <title>Group 12 Hotel</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
   <!--<script  type ="text/javascript" src="popup.js" ></script>-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	 <link rel="stylesheet" href="assets/css/custom.css">
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!--
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" type="text/css" href="assets/css/custom.css"/>
-->
</head>

<body>
<!--
    <nav class="navbar navbar-expand-lg ">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="navbar-brand" href="protoMain.php">Group 12 Hotel Reservation System</a></li>
            
        </ul>
        <ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="hotelbuildings2.php">Hotel Buildings</a></li>
            <?php 
            if (isset($_SESSION['loginName'])) {
                echo "<li class='nav-item'><a class='nav-link' href='profile.php'>" . $_SESSION['loginName'] . " (profile)</a></li>";
                echo "<li class='nav-item'><a class='nav-link login' href='logout.php'>Log Out</a></li>";
				echo "<div class=\"callout black-border\">
					<div class=\"callout-header\">You've Logged In!</div>
						<span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
							<div class=\"callout-container\">
    						<p>Welcome Austin! You have successfully logged in to your account. </p>
    							<p>View your profile <a href='profile.php'>here</a>, or continue browsing.</p>
    						</div>
  					</div>";
            }
            else {
                echo "<li class='nav-item'><a class='nav-link' href='protoLogin.php'>Sign Up</a></li>";
                echo "<li class='nav-item'><a class='nav-link login' href='protoLogin.php'>Log In</a></li>";
            }
            ?>
        </ul>
    </nav>
-->
	
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF7800;">
		<a class="navbar-brand" href="protoMain.php">Group 12 Hotel Reservation</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
<!--            <li class="nav-item"><a class="navbar-brand" href="protoMain.php">Group 12 Hotel Reservation System</a></li>-->
            <li class="nav-item"><a class="nav-link" href="protoMain.php">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="hotelbuildings2.php">Hotel Buildings</a></li>
			<li class="nav-item"><a class="nav-link" href="searchrooms.php">Search All Rooms</a></li>
        </ul>
        <ul class="navbar-nav">
            <?php 
            if (isset($_SESSION['loginName'])) {
                echo "<li class='nav-item'><a class='nav-link' href='profile.php'>" . $_SESSION['loginName'] . " (profile)</a></li>";
                echo "<li class='nav-item'><a class='nav-link login' href='logout.php'>Log Out</a></li>";
            }
            else {
                echo "<li class='nav-item'><a class='nav-link' href='protoLogin.php'>Sign Up</a></li>";
                echo "<li class='nav-item'><a class='nav-link login' href='protoLogin.php'>Log In</a></li>";
            }
            ?>
            <!-- <li class="nav-item"><a class="nav-link" href="">Sign Up</a></li>
            <li class="nav-item"><a class="nav-link login" href="">Log In</a></li> -->
        </ul>
		</div>
    </nav>
<!--</br></br></br>-->