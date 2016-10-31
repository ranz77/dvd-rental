<?php
  require('dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php
      $title =  $_GET['action'] == "edit" ? "Cập nhật phim" : "Nhập phim mới";
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
                            <legend id="film_info_legend">Nhập thông tin về phim</legend>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tên phim</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="film_title" id="film_title" placeholder="Nhập tên phim" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Năm phát hành</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="release_year" placeholder="Nhập năm phát hành" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Thể loại</label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="category[]" multiple="">
                                      <?php
                                        $query="SELECT * FROM the_loai";
                                        $result = $database->query($query);
                                        while ($row=$result->fetch_assoc()){
                                          echo "<option value='$row[MaTL]'>$row[Ten]</option>";
                                        }
                                       ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Mô tả</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" rows="3" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Quốc gia</label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="country">
                                      <?php
                                        $query="SELECT * FROM quoc_gia";
                                        $result = $database->query($query);
                                        while ($row=$result->fetch_assoc()){
                                          echo "<option value='$row[MaQG]'>$row[Ten]</option>";
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
                                        while ($row=$result->fetch_assoc()){
                                          echo "<option value='$row[MaNN]'>$row[Ten]</option>";
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
                                        while ($row=$result->fetch_assoc()){
                                          echo "<option value='$row[MaNN]'>$row[Ten]</option>";
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
                                            <input name="rating" value="2" type="radio">
                                            PG
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="3" type="radio">
                                            PG-13
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="4" type="radio">
                                            R
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="5" type="radio">
                                            NC-17
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Thời lượng (phút)</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="duration" placeholder="Nhập thời lượng phim" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Thời hạn mượn (ngày)</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="rental_duration" placeholder="Nhập thời gian cho phép trong một lần mượn" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Giá đơn vị</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="rental_rate" placeholder="Nhập số tiền cho mỗi ngày mượn" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Giá thay thế</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="replacement_cost" placeholder="Nhập số tiền thay thế nếu làm mất đĩa" type="text">
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
