<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/contact.css">
    <style>
        table {
            width: 100%; /* S'assure que le tableau utilise toute la largeur disponible */
            border-collapse: collapse; /* Pour éviter les doubles bordures */
            margin-top: 20px; /* Marge au-dessus du tableau */
        }
        th, td {
            border: 1px solid #ccc; /* Bordure des cellules */
            padding: 10px; /* Ajout de padding pour espacer le texte */
            text-align: left; /* Alignement du texte à gauche */
        }
        th {
            background-color: #f2f2f2; /* Couleur de fond pour les en-têtes */
        }
    </style>
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
                
                    // Récupérer les informations de l'animal et du propriétaire
                    $stmt = $pdo->prepare("
                        SELECT * 
                        FROM pet 
                        JOIN user ON pet.userId = user.userId 
                        WHERE pet.idPet = :id
                    ");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        $pet = $stmt->fetch(PDO::FETCH_ASSOC);

                        echo "<h1>Détails de l'animal</h1>";

                        echo "<div style='text-align: center; margin-bottom: 20px;'>";
                        echo "<img src='" . htmlspecialchars($pet['photo']) . "' alt='Image de " . htmlspecialchars($pet['petName']) . "' style='max-width: 100%; height: auto; max-height: 200px;'>";
                        echo "</div>";
                        
                        echo "<p><strong>Nom du propriétaire:</strong> " . htmlspecialchars($pet['name']) . "</p>";
                        echo "<p><strong>Téléphone:</strong> " . htmlspecialchars($pet['phoneNumber']) . "</p>";
                        echo "<p><strong>Adresse mail:</strong> " . htmlspecialchars($pet['emailAdress']) . "</p>";
                        echo "<p><strong>Nom:</strong> " . htmlspecialchars($pet['petName']) . "</p>";
                        echo "<p><strong>Espèce:</strong> " . htmlspecialchars($pet['species']) . "</p>";
                        echo "<p><strong>Race:</strong> " . htmlspecialchars($pet['breed']) . "</p>";
                        echo "<p><strong>Genre:</strong> " . htmlspecialchars($pet['gender']) . "</p>";
                        echo "<p><strong>Date de naissance:</strong> " . htmlspecialchars($pet['birth_date']) . "</p>";

                        // Récupérer les visites de l'animal
                        $visitStmt = $pdo->prepare("
                            SELECT * 
                            FROM visit 
                            WHERE petId = :petId 
                            ORDER BY visit_date DESC
                        ");
                        $visitStmt->bindParam(':petId', $id, PDO::PARAM_INT);
                        $visitStmt->execute();
                        
                        // Afficher les visites
                        if ($visitStmt->rowCount() > 0) {
                            echo "<h2>Visites de l'animal</h2>";
                            echo "<table>";
                            echo "<tr><th>Date de visite</th><th>Poids</th><th>Diagnostique</th><th>Traitement</th><th>Notes</th></tr>";
                            
                            while ($visit = $visitStmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($visit['visit_date']) . "</td>";
                                echo "<td>" . htmlspecialchars($visit['weight']) . "</td>";
                                echo "<td>" . htmlspecialchars($visit['diagnostic']) . "</td>";
                                echo "<td>" . htmlspecialchars($visit['treatment']) . "</td>";
                                echo "<td>" . htmlspecialchars($visit['notes']) . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<p>Aucune visite enregistrée pour cet animal.</p>";
                        }
                    } else {
                        echo "<p>Aucun résultat trouvé pour cet ID.</p>";
                    }
                } else {
                    echo "<p>Aucun ID d'animal n'a été spécifié.</p>";
                }
            
            } catch (PDOException $e) {
                echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
            }

            echo "<a href='FormulaireVisit.php?id=" . urlencode($id) . "'>";
            echo "<button class='aButton'>Ajouter une visite</button>";
            echo "</a>";
            ?>
        </div>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
