
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <div class="container">
    <div class="title-text">
       <div class="title login">
          Đăng Nhập
       </div>
       <div class="title signup">
          Đăng Ký
       </div>
    </div>
    <div class="form-container">
       <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Đăng Nhập</label>
          <label for="signup" class="slide signup">Đăng Ký</label>
          <div class="slider-tab"></div>
       </div>
       <div class="form-inner">
          <form action="" class="login" method="POST">
             <div class="field">
                <input type="text" id="user" name="user" placeholder="Địa Chỉ Email" required>
             </div>
             <div class="field">
                <input type="password" id="pass" name="pass" placeholder="Mật Khẩu" required>
             </div>
             <div class="pass-link">
                <a href="#">Quên Mật Khẩu?</a>
             </div>
             <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="Đăng Nhập">
             </div>
             <div class="signup-link">
                Chưa Có Tài Khoản? <a href=""> Đăng Ký Ngay</a>
             </div>
          </form>

          <form action="#" class="signup" method="POST">
             <div class="field">
                <input class="full_name" type="text" placeholder="Nhập Họ Tên" required>
             </div>
             <div class="field">
                <input class="user_name" type="text" placeholder="Nhập Email" required>
             </div>
             <div class="field">
                <input class="pass1" type="password" placeholder="Nhập Mật Khẩu" required>
             </div>
             <div class="field">
                <input class="pass2" type="password" placeholder="Nhập Lại Mật Khẩu" required>
             </div>
             <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value=" Đăng Ký">
             </div>
          </form>
       </div>
    </div>
 </div>
</body>
<script src="./js/login.js"></script>
</html>