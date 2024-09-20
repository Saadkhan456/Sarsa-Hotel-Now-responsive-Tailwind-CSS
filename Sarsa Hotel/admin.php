<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <?php
    include('header.php');
    include('dbcon.php');
    ?>
    <div class="flex justify-center h-screen">
        <div class="admin-box bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2">
            <div class="admin-text">
                <h2 class="text-3xl font-bold mb-4 text-center">Admin Login</h2>
                <form action="" method="post">
                    <table class="w-full">
                        <tr>
                            <td class="w-1/2 p-4">Username</td>
                            <td class="w-1/2 p-4"><input type="text" name="un" id="username" class="w-full p-2 border border-gray-400 rounded" title="Enter Username"></td>
                        </tr>
                        <tr>
                            <td class="w-1/2 p-4">Password</td>
                            <td class="w-1/2 p-4"><input type="Password" name="ps" id="password" class="w-full p-2 border border-gray-400 rounded" title="Enter Password"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center p-4"><input type="submit" name="sub" id="btn" value="Login" class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded w-full"></td>
                        </tr>
                    </form>
                    <?php
                    if (isset($_POST['sub'])) {
                        $username = $_POST['un'];
                        $password = $_POST['ps'];
                        $qry = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
                        $run = mysqli_query($sql, $qry);
                        $row = mysqli_num_rows($run);
                        if ($row < 1) {
                            ?>
                            <script>
                                alert('Username or password not match !!');
                                window.open('admin.php', '_self');
                            </script>
                            <?php
                        } else {
                            header('location:admin/admindash.php');
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
