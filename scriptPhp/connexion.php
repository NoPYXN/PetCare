<?php
// Connexion à la base de données (remplacez les valeurs par les vôtres)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "co_lock";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour récupérer les annonces
$sql = "SELECT * FROM annonces";
$result = $conn->query($sql);

// Tableau pour stocker les annonces
$annonces = [];

if ($result->num_rows > 0) {
    // Parcourir les résultats et les ajouter au tableau
    while($row = $result->fetch_assoc()) {
        $annonces[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

// Encode les données des annonces en JSON
echo json_encode($annonces);
?>
