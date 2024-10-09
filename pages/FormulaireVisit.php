<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de données médicales - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/FormulaireEntreprise.css">
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
            <div class="form-group">
                <label for="petId">ID de l'animal</label>
                <input type="number" id="petId" name="petId" placeholder="Entrez l'ID de l'animal" required>
            </div>
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
            <div class="form-group button-group">
                <button type="submit">Ajouter les données médicales</button>
            </div>
        </form>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
