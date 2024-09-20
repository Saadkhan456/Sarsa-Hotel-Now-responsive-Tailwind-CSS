<?php
include('dbcon.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <!-- Contact Information -->
        <div class="flex flex-col lg:flex-row items-center gap-8 mb-12">
            <!-- Social Media Links -->
            <div class="flex flex-col items-center lg:items-start gap-4 mb-8 lg:mb-0">
                <div class="flex space-x-4">
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-2xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-pink-600 hover:text-pink-800 text-2xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-600 text-2xl"><i class="fab fa-twitter-square"></i></a>
                    <a href="#" class="text-red-600 hover:text-red-800 text-2xl"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="mt-4">
                    <a href="#" class="text-blue-500 hover:text-blue-700 text-lg">Our Website</a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="flex-1 bg-white border border-gray-200 rounded-lg shadow-md p-6">
                <h1 class="text-2xl font-bold mb-4 text-center">Don't Hesitate To Contact Us</h1>
                <form action="contact.php" method="post">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Mobile:</label>
                        <input type="tel" name="phone" id="phone" placeholder="Enter Your Phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
                        <input type="text" name="address" id="address" placeholder="Enter Your Address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Message:</label>
                        <textarea name="message" id="message" cols="20" rows="6" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" name="con-btn" class="w-full bg-orange-500 text-white py-2 px-4 rounded-md hover:bg-orange-600 transition duration-300">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['con-btn'])) {
        $con_name = $_POST['name'];
        $con_email = $_POST['email'];
        $con_mobile = $_POST['phone'];
        $con_address = $_POST['address'];
        $con_message = $_POST['message'];

        $qry = "INSERT INTO `contact`(`id`, `name`, `email`, `mobile`, `address`, `message`) VALUES ('','$con_name','$con_email','$con_mobile','$con_address','$con_message')";

        $run = mysqli_query($sql, $qry);
        if ($run) {
            ?>
            <script>
                alert("Thanks For Contacting Us");
            </script>
            <?php
        }
    }
    ?>
</body>
</html>
