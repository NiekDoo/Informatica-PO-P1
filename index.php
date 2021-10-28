
    <!doctype html>
    <html>
      <head>
        <title>Table with database</title>
      <head>
      <body>
        <table>
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
      </body>
    </html>
