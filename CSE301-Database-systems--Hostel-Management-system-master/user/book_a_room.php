<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");

    $query = "SELECT * FROM stay WHERE id = '".$_SESSION['id']."' ";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result))
    {
        echo "<center><h3><script>alert('You Already Have A Room !!');</script></h3></center>";
        header("refresh:0;url=user_home_page.php");
    }

    $query = "SELECT * FROM booking WHERE id = '".$_SESSION['id']."' ";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result))
    {
        echo "<center><h3><script>alert('You Already Requested For A Room !! Wait For Admin Response !!');</script></h3></center>";
        header("refresh:0;url=user_home_page.php");
    }

    if(isset($_GET['id']))
    {
        $r_no = $_GET['id'];
        $query = "SELECT * FROM room WHERE room_no = '$r_no'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        if($row['available_seat'])
        {
            $query = "INSERT INTO booking (id, room_no) VALUES ('".$_SESSION['id']."', '$r_no')";
            if(mysqli_query($db, $query))
			{
				echo "<center><h3><script>alert('Room Booking Request Sent !!');</script></h3></center>";
				header("refresh:0;url=user_home_page.php");
			}
			else
			{
				echo "<center><h3><script>alert('Error.. Could Not Book !!');</script></h3></center>";
				header("refresh:0;url=registration.php");
			}
        }
        else header('location: book_a_room.php');
    }

    $query = "SELECT * FROM room";
    $result = mysqli_query($db, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hostel Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <br><h1 class="text-center">Book A Room</h1><br>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
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
                        <th scope="row"><?php echo $row['room_no'] ?></th>
                        <td><?php echo $row['total_seat'] ?></td>
                        <td><?php echo $row['available_seat'] ?></td>
                        <td><?php echo $row['fee'] ?></td>
                        <td><a href="book_a_room.php?id=<?php echo $row['room_no']?>"><button class="btn btn-outline-info">BOOK</button></a></td>
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
