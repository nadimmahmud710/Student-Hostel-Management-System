<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");

    $query = "SELECT * FROM user WHERE id = '".$_SESSION['id']."' ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);

    if(isset($_POST['update']))
    {
        $query = "UPDATE user SET password='".$_POST['password']."', phone='".$_POST['phone']."', address='".$_POST['address']."' WHERE id = '".$_SESSION['id']."' ";
        $result = mysqli_query($db, $query);

        header('location: profile.php');
    }
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
        <br><h1 class="text-center">Edit Profile</h1><br>
        <form action="edit_profile.php" method="post">

            <div class="form-group">
                <label>ID</label>
                <input class="form-control" type="text" name="id" value= <?php echo $row['id'] ?> readonly>
            </div>
            <div class="form-group">
                <label>Name</label>
                <textarea class="form-control" rows="1" name="name" readonly><?php echo $row['name'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" value= <?php echo $row['password'] ?> required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="email" value= <?php echo $row['email'] ?> readonly>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input class="form-control" type="number" name="phone" value= <?php echo $row['phone'] ?> required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input class="form-control" type="text" name="gender" value= <?php echo $row['gender'] ?> readonly>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" rows="5" name="address" required><?php echo $row['address'] ?></textarea>
            </div>

            <br>
            <button class="btn btn-primary" name="update">Update</button>

        </form>
    </div>

  <div style="margin-top:200px;"></div>

  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
