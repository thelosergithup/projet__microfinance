<?php
if (isset($_SESSION['formutilisateure']) && $_SESSION['formutilisateure'] != NULL) {
    update_utilisateur($_SESSION['formutilisateure'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>