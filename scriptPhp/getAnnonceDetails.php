<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "co_lock";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtenir l'ID de l'annonce depuis la requête
$annonceId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Requête pour récupérer les détails de l'annonce
$sql = "SELECT * FROM annonces WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $annonceId);
$stmt->execute();
$result = $stmt->get_result();

// Vérifier si l'annonce existe
if ($result->num_rows > 0) {
    // Récupérer les détails
    $annonce = $result->fetch_assoc();
    echo json_encode($annonce);
} else {
    echo json_encode(["error" => "Annonce non trouvée"]);
}

$stmt->close();
$conn->close();
?>
