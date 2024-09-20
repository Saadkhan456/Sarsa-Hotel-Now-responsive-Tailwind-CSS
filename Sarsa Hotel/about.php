<?php
include('dbcon.php');
include('header.php');
?>

<div class="about-container mx-auto p-6">
    <div class="about flex flex-col md:flex-row md:space-x-6">
        <!-- Carousel -->
        <div class="about1 md:w-1/2">
            <div id="carousel" class="relative w-full overflow-hidden rounded-md shadow-lg">
                <div class="carousel-inner flex transition-transform ease-in-out duration-500" style="transform: translateX(0%);">
                    <div class="carousel-item w-full flex-shrink-0">
                        <img src="img/About/AboutUs1.jpeg" alt="dinning" class="w-full h-auto">
                    </div>
                    <div class="carousel-item w-full flex-shrink-0">
                        <img src="img/deluxroom.jpg" alt="delux room" class="w-full h-auto">
                    </div>
                    <div class="carousel-item w-full flex-shrink-0">
                        <img src="img/dinning4.jpg" alt="dinning" class="w-full h-auto">
                    </div>
                </div>
                <!-- Carousel controls -->
                <button id="prev" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">❮</button>
                <button id="next" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">❯</button>
            </div>
        </div>

        <div class="about2 md:w-1/2 mt-6 md:mt-0">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome To Our Website</h1>
            <p class="text-gray-600 mb-4">Room service or in-room dining is a hotel service enabling guests to choose items of food and drink for delivery to their hotel room for consumption. Room service is organised as a subdivision within the food and beverage department of high-end hotel and resort properties. It is uncommon for room service to be offered in hotels that are not high-end, or in motels. Room service may also be provided for guests on cruise ships. Room service may be provided on a 24-hour basis or limited to late night hours only. Due to the cost of customized orders and delivery of room service, prices charged to the patron are typically much higher than in the hotel's restaurant or tuck shop, and a gratuity is expected.</p>
            <p class="text-gray-600">Room service or in-room dining is a hotel service enabling guests to choose items of food and drink for delivery to their hotel room for consumption. Room service is organised as a subdivision within the food and beverage department of high-end hotel and resort properties. It is uncommon for room service to be offered in hotels.</p>
        </div>
    </div>
    <div class="about-box mt-12">
        <div class="about-box-1 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="box1 bg-white rounded-md shadow-lg p-4">
                <div class="box1-img mb-4">
                    <img src="img/deluxroom.jpg" alt="delux" class="w-full h-auto rounded-md">
                </div>
                <div class="box1-text">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><a href="room.php">Rooms</a></h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>Delux AC Room</li>
                        <li>AC Room</li>
                        <li>Non AC Room</li>
                    </ul>
                    <p class="text-gray-600 font-semibold mt-4">Ganpat Jairam Kharkar Ali Marg,<br>behind Collector Office,<br>Kharkar Alley, Thane West, Thane,<br>Maharashtra 400601<br><a href="tel:+91 9987758208">+91 9987758208</a></p>
                </div>
            </div>

            <div class="box1 bg-white rounded-md shadow-lg p-4">
                <div class="box1-img mb-4">
                    <img src="img/dinning4.jpg" alt="dinning" class="w-full h-auto rounded-md">
                </div>
                <div class="box1-text">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><a href="food.php">Food</a></h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>South-Indian</li>
                        <li>Chinese</li>
                        <li>Deserts</li>
                    </ul>
                    <p class="text-gray-600 font-semibold mt-4">Ganpat Jairam Kharkar Ali Marg,<br>behind Collector Office,<br>Kharkar Alley, Thane West, Thane,<br>Maharashtra 400601<br><a href="tel:+91 9987758208">+91 9987758208</a></p>
                </div>
            </div>

            <div class="box1 bg-white rounded-md shadow-lg p-4">
                <div class="box1-img mb-4">
                    <img src="img/About/Staff.jpg" alt="staff" class="w-full h-auto rounded-md">
                </div>
                <div class="box1-text">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><a href="bookinghall.php">Our Motto</a></h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>अतिथि देवो भवः</li>
                        <li>Customer Satisfaction</li>
                        <li>Providing Best Facilities</li>
                    </ul>
                    <p class="text-gray-600 font-semibold mt-4">Ganpat Jairam Kharkar Ali Marg,<br>behind Collector Office,<br>Kharkar Alley, Thane West, Thane,<br>Maharashtra 400601<br><a href="tel:+91 9987758208">+91 9987758208</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const carousel = document.querySelector('#carousel .carousel-inner');
    const carouselItems = document.querySelectorAll('#carousel .carousel-item');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    let currentIndex = 0;

    function updateCarousel() {
        const offset = -currentIndex * 100;
        carousel.style.transform = `translateX(${offset}%)`;
    }

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : carouselItems.length - 1;
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex < carouselItems.length - 1) ? currentIndex + 1 : 0;
        updateCarousel();
    });
</script>
</body>
</html>
