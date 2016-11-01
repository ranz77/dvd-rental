<?php
	require('dbconfig.php');
	//get data
	extract($_POST);

	//add
	$query="UPDATE `phim` SET `Ten`='$film_title', `MoTa`='$description', `NamPhatHanh`=$release_year, `QuocGia`=$country, `NgonNgu`=$language, `NgonNguGoc`=$original_language, `DoDai` = $duration,
								`GiaThayThe` = $replacement_cost, `ThoiHanTra` = $rental_duration, `GiaDonVi` = $rental_rate, `XepLoai`=$rating
			            WHERE `MaPhim` = $maPhim";
	$database->query($query);
	echo $query."<br>";
  $database->query("DELETE FROM phim_theloai WHERE `MaPhim`=$maPhim ");
  echo "DELETE FROM `phim_theloai` WHERE `MaPhim`=$maPhim<br>";
	for ($i = 0; $i < sizeof($category); $i++){
			$query = "INSERT INTO phim_theloai(`MaPhim`, `MaTL`) VALUES($maPhim, $category[$i])";
      echo $query."<br>";
			$database->query($query);
	}
	header("LOCATION: inventory.php");
?>
