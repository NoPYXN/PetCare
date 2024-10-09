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

    <div class="header">
        <img src="../images/logo.png" alt="Co-Lock Logo" class="logo" onclick="window.location.href='index.php'">
        <nav class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="Formulaire.html">Gérer les informations</a>
            <a href="FormulaireVet.html">Ajouter des informations médicales</a>
            <a href="Contact.html">Contact</a>
        </nav>
        <div class="profile-icon" onclick="window.location.href='account.html'">&#128100;</div>
    </div>

    <div class="container">
        <img src="../images/logo.png" alt="Co-Lock Logo" class="logoPage">

        <div class="description">
            <?php
            $host = 'localhost';
            $dbname = 'pet\'care';
            $username = 'root';
            $password = 'root';

            try {
                // Connexion à la base de données
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Vérifier si l'ID est présent dans l'URL
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                
                    // Requête SQL avec des jointures explicites
                    $stmt = $pdo->prepare("
                        SELECT * 
                        FROM pet 
                        JOIN user ON pet.userId = user.userId 
                        JOIN visit ON pet.idPet = visit.petId 
                        WHERE pet.idPet = :id
                    ");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                
                    // Affichage du nombre de résultats pour débogage
                    echo "Nombre de résultats : " . $stmt->rowCount() . "<br>";

                    // Vérifier s'il y a des résultats
                    if ($stmt->rowCount() > 0) {
                        $pet = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Debugging: afficher toutes les données récupérées
                        var_dump($pet);

                        // Afficher les informations de l'animal
                        echo "<h1>Détails de l'animal</h1>";
                        echo "<p><strong>Nom du propriétaire:</strong> " . htmlspecialchars($pet['name']) . "</p>";
                        echo "<p><strong>Téléphone:</strong> " . htmlspecialchars($pet['phoneNumber']) . "</p>";
                        echo "<p><strong>Adresse mail:</strong> " . htmlspecialchars($pet['emailAdress']) . "</p>";
                        echo "<p><strong>Nom:</strong> " . htmlspecialchars($pet['petName']) . "</p>";
                        echo "<p><strong>Espèce:</strong> " . htmlspecialchars($pet['species']) . "</p>";
                        echo "<p><strong>Race:</strong> " . htmlspecialchars($pet['breed']) . "</p>";
                        echo "<p><strong>Genre:</strong> " . htmlspecialchars($pet['gender']) . "</p>";
                        echo "<p><strong>Date de visite:</strong> " . htmlspecialchars($pet['visit_date']) . "</p>";
                        echo "<p><strong>Poids:</strong> " . htmlspecialchars($pet['weight']) . "</p>";
                        echo "<p><strong>Date de naissance:</strong> " . htmlspecialchars($pet['birth_date']) . "</p>";
                        echo "<p><strong>Diagnostique:</strong> " . htmlspecialchars($pet['diagnostic']) . "</p>";
                        echo "<p><strong>Traitement:</strong> " . htmlspecialchars($pet['treatment']) . "</p>";
                        echo "<p><strong>Notes:</strong> " . htmlspecialchars($pet['notes']) . "</p>";
                    } else {
                        echo "<p>Aucun résultat trouvé pour cet ID.</p>";
                    }
                } else {
                    echo "<p>Aucun ID d'animal n'a été spécifié.</p>";
                }
            
            } catch (PDOException $e) {
                echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
            }
            ?>
        </div>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
