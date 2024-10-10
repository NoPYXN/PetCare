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
    <title>Formulaire de données - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/Formulaire.css">
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
        <h1>Ajouter un nouvel animal</h1>
        <form action="Formulaire.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="petName">Nom de l'animal</label>
                <input type="text" id="petName" name="petName" placeholder="Entrez le nom de l'animal" required>
            </div>
            <div class="form-group">
                <label for="species">Espèce</label>
                <input type="text" id="species" name="species" placeholder="Entrez l'espèce de l'animal" required>
            </div>
            <div class="form-group">
                <label for="breed">Race</label>
                <input type="text" id="breed" name="breed" placeholder="Entrez la race de l'animal" required>
            </div>
            <div class="form-group">
                <label for="gender">Genre</label>
                <select id="gender" name="gender" required>
                    <option value="male">Mâle</option>
                    <option value="female">Femelle</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birth_date">Date de naissance</label>
                <input type="date" id="birth_date" name="birth_date" required>
            </div>

            <!-- Champ caché pour l'ID utilisateur -->
            <input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION['user_id']; ?>">

            <!-- Champ caché pour l'ID de l'animal -->
            <input type="hidden" id="idPet" name="idPet" value="<?php echo htmlspecialchars($idPet); ?>">

            <div class="form-group">
                <label for="image">Photo de l'animal</label>
                <input type="file" id="image" name="photo" accept="image/*">
            </div>
            <button type="submit" class="aButton">Ajouter l'animal</button>
        </form>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
