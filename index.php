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
            <th>Aantal</th>
            <th>Acties</th>
          </tr>
          <form action="zoekenresultaat.php" method="POST">
	          <input type="text" name="query" />
          	<input type="submit" value="Zoeken" />
          </form>


          <?php
              require('databaseconnectie.php');

              // Controleer of verbinding is gelukt
              if ($conn->connect_error) {
                die("Connectie mislukt: " . $conn->connect_error);
              }
              


             
              
              //query voor verwijderen
              //if ()
              //$verwijder = "DELETE * FROM aanmelding WHERE $row = $row["button"] "



              // Laat tabel zien
              $sql = "SELECT naam, email, aanwezig, aantal FROM aanmelding";
              $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["naam"]. "</td><td>" . $row["email"] . "</td><td>" . $row["aanwezig"] . "</td><td>" . $row["aantal"] . "</td>" . "<td><a href='delete.php?id=".$row['email'].">Delete</a></td>" . "<br>";
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
