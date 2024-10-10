function createHeader() {
    const headerHTML = `
    <div class="header">
        <img src="../images/logo.png" alt="Logo Pet'Care" class="logo" onclick="window.location.href='index.php'">
        <nav class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="QrCode.html">Gérer les informations</a>
            <a href="Achat.html">Ajouter des informations médicales</a>
            <a href="Contact.html">Contact</a>
        </nav>
        <div class="profile-icon" onclick="window.location.href='UserProfil.php'">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="7" r="4" />
                <path d="M5.5 21a1 1 0 0 1-1-1.1c.4-3 2.9-5.9 7.5-5.9s7.1 2.9 7.5 5.9a1 1 0 0 1-1 1.1h-13z" />
            </svg>
        </div>
    </div>
    `;
    document.querySelector('header').innerHTML = headerHTML;
}

// Appeler cette fonction pour générer l'en-tête
createHeader();
