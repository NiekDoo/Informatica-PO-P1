<?php require("top.php") ?>
<main>
    <form action="aanmelden.php" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Nieuwe aanmelding</h1>
        </div>

        <div class="row formtext">
            <div class="col-4">Naam:</div>
            <div class="col-8"><input type="text" name="naam"></div>
        </div>

        <div class="row formtext">
            <div class="col-4">E-mail:</div>
            <div class="col-8"><input type="text" name="email"><br></div>
        </div>

        <div class="row formtext">
            <div class="col-4">Aanwezig:</div>
            <div class="col-8"><input type="checkbox" name="aanwezig"><br></div>
        </div>

        <div class="row formtext">
            <div class="col-4">Aantal:</div>
            <div class="col-8"><input type="text" name="aantal"><br></div>
        </div>

        <div class="d-grid gap-2">
            <input class="btn btn-outline-primary" type="submit" name="submit" value="Opslaan">
        </div>
    </form>
</main>
<?php
require('databaseconnectie.php');


// Controleer of verbinding is gelukt
if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}

// Formulier ontvangen
if (isset($_POST["submit"])) {
    if (preg_match("/[\w\d]+@[\w\d]+\.[\w\d]/",$_POST["email"]) == 1) {

        if (isset($_POST["aanwezig"])) {
            $aanwezig = "ja";
        } else {
            $aanwezig = "nee";
        }

        // Query voorbereiden
        $stmt = $conn->prepare("INSERT INTO aanmelding (naam, email, aanwezig, aantal) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $naam, $email, $aanwezig, $aantal);

        // Variabelen toewijzen en query uitvoeren

        $naam = $_POST["naam"];
        $email = $_POST["email"];
        // $aanwezig wordt hierboven al toegewezen
        $aantal = $_POST["aantal"];

        $stmt->execute();

        $stmt->close();
    }
}
?>
<?php require("bottom.php") ?>
