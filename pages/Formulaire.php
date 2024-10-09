<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Données médicals - Pet'Care</title>
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
        $dbname = 'pet\'care';
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
                $userId = $_POST['userId'];

                $photoPath = '';
                if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                    $uploads_dir = '../images';
                    $tmp_name = $_FILES['photo']['tmp_name'];
                    $name = basename($_FILES['photo']['name']);
                    $photoPath = "$uploads_dir/$name";
                    move_uploaded_file($tmp_name, $photoPath);
                }

                $stmt = $pdo->prepare("INSERT INTO pet (petName, species, breed, gender, birth_date, userId, photo) VALUES (:petName, :species, :breed, :gender, :birth_date, :userId, :photo)");
                $stmt->bindParam(':petName', $petName);
                $stmt->bindParam(':species', $species);
                $stmt->bindParam(':breed', $breed);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':birth_date', $birth_date);
                $stmt->bindParam(':userId', $userId);
                $stmt->bindParam(':photo', $photoPath);

                if ($stmt->execute()) {
                    echo "Animal ajouté avec succès !";
                } else {
                    echo "Erreur lors de l'ajout de l'animal.";
                }
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
        }
        ?>
        <br/>
        <a href="index.php" class="button-home">Voir la page de l'animal</a>
    </div>
</body>
</html>
