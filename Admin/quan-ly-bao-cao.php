<?php session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
require "../models/product.php";
$user = new User;
$product = new Product;
if (isset($_SESSION['name'])) {

    $getUser = $user->getUser($name = $_SESSION['name']);
} else {
    header("Location:../login.php");
}
$getAllUser = $user->getAllUser($role = "user");
$getAllUsers = $user->getAllUsers();
$getAllProductdesc = $product->getAllProductdesc();
$section =  "quan-ly-bao-cao.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Báo cáo doanh thu | Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
    <?php foreach ($getUser as $value) :
        //Kiểm tra người dùng đã đăng nhập hay chưa và có role là admin hay không
        if (isset($_SESSION['name']) && $value['role'] == "admin") { ?>
            <!-- Navbar-->
            <header class="app-header">
                <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
                <!-- Navbar Right Menu-->
                <ul class="app-nav">


                    <!-- User Menu-->
                    <li><a class="app-nav__item" href="../logout.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

                    </li>
                </ul>
            </header>
            <!-- Sidebar menu-->
            <?php include "views/Sidebar_menu.php" ?>
            <main class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="app-title">
                            <ul class="app-breadcrumb breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><b>Báo cáo doanh thu </b></a></li>
                            </ul>
                            <div id="clock"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small primary coloured-icon"><i class='icon  bx bxs-user fa-3x'></i>
                            <div class="info">
                                <h4>Tổng Khách Hàng</h4>
                                <?php
                                //tính số khách hàng hiện có
                                $count = 0;
                                foreach ($getAllUser as $value) :
                                    $count++;
                                ?>
                                <?php endforeach; ?>
                                <p><b><?php echo $count ?> khách hàng</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x'></i>
                            <div class="info">
                                <h4>Tổng sản phẩm</h4>
                                <?php
                                $countDH = 0;
                                foreach ($getAllProductdesc as $value) :
                                    $countDH += $value['so_luong'];
                                endforeach
                                ?>
                                <p><b><?php echo $countDH ?> sản phẩm</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-shopping-bag-alt'></i>
                            <div class="info">
                                <h4>Tổng đơn hàng</h4>
                                <p><b>457 đơn hàng</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small danger coloured-icon"><i class='icon fa-3x bx bxs-info-circle'></i>
                            <div class="info">
                                <h4>Bị cấm</h4>
                                <?php
                                $countBan = 0;
                                foreach ($getAllUsers as $value) :
                                    if ($value['ban'] == "1") {
                                        $countBan++;
                                    }
                                endforeach
                                ?>
                                <p><b><?php echo $countBan ?> Khách hàng</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
                            <div class="info">
                                <h4>Tổng thu nhập</h4>
                                <p><b>104.890.000 đ</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-tag-x'></i>
                            <div class="info">
                                <h4>Hết hàng</h4>
                                <?php
                                $countHH = 0;
                                foreach ($getAllProductdesc as $value) :
                                    if ($value['so_luong'] < 1) {
                                        $countHH++;
                                    }
                                endforeach
                                ?>
                                <p><b><?php echo $countHH ?> sản phẩm</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small danger coloured-icon"><i class='icon fa-3x bx bxs-receipt'></i>
                            <div class="info">
                                <h4>Đơn hàng hủy</h4>
                                <p><b>2 đơn hàng</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <div>
                                <h3 class="tile-title">SẢN PHẨM BÁN CHẠY</h3>
                            </div>
                            <div class="tile-body">
                                <table class="table table-hover table-bordered" id="sampleTable1">
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá tiền</th>
                                            <th>Danh mục</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>71309005</td>
                                            <td>Bàn ăn gỗ Theresa</td>
                                            <td>5.600.000 đ</td>
                                            <td>Bàn ăn</td>
                                        </tr>
                                        <tr>
                                            <td>62304003</td>
                                            <td>Bàn ăn Vitali mặt đá</td>
                                            <td>33.235.000 đ</td>
                                            <td>Bàn ăn</td>
                                        </tr>
                                        <tr>
                                            <td>72109004</td>
                                            <td>Ghế làm việc Zuno</td>
                                            <td>3.800.000 đ</td>
                                            <td>Ghế gỗ</td>
                                        </tr>
                                        <tr>
                                            <td>83826226</td>
                                            <td>Tủ ly - tủ bát</td>
                                            <td>2.450.000 đ</td>
                                            <td>Tủ</td>
                                        </tr>
                                        <tr>
                                            <td>71304041</td>
                                            <td>Bàn ăn mở rộng Vegas</td>
                                            <td>21.550.000 đ</td>
                                            <td>Bàn thông minh</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <div>
                                <h3 class="tile-title">TỔNG ĐƠN HÀNG</h3>
                            </div>
                            <div class="tile-body">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>ID đơn hàng</th>
                                            <th>Khách hàng</th>
                                            <th>Đơn hàng</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>MD0837</td>
                                            <td>Triệu Thanh Phú</td>
                                            <td>Ghế làm việc Zuno, Bàn ăn gỗ Theresa</td>
                                            <td>2 sản phẩm</td>
                                            <td>9.400.000 đ</td>
                                        </tr>
                                        <tr>
                                            <td>MĐ8265</td>
                                            <td>Nguyễn Thị Ngọc Cẩm</td>
                                            <td>Ghế ăn gỗ Lucy màu trắng</td>
                                            <td>1 sản phẩm</td>
                                            <td>3.800.000 đ</td>
                                        </tr>
                                        <tr>
                                            <td>MT9835</td>
                                            <td>Đặng Hoàng Phúc</td>
                                            <td>Giường ngủ Jimmy, Bàn ăn mở rộng cao cấp Dolas, Ghế làm việc Zuno</td>
                                            <td>3 sản phẩm</td>
                                            <td>40.650.000 đ</td>
                                        </tr>
                                        <tr>
                                            <td>ER3835</td>
                                            <td>Nguyễn Thị Mỹ Yến</td>
                                            <td>Bàn ăn mở rộng Gepa</td>
                                            <td>1 sản phẩm</td>
                                            <td>16.770.000 đ</td>
                                        </tr>
                                        <tr>
                                            <td>AL3947</td>
                                            <td>Phạm Thị Ngọc</td>
                                            <td>Bàn ăn Vitali mặt đá, Ghế ăn gỗ Lucy màu trắng</td>
                                            <td>2 sản phẩm</td>
                                            <td>19.770.000 đ</td>
                                        </tr>
                                        <tr>
                                            <td>QY8723</td>
                                            <td>Ngô Thái An</td>
                                            <td>Giường ngủ Kara 1.6x2m</td>
                                            <td>1 sản phẩm</td>
                                            <td>14.500.000 đ</td>
                                        </tr>
                                        <!-- <tr>
                                            <th colspan="4">Tổng cộng:</th>
                                            <td>104.890.000 đ</td>
                                        </tr> -->
                                    </tbody>
                                    <div>
                                        <th colspan="1">Tổng cộng:</th>
                                        <td colspan="4" style="text-align: end; padding-right: 50px; font-weight: 800;">104.890.000 đ</td>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <div>
                                <h3 class="tile-title">SẢN PHẨM ĐÃ HẾT</h3>
                            </div>
                            <div class="tile-body">
                                <table class="table table-hover table-bordered" id="sampleTable3">
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th>Tình trạng</th>
                                            <th>Giá tiền</th>
                                            <th>Danh mục</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($getAllProductdesc as $value) :
                                            if ($value['so_luong'] < 1) { ?>
                                                <tr>
                                                    <td><?php echo $value['id'] ?></td>
                                                    <td><?php echo $value['name'] ?></td>
                                                    <td><img src="../img/<?php echo $value['pro_image'] ?>" alt="" width="100px;"></td>
                                                    <td><span class="badge bg-danger">Hết hàng</span></td>
                                                    <td><?php echo number_format($value['price']) ?> VND</td>
                                                    <td><?php echo $value['type_name'] ?></td>
                                                </tr>
                                        <?php }
                                        endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right" style="font-size: 12px">
                    <p><b>Hệ thống quản lý V2.0</b></p>
                </div>
            </main>
            <!-- Essential javascripts for application to work-->
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/main.js"></script>
            <!-- The javascript plugin to display page loading on top-->
            <script src="js/plugins/pace.min.js"></script>
            <!-- Page specific javascripts-->
            <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="js/plugins/chart.js"></script>
            <script type="text/javascript">
                $('#sampleTable').DataTable();
                $('#sampleTable3').DataTable();
                var data = {
                    labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                    datasets: [{
                            label: "Dữ liệu đầu tiên",
                            fillColor: "rgba(255, 255, 255, 0.158)",
                            strokeColor: "black",
                            pointColor: "rgb(220, 64, 59)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "green",
                            data: [20, 59, 90, 51, 56, 100, 40, 60, 78, 53, 33, 81]
                        },
                        {
                            label: "Dữ liệu kế tiếp",
                            fillColor: "rgba(255, 255, 255, 0.158)",
                            strokeColor: "rgb(220, 64, 59)",
                            pointColor: "black",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "green",
                            data: [48, 48, 49, 39, 86, 10, 50, 70, 60, 70, 75, 90]
                        }
                    ]
                };


                var ctxl = $("#lineChartDemo").get(0).getContext("2d");
                var lineChart = new Chart(ctxl).Line(data);

                var ctxb = $("#barChartDemo").get(0).getContext("2d");
                var barChart = new Chart(ctxb).Bar(data);
            </script>
            <!-- Google analytics script-->
            <script type="text/javascript">
                if (document.location.hostname == 'pratikborsadiya.in') {
                    (function(i, s, o, g, r, a, m) {
                        i['GoogleAnalyticsObject'] = r;
                        i[r] = i[r] || function() {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                        a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                        a.async = 1;
                        a.src = g;
                        m.parentNode.insertBefore(a, m)
                    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
                    ga('create', 'UA-72504830-1', 'auto');
                    ga('send', 'pageview');
                }
            </script>
    <?php } else {
            //Nếu sử dụng tài khoản user 
            header("Location:../404.php");
        }
    endforeach;
    ?>
</body>

</html>