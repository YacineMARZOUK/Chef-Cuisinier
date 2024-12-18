<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reservations - Chef Moha</title>
    <link rel="icon" href="img/chef2.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-custom { color: #e65c00; }
        .bg-custom { background-color: #e65c00; }
        .hover\:bg-custom:hover { background-color: #cc5200; }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-gray-200 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex items-center space-x-3 p-4">
            <img src="img/chef2.png" alt="Chef Moha Logo" class="h-10 w-13">
            <a href="index.php" class="text-2xl font-bold text-custom">Chef Moha</a>
        </div>
    </header>

    <section class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-custom mb-6">Your Reservations</h2>
            
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b">Reservation ID</th>
                        <th class="px-6 py-3 border-b">Menu</th>
                        <th class="px-6 py-3 border-b">Date</th>
                        <th class="px-6 py-3 border-b">Time</th>
                        <th class="px-6 py-3 border-b">People</th>
                        <th class="px-6 py-3 border-b">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('config.php');

                    // Fetch reservations from the database
                    $reservationQuery = "SELECT r.id_reservation, r.date, r.heure, r.nombre_personnes, r.quantite, m.nom_menu
                                         FROM reservation r
                                         JOIN menu m ON r.id_menu = m.id_menu";
                    $result = $conn->query($reservationQuery);

                    if ($result->num_rows > 0) {
                        while ($reservation = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td class="px-6 py-4 border-b">' . htmlspecialchars($reservation['id_reservation']) . '</td>';
                            echo '<td class="px-6 py-4 border-b">' . htmlspecialchars($reservation['nom_menu']) . '</td>';
                            echo '<td class="px-6 py-4 border-b">' . htmlspecialchars($reservation['date']) . '</td>';
                            echo '<td class="px-6 py-4 border-b">' . htmlspecialchars($reservation['heure']) . '</td>';
                            echo '<td class="px-6 py-4 border-b">' . htmlspecialchars($reservation['nombre_personnes']) . '</td>';
                            echo '<td class="px-6 py-4 border-b">' . htmlspecialchars($reservation['quantite']) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6" class="px-6 py-4 text-center">No reservations found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <footer class="bg-gray-800 text-gray-400 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Chef Moha. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
