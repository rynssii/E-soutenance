<?php
if (isset($_POST['fname']) && isset($_POST['pname']) && isset($_POST['fac']) && isset($_POST['special']) && isset($_POST['email']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['typeuser']) && isset($_POST['depa']) && isset($_POST['cycle'])) {
    // Inclure le fichier de connexion à la base de données
    include "../db_conn.php";

    // Récupérer et nettoyer les données du formulaire
    $fname = htmlspecialchars(trim($_POST['fname']));
    $pname = htmlspecialchars(trim($_POST['pname']));
    $fac = htmlspecialchars(trim($_POST['fac']));
    $special = htmlspecialchars(trim($_POST['special']));
    $email = htmlspecialchars(trim($_POST['email']));
    $uname = htmlspecialchars(trim($_POST['uname']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    $typeuser = htmlspecialchars(trim($_POST['typeuser']));
    $depa = htmlspecialchars(trim($_POST['depa']));
    $cycle = htmlspecialchars(trim($_POST['cycle']));

    $data = "fname=" . $fname . "&pname=" . $pname . "&fac=" . $fac . "&special=" . $special . "&email=" . $email . "&uname=" . $uname . "&typeuser=" . $typeuser . "&depa=" . $depa . "&cycle=" . $cycle;

    // Vérification des champs obligatoires
    if (empty($fname)) {
        $em = "Nom obligatoire";
        header("Location: ../index.php?error=$em&$data");
        exit;
    } elseif (empty($uname)) {
        $em = "Numéro d'inscription obligatoire";
        header("Location: ../index.php?error=$em&$data");
        exit;
    } elseif (empty($pass)) {
        $em = "Mot de passe obligatoire";
        header("Location: ../index.php?error=$em&$data");
        exit;
    } else {
        // Hachage du mot de passe
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        if (isset($_FILES['pp']['name']) && !empty($_FILES['pp']['name'])) {
            // Gestion de l'upload de la photo de profil
            $img_name = $_FILES['pp']['name'];
            $tmp_name = $_FILES['pp']['tmp_name'];
            $error = $_FILES['pp']['error'];

            if ($error === 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png');
                if (in_array($img_ex_to_lc, $allowed_exs)) {
                    $new_img_name = uniqid("uname", true) . '.' . $img_ex_to_lc;
                    $img_upload_path = '../upload/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insertion des données dans la base de données
                    $sql = "INSERT INTO users(fname, pname, fac, special, email, username, password, pp, typeuser, depa, cycle) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$fname, $pname, $fac, $special, $email, $uname, $pass, $new_img_name, $typeuser, $depa, $cycle]);

                    header("Location: ../index.php?success=Votre compte est créé avec succès");
                    exit;
                } else {
                    $em = "Vous ne pouvez pas charger des fichiers de ce type!";
                    header("Location: ../index.php?error=$em&$data");
                    exit;
                }
            } else {
                $em = "Une erreur inconnue est survenue!";
                header("Location: ../index.php?error=$em&$data");
                exit;
            }
        } else {
            // Insertion des données sans la photo de profil
            $sql = "INSERT INTO users(fname, pname, fac, special, email, username, password, typeuser, depa, cycle) VALUES(?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fname, $pname, $fac, $special, $email, $uname, $pass, $typeuser, $depa, $cycle]);

            header("Location: ../index.php?success=Votre compte est créé avec succès");
            exit;
        }if (isset($_POST['fname']) && isset($_POST['pname']) && isset($_POST['fac']) && isset($_POST['special']) && isset($_POST['email']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['typeuser']) && isset($_POST['depa']) && isset($_POST['cycle'])) {
			// ... (Your existing code to retrieve and sanitize user data)
		  
			
			// Prepare and execute the SQL query to insert user data, including user type
			$sql = "INSERT INTO users(fname, pname, fac, special, email, username, password, typeuser, depa, cycle) VALUES(?,?,?,?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$fname, $pname, $fac, $special, $email, $uname, $pass, $typeuser, $depa, $cycle]);
		  
			// ... (Rest of your code to handle successful registration)
		  }
    }
} else {
    header("Location: ../index.php?error=error");
    exit;
}






