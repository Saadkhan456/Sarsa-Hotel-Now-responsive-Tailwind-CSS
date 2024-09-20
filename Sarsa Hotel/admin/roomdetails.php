<?php
include('../dbcon.php');
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<style>
    .admin-room-details{
        background:rgba(255,255,255,0.5); 
        
    }
    .admin-room-details h1{
        text-align:center;
        margin-top: 20px;
        font-family: "Oswald", sans-serif;
    }
    body::before{
    position: absolute;
    content: "";
    height: 170%;
    width: 100%;
    z-index: -1;
    opacity: 0.89;
    font-family: "Oswald", sans-serif;
   
    }
    .admin-booking table tr{
        font-size:20px;
        font-family: "Oswald", sans-serif;
    }
</style>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5 p-4 bg-white shadow rounded">
    <nav class="bg-black p-4 rounded mb-6">
    <ul class="flex justify-around space-x-4 text-white">
        <li><a href="aroom.php" class="hover:text-orange-500">Room Home</a></li>
        <li class="relative">
            <a href="#" class="hover:text-orange-500" id="room-update">Room Update</a>
            <ul class="absolute hidden bg-black mt-1 rounded shadow-lg" id="room-types">
                <li><a href="adelux.php" class="block px-4 py-2 hover:bg-gray-700">Delux AC</a></li>
                <li><a href="aac.php" class="block px-4 py-2 hover:bg-gray-700">AC</a></li>
                <li><a href="anonac.php" class="block px-4 py-2 hover:bg-gray-700">Non AC</a></li>
            </ul>
        </li>
        <li><a href="booking.php" class="hover:text-orange-500">Booking</a></li>
        <li><a href="roomdetails.php" class="hover:text-orange-500">Room Details</a></li>
        <li><a href="admindash.php" class="hover:text-orange-500">Admin Dash</a></li>
    </ul>
</nav>
<div class="admin-room-details">
    <h1 class="text-blue-500 text-center text-3xl mb-4">Delux room details</h1>
    <table class="table-auto w-full">
        <tr>
            <th class="px-4 py-2 text-center">Room No</th>
            <th class="px-4 py-2 text-center">Room Type</th>
            <th class="px-4 py-2 text-center">Price</th>
            <th class="px-4 py-2 text-center">Status</th>
            <th class="px-4 py-2 text-center">Option</th>
        </tr>
        <?php
            $qry="SELECT * FROM `deluxacroom`";
            $run=mysqli_query($sql,$qry);
            while( $row=mysqli_fetch_assoc($run))
            {
                $rno=$row['roomno'];
                $rtype=$row['roomtype'];
                $price=$row['price'];
                $status=$row['status'];

                ?>
                <tr>
                    <td class="px-4 py-2 text-center"><?php echo $rno ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $rtype ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $price ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $status ?></td>
                    <td class="px-4 py-2 text-center"><a class="text-blue-500 hover:text-blue-700" href="co.php? rno=<?php echo $rno; ?>">Check Out</a></td>
                </tr>
                <?php
            }
        ?>
    </table>
</div>

<div class="admin-room-details">
    <h1 class="text-blue-500 text-center text-3xl mb-4">Ac room details</h1>
    <table class="table-auto w-full">
        <tr>
            <th class="px-4 py-2 text-center">Room No</th>
            <th class="px-4 py-2 text-center">Room Type</th>
            <th class="px-4 py-2 text-center">Price</th>
            <th class="px-4 py-2 text-center">Status</th>
            <th class="px-4 py-2 text-center">Option</th>
        </tr>
        <?php
            $qry="SELECT * FROM `acroom`";
            $run=mysqli_query($sql,$qry);
            while( $row=mysqli_fetch_assoc($run))
            {
                $rno=$row['roomno'];
                $rtype=$row['roomtype'];
                $price=$row['price'];
                $status=$row['status'];

                ?>
                <tr>
                    <td class="px-4 py-2 text-center"><?php echo $rno ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $rtype ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $price ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $status ?></td>
                    <td class="px-4 py-2 text-center"><a class="text-blue-500 hover:text-blue-700" href="co1.php? rno=<?php echo $rno; ?>">Check Out</a></td>
                </tr>
                <?php
            }
        ?>
    </table>
</div>
<div class="admin-room-details">
    <h1 class="text-blue-500 text-center text-3xl mb-4">Non Ac room details</h1>
    <table class="table-auto w-full">
        <tr>
            <th class="px-4 py-2 text-center">Room No</th>
            <th class="px-4 py-2 text-center">Room Type</th>
            <th class="px-4 py-2 text-center">Price</th>
            <th class="px-4 py-2 text-center">Status</th>
            <th class="px-4 py-2 text-center">Option</th>
        </tr>
        <?php
            $qry="SELECT * FROM `nonac`";
            $run=mysqli_query($sql,$qry);
            while( $row=mysqli_fetch_assoc($run))
            {
                $rno=$row['roomno'];
                $rtype=$row['roomtype'];
                $price=$row['price'];
                $status=$row['status'];

                ?>
                <tr>
                    <td class="px-4 py-2 text-center"><?php echo $rno ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $rtype ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $price ?></td>
                    <td class="px-4 py-2 text-center"><?php echo $status ?></td>
                    <td class="px-4 py-2 text-center"><a class="text-blue-500 hover:text-blue-700" href="co2.php? rno=<?php echo $rno; ?>">Check Out</a></td>
                </tr>
                <?php
            }
        ?>
    </table>
</div>

    