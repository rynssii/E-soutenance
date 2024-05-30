<?php 
session_start();

if(isset($_POST['uname']) && isset($_POST['pass'])){

    include "../db_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;
    
    if(empty($uname)){
        $em = "User name is required";
        header("Location: ../login.php?error=$em&$data");
        exit;
    } else if(empty($pass)){
        $em = "Password is required";
        header("Location: ../login.php?error=$em&$data");
        exit;
    } else {

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if($stmt->rowCount() == 1){
            $user = $stmt->fetch();

            $username =  $user['username'];
            $password =  $user['password'];
            $fname =  $user['fname'];
            $pname =  $user['pname'];
            $fac =  $user['fac'];
            $special =  $user['special'];
            $email =  $user['email'];
            $id =  $user['id']; // Récupération de l'ID de l'utilisateur
            $pp =  $user['pp'];
            $typeuser =  $user['typeuser'];
            $depa =  $user['depa'];
            $cycle =  $user['cycle'];

            // Stockage de l'ID de l'utilisateur dans la session
            $_SESSION['id'] = $id;

            if ($username === $uname) {
                if (password_verify($pass, $password)) {
                    $_SESSION['fname'] = $fname;
                    $_SESSION['pname'] = $pname;
                    $_SESSION['fac'] = $fac;
                    $_SESSION['special'] = $special;
                    $_SESSION['email'] = $email;
                    $_SESSION['pp'] = $pp;
                    $_SESSION['typeuser'] = $typeuser;
                    $_SESSION['depa'] = $depa;
                    $_SESSION['cycle'] = $cycle;

                    if ($typeuser === 'administrateur') {
                        header("Location: ../home-admin.php");
                        exit;
                    } elseif ($typeuser === 'enseignant') {
                        header("Location: ../home-prof.php");
                        exit;
                    } elseif ($typeuser === 'etudiant') {
                        header("Location: ../home-student.php");
                        exit;
                    } else {
                        // Type d'utilisateur inconnu
                    }
                } else {
                    $em = "Incorrect User name or password";
                    header("Location: ../login.php?error=$em&$data");
                    exit;
                }
            } else {
                $em = "Incorrect User name or password";
                header("Location: ../login.php?error=$em&$data");
                exit;
            }
        } else {
            $em = "Incorrect User name or password";
            header("Location: ../login.php?error=$em&$data");
            exit;
        }
    }
} else {
    header("Location: ../login.php?error=error");
    exit;
}
?>
