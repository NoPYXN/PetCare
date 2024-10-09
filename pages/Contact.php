<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
    <div class="header">
        <span class="menu-icon" onclick="openNav()">&#9776;</span>
        <img src="../images/logo.png" alt="Pet'Care" class="logo" onclick="window.location.href='index.php'">
        <div class="profile-icon" onclick="window.location.href='account.html'">&#128100;</div>
    </div>

    
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Accueil</a>
        <a href="Formulaire.html">Gérer les informations</a>
        <a href="FormulaireVet.html">Ajouter des informations médicals</a>
        <a href="Contact.html">Contact</a>
    </div>

    <div class="container">
        <img src="../images/logo.png" alt="Co-Lock Logo" class="logoPage">

        <div class="description">
            <?php
            // Configuration de la base de données
            $host = 'localhost';
            $dbname = 'pet\'care'; // Nom de la base de données
            $username = 'root'; // Nom d'utilisateur
            $password = 'root'; // Mot de passe

            try {
                // Connexion à la base de données
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Vérification si un ID d'animal est passé en paramètre
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                
                    // Requête pour récupérer les informations de l'animal
                    $stmt = $pdo->prepare("SELECT * FROM pet, user WHERE idPet = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                
                    // Vérification si un animal a été trouvé
                    if ($stmt->rowCount() > 0) {
                        $pet = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<h1>Détails de l'animal</h1>";
                        echo "<p><strong>Nom:</strong> " . htmlspecialchars($pet['petName']) . "</p>";
                        echo "<p><strong>Espèce:</strong> " . htmlspecialchars($pet['species']) . "</p>";
                        echo "<p><strong>Date de naissance:</strong> " . htmlspecialchars($pet['birth_date']) . "</p>";
                        echo "<p><strong>Coordonnées:</strong> " . htmlspecialchars($pet['phoneNumber']) . "</p>";
                    } else {
                        echo "<p>Aucun animal trouvé avec cet ID.</p>";
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
