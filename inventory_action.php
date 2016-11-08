<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require_once "dbconfig.php";
	extract($_POST);
	print_r($_POST);
  	echo $so_luong_dia;
	for ($i = 0; $i < $so_luong_dia; $i++) {
		$query = "INSERT INTO `dia_phim` (`maPhim`, `TrangThai`, `MaCH`) VALUES ($maphim, 0, $macuahang)";
		echo $query."<br>";
		$database->query($query);
	}
 	header("LOCATION: inventory.php?maphim=$maphim&macuahang=$macuahang"); 
?>
