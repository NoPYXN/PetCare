<?php
// Démarrer une session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}

// Récupérer les informations de l'utilisateur à partir de la session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_phone = $_SESSION['user_phone'];
$user_veterinaire = $_SESSION['user_veterinaire'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'utilisateur - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/UserProfil.css">
</head>
<body>
    
    <header></header>
    <script src="../header.js"></script>

    <div class="container">
        <h1>Profil de l'utilisateur</h1>
        <p><strong>ID :</strong> <?php echo htmlspecialchars($user_id); ?></p>
        <p><strong>Nom :</strong> <?php echo htmlspecialchars($user_name); ?></p>
        <p><strong>Email :</strong> <?php echo htmlspecialchars($user_email); ?></p>
        <p><strong>Numéro de téléphone :</strong> <?php echo htmlspecialchars($user_phone); ?></p>
        <p><strong>Vétérinaire :</strong> <?php echo ($user_veterinaire == 1) ? 'Oui' : 'Non'; ?></p>
        
        <a href="DemandeVeterinaire.php" class="aButton">Je suis vétérinaire</a>
        <a href="logout.php" class="aButton">Se déconnecter</a>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
