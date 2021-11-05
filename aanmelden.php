<html>
    <header>

    </header>
    <body>
        <input type="button" value="Tabel met namen" onClick="document.location.href='/index.php'" />
        <div class="formgroup">
            <form class="formgroup" action="aanmelden.php" method="post">Naam <input type="text" name="naam"><br>
            E-mail: <input type="text" name="email"><br>
            Aanwezig: <input type="checkbox" name="aanwezig"><br>
            Aantal: <input type="text" name="aantal"><br>
            <input type="submit" name="submit" value="Opslaan">
            </form>
        </div>

        <?php
        require('databaseconnectie.php');


        // Controleer of verbinding is gelukt
        if ($conn->connect_error) {
            die("Connectie mislukt: " . $conn->connect_error);
        }
        echo "Connectie gemaakt";


      // Formulier ontvangen

      if (isset($_POST["submit"])) {
          if (isset($_POST["aanwezig"])) {
            $aanwezig = "ja"; 
        } else { 
            $aanwezig = "nee"; 
        }
        
        //CONTROLEREN OF ER OOK IETS IN DE POST ZIT????
        
        
        $stmt = $conn->prepare("INSERT INTO aanmelding (naam, email, aanwezig, aantal) VALUES (?, ?, ?, ?)");
        $stmt -> bind_param("ssss", $naam, $email, $aanwezig, $aantal);
        
        // hier ga je pas de variabelen toewijzen en de query uitvoeren, dat kan je meer keren doen.
        
        $naam = $_POST["naam"]; 
        $email = $_POST["email"]; 
        $aanwezig = $_POST["aanwezig"]; 
        $aantal = $_POST["aantal"]; 
        
        $stmt->execute();

        $stmt->close(); 

      } else {
        echo "Er zit niks in de POST"; 
      }







        ?>
    </body>
</html>
