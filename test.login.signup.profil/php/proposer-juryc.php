<?php

if (isset($_POST['theme']) && 
    isset($_POST['cycle']) &&
    isset($_POST['prof1']) &&
    isset($_POST['prof2']) &&
    isset($_POST['prof3']) &&
    isset($_POST['prof4'])) {
    
    include "../db_conn.php";

    // Récupérer et nettoyer les données du formulaire
    $theme = htmlspecialchars(trim($_POST['theme']));
    $cycle = htmlspecialchars(trim($_POST['cycle']));
    $prof1 = htmlspecialchars(trim($_POST['prof1']));
    $prof2 = htmlspecialchars(trim($_POST['prof2']));
    $prof3 = htmlspecialchars(trim($_POST['prof3']));
    $prof4 = htmlspecialchars(trim($_POST['prof4']));

    $data = "theme=" . $theme . "&cycle=" . $cycle . "&prof1=" . $prof1 . "&prof2=" . $prof2 . "&prof3=" . $prof3 . "&prof4=" . $prof4;

    // Vérification des champs obligatoires
    if (empty($theme)) {
        $em = "Thème obligatoire";
        header("Location: ../form-jury.php?error=$em&$data");
        exit;
    } else {
        try {
            // Insertion des données dans la base de données
            $sql = "INSERT INTO jury (theme, cycle, prof1, prof2, prof3, prof4) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$theme, $cycle, $prof1, $prof2, $prof3, $prof4]);

            header("Location: ../form-jury.php?success=La proposition a étée ajouté avec succès");
            exit;
        } catch (PDOException $e) {
            $em = "Erreur lors de l'insertion des données : " . $e->getMessage();
            header("Location: ../form-jury.php?error=$em&$data");
            exit;
        }
    }
} else {
    header("Location: ../form-jury.php?error=Champs obligatoires manquants");
    exit;
}
?>
