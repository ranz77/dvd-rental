<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nhập phim mới - Hệ thống quản lý mượn trả đĩa</title>
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
                    <form class="form-horizontal">
                        <fieldset>
                            <legend>Nhập thông tin về phim</legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Tên phim</label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="film_title" placeholder="Nhập tên phim" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Năm phát hành</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="release_year" placeholder="Nhập năm phát hành" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Mô tả</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Quốc gia</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="country">
                                        <option>Mỹ</option>
                                        <option>Việt Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Ngôn ngữ</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="language">
                                        <option>TIếng Anh</option>
                                        <option>Tiếng Việt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Ngôn ngữ gốc</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="original_language">
                                        <option>TIếng Anh</option>
                                        <option>Tiếng Việt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Xếp loại theo độ tuổi</label>
                                <div class="col-lg-10">
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="g" checked="" type="radio">
                                            G
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="pg" type="radio">
                                            PG
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="pg-13" type="radio">
                                            PG-13
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="r" type="radio">
                                            R
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label>
                                            <input name="rating" value="nc-17" type="radio">
                                            NC-17
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Thời lượng (phút)</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="duration" placeholder="Nhập thời lượng phim" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Thời hạn mượn (ngày)</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="rental_duration" placeholder="Nhập thời gian cho phép trong một lần mượn" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Giá đơn vị</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="rental_rate" placeholder="Nhập số tiền cho mỗi ngày mượn" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Giá thay thế</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="replacement_cost" placeholder="Nhập số tiền thay thế nếu làm mất đĩa" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
    </div>

    <script src="resources/vendor/jquery.js"></script>
    <script src="resources/vendor/bootstrap/bootstrap.min.js"></script>
</body>
</html>
