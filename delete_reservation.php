<?php
session_start();
include('config.php');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Get the reservation ID from the form submission
if (isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];
    $user_id = $_SESSION['id']; // Get the logged-in user's ID

    // Delete the reservation from the database
    $deleteQuery = "DELETE FROM reservation WHERE id_reservation = '$reservation_id' AND id_utilisateur = '$user_id'";

    if ($conn->query($deleteQuery) === TRUE) {
        // If deletion was successful, redirect to the reservations page
        header("Location: tabclient.php");
    } else {
        // If there was an error, display a message
        echo "Error deleting reservation: " . $conn->error;
    }
} else {
    // If no reservation ID was provided, redirect to the reservations page
    header("Location: tabreservation.php");
}
exit();
?>
