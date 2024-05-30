<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_GET['theme_id']) && isset($_GET['theme_name'])) {
    $theme_id = $_GET['theme_id'];
    $theme_name = $_GET['theme_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Confirmation d'Ajout de Groupe</h2>
    <p>ID du Thème: <?php echo htmlspecialchars($theme_id); ?></p>
    <p>Nom du Thème: <?php echo htmlspecialchars($theme_name); ?></p>
</div>
</body>
</html>

<?php
} else {
    header("Location: welcome.php");
    exit();
}
?>
