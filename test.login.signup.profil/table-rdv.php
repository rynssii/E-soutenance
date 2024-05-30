<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
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

    $sql = "SELECT 
                rdvprof.id AS rdv_id,
                rdvprof.date AS rdv_date,
                rdvprof.heure AS rdv_heure,
                rdvprof.lieu AS rdv_lieu,
                prof.fname AS prof_fname,
                prof.pname AS prof_pname,
                groupp.nomgroup AS group_name,
                student1_user.fname AS student1_fname,
                student1_user.pname AS student1_pname,
                student2_user.fname AS student2_fname,
                student2_user.pname AS student2_pname,
                student3_user.fname AS student3_fname,
                student3_user.pname AS student3_pname
            FROM rdvprof
            JOIN groupp ON rdvprof.nmgroup = groupp.id
            JOIN themeprof ON groupp.theme = themeprof.id
            JOIN users AS prof ON themeprof.prof = prof.id
            JOIN users AS student1_user ON groupp.student1 = student1_user.id
            LEFT JOIN users AS student2_user ON groupp.student2 = student2_user.id
            LEFT JOIN users AS student3_user ON groupp.student3 = student3_user.id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
              <a class="nav-link" href="home-admin.php">
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
                    <a class="nav-link" href="home-admin.php">Mon Espace</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Utilisateur</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="tableprof-sign.php">Liste des enseignants</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="tablestudent-sign.php">Liste des étudiants</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="table-groups.php">Liste des groupes</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Projet</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="table-validation.php">Gérer les thèmes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="table-rdv.php">Consulter les rendez-vous</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Suivit des thèmes</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  
                  <li class="nav-item">
                    <a class="nav-link" href="table-autoris.php">Thèmes autorisés</a>
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
            <h1 class="text-center"style="color:#B959B5 ;">Liste des rendez-vous</h1>
            </div>
            
 


<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Lieu</th>
        <th>Encadrant</th>
        <th>Groupe</th>
        <th>Etudiant(e) 1</th>
        <th>Etudiant(e) 2</th>
        <th>Etudiant(e) 3</th>
    </tr>
    <?php
    if (!empty($rdvs)) {
        foreach ($rdvs as $rdv) {
            echo "<tr>
                    <td>{$rdv['rdv_id']}</td>
                    <td>{$rdv['rdv_date']}</td>
                    <td>{$rdv['rdv_heure']}</td>
                    <td>{$rdv['rdv_lieu']}</td>
                    <td>{$rdv['prof_fname']} {$rdv['prof_pname']}</td>
                    <td>{$rdv['group_name']}</td>
                    <td>{$rdv['student1_fname']} {$rdv['student1_pname']}</td>
                    <td>{$rdv['student2_fname']} {$rdv['student2_pname']}</td>
                    <td>{$rdv['student3_fname']} {$rdv['student3_pname']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No appointments found</td></tr>";
    }
    ?>
</table>


           
            
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




<?php
} else {
    echo "You must be logged in to view this page.";
}
?>
