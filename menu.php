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
    <?php
    include("config.php");
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_menu = $_POST["id_menu"];
        $date = $_POST["date"];
        $heure = $_POST["heure"];
        $nombre_personnes = $_POST["nombre_personnes"];
        $quantite = $_POST["quantite"];
        $id_user = $_SESSION['id'];

        
        $sql = "INSERT INTO reservation (date, heure,id_utilisateur, nombre_personnes, id_menu, quantite) 
                VALUES ('$date', '$heure','$id_user', '$nombre_personnes', '$id_menu', '$quantite')";

    
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Reservation successfully added!');</script>";
            header ('Location: tabclient.php');
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    ?>

    
        <!-- Navbar -->
        <header class="bg-gray-200 shadow-lg sticky top-0 z-50">
            <div class="container mx-auto flex justify-between items-center p-5">
            <div class="flex items-center space-x-3">
                <img src="img\chef2.png" alt="Chef Moha Logo" class="h-10 w-13">
                <a href="index.php" class="text-2xl font-bold text-custom">Chef Moha</a>
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
        </div><br><br>
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
    <?php
    include('config.php');
    $menuQuery = "SELECT id_menu, nom_menu FROM menu";
    $menuResult = $conn->query($menuQuery);
    if ($menuResult === false) {
        echo "Error fetching menus: " . $conn->error;
        exit;
    }
    ?>
    <form action="" method="POST" class="max-w-lg mx-auto bg-gray-50 p-6 rounded-lg shadow-lg space-y-4">
    <div>
        <label for="id_menu" class="block text-left text-gray-700 font-medium">Select Menu</label>
        <select name="id_menu" id="id_menu" class="w-full p-3 border rounded-lg" required>
            <option value="">-- Choose Menu --</option>
            <?php
            while ($menu = $menuResult->fetch_assoc()) {
                echo '<option value="' . $menu['id_menu'] . '">' . $menu['nom_menu'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div>
        <label for="date" class="block text-left text-gray-700 font-medium">Date</label>
        <input type="date" id="date" name="date" class="w-full p-3 border rounded-lg" required>
    </div>

    <div>
        <label for="heure" class="block text-left text-gray-700 font-medium">Time</label>
        <input type="time" id="heure" name="heure" class="w-full p-3 border rounded-lg" required>
    </div>

    <div>
        <label for="nombre_personnes" class="block text-left text-gray-700 font-medium">Number of People</label>
        <input type="number" id="nombre_personnes" name="nombre_personnes" class="w-full p-3 border rounded-lg" min="1" required>
    </div>

    <div>
        <label for="quantite" class="block text-left text-gray-700 font-medium">Quantity</label>
        <input type="number" id="quantite" name="quantite" class="w-full p-3 border rounded-lg" min="1" required>
    </div>

    <button type="submit" name="submit_reservation" class="w-full bg-custom text-white p-3 rounded-lg font-bold">
        Book Reservation
    </button>
    </form>

    <footer class="bg-gray-800 text-gray-400 py-6">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 Chef Moha. All rights reserved.</p>
            </div>
        </footer>
        
        <script src="script.js"></script>
    </body>
    </html>