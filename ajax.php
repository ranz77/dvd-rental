<?php

	require_once "dbconfig.php";
	if ($_GET['action'] == "laydiaphim") {
		$query = "SELECT * FROM `dia_phim` WHERE `MaDP` = $_GET[madiaphim]";
		$result = $database->query($query)->fetch_assoc();
		$query = "SELECT * FROM `phim` WHERE `MaPhim` = $result[MaPhim]";
		$result = $database->query($query)->fetch_assoc();
		echo json_encode($result);
	}
?>
