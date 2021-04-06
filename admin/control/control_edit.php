<?php
// chèn fiel
  include ("../nav-bar.php");
  include ("default.php");
  include("../../src.php");
  // lệnh select dữ liệu
  $get_id_post = substr($getpage,17); // cắt chuỗi lấy id của bài post bên kia :D
  $query = mysqli_query($conn,"select * from d_post where post_id = '$get_id_post'");
  $row = mysqli_fetch_assoc($query);
  echo $get_id_post;
?>
<!-- url src ckeditor -->
<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
  
<!-- css js ckeditor -->
<script src="ckeditor.js"></script>
<link type="text/css" href="admin/control/sample/css/sample.css" rel="stylesheet" media="screen" />
<link rel="stylesheet" href="../../src/css/style.css">
<!-- menu content create data base -->
<!-- ... -->
<br>
<div class="menu-create-data">
  <!-- pane chứ  4 input ( content , title , img , value ) -->
  <div class="content"> 
      <form  action="" method="post">
        <div class="tab">
          <input placeholder="Tên Tiêu Đề Tin Tức" type="tel" name="tieude" id="" class=""  value="<?php
          // gán dữ liệu vô mục input
        echo $row["post_content"];
          ?>"style="width: 88%; display: inline-block;">
            <input class="btn btn-outline-light" name="click_post" type="submit" value="Sửa">
        </div>
    </div>
</div>
        <!-- ckeditor -->
          <div class="pane_editor">
              <div class="grid-container">
              <textarea class="editor" id="editor" name="noidung"><?php
              // nội dung của bài post
              echo $row["post_value"];
              ?></textarea>
          </div>
      <script>
        initSample();
      </script>
        <!-- ..... -->
          <!-- button add dữ liệu -->
  </div>
</div>
<div class="tab-input ">
  <div class="input-group mb-3" style="width:15%;">
  <select class="form-control" id="inputGroupSelect03" aria-label="Example select with button addon" name="chuyenmuc" >  <!-- đổ dl vào mục select -->
    <option selected>Chuyên Mục</option>
  <?php
    $query_select_term = mysqli_query($conn,"select * from d_terms");
    while($row = mysqli_fetch_array($query_select_term)){
      $term = $row["term_id"];
   echo('<option value="'.$term.'" >'.$row["term_name"].'</option>');
   }
  ?>
   </select>
</div><br>
    <input type="text" name="mota" id="" placeholder="Mô tả ngắn" class="form-control"style=" width: 15%;" ><br>
    <p>&nbsp; Chọn ảnh mô tả </p>
    <input type="file" name="anhmota" class="form-control" id="inputGroupFile01" style=" width: 15%; height:max-content">
    </form>
  </div>
</div>
<!-- post create data -->

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
//lệnh select đếm số có trong bảng
$select = mysqli_query($conn,"select * from d_post");
$count = 'p_'.(mysqli_num_rows($select)+1);
// lệnh sql thêm dữ liệu
$date =  date('Y/m/d H:i:s');
$date = str_replace('/','-',$date);
//echo $date;
  if(isset($_POST['click_post']) )
   {
// gán dữ liệu post
$tieude  = $_POST["tieude"];
$chuyenmuc = $_POST["chuyenmuc"];
$mota    = $_POST["mota"];
$anhmota = $_POST["anhmota"];
$noidung   = $_POST["noidung"];
$id = $_COOKIE['id'];
$user = $_COOKIE['user'];
if($tieude != ""){
mysqli_query($conn,"update set post_date = '$date' , post_content = '$tieude' 
, post_name = '$tieude' , post_title ='$mota' , post_img ='$anhmota' , post_value ='$noidung'")
 or die(mysqli_error($conn));
      }
   }
?>
<style>
  /* mục admin tạo bào viết */
.tab{
  position: relative;
  width: 90%;
  float: left;
}
.tab input {
  position: relative;
}
.pane_editor{
  display: inline-block;
  width: 66%;
  float: left;
}
.tab-input{
  left: 0.5%;
}
</style>
