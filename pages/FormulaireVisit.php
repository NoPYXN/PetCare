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
    <title>Ajout de données médicales - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/FormulaireVisit.css">
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
        <h1>Ajouter des données médicales pour un chien</h1>
        <form action="FormulaireVet.php" method="POST">

            <input type="hidden" id="idPet" name="idPet" value="<?php echo htmlspecialchars($idPet); ?>">

            <div class="form-group">
                <label for="weight">Poids</label>
                <input type="number" id="weight" name="weight" step="0.1" placeholder="Entrez le poids en kg" required>
            </div>
            <div class="form-group">
                <label for="diagnostic">Diagnostique</label>
                <textarea id="diagnostic" name="diagnostic" placeholder="Entrez le diagnostique" required></textarea>
            </div>
            <div class="form-group">
                <label for="treatment">Traitement</label>
                <textarea id="treatment" name="treatment" placeholder="Entrez le traitement prescrit" required></textarea>
            </div>
            <div class="form-group">
                <label for="visit_date">Date de visite</label>
                <input type="date" id="visit_date" name="visit_date" required>
            </div>
            <div class="form-group">
                <label for="notes">Notes supplémentaires</label>
                <textarea id="notes" name="notes" placeholder="Entrez des notes supplémentaires"></textarea>
            </div>
            <button type="submit" class="aButton">Ajouter les données médicales</button>
        </form>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
