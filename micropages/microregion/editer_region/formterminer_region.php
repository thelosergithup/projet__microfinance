<?php
if (isset($_SESSION['formregione']) && $_SESSION['formregione'] != NULL) {
    update_region($_SESSION['formregione'],$con);
} else {
    echo "<script language='javascript'>$('div.addnull').show('slow').delay(3000).hide('slow');</script>";
}
?>                                                                                                                                                                                                                                                                        