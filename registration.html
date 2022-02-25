<?php
	include("includes/database.php");
	session_start();

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];

		$query = "SELECT email FROM user WHERE email = '$email'";
		$result = mysqli_query($db, $query);

		if(mysqli_num_rows($result))
		{
		    echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
		    header("refresh:0;");
    	}
		else
		{
			$query = "INSERT INTO user (id, name, password, email, phone, address, gender) VALUES ('', '$name', '$password', '$email', '$phone', '$address', '$gender')";
			if(mysqli_query($db, $query))
			{
				echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
				header("refresh:0;url=user_login.php");
			}
			else
			{
				echo "<center><h3><script>alert('Error.. Could Not Register !!');</script></h3></center>";
				header("refresh:0;url=registration.php");
			}
		}
	}
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hostel management</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<div class="container"><br><br>

  	<h1 class="text-center">Registration Form</h1><br>

  	<form method="post" action="registration.php">
  		<fieldset class="form-group">

  			<div class="form-group">
  				<label class="form-control-label">Name:</label>
  				<input class="form-control" type="text" name="name" placeholder="Write your name" required>
  			</div>
        <div class="form-group">
  				<label class="form-control-label">Password:</label>
  				<input class="form-control" type="password" name="password" placeholder="Enter password" required>
  			</div>

  		</fieldset>

  		<fieldset class="form-group">
  			<legend>Contact Info:</legend>

  			<div class="form-group">
  				<label class="form-control-label">Email:</label>
  				<input class="form-control" type="email" name="email" placeholder="Email" required>
  			</div>
  			<div class="form-group">
  				<label class="form-control-label">Phone Number:</label>
  				<input class="form-control" type="number" name="phone" placeholder="Phone Number" required>
  			</div>
				<div class="form-group">
  				<label class="form-control-label">Address:</label>
  				<textarea class="form-control" rows="5" name="address" required></textarea>
  			</div>
  		</fieldset>

  		<fieldset class="form-group">
  			<legend>Other Info:</legend>
  			<div class="form-group">
  				<label>Select Your Gender:</label>
  				<div class="form-check">
  					<label class="form-check-label">
  						<input type="radio" name="gender" value="Male" CHECKED/> Male
  					</label>
  				</div>
  				<div class="form-check">
  					<label class="form-check-label">
  						<input type="radio" name="gender" value="Female" /> Female
  					</label>
  				</div>
  			</div>
        <br>
        <button class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
  		</fieldset>
  	</form>

	</div>

  <div style="margin-top:200px;"></div>

  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
