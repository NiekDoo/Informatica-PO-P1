<html>
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="widt=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href ="style.css" rel="stylesheet"></link>
        <title>Aanmeldingen</title>

    </header>
    <body>
        <input type="button" value="Tabel met namen" onClick="document.location.href='/index.php'" />
        <div class="formgroup">
            <form class="formgroup" action="aanmelden.php" method="post">Naam <input type="text" name="naam" class="tabel_waarde"><br>
            E-mail: <input type="text" name="email" class="tabel_waarde"><br>
            Aanwezig: <input type="checkbox" name="aanwezig" class="tabel_waarde"><br>
            Aantal: <input type="text" name="aantal" class="tabel_waarde"><br>
            <input type="submit" name="submit" value="Opslaan">
            </form>
        </div>

        <?php
        require('databaseconnectie.php');


        // Controleer of verbinding is gelukt
        if ($conn->connect_error) {
            die("Connectie mislukt: " . $conn->connect_error);
        }


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
        // $aanwezig wordt hierboven al toegewezen
        $aantal = $_POST["aantal"]; 
        
        $stmt->execute();

        $stmt->close(); 

      } else {
        echo "Er zit niks in de POST"; 
      }







        ?>
    </body>
</html>
