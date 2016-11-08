<?php
	require('dbconfig.php');
	//get data
	extract($_POST);

	//add
	$query="INSERT INTO `phim`(`Ten`, `MoTa`, `NamPhatHanh`, `QuocGia`, `NgonNgu`, `NgonNguGoc`, `DoDai`,
								`GiaThayThe`, `ThoiHanTra`, `GiaDonVi`, `XepLoai`)
			VALUES('$film_title', '$description', $release_year, $country, $language, $original_language, $duration,
					$replacement_cost, $rental_duration, $rental_rate, $rating);";
	$database->query($query);
	echo $query."<br>";
	$lastFilmId = $database->insert_id;
	for ($i = 0; $i < sizeof($category); $i++){
			$query = "INSERT INTO phim_theloai(`MaPhim`, `MaTL`) VALUES($lastFilmId, $category[$i])";
			$database->query($query);
	}
	header("LOCATION: film_list.php");
?>
