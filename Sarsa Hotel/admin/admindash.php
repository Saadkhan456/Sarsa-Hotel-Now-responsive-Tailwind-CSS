<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-black">>
    <nav class="flex justify-around items-center py-4 bg-black text-white">
        <div class="container mx-auto flex justify-around items-center">
            <div class="left-nav">
                <span class="admin-panel text-lg font-bold mx-4 text-white">Admin Panel</span>
            </div>
            <div class="right-nav hidden sm:flex justify-around items-center">
                <ul class="flex space-x-12">
                    <li class="item transition duration-300 ease-in-out transform hover:scale-105">
                        <a href="aroom.php" class="text-white hover:text-gray-200">Rooms</a>
                    </li>
                    <li class="item transition duration-300 ease-in-out transform hover:scale-105">
                        <a href="adminfood.php" class="text-white hover:text-gray-200">Food</a>
                    </li>
                    <li class="item transition duration-300 ease-in-out transform hover:scale-105">
                        <a href="user_details.php" class="text-white hover:text-gray-200">User</a>
                    </li>
                </ul>
            </div>
            <!-- Mobile menu button -->
            <button class="sm:hidden flex items-center justify-center p-2 text-white hover:text-gray-200" aria-controls="mobile-menu" aria-expanded="false" onclick="toggleMobileMenu()">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="mobile-menu" class="mobile-menu fixed inset-0 bg-white p-4 shadow-lg hidden">
        <div class="flex justify-between items-center mb-4">
            <button type="button" class="text-gray-500 hover:text-gray-700" onclick="toggleMobileMenu()">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <ul class="space-y-4">
            <li><a href="aroom.php" class="text-gray-700 hover:text-gray-900 block">Rooms</a></li>
            <li><a href="adminfood.php" class="text-gray-700 hover:text-gray-900 block">Food</a></li>
            <li><a href="user_details.php" class="text-gray-700 hover:text-gray-900 block">User</a></li>
        </ul>
    </div>

    <section id="home" class="h-screen flex justify-center items-center bg-black">
        <div class="bg-black w-4/5 h-4/5 rounded-lg shadow-lg text-center">
            <h1 class="text-4xl font-bold text-white pt-12">Welcome Admin</h1>
            <img src="https://www.datamanagements.in/wp-content/uploads/2022/01/gif.gif" alt="Welcome Animation" class="w-64 h-64 mx-auto mt-8 rounded">
<img src="https://www.hotelmanagement.net/wp-content/uploads/2020/03/hotel-administrator.jpg" alt="Hotel Admin" class="w-64 h-64 rounded-full object-cover mx-auto my-4">
        </div>
    </section>

    <script>
        function toggleMobileMenu() {
            var mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        }
    </script>
</>

</html>
