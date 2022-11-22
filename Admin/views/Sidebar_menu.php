<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/imageDefault.jpg" width="50px"
        alt="User Image">
      <div>
      <?php foreach ($getUser as $value) : ?>
        <p class="app-sidebar__user-name"><b><?php echo $value['user_name'] ?></b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
        <?php endforeach; ?>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item <?php  if  (  $section ==  "index.php"  )  {  echo  "active" ;  } ?>" href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item <?php  if  (  $section ==  "table-data-table.php"  )  {  echo  "active" ;  }  ?>" href="table-data-table.php"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý khách hàng</span></a></li>
      <li><a class="app-menu__item <?php  if  (  $section ==  "table-data-product.php"  )  {  echo  "active" ;  } ?>" href="table-data-product.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item <?php  if  (  $section ==  "table-data-oder.php"  )  {  echo  "active" ;  } ?>" href="table-data-oder.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item <?php  if  (  $section ==  "quan-ly-bao-cao.php"  )  {  echo  "active" ;  } ?>" href="quan-ly-bao-cao.php"><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
      </li>
      <li><a class="app-menu__item <?php  if  (  $section ==  "page-calendar.php"  )  {  echo  "active" ;  } ?>" href="page-calendar.php"><i class='app-menu__icon bx bx-calendar-check'></i><span
            class="app-menu__label">Lịch công tác </span></a></li>
    </ul>
  </aside>