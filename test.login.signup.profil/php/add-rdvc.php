<?php
if (isset($_POST['date']) && isset($_POST['heure']) && isset($_POST['lieu']) && isset($_POST['nmgroup'])) {
    $sName = "localhost";
    $uName = "root";
    $pass = "";
    $db_name = "auth_db";

    try {
        $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    // Récupérer et nettoyer les données du formulaire
    $date = htmlspecialchars(trim($_POST['date']));
    $heure = htmlspecialchars(trim($_POST['heure']));
    $lieu = htmlspecialchars(trim($_POST['lieu']));
    $nmgroup = htmlspecialchars(trim($_POST['nmgroup']));

    $data = "date=" . $date . "&heure=" . $heure . "&lieu=" . $lieu . "&nmgroup=" . $nmgroup;

    // Vérification des champs obligatoires
    if (empty($date)) {
        $em = "Date obligatoire";
        header("Location: ../form-prof-rdv.php?error=$em&$data");
        exit;
    } else {
        try {
            // Insertion des données dans la base de données
            $sql = "INSERT INTO rdvprof (date, heure, lieu, nmgroup) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$date, $heure, $lieu, $nmgroup]);

            header("Location: ../form-prof-rdv.php?success=Le rendez-vous a été ajouté avec succès");
            exit;
        } catch (PDOException $e) {
            $em = "Erreur lors de l'insertion des données : " . $e->getMessage();
            header("Location: ../form-prof-rdv.php?error=$em&$data");
            exit;
        }
    }
} else {
    header("Location: ../form-prof-rdv.php?error=Champs obligatoires manquants");
    exit;
}
?>
