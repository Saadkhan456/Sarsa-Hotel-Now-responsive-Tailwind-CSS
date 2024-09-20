<?php
include('dbcon.php');
$ci = $_GET['ci'];
$co = $_GET['co'];
$rt = $_GET['rt'];
$nr = $_GET['nr'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <title>AC Room Form</title>
    <style>
        body {
            font-family: 'Oswald', sans-serif;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-semibold text-center mb-6">Please Fill Up The Form Given Below</h1>
        <form action="r1.php" method="post">
            <h2 class="text-xl font-semibold text-center mb-4">BOOK NOW</h2>
            <table class="w-full border border-gray-300 rounded-lg bg-orange-400 p-6">
                <tbody>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">Status</td>
                        <td class="py-2 px-4">
                            <input type="text" name="status" title="status" placeholder="Available" readonly class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">Name</td>
                        <td class="py-2 px-4">
                            <input type="text" name="name" title="name" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">Address</td>
                        <td class="py-2 px-4">
                            <input type="text" name="address" title="address" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">State</td>
                        <td class="py-2 px-4">
                            <input type="text" name="state" title="state" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">City</td>
                        <td class="py-2 px-4">
                            <input type="text" name="city" title="city" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">Email</td>
                        <td class="py-2 px-4">
                            <input type="email" name="email" title="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">Check-in Date</td>
                        <td class="py-2 px-4">
                            <input type="date" name="cin" title="cindate" value="<?php echo $ci; ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                        <tr></tr>
                        <td class="py-2 px-4 text-gray-700">Check-out Date</td>
                        <td class="py-2 px-4">
                            <input type="date" name="cout" title="coutdate" value="<?php echo $co; ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">Members</td>
                        <td class="py-2 px-4">
                            <input type="text" name="members" title="members" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">Room Type</td>
                        <td class="py-2 px-4">
                            <input type="text" name="roomtype" title="roomtype" value="<?php echo $rt; ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-gray-700">No of Rooms</td>
                        <td class="py-2 px-4">
                            <input type="text" name="noofroom" title="No of Room" value="<?php echo $nr; ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="py-4 text-center">
                            <input type="submit" name="submit" value="Submit" class="bg-blue-500 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-blue-600">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $ci = $_POST['cin'];
            $co = $_POST['cout'];
            $members = $_POST['members'];
            $roomtype = $_POST['roomtype'];
            $noofroom = $_POST['noofroom'];

            $qryy = "SELECT * FROM `deluxacroom` WHERE `status`='un book'";
            $run = mysqli_query($sql, $qryy);
            $row = mysqli_fetch_assoc($run);
            $rno = $row['roomno'];

            $qry = "INSERT INTO `room booking` (`id`, `name`, `address`, `state`, `city`, `email`, `cin`, `cout`, `members`, `roomtype`, `no of rooms`) VALUES (NULL, '$name', '$address', '$state', '$city', '$email', '$ci', '$co', '$members', '$roomtype', '$noofroom');";
            $run = mysqli_query($sql, $qry);

            if ($run == true) {
                mysqli_query($sql, "UPDATE `deluxacroom` SET `status`='book' WHERE `roomno`='$rno'");
                header('location:cartpayment2.php');
                ?>
                <script>
                    alert("Room booked successfully");
                </script>
                <?php
            }
        }
        ?>
    </div>
</body>
</html>
