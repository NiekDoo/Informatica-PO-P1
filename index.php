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
            <th>Mail</th>
            <th>Aanwezig</th>
            <th>aantal</th>
          </tr>
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

              // Laat tabel zien
              $sql = "SELECT naam, mail, aanwezig, aantal FROM Aanmelding";
              $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["naam"]. "</td><td>" . $row["mail"] . "</td><td>" . $row["aanwezig"] . "</td><td>" . $row["aantal"] . "<br>";
                  }
                } else {
                  echo "0 results";
                }

              //Sluit verbinding
              $conn->close();
              ?>

        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </body>
    </html>
