<?php
require('databaseconnectie.php');

$id = "'" . $_GET['id'] . "'";

$sql = "DELETE FROM aanmelding WHERE email=$id"; 


if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo "Succesvol verwijderd. ";
    exit;
} else {
    echo "Er is iets misgegaan, probeer het opnieuw. " . $conn->error;
}

mysqli_close($conn);

?>
