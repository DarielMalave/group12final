
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
		<?php
	
	if(isset($_POST['submit'])){
		$HID=$_POST['HID'];
	    $NAME=$_POST['NAME'];
		$Includes=$_POST['amenities'];
		$Image=$_POST['IMG'];
		
		$spl="insert into `userlog`(HIS,NAME,amenities,IMG) values('$HID','$NAME','$amenities','$IMG')";
		$result=mysqli_query($mysqli,$sql);
		if($result){
			header('location:editHP.php');
		}else{
			die(mysqli_error($mysqli));
		}
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


<div class="main_content">
<div id="blue-header"></div>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="pl-3 pt-3">
                        <h4 class="heading">Add Hotel</h4>
                        <hr>
                    </div>
                    
                    <div class="card-body">
                        <form action="editHP.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
								<div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">HID</label>
                                        <input type="text" required class="form-control" name="HID">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Hotel Name</label>
                                        <input type="text" required class="form-control" name="NAME">
                                    </div>
                                </div>
                           
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Includes </label>
                                        <input type="text" required class="form-control" name="amenities">
                                    </div>
								</div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Add Room Image</label>
                                        <input type="file" required class="form-control" name="IMG">
                                    </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <button type="submit" name="AddHotelM" class="btn btn-primary btn-block float-right">Add Hotel</button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</section>
<?php include_once 'footer.php' ?>
