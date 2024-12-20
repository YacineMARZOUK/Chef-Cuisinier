
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Moha - Home</title>
    
    <!-- Favicon -->
    <link rel="icon" href="img\chef2.png" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-custom { color: #e65c00; }
        .bg-custom { background-color: #e65c00; }
        .hover\:bg-custom:hover { background-color: #cc5200; }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">


   
    <!-- Navbar -->
    <header class="bg-gray-200 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center p-5">
        <div class="flex items-center space-x-3">
            <img src="img\chef2.png" alt="Chef Moha Logo" class="h-10 w-13">
            <a href="#" class="text-2xl font-bold text-custom">Chef Moha</a>
        </div>
            <nav class="hidden md:flex space-x-6">
                <a href="#about" class="text-gray-700 hover:text-custom">About</a>
                <a href="#menu" class="text-gray-700 hover:text-custom">Menu</a>
                <a href="#booking" class="text-gray-700 hover:text-custom">Book Now</a>
                <a href="#contact" class="text-gray-700 hover:text-custom">Contact</a>
            </nav>
            <button class="md:hidden text-custom" id="mobileMenuButton">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
        
    </header>

    <div class="md:hidden bg-[#d9d9d9] shadow-lg hidden" id="mobileMenu">
        <a href="#about" class="block px-5 py-3 text-gray-700 hover:bg-gray-100">About</a>
        <a href="#menu" class="block px-5 py-3 text-gray-700 hover:bg-gray-100">Menu</a>
        <a href="#booking" class="block px-5 py-3 text-gray-700 hover:bg-gray-100">Book Now</a>
        <a href="#contact" class="block px-5 py-3 text-gray-700 hover:bg-gray-100">Contact</a>
    </div>

    <section class="bg-cover bg-center h-screen relative bg-[url('img/food1.avif')]">
        <div class="bg-black bg-opacity-50 absolute inset-0"></div>
        <div class="container mx-auto flex flex-col justify-center items-center h-full text-white relative">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 text-center">Experience the Art of Fine Dining</h1>
            <p class="text-lg md:text-xl mb-6 text-center">Book your exclusive culinary journey with our world-renowned chef.</p>
            <a href="#menu" class="px-6 py-3 bg-custom hover:bg-custom rounded-full text-lg font-semibold">Book Now</a>
        </div>
    </section>

    <section id="about" class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-custom mb-6">About the Chef Moha </h2>
            <p class="text-gray-700 text-lg md:w-3/4 mx-auto">
                Our chef is a global culinary icon, offering unparalleled dining experiences that combine artistry and flavor. Explore unique menus crafted with the finest ingredients from around the world.
            </p>
        </div>
    </section>

    <section id="menu" class="py-16 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-custom mb-6">Our Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-50 shadow-lg rounded-lg p-6">
                <img src="img\food1.avif" alt="Appetizers" class="w-full h-50 object-cover rounded-md mb-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Appetizers</h3>
                <p class="text-gray-600">Delightful starters to awaken your taste buds.</p>
            </div>
            <div class="bg-gray-50 shadow-lg rounded-lg p-6">
                <img src="img\food1.avif" alt="Main Courses" class="w-full h-50 object-cover rounded-md mb-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Main Courses</h3>
                <p class="text-gray-600">A selection of exquisite dishes to satisfy every palate.</p>
            </div>
            <div class="bg-gray-50 shadow-lg rounded-lg p-6">
                <img src="img\food1.avif" alt="Desserts" class="w-full h-50 object-cover rounded-md mb-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Desserts</h3>
                <p class="text-gray-600">Decadent treats to end your meal on a high note.</p>
            </div>
        </div>
    </div>
</section> 


    
    <!-- form de reservation  -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-custom mb-6">Sign Up / Sign In</h2>
            <div class="space-x-6">
                <button id="showSignUp" class="px-6 py-3 bg-custom text-white rounded-full">Sign Up</button>
                <button id="showSignIn" class="px-6 py-3 bg-gray-300 text-gray-800 rounded-full">Sign In</button>
            </div>
            
            <!-- Sign Up Form -->
            <div id="signUpForm" class="space-y-6 hidden mt-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4 ">Sign Up</h3>
                <form action="signup.php" method="POST" class="max-w-md mx-auto bg-white p-6 shadow-lg rounded-lg space-y-6">
                    <div>
                        <label for="nom" class="block text-left text-gray-700">Full Name</label>
                        <input type="text" id="nom" name="nom" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Full Name" >
                    </div>
                    <div>
                        <label for="email" class="block text-left text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Email" >
                    </div>
                    <div>
                        <label for="password" class="block text-left text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Password" >
                    </div>
                    
                    <div>
                        <label for="adresse" class="block text-left text-gray-700">Address</label>
                        <textarea name="adresse" id="adresse" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Address" ></textarea>
                    </div>
                    <button type="submit" class="w-full bg-custom text-white p-3 rounded-lg">Sign Up</button>
                </form>
            </div>

            <!-- Sign In Form -->
            <div id="signInForm" class="space-y-6 hidden mt-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Sign In</h3>
                <form action="signin.php" method="POST" class="max-w-md mx-auto bg-white p-6 shadow-lg rounded-lg space-y-6">
                    <div>
                        <label for="email_signin" class="block text-left text-gray-700">Email</label>
                        <input type="email" id="email_signin" name="email" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Email" >
                    </div>
                    <div>
                        <label for="password" class="block text-left text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Password" >
                    </div>
                    <button type="submit" class="w-full bg-custom text-white p-3 rounded-lg">Sign In</button>
                </form>
            </div>
        </div>
    </section>
    




     
    <footer class="bg-gray-800 text-gray-400 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Chef Moha. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>
