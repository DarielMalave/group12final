<?php include_once 'header.php' ?>

<?php require_once 'protoProcess.php'; ?>
 
<?php 
        if (isset($_GET['status'])) {
            echo '<div class="alert alert-warning" role="alert">
  		Incorrect username or password. Please try again.
		</div>';
        }

        if (isset($_GET['please'])) {
            echo '<div class="alert alert-warning" role="alert">
  		Please login or register to reserve a room.
		</div>';
        }

		if (isset($_GET['registered'])) {
			echo "<div class='alert alert-success' role='alert'>User successfully registered!</div>";
		}
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Log In</h4>
                        <hr>
                        <p class="text-success text-center">Please log in to view and modify your reservations.</p>
                        <form action="protoProcess.php" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="username" class="form-control" placeholder="Enter username" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Enter password" type="password" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="login"> Login </button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Register</h4>
                        <hr>
                        <p class="text-success text-center">Please register to book reservations.</p>
                        <form action="protoProcess.php" method="POST">
                            <!-- Enter user name -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="enter_username" class="form-control" placeholder="Enter username"
                                        type="text" required>
                                </div>
                            </div>
                            <!-- Enter email -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="enter_email" class="form-control" placeholder="Enter email"
                                        type="email" required>
                                </div>
                            </div>
                            <!-- Enter password -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input name="enter_password" class="form-control" placeholder="Enter password"
                                        type="password" required>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <div class="form-group">
                                <button type="submit" name="register" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'footer.php' ?>