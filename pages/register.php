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
        $phoneNumber = $_POST['phoneNumber']; // Récupération du numéro de téléphone
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
            $stmt = $pdo->prepare("INSERT INTO user (name, emailAdress, phoneNumber, password) VALUES (:name, :emailAdress, :phoneNumber, :password)");
            $stmt->execute([
                'name' => $name,
                'emailAdress' => $email,
                'phoneNumber' => $phoneNumber, // Ajout du numéro de téléphone
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
