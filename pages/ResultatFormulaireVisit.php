<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Données médical ajouté - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/Annonces.css">

</head>
<body>

    <header></header>
    <script src="../header.js"></script>

    <div class="container">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "pet'care";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Erreur de connexion : " . $conn->connect_error);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $petId = $conn->real_escape_string($_POST['idPet']);
                $weight = $conn->real_escape_string($_POST['weight']);
                $diagnostic = $conn->real_escape_string($_POST['diagnostic']);
                $treatment = $conn->real_escape_string($_POST['treatment']);
                $visit_date = $conn->real_escape_string($_POST['visit_date']);
                $notes = $conn->real_escape_string($_POST['notes']);

                $sql = "INSERT INTO visit (petId, weight, diagnostic, treatment, visit_date, notes)
                        VALUES ('$petId', '$weight', '$diagnostic', '$treatment', '$visit_date', '$notes')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>Les données médicales ont été ajoutées avec succès.</p>";
                } else {
                    echo "<p>Une erreur est survenue.</p>";
                }
            }

            $conn->close();
        ?>

        <br/>
        <a href='InformationsDetails.php?id=<?php echo $petId; ?>' class="aButton">Voir la page de l'animal</a>
    </div>
</body>
</html>
