<?php
session_start();
if ((!($_SESSION['loginuser'])) || (!($_SESSION['passuser'])) || (($_SESSION['roleuser'])) != "Super Administrateur" ) {
            header('location:../index.php');
        }
?>