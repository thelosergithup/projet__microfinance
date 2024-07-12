<?php
if (isset($_SESSION['formdemandepret']) && $_SESSION['formdemandepret'] != NULL) {
    inserer_demandepret($_SESSION['formdemandepret'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>