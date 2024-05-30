

<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id']) || !isset($_SESSION['fname'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

// Récupérer l'identifiant de l'utilisateur connecté
$userID = $_SESSION['id'];

// Connexion à la base de données
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "auth_db";

try {
    $pdo = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
    exit;
}

// Requête SQL pour récupérer les groupes de l'étudiant avec le nom du thème, le nom du prof et les noms des étudiants
$sql = "SELECT g.nomgroup, tp.theme, u.fname AS prof_fname, u.pname AS prof_pname, 
               s1.fname AS student1_fname, s1.pname AS student1_pname, 
               s2.fname AS student2_fname, s2.pname AS student2_pname, 
               s3.fname AS student3_fname, s3.pname AS student3_pname
        FROM groupp g 
        INNER JOIN themeprof tp ON g.theme = tp.id 
        INNER JOIN users u ON tp.prof = u.id
        LEFT JOIN users s1 ON g.student1 = s1.id
        LEFT JOIN users s2 ON g.student2 = s2.id
        LEFT JOIN users s3 ON g.student3 = s3.id
        WHERE g.student1 = ? OR g.student2 = ? OR g.student3 = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID, $userID, $userID]);
$studentGroups = $stmt->fetchAll();

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
              <a class="nav-link" href="home-student.php">
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
                    <a class="nav-link" href="home-student.php">Mon Espace</a>
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
                    <a class="nav-link" href="profiles.php">Trouver un encadrant</a>
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
                    <a class="nav-link" href="table-student-rdv.php">Consulter Calandier</a>
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
            </div>
            
            
 










<div class="profill pb-5">
    <h1 class="text-center"style="color:#B959B5;">Espace Etudiant(e)</h1>
</div>



<div class="container">
<div class="card" style="width: 100%;height: 100%;border: #6E2893; background-color:#6E2893">
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
          <p style="color:#545454 ;font-size:13px;"><?=$_SESSION['fname']?>  <?=$_SESSION['pname']?></p>
        </div>
    
        <div class="col-md-3  text-center">
              <p style="color: #6E2893;font-size:16px;font-weight: 500;">Faculté & Spécialité & Département</p>
              <p style="color: #545454;font-size:13px;"><?=$_SESSION['fac']?> / <?=$_SESSION['special']?> / <?=$_SESSION['depa']?></p>
        </div>

        <div class="col-md-3 text-center">
              <p style="color: #6E2893;font-size:16px;font-weight: 500;">cycle</p>
              <p style="color: #545454;font-size:13px;"><?=$_SESSION['cycle']?></p>
        </div>

        <div class="col-md-3  text-center">     
          <p style="color: #6E2893;font-size:16px;font-weight: 500;">Situation</p>
          <p style="color: #545454;font-size:13px;"><?=$_SESSION['typeuser']?></p>
        </div>

        
      </div>
    </div>
  </div>

  <div class="card p-4" style="width: 100%;height: 100%; background-color: white;border: white;  ">
  <div class="card2">
      

  <div class="container">
        <h1 class="mb-4">Votre groupe :</h1>
        <?php if (empty($studentGroups)): ?>
            <p>Vous n'êtes associé à aucun groupe pour le moment.</p>
        <?php else: ?>
            <ul class="list-group">
                <?php foreach ($studentGroups as $group): ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <h5 class="mb-0">Nom du groupe : <?php echo $group["nomgroup"]; ?></h5>
                                <small>Thème : <?php echo $group["theme"]; ?></small>
                            </div>
                            <div class="col">
                                <h5 class="mb-0">Professeur : <?php echo $group["prof_fname"] . ' ' . $group["prof_pname"]; ?></h5>
                            </div>
                            <div class="col">
                                <h5 class="mb-0">Étudiants :</h5>
                                <?php 
                                    $students = [];
                                    if ($group["student1_fname"] && $group["student1_pname"]) {
                                        $students[] = $group["student1_fname"] . ' ' . $group["student1_pname"];
                                    }
                                    if ($group["student2_fname"] && $group["student2_pname"]) {
                                        $students[] = $group["student2_fname"] . ' ' . $group["student2_pname"];
                                    }
                                    if ($group["student3_fname"] && $group["student3_pname"]) {
                                        $students[] = $group["student3_fname"] . ' ' . $group["student3_pname"];
                                    }
                                    echo implode(", ", $students);
                                ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <div classe="link " >
   <h3 class="mt-5 d-flex justify-content-center"><a style="text-decoration: none; color:#6E2893" href="view_dates.php">Voir la date de soutenance</a></h3> 
   <h6 class="mt-2 d-flex justify-content-center">click ici</h6>
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







    
   