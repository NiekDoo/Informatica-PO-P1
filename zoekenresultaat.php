<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widt=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Aanmeldingen</title>
  </head>
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

      // zoekformulier verwerken
      if (isset($_POST["query"])) {

          $query = $_POST['query'];

          /*
          // makes sure nobody uses SQL injection
          $query = mysql_real_escape_string($query);
        
        
          $raw_results = mysql_query("SELECT * FROM aanmeldingen WHERE (naam LIKE '%".$query."%') OR (email LIKE '%".$query."%') OR (aanwezig LIKE '%".$query."%') OR (aantal LIKE '%".$query."%') ");

          echo $raw_results; 
          echo "Hi"; 

          */


          /*
          $stmt = $conn->prepare("SELECT * FROM aanmelding WHERE (naam LIKE '%`.$query.`%') OR (email LIKE '%`.$query.`%') OR (aanwezig LIKE '%`.$query.`%') OR (aantal LIKE '%`.$query.`%') ");

              // hier ga je pas de variabelen toewijzen en de query uitvoeren, dat kan je meer keren doen.
              
              
              $stmt->execute();

              echo $stmt; 

              $stmt->close(); 
          */


          // Laat tabel zien
          $sql = "SELECT naam, email, aanwezig, aantal FROM aanmelding WHERE (naam LIKE '%".$query."%') OR (email LIKE '%".$query."%') OR (aanwezig LIKE '%".$query."%') OR (aantal LIKE '%".$query."%') ";
          
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["naam"]. "</td><td>" . $row["email"] . "</td><td>" . $row["aanwezig"] . "</td><td>" . $row["aantal"] . "<br>";
            }
          } else {
            echo "Er zijn geen overeenkomsten gevonden";
          }





          

          //Sluit verbinding
          $conn->close();






      } else { 
          echo "error, probeer het opnieuw";
      }


      ?>
    </table>
    <input type="button" value="Nog een keer zoeken" onClick="document.location.href='/index.php'" />

  </body>
</html>
