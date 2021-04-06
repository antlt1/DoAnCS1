<?php
  include ("nav-bar.php");
  include("../src.php");
  ?>
  <body> 
    <!-- thanh left bar -->
    <div class="all-page-admin">
  <?php
     include ("../admin/control/default.php");
     ?>
     <!-- khung admin quản lý -->
     <div class="control-admin">
    <h2>Quản lý tin tức</h2>
      <table class="table">
  <thead>
    <tr>
      <th>Ngày Tạo Tin</th>
      <th>Tên Tin</th>
      <th>Nội dung ngắn</th>
      <th>Ảnh đề xuất</th>
      <th>Nội dung </th>
      <th>Người Tạo</th>
      <th>Chỉnh Sửa</th>
    </tr>
  </thead>
  <tbody>
  <?php
     // vòng lặp chứa tập tin
     $query = mysqli_query($conn,"select * from d_post");
         $count = 1;
       if(!empty($u_name)){
         while($row = mysqli_fetch_array($query)){
         $count++;
         $id_user = $row['post_user_id']; //  id của tài khoản sql
         $select_name = mysqli_query($conn,"select * from d_user where id_user = '$id_user'"); // truy vấn câu lệnh lấy tên đăng nhập
         $show = mysqli_fetch_assoc($select_name); // thực hiện câu lệnh
         // xuất bảng d_post 
           echo('<tr><td>'.$row["post_date"].'</td><td>'.$row["post_content"]
               .'</td><td>'.$row["post_title"].'</td><td>'.$row["post_img"]
               .'</td><td>'.$row["post_value"].'</td></td><td>'.$show["username"]
               .'</td><td><a href="control/control_edit.php?'.$row["post_id"].'">Sửa</a>
               <a class="delete_post" style="display:inline-block; width : 25% ;" href="control/control_delete_post.php?'.$row["post_id"].'">Xoá</a>');
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

  </style>
</html>