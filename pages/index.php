<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Pet'Care</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>

    <!-- En-tête avec logo et navigation -->
    <header></header>
    <script src="../header.js"></script>

    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenue chez Pet'Care</h1>
            <p>Pet'Care est une solution innovante pour numériser et centraliser toutes les informations médicales de vos animaux. Scannez simplement notre QR code pour accéder rapidement aux données de santé et aux informations de contact du propriétaire.</p>
            <button class="cta-button" onclick="window.location.href='QrCode.html'">Commencez dès maintenant</button>
        </div>
        <img src="../images/chien_heureux.jpg" alt="Animaux heureux" class="hero-image">
    </section>

    <!-- Section avec des cartes de fonctionnalités -->
    <div class="container" id="cards-container">
        <div class="card">
            <h2>Numérisation des Données</h2>
            <p>Centralisez les informations médicales de votre animal de manière sécurisée et accessible en ligne.</p>
            <img src="../images/archivage.jpg" alt="Numérisation" class="card-image">
        </div>

        <div class="card">
            <h2>QR Code Intégré</h2>
            <p>Scannez le QR code pour retrouver facilement le propriétaire d'un animal perdu et accéder à ses informations médicales.</p>
            <img src="../images/qr_code.png" alt="QR Code" class="card-image">
        </div>

        <div class="card">
            <h2>Partage sécurisé</h2>
            <p>Partagez rapidement les informations médicales de votre animal avec des vétérinaires ou des institutions autorisées.</p>
            <img src="../images/share.jpg" alt="Partage sécurisé" class="card-image">
        </div>
    </div>

    <!-- Pied de page -->
    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>

</body>
</html>
