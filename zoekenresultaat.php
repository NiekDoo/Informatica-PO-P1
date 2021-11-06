<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widt=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href ="style.css" rel="stylesheet"></link>
    <title>Aanmeldingen</title>
  </head>
  <body>
    <input class="btn btn-outline-primary" type="button" value="Nog een keer zoeken" onClick="document.location.href='/index.php'" />
    <table class="table table-striped table-bordered">
    <br>
    <br>
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
          //$sql = "SELECT naam, email, aanwezig, aantal FROM aanmelding WHERE (naam LIKE '%".$query."%') OR (email LIKE '%".$query."%') OR (aanwezig LIKE '%".$query."%') OR (aantal LIKE '%".$query."%') ";

          //$stmt = $conn->prepare("INSERT INTO aanmelding (naam, email, aanwezig, aantal) VALUES (?, ?, ?, ?)");
          //$stmt -> bind_param("ssss", $naam, $email, $aanwezig, $aantal);




          $sql = "SELECT naam, email, aanwezig, aantal FROM aanmelding WHERE naam LIKE CONCAT('%',?,'%') OR email LIKE CONCAT('%',?,'%')  OR aanwezig LIKE CONCAT('%',?,'%') OR aantal LIKE CONCAT('%',?,'%')";
          $stmt = $conn->prepare($sql);
          $stmt -> bind_param("ssss", $naam, $email, $aanwezig, $aanwezig);
          
          // hier ga je pas de variabelen toewijzen en de query uitvoeren, dat kan je meer keren doen.
          
          $naam = $query; 
          $email = $query;
          $aanwezig = $query;
          $aantal = $query;
          
          $stmt->execute();
          $result = $stmt->get_result(); 

          $stmt->close(); 

          /*
          $sql = "SELECT * FROM users WHERE id=?"; // SQL with parameters
          $stmt = $conn->prepare($sql); 
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result(); // get the mysqli result
          $user = $result->fetch_assoc(); // fetch data   
          */



          //$result = $conn->query($stmt);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["naam"]. "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["aanwezig"] . "</td>
                    <td>" . $row["aantal"] . "</td>" . 
                    "<td><a href='delete.php?id=".$row['email']."'>verwijderen</a></td>" . 
                    "<br>";
            }
          } else {
            echo "<p>Er zijn geen overeenkomsten gevonden<p>";
          }





          

          //Sluit verbinding
          $conn->close();






      } else { 
          echo "error, probeer het opnieuw";
      }


      ?>
    </table>
    

  </body>
</html>
