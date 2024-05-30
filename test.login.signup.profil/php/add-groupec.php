<?php

if (isset($_POST['theme'], $_POST['nomgroup'], $_POST['student1'])) {
    include "../db_conn.php";

    // Nettoyer et récupérer les données du formulaire
    $theme = htmlspecialchars(trim($_POST['theme']));
    $nomgroup = htmlspecialchars(trim($_POST['nomgroup']));
    $student1 = htmlspecialchars(trim($_POST['student1']));
    $student2 = isset($_POST['student2']) ? htmlspecialchars(trim($_POST['student2'])) : '';
    $student3 = isset($_POST['student3']) ? htmlspecialchars(trim($_POST['student3'])) : '';

    // Vérifier si les champs obligatoires sont vides
    if (empty($theme) || empty($nomgroup) || empty($student1)) {
        $error = "Remplissez les champs obligatoires";
        header("Location: ../add-group.php?error=" . urlencode($error));
        exit;
    }

    try {
        // Vérifier si le thème existe déjà
        $check_sql = "SELECT COUNT(*) AS count FROM groupp WHERE theme = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->execute([$theme]);
        $row = $check_stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['count'] > 0) {
            $error = "Ce thème existe déjà dans la base de données";
            header("Location: ../add-group.php?error=" . urlencode($error));
            exit;
        }

        // Si le thème n'existe pas déjà, insérer le groupe dans la base de données
        $insert_sql = "INSERT INTO groupp (theme, nomgroup, student1, student2, student3) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->execute([$theme, $nomgroup, $student1, $student2, $student3]);

        // Rediriger avec un message de succès
        $success = "Le groupe a été ajouté avec succès";
        header("Location: ../add-group.php?success=" . urlencode($success));
        exit;
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion des données : " . $e->getMessage();
        header("Location: ../add-group.php?error=" . urlencode($error));
        exit;
    }
} else {
    // Rediriger si des champs obligatoires sont manquants
    $error = "Champs obligatoires manquants";
    header("Location: ../add-group.php?error=" . urlencode($error));
    exit;
}
?>
