<?php
    session_start();
    include("includes/database.php");
    include("includes/navbar.php");
    $index = 1;

    $query = "SELECT * FROM user NATURAL LEFT OUTER JOIN stay";
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
        <h1 class="display-4 text-center my-4">Users List</h1>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Room No</th>
                </tr>
            </thead>
            <tbody>

            <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr style="cursor: pointer;" onclick="window.location='single_user.php?id=<?php echo $row['id']?>'">
                    <th scope="row"><?php echo $index++ ?></th>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['room_no'] ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
        </div>

    <div style="margin-top:200px;"></div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
