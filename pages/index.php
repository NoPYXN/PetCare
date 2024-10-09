<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Co-Loc-k Bureaux</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>

    <div class="header">
        <img src="../images/logo.png" alt="Co-Lock Logo" class="logo" onclick="window.location.href='index.php'">
        <nav class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="Formulaire.html">Gérer les informations</a>
            <a href="FormulaireVet.html">Ajouter des informations médicales</a>
            <a href="Contact.html">Contact</a>
        </nav>
        <div class="profile-icon" onclick="window.location.href='account.html'">&#128100;</div>
    </div>

    <div class="container" id="cards-container">
        <!-- Les cartes seront insérées ici dynamiquement -->
    </div>

    <footer>
        &copy; 2024 Pet'Care. Tous droits réservés.
    </footer>

    <script>
        // Fonction pour créer une nouvelle carte
        function createCard(imageSrc, title, price_hour, id) {
            // Crée un conteneur pour la carte
            const card = document.createElement('a');
            card.className = 'card';
            card.href = `AnnoncesView.html?id=${id}`; // Ajoute l'identifiant à l'URL

            // Crée l'image
            const img = document.createElement('img');
            img.src = "../images/" + imageSrc; // Ajout du chemin correct pour les images
            img.alt = title;

            // Crée le titre
            const h3 = document.createElement('h3');
            h3.textContent = title;

            // Crée le prix
            const p = document.createElement('p');
            p.textContent = price_hour ? price_hour + ' €/h' : '';

            // Ajoute les éléments à la carte
            card.appendChild(img);
            card.appendChild(h3);
            card.appendChild(p);

            // Ajoute la carte au conteneur
            document.getElementById('cards-container').appendChild(card);
        }

        // Fonction pour charger les annonces
        async function loadAnnonces() {
            try {
                const response = await fetch('../scriptPhp/connexion.php'); // Le fichier PHP qui retourne les annonces
                const annonces = await response.json();

                annonces.forEach(annonce => {
                    createCard(annonce.image, annonce.title, annonce.price_hour, annonce.id); // Passe l'identifiant
                });
            } catch (error) {
                console.error('Erreur lors du chargement des annonces:', error);
            }
        }

        // Charger les annonces au chargement de la page
        loadAnnonces();
    </script>
</body>
</html>
