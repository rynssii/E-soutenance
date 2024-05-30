
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
            <h1 class="text-center"style="color:#B959B5 ;">Créer une fiche de suivie </h1>
            </div>
            
            
            <div class="container-fluid">
        <div class="row justify-content-center pb-5">
            <form action="submit.php" method="POST" style="position: absolute; flex-direction: column; gap: 20px; width: 1000px; background-color: #C877BE; padding: 20px; border-radius: 10px; box-shadow: 0 30px 30px -30px grey;" class="form">
                <div style="color: white; font-size: 30px; font-weight: 600; letter-spacing: -1px; line-height: 30px; display: flex; align-items: center; justify-content: center;" class="title p-5">
                    Fiche de Suivie d'Encadrement
                </div>

                <div class="row">
                    <div class="col-md-4 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label" for="departement">Département:</label>
                            <input style="outline: 0; border: 1px solid white; padding: 8px 14px; border-radius: 8px;" type="text" name="departement" placeholder="Entrer le département" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label" for="filiere">Filiére:</label>
                            <input style="outline: 0; border: 1px solid rgb(219, 213, 213); padding: 8px 14px; border-radius: 8px;" type="text" name="filiere" placeholder="Entrer la filiére" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label" for="specialite">Spécialité:</label>
                            <input style="outline: 0; border: 1px solid rgb(219, 213, 213); padding: 8px 14px; border-radius: 8px;" type="text" name="specialite" placeholder="Entrer la spécialité" class="form-control">
                        </div>
                    </div>
                </div>

                <div style="color:white; text-align: center;">
                    <label class="form-label" for="intitule_memoire">Intitulé du mémoire:</label>
                    <input style="outline: 0; border: 1px; padding: 8px 14px; border-radius: 8px; height: 100px;" type="text" name="intitule_memoire" class="form-control">
                </div>
                  
                <div class="row">
                    <div class="col-md-4 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label pt-1" for="etudiant1">Ètudiant(e) 1:</label>
                            <input style="outline: 0; border: 1px; padding: 8px 14px; border-radius: 8px;" type="text" name="student1" placeholder="Entrer nom et prénom" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label pt-1" for="etudiant2">Ètudiant(e) 2:</label>
                            <input style="outline: 0; border: 1px; padding: 8px 14px; border-radius: 8px;" type="text" name="student2" placeholder="Entrer nom et prénom" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label pt-1" for="etudiant3">Ètudiant(e) 3:</label>
                            <input style="outline: 0; border: 1px; padding: 8px 14px; border-radius: 8px;" type="text" name="student3" placeholder="Entrer nom et prénom" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label pt-1" for="encadrant">Encadrant(e):</label>
                            <input style="outline: 0; border: 1px; padding: 8px 14px; border-radius: 8px;" type="text" name="encadrant" placeholder="Entrer nom et prénom" class="form-control">
                        </div>
                    </div>
              
                    <div class="col-md-6 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label pt-1" for="grade">Grade:</label>
                            <input style="outline: 0; border: 1px; padding: 8px 14px; border-radius: 8px;" type="text" name="grade" placeholder="Entrer le grade" class="form-control">
                        </div>
                    </div>
                </div><br><br>

                <div class="container" name="container3">
                    <table class="table" name="table4" id="table4" style="border-radius: 10px; overflow: hidden;">
                        <thead class="thead-dark" name="threaddark4" id="threaddark4">
                            <tr name="tr14" id="tr14">
                                <th scope="col" name="col16" id="col16" style="background-color:white;color:#545454;font-size: 20px; border: 2px solid #C877BE">Date</th>
                                <th scope="col" name="col17" id="col17" style="background-color: white;color:#545454;font-size: 20px; border: 2px solid #C877BE">Contenu de la seance</th>
                                <th scope="col" name="col18" id="col18" style="background-color: white;color:#545454;font-size: 20px; border: 2px solid #C877BE;">Taux d'avancement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr name="tr14" id="tr14">
                                <th scope="row" name="row14" id="row14" style="background-color: white;border-top-width: 5px; border-bottom-width: 5px; border: 2px solid #C877BE;">
                                    <input type="text" name="date_seance[]" class="form-control" placeholder="Date de la séance">
                                </th>
                                <td name="td48" id="td48" style="background-color:white;font-size: 20px;border-top-width: 5px; border-bottom-width: 5px; border: 2px solid #C877BE;">
                                    <input type="text" name="contenu_seance[]" class="form-control" placeholder="Contenu de la séance">
                                </td>
                                <td name="td49" id="td49" style="background-color: white;font-size: 20px;border-top-width: 5px; border-bottom-width: 5px; border: 2px solid #C877BE;">
                                    <input type="text" name="taux_avancement[]" class="form-control" placeholder="Taux d'avancement">
                                </td>
                            </tr>
                            <tr name="tr14" id="tr14">
                                <th scope="row" name="row14" id="row14" style="background-color: white;border-top-width: 5px; border-bottom-width: 5px; border: 2px solid #C877BE;">
                                    <input type="text" name="date_seance[]" class="form-control" placeholder="Date de la séance">
                                </th>
                                <td name="td48" id="td48" style="background-color:white;font-size: 20px;border-top-width: 5px; border-bottom-width: 5px; border: 2px solid #C877BE;">
                                    <input type="text" name="contenu_seance[]" class="form-control" placeholder="Contenu de la séance">
                                </td>
                                <td name="td49" id="td49" style="background-color: white;font-size: 20px;border-top-width: 5px; border-bottom-width: 5px; border: 2px solid #C877BE;">
                                    <input type="text" name="taux_avancement[]" class="form-control" placeholder="Taux d'avancement">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12 justify-content-center">
                        <div style="color:white; text-align: center;">
                            <label class="form-label pt-1" for="autorisation_depot">Autorisation du dépôt :</label>
                            <input style="outline: 0; border: 1px; padding: 8px 14px; border-radius: 8px; height: 100px;" type="text" name="autorisation_depot" class="form-control">
                        </div>
                    </div>
                </div><br><br>

                <div style="display: flex; justify-content: center;">
                    <button type="submit" style="background-color: white; color: #C877BE; padding: 10px 20px; border-radius: 10px; border: none; font-size: 20px; font-weight: 600; cursor: pointer;">Soumettre</button>
                </div>
            </form>
        </div>
             </div>


          </div>
        </div> 


      </div>
    </div>

      </div>
    </div>

    
    	
    
		
            
           
		
    


	



           
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