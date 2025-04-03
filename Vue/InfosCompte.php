<?php session_start() ;?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P.A.I.J - Informations</title>
  <link rel="stylesheet" href="assets/style-web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    /* Styles spécifiques pour cette page */
    .account-container {
      max-width: 900px;
      margin: 40px auto;
      display: flex;
      gap: 30px;
    }
    .account-avatar {
      width: 200px;
      text-align: center;
    }
    .account-avatar img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #7B8EEE;
    }
    .account-details {
      flex: 1;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(97, 91, 155, 0.1);
    }
    .detail-row {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #eee;
    }
    .detail-row p {
      flex: 1;
      margin: 0;
      color: #5D5897;
      font-size: 16px;
    }
    .detail-row button {
      background: none;
      border: none;
      cursor: pointer;
      font-size: 20px;
      color: #7B8EEE;
      transition: transform 0.2s;
    }
    .detail-row button:hover {
      transform: scale(1.2);
      color: #5A1763;
    }
    /* Masquer les champs de saisie par défaut */
    .edit-field {
      display: none;
      margin-left: 10px;
    }
    @media (max-width: 768px) {
      .account-container {
        flex-direction: column;
        padding: 20px;
      }
      .account-avatar {
        margin: 0 auto;
      }
    }
  </style>
  <script>
    // Fonction qui bascule l'affichage entre le <span> et le champ <input>
    function toggleEdit(field) {
    const displaySpan = document.getElementById(`${field}-display`);
    const inputField = document.getElementById(`${field}-input`);

    if (inputField.style.display === "none" || inputField.style.display === "") {
        inputField.style.display = "inline-block";
        displaySpan.style.display = "none";
    } else {
        inputField.style.display = "none";
        displaySpan.style.display = "inline";
    }
}
  </script>
</head>
<body class="cmpt">
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

  <section class="banner">
    <h1>Informations du compte</h1>
  </section>

  <div>
    <div class="account-container">
      <div class="account-avatar">
        <img src="assets/Avatar.png" alt="Avatar">
        <h3><?php echo $_SESSION['firstname'].' '.$_SESSION['name']?></h3>
      </div>
    <form class="infos-compte" action="InfosCompte.php" method="POST">
      <?php if (isset($_SESSION['log']) && $_SESSION['log'] == 'Etudiant') { 
        echo '<p class="student-label">Étudiant</p>';
        include("../PDO/InfosCompteEtu.php"); 
      }
      elseif (isset($_SESSION['log']) && $_SESSION['log'] == 'Pilote'){
        echo '<p class="admin-label">Pilote</p>';
        include('../PDO/InfosComptePil.php');
      }  
      elseif (isset($_SESSION['log']) && $_SESSION['log'] == 'Admin'){
        echo '<p class="admin-label">Administrateur</p>';
        include('../PDO/InfosCompteAdm.php');
      } 
      else {
        echo '<p class="error">Erreur : Vous n\'êtes pas connecté.</p>';
      }
      ?>


    </form>
    </div>
  </div>

  <footer>
    <div class="footer-content">
      <p>Web4ALL - 2025</p>
      <p><a id="footer" href="mentions.html">Tous droits réservés 2025 © Politique relative aux cookies, politique de confidentialité et conditions d'utilisation</a></p>
    </div>
  </footer>
</body>
</html>
