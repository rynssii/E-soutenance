<?php
session_start();

if (isset($_POST['theme'], $_POST['specialt'], $_POST['cyclet'])) {
    include "../db_conn.php";

    // Récupérer et nettoyer les données du formulaire
    $theme = htmlspecialchars(trim($_POST['theme']));
    $cyclet = htmlspecialchars(trim($_POST['cyclet']));
    $specialt = htmlspecialchars(trim($_POST['specialt']));

    $data = "theme=" . $theme . "&specialt=" . $specialt . "&cyclet=" . $cyclet;

    // Vérification des champs obligatoires
    if (empty($theme)) {
        $em = "Thème obligatoire";
        header("Location: ../add-theme.php?error=$em&$data");
        exit;
    }

    // Récupérer l'ID du professeur connecté
    if (!isset($_SESSION['id'])) {
        header("Location: ../login.php?error=Session expirée. Veuillez vous reconnecter.");
        exit;
    }
    $profId = $_SESSION['id'];

    try {
        // Vérifier si les valeurs de clés étrangères existent dans les tables de référence
        $stmt = $conn->prepare("SELECT id FROM cycle WHERE id = ?");
        $stmt->execute([$cyclet]);
        if ($stmt->rowCount() == 0) {
            $em = "Cycle non trouvé: " . $cyclet;
            header("Location: ../add-theme.php?error=$em&$data");
            exit;
        }

        $stmt = $conn->prepare("SELECT id FROM specialite WHERE id = ?");
        $stmt->execute([$specialt]);
        if ($stmt->rowCount() == 0) {
            $em = "Spécialité non trouvée: " . $specialt;
            header("Location: ../add-theme.php?error=$em&$data");
            exit;
        }

        // Insertion des données dans la base de données
        $sql = "INSERT INTO themeprof (theme, cyclet, specialt, prof) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$theme, $cyclet, $specialt, $profId]);

        // Récupérer l'ID du thème inséré
        $themeId = $conn->lastInsertId();

        header("Location: ../add-theme.php?success=Le thème a été ajouté avec succès&themeId=$themeId");
        exit;
    } catch (PDOException $e) {
        $em = "Erreur lors de l'insertion des données: " . $e->getMessage();
        header("Location: ../add-theme.php?error=$em&$data");
        exit;
    }
} else {
    header("Location: ../add-theme.php?error=Champs obligatoires manquants");
    exit;
}
?>
