<?php
// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'pet\'care';
    $username = 'root';
    $password = 'root';  

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Vérification si les mots de passe correspondent
        if ($password !== $confirm_password) {
            $error_message = "Les mots de passe ne correspondent pas.";
        } else {
            // Hachage du mot de passe avec crypt et mt_rand() pour générer un sel
            $salt = '$5$rounds=5000$' . bin2hex(mt_rand()) . '$'; // Utilisation de mt_rand() pour le sel
            $hashed_password = crypt($password, $salt);

            // Insertion dans la base de données
            $stmt = $pdo->prepare("INSERT INTO user (name, emailAdress, password) VALUES (:name, :emailAdress, :password)");
            $stmt->execute([
                'name' => $name,
                'emailAdress' => $email,
                'password' => $hashed_password
            ]);

            // Redirection ou message de succès
            $success_message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
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
    <title>Inscription - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header">
            <img src="../images/logo.png" alt="Pet'Care Logo" class="logo" onclick="window.location.href='index.php'">
            <nav class="nav-links">
                <a href="index.php">Accueil</a>
                <a href="Formulaire.html">Gérer les informations</a>
                <a href="FormulaireVet.html">Ajouter des informations médicales</a>
                <a href="Contact.html">Contact</a>
            </nav>
            <div class="profile-icon" onclick="window.location.href='account.html'">&#128100;</div>
        </div>
    </header>

    <!-- Registration Form Section -->
    <main>
        <div class="container">
            <div class="register-form">
                <h2>Inscription</h2>

                <!-- Affichage des messages d'erreur ou de succès -->
                <?php if (isset($error_message)): ?>
                    <div class="error-message">
                        <p><?php echo $error_message; ?></p>
                    </div>
                <?php endif; ?>

                <?php if (isset($success_message)): ?>
                    <div class="success-message">
                        <p><?php echo $success_message; ?></p>
                    </div>
                <?php endif; ?>

                <form action="Account.html" method="POST">
                    <button type="submit" class="btn-register">Connectez-vous ici</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Pet'Care. Tous droits réservés.</p>
    </footer>

    <!-- JavaScript for Sidebar Navigation -->
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
