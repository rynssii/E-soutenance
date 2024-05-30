<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap2.js"></script>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
  .buttonn {
  width: 50px;
  height: 50px;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color:transparent;
  border-radius: 50%;
  cursor: pointer;
  transition-duration: .3s;
  
  border: none;
}

.bell {
  width: 16px;
}

.bell path {
  fill: gray;
}



.buttonn:hover .bell {
  animation: bellRing 0.9s both;
}

/* bell ringing animation keyframes*/
@keyframes bellRing {
  0%,
  100% {
    transform-origin: top;
  }

  15% {
    transform: rotateZ(10deg);
  }

  30% {
    transform: rotateZ(-10deg);
  }

  45% {
    transform: rotateZ(5deg);
  }

  60% {
    transform: rotateZ(-5deg);
  }

  75% {
    transform: rotateZ(2deg);
  }
}

.buttonn:active {
  transform: scale(0.8);
}


.btn:hover {
  background-color: #45a049;
}
.card {
  border-radius: 20px; 
  margin: 0 auto;
  overflow: hidden;
}
.image-arrondie {
  border-radius: 20px;
  width: 150px;
  float: left; 
  margin-right: 10px; }
 



    </style>
  </head>
<body>
    <div class="container">
        <div class="nomm pb-5 pt-5">
            <h1 class="text-center" style="color:#B959B5;">Mes Rendez-vous</h1>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Lieu</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                session_start();

                if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
                    // Insérer le code PHP pour générer le tableau ici
                    $sName = "localhost";
                    $uName = "root";
                    $pass = "";
                    $db_name = "auth_db";

                    try {
                        $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Récupérer l'ID de l'étudiant connecté
                        $studentId = $_SESSION['id'];

                        // Récupérer le groupe de l'étudiant
                        $stmt = $conn->prepare("SELECT nomgroup FROM groupp WHERE student1 = ? OR student2 = ? OR student3 = ?");
                        $stmt->execute([$studentId, $studentId, $studentId]);
                        $group = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($group) {
                            // Récupérer les rendez-vous associés au groupe de l'étudiant
                            $groupName = $group['nomgroup'];
                            $stmt = $conn->prepare("
                                SELECT r.id, r.date, r.heure, r.lieu 
                                FROM rdvprof r 
                                JOIN groupp g ON r.nmgroup = g.id 
                                WHERE g.nomgroup = ?
                            ");
                            $stmt->execute([$groupName]);
                            $rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // Afficher les rendez-vous
                            foreach ($rdvs as $rdv) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($rdv['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($rdv['date']) . "</td>";
                                echo "<td>" . htmlspecialchars($rdv['heure']) . "</td>";
                                echo "<td>" . htmlspecialchars($rdv['lieu']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Aucun rendez-vous trouvé pour cet étudiant.</td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "<tr><td colspan='4'>Erreur lors de la récupération des rendez-vous : " . $e->getMessage() . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>L'utilisateur n'est pas connecté.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
