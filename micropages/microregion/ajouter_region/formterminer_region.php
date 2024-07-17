<?php
if (isset($_SESSION['formregion']) && $_SESSION['formregion'] != NULL) {
    inserer_region($_SESSION['formregion'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>
