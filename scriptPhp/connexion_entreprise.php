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

// Requête pour récupérer les entreprises
$sql = "SELECT * FROM annonces_entreprise";
$result = $conn->query($sql);

$entreprises = [];

if ($result->num_rows > 0) {
    // Parcourir les résultats et les ajouter au tableau
    while($row = $result->fetch_assoc()) {
        $entreprises[] = $row;
    }
} else {
    echo "0 results";
}

// Fermer la connexion
$conn->close();

echo json_encode($entreprises);
?>
