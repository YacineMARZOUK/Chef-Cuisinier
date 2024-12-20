<?php
include('config.php');
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_plat = $_POST["nom_plat"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $id_menu = $_POST["id_menu"];

    // Insert the new dish into the database
    $sql = "INSERT INTO plat (nom_plat, description, prix, id_menu) VALUES ('$nom_plat', '$description', '$prix', '$id_menu')";
    
    if ($conn->query($sql) === TRUE) {
        // If successful, reload the page
        header("Location: menu.php"); // This will reload the page
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch menu items from the database
$menuQuery = "SELECT id_menu, nom_menu, description FROM menu";
$menuResult = $conn->query($menuQuery);
if ($menuResult === false) {
    echo "Error fetching menus: " . $conn->error;
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Moha - Menu</title>
    <link rel="icon" href="img/chef2.png" type="image/x-icon">
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
            <img src="img/chef2.png" alt="Chef Moha Logo" class="h-10 w-13">
            <a href="index.php" class="text-2xl font-bold text-custom">Chef Moha</a>
        </div>
    </div>
</header>

<!-- Menu Section -->
<section id="menu" class="py-16 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-custom mb-6">Our Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            // Fetch all dishes from the database
            $platQuery = "SELECT plat.nom_plat, plat.description, plat.prix, menu.nom_menu
                          FROM plat
                          INNER JOIN menu ON plat.id_menu = menu.id_menu";
            $platResult = $conn->query($platQuery);

            if ($platResult->num_rows > 0) {
                while ($plat = $platResult->fetch_assoc()) {
                    // Display each dish
                    echo '<div class="bg-gray-50 shadow-lg rounded-lg p-6">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">' . $plat['nom_plat'] . '</h3>
                            <p class="text-gray-600">' . $plat['description'] . '</p>
                            <p class="text-gray-800 font-bold">' . $plat['prix'] . ' DH</p>
                            <p class="text-gray-600 italic">Menu: ' . $plat['nom_menu'] . '</p>
                          </div>';
                }
            } else {
                echo "<p>No dishes available at the moment.</p>";
            }
            ?>
        </div>
    </div>
</section>

<!-- Add New Dish Form -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-custom mb-6">Add New Dish</h2>
        <form method="POST" class="max-w-md mx-auto bg-white p-6 shadow-lg rounded-lg space-y-6">
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
                <label for="nom_plat" class="block text-left text-gray-700">Dish Name</label>
                <input type="text" id="nom_plat" name="nom_plat" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Dish Name" required>
            </div>
            <div>
                <label for="description" class="block text-left text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Dish Description"></textarea>
            </div>
            <div>
                <label for="prix" class="block text-left text-gray-700">Price</label>
                <input type="number" id="prix" name="prix" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Price" required>
            </div>
            <button type="submit" class="w-full bg-custom text-white p-3 rounded-lg">Save Dish</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-gray-400 py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Chef Moha. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
