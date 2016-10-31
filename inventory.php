<?php
  require_once "dbconfig.php";
    $query="SELECT * FROM phim";
    $result = $database->query($query);
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
                    <a href="film.php?action=add" class="btn btn-primary pull-right">Thêm phim</a>
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
                            <?php
                              while ($row=$result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>$row[Ten]</td>";
                                echo "<td>";
                                $theLoaiList=$database->query("select `the_loai`.`Ten` FROM `phim_theloai` INNER JOIN `the_loai` ON `phim_theloai`.`MaTL` = `the_loai`.`MaTL` WHERE `phim_theloai`.`MaPhim` = $row[MaPhim];");
                                while ($theLoai = $theLoaiList->fetch_assoc()){
                                  echo $theLoai['Ten']."; ";
                                }
                                echo "</td>";
                                echo "<td>$row[NamPhatHanh]</td>";
                                echo "<td>$row[GiaDonVi]</td>";
                                $xepLoaiList=$database->query("SELECT * FROM xep_loai WHERE MaXL = $row[XepLoai]");
                                echo "<td>".$xepLoaiList->fetch_assoc()['Ten']."</td>";
                                echo "<td>".rand(20,100)."</td>";
                                echo '<td>
                                    <a href="film.php?action=edit&maphim='.$row["MaPhim"].'"><span class="fa fa-edit"></span></a>
                                    &nbsp&nbsp
                                    <a href=""><span class="fa fa-trash"></span></a>
                                </td>';
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
