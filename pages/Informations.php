<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>

    <header></header>
    <script src="../header.js"></script>

    <div class="container">

        <div class="description">
            <?php
            $host = 'localhost';
            $dbname = 'pet\'care';
            $username = 'root';
            $password = 'root';

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                
                    $stmt = $pdo->prepare(" SELECT * FROM pet JOIN user ON pet.userId = user.userId WHERE pet.idPet = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                
                    if ($stmt->rowCount() > 0) {
                        $pet = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<h1>Détails de l'animal</h1>";

                        echo "<div style='text-align: center; margin-bottom: 20px;'>";
                        echo "<img src='" . htmlspecialchars($pet['photo']) . "' alt='Image de " . htmlspecialchars($pet['petName']) . "' style='max-width: 100%; height: auto; max-height: 200px;'>";
                        echo "</div>";

                        echo "<p><strong>Nom:</strong> " . htmlspecialchars($pet['petName']) . "</p>";
                        echo "<p><strong>Espèce:</strong> " . htmlspecialchars($pet['species']) . "</p>";
                        echo "<p><strong>Date de naissance:</strong> " . htmlspecialchars($pet['birth_date']) . "</p>";
                        echo "<p><strong>Coordonnées:</strong> " . htmlspecialchars($pet['phoneNumber']) . "</p>";
                    } else {
                        header("Location: FormulaireInformations.php?id=" . urlencode($id));
                        exit();
                    }
                } else {
                    echo "<p>Aucun ID d'animal n'a été spécifié.</p>";
                }
            
            } catch (PDOException $e) {
                echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
            }

            echo "<a href='FormulaireInformations.php?id=" . urlencode($id) . "'>";
            echo "<button class='aButton'>Modifier les informations</button>";
            echo "</a>";

            echo "<a href='InformationsDetails.php?id=" . urlencode($id) . "'>";
            echo "<button class='aButton'>Voir plus d'informations</button>";
            echo "</a>";
            ?>
        </div>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
