<?php
if (isset($_SESSION['formagencee']) && $_SESSION['formagencee'] != NULL) {
    update_agence($_SESSION['formagencee'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>                                                                                                                                                                                                                                                                        