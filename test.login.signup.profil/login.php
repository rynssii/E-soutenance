<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap2.js"></script>
</head>
<body>

<nav style="background-color: #F0DDFF;"   class="navbar navbar-expand-lg p-3 ">
    <div class="container-fluid">
      <a class="navbar-brand" href=""><img  src="assets/images/logo.svg" width="150px" alt="logo"></a>
      <button style="background-color: whitesmoke; margin-right: auto;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span  class="navbar-toggler-icon "></span>
      </button>
    
      <form class="d-flex">
        <button style="color: #6E2893; background-color:white ; padding: 10px 30px;" class="btn  m-1" type="submit">
          <a style="text-decoration: none; color: #6E2893;" href="index.php" class="link"> S'Inscrire </a>  
        </button>
       </form>
    </div>
  </nav>

    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-5" 
    	      action="php/login.php" 
    	      method="post"
			  style=
				   " position: absolute;
                   flex-direction: column;
                   gap: 20px;
                   width: 600px;
                   background-color: #C877BE;
                   padding: 20px;
                   border-radius: 10px;
                   box-shadow: 0 30px 30px -30px rgba(27, 26, 26, 0.315);">

        <div style="color: white;
                    font-size: 30px;
                    font-weight: 600;
                    letter-spacing: -1px;
                    line-height: 30px;
                    display: flex;
                    align-items: center;
                    justify-content: center;" class="title p-4">Connecter Vous !
		</div>


    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['erreur']; ?>
			</div>
		    <?php } ?>

		  <div class="mb-3">
		    <label class="form-label text-white">Numéro d'inscription :</label>
		    <input type="text" 
		           class="form-control"
		           name="uname"
				   style="outline: 0;
                border: 1px solid rgb(219, 213, 213);
                padding: 8px 14px;
                border-radius: 8px;
                width: 100%;
                height: 50px;"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label text-white">Mot de passe :</label>
		    <input type="password" 
		           class="form-control"
		           name="pass"
				   style="outline: 0;
                border: 1px solid rgb(219, 213, 213);
                padding: 8px 14px;
                border-radius: 8px;
                width: 100%;
                height: 50px;">
		  </div>
		  
        <button type="submit" class="btn btn-primary m-4"
		style="padding: 10px 35px;
     outline: 0;
     border: 0;
     border-radius: 8px;
     font-size: 12px; 
     font-weight: 700;
     padding: 10px 35px;
     background-color:white;
     color: darkgrey;
     cursor: pointer;">Connexion</button> 
		    <a href="index.php" class="text-white p-2  ">S'inscrire</a>	  
		</form>
    </div>

	<div style="padding-top: 60px;" class="footer">
    <footer style="background-color: #6E2893;" class=" text-center text-lg-start text-white">
      <!-- Grid container -->
      <div class="container p-5">
        <!--Grid row-->
        <div class="row my-3">
          <!--Grid column-->
          <div  class="col-lg-3 col-md-6 mb-4 mb-md-0">
  
            <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
              <img src="assets/images/logo-mini.svg" height="70" alt="logo"
                   loading="lazy" />
            </div>
  
            <p style="font-size: 18px;
            font-weight: 200;" class="text">Soutenance bien organisé,plus qu'à célébrer !</p>
  
          </div>
        
  
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">POUR LES ENSEIGNANTS</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Ajouter un théme</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Modifier un rendez-vous</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Consulter calandier des rendez-vous</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Postuller l’autorisation de soutenance</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Proposer les membres des juries</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Consulter le planning</a></li>
            </ul>
          </div>
          <!--Grid column-->
  
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-6 mb-md-0">
            <h5 class="text-uppercase mb-4">Pour les étudiants</h5>

            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Trouver un encadrant</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Trouver un binome</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Fixer un rendez-vous</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Consulter calandier des rendez-vous</a></li>
              <li class="mb-2">
                <a href="#!" style="font-size: 14px;" class="text-white"><i class="fas  pe-3"></i>Consulter le planning</a></li>
            </ul>
          </div>
          <!--Grid column-->
  
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5  class="text-uppercase mb-4">Contact</h5>
  
            <ul style="font-size: 14px;" class="list-unstyled">
              <li>
                <p><i class="fas fa-map-marker-alt pe-2"></i>Badji Mokhtar University, Annaba, 23000 Algeria.</p>
              </li>
              <li>
                <p><i class="fas fa-phone pe-2"></i> Tél : +213 (0) 38 57 02 05</p>
              </li>
              <li>
                <p><i class="fas fa-envelope pe-2 mb-0"></i>  E-mail :E-soutenance@univ-annaba.dz</p>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div  class="text-center p-4" style="background-color: #F0DDFF;color:#B959B5;
      font-weight: 600;">
        © 2024 Copyright:
        <a style="font-family:Arial, Helvetica, sans-serif; color: #B959B5; "   href="file:///C:/xampp/htdocs/projetmemoire/public/index.html?">E-soutenance.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    
    </div>


</body>
</html>