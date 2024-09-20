<?php
include('../connection.php');

// Check if the delete button is clicked
if(isset($_GET['delete_user'])) {
    $username_to_delete = $_GET['delete_user'];
    // Perform the delete operation in the database
    $qry_delete = "DELETE FROM `registered_users` WHERE `username` = '$username_to_delete'";
    $run_delete = mysqli_query($con, $qry_delete);
    if($run_delete) {
        echo "<script>alert('User deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete user');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Room</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Oswald", sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .admin-room-details {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin: 50px auto;
            width: 90%; /* Make the container wider */
            max-width: 1000px; /* Limit the maximum width */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .admin-room-details h1 {
            text-align: center;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .delete-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="admin-room-details">
        <h1>Registered Users</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th> <!-- New column for delete button -->
            </tr>
            <?php
            $qry = "SELECT * FROM `registered_users`";
            $run = mysqli_query($con, $qry); // Change $con to use the connection variable from connection.php
            while ($row = mysqli_fetch_assoc($run)) {
                $name = $row['name'];
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
            ?>
                <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $password ?></td>
                    <td>
                        <form method="GET">
                            <input type="hidden" name="delete_user" value="<?php echo $username ?>">
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
