<?php 
include "connect.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
           <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý tin tức</title>
  </head>
  <header>
  <div  class="navbar navbar-light bg-light">
  <?php
  if (isset($_COOKIE["user"])) {
    $u_name = htmlspecialchars_decode($_COOKIE["user"]);
    $u_id = htmlspecialchars_decode($_COOKIE["id"]);
  echo '<a>Xin chào : '.$u_name.'</a>';
  echo '<a href="signout.php" class="float-end" signout">Đăng Xuất</a></div>';
}else {
  echo('Bạn chưa đăng nhập'.'<a style="display: inline-block;" href="/admin/login.php">Ấn vào đây để đăng nhập</a></div>');
}
?>

  </header>