<?php session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
require "../models/product.php";
$user = new User;
$product = new Product;
if(isset($_SESSION['name'])){

  $getUser = $user->getUser($name = $_SESSION['name']);
}else{
  header("Location:../login.php");
}
$getAllProduct = $product->getAllProducts();
$getAllUser = $user->getAllUser($role = "user");
$get6UserNew = $user->get6UserNew($role = "user");
$section =  "index.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bảng điều khiển | Admin</title>
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
                <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
              </ul>
              <div id="clock"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <!--Left-->
          <div class="col-md-12 col-lg-12">
            <div class="row">
              <!-- col-6 -->
              <div class="col-md-6">
                <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                  <div class="info">
                    <h4>Tổng khách hàng</h4>
                    <?php
                    //tính số khách hàng hiện có
                    $count = 0;
                    foreach ($getAllUser as $value) :
                      $count++;
                    ?>
                    <?php endforeach; ?>
                    <p><b><?php echo $count ?> khách hàng</b></p>
                    <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                  </div>
                </div>
              </div>
              <!-- col-6 -->
              <div class="col-md-6">
                <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                  <div class="info">
                    <h4>Tổng sản phẩm</h4>
                    <?php
                    //tính số sản phẩm hiện có
                    $count = 0;
                    foreach ($getAllProduct as $value) :
                      $count++;
                    ?>
                    <?php endforeach; ?>
                    <p><b><?php echo $count ?> sản phẩm</b></p>
                    <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                  </div>
                </div>
              </div>
              <!-- col-6 -->
              <div class="col-md-6">
                <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                  <div class="info">
                    <h4>Tổng đơn hàng</h4>
                    <p><b>247 đơn hàng</b></p>
                    <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
                  </div>
                </div>
              </div>
              <!-- col-6 -->
              <div class="col-md-6">
                <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
                  <div class="info">
                    <h4>Sắp hết hàng</h4>
                    <?php
                    //tính số sản phẩm sắp hết hàng
                    $count = 0;
                    foreach ($getAllProduct as $value) :
                      //Nếu số lượng của sản phẩm bé hơn hoặc bằng 20
                      if ($value['so_luong'] < 20 && $value['so_luong'] > 0) {
                        $count++;
                      }
                    ?>
                    <?php endforeach; ?>
                    <p><b><?php echo $count ?> sản phẩm</b></p>
                    <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập thêm (Số sản phẩm còn lại ít hơn 20 sản phẩm).</p>
                  </div>
                </div>
              </div>
              <!-- col-12 -->
              <div class="col-md-12">
                <div class="tile">
                  <h3 class="tile-title">Tình trạng đơn hàng</h3>
                  <div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID đơn hàng</th>
                          <th>Tên khách hàng</th>
                          <th>Tổng tiền</th>
                          <th>Trạng thái</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>AL3947</td>
                          <td>Phạm Thị Ngọc</td>
                          <td>
                            19.770.000 đ
                          </td>
                          <td><span class="badge bg-info">Chờ xử lý</span></td>
                        </tr>
                        <tr>
                          <td>ER3835</td>
                          <td>Nguyễn Thị Mỹ Yến</td>
                          <td>
                            16.770.000 đ
                          </td>
                          <td><span class="badge bg-warning">Đang vận chuyển</span></td>
                        </tr>
                        <tr>
                          <td>MD0837</td>
                          <td>Triệu Thanh Phú</td>
                          <td>
                            9.400.000 đ
                          </td>
                          <td><span class="badge bg-success">Đã hoàn thành</span></td>
                        </tr>
                        <tr>
                          <td>MT9835</td>
                          <td>Đặng Hoàng Phúc </td>
                          <td>
                            40.650.000 đ
                          </td>
                          <td><span class="badge bg-danger">Đã hủy </span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- / div trống-->
                </div>
              </div>
              <!-- / col-12 -->
              <!-- col-12 -->
              <div class="col-md-12">
                <div class="tile">
                  <h3 class="tile-title">Khách hàng mới</h3>
                  <div>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên khách hàng</th>
                          <th>Giới tính</th>
                          <th>Số điện thoại</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Danh sách 6 khách hàng mới nhất -->
                        <?php foreach ($get6UserNew as $value) : ?>
                          <tr>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['user_name'] ?></td>
                            <td><?php echo $value['gioi_tinh'] ?></td>
                            <td><span class="tag tag-success"><?php echo $value['sdt'] ?></span></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
              <!-- / col-12 -->
            </div>
          </div>
          <!--END left-->
        </div>


        <div class="text-center" style="font-size: 13px">
          <p><b>Copyright
              <script type="text/javascript">
                document.write(new Date().getFullYear());
              </script> Phần mềm quản lý bán hàng
            </b></p>
        </div>
      </main>
      <script src="js/jquery-3.2.1.min.js"></script>
      <!--===============================================================================================-->
      <script src="js/popper.min.js"></script>
      <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
      <!--===============================================================================================-->
      <script src="js/bootstrap.min.js"></script>
      <!--===============================================================================================-->
      <script src="js/main.js"></script>
      <!--===============================================================================================-->
      <script src="js/plugins/pace.min.js"></script>
      <!--===============================================================================================-->
      <script type="text/javascript" src="js/plugins/chart.js"></script>
      <!--===============================================================================================-->
      <script type="text/javascript">
        var data = {
          labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
          datasets: [{
              label: "Dữ liệu đầu tiên",
              fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
              strokeColor: "rgb(255, 212, 59)",
              pointColor: "rgb(255, 212, 59)",
              pointStrokeColor: "rgb(255, 212, 59)",
              pointHighlightFill: "rgb(255, 212, 59)",
              pointHighlightStroke: "rgb(255, 212, 59)",
              data: [20, 59, 90, 51, 56, 100]
            },
            {
              label: "Dữ liệu kế tiếp",
              fillColor: "rgba(9, 109, 239, 0.651)  ",
              pointColor: "rgb(9, 109, 239)",
              strokeColor: "rgb(9, 109, 239)",
              pointStrokeColor: "rgb(9, 109, 239)",
              pointHighlightFill: "rgb(9, 109, 239)",
              pointHighlightStroke: "rgb(9, 109, 239)",
              data: [48, 48, 49, 39, 86, 10]
            }
          ]
        };
        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);
      </script>
      <script type="text/javascript">
        //Thời Gian
        function time() {
          var today = new Date();
          var weekday = new Array(7);
          weekday[0] = "Chủ Nhật";
          weekday[1] = "Thứ Hai";
          weekday[2] = "Thứ Ba";
          weekday[3] = "Thứ Tư";
          weekday[4] = "Thứ Năm";
          weekday[5] = "Thứ Sáu";
          weekday[6] = "Thứ Bảy";
          var day = weekday[today.getDay()];
          var dd = today.getDate();
          var mm = today.getMonth() + 1;
          var yyyy = today.getFullYear();
          var h = today.getHours();
          var m = today.getMinutes();
          var s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);
          nowTime = h + " giờ " + m + " phút " + s + " giây";
          if (dd < 10) {
            dd = '0' + dd
          }
          if (mm < 10) {
            mm = '0' + mm
          }
          today = day + ', ' + dd + '/' + mm + '/' + yyyy;
          tmp = '<span class="date"> ' + today + ' - ' + nowTime +
            '</span>';
          document.getElementById("clock").innerHTML = tmp;
          clocktime = setTimeout("time()", "1000", "Javascript");

          function checkTime(i) {
            if (i < 10) {
              i = "0" + i;
            }
            return i;
          }
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