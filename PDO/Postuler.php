<?php
// Include the correct file for the Entreprise class
include_once(__DIR__ . "/Entreprise.php");

try {
    $company = new Entreprise(new PDO('mysql:host=localhost;dbname=web4all', 'root', ''));

    $entreprises = json_decode($company->getAllCompanies());

    if (!$entreprises) {
        die("Erreur : Impossible de charger les données.");
    }

    if (!empty($entreprises)) {
        echo "<div class='container'>";
        foreach ($entreprises as $entreprise) {
            $nom = htmlspecialchars($entreprise->nom);
            $ville = htmlspecialchars($entreprise->ville);
            $secteur = htmlspecialchars($entreprise->secteur);
            $description = htmlspecialchars($entreprise->Description);
            $Intitule_de_la_formation = htmlspecialchars($entreprise->Intitule_de_la_formation);
            $chemin_d_acces_logo = htmlspecialchars($entreprise->chemin_d_acces_logo);
            $competences = isset($entreprise->Competence) ? $entreprise->Competence : [];
            $A_propos_de_l_entreprise = htmlspecialchars($entreprise->A_propos_de_l_entreprise);
            $Objectif_du_poste = htmlspecialchars($entreprise->Objectif_du_poste);

            echo "<div>";
            echo "<div class='case_pour_annonce_Recruteur_offre'>";
            echo "<div class='Barre_verticale_case_pour_annonce_Recruteur_offre'></div>";
            echo "<div class='Barre_horizontale_case_pour_annonce_Recruteur_offre'></div>";
            echo "<div class='intitule_de_la_mission_Offre_visible_Recruteur_offre'>$Intitule_de_la_formation</div>";
            if (!empty($chemin_d_acces_logo)) {
                echo "<p><img class='logo_de_l_entreprise_Recruteur_offre' src='$chemin_d_acces_logo' alt='Logo entreprise ' width='30'></p>";
            }
            echo "<div class='Localisation_entreprise_Recruteur_offre'>$ville</div>";
            echo "<p><img src='image/icon_map_ping.png' class='icon_localisation_Recruteur_offre' alt='Logo entreprise' width='15'></p>";
            echo "</div>";

            if (!empty($competences)) {
                echo "<p><strong>Compétences :</strong></p><ul>";
                foreach ($competences as $competence) {
                    echo "<li>" . htmlspecialchars($competence) . "</li>";
                }
                echo "</ul>";
            }

            echo "</div>"; // Close entreprise div
        }
        echo "</div>"; // Close container div
    } else {
        echo "<p>Aucune entreprise trouvée.</p>";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>