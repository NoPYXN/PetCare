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
    <div class="header">
        <img src="../images/logo.png" alt="Logo Pet'Care" class="logo" onclick="window.location.href='index.php'">
        <nav class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="QrCode.html">Générer un Qr code</a>
            <a href="Achat.html">Acheter un médaillon</a>
            <a href="Contact.html">Contact</a>
        </nav>
        <div class="profile-icon" onclick="window.location.href='UserProfil.php'">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-dog" viewBox="0 0 16 16">
                <path d="M6.5 8a3.5 3.5 0 0 0-3.5 3.5v2a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-2A3.5 3.5 0 0 0 6.5 8zM6 9a2 2 0 1 1-2 2 2 2 0 0 1 2-2zm6.5-5a1 1 0 0 1 .878.471l1.173 2.341a1 1 0 0 1-.096 1.125l-2.5 3.5a1 1 0 0 1-1.54-1.233l2.5-3.5a1 1 0 0 1 .21-.15L11.5 4a1 1 0 0 1 1-1zM3 3.5a1.5 1.5 0 1 1 3 0A1.5 1.5 0 0 1 3 3.5zM1.5 5A1.5 1.5 0 0 1 3 3.5c0-.832.672-1.5 1.5-1.5a1.5 1.5 0 0 1 0 3A1.5 1.5 0 0 1 1.5 5z"/>
            </svg>
        </div>

    </div>

    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenue chez Pet'Care</h1>
            <p>Pet'Care est une solution innovante pour numériser et centraliser toutes les informations médicales de vos animaux. Scannez simplement notre QR code pour accéder rapidement aux données de santé et aux informations de contact du propriétaire.</p>
            <button class="cta-button" onclick="window.location.href='Formulaire.html'">Commencez dès maintenant</button>
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
            <img src="../images/share.png" alt="Partage sécurisé" class="card-image">
        </div>
    </div>

    <!-- Pied de page -->
    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>

</body>
</html>
