<?php
if (isset($_SESSION['formclient']) && $_SESSION['formclient'] != NULL) {
    inserer_client($_SESSION['formclient'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>                                                                                                                                                                                                                                                                 