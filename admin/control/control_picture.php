<?php
     include ("../nav-bar.php");
     include("../../src.php");
     include ("default.php");
?>
<body> 
    <!-- thanh left bar -->
    <div class="all-page-admin">
     <!-- khung admin quản lý -->
     <div class="control-admin">
    <h2>Quản lý tin tức</h2>
      <table class="table">
  <thead>
    <tr>
      <th>Ngày tải ảnh</th>
      <th>Nguồn ảnh</th>
      <th>Mô tả</th>
      <th>Ảnh</th>
      <th>Người Tạo</th>
      <th>Xóa</th>
    </tr>
  </thead>
  <tbody>
  <?php
     // vòng lặp chứa tập tin
     $query = mysqli_query($conn,"select * from d_upload");
         $count = 1;
       if(!empty($u_name)){
         while($row = mysqli_fetch_array($query)){
         $count++;
         $id_user = $row['upload_user_id']; //  id của tài khoản sql
         $select_name = mysqli_query($conn,"select * from d_user where id_user = '$id_user'"); // truy vấn câu lệnh lấy tên đăng nhập
         $show = mysqli_fetch_assoc($select_name); // thực hiện câu lệnh
         // xuất bảng d_post 
           echo('<tr><td>'.$row["upload_date"].'</td><td>'.$row["upload_url"]
               .'</td><td>'.$row["upload_title"].'</td><td><img class="img_url" src="'.$row["upload_url"].'">'
               .'</td><td>'.$show["username"]
               .'</td><td><a class="delete_post" style="display:inline-block; width : 25% ;" href="control/control_delete_post.php?'.$row["id_upload"].'">Xoá</a>');
         }
       }
     ?>
     
     </th></tr>
        </table>
      </div>
     </div>
  </body>
  </script>
  <!-- css -->
  <style>
    /* index for admin */
    .control-admin{
      width: 80%;
    }
.control-admin h2{
  display: inline-block;
}
.link_post a{
  float: left;
  color: red;
}
.img_url{
     width: 100px;
     height:100px;
}
  </style>
</html>