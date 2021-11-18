<?php include_once 'header.php' ?>
<?php include_once 'functionsM.php' ?>
<?php
	
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

?>
<?php 
	

	if(!isset($_SESSION['EID']) && empty($_SESSION['EID'])){
		header("location: accessDeniedM.php");
	}
	
?>
<?php ?>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<div class="wrapper">
<?php require_once 'sideNavbarM.php'; ?>

<div class="main_content">
<div id="blue-header"></div>
<?php  
	if($_SESSION['ACCESS'] == "p"){
	echo "<div class=\"header\">You are currently logged in as an administrator with [Employee] permissions. </div>";  
	}
	if($_SESSION['ACCESS'] == "f"){
		echo "<div class=\"header\">You are currently logged in as an administrator with [Branch Manager] permissions. </div>";  
	}
		
		?>
<div class="info">
  <form action="editHotelM.php" method="post">
	  <h2>Edit or Delete Hotels</h2>
	  <h6>Reservations can be viewed based on the filters below: </br>
		  	&nbsp;&nbsp;&nbsp;&nbsp;- Both, one, or no entries can be entered. </br>
		  	&nbsp;&nbsp;&nbsp;&nbsp;- Entering both entries will filter out reservations that dont meet both criteria. </br>
	  		&nbsp;&nbsp;&nbsp;&nbsp;- Entering one entry will display reservations that meet only that characteristic.</br>
	  		&nbsp;&nbsp;&nbsp;&nbsp;- Entering no entries will show all current reservations.</h6>
	  </br> 

  </form>
<dis class="container">
	<button class= "btn btn-secondary mr-5"><a href= "AddHotelM.php" class = "text-light">Add Hotels</a> </button>
</dis>

  </br>
  </br>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">HID</th>
      <th scope="col">Hotel Name</th>
      <th scope="col">description</th>
      <th scope="col">Includes</th>
	  <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
	  
<?php
	  $sql="SELECT A.hotelName, A.amenities, A.image, A.description, B.HID FROM `buildings` A, `hotels` B WHERE A.hotelName=B.NAME";
	  
    $result = mysqli_query($mysqli,$sql);
	  
	  if ($result){
		  while($row = mysqli_fetch_assoc($result)){
			  $HID = $row['HID'];
			  $NAME = $row['hotelName'];
			  $description = $row['description'];
			  $amenities = $row['amenities'];
			  $IMG = $row['image'];
			  echo '
                    <th scope="row">'.$HID.'</th>
                    <td>'.$NAME.'</td>
                    <td>'.$description.'</td>
                    <td>'.$amenities.'</td>
					<td>'.$IMG.'</td>
					<td>
					<button class ="btn btn-secondary"><a href ="editHotelM.php" class="text-light">Update</a></button>
					</td>
					<td>
					<button class = "btn btn-danger"><a href = "delete.php" class="text-light"> Delete</a></button>
					</td>
                    </tr>';
			  
		  }
			 
	  }
	  
	  ?>
	  
	  
 <!--   <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
-->
  </tbody>
</table>

</div>
  </br>   </br> 
<?php include_once 'footer.php' ?>
</div>
</div>