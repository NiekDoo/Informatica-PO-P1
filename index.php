<!doctype html>
    <html>
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widt=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href ="style.css" rel="stylesheet"></link>
        <title>Aanmeldingen</title>
      <head>
      <body>
        <h1>Aanmeldingen</h1>
        <div class="zoeken-nieuweaanmelding">

        <form class="form-group" action="zoekenresultaat.php" method="POST">
          <div class="zoekendiv">
            <input class="zoeken" type="text" name="query" />
            <input type="submit" class="btn btn-outline-primary" value="Zoeken" />
          </div>
        </form>
        </div>

        <input type="button" class="btn btn-outline-primary" value="Nieuwe aanmelding" onClick="document.location.href='/aanmelden.php'" id="aanmelden"/>
        
        <table class="table table-striped table-bordered">
          <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Aanwezig</th>
            <th>Aantal</th>
            <th>Acties</th>
          </tr>

          <?php
              require('databaseconnectie.php');

              // Controleer of verbinding is gelukt
              if ($conn->connect_error) {
                die("Connectie mislukt: " . $conn->connect_error);
              }


              // Laat tabel zien
              $sql = "SELECT naam, email, aanwezig, aantal FROM aanmelding";
              $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Iedere keer een nieuwe rij maken
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["naam"]. "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["aanwezig"] . "</td>
                    <td>" . $row["aantal"] . "</td>" . 
                    "<td><a href='delete.php?id=".$row['email']."'>[verwijderen]</a></td>" .
                    "<br>";
                  }
                } else {
                  echo "<p>Er zijn geen overeenkomsten gevonden. </p>";
                }

              //Sluit verbinding
              $conn->close();
              ?>
        </table>
      </body>
    </html>
