<?php
if (isset($_SESSION['formcompte']) && $_SESSION['formcompte'] != NULL) {
    inserer_compte($_SESSION['formcompte'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>                                                                                                                                                                                                                                                                 