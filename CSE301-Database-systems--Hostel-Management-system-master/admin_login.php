<?php
    include("includes/database.php");
    session_start();

    if(isset($_POST['submit']))
    {
        $username_entered = $_POST['username'];
        $password_entered = $_POST['password'];

        $query = "SELECT * FROM admin";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_array($result);
            if($row['username'] == $username_entered && $row['password'] == $password_entered)
                header('location: admin/admin_home_page.php'); 
            else
            {
                echo "<center><h3><script>alert('Login denied. Invalid ID or password !!');</script></h3></center>";
    		    header("refresh:0;");
            }
        }
        else
        {
            echo "<center><h3><script>alert('Database Error...');</script></h3></center>";
            header("refresh:0;");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hostel management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div style="margin-bottom:100px;"></div>

	<div class="container">
        <div class="card mx-auto" style="width: 50%">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link" href="user_login.php">User Login</a></li>
                    <li class="nav-item"><a class="nav-link active" href="admin_login.php">Admin Login</a></li>
                </ul>
            </div>

            <div class="card-body">
                <br>
                <form method="post" action="admin_login.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <br>
                    <button class="btn btn-primary btn-block" name="submit">Login</button>
                </form>
                <br>
            </div>
        </div>
        <br><br>
    </div>

  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
