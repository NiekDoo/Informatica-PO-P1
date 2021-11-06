<?php
require('databaseconnectie.php');

$id = $_GET['id'];


// Delete query voorbereiden
$stmt = $conn->prepare("DELETE FROM aanmelding WHERE email=?");
        $stmt -> bind_param("s", $email);
        
        // Variabelen toewijzen en uitvoeren
        
        $email = $id;
    
        $stmt->execute();

        $stmt->close(); 

mysqli_close($conn);

// Terug naar index.php
header('location: index.php')

?>
