<?php require("top.php") ?>
<main style="display: block">
    <!-- Zoekbalk -->
    <div class="zoeken-nieuweaanmelding">
        <form class="form-group" action="zoekenresultaat.php" method="POST">
            <div class="zoekendiv">
                <input class="zoeken" type="text" name="query"/>
                <input type="submit" class="btn btn-outline-primary" value="Zoeken"/>
            </div>
        </form>
    </div>
    
    <!-- Tabel die de aanmeldingen in de database weergeeft -->
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
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["naam"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["aanwezig"] . "</td>
                    <td>" . $row["aantal"] . "</td>" .
                    "<td><a href='delete.php?id=" . $row['email'] . "'>[verwijderen]</a></td>";
            }
        } else {
            echo "<p>Er zijn geen overeenkomsten gevonden. </p>";
        }

        //Sluit verbinding
        $conn->close();
        ?>
    </table>
</main>
<?php require("bottom.php") ?>
