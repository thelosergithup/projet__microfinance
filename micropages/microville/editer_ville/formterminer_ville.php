<?php
if (isset($_SESSION['formvillee']) && $_SESSION['formvillee'] != NULL) {
    update_ville($_SESSION['formvillee'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>                                                                                                                                                                                                                                                                        