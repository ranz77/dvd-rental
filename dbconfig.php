<?php
//connect to db
define ("DB_HOST","127.0.0.1");
define ("DB_USER","");
define ("DB_PASS","");
define ("DB_NAME","dvd_rental");
$database = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die ("Can't connect to database");
$database->query("SET CHARACTER SET utf8");

?>
