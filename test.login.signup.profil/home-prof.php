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

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['theme_id'])) {
            // Récupérer l'ID du thème soumis
            $themeId = $_POST['theme_id'];

            // Mettre à jour la base de données pour autoriser le thème
            $sql = "UPDATE themeprof SET autoris = 1 WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$themeId]);
        }

        // Récupérer les thèmes ajoutés par le professeur avec les noms correspondants
        $sql = "SELECT themeprof.id AS theme_id, themeprof.theme, cycle.name AS cyclet_name, specialite.name AS specialt_name 
        FROM themeprof 
        LEFT JOIN cycle ON themeprof.cyclet = cycle.id 
        LEFT JOIN specialite ON themeprof.specialt = specialite.id 
        WHERE themeprof.prof = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$profId]);
        $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
?>


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
    <div class="container-scroller">
      
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <a class="navbar-brand brand-logo" href="home-prof.php"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="home-prof.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
           
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>



       


           
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="logout.php">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
           
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                <img src="upload/<?=$_SESSION['pp']?>" class="img-fluid" alt="profile">
                </div>
                <div class="nav-profile-text d-flex flex-column">
                 <p class="nom mt-3"><?=$_SESSION['fname']?>  <?=$_SESSION['pname']?> </p>
                </div>
                
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home-prof.php">
                <span class="menu-title">Menu</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <span class="menu-title">Profil</span>
                <i class="mdi mdi-profilmenu-icon"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="home-prof.php">Mon Espace</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Thème</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add-theme.php">Ajouter un thème</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="add-group.php">Créer un groupe</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="table-group-p.php">Consulter les groupes</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Suivit</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="form-prof-rdv.php">Fixer rendez-vous</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="tabl-rdv.php">Consulter Calandier</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Administration</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="form-fds.php">Créer fiche de suivi</a>
                  </li>
                  
                  
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            <h1 class="text-center"style="color:#B959B5 ;">Espace Enseignant</h1>
            </div>
            
            
 


<div class="container">
<div class="card" style="width: 100%;height: 100%;border: #B959B5; background-color:#6E2893">
<div class="card-body" >

  <div class="row">
    <div class="col-md-2 ms-3 pt-3">
      <img src="upload/<?=$_SESSION['pp']?>"  alt="profile"
          class="image-arrondie img-fluid"
          style="height:120px; width:150px;" />
    </div>

    <div class="col-md-8 pt-5 ms-3">
      <h2 style="color: white;"><?=$_SESSION['fname']?>  <?=$_SESSION['pname']?></h2>
    </div>
    
  </div>

<div class="container">
  <div class="card mt-5 mb-5" style="width: 100%;height: 100%; background-color:#F0DDFF; border: #F0DDFF;">
    <div class="card-body"  style=" color: white;">
      <div class="row justify-content-center " >
        <div class="col-md-3  text-center">
          <p style="color: #6E2893;font-size:16px;font-weight: 500;">Nom & Prénom </p>
          <p style="color:#545454 ;font-size:12px;"><?=$_SESSION['fname']?>  <?=$_SESSION['pname']?></p>
        </div>
    
        <div class="col-md-3  text-center">
              <p style="color: #6E2893;font-size:16px;font-weight: 500;">Faculté & Spécialité & Département</p>
              <p style="color: #545454;font-size:12px;"><?=$_SESSION['fac']?> / <?=$_SESSION['special']?> / <?=$_SESSION['depa']?></p>
        </div>

        <div class="col-md-3 text-center">
              <p style="color: #6E2893;font-size:16px;font-weight: 500;">Contact</p>
              <p style="color: #545454;font-size:12px;"><?=$_SESSION['email']?></p>
        </div>

        <div class="col-md-3  text-center">     
          <p style="color: #6E2893;font-size:16px;font-weight: 500;">Situation</p>
          <p style="color: #545454;font-size:12px;"><?=$_SESSION['typeuser']?></p>
        </div>

        
      </div>
    </div>
  </div>



<div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thèmes ajoutés</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thème</th>
                            <th>Cycle</th>
                            <th>Spécialité</th>
                            <th>Action</th> <!-- Ajout de la colonne pour le bouton -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($themes as $theme) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($theme['theme_id']); ?></td>
                                <td><?php echo htmlspecialchars($theme['theme']); ?></td>
                                <td><?php echo htmlspecialchars($theme['cyclet_name']); ?></td>
                                <td><?php echo htmlspecialchars($theme['specialt_name']); ?></td>
                                <td>
                                    <!-- Formulaire pour autoriser -->
                                    <form method="POST">
                                        <input type="hidden" name="theme_id" value="<?php echo $theme['theme_id']; ?>">
                                        <button type="submit" class="btn btn-gradient-primary">Autoriser</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div classe="link " >
   <h3 class="mt-5 d-flex justify-content-center"><a style="text-decoration: none; color:#6E2893" href="view_dates.php">Voir les dates des soutenance</a></h3> 
   <h6 class="mt-2 d-flex justify-content-center">click ici</h6>
    </div>

            </div>
        </div>
</div>

  





  </div>
</div>
</div>

</div>

    
      
    
    
            
           
    
    


  



           
            
          </div>
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>

</html>









