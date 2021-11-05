    <!doctype html>
    <html>
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widt=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Aanmeldingen</title>
      <head>
      <body>
        <table class="table table-striped table-bordered">
          <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Aanwezig</th>
            <th>aantal</th>
          </tr>
          <?php
              require('databaseconnectie.php');


              // Controleer of verbinding is gelukt
              if ($conn->connect_error) {
                  die("Connectie mislukt: " . $conn->connect_error);
              }
              echo "Connectie gemaakt";

            /*
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
            */
          

              // Laat tabel zien
              $sql = "SELECT naam, email, aanwezig, aantal FROM aanmelding";
              $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["naam"]. "</td><td>" . $row["email"] . "</td><td>" . $row["aanwezig"] . "</td><td>" . $row["aantal"] . "<br>";
                  }
                } else {
                  echo "0 results";
                }

              //Sluit verbinding
              $conn->close();
              ?>

        </table>
        <input type="button" value="Nieuwe aanmelding" onClick="document.location.href='/aanmelden.php'" />          


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </body>
    </html>
