<?php include_once 'header.php' ?>
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
  <form action="createRoles.php" method="post">
	  <h2>Manage Roles</h2>
	  <h6>Create new roles for employees by entering all fields: </br>
		  	&nbsp;&nbsp;&nbsp;&nbsp;- Employee ID: The unique ID for the new employee. </br>
		  	&nbsp;&nbsp;&nbsp;&nbsp;- Hotel ID: The hotel ID of the hotel the employee will be working for. </br>
	  		&nbsp;&nbsp;&nbsp;&nbsp;- Email Address: The email address of the new employee, to recieve work emails. </br>
	  		&nbsp;&nbsp;&nbsp;&nbsp;- Password: The assigned password the new employee will use to sign in to the system. </br>
			&nbsp;&nbsp;&nbsp;&nbsp;- Access Character: The character specifying the level of permissions the new employee will have in the system. The character 'e' specifies they are a low level employee, and 'p' specifies they are a branch manager.</h6>
	  </br> 

	  <h5> Employee ID </h5>	  
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">  </div>
        <input name="empID" class="form-control" placeholder="Enter Employee ID" type="number" >
      </div>
    </div>
	
	<h5> Hotel ID </h5>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">  </div>
        <input name="hotelID"  class="form-control" placeholder="Enter Hotel ID" type="number">
      </div>
    </div>

	<h5> Email adress </h5>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">  </div>
        <input name="emailAddress"  class="form-control" placeholder="Enter Email Adress" type="email">
      </div>
    </div>

	<h5> Password </h5>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">  </div>
        <input name="password"  class="form-control" placeholder="Enter Password" type="text">
      </div>
    </div>

	<h5> Access Character </h5>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">  </div>
        <input name="accessChar"  class="form-control" placeholder="Enter Acess Character" type="text">
      </div>
    </div>

    <div class="form-group mr-4">
      <button type="submit" class="btn btn-primary" name="create-role" value="create-role"> Create </button>
      <!--<button type="submit reset" class="btn btn-primary" value="clear-all" name="clear-all" > Clear </button>-->
    </div>
    <!-- <p class="text-center"><a href="#" class="btn">Forgot password?</a></p> -->
  </form>
  </br>
  </br>
  <div class="row ml-3">
    
	  <?php 
	  
	 if(isset($_POST['create-role'])){
		 
		  include 'functionsM.php';
		  $mysqli = db_iconnectM("userlog");
		 
		 if(!empty($_POST['empID']) && !empty($_POST['hotelID']) && !empty($_POST['emailAddress']) && !empty($_POST['password']) && !empty($_POST['accessChar'])){ //all fields full
			 
			  $sql  = "SELECT * FROM employees WHERE employees.EID=". $_POST['empID'] .";";
		  
			$fetch = $mysqli->query($sql) or die("Info not available");
			 $reservationRows = $fetch->fetch_assoc();
			 if(empty($reservationRows['EID'])){ //employee with this ID does not exist yet
				$empID = $_POST['empID'];
			 	$hotelID =  $_POST['hotelID'];
			  	$emailAddress = $_POST['emailAddress'];
			  	$password = $_POST['password'];
			  	$accessChar = $_POST['accessChar'];
				// echo $empID; echo $hotelID; echo $emailAddress; echo $password; echo $accessChar;
				
				 $mysqli->query("INSERT INTO employees (EID, HID, EMAIL, PW, ACCESS) VALUES('$empID','$hotelID','$emailAddress', '$password','$accessChar' )") or die($mysqli->error);
				 
				 echo '<div class="callout" style="border: 2px solid; color: black; background:lightgrey;">
			  <div class="callout-header" style="background: green; color: black;">Error</div>
			  <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
			  <div class="callout-container" style="background: lightgrey;">
				
				<p>You have successfully entered a new employee to the system. </p>
			  </div>
			</div>';
				 
				 
				// echo "yess";
			 }else{
				 //employee with that EID already exists
				 		 	//echo "NON EMPTY";
				 echo '<div class="callout" style="border: 2px solid; color: black; background:lightgrey;">
			  <div class="callout-header" style="background: red;">Error</div>
			  <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
			  <div class="callout-container" style="background: lightgrey;">
				
				<p>Your reqeuest to create a new role has failed. </br> The employee ID you\'ve specified is already in use. Try a new employee ID. </p>
			  </div>
			</div>';
			 }
		 }
		 else{
			 echo '<div class="callout" style="border: 2px solid; color: black; background:lightgrey;">
			  <div class="callout-header" style="background: orange;">Error</div>
			  <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
			  <div class="callout-container" style="background: lightgrey;">
				<p>Your reqeuest to create a new role has failed. </br> You might not have filled each required entry. </p>
			  </div>
			</div>';
			//echo" <script>
  		//		alert('this is an alert');
		//	</script>";
			// echo "missing a field";//not all fields are full
		 }
	 }
	  
	  ?>
	  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  </div>
</div>
  </br>   </br> 
<?php include_once 'footer.php' ?>
</div>
</div>