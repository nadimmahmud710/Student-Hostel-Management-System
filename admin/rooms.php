<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");

    if(isset($_POST['add_room']))
    {
        $room_no = $_POST['room_no'];
        $total_seat = $_POST['total_seat'];
        $fee = $_POST['fee'];

        $query = "INSERT INTO room (room_no, total_seat, available_seat, fee) VALUES ('$room_no', '$total_seat', '$total_seat', '$fee')";
        if(mysqli_query($db, $query))
        {
            echo "<center><h3><script>alert('New Room Added !!');</script></h3></center>";
            header("refresh:0;");
        }
        else
        {
            echo "<center><h3><script>alert('Error.. Could Not Add Room !!');</script></h3></center>";
            header("refresh:0;");
        }
    }

    if(isset($_GET['id']))
    {
        $room_no = $_GET['id'];
        $query = "DELETE FROM room WHERE room_no = '$room_no'";
        if(mysqli_query($db, $query))
        {
            echo "<center><h3><script>alert('Room Deleted !!');</script></h3></center>";
            header("refresh:0;url=rooms.php");
        }
        else
        {
            echo "<center><h3><script>alert('Error.. Could Not Delete Room !!');</script></h3></center>";
            header("refresh:0;url=rooms.php");
        }
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Hostel Management System</title>
</head>
<body>

    <div class="container">
        <h1 class="display-4 text-center my-4">Rooms</h1>

        <table class="table table-bordered">
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
                    <td><a href="rooms.php?id=<?php echo $row['room_no']?>"><button class="btn btn-outline-info">Delete</button></a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>

        <br>
        <button class="btn btn-info mb-4" data-target="#collapse-1" data-toggle="collapse">Add New Room</button>
        <div class="collapse" id="collapse-1">
            <div class="card">
                <div class="card-body">
                    <form action="rooms.php" method="post">
                        <div class="form-group">
                            <label>Room No</label>
                            <input class="form-control" type="num" name="room_no">
                        </div>
                        <div class="form-group">
                            <label>Total Seat</label>
                            <input class="form-control" type="num" name="total_seat" required>
                        </div>
                        <div class="form-group">
                            <label>Fee</label>
                            <input class="form-control" type="num" name="fee" required>
                        </div>

                        <br>
                        <button class="btn btn-info" name="add_room">Add</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div style="margin-top:200px;"></div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
