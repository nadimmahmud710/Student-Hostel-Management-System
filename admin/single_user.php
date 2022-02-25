<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");

    if(isset($_POST['delete']))
    {
        $query = "DELETE FROM user WHERE id = '".$_SESSION['single_user_id']."' ";
        if(mysqli_query($db, $query))
        {
            echo "<center><h3><script>alert('User Deleted !!');</script></h3></center>";
            header("refresh:0;url=users.php");
        }
        else
        {
            echo "<center><h3><script>alert('Error.. Could Not Delete !!');</script></h3></center>";
            header("refresh:0;");
        }
    }

    if(isset($_POST['confirm']))
    {
        $query = "SELECT * FROM booking WHERE id = '".$_SESSION['single_user_id']."' ";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);

        $query = "INSERT INTO stay (id, room_no) VALUES ('".$row['id']."', '".$row['room_no']."')";
        mysqli_query($db, $query);

        $query = "SELECT * FROM room WHERE room_no = '".$row['room_no']."' ";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);

        $new_available_seat = $row['available_seat'] - 1;
        $query = "UPDATE room SET available_seat = '$new_available_seat' WHERE room_no = '".$row['room_no']."' ";
        mysqli_query($db, $query);

        $query = "DELETE FROM booking where id = '".$_SESSION['single_user_id']."' ";
        mysqli_query($db, $query);

        echo "<center><h3><script>alert('User Confirmed !!');</script></h3></center>";
        header("refresh:0;");
    }

    if(isset($_POST['reject']))
    {
        $query = "DELETE FROM booking where id = '".$_SESSION['single_user_id']."' ";
        mysqli_query($db, $query);

        echo "<center><h3><script>alert('User Rejected !!');</script></h3></center>";
        header("refresh:0;");
    }

    if(isset($_GET['id'])) $_SESSION['single_user_id'] = $_GET['id'];

    $query = "SELECT * FROM user NATURAL LEFT OUTER JOIN stay WHERE id = '".$_SESSION['single_user_id']."' ";
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
        <h1 class="display-4 text-center my-4">User Details</h1>

        <ul class="list-group">
            <li class="list-group-item">ID      : <?php echo $row['id'] ?> </li>
            <li class="list-group-item">Name    : <?php echo $row['name'] ?> </li>
            <li class="list-group-item">Room No : <?php echo $row['room_no'] ?> </li>
            <li class="list-group-item">Email   : <?php echo $row['email'] ?> </li>
            <li class="list-group-item">Phone   : <?php echo $row['phone'] ?> </li>
            <li class="list-group-item">Gender  : <?php echo $row['gender'] ?> </li>
            <li class="list-group-item">Address : <?php echo $row['address'] ?> </li>
       </ul>
       <br>
       <form action="single_user.php" method="post">
           <?php
            $query = "SELECT * FROM booking WHERE id = '".$_SESSION['single_user_id']."' ";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result)) {
            ?>
                <button class="btn btn-success mr-2" name="confirm">Confirm Entry</button>
                <button class="btn btn-warning" name="reject">Reject Entry</button>
                <br><br>
            <?php
            }
           ?>

           <button class="btn btn-danger" name="delete">Delete User</button>
       </form>
    </div>

    <div style="margin-top:200px;"></div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
