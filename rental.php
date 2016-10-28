<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Quản lý cho mượn đĩa phim - Hệ thống quản lý mượn trả đĩa</title>
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
                <form class="form-horizontal" action="#" method="get">
                    <fieldset>
                        <legend>Thông tin khách hàng</legend>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tên khách hàng</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="customer_name" placeholder="Nhập để tìm khách hàng">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mã khách hàng</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="customer_id" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Số điện thoại</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="customer_id" disabled>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <form class="form-horizontal" action="#" method="get">
                    <fieldset>
                        <legend>Thông tin đĩa phim</legend>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mã đĩa phim</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="inventory_id" placeholder="Nhập mã đĩa phim">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tên phim</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="film_name" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Năm phát hành</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="film_release_date" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Xếp loại độ tuổi</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="film_rating" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Giá đơn vị</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="film_rental_rate" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Thời hạn mượn (ngày)</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="film_rental_duration" disabled>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Thanh toán</legend>
                        <div class="form-group">
                            <div class="col-lg-10">
                                Tổng tiền (Giá đơn vị * Thời hạn mượn):
                            </div>
                            <div class="col-lg-2"><strong>$30</strong></div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <div class="col-lg-3 col-lg-offset-9">
                            <button type="reset" class="btn btn-default">Hủy</button>
                            <button type="submit" class="btn btn-primary">Cho mượn</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="resources/vendor/jquery.js"></script>
    <script src="resources/vendor/bootstrap/bootstrap.min.js"></script>
</body>
</html>
