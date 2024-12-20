<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL to get user data by email
    $sql = "SELECT * FROM utilisateur WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    // Check if a user was found
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id_utilisateur'];

            // Check user role
            if ($row['role'] == 1) {
                // Redirect to tabreservation page if role = 1
                header("Location: tabreservation.php");
            } else {
                // Redirect to the regular menu page for other roles
                header("Location: menu.php#about");
            }
            exit(); // Make sure the script stops after redirection
        } else {
            echo "Login incorrect";
        }
    } else {
        echo "No user found with this email";
    }
}
?>
