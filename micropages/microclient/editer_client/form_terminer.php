<?php
if (isset($_SESSION['formcliente']) && $_SESSION['formcliente'] != NULL) {
    update_client($_SESSION['formcliente'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>