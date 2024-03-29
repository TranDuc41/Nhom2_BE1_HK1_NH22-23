<?php session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
require "../models/product.php";
require "../models/manufacture.php";
require "../models/protype.php";
$user = new User;
$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
if (isset($_SESSION['name'])) {

  $getUser = $user->getUser($name = $_SESSION['name']);
} else {
  header("Location:../login.php");
}
$section =  "table-data-product.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Thêm sản phẩm | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
  <script>
    function readURL(input, thumbimage) {
      if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();
        reader.onload = function(e) {
          $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      } else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

      }
      $("#thumbimage").show();
      $('.filename').text($("#uploadfile").val());
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'default');
      $(".removeimg").show();
      $(".Choicefile").unbind('click');

    }
    $(document).ready(function() {
      $(".Choicefile").bind('click', function() {
        $("#uploadfile").click();

      });
      $(".removeimg").click(function() {
        $("#thumbimage").attr('src', '').hide();
        $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function() {
          $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'pointer');
        $(".filename").text("");
      });
    })
  </script>
</head>

<body class="app sidebar-mini rtl">
  <?php foreach ($getUser as $value) :
    //Kiểm tra người dùng đã đăng nhập hay chưa và có role là admin hay không
    if (isset($_SESSION['name']) && $value['role'] == "admin") { ?>
      <style>
        .Choicefile {
          display: block;
          background: #14142B;
          border: 1px solid #fff;
          color: #fff;
          width: 150px;
          text-align: center;
          text-decoration: none;
          cursor: pointer;
          padding: 5px 0px;
          border-radius: 5px;
          font-weight: 500;
          align-items: center;
          justify-content: center;
        }

        .Choicefile:hover {
          text-decoration: none;
          color: white;
        }

        #uploadfile,
        .removeimg {
          display: none;
        }

        #thumbbox {
          position: relative;
          width: 100%;
          margin-bottom: 20px;
        }

        .removeimg {
          height: 25px;
          position: absolute;
          background-repeat: no-repeat;
          top: 5px;
          left: 5px;
          background-size: 25px;
          width: 25px;
          /* border: 3px solid red; */
          border-radius: 50%;

        }

        .removeimg::before {
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
          content: '';
          border: 1px solid red;
          background: red;
          text-align: center;
          display: block;
          margin-top: 11px;
          transform: rotate(45deg);
        }

        .removeimg::after {
          /* color: #FFF; */
          /* background-color: #DC403B; */
          content: '';
          background: red;
          border: 1px solid red;
          text-align: center;
          display: block;
          transform: rotate(-45deg);
          margin-top: -2px;
        }
      </style>
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
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách sản phẩm</li>
            <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
          </ul>
        </div>

         <form action="add.php" method="POST" roles="form" enctype="multipart/form-data">  
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Tạo mới sản phẩm</h3>
              <div class="tile-body">
                <div class="row element-button">
                  <div class="col-sm-2">
                    <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-folder-plus"></i> Thêm hãng</a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i class="fas fa-folder-plus"></i> Thêm loại</a>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i class="fas fa-folder-plus"></i> Thêm tình trạng</a>
                  </div>
                </div>

                <form class=row>

                  <div class="form-group col-md-3">
                    <label class="control-label">Tên sản phẩm</label>
                    <input type="text" name="name" id="inputName" class="form-control" placeholder="Nhập tên sản phẩm" require>
                  </div>


                  <div class="form-group  col-md-3">
                    <label class="control-label">Số lượng</label>
                    <input type="=text" id="inputname" class="form-control" name="so_luong">
                  </div>
                  <div class="form-group col-md-3 ">
                    <label for="exampleSelect1" class="control-label">Hãng</label>
                    <select id="inputManu" name="manu" class="form-control custom-select">
                      <option>-- Chọn hãng --</option>
                      <?php
                      $getAllManu = $manufacture->getAllManu();
                      foreach ($getAllManu as $value) :
                      ?>
                        <option value=<?php echo $value['manu_id'] ?>><?php echo $value['manu_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3 ">
                    <label for="exampleSelect1" class="control-label">Loại sản phẩm</label>
                    <select id="inputType" name="type" class="form-control custom-select">
                      <option selected disabled>Chọn Loại</option>
                      <?php
                      $getAllProtype = $protype->getAllProtype();
                      foreach ($getAllProtype as $value) :
                      ?>
                        <option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- <div class="form-group col-md-3 ">
                        <label for="exampleSelect1" class="control-label">Tình trạng</label>
                        <select class="form-control" id="exampleSelect1">
                          <option>-- Chọn tình trạng --</option>
                          <option>Còn hàng</option>
                          <option>Hết hàng</option>
                        
                                                        
                        </select>
                      </div> -->
                  <div class="form-group col-md-3">
                    <input type="number" name="price" id="inputPrice" class="form-control" placeholder="Nhập giá sản phẩm" require>

                  </div>
                  <div class="form-group col-md-3">
                    <label>Nổi Bật</label>
                    <div class="radio">
                      <label class="px-5">
                        <input type="radio" name="feature" value="1" checked="checked"> Có
                      </label>
                      <label>
                        <input type="radio" name="feature" value="0"> Không
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputImg">Ảnh Sản Phẩm</label>
                    <input type="file" name="image" id="inputImage" class="form-control">
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-label">Mô tả sản phẩm</label>
                    <textarea id="summernote" name="description" class="form-control" rows="6"></textarea>
                    <script>
                      CKEDITOR.replace('mota');
                    </script>
                  </div>

              </div>
              <div class="row">
                <div class="col-12">
                  <a href="form-add-san-pham.php" class="btn btn-secondary">Trở Về</a>
                  <input type="submit" value="Thêm" class="btn btn-success float-right" href="form-add-san-pham.php" name="submit">
                </div>
              </div>
            </div>
          </div>
        </form>
      </main>


      <!--
  MODAL CHỨC VỤ 
-->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-body">
              <div class="row">
                <div class="form-group  col-md-12">
                  <span class="thong-tin-thanh-toan">
                    <h5>Thêm mới hãng</h5>
                  </span>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Nhập tên hãng mới</label>
                  <input class="form-control" type="text" required>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Danh mục hãng hiện đang có</label>
                  <ul style="padding-left: 20px;">
                    <li>Apple</li>
                    <li>Oppo</li>
                    <li>Xiaomi</li>
                    <li>Samsung</li>
                    <li>Sony</li>
                  </ul>
                </div>
              </div>
              <BR>
              <button class="btn btn-save" type="button">Lưu lại</button>
              <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
              <BR>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <!--
MODAL
-->



      <!--
  MODAL DANH MỤC
-->
      <div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-body">
              <div class="row">
                <div class="form-group  col-md-12">
                  <span class="thong-tin-thanh-toan">
                    <h5>Thêm mới danh mục </h5>
                  </span>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Nhập tên danh mục mới</label>
                  <input class="form-control" type="text" required>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Danh mục loại hiện đang có</label>
                  <ul style="padding-left: 20px;">
                    <li>Điện thoại</li>
                    <li>Laptop</li>
                    <li>Loa</li>
                    <li>Đồng hồ</li>
                    <li>Tai nghe</li>
                  </ul>
                </div>
              </div>
              <BR>
              <button class="btn btn-save" type="button">Lưu lại</button>
              <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
              <BR>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <!--
MODAL
-->




      <!--
  MODAL TÌNH TRẠNG
-->
      <div class="modal fade" id="addtinhtrang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-body">
              <div class="row">
                <div class="form-group  col-md-12">
                  <span class="thong-tin-thanh-toan">
                    <h5>Thêm mới tình trạng</h5>
                  </span>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Nhập tình trạng mới</label>
                  <input class="form-control" type="text" required>
                </div>
              </div>
              <BR>
              <button class="btn btn-save" type="button">Lưu lại</button>
              <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
              <BR>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <!--
MODAL
-->



      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/plugins/pace.min.js"></script>
      <script>
        const inpFile = document.getElementById("inpFile");
        const loadFile = document.getElementById("loadFile");
        const previewContainer = document.getElementById("imagePreview");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
        inpFile.addEventListener("change", function() {
          const file = this.files[0];
          if (file) {
            const reader = new FileReader();
            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";
            reader.addEventListener("load", function() {
              previewImage.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
          }
        });
      </script>
  <?php } else {
      //Nếu sử dụng tài khoản user 
      header("Location:../404.php");
    }
  endforeach;
  ?>
</body>

</html>