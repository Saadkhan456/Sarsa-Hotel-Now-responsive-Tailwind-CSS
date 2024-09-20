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
        </div>
    </div>
    </div>
    </div>
    <h1 class="text-3xl font-bold text-center mt-4 text-orange-500">AC Rooms insert Section</h1>

<div class="flex justify-center mt-4">
    <img src="../img/Rooms/Deluxe AC Room.jpeg" alt="delux ac" class="h-80 w-80 rounded-3xl shadow-lg">
</div>

<div class="max-w-md mx-auto mt-4 p-4 bg-white rounded-2xl shadow-lg border border-gray-200">
    <form action="adelux.php" method="post">
    <div class="mx-auto">
    <div class="mx-auto">
    <table class="w-full">
        <tr>
            <td class="text-lg font-bold">Room No</td>
            <td><input type="text" name="rno" placeholder="Enter Room No" title="Enter Room No" required class="p-2 pl-4 rounded-lg border border-gray-200"></td>
        </tr>
        <tr>
            <td class="text-lg font-bold">Room Type</td>
            <td><input type="text" name="type" placeholder="Enter Room Type " title="Room Type" required class="p-2 pl-4 rounded-lg border border-gray-200"></td>
        </tr>
        <tr>
            <td class="text-lg font-bold">Room Price</td>
            <td><input type="text" name="price" placeholder="Enter Room Price " title="Room Price" required class="p-2 pl-4 rounded-lg border border-gray-200"></td>
        </tr>
        <tr>
        <td colspan="2" class="text-center"><button id="delux-btn" class="bg-black text-white font-bold py-2 px-2 rounded-full border border-white hover:bg-black-700">Insert</button></td>
    </table>
</div>
</div>
    </form>
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
    <?php
      if(isset($_POST['submit']))
      {
          $rno=$_POST['rno'];
          $rtype=$_POST['type'];
          $price=$_POST['price'];
         
          $qry="INSERT INTO `acroom`(`id`, `roomno`, `roomtype`, `price`) VALUES ('','$rno','$rtype','$price')";
          $run=mysqli_query($sql,$qry);
          if($run==true)
          {
            ?>
            <script>
                alert('Data Inserted Successfully');
            </script>
            <?php
          }
          else{
              echo "Not Inserted";
          }

      }
    ?>
</div>
</body>
</html>
