<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $dbname = 'pet\'care';
    $username = 'root';
    $password = 'root';  

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            $error_message = "Les mots de passe ne correspondent pas.";
        } else {
            $salt = '$5$rounds=5000$' . bin2hex(mt_rand()) . '$';
            $hashed_password = crypt($password, $salt);

            $stmt = $pdo->prepare("INSERT INTO user (name, emailAdress, phoneNumber, password) VALUES (:name, :emailAdress, :phoneNumber, :password)");
            $stmt->execute([
                'name' => $name,
                'emailAdress' => $email,
                'phoneNumber' => $phoneNumber,
                'password' => $hashed_password
            ]);
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
    <header></header>
    <script src="../header.js"></script>

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
</body>
</html>

