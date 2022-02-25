<?php
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location: ../../index.php');
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

    <nav class="navbar navbar-dark bg-info navbar-expand">
        <div class="container">
          <a class="navbar-brand" href="admin_home_page.php">Hostel Management System</a>
            <ul class="navbar-nav">
              <li class="nav-item">
                  <form action="includes/navbar.php" method="post">
                      <button class="btn btn-info" name="logout">Logout</button>
                  </form>
              </li>
            </ul>
        </div>
      </nav>

      <div class="container">
          <h1 class="display-4 my-3">Admin Account</h1>
      </div>

  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
