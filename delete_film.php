<?php
	require('dbconfig.php');
	//get data
	extract($_GET);


  $database->query("DELETE FROM phim_theloai WHERE `MaPhim`=$maphim ");
  $database->query("DELETE FROM phim WHERE `MaPhim`=$maphim ");
	header("LOCATION: inventory.php");
?>
