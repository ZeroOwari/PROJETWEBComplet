<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs
    $applicationDate = $_POST['applicationDate'] ?? null;
    $motivationLetter = $_POST['motivationLetter'] ?? null;
    $cvFile = $_FILES['cvUpload'] ?? null;

    if (!$applicationDate || !$motivationLetter || !$cvFile) {
        die("Tous les champs sont requis.");
    }

    // Save the CV file
    $uploadDir = 'uploads/cv/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $cvFileName = basename($cvFile['name']);
    $cvFilePath = $uploadDir . $cvFileName;

    if (move_uploaded_file($cvFile['tmp_name'], $cvFilePath)) {
        // Save application data to the database
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=web4all', 'website_user', 'kxHBI-ozJOjvwr_H');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('INSERT INTO candidatures (date_candidature, lettre_motivation, chemin_cv, id_etudiant) VALUES (:date, :motivation, :cv, :id_etudiant)');
            $stmt->bindParam(':date', $applicationDate, PDO::PARAM_STR);
            $stmt->bindParam(':motivation', $motivationLetter, PDO::PARAM_STR);
            $stmt->bindParam(':cv', $cvFilePath, PDO::PARAM_STR);
            $stmt->bindParam(':id_etudiant', $_SESSION['id'], PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "Votre candidature a été soumise avec succès.";
            } else {
                echo "Erreur lors de la soumission de votre candidature.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Erreur lors du téléversement de votre CV.";
    }
} else {
    echo "Méthode de requête invalide.";
}


        // Charger le contenu du JSON
        include("Pilote.php");
        $company = new Pilote('mysql:host=localhost;dbname=web4all', 'root', '');

        $entreprises = json_decode($company->getAllCompanies());

        if (!$entreprises) {
            die("Erreur : Impossible de charger les données.");
        }


        if (!empty($entreprises)) {
            echo "<div class='container'>";
            foreach ($entreprises as $entreprise) {

                $nom = htmlspecialchars($entreprise['nom']);
                $ville = htmlspecialchars($entreprise['ville']);
                $secteur = htmlspecialchars($entreprise['secteur']);
                $description = htmlspecialchars($entreprise['Description']);
                $Intitule_de_la_formation = htmlspecialchars($entreprise['Intitule_de_la_formation']);
                $chemin_d_acces_logo = htmlspecialchars($entreprise['chemin_d_acces_logo']);
                $competences = isset($entreprise['Competence']) ? $entreprise['Competence'] : [];
                $A_propos_de_l_entreprise = htmlspecialchars($entreprise['A_propos_de_l_entreprise']);
                $Objectif_du_poste = htmlspecialchars($entreprise['Objectif_du_poste']);



                // Affichage des informations de l'entreprise
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

                // Affichage des compétences sous forme de liste
                if (!empty($competences)) {
                    echo "<p><strong>Compétences :</strong></p><ul>";
                    foreach ($competences as $competence) {
                        echo "<li>" . htmlspecialchars($competence) . "</li>";
                    }
                    echo "</ul>";
                }

                // Affichage du logo si disponible


                echo "</div>"; // Fermeture de la div entreprise
            }
            echo "</div>"; // Fermeture du div container
        } else {
            echo "<p>Aucune entreprise trouvée.</p>";
        }
        ?>