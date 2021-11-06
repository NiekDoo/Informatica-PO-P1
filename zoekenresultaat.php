<?php require("top.php") ?>

<h1>Zoekresultaten</h1>

<!-- Terug naar het startscherm/index.php -->
<input class="btn btn-outline-primary" id="nogeenkeerzoeken" type="button" value="Nog een keer zoeken"
       onClick="document.location.href='/index.php'"/>

<!-- Tabel met de verzochte aanmeldingen uit de database -->
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

    // Zoekformulier verwerken
    if (isset($_POST["query"])) {

        $query = $_POST['query'];

        // Query voorbereiden
        $sql = "SELECT naam, email, aanwezig, aantal FROM aanmelding WHERE naam LIKE CONCAT('%',?,'%') OR email LIKE CONCAT('%',?,'%')  OR aanwezig LIKE CONCAT('%',?,'%') OR aantal LIKE CONCAT('%',?,'%')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $naam, $email, $aanwezig, $aanwezig);

        // hier ga je pas de variabelen toewijzen en de query uitvoeren, dat kan je meer keren doen.

        $naam = $query;
        $email = $query;
        $aanwezig = $query;
        $aantal = $query;

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();

        // Laat tabel zien
        if ($result->num_rows > 0) {
            // Iedere keer een nieuwe rij maken
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["naam"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["aanwezig"] . "</td>
                    <td>" . $row["aantal"] . "</td>" .
                    "<td><a href='delete.php?id=" . $row['email'] . "'>[verwijderen]</a></td>";
            }
        } else {
            echo "<p>Er zijn geen overeenkomsten gevonden<p>";
        }

    } else {
        echo "error, probeer het opnieuw";
    }

    // Sluit verbinding
    $conn->close();

    ?>
</table>

<?php require("bottom.php") ?>
