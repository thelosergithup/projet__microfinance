 <?php
    session_start();
    ob_start();
    ?>
 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="UTF-8">
     <title>STAGE2024</title>
     <link rel="shortcut icon" href="pmfupload/logo/logo.png">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!--        <link href="pmfcss/login.css" rel="stylesheet" type="text/css" />-->

     <link href="pmfplugin/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

     <style>
         body {
             font-family: Book Antiqua !important;
         }
     </style>
 </head>
 <?php
    include('pmfconnexion/connexion.php');
    //include('pmfpages/pmffunction.php');



    include('pmfconnexion/connexion.php');
    //include('pmfpages/pmffunction.php');

    if (isset($_GET["locks"])) {
        //session_unregister("login");
        session_unset();
        session_destroy();
        header("Location:./");
        exit();
    }

    ?>

 <body>
     <?php
        if (isset($_POST['conpmf'])) {
            $login = addslashes($_POST["loginpmf"]);
            $pass = sha1(addslashes($_POST["passwordpmf"]));
            $re = $con->query("select * from utilisateur as u where u.loginuser='" . $login . "' and u.passuser='" . $pass . "'") or die(mysqli_error($con));
            $req = mysqli_num_rows($re);
            if ($req == 0) {
                echo "<script language='javascript'>alert('Information non valide')</script>";
            } else {

                $r = mysqli_fetch_assoc($re);
                $_SESSION["iduser"] = $r["iduser"];
                //$_SESSION["idag"] = $r["idag"];
                $_SESSION["nomuser"] = $r["nomuser"];
                $_SESSION["prenomuser"] = $r["prenomuser"];
                $_SESSION["emailuser"] = $r["emailuser"];
                $_SESSION["roleuser"] = $r["roleuser"];
                $_SESSION["cniuser"] = $r["cniuser"];
                $_SESSION["etatuser"] = $r["etatuser"];
                $_SESSION["dateajoutuser"] = $r["dateajoutuser"];
                $_SESSION["loginuser"] = $r["loginuser"];
                $_SESSION["passuser"] = $r["passuser"];
                $_SESSION["teluser"] = $r["teluser"];
                $_SESSION["photouser"] = $r["photouser"];


                if (isset($_SESSION["etatuser"]) && ($_SESSION["loginuser"])) {

                    if ((($_SESSION["roleuser"] == "administrateur") || ($_SESSION["roleuser"] == "Directeur Général") || ($_SESSION["roleuser"] == "utilisateur"))  && ($_SESSION["etatuser"]) == 1) {

                        header("Location:indexadmin.php");
                    }
                } else {
                    echo "<script language='javascript'>alert('Utilisateur inactive !!')</script>";
                }
            }
        }

        if (isset($_SESSION['loginuser']) && isset($_SESSION['passuser']) && ($_SESSION["etatuser"])) {
            if ($_SESSION["roleuser"] == "administrateur") {
                header("Location:indexadmin.php");
            }
        }
        ?>



     <div class="container">

         <form class="form-signin" method="post" action="#">
             <h2 class="form-signin-heading">veuillez entrer vos identifiants</h2>
             <input type="text" class="form-control" required="" name="loginpmf" placeholder="Identifiant" autofocus> <br />
             <input type="password" class="form-control" name="passwordpmf" placeholder="Mot de passe"><br />

             <button class="btn btn-lg btn-primary btn-block" type="submit" name="conpmf">Connexion</button>
         </form>

     </div>