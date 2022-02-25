<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");

    if(isset($_POST['edit'])) header('location: edit_profile.php');

    $query = "SELECT * FROM user WHERE id = '".$_SESSION['id']."' ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bootstrap</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <br><h1 class="text-center">PROFILE</h1><br>

        <ul class="list-group">
            <li class="list-group-item">ID      : <?php echo $row['id'] ?> </li>
            <li class="list-group-item">Name    : <?php echo $row['name'] ?> </li>
            <li class="list-group-item">Email   : <?php echo $row['email'] ?> </li>
            <li class="list-group-item">Phone   : <?php echo $row['phone'] ?> </li>
            <li class="list-group-item">Gender  : <?php echo $row['gender'] ?> </li>
            <li class="list-group-item">Address : <?php echo $row['address'] ?> </li>
       </ul>

       <br><br>
       <form action="profile.php" method="post">
           <button class="btn btn-primary" name="edit">Edit Profile</button>
       </form>
    </div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
