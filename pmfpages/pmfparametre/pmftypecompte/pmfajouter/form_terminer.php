<?php
if (isset($_SESSION['formtypecompte']) && $_SESSION['formtypecompte'] != NULL) {
    inserer_typecompte($_SESSION['formtypecompte'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>