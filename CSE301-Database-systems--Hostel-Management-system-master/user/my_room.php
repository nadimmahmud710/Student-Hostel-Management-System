<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");

    $query = "SELECT * FROM stay WHERE id = '".$_SESSION['id']."' ";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 0)
    {
        echo "<center><h3><script>alert('You Do Not Have A Room !! Book A Room First !!');</script></h3></center>";
        header("refresh:0;url=user_home_page.php");
    }

    $query = "SELECT * FROM stay NATURAL JOIN room WHERE id = '".$_SESSION['id']."' ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
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
        <br><h1 class="text-center">My Room</h1><br>

        <ul class="list-group">
            <li class="list-group-item">Room No.       : <?php echo $row['room_no'] ?> </li>
            <li class="list-group-item">Total Seat     : <?php echo $row['total_seat'] ?> </li>
            <li class="list-group-item">Available Seat : <?php echo $row['available_seat'] ?> </li>
            <li class="list-group-item">Fee (BDT)      : <?php echo $row['fee'] ?> </li>
       </ul>

    </div>

    <div style="margin-top:200px;"></div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
