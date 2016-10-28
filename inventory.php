<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hệ thống quản lý mượn trả đĩa</title>
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
                <div class="bs-component">
                    <a href="film.php?new" class="btn btn-primary pull-right">Thêm phim</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tên phim</th>
                                <th>Thể loại</th>
                                <th>Năm phát hành</th>
                                <th>Giá mượn</th>
                                <th>Phân loại</th>
                                <th>Số lượng đĩa</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Đi tìm Dory</td>
                                <td>Hoạt hình, Hài hước</td>
                                <td>2016</td>
                                <td>0.99</td>
                                <td>PG</td>
                                <td>30</td>
                                <td>
                                    <a href="#"><span class="fa fa-edit"></span></a>
                                    &nbsp&nbsp
                                    <a href="#"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Đi tìm Dory</td>
                                <td>Hoạt hình, Hài hước</td>
                                <td>2016</td>
                                <td>0.99</td>
                                <td>PG</td>
                                <td>30</td>
                                <td>
                                    <a href="#"><span class="fa fa-edit"></span></a>
                                    &nbsp&nbsp
                                    <a href="#"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    <script src="resources/vendor/jquery.js"></script>
    <script src="resources/vendor/bootstrap/bootstrap.min.js"></script>
</body>
</html>
