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
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                
                    $stmt = $pdo->prepare("SELECT * FROM pet, user WHERE idPet = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                
                    if ($stmt->rowCount() > 0) {
                        $pet = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<h1>Détails de l'animal</h1>";
                        echo "<p><strong>Nom:</strong> " . htmlspecialchars($pet['petName']) . "</p>";
                        echo "<p><strong>Espèce:</strong> " . htmlspecialchars($pet['species']) . "</p>";
                        echo "<p><strong>Date de naissance:</strong> " . htmlspecialchars($pet['birth_date']) . "</p>";
                        echo "<p><strong>Coordonnées:</strong> " . htmlspecialchars($pet['phoneNumber']) . "</p>";
                    } else {
                        header("Location: FormulaireInformations.php");
        exit();
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

    <script> 
        function openNav() {
            document.getElementById("mySidenav").style.width = "20%";
            document.getElementById("mySidenav").style.minWidth = "200px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.minWidth = "0px";
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>
</html>
