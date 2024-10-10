function createHeader() {
    const headerHTML = `
        <div class="header">
            <img src="../images/logo.png" alt="Logo Pet'Care" class="logo" onclick="window.location.href='index.php'">
            <nav class="nav-links">
                <a href="index.php">Accueil</a>
                <a href="FormulaireInformations.php">Gérer les informations</a>
                <a href="FormulaireVisit.php">Ajouter des informations médicales</a>
                <a href="Contact.html">Contact</a>
            </nav>
            <div class="profile-icon" onclick="window.location.href='UserProfil.php'">&#128100;</div>
        </div>
    `;
    document.querySelector('header').innerHTML = headerHTML;
}

// Appeler cette fonction pour générer l'en-tête
createHeader();
