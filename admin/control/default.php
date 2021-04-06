<header>
    <?php
    $check =  array ("/admin/","control/");
        $getpage = $_SERVER['REQUEST_URI'];
        $getpage = str_replace($check,"",$getpage);
      $str = strstr($getpage,".php",true); // cắt chuỗi
    ?>
<div class="border-end left-bar" style="border-right: solid 0.5px; color: #c3c3c3;">
    <ul class="navbar-nav list-group">
<li>
  <a class="dropdown-item <?php if($str == 'index')echo 'active'?>" href="/admin/index.php">Trang Chủ</a>
  </li>
  <li>
  <a class="dropdown-item <?php if($str == 'create')echo 'active'?>" href="/admin/control/create.php">Thêm Tin</a>
  </li>
  <li>
  <a class="dropdown-item <?php if($str == 'upload')echo 'active'?>" href="/admin/control/upload.php">Thêm Ảnh</a>
  </li>
  <li>
  <a class="dropdown-item <?php if($str == 'control_term')echo 'active'?>" href="/admin/control/control_term.php">Quản Lý Thể Loại</a>
  </li>
  <li>
  <a class="dropdown-item <?php if($str == 'control_picture')echo 'active'?>" href="/admin/control/control_picture.php">Quản Lý Ảnh</a>
  </li>
    <li>
  <a class="dropdown-item <?php if($str == 'control_user.php')echo 'active'?>" href="/admin/control/control_user.php">Quản Lý Người Dùng</a>
  </li>
  <li>
  <a class="dropdown-item <?php if($str == 'control_comment')echo 'active'?>" href="/admin/control/control_comment.php">Quản Lý Bình Luận</a>
    </li>
  </ul>
</div>
</header>