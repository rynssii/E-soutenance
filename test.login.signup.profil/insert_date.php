<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_POST['submit'])) {
    // Vérifier si la date est définie pour ce thème
    $theme_id = $_POST['submit'];
    $date_key = 'date_' . $theme_id;
    if (isset($_POST[$date_key]) && !empty($_POST[$date_key])) {
        // Connexion à la base de données
        $sName = "localhost";
        $uName = "root";
        $pass = "";
        $db_name = "auth_db";

        try {
            $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si une date est déjà fixée pour ce thème
            $sql = "SELECT id FROM soutenance WHERE theme = :theme_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':theme_id', $theme_id);
            $stmt->execute();
            $existing_id = $stmt->fetchColumn();

            if ($existing_id) {
                // Mettre à jour la date existante pour ce thème
                $sql = "UPDATE soutenance SET date = :date WHERE id = :existing_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':date', $_POST[$date_key]);
                $stmt->bindParam(':existing_id', $existing_id);
                $stmt->execute();

                echo "Date mise à jour avec succès pour le thème ID: " . $theme_id;
            } else {
                // Insérer la nouvelle date pour ce thème
                $sql = "INSERT INTO soutenance (date, theme) VALUES (:date, :theme_id)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':date', $_POST[$date_key]);
                $stmt->bindParam(':theme_id', $theme_id);
                $stmt->execute();

                echo "Date insérée avec succès pour le thème ID: " . $theme_id;
            }
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    } else {
        echo "Veuillez sélectionner une date pour le thème ID: " . $theme_id;
    }
} else {
    echo "Vous n'êtes pas autorisé à accéder à cette page.";
}
?>