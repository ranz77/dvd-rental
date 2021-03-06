<?php
  require('dbconfig.php');
  $isEdit = false;
  if (isset($_GET['action']) && $_GET['action']=="edit"){
	  $isEdit = true;
	  $maPhim = $_GET['maphim'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php
      $title =  $isEdit ? "Cập nhật phim" : "Nhập phim mới";
	  if ($isEdit){
		  $query = "SELECT * FROM phim WHERE MaPhim = $maPhim";
		  $result = $database->query($query);
		  $phim = $result->fetch_assoc();
	  }
    ?>
    <title><?= $title ?> - Hệ thống quản lý mượn trả đĩa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="resources/vendor/bootstrap/bootstrap.css" media="screen">
    <link rel="stylesheet" href="resources/vendor/font-awesome/css/font-awesome.css" media="screen">
    <link rel="stylesheet" href="../assets/css/custom.min.css">
</head>

<body>
    <div class="container">
        <!-- header -->
        <?php include 'header.php' ?>

        <div class="row">
            <!-- navigation -->
            <?php include 'navigation.php' ?>

            <!-- content -->
        <div class="col-lg-9">
                <div class="well bs-component">
                    <form id="form" action="add_film.php" class="form-horizontal" method="post">
                        <fieldset>
                            <?php
                              if ($isEdit){
                                echo "<input type='hidden' name='maPhim' value=$maPhim>";
                              }
                            ?>
                            <legend id="film_info_legend">Nhập thông tin về phim</legend>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tên phim</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="film_title" id="film_title" placeholder="Nhập tên phim"
									<?php if($isEdit) echo "value='$phim[Ten]'";?> type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Năm phát hành</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="release_year" placeholder="Nhập năm phát hành"
									<?php if($isEdit) echo "value='$phim[NamPhatHanh]'";?> type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Thể loại</label>
                                <div class="col-lg-6">
                                    <?php
                                    if ($isEdit){
                                      $query = "SELECT * FROM phim_theloai WHERE MaPhim = $phim[MaPhim]";
                                      $listTheLoai = $database->query($query);
                                      $n = 0;
                                      while ($selectedTheLoai[$n] = $listTheLoai->fetch_assoc()['MaTL']){
                                        $n++;
                                      }

                                    }
                                     ?>
                                    <select class="form-control" name="category[]" multiple="">
                                      <?php
                                        $query="SELECT * FROM the_loai";
                                        $result = $database->query($query);
                                        while ($row=$result->fetch_assoc()){
                                          if ($isEdit && in_array($row['MaTL'], $selectedTheLoai))
                                          echo "<option value='$row[MaTL]' selected>$row[Ten]</option>";
                                          else echo "<option value='$row[MaTL]'>$row[Ten]</option>";
                                        }
                                       ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Mô tả</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" rows="3" name="description"><?php if($isEdit) echo "$phim[MoTa]";?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Quốc gia</label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="country">
                                      <?php
                                        $query="SELECT * FROM quoc_gia";
                                        $result = $database->query($query);
										$i=1;
                                        while ($row[$i]=$result->fetch_assoc()){
											$i++;
                                        }
										if($isEdit)
											echo "<option value='".$row[$phim['QuocGia']]['MaQG']."'>".$row[$phim['QuocGia']]['Ten']."</option>";
										for ($j=1;$j<$i;$j++){
											if(!$isEdit || $phim['QuocGia']!=$row[$j]['MaQG'])
											echo "<option value='".$row[$j]['MaQG']."'>".$row[$j]['Ten']."</option>";
										}
                                       ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Ngôn ngữ</label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="language">
										<?php
											$query="SELECT * FROM ngon_ngu";
											$result = $database->query($query);
											$i=1;
											while ($row[$i]=$result->fetch_assoc()){
												$i++;
											}
											if($isEdit)
												echo "<option value='".$row[$phim['NgonNgu']]['MaNN']."'>".$row[$phim['NgonNgu']]['Ten']."</option>";
											for ($j=1;$j<$i;$j++){
												if(!$isEdit || $phim['NgonNgu']!=$row[$j]['MaNN'])
												echo "<option value='".$row[$j]['MaNN']."'>".$row[$j]['Ten']."</option>";
											}
										?>
                                        <!-- <option value="1">TIếng Anh</option>
                                        <option value="2">Tiếng Việt</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Ngôn ngữ gốc</label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="original_language">
										<?php
											$query="SELECT * FROM ngon_ngu";
											$result = $database->query($query);
											$i=1;
											while ($row[$i]=$result->fetch_assoc()){
												$i++;
											}
											if($isEdit)
												echo "<option value='".$row[$phim['NgonNguGoc']]['MaNN']."'>".$row[$phim['NgonNguGoc']]['Ten']."</option>";
											for ($j=1;$j<$i;$j++){
												if(!$isEdit || $phim['NgonNguGoc']!=$row[$j]['MaNN'])
												echo "<option value='".$row[$j]['MaNN']."'>".$row[$j]['Ten']."</option>";
											}
                                       ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Xếp loại theo độ tuổi</label>
                                <div class="col-lg-6">
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="1" checked="" type="radio">
                                            G
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="2"
											<?php if($isEdit && $phim['XepLoai']==2) echo "checked";?> type="radio">
                                            PG
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="3"
											<?php if($isEdit && $phim['XepLoai']==3) echo "checked";?> type="radio">
                                            PG-13
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="4"
											<?php if($isEdit && $phim['XepLoai']==4) echo "checked";?> type="radio">
                                            R
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="5"
											<?php if($isEdit && $phim['XepLoai']==5) echo "checked";?> type="radio">
                                            NC-17
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Thời lượng (phút)</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="duration" placeholder="Nhập thời lượng phim"
									<?php if($isEdit) echo "value='$phim[DoDai]'";?> >
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Thời hạn mượn (ngày)</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="rental_duration" placeholder="Nhập thời gian cho phép trong một lần mượn"
									<?php if($isEdit) echo "value='$phim[ThoiHanTra]'";?> type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Giá đơn vị</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="rental_rate" placeholder="Nhập số tiền cho mỗi ngày mượn"
									<?php if($isEdit) echo "value='$phim[GiaDonVi]'";?> type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Giá thay thế</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="replacement_cost" placeholder="Nhập số tiền thay thế nếu làm mất đĩa"
									<?php if($isEdit) echo "value='$phim[GiaThayThe]'";?> type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <button type="reset" class="btn btn-default">Hủy</button>
                                    <button type="submit" id="form_submit_btn" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
    </div>

    <script src="resources/vendor/jquery.js"></script>
    <script src="resources/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript">
    var action = "<?php echo $_GET['action']; ?>";
    if (action == "edit"){
      $(function() {
        $('#form').attr('action', 'edit_film.php');
        $('#film_info_legend').text('Cập nhật thông tin về phim');
        $('#form_submit_btn').text('Cập nhật');
      });
    }

    </script>
</body>
</html>
