<?php
session_start();

// Redirection si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Récupération de l'ID de l'animal depuis l'URL
$idPet = isset($_GET['id']) ? $_GET['id'] : null;

// Vérification si l'utilisateur est un vétérinaire
$is_vet = isset($_SESSION['user_veterinaire']) && $_SESSION['user_veterinaire'] == 1;
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
    
    <header></header>
    <script src="../header.js"></script>

    <div class="container">
        <h1>Ajouter des données médicales pour un chien</h1>

        <?php if ($is_vet): // Si l'utilisateur est un vétérinaire ?>
            <form action="ResultatFormulaireVisit.php" method="POST">
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
        <?php else: // Si l'utilisateur n'est pas un vétérinaire ?>
            <p>Vous n'êtes pas autorisé à remplir ce formulaire. Veuillez contacter un vétérinaire pour ajouter des données médicales.</p>
        <?php endif; ?>
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>
</body>
</html>
