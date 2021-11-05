<?php
require('databaseconnectie.php');

$id = "'" . $_GET['id'] . "'";

$sql = "DELETE FROM aanmelding WHERE email=$id"; 

// Uitvoeren van de query
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo "Succesvol verwijderd. ";
    header('Location: index.php');
    exit;
} else {
    echo "Er is iets misgegaan, probeer het opnieuw. " . $conn->error;
}

mysqli_close($conn);

?>
