<?php
  include ("../../admin/nav-bar.php");
  include("../../src.php");
  ?>
  <body>
    <!-- thanh left bar -->
    <div class="all-page-admin">
  <?php
     include ("default.php");
     ?>
     <!-- khung admin quản lý -->
     <div class="control_term text-dark">
        <form action="" method="post">
          <?php
           $get_id_page = substr($getpage,17);
           $get_name_page = strstr($get_id_page,"-",true);
            if($get_name_page == "edit"){
              $get_nunber_page = substr($get_id_page,5  );
              echo 'This is page edit : '.$get_nunber_page;
              echo '';
            }else if($get_name_page == "delete"){
              $get_nunber_page = substr($get_id_page,7);
              $row_delete = mysqli_fetch_assoc(mysqli_query($conn,"select * from d_terms where term_id ='$get_nunber_page'"));
              echo '<div  class="text-dark pane_delete">Bạn thực sự muốn xóa : '.$row_delete["term_name"].
                '<br><div style="margin-left: 5%;" class="btn-group" role="group">
                <button type="submit" name="btn_delete" class="btn btn-outline-secondary">Có</button>
             
                <a href="control_term.php" class="btn btn-outline-secondary">Không </a></div>'.'</div>';
            }
          ?>
          </form>
     </div>
     <div class="control_admin border">
    <h2>Quản lý thể loại</h2>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Tên thể loại</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Truy vấn</th>
    </tr>
  </thead>
  <tbody>
     <?php
      if(isset($_POST["btn_delete"])){
        mysqli_query($conn,"delete from d_terms where term_id = '$get_nunber_page'");
        echo '<h1>xoá thành công !</h1>';
        header("refresh:1;url=control_term.php");
      }
     // vòng lặp chứa tập tin
     $query = mysqli_query($conn,"select * from d_terms");
         $count = 1;
       if(!empty($u_name)){
         while($row = mysqli_fetch_array($query)){
         $count++;
           echo('<tr><td scope="row">'.$row["term_name"].'</td><td scope="row">'.$row["term_inf"].'</td><td><a href="?edit-'.$row["term_id"].'">Sửa</a>
           &nbsp;|&nbsp;&nbsp;<a href="?delete-'.$row["term_id"].'">Xoá</a>
           </td></tr>');
         }
       }

     ?>
        </table>
      </div>
        
  </body>

  <style>
  .control_term{
  color: white;
  width: 30%;
  display : inline-block;
}
.control_admin{
  width: 30%;
  display : inline-block;
  float: left;
}
.pane_delete{
  display : inline-block;
}
</style>
</html>