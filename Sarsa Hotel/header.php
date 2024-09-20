<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarsa Hotel</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
       <style>
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 60;
            /* Ensure it's above the carousel */
        }

        .mobile-menu.open {
            transform: translateX(0);
        }
        .navbar-scrolled {
            background-color: #000; /* Black background */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .carousel {
            z-index: 10;
            /* Lower z-index so that mobile menu appears above it */
        }

        .popup-container {
            z-index: 100;
            /* Higher number to ensure it appears above the navbar and other elements */
        }

        .navbar {
            z-index: 50;
            /* Ensure navbar is above the carousel but below the popups */
        }
        /* rooms css */
        .imgFluid {
            max-height: 200px;
            object-fit: cover;
        }
        /* room css end */
    </style>
</head>

<body class="bg-gray-100">
<nav class="bg-black sticky top-0 shadow-md rounded-full mt-8 navbar flex justify-between items-center bg-black-600 text-white p-4 shadow-md fixed w-full">

        <div class="left-nav flex items-center">
            <a href="index.php">
                <img src="img/Sarsalogo.jpeg" alt="logo" class="w-20 rounded-full">
            </a>
        </div>
        <div class="hidden sm:flex right-nav">
            <ul class="flex space-x-4">
                <li class="item"><a href="index.php" class="hover:text-gray-200">Home</a></li>
                <li class="item"><a href="about.php" class="hover:text-gray-200">About Us</a></li>
                <li class="item"><a href="room.php" class="hover:text-gray-200">Rooms</a></li>
                <li class="item"><a href="food.php" class="hover:text-gray-200">Food</a></li>
                <li class="item"><a href="contact.php" class="hover:text-gray-200">Contact Us</a></li>
                <li class="item"><a href="cart.php" class="hover:text-gray-200">Cart</a></li>
            </ul>
        </div>
        <div class="hidden sm:flex">
            <?php
            ob_start();
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                echo "
                    <div class='user'>
                        $_SESSION[username] - <a href='logout.php' class='text-gray-200 hover:text-gray-400'>LOGOUT</a>
                    </div>
                    ";
            } else {
                echo "
                    <div class='sign-in-up flex space-x-4'>
                        <button type='button' onclick=\"popup('login-popup')\">
                            <img src='img/User/Sign-in.gif' alt='Login' class='w-11 h-10 rounded-full'>
                        </button>
                        <button type='button' onclick=\"popup('register-popup')\">
                            <img src='img/User/Register.gif' alt='Register' class='w-11 h-10'>
                        </button>
                    </div>
                    ";
            }
            ?>
        </div>
        <div class="sm:hidden flex items-center">
            <!-- Mobile menu button-->
            <button type="button" class="inline-flex items-center justify-center p-2 text-white hover:text-gray-300 hover:bg-orange-700 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500" aria-controls="mobile-menu" aria-expanded="false" onclick="toggleMobileMenu()">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="mobile-menu" class="mobile-menu fixed inset-0 bg-white p-4 shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <button type="button" class="text-gray-500 hover:text-gray-700" onclick="toggleMobileMenu()">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <ul class="space-y-4">
            <li><a href="index.php" class="text-gray-700 hover:text-gray-900 block">Home</a></li>
            <li><a href="about.php" class="text-gray-700 hover:text-gray-900 block">About Us</a></li>
            <li><a href="room.php" class="text-gray-700 hover:text-gray-900 block">Rooms</a></li>
            <li><a href="food.php" class="text-gray-700 hover:text-gray-900 block">Food</a></li>
            <li><a href="contact.php" class="text-gray-700 hover:text-gray-900 block">Contact Us</a></li>
            <li><a href="cart.php" class="text-gray-700 hover:text-gray-900 block">Cart</a></li>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                echo "
                    <li class='user'>
                        $_SESSION[username] - <a href='logout.php' class='text-blue-500 hover:text-blue-700 block'>LOGOUT</a>
                    </li>
                    ";
            } else {
                echo "
                    <li class='sign-in-up flex space-x-4'>
                        <button type='button' onclick=\"popup('login-popup')\" class='block'>
                            <img src='img/User/Sign-in.gif' alt='Login' class='w-11 h-10 rounded-full'>
                        </button>
                        <button type='button' onclick=\"popup('register-popup')\" class='block'>
                            <img src='img/User/Register.gif' alt='Register' class='w-11 h-10'>
                        </button>
                    </li>
                    ";
            }
            ?>
        </ul>
    </div>

    <!-- Login Popup -->
    <div class="popup-container fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden" id="login-popup">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="login_register.php" method="POST">
                <h2 class="text-xl font-bold mb-4">
                    <span>User Login</span>
                    <button type="reset" class="text-red-500" onclick="popup('login-popup')">X</button>
                </h2>
                <input type="text" placeholder="E-mail or Username" name="email_username" required class="w-full p-2 mb-4 border rounded">
                <input type="password" placeholder="Password" name="password" required class="w-full p-2 mb-4 border rounded">
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded" name="login">Login</button>
            </form>
            <div class="text-right mt-2">
                <button type="button" class="text-blue-500" onclick="forgotPopup()">Forgot Password</button>
            </div>
        </div>
    </div>

    <!-- Register Popup -->
    <div class="popup-container fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden" id="register-popup">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="login_register.php" method="POST">
                <h2 class="text-xl font-bold mb-4">
                    <span>User REGISTER</span>
                    <button type="reset" class="text-red-500" onclick="popup('register-popup')">X</button>
                </h2>
                <input type="text" placeholder="FULL NAME" name="fullname" required pattern="[A-Za-z '-]+" class="w-full p-2 mb-4 border rounded">
                <input type="text" placeholder="USERNAME" name="username" required pattern="[A-Za-z0-9]+" class="w-full p-2 mb-4 border rounded">
                <input type="email" placeholder="EMAIL" name="email" required class="w-full p-2 mb-4 border rounded">
                <input type="password" placeholder="PASSWORD" name="password" required class="w-full p-2 mb-4 border rounded">
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded" name="register">REGISTER</button>
            </form>
        </div>
    </div>

    <!-- Forgot Password Popup -->
    <div class="popup-container fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden" id="forgot-popup">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="forgot.php" method="POST">
                <h2 class="text-xl font-bold mb-4">
                    <span>RESET PASSWORD</span>
                    <button type="reset" class="text-red-500" onclick="popup('forgot-popup')">X</button>
                </h2>
                <input type="email" placeholder="EMAIL" name="email" required class="w-full p-2 mb-4 border rounded">
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded" name="send-reset-link">SEND LINK</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.0/dist/typography.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
    const slides = document.getElementById('carouselSlides');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let index = 0;
    const totalSlides = slides.children.length;

    function showSlide(index) {
        const offset = -index * 100;
        slides.style.transform = `translateX(${offset}%)`;
    }

    prevBtn.addEventListener('click', () => {
        index = (index > 0) ? index - 1 : totalSlides - 1;
        showSlide(index);
    });

    nextBtn.addEventListener('click', () => {
        index = (index < totalSlides - 1) ? index + 1 : 0;
        showSlide(index);
    });

    // Auto-slide (optional)
    setInterval(() => {
        index = (index < totalSlides - 1) ? index + 1 : 0;
        showSlide(index);
    }, 5000);
});


        function popup(popupId) {
            var popup = document.getElementById(popupId);
            if (popup.classList.contains('hidden')) {
                popup.classList.remove('hidden');
            } else {
                popup.classList.add('hidden');
            }
        }

        function forgotPopup() {
            popup('login-popup'); // Close the login popup
            popup('forgot-popup'); // Open the forgot password popup
        }

        function toggleMobileMenu() {
            var mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu.classList.contains('open')) {
                mobileMenu.classList.remove('open');
            } else {
                mobileMenu.classList.add('open');
            }
        }
    

        document.addEventListener('DOMContentLoaded', () => {
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) { // Adjust this value to control when the navbar turns black
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    });

    </script>

    