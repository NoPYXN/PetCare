<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Données médicales - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/Annonces.css">
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
        <?php
        $host = 'localhost';
        $dbname = "pet'care";
        $username = 'root';
        $password = 'root';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $petName = $_POST['petName'];
                $species = $_POST['species'];
                $breed = $_POST['breed'];
                $gender = $_POST['gender'];
                $birth_date = $_POST['birth_date'];
                $userId = $_POST['userId']; // Utilise l'ID de l'utilisateur connecté à partir de la session
                $idPet = $_POST['idPet']; // L'ID de l'animal passé via le formulaire

                // Gestion de l'image
                $photoPath = '';
                if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                    $uploads_dir = '../images';
                    $tmp_name = $_FILES['photo']['tmp_name'];
                    $name = basename($_FILES['photo']['name']);
                    $photoPath = "$uploads_dir/$name";
                    move_uploaded_file($tmp_name, $photoPath);
                }

                // Vérifier si l'animal existe déjà
                $stmt = $pdo->prepare("SELECT * FROM pet WHERE idPet = :idPet");
                $stmt->bindParam(':idPet', $idPet, PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    // Si l'animal existe, on fait une mise à jour
                    $stmt = $pdo->prepare("UPDATE pet SET petName = :petName, species = :species, breed = :breed, gender = :gender, birth_date = :birth_date, userId = :userId, photo = :photo
                                            WHERE idPet = :idPet");
                    echo "Animal mis à jour avec succès !";
                } else {
                    // Sinon, on insère un nouvel enregistrement
                    $stmt = $pdo->prepare("INSERT INTO pet (petName, species, breed, gender, birth_date, userId, idPet, photo)
                                            VALUES (:petName, :species, :breed, :gender, :birth_date, :userId, :idPet, :photo)");
                    echo "Animal ajouté avec succès !";
                }

                // Bind des paramètres pour la mise à jour ou l'insertion
                $stmt->bindParam(':petName', $petName);
                $stmt->bindParam(':species', $species);
                $stmt->bindParam(':breed', $breed);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':birth_date', $birth_date);
                $stmt->bindParam(':userId', $userId);
                $stmt->bindParam(':idPet', $idPet);
                $stmt->bindParam(':photo', $photoPath);

                // Exécution de la requête
                if ($stmt->execute()) {
                    echo "Opération réussie !";
                } else {
                    echo "Erreur lors de l'opération.";
                }
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
        }
        ?>

        <br/>
        <a href='Informations.php?id=<?php echo $idPet; ?>' class="aButton">Voir la page de l'animal</a>
    </div>
</body>
</html>