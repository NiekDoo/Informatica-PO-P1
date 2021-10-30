<html>
    <header>

    </header>
    <body>
        <input type="button" value="Tabel met namen" onClick="document.location.href='/index.php'" />
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


            $sql = "SELECT * \n"
            . "FROM aanmelding LIMIT 0, 30 ";
            echo $sql;

            /*
            $sql = "INSERT INTO aanmelding (naam, mail, aanwezig, aantal) VALUES ('Jan', 'jan@gomail.com', 1, 22)";

                if ($conn->query($sql) === TRUE) {
                    echo "Jan is succesvol toegevoegd.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            */

            // Gegevens toevoegen met variabelen
            $stmt = $conn->prepare("INSERT INTO aanmelding (naam, mail) VALUES (?, ?)");
            $stmt -> bind_param("ss", $naam, $mail);

            // hier ga je pas de variabelen toewijzen en de query uitvoeren, dat kan je meer keren doen.

            $naam = "Mijn Naam";
            $mail = "email@mijnnaam.nl";
            $stmt->execute();

            // let op dat je zowel de prepare als de connectie sluit
            $stmt->close();
            $conn->close();




            // Verbinding verbreken aan het eind van de code
        ?>
    </body>
</html>
