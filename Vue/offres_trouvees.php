<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagination des entreprises</title>
        <link rel="stylesheet" href="assets/page.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body class="body_Page_de_recherche">

    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="accueil.html">
                    <img src="assets/logo.png" alt="Web4ALL Logo">
                </a>
            </div>

            <div class="services-dropdown">
                <button class="hamburger-menu">
                    <span class="hamburger-icon"></span>
                    Services
                </button>
                <div class="dropdown-content">
                    <a href="accueil.html"><i class="fas fa-home"></i> Accueil </a>
                    <a href="a-propos.html"><i class="fas fa-info-circle"></i> À propos de nous </a>
                    <a href="avis.html"><i class="fas fa-star"></i> Avis </a>
                    <a href="InfosCompte.php"><i class="fas fa-user-graduate"></i> Mon compte </a>
                    <a href="espace_pilote.php"><i class="fas fa-user-tie"></i> Statistiques </a>
                </div>
            </div>
            <h1 data-uid="TitreSite"> P.A.I.J </h1>
            <div class="right-menu">
                <a href="choix-profil.html" class="nav-button active"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                <a href="espace_pilote.php" class="nav-button"><i class="fas fa-chart-line"></i> Statistiques</a>
            </div>
        </nav>

    </header>

    <form method="post" >
        <div class="pagination">
            <label for="nbrOffer">Nombre d'offres</label>
            <select id="nbrOffer" name="nbrOffer">
                <option value="">Changer le nombre d'offre</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
            <button type="submit" value="submit" class="button">Appliquer</button>
        </div>
  
  </form>

  <?php
    include("../PDO/afficheOffre.php");
  ?>

<script src="../controler/java.js"></script>
</body>
</html>




 