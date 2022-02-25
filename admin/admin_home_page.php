<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");

    if(isset($_POST['submit1'])) header('location: profile.php');
    if(isset($_POST['submit2'])) header('location: users.php');
    if(isset($_POST['submit3'])) header('location: rooms.php');
    if(isset($_POST['submit4'])) header('location: booking_request.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hostel Management System</title>
</head>
<body>
    <div style="margin-top:100px;"></div>

    <form action="admin_home_page.php" method="post">
        <div class="container">

            <div class="card-deck">
              <div class="card">
                <div class="card-body">
                  <h4 class="text-center">PROFILE</h4><br>
                  <button class="btn btn-outline-info btn-block" name="submit1">Details</button>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="text-center">USERS</h4><br>
                  <button class="btn btn-outline-info btn-block" name="submit2">Details</button>
                </div>
              </div>
            </div>

            <br><br>

            <div class="card-deck">
              <div class="card">
                  <div class="card-body">
                      <h4 class="text-center">ROOMS</h4><br>
                      <button class="btn btn-outline-info btn-block" name="submit3">Details</button>
                  </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="text-center">BOOKING REQUEST</h4><br>
                  <button class="btn btn-outline-info btn-block" name="submit4">Details</button>
                </div>
              </div>
            </div>

        </div>
    </form>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
