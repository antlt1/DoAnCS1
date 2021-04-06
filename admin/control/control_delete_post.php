<?php
  include ("../nav-bar.php");
  include ("default.php");
  include("../../src.php");
  ?>

<div class="rounded bg-danger text-light show_delete" style="margin-left : 25% ;display: block;">
  <p style="margin-top : 5%;margin-right : 5%;margin-left : 5%;">Bạn có chẳc là muốn xóa bài post này ?</p>
  <div class="show_btn btn-group btn-group-toggle " style=" padding : 10px ; margin-bottom : 5%; width: 100%;">
  <form action="" method="post" style="width: 100%;">
  <input type="submit"class="btn btn-outline-light" style="margin-left : 10%;" value="Có" name="click"/>
  <a class="btn close_show btn-outline-light" href="../index.php">Không</a>
  </form>
</div>
<?php
//
//// lệnh select dữ liệu
$get_id_post = substr($getpage,24); // cắt chuỗi lấy id của bài post bên kia :D
$query = mysqli_query($conn,"select * from d_post where post_id = '$get_id_post'");
$row = mysqli_fetch_assoc($query);
//
  if(isset($_POST["click"])){
    // hành động mysqli
    mysqli_query($conn,"delete from d_post where post_id = '$get_id_post'");
    echo "đã xóa thành công !<br>";
    echo '<a href="../index.php">về trang admin</a>';
  }
?>
  <!-- css -->
  <style>
.link_post a{
  float: left;
  color: red;
}
.show_delete{
  width: 20%;
}
  </style>

<!-- jquery -->
<script>
  // ẩn hiện show của btn xóa
  $(".delete_post").click(function() {
    $(".show_delete").slideToggle(500);
  });
  // đóq show khi click "không"
  $(".close_show").click(function() {
    $(".show_delete").slideToggle();
  });