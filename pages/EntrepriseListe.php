<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise Liste - Co-Loc-k Bureaux</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/EntrepriseListe.css">
</head>
<body>

    <div class="header">
        <span class="menu-icon" onclick="openNav()">&#9776;</span>
        <img src="../images/logo.png" alt="Co-Lock Logo" class="logo" onclick="window.location.href='index.php'">
        <div class="profile-icon" onclick="window.location.href='account.html'">&#128100;</div>
    </div>

    <div id="particles-js"></div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Accueil</a>
        <a href="EntrepriseListe.php">Voir les entreprises</a>
        <a href="Formulaire.html">Créer une annonce (Bureaux)</a>
        <a href="FormulaireEntreprise.html">Créer une annonce (Entreprise)</a>
        <a href="Contact.html">Contact</a>
    </div>

    <div class="container" id="cards-container">
        <!-- Les cartes seront insérées ici dynamiquement -->
    </div>

    <footer>
        &copy; 2024 Co-Loc-k Bureaux. Tous droits réservés.
    </footer>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "20%";
            document.getElementById("mySidenav").style.minWidth = "200px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.minWidth = "0px";
            document.getElementById("mySidenav").style.width = "0";
        }

        // Fonction pour créer une nouvelle carte
        function createCard(logoEntreprise, nom_entreprise, id) {
            const card = document.createElement('a');
            card.className = 'card';
            card.href = `EntrepriseView.html?id=${id}`;

            const img = document.createElement('img');
            console.log(logoEntreprise)
            img.src = "../images/" + logoEntreprise;
            img.alt = nom_entreprise;

            const h3 = document.createElement('h3');
            h3.textContent = nom_entreprise;

            card.appendChild(img);
            card.appendChild(h3);

            document.getElementById('cards-container').appendChild(card);
        }

        // Fonction pour charger les annonces
        async function loadAnnonces() {
            try {
                const response = await fetch('../scriptPhp/connexion_entreprise.php'); // Assurez-vous que ce fichier existe et fonctionne
                const annonces = await response.json();

                console.log(annonces);

                annonces.forEach(annonce => {
                    createCard(annonce.logoEntreprise, annonce.nom_entreprise, annonce.id);
                });
            } catch (error) {
                console.error('Erreur lors du chargement des annonces:', error);
            }
        }

        // Charger les annonces au chargement de la page
        loadAnnonces();
    </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="../scriptJs/particles-config.js"></script>
</body>
</html>
