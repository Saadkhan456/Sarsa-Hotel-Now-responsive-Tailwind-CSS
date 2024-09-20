<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Room</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>


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
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-4">Welcome Admin, To Admin Room Home Section</h1>
            <img src="../img/hotel2.jpg" alt="Hotel Image" class="mx-auto rounded shadow-lg">
        </div>
    </div>
    <script>document.getElementById('room-update').addEventListener('click', function() {
    var dropdown = document.getElementById('room-types');
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
});
</script>
</body>


</html>
