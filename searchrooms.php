<?php include_once 'header.php'; ?>
<?php require_once 'functions.php'; ?>

<?php
		$db = db_iconnect("userlog");
		$fetch = $db->query("SELECT * FROM hotels, amenities, roomTypes WHERE hotels.HID=amenities.HID AND hotels.HID=roomTypes.HID") or die($db->error());

		// check input (needs to be integer and range makes sense)
		if (isset($_GET['searchPrice'])) {
			// create empty array
			$searchResults = array();
			// populate array with every room
			while($row = $fetch->fetch_assoc()) {
				$searchResults[] = $row;
			}
			
			// create another array to hold modified results
			$finalResults = array();
			foreach($searchResults as $element) {
				if ($_GET['startPrice'] <= $element['PRICE'] && $element['PRICE'] <= $_GET['endPrice']) {
					$finalResults[] = $element;
				}
			}
			
			// totally not StackOverflow solution of sorting
			// multidimensional array by price
			usort($finalResults, function($a, $b) {
				return $a['PRICE'] <=> $b['PRICE'];
			});
		}

		if (isset($_GET['searchAmenities'])) {
			// create empty array
			$searchResults = array();
			// populate array with every room
			while($row = $fetch->fetch_assoc()) {
				$searchResults[] = $row;
			}
			
			// create another array to hold modified results
			$finalResults = array();
			foreach ($searchResults as $element) {
				$counter = 0;
				if (isset($_GET['pool']) && $element['POOL'] == 'y') {
					$counter ++;
					
					if ($counter == count($_GET) - 1) {
						$finalResults[] = $element;
					}
				}
				if (isset($_GET['gym']) && $element['GYM'] == 'y') {
					$counter ++;
					
					if ($counter == count($_GET) - 1) {
						$finalResults[] = $element;
					}
				}
				if (isset($_GET['spa']) && $element['SPA'] == 'y') {
					$counter ++;
					
					if ($counter == count($_GET) - 1) {
						$finalResults[] = $element;
					}
				}
				if (isset($_GET['businessOffice']) && $element['BUS_OFFICE'] == 'y') {
					$counter ++;
					
					if ($counter == count($_GET) - 1) {
						$finalResults[] = $element;
					}
				}
			}
		}

		if (isset($_GET['searchAvail'])) {
			// create empty array
			$searchResults = array();
			// populate array with every room
			while($row = $fetch->fetch_assoc()) {
				$searchResults[] = $row;
			}
			
			// create another array to hold modified results
			$finalResults = array();
			foreach($searchResults as $element) {
				if ($element['NUM_ROOMS'] >= $_GET['availNum']) {
					$finalResults[] = $element;
				}
			}
			
			// totally not StackOverflow solution of sorting
			// multidimensional array by price
			usort($finalResults, function($a, $b) {
				return $a['NUM_ROOMS'] <=> $b['NUM_ROOMS'];
			});
		}

		if (isset($_GET['searchDate'])) {
			$beginDt = $_GET['startDate'];
			$endDt = $_GET['endDate'];
			// SELECT *
//FROM roomTypes
//LEFT JOIN reservation ON roomTypes.RT_ID=reservation.RT_ID
//ORDER BY roomTypes.RT_ID
			
			//SELECT DISTINCT roomTypes.RT_ID
//FROM roomTypes
//LEFT JOIN reservation ON roomTypes.RT_ID=reservation.RT_ID
//ORDER BY roomTypes.RT_ID
			
			//  allow duplicates?
			
			$fetchDates = $db->query("SELECT * FROM reservation, roomTypes, hotels, amenities WHERE reservation.RT_ID=roomTypes.RT_ID AND hotels.HID=roomTypes.HID AND hotels.HID=amenities.HID") or die($db->error());
			
			// create empty array
			$searchResults = array();
			// populate array with every room
			while($row = $fetchDates->fetch_assoc()) {
				$searchResults[] = $row;
			}
			
			$finalResults = array();
			
			foreach ($searchResults as $element) {
				$begin = $element['START_DT'];
				$end = $element['END_DT'];
				
//				if (empty($begin) || empty($end)) {
					//$finalResults[] = $element;
//					continue;
//				}
				
				$begin = new DateTime($begin);
				$end = new DateTime($end);
	
				for($i = $begin; $i <= $end; $i->modify('+1 day')){
					$day = $i->format("Y-m-d");
    				if (check_in_range($beginDt, $endDt, $day)) {
						break;
					}
					
					if (!check_in_range($beginDt, $endDt, $day) && $i == $end) {
						$finalResults[] = $element;
					}
				}
			}
		}

function check_in_range($start_date, $end_date, $date_from_user) {
  // Convert to timestamp
  $start_ts = strtotime($start_date);
  $end_ts = strtotime($end_date);
  $user_ts = strtotime($date_from_user);

  // Check that user date is between start & end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}
?>

<div class="container">
<div class="row">
		<div class="col-md-12">
			<h1>Search Rooms Here</h1>
			<p>Search all of the hotel rooms this reservation system has to offer! Search by a price range, amenities, room availability, and a reservation date range.</p>
		</div>
		
		<div class="col-md-12" style="text-align: center;">
		<div class="mb-3">
			<div class="row no-gutters">
    			<div class="col-md-3">
      				<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#priceModal' data-whatever="Search by Price">Search by Price</button>
    			</div>
    			<div class="col-md-3">
					<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#dateModal' data-whatever="Search by Date">Search by Date</button>
				</div>
				<div class="col-md-3">
					<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#amenitiesModal' data-whatever="Search by Amenities">Search by Amenities</button>
				</div>
				<div class="col-md-3">
					<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#availModal' data-whatever="Search by Room Availability">Search by Room Availability</button>
				</div>
			</div>
  		</div>
		</div>
	</div>

	<div class="row">
        <?php foreach ($finalResults as $rows): ?>
        <div class="col-md-4" style="padding-bottom: 50px;">
            <div class="card mx-auto" style="width: 18rem;">
				<!--
				<img class="card-img-top" src="img/standardMagnolia.jpg" alt="Card image cap">
				-->
				<img class="card-img-top" src="img/<?php echo $rows['IMG']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rows['NAME']?> Room (<?php 
					echo ($rows['TYPE'] == 's') ? "Standard" : "";
					echo ($rows['TYPE'] == 'q') ? "Queen" : "";
					echo ($rows['TYPE'] == 'k') ? "King" : "";
					?>)</h5>
                    <p class="card-text"><?php echo $rows['DESCRIPTION'] ?></p>
                </div>
				<ul class="list-group list-group-flush">
                    <li class="list-group-item">$<?php echo $rows['PRICE']?>/day</li>
                    <li class="list-group-item">Reservations Available: <?php echo $rows['NUM_ROOMS']?></li>
				</ul>
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
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<form action="searchrooms.php" method="GET">
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Please input price range (lowest to high, inclusive): </label>
                                <input type="text" class="form-control" name="startPrice" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="endPrice" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary" name="searchPrice">Apply</button>   
                    </div>
					</form>
                </div>
            </div>
        </div>

<div class="modal fade" id="amenitiesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<form action="searchrooms.php" method="GET">
                    <div class="modal-body">
							<div class="form-group">
                                <p>Please select which amenities you would like to see in a room.</p>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Pool</label>
                                <input type="checkbox" name="pool" value="Yes">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Gym</label>
                                <input type="checkbox" name="gym" value="Yes">
                            </div>
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">Spa</label>
                                <input type="checkbox" name="spa" value="Yes">
                            </div>
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">Business Office</label>
                                <input type="checkbox" name="businessOffice" value="Yes">
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary" name="searchAmenities">Apply</button>   
                    </div>
					</form>
                </div>
            </div>
        </div>

<div class="modal fade" id="availModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<form action="searchrooms.php" method="GET">
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Please input the minimum number of reservations you would like to have in a room (inclusive). </label>
                                <input type="text" class="form-control" name="availNum" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary" name="searchAvail">Apply</button>   
                    </div>

					</form>
                </div>
            </div>
        </div>

<div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<form action="searchrooms.php" method="GET">
                    <div class="modal-body">
							<div class="form-group">
                                <p>Please input a range of dates that you would like to reserve a room for.</p>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Start date:</label>
                                <input type="date" class="form-control" name="startDate" required>
                            </div>
                            <div class="form-group">
								<label for="recipient-name" class="col-form-label">End date:</label>
                                <input type="date" class="form-control" name="endDate" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary" name="searchDate">Apply</button>   
                    </div>
					</form>
                </div>
            </div>
        </div>

<script>
        $('#priceModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomName = button.data('whatever');
            var modal = $(this);
            modal.find('.modal-title').text(roomName);
        });
	
		$('#amenitiesModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomName = button.data('whatever');
            var modal = $(this);
            modal.find('.modal-title').text(roomName);
        });
	
		$('#availModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomName = button.data('whatever');
            var modal = $(this);
            modal.find('.modal-title').text(roomName);
        });
	
		$('#dateModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomName = button.data('whatever');
            var modal = $(this);
            modal.find('.modal-title').text(roomName);
        });
</script>

<?php include_once 'footer.php' ?>