<?php
  require_once "dbconfig.php";
    $query="SELECT * FROM phim";
    $result = $database->query($query);
    $maPhim = isset($_GET['maphim'])? $_GET['maphim']:0;
 ?>
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
                    <div class="row">
                      <div class="pull-right">
                        <form class="form-inline" action="#" method="post" class="">
                          <div class="form-group">
                            <input type="number" placeholder="Nhập số lượng đĩa" class="form-control" id="quantity" name="quantity"/>
                          </div>
                          <button class="btn btn-primary">Thêm</button>
                        </form>
                      </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Mã đĩa phim</th>
                                <th>Mã phim</th>
                                <th>Trạng thái</th>
                                <th>Mã Cửa Hàng</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $listFilm = $database->query("SELECT * FROM dia_phim WHERE MaPhim = $maPhim");
                            if ($listFilm->num_rows >0)
                            while ($film = $listFilm->fetch_assoc()){
                              echo "<tr>";
                              foreach ($film as $value){
                                echo "<td>$value</td>";
                              }
                              echo "<td>x</td><tr>";
                            }
                          ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    <script src="resources/vendor/jquery.js"></script>
    <script src="resources/vendor/bootstrap/bootstrap.min.js"></script>
</body>
</html>
