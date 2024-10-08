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

// Obtenir l'ID de l'entreprise depuis la requête
$entrepriseId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Requête pour récupérer les détails de l'entreprise
$sql = "SELECT * FROM annonces_entreprise WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $entrepriseId);
$stmt->execute();
$result = $stmt->get_result();

// Vérifier si l'entreprise existe
if ($result->num_rows > 0) {
    // Récupérer les détails
    $entreprise = $result->fetch_assoc();
    echo json_encode($entreprise);
} else {
    echo json_encode(["error" => "Entreprise non trouvée"]);
}

$stmt->close();
$conn->close();
?>
