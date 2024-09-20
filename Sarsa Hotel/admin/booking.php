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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="stylee.css">
</head>
<style>
    .admin-booking {
        background: rgba(255,255,255,0.5); 
    }
    .admin-booking h1 {
        text-align: center;
        margin-top: 20px;
    }
    body::before {
        position: absolute;
        content: "";
        height: 100%;
        width: 100%;
        z-index: -1;
        opacity: 0.89;
        background: url('../img/adminhotel2.jpg') center center/cover no-repeat;
    }
    .admin-booking table tr {
        font-size: 20px;
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

<div class="admin-booking">
    <h1 class="text-3xl text-center mb-4">Welcome Admin To Booking</h1>
    <table class="table-auto w-full">
        <tr>
            <th class="px-4 py-2 text-center">Name</th>
            <th class="px-4 py-2 text-center">Address</th>
            <th class="px-4 py-2 text-center">State</th>
            <th class="px-4 py-2 text-center">City</th>
            <th class="px-4 py-2 text-center">Email</th>
            <th class="px-4 py-2 text-center">Check In Date</th>
            <th class="px-4 py-2 text-center">Check Out Date</th>
            <th class="px-4 py-2 text-center">Members</th>
            <th class="px-4 py-2 text-center">Room Type</th>
            <th class="px-4 py-2 text-center">Actions</th>
        </tr>
        <?php
           $qry="SELECT * FROM `room booking`";
           $run=mysqli_query($sql,$qry);
            
             while($row=mysqli_fetch_assoc($run)) {
                $id = $row['id']; // Assuming 'id' is the primary key of your table
                $name=$row['name'];
                $address=$row['address'];
                $state=$row['state'];
                $city=$row['city'];
                $email=$row['email'];
                $ci=$row['cin'];
                $co=$row['cout'];
                $members=$row['members'];
                $roomtype=$row['roomtype'];

                echo "<tr>";
                echo "<td class='px-4 py-2 text-center'>$name</td>";
                echo "<td class='px-4 py-2 text-center'>$address</td>";
                echo "<td class='px-4 py-2 text-center'>$state</td>";
                echo "<td class='px-4 py-2 text-center'>$city</td>";
                echo "<td class='px-4 py-2 text-center'>$email</td>";
                echo "<td class='px-4 py-2 text-center'>$ci</td>";
                echo "<td class='px-4 py-2 text-center'>$co</td>";
                echo "<td class='px-4 py-2 text-center'>$members</td>";
                echo "<td class='px-4 py-2 text-center'>$roomtype</td>";
                echo "<td class='px-4 py-2 text-center'><a class='text-blue-500 hover:text-blue-700' href='delete_booking.php?id=$id'>Delete</a></td>";
                echo "</tr>";
             }
        ?>
    </table>
</div>