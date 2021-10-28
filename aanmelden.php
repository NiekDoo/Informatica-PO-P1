<?php 
    // Declareer variabelen
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $database = "aanmelding";

    // Maak verbinding
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Controleer of verbinding is gelukt
    if ($conn->connect_error) {
        die("Connectie mislukt: " . $conn->connect_error);
    }
    echo "Connectie gemaakt";

    $sql = "INSERT INTO aanmelding (naam, mail, aanwezig, aantal) VALUES ('Jan', 'jan@gomail.com', 1, 22)";

        if ($conn->query($sql) === TRUE) {
            echo "Jan is succesvol toegevoegd.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }



    // Verbinding verbreken aan het eind van de code
    $conn->close();
?>
