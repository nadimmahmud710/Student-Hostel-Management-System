<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");

    $query = "SELECT * FROM booking NATURAL JOIN room";
    $result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Hostel Management System</title>
</head>
<body>

    <div class="container">
        <h1 class=" text-center my-5">Booking Requests</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Room No</th>
                    <th>Total Seat</th>
                    <th>Available Seat</th>
                    <th>Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['room_no'] ?></td>
                    <td><?php echo $row['total_seat'] ?></td>
                    <td><?php echo $row['available_seat'] ?></td>
                    <td><?php echo $row['fee'] ?></td>
                    <td><a href="single_user.php?id=<?php echo $row['id']?>"><button class="btn btn-outline-info">Check User</button></a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
