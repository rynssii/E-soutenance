
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
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
                    <a class="nav-link" href="table-fds.php">Consulter fiche de suivi</a>
                  </li>
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
            </div>
            
            
 














   
<div class="container" name="container1" id="container1">
        <div class="pt-5 pb-4" name="ptpd1" id="ptpd1">
            <h1 class="text-center" name="textcenter1" id="textcenter1" style="color:  #6E2893; font-size:50px;font-weight:500px;">Liste des groupes</h1>
        </div>
        <table class="table" name="table1" id="table1" style="border-radius: 0px; overflow: hidden;">
          <thead class="thead-dark" name="threaddark1" id="threaddark1">
            <tr name="tr1" id="tr1">
              
              <th scope="col" name="col2" id="col2" style="background-color: #6E2893;color: white;font-size: 20px;">Encadrants</th>
              <th scope="col" name="col3" id="col3" style="background-color: #6E2893;color: white;font-size: 20px;">Etudiant(s)</th>
              <th scope="col" name="col4" id="col4" style="background-color: #6E2893;color: white;font-size: 20px; ">Theme</th>
              <th scope="col" name="col5" id="col5" style="background-color: #6E2893;color: white;font-size: 20px;">Dossiers de soutenance</th>
              <th scope="col" name="col5" id="col5" style="background-color: #6E2893;color: white;font-size: 20px;"></th>
              
            </tr>
          </thead>
          <tbody>
            <tr name="tr2" id="tr2">
               
                <td  style="background-color: #6E2893; color: white;font-size: 20px;border-top-width: 5px; border-bottom-width: 5px; border-color:white;"></td>
                <td  style="background-color: #6E2893; color: white;font-size: 20px;border-top-width: 5px; border-bottom-width: 5px; border-color:white;"></td>
                <td  style="background-color: #6E2893; color: white;font-size: 20px;border-top-width: 5px; border-bottom-width: 5px; border-color:white;"></td>
                
                <td name="td16" id="td16" style="background-color: #6E2893;color: white;width:10px;border-top-width: 5px; border-bottom-width: 5px; border-color:white;">
              <button type="button" class="btn" nname="btn4" id="btn4" style="background-color: white; position: relative;
                                display: flex;
                                align-items: center ;
                                padding: 10px 30px;
                                outline: 0;
                                border: 0;
                                border-radius: 10px;
                                font-size: 15px;
                                font-weight: 700;
                                 width:165px;
                                cursor: pointer;" > 
                              <a class="postuler" name="postuler4" id="postuler5" style="text-decoration: none; color:#545454;" href="#">Fiche de suivie</a>
                             </button>
                </td>
                <td name="td16" id="td16" style="background-color: #6E2893;color: white;width:10px;border-top-width: 5px; border-bottom-width: 5px; border-color:white;">
              <button type="button" class="btn" nname="btn4" id="btn4" style="background-color: white; position: relative;
                                display: flex;
                                align-items: center ;
                                padding: 10px 30px;
                                outline: 0;
                                border: 0;
                                border-radius: 10px;
                                font-size: 15px;
                                font-weight: 700;
                                 width:140px;
                                cursor: pointer;" > 
                              <a class="postuler" name="postuler4" id="postuler5" style="text-decoration: none; color:#545454;" href="#">proposition</a>
                             </button>
            </td>
            

            
                </tr>
               
            </tr>
            </tbody>
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


<?php }else {
	header("Location: welcome.php");
	exit;
} ?>