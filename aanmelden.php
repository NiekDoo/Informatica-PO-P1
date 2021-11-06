<html>
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="widt=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href ="style.css" rel="stylesheet"></link>
        <title>Aanmelden</title>

    </header>
    <body>
        <h1>Nieuwe aanmelding</h1>
        <input class="btn btn-outline-primary" type="button" value="Terug naar aanmeldingen" onClick="document.location.href='/index.php'" />
        <div class="formgroup">
            <form class="formgroup" action="aanmelden.php" method="post">
            <div class="formtext">Naam <input type="text" name="naam" class="tabel_waarde"><br></div>
            <div class="formtext">E-mail: <input type="text" name="email" class="tabel_waarde"><br></div>
            <div class="formtext">Aanwezig: <input type="checkbox" name="aanwezig" class="tabel_waarde"><br></div>
            <div class="formtext">Aantal: <input type="text" name="aantal" class="tabel_waarde"><br></div>
            <input class="btn btn-outline-primary" type="submit" name="submit" value="Opslaan">
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
        
        // Query voorbereiden
        $stmt = $conn->prepare("INSERT INTO aanmelding (naam, email, aanwezig, aantal) VALUES (?, ?, ?, ?)");
        $stmt -> bind_param("ssss", $naam, $email, $aanwezig, $aantal);
        
        // Variabelen toewijzen en query uitvoeren
        
        $naam = $_POST["naam"]; 
        $email = $_POST["email"]; 
        // $aanwezig wordt hierboven al toegewezen
        $aantal = $_POST["aantal"]; 
        
        $stmt->execute();

        $stmt->close(); 

      } 
        ?>
    </body>
</html>
