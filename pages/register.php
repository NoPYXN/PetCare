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
