<?php
session_start();

// Redirection si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Récupération de l'ID de l'animal depuis l'URL
$idPet = isset($_GET['id']) ? $_GET['id'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déposer un certificat vétérinaire - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/Formulaire.css">
</head>
<body>
    
    <header></header>
    <script src="../header.js"></script>

    <div class="container">
        <h1>Déposer un certificat vétérinaire</h1>
        <form action="index.php">
            <div class="form-group">
                <label for="certificat">Télécharger votre certificat vétérinaire (PDF, JPG, PNG)</label>
                <input type="file" id="certificat" name="certificat" accept=".pdf, .jpg, .jpeg, .png" required>
            </div>
            <button type="submit" class="aButton">Soumettre le certificat</button>
        </form>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
