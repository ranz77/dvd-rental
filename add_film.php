<?php

	//connect to db
	define ("DB_HOST","127.0.0.1");
	define ("DB_USER","root");
	define ("DB_PASS","");
	define ("DB_NAME","dvd_rental");
	$database = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die ("Can't connect to database");
	$database->query("SET CHARACTER SET utf8");
	
	//get data
	extract($_POST);
	
	//add
	$query="INSERT INTO `phim`(`Ten`, `MoTa`, `NamPhatHanh`, `QuocGia`, `NgonNgu`, `NgonNguGoc`, `DoDai`, 
								`GiaDatCoc`, `ThoiHanTra`, `GiaDonVi`, `XepLoai`) 
			VALUES('$film_title', '$description', $release_year, $country, $language, $original_language, $duration,
					$replacement_cost, $rental_duration, $rental_rate, '$rating');";
	echo $query;
	$database->query($query);
?>