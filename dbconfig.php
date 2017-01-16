<?php
//connect to db
define ("DB_HOST","127.0.0.1");
define ("DB_USER","root");
define ("DB_PASS","");
define ("DB_NAME","dvd_rental");
define ("DB_PORT", 3306);
define ("DB_SOCK", '/var/run/mysqld/mysqld.sock');
$database = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT, DB_SOCK) or die ("Can't connect to database");
$database->query("SET CHARACTER SET utf8");

?>
