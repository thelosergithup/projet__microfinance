<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_open_db = "localhost";
$database_open_db = "microfinance";
$username_open_db = "root";
$password_open_db = "";
//$open_db = mysqli_connect($hostname_open_db, $username_open_db, $password_open_db) or trigger_error(mysqli_error($conn),E_USER_ERROR); 
//mysqli_select_db($database_open_db);


// on se connecte à MySQL et on sélectionne la base
$con = mysqli_connect($hostname_open_db, $username_open_db, $password_open_db, $database_open_db);
?>
