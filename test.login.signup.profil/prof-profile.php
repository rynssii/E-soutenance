<?php
session_start();

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "auth_db";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
        // Récupérer l'ID du professeur connecté
        $profId = $_SESSION['id'];

        // Récupérer les thèmes ajoutés par le professeur
        $sql = "SELECT theme, cyclet, specialt FROM themeprof WHERE prof = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$profId]);
        $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du Professeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <!-- Navbar content -->
    </nav>
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <!-- Sidebar content -->
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header"></div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Profil du Professeur</h4>
                            <p class="card-description">Thèmes ajoutés</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Thème</th>
                                        <th>Cycle</th>
                                        <th>Spécialité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($themes as $theme) { ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($theme['theme']); ?></td>
                                            <td><?php echo htmlspecialchars($theme['cyclet']); ?></td>
                                            <td><?php echo htmlspecialchars($theme['specialt']); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/misc.js"></script>
</body>
</html>
<?php
    } else {
        header("Location: welcome.php");
        exit;
    }
} catch(PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
    exit;
}
?>
