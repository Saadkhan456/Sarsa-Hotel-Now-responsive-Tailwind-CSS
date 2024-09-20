<?php
include('header.php');
include('dbcon.php');

// Check if the connection was successful
if (!$sql) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch available rooms
function fetchRooms($sql, $table) {
    $qry = "SELECT * FROM `$table` WHERE `status`='un book'";
    $run = mysqli_query($sql, $qry);
    
    if (!$run) {
        die("Query failed: " . mysqli_error($sql));
    }
    
    return $run;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Room Page</title>
    <style>
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .flex-item {
            flex: 1;
            margin: 10px;
        }
        .flex-item img {
            max-width: 100%;
            height: auto;
        }
        .form-container {
            max-width: 600px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100">

<div id="carouselExampleCaptions" class="carousel slide rounded-lg overflow-hidden m-2">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/Rooms/Room slider-1.jpeg" class="d-block w-full h-96 object-cover" alt="...">
      <div class="carousel-caption d-none d-md-block mb-36">
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/Rooms/Room slider-2.jpeg" class="d-block w-full h-96 object-cover" alt="...">
      <div class="carousel-caption d-none d-md-block mb-36">
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/Rooms/Room slider-3.jpeg" class="d-block w-full h-96 object-cover" alt="...">
      <div class="carousel-caption d-none d-md-block mb-36">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div id="f1" class="p-6">
    <h2 class="text-2xl font-bold text-center"><i class="fas fa-hotel"></i> SEARCH YOUR ROOMS HERE</h2>
    <form action="room.php" method="get" class="flex flex-col items-center">
        <table class="table-auto mb-4">
            <tr>
                <th class="p-2">Check In Date</th>
                <th class="p-2">Check Out Date</th>
                <th class="p-2">Room</th>
            </tr>
            <tr>
                <td class="p-2">
                    <input type="date" name="ci" class="border rounded px-2 py-1" required>
                </td>
                <td class="p-2">
                    <input type="date" name="co" class="border rounded px-2 py-1" required>
                </td>
                <td class="p-2">
                    <select name="room" class="border rounded px-2 py-1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
        </table>
        <div class="mt-4">
            <input type="submit" name="sub" id="check-btn" value="Check" class="bg-orange-500 text-white px-4 py-2 rounded cursor-pointer">
        </div>
    </form>
</div>

</div>

<?php

if(isset($_GET['room'])) $r = $_GET['room']; else $r = "";
if(isset($_GET['ci'])) $ci = $_GET['ci']; else $ci = "";
if(isset($_GET['co'])) $co = $_GET['co']; else $co = "";

// Delux AC Room
$run = fetchRooms($sql, 'deluxacroom');
$row = mysqli_num_rows($run);
if($r <= $row) {
    echo renderRoomSection('Delux A.C. Room', 'Available', 1100, 'r1.php', 'Deluxe AC', $ci, $co, $r, 'img/Rooms/Deluxe AC Room.jpeg');
} else {
    echo renderUnavailableRoomSection('Delux A.C. Room');
}

// AC Room
$run = fetchRooms($sql, 'acroom');
$row = mysqli_num_rows($run);
if($r <= $row) {
    echo renderRoomSection('A.C. Room', 'Available', 900, 'r2.php', 'A.C Room', $ci, $co, $r, 'img/Rooms/AC Room.jpeg');
} else {
    echo renderUnavailableRoomSection('A.C. Room');
}

// Non AC Room
$run = fetchRooms($sql, 'nonac');
$row = mysqli_num_rows($run);
if($r <= $row) {
    echo renderRoomSection('Non A.C. Room', 'Available', 700, 'r3.php', 'Non AC', $ci, $co, $r, 'img/Rooms/Non-AC Room.jpeg');
} else {
    echo renderUnavailableRoomSection('Non A.C. Room');
}

// Function to render room section
function renderRoomSection($title, $status, $price, $action, $roomType, $checkIn, $checkOut, $numRooms, $image) {
    return "
    <section class='p-6'>
        <div class='bg-white rounded shadow'>
            <div class='p-4'>
                <img src='$image' alt='$title' class='rounded w-full h-96 object-cover mb-4'>
                <p class='text-xl font-bold'>$title</p>
                <p class='text-green-500'>Status: $status</p>
                <p>Price per room: $price Rs</p>
                <form action='$action' method='get' class='flex flex-col space-y-2'>
                    <input type='date' name='ci' value='$checkIn' required class='border rounded px-2 py-1'>
                    <input type='date' name='co' value='$checkOut' required class='border rounded px-2 py-1'>
                    <input type='text' name='rt' value='$roomType' readonly required class='border rounded px-2 py-1'>
                    <input type='text' name='nr' value='$numRooms' placeholder='No. Of Rooms' required class='border rounded px-2 py-1'>
                    <input type='submit' id='room-btn' value='Book' class='bg-orange-500 text-white px-4 py-2 rounded cursor-pointer'>
                </form>
            </div>
        </div>
    </section>
    ";
}

// Function to render unavailable room section
function renderUnavailableRoomSection($title) {
    return "
    <section class='p-6'>
        <div class='bg-white rounded shadow p-4'>
            <p class='text-xl font-bold'>$title</p>
            <p class='text-red-500'>Status: Not Available</p>
            <p class='text-red-500'>Sorry :( Please come another day</p>
        </div>
    </section>
    ";
}

include('headfooter.php');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
