<?php include_once 'header.php' ?>

<?php 
	
	if (!isset($_POST['hotelName'])) {
		header("location: protoMain.php");
	}
	
$db = db_iconnect("userlog");
$hotelName = $_POST['hotelName'];
$fetch = $db->query("SELECT * FROM hotels, amenities, roomTypes WHERE hotels.HID=amenities.HID AND hotels.HID=roomTypes.HID AND hotels.NAME = '$hotelName'") or die($db->error());
$fetchForA = $db->query("SELECT * FROM hotels, amenities, roomTypes WHERE hotels.HID=amenities.HID AND hotels.HID=roomTypes.HID AND hotels.NAME = '$hotelName'") or die($db->error());
?>

<div class="container">
<h1>Welcome to <?php echo $_POST['hotelName']?></h1>
	<h2>Amenities: <?php
						$rowForA = $fetchForA->fetch_assoc();
						echo ($rowForA['POOL'] == 'y') ? "Pool. " : "";
						echo ($rowForA['GYM'] == 'y') ? "Gym. " : "";
						echo ($rowForA['SPA'] == 'y') ? "Spa. " : "";
						echo ($rowForA['BUS_OFFICE'] == 'y') ? "Business Office." : "";
					?> </h2>
    <div class="row">
        <?php while ($row = $fetch->fetch_assoc()): ?>
        <div class="col-md-4" style ="padding-bottom: 50px;">
            <div class="card mx-auto" style="min-width: 300px;">
            <!-- worry about images here -->
                <img class="card-img-top" style="min-height: 200px; max-height: 200px; "src="img/<?php echo $row['IMG']; ?>" alt="Card image cap">
			
                <div class="card-body">
                    <h5 class="card-title" style="max-height: 80px;"><?php echo $row['NAME']?> Room (<?php 
					echo ($row['TYPE'] == 's') ? "Standard" : "";
					echo ($row['TYPE'] == 'q') ? "Queen" : "";
					echo ($row['TYPE'] == 'k') ? "King" : "";
					?>)</h5>
                </div>
                <ul class="list-group list-group-flush" style="min-height: 80px; max-height: 150px;">
                    <li class="list-group-item" style="min-height: 80px; max-height: 150px;">$<?php echo $row['PRICE']?>/day</li>
                    <li class="list-group-item">Rooms Available: <?php echo $row['NUM_ROOMS']?></li>
				</ul>
                    <?php if (isset($_SESSION['loginName'])):?>
                    <div class='card-body' style="max-height: 70px;">
                        <button type='submit' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'
                            name='reserve'
                            data-whatever="<?php echo "" . $row['NAME'] . " Room (" . $row['TYPE'] . ")"; ?>"
                            data-prop="<?php echo $row['RT_ID']; ?>">Reserve!</button>
                    </div>
                    <?php else: ?>
					<form action="protoProcess.php" method="POST">
                    	<div class='card-body'><button type='submit' class='btn btn-primary'
                            name='reserveNotLoggedIn'>Reserve!</button></div>
					</form>
                    <?php endif; ?>
            </div>
        </div>
		
		<!-- Modal Content -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<form action="protoProcess.php" method="POST">
                    <div class="modal-body">
                            <div class="form-group">
                                <p>Please select how long you would like to reserve this room.</p>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Start date:</label>
                                <input type="date" class="form-control" name="startDate" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">End date:</label>
                                <input type="date" class="form-control" name="endDate" required>
                            </div>
                            <div class="form-group">
                                <p><strong>NOTE:</strong> This room will appear in your user profile. You may
                                    cancel the reservation any time.</p>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <input type="hidden" name="propId" value="0" id="propIdHere">
                            <input type='hidden' value='<?php echo $_SESSION['loginName']; ?>' name='loginName'>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary" name="reserve">Reserve</button>
                        
                    </div>
					</form>
                </div>
            </div>
        </div>
		
		
		<!-- Internal JavaScript code for modals to work  -->
        <script>
		var datesForDisable = ["2021-11-14", "2021-11-15","2021-11-16", "2021-11-13"];
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            weekStart: 1,
            todayHighlight: true,
            autoclose: true,
            datesDisabled: datesForDisable,
        });
		</script>
			
		<script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomName = button.data('whatever');
            var propId = button.data('prop');
            var modal = $(this);
            modal.find('.modal-title').text('Reserve ' + roomName);
            modal.find("#propIdHere").val(propId);
        });
        </script>
        <?php endwhile; ?>
    </div>
</div>

<?php include_once 'footer.php' ?>