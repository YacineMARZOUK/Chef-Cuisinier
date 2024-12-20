<?php
include("config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $adresse = $_POST["adresse"];
    $role = 3;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateur (nom, email, password, adresse,role) 
            VALUES (?, ?, ?, ?,?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $nom, $email, $password_hash, $adresse,$role);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: http://localhost/Chef-Cuisinier/index.php#about");
            exit();

        } else {
            echo "Error: " . mysqli_error($conn); 
        }

        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn); 
    }
} else {
    echo "No POST request received.";
}

?>
