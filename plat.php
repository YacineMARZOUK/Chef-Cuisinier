<?php 
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom_plat=$_POST["nom_plat"];
    $description=$_POST["description"];
    $prix=$_POST["prix"];
    $id_menu=$_POST["id_menu"];
    $sql = "INSERT INTO plat (nom_plat, description, prix, id_menu) 
    VALUES ('$nom_plat', '$description', '$prix', '$id_menu')";
    $result=mysqli_query($conn,$sql);
    if ($result) {
        echo "Query was successful!";
    } else {
        echo "Error: " . mysqli_error($conn); // Get the error message if query fails
    }
}


?>
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

    <section class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-custom mb-6">Add / Edit Dish</h2>
        
        <!-- Add/Edit Dish Form -->
        <form action="" method="POST" class="max-w-md mx-auto bg-white p-6 shadow-lg rounded-lg space-y-6">
        <?php
            include('config.php');
            $menuQuery = "SELECT id_menu, nom_menu FROM menu";
            $menuResult = $conn->query($menuQuery);
            if ($menuResult === false) {
                            echo "Error fetching menus: " . $conn->error;
                exit;
            }
            ?>
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
            
            <!-- Dish Name field -->
            <div>
                <label for="nom_plat" class="block text-left text-gray-700">Dish Name</label>
                <input type="text" id="nom_plat" name="nom_plat" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Dish Name" required>
            </div>
            
            <!-- Description field -->
            <div>
                <label for="description" class="block text-left text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Dish Description"></textarea>
            </div>
            
            <!-- Price field -->
            <div>
                <label for="prix" class="block text-left text-gray-700">Price</label>
                <input type="number" id="prix" name="prix" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Price" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-custom text-white p-3 rounded-lg">Save Dish</button>
        </form>
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
