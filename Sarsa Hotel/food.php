<?php
session_start(); // Start the session at the very top

include('header.php');
include('dbcon.php');
?>

  <!-- Food Cart Section -->
  <div class="container margin-top-40 mx-auto px-4 py-8"> <!-- Added mt-24 for extra top margin -->
        <!-- South Indian Section -->
        <h1 class="text-3xl font-bold text-center mb-8">South-Indian</h1>
        <div id="south" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/dosa.png" alt="Dosa" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Dosa</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 100</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Dosa">
                        <input type="hidden" name="price" value="100">
                    </form>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/idli.jpg" alt="Idli Sambhar" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Idli Sambhar</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 80</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Idli">
                        <input type="hidden" name="price" value="80">
                    </form>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/masakadosa.jpg" alt="Masala Dosa" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Masala Dosa</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 120</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Masala Dosa">
                        <input type="hidden" name="price" value="120">
                    </form>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/cheesedosa.jpg" alt="Cheese Dosa" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Cheese Dosa</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 120</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Cheese Dosa">
                        <input type="hidden" name="price" value="120">
                    </form>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/onion.jpg" alt="Onion Utthapa" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Onion Utthapa</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 110</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Onion Utthapa">
                        <input type="hidden" name="price" value="110">
                    </form>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/vadasambhar.jpg" alt="Vada Sambhar" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Vada Sambhar</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 120</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Vada Sambhar">
                        <input type="hidden" name="price" value="120">
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Italian Food Cart Section -->
    <div class="container mx-auto px-4 py-8 mt-24"> <!-- Added mt-24 for extra top margin -->
        <!-- Italian Section -->
        <h1 class="text-3xl font-bold text-center mb-8">Italian</h1>
        <div id="italian" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/chillipasta.jpg" alt="Chilli Pasta" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Chilli Pasta</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 200</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Chili Pasta">
                        <input type="hidden" name="price" value="200">
                    </form>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/burger.jpg" alt="Veg Cheese Burger" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Veg Cheese Burger</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 110</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Burger">
                        <input type="hidden" name="price" value="110">
                    </form>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/pasta.png" alt="Pasta" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Pasta</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 160</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Pasta">
                        <input type="hidden" name="price" value="160">
                    </form>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/pizza.jpg" alt="Pizza" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Pizza</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 250</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Pizza">
                        <input type="hidden" name="price" value="250">
                    </form>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/margereta.jpg" alt="Margereta" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Margereta</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 150</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Margereta">
                        <input type="hidden" name="price" value="150">
                    </form>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/capsi.jpg" alt="Capsi Pizza" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">New Capsi Pizza</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 160</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Capsi Pizza">
                        <input type="hidden" name="price" value="160">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Maharashtrian Food Cart Section -->
    <div class="container mx-auto px-4 py-8 mt-24"> <!-- Added mt-24 for extra top margin -->
        <!-- Maharashtrian Section -->
        <h1 class="text-3xl font-bold text-center mb-8">Maharashtrian</h1>
        <div id="mah" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/handi.jpg" alt="Veg Handi" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Veg Handi</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 100</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Handi">
                        <input type="hidden" name="price" value="100">
                    </form>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/maratha.jpg" alt="Veg Maratha" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Veg Maratha</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 140</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Maratha">
                        <input type="hidden" name="price" value="140">
                    </form>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/mah.png" alt="Maharashtrian Special Thali" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Maharashtrian Special Thali</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 360</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Maharashtrian Thali">
                        <input type="hidden" name="price" value="360">
                    </form>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/sandwich.jpg" alt="Sandwich" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Sandwich</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 100</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Sandwich">
                        <input type="hidden" name="price" value="100">
                    </form>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/panner.png" alt="Paneer Butter Masala" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Paneer Butter Masala</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 150</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Paneer Butter Masala">
                        <input type="hidden" name="price" value="150">
                    </form>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/frenchfries.jpg" alt="French Fries" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">French Fries</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 150</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="French Fries">
                        <input type="hidden" name="price" value="150">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Punjabi Food Cart Section -->
    <div class="container mx-auto px-4 py-8 mt-24"> <!-- Added mt-24 for extra top margin -->
        <!-- Punjabi Section -->
        <h1 class="text-3xl font-bold text-center mb-8">Punjabi</h1>
        <div id="punjabi" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/paneer-tikka.jpg" alt="Paneer Tikka" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Paneer Tikka</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 220</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Tikka">
                        <input type="hidden" name="price" value="220">
                    </form>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/shai.jpg" alt="Shai Paneer" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Shai Paneer</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 110</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Shai Paneer">
                        <input type="hidden" name="price" value="110">
                    </form>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/paratha.jpg" alt="Paneer Paratha" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Paneer Paratha</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 160</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Paneer Paratha">
                        <input type="hidden" name="price" value="160">
                    </form>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/paneer3.jpg" alt="Paneer Butter Masala" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Paneer Butter Masala</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 150</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Paneer Butter Masala">
                        <input type="hidden" name="price" value="150">
                    </form>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/panner.png" alt="Paneer Gravy" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Paneer Gravy</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 50</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Paneer Gravy">
                        <input type="hidden" name="price" value="50">
                    </form>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/thartarat.jpg" alt="Veg Thartarat" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Veg Thartarat</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 150</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Thartarat">
                        <input type="hidden" name="price" value="150">
                    </form>
                </div>
            </div>
        </div>
    </div>
       
   </div>
    <!-- Chinese Food Cart Section -->
    <div class="container mx-auto px-4 py-8 mt-24">
        <!-- Chinese Section -->
        <h1 class="text-3xl font-bold text-center mb-8">Chinese</h1>
        <div id="chinese" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/paneerchilli.jpg" alt="Paneer Chili" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Paneer Chili</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 120</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Paneer Chili">
                        <input type="hidden" name="price" value="120">
                    </form>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/manchu.png" alt="Manchurian" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Manchurian</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 110</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Manchurian">
                        <input type="hidden" name="price" value="110">
                    </form>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/sezwan.jpg" alt="Sezwan Rice" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Sezwan Rice</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 160</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Sezwan Rice">
                        <input type="hidden" name="price" value="160">
                    </form>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/nood.jpg" alt="Veg Dry Noodles" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Veg Dry Noodles</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 120</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Dry Noodles">
                        <input type="hidden" name="price" value="120">
                    </form>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/momo.jpg" alt="Boiled Momos" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Boiled Momos</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 170</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Momos">
                        <input type="hidden" name="price" value="170">
                    </form>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/hakka.jpg" alt="Hakka" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Hakka Noodles</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 110</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Hakka Noodles">
                        <input type="hidden" name="price" value="110">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Desserts Food Cart Section -->
    <div class="container mx-auto px-4 py-8 mt-24">
        <!-- Desserts Section -->
        <h1 class="text-3xl font-bold text-center mb-8">Desserts</h1>
        <div id="deserts" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/faluda.jpg" alt="Faluda" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Faluda</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 100</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Faluda">
                        <input type="hidden" name="price" value="100">
                    </form>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/chocochips.jpg" alt="Choco Chips Ice-cream" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Choco Chips Ice-cream</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 70</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Choco Chips Ice-cream">
                        <input type="hidden" name="price" value="70">
                    </form>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/cmilkshake.jpg" alt="Chocolate Milkshake" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Chocolate Milkshake</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 110</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Chocolate Milkshake">
                        <input type="hidden" name="price" value="110">
                    </form>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/mangomilk.jpg" alt="Mango Milk Shake" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Mango Milk Shake</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 150</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Mango Milk Shake">
                        <input type="hidden" name="price" value="150">
                    </form>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/vanila.jpg" alt="Vanilla Ice-cream" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Vanilla Ice-cream</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 50</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Vanilla Ice-cream">
                        <input type="hidden" name="price" value="50">
                    </form>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="img/strawberry.jpg" alt="Strawberry Ice-Cream" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold mb-2">Strawberry Ice-Cream</h5>
                    <p class="text-gray-600 mb-4">Price : Rs 170</p>
                    <form action="manage_cart.php" method="POST">
                        <button type="submit" name="add_to_cart" class="w-full bg-orange-500 text-white py-2 px-4 rounded-full hover:bg-orange-600 transition duration-300">Add to Cart</button>
                        <input type="hidden" name="item_name" value="Strawberry Ice-Cream">
                        <input type="hidden" name="price" value="170">
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>