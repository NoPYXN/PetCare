<?php
// Démarrer une session pour stocker les informations utilisateur
session_start();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'pet\'care';
    $username = 'root';
    $password = 'root';  // Mettez à jour le mot de passe de votre base de données si nécessaire

    try {
        // Établir une connexion à la base de données
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Requête SQL pour récupérer l'utilisateur par email
        $stmt = $pdo->prepare("SELECT * FROM user WHERE emailAdress = :email");
        $stmt->execute(['email' => $email]);

        // Vérifier si l'utilisateur existe
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            // Récupérer le mot de passe haché stocké
            $stored_hashed_password = $user['password'];

            // Hacher le mot de passe fourni avec le même sel et comparer directement
            if ($stored_hashed_password === crypt($password, $stored_hashed_password)) {
                // Authentification réussie, sauvegarder les informations dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                // Redirection vers la page d'accueil ou une autre page sécurisée
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Mot de passe incorrect.";
            }
        } else {
            $error_message = "Aucun compte trouvé avec cet email.";
        }
    } catch (PDOException $e) {
        $error_message = "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/Account.css">
</head>
<body>
    <div class="header">
        <img src="../images/logo.png" alt="Pet'Care Logo" class="logo" onclick="window.location.href='index.php'">
        <nav class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="Formulaire.html">Gérer les informations</a>
            <a href="FormulaireVet.html">Ajouter des informations médicales</a>
            <a href="Contact.php">Contact</a>
        </nav>
        <div class="profile-icon" onclick="window.location.href='account.html'">&#128100;</div>
    </div>

    <div class="container">
        <div class="login-form">
            <h2>Connexion</h2>

            <!-- Affichage des messages d'erreur si présents -->
            <?php if (isset($error_message)): ?>
                <div class="error-message">
                    <p><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required placeholder="Entrez votre email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required placeholder="Entrez votre mot de passe">
                </div>
                <button type="submit">Se connecter</button>
            </form>
            <p>Pas encore de compte ? <a href="register.html">Inscrivez-vous ici</a>.</p>
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
