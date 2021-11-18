<?php include_once 'header.php' ?>
<?php require_once 'functions.php' ?>

<?php 
	$db = db_iconnect("userlog");
	$fetch = $db->query("SELECT * FROM hotels, amenities WHERE hotels.HID=amenities.HID") or die($db->error());
?>

<div class="container">
	<?php 
		if (isset($_GET['wrongrange'])) {
			echo '<div class="alert alert-danger" role="alert">
  		Range of reservation dates is invalid. Please try again.
		</div>';
		}
	?>
    <h1>Hotel Buildings</h1>
    <div class="row">
        <?php while ($rows = $fetch->fetch_assoc()): ?>
        <div class="col-md-4" style="padding-bottom: 50px;">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="img/<?php echo $rows['IMG']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rows['NAME'] ?></h5>
                    <p class="card-text"><?php echo $rows['DESCRIPTION'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
					<li class="list-group-item"><strong>Includes:</strong> 
					<?php
						echo ($rows['POOL'] == 'y') ? "Pool. " : "";
						echo ($rows['GYM'] == 'y') ? "Gym. " : "";
						echo ($rows['SPA'] == 'y') ? "Spa. " : "";
						echo ($rows['BUS_OFFICE'] == 'y') ? "Business Office." : "";
					?>
					</li>
                </ul>
                <div class="card-body">
                    
                    <form action="buildingpage2.php" method="POST">
                        <input type="hidden" name="hotelName" value="<?php echo $rows['NAME'] ?>">
                        <a href="buildingpage2.php"><button type="submit" class="btn btn-primary">Check Out!</button></a>
                    </form>


                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include_once 'footer.php' ?>