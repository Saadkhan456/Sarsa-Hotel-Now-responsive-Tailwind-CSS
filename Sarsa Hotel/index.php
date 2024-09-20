<?php
include('connection.php');
session_start();
?>
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
<nav class="navbar flex justify-between items-center bg-orange-600 text-white p-4 shadow-md fixed w-full">
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
<!-- Carousel -->
<div id="carouselExample" class="relative overflow-hidden rounded-lg">
  <!-- Carousel Inner -->
  <div class="relative w-full overflow-hidden">
    <!-- Slides -->
    <div class="flex transition-transform duration-500 ease-in-out" id="carouselSlides">
      <div class="carousel-item flex-shrink-0 w-full h-96 md:h-128 lg:h-144 xl:h-160 relative">
        <img src="img/Slider/Home-Slider-1.jpeg" class="w-full h-full object-cover" alt="Slide 1">
        <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-white bg-black bg-opacity-50">
          <h1 class="text-4xl font-bold text-center">Welcome To Sarsa Hotel</h1>
          <p class="text-xl mt-2 text-center">Enjoy our premium quality Hotels at low Price.</p>
        </div>
      </div>
      <div class="carousel-item flex-shrink-0 w-full h-96 md:h-128 lg:h-144 xl:h-160 relative">
        <img src="img/Slider/Home-Slider-2.jpeg" class="w-full h-full object-cover" alt="Slide 2">
        <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-white bg-black bg-opacity-50">
          <h1 class="text-4xl font-bold text-center">Welcome To Sarsa Hotel</h1>
          <p class="text-xl mt-2 text-center">Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item flex-shrink-0 w-full h-96 md:h-128 lg:h-144 xl:h-160 relative">
        <img src="img/Slider/Home-Slider-3.jpeg" class="w-full h-full object-cover" alt="Slide 3">
        <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-white bg-black bg-opacity-50">
          <h1 class="text-4xl font-bold text-center">Welcome To Sarsa Hotel</h1>
          <p class="text-xl mt-2 text-center">Enjoy our premium quality Hotels at low Price.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Carousel Controls -->
  <button id="prevBtn" class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white bg-black p-2 rounded-full">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
    </svg>
  </button>
  <button id="nextBtn" class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white bg-black p-2 rounded-full">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
  </button>
</div>

<!-- Room start -->
<h1 class="h-primary center text-4xl font-bold text-center mb-8">Rooms at Lowest Price</h1>

<section id="rooms-right" class="flex flex-col md:flex-row items-center justify-between p-4 bg-gray-100 my-4 border border-gray-300 shadow-lg">
  <div class="paras md:w-1/2">
    <p class="sectionTag text-2xl font-bold text-gray-800 mb-2">A.C Delux Room</p>
    <p class="sectionsubTag font text-gray-600 mb-4">
      We have the best services provider in Room Management with 24 hours room services and 24 hours check-out. We provide world-class services at a very low cost, i.e., 1100rs.
    </p>
    <p class="price text-lg text-gray-700 mb-4">Price per room: 1100Rs/-</p>
    <a href="room.php">
      <button class="price-btn bg-black text-white py-2 px-4 hover:bg-gray-800 transition duration-300 rounded-full">Book A Room</button>
    </a>
  </div>
  <div class="thumbnail md:w-1/2 mt-4 md:mt-0">
    <img src="img/Rooms/Deluxe AC Room.jpeg" alt="Deluxe AC Room" class="w-full h-auto rounded-xl shadow-lg border border-gray-300">
  </div>
</section>

<section id="rooms-left" class="flex flex-col md:flex-row items-center justify-between p-4 bg-gray-100 my-4 border border-gray-300 shadow-lg">
  <div class="paras md:w-1/2">
    <p class="sectionTag text-2xl font-bold text-gray-800 mb-2">A.C. Room</p>
    <p class="sectionsubTag font text-gray-600 mb-4">
      We have the best services provider in Room Management with 24 hours room services and 24 hours check-out. We provide world-class services at a very low cost, i.e., 900rs.
    </p>
    <p class="price text-lg text-gray-700 mb-4">Price per room: 900Rs/-</p>
    <a href="room.php">
      <button class="price-btn bg-black text-white py-2 px-4 hover:bg-gray-800 transition duration-300 rounded-full">Book A Room</button>
    </a>
  </div>
  <div class="thumbnail md:w-1/2 mt-4 md:mt-0">
    <img src="img/Rooms/AC Room.jpeg" alt="AC Room" class="w-full h-auto rounded-xl shadow-lg border border-gray-300">
  </div>
</section>

<section id="rooms-right" class="flex flex-col md:flex-row items-center justify-between p-4 bg-gray-100 my-4 border border-gray-300 shadow-lg">
  <div class="paras md:w-1/2">
    <p class="sectionTag text-2xl font-bold text-gray-800 mb-2">Non A.C. Room</p>
    <p class="sectionsubTag font text-gray-600 mb-4">
      We have the best services provider in Room Management with 24 hours room services and 24 hours check-out. We provide world-class services at a very low cost, i.e., 700rs.
    </p>
    <p class="price text-lg text-gray-700 mb-4">Price per room: 700Rs/-</p>
    <a href="room.php">
      <button class="price-btn bg-black text-white py-2 px-4 hover:bg-gray-800 transition duration-300 rounded-full">Book A Room</button>
    </a>
  </div>
  <div class="thumbnail md:w-1/2 mt-4 md:mt-0">
    <img src="img/Rooms/Non-AC Room.jpeg" alt="Non A.C. Room" class="w-full h-auto rounded-xl shadow-lg border border-gray-300">
  </div>
</section>
<!-- Room end -->


<!-- -------------------------food ------------------------ -->
<section id="services-container" class="py-8 bg-gray-100">
  <h1 class="h-primary center text-4xl font-bold text-center mb-8">Our Speciality</h1>
  
  <div id="services" class="flex flex-wrap justify-center">
    <div class="box w-full sm:w-1/2 lg:w-1/3 p-4">
      <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 h-full flex flex-col justify-between">
        <a href="food.php"><img src="img/manchurian.jpg" alt="manchurian" class="rounded-lg mb-4 w-full"></a>
        <h2 class="h-secondary center text-2xl font-semibold text-center mb-2">Chinese</h2>
        <p class="center text-center text-gray-600">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident facere fugiat facilis qui saepe quia? Aut, repudiandae?
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisicing elit. Quas nulla sit, perspiciatis temporibus unde
        </p>
      </div>
    </div>
    <div class="box w-full sm:w-1/2 lg:w-1/3 p-4">
      <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 h-full flex flex-col justify-between">
        <a href="food.php"><img src="img/pasta1.png" alt="pasta" class="rounded-lg mb-4 w-full"></a>
        <h2 class="h-secondary center text-2xl font-semibold text-center mb-2">Italian</h2>
        <p class="center text-center text-gray-600">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident facere fugiat facilis qui saepe quia? Aut, repudiandae?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas nulla sit, perspiciatis temporibus unde
        </p>
      </div>
    </div>
    <div class="box w-full sm:w-1/2 lg:w-1/3 p-4">
      <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 h-full flex flex-col justify-between">
        <a href="food.php"><img src="img/mah.jpg" alt="maharashtrian" class="rounded-lg mb-4 w-full"></a>
        <h2 class="h-secondary center text-2xl font-semibold text-center mb-2">Maharashtrian</h2>
        <p class="center text-center text-gray-600">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure mollitia aliquid labore illum ipsa aliquam ad, commodi voluptatum libero minima nesciunt autem quis minus nostrum.
        </p>
      </div>
    </div>
  </div>

  <div id="services" class="flex flex-wrap justify-center mt-8">
    <div class="box w-full sm:w-1/2 lg:w-1/3 p-4">
      <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 h-full flex flex-col justify-between">
        <a href="food.php"><img src="img/panner.jpeg" alt="panner" class="rounded-lg mb-4 w-full"></a>
        <h2 class="h-secondary center text-2xl font-semibold text-center mb-2">Punjabi</h2>
        <p class="center text-center text-gray-600">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident facere fugiat facilis qui saepe quia? Aut, repudiandae?
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus reiciendis saepe error modi quo vel!
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
      </div>
    </div>
    <div class="box w-full sm:w-1/2 lg:w-1/3 p-4">
      <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 h-full flex flex-col justify-between">
        <a href="food.php"><img src="img/dosa.jpg" alt="dosa" class="rounded-lg mb-4 w-full"></a>
        <h2 class="h-secondary center text-2xl font-semibold text-center mb-2">South-Indian</h2>
        <p class="center text-center text-gray-600">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident facere fugiat facilis qui saepe quia? Aut, repudiandae?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas nulla sit, perspiciatis temporibus unde
        </p>
      </div>
    </div>
    <div class="box w-full sm:w-1/2 lg:w-1/3 p-4">
      <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 h-full flex flex-col justify-between">
        <a href="food.php"><img src="img/faluda.jpeg" alt="faluda" class="rounded-lg mb-4 w-full"></a>
        <h2 class="h-secondary center text-2xl font-semibold text-center mb-2">Deserts</h2>
        <p class="center text-center text-gray-600">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure mollitia aliquid labore illum ipsa aliquam ad, commodi voluptatum libero minima nesciunt autem quis minus nostrum.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Map Section -->
<div class="p-6 space-y-6">
  <h1 class="text-2xl font-bold mb-4">Reach Us</h1>
  <div class="flex flex-col md:flex-row md:space-x-6">
    <!-- Map on the left -->
    <div class="relative overflow-hidden rounded-lg shadow-lg md:w-1/2">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.9786107753416!2d72.97714367337235!3d19.196136548193625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bbe555555555%3A0x28efcc6051f95b9b!2sSheth%20N.KT.T%20College%20Of%20Commerce%20And%20Sheth%20J.T.T%20College%20Of%20Science%20And%20Arts!5e0!3m2!1sen!2sin!4v1709730166863!5m2!1sen!2sin"
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="w-full h-full"
      ></iframe>
    </div>
    <!-- Details on the right -->
    <div class="md:w-1/2 flex flex-col justify-center space-y-6 pl-6">
      <div class="flex items-center space-x-4">
        <img src="img/incoming-call.gif" alt="Incoming Call" class="w-12 h-12">
        <a href="tel:+919987758208" class="text-blue-600 hover:text-blue-800 font-semibold text-lg">Call us +91 9987758208</a>
      </div>
      <div>
        <h6 class="text-gray-700 text-sm">
          Ganpat Jairam Kharkar Ali Marg, behind Collector Office, Kharkar Alley, Thane West, Thane, Maharashtra 400601
        </h6>
      </div>
    </div>
  </div>
</div>



<!-- FOOTER START -->
<footer class="relative bg-blueGray-200 pt-8 pb-6">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap text-left lg:text-left">
      <div class="w-full lg:w-6/12 px-4">
        <h4 class="text-3xl fonat-semibold text-blueGray-700">Let's keep in touch!</h4>
        <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
          Find us on any of these platforms, we respond 1-2 business days.
        </h5>
        <div class="mt-6 lg:mb-0 mb-6">
          <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
            <i class="fab fa-instagram"></i></button><button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
            <i class="fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
            <i class="fab fa-whatsapp"></i></button><button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
            <i class="fab fa-github"></i>
          </button>
        </div>
      </div>
      <div class="w-full lg:w-6/12 px-4">
        <div class="flex flex-wrap items-top mb-6">
          <div class="w-full lg:w-4/12 px-4 ml-auto">
            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Useful Links</span>
            <ul class="list-unstyled">
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://my-portfolio-ten-tau-89.vercel.app/">My portfolio</a>
              </li>
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.instagram.com/saad_khan_0_1/">instagram</a>
              </li>
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://github.com/Saadkhan456">Github</a>
              </li>
              <li>
              <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://wa.me/9987758208" target="_blank" rel="noopener noreferrer">WhatsApp</a>

            </ul>
          </div>
          <div class="w-full lg:w-4/12 px-4">
           
            
          </div>
        </div>
      </div>
    </div>
    <hr class="my-6 border-blueGray-300">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-4/12 px-4 mx-auto text-center">
        <div class="text-sm text-blueGray-500 font-semibold py-1">
          Copyright © <span id="get-current-year">2024</span><a href="https://www.linkedin.com/in/saad-khan-75aa11277/" class="text-blueGray-500 hover:text-gray-800" target="_blank"> Sarsa Hotel
          <a href="https://www.creative-tim.com?ref=njs-profile" class="text-blueGray-500 hover:text-blueGray-800">Creative Saad</a>.
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- FOOTER END -->
    

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
</body>

</html>
