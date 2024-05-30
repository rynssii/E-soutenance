<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap2.js"></script>
<style>
.radio-button {
  display: flex;
  gap: 10px;
  justify-content: center;
  margin: 10px;
  position: relative;
  align-items: center;
  color: white;
}

.radio-button input[type="radio"] {
  position: absolute;
  opacity: 0;
}

.radio {
  position: relative;
  display: inline-block;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  border: 2px solid #ccc;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
  transform: translateZ(-25px);
  transition: all 0.3s ease-in-out;
}

.radio::before {
  position: absolute;
  content: '';
  width: 10px;
  height: 10px;
  top: 5px;
  left: 5px;
  border-radius: 50%;
  background-color: #fff;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  opacity: 0;
  transition: all 0.3s ease-in-out;
}

.radio-button input[type="radio"]:checked + .radio {
  border-color: #5cb85c;
  transform: translateZ(0px);
  background-color: #fff;
}

.radio-button input[type="radio"]:checked + .radio::before {
  opacity: 1;
}

</style>



</head>
<body>

<nav style="background-color: #F0DDFF;"   class="navbar navbar-expand-lg mb-5 p-3 ">
    <div class="container-fluid">
      <a class="navbar-brand" href=""><img  src="assets/images/logo.svg" width="150px" alt="logo"></a>
      <button style="background-color: whitesmoke; margin-right: auto;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span  class="navbar-toggler-icon "></span>
      </button>
    
      <form class="d-flex">
        <button style="color: white; background-color:#6E2893 ; padding: 10px 25px;" class="btn btn-outline-white m-1" type="submit">
          <a style="text-decoration: none; color: white;" href="login.php" class="link"> Se Connecter </a>
        </button>
       </form>
    </div>
</nav>


    
    	
    
<div class="d-flex justify-content-center pt-5">


    	<form  
		    style=" position: absolute;
                   flex-direction: column;
                   gap: 20px;
                   width: 800px;
                   background-color: #C877BE;
                   padding: 20px;
                   border-radius: 10px;
                   box-shadow: 0 30px 30px -30px rgba(27, 26, 26, 0.315);"
	      class="shadow w-450 p-5  " 
    	  action="php/signup.php" 
    	  method="post"
			  enctype="multipart/form-data">
        <div  style="color: white;
          font-size: 30px;
          font-weight: 600;
          letter-spacing: -1px;
          line-height: 30px;
          display: flex;
          align-items: center;
          justify-content: center;" class="title p-4" class="display-4  fs-1">
    		<p>Créer Votre Compte</p></div>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label style="color: white;" class="form-label">Nom :</label>
		    <input type="text" 
		           class="form-control"
		           name="fname"
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;"
		           value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
		  </div>

      <div class="mb-3">
		    <label style="color: white;" class="form-label">Prénom :</label>
		    <input type="text" 
		           class="form-control"
		           name="pname"
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;"
		           value="<?php echo (isset($_GET['pname']))?$_GET['pname']:"" ?>">
		  </div>

      <div class="mb-3">
		    <label style="color: white;" class="form-label">Faculté :</label>
		    <input type="text" 
		           class="form-control"
		           name="fac"
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;"
		           value="<?php echo (isset($_GET['fac']))?$_GET['fac']:"" ?>">
		  </div>

      <div class="mb-3">
		    <label style="color: white;" class="form-label">Département :</label>
		    <input type="text" 
		           class="form-control"
		           name="depa"
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;"
		           value="<?php echo (isset($_GET['depa']))?$_GET['depa']:"" ?>">
		  </div>

      <div class="form-label">
                       <label style="color: white; margin-bottom:10px;" for="exampleSelectGender">Cycle (pour étudiant) :</label>
                       <select class="form-select"  name="cycle">
                        <option value="Licence">Licence</option>
                        <option value="Master">Master</option>
                        <option value="none"></option>
                        </select>
      </div>


      <div class="mb-3">
		    <label style="color: white;" class="form-label">Spécialitée :</label>
		    <input type="text" 
		           class="form-control"
		           name="special"
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;"
		           value="<?php echo (isset($_GET['special']))?$_GET['special']:"" ?>">
		  </div>

      <div class="mb-3">
		    <label style="color: white;" class="form-label">Email :</label>
		    <input type="email" 
		           class="form-control"
		           name="email"
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;"
		           value="<?php echo (isset($_GET['email']))?$_GET['email']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label style="color: white;" class="form-label">Numéro d'inscription :</label>
		    <input type="text" 
		           class="form-control"
		           name="uname" 
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label style="color: white;" class="form-label">Mot de passe :</label>
		    <input type="password" 
		           class="form-control"
		           name="pass"
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;">
		  </div>

		  <div class="mb-3">
		    <label style="color: white;" class="form-label">Photo de profil :</label>
		    <input type="file" style="color: #628489;"
		           class="form-control"
		           name="pp"
               style="outline: 0;
              border: 1px solid rgb(219, 213, 213);
              padding: 8px 14px;
              border-radius: 8px;
              width: 100%;
              height: 40px;">
		  </div>

      <div style="color:white; margin-bottom: 20px;">
      <div class="form-label">
                       <label style="color:white; margin-bottom:10px;" for="exampleSelectGender">vous etes *:</label>
                       <select class="form-select" name="typeuser">
                        <option value="administrateur">Administrateur</option>
                        <option value="enseignant">Enseignant</option>
                        <option value="etudiant">Etudiant</option>
                        </select>
                      </div>



		  <button type="submit" class="btn btn-primary  m-4 " 
      style="padding: 10px 35px;
     outline: 0;
     border: 0;
     border-radius: 8px;
     font-size: 12px; 
     font-weight: 700;
     padding: 10px 35px;
     background-color:white;
     color: darkgrey;
     cursor: pointer;">S'inscrire</button>
		  <a href="login.php" class="link p-2" style="color:whitesmoke">Se connecter</a>
		</form>
    </div>
</div>




    <div style="padding-top: 1300px;" class="footer">
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