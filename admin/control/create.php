<?php
     include ("../../admin/nav-bar.php");
     include("../../src.php");
     include ("default.php");
?>
<!-- url src ckeditor ------------------------------------->
  <script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
  <!--  -->

              <!-- css js ckeditor -->
<link type="text/css" href="ckeditor/sample/css/sample.css" rel="stylesheet" media="screen" />
<link rel="stylesheet" href="../../src/css/style.css">
<link rel="stylesheet" href="../src/design_r_c.css">




            <!-- menu content create data base -->
            <!-- ... -->
<br>
<!--  thẻ chọn ảnh làm ảnh mô tả thẻ ( ẩn , hiện ) -->
<h1 class="text-danger">
</h1>
<div class="pane_choose bg-light" style="display: none;">
  <button class="btn btn-outline-secondary close_pane_choose"><i>đóng</i></button>
 <!-- choose 2 type input pictre -->
 <div role="tabpanel">
  <!-- List group -->
  <div class="btn-group">
  <button type="button" class="btn btn-secondary btn_upload active">Tải tệp tin</button>
  <button type="button" class="btn btn-secondary btn_choose">Chọn ảnh có sẳn</button>
  </div>
  <!-- Tab panes -->
  <div class="tab_pane_upload border">
  <?php
     // --> upload
     // root file
$target_dir = "data/file/";
if(isset($_POST["UploadFile"])){
  $target_file = $target_dir . basename($_FILES["i_upload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  //query thêm root
      //$query = mysqli_query($conn,"inser into d_upload values (".)
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["i_upload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
   move_uploaded_file($_FILES["i_upload"]["tmp_name"], $target_file); 
    echo "File ". basename( $_FILES["i_upload"]["name"]).
          " Đã upload thành công.";
          echo "File lưu tại " . $target_file;
          mysqli_query($conn,"insert into d_upload ( upload_url , upload_user_id ) values ('$target_file','$u_id')")or die(mysqli_error($conn));
  } else {
    echo "Tệp vừa upload không phải là ảnh ! vui lòng thử lạy sau !";
    $uploadOk = 0;
  }
}
?>
<form id="send_post" enctype="multipart/form-data">
<div class="input-group mb-3" style="width: 750px;margin-top:5%;">
  <input type="file" name="i_upload" class="form-control" id="inputGroupFile02" style="width:500px ; float : left;">
  <input type="button" value="Upload Image" name="UploadFile" style="width:200px;" class="form-control btn btn-outline-secondary">
</div>
</form>
</div>
<!-- ------------------------------------------- -->

    <div class="tab_pane_choose border" id="choose" role="tabpanel" style="display: none;" >
    <p>&nbsp; Chọn ảnh mô tả </p>


    <!-- ----------------------------------------------------------- -->
    <div class="show_upload">
    <div class="section over-hide z-bigger">
		<div class="section over-hide z-bigger">
			<div class="container pb-5">
				<div class="row justify-content-center pb-5">
					<div class="col-12 pb-5">
        <?php
        // hiện list ảnh
          $term = mysqli_query($conn,"select * from d_upload");
          while( $row = mysqli_fetch_assoc($term)){
           echo '<input class="checkbox-tools" type="radio" name="tools" id="tool-'.$row["id_upload"].'" checked>
           <label class="for-checkbox-tools" for="tool-'.$row["id_upload"].'"><img src="'.$row["upload_url"].'" alt="">
           </label>';
          }
        ?>
    <input style="display: block;" type="text" name="getimg" id="" class="img_class" placeholder="empty">
    </div>
    </div>
			</div>	
		</div>
	</div>
  </div>
  </div>
</div>
</div>
<!-- ---------------------------------------------------------------------- -->

<div class="menu-create-data">
  <!-- pane chứ  4 input ( content , title , img , value ) -->
  <div class="content">
      <form  action="" method="post">
        <div class="tab">
          <input placeholder="Tên Tiêu Đề Tin Tức" type="tel" name="tieude" id="" class="" 
          style="width: 89%; display: inline-block;">
            <input class="btn btn-secondary" name="click_post" type="submit" value="Xuất Bản">
        </div>
    </div>
</div>
                 <!-- ckeditor -->
          <div class="pane_editor">
              <div class="grid-container">
              <textarea class="editor" id="editor" name="noidung"></textarea>
          </div>
      <script>
        initSample();
      </script>
        <!-- ..... -->
          <!-- button add dữ liệu -->
  </div>

  <div class="tab_input border float-right"> <!-- mục chưa input dữ liệu -->
  <div class="showchooseimg border">
  <button class="btn btn-outline-secondary btn_show" type="button" id="inputGroupFileAddon04">Chọn ảnh mô tả</button>
  </div>

  <!-- --------------------------------------------------------------------------------------------------------------------------------- -->
  <div class="input-group mb-3" >
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
</div>
    <textarea name="mota" id="" placeholder="Mô tả ngắn" class="form-control"></textarea><br>
   
    </form>
  </div>
</div>

<!-- jquery :)   -->
<script>
  // pick ảnh
$(document).ready(function(){
  $(".choose_picture").click(function(){
    alert($('.choose_picture').attr('src'));
    $("input:text").val($('.choose_picture'));
    });
});
// chọn close để ẩn pane_choose
$(".close_pane_choose").click(function(){
  $(".pane_choose").hide();
});
// chọn btn_show để hiện pane_choose
$(".btn_show").click(function(){
  $(".pane_choose").show();
});
//upload file 

$(".btn_upload").click(function(){
  $(".tab_pane_upload").show();
  $(".tab_pane_choose").hide();
  $(".btn_choose").removeClass("active");
  $(".btn_upload").addClass("active");
});

$(".btn_choose").click(function(){
  $(".tab_pane_choose").show();
  $(".tab_pane_upload").hide();
  $(".btn_upload").removeClass("active");
  $(".btn_choose").addClass("active");
});


// scrip jquery boostrap
var triggerTabList = [].slice.call(document.querySelectorAll('#myList a'))
triggerTabList.forEach(function (triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function (event) {
    event.preventDefault()
    tabTrigger.show()
  })
})
var triggerEl = document.querySelector('#myList a[href="#profile"]')
bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name

var triggerFirstTabEl = document.querySelector('#myTab li:first-child a')
bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select first tab
// jquery pick rađio choose
$(document).ready(function () {
$('.radio-group .radio').click(function () {
$('.selected .fa').removeClass('fa-check');
$('.radio').removeClass('selected');
$(this).addClass('selected');
});
});
</script>
<!-- post create data -->

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
//lệnh select đếm số có trong bảng
$select = mysqli_query($conn,"select * from d_post");
$count = mysqli_num_rows($select);
//$count = $count+1;
if (isset($_POST["getimg"])) {
  $getimg = $_POST["getimg"];
  echo("img : ".$getimg);
  $getimg = strstr($getimg,"file/");
  $getimg = substr($getimg,5);
  echo("<br>before : ".$getimg);
}

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
if($tieude != "" ){
mysqli_query($conn,"insert into 
d_post( post_id, post_term_id , post_user_id , post_date, post_content , post_name , post_title , post_img , post_value)
values('$count','$chuyenmuc','$id','$date','$tieude','$user','$mota','$anhmota','$noidung');")
 or die(mysqli_error($conn));
      }
   }
?>







<style>
  /* mục admin tạo bào viết */
.tab{
  position: relative;
  width: 80%;
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
.tab_input{
  width: 28%;
}
.choose_picture{
  width : 150px;
  height : 150px;
}

.showchooseimg{
}
/* phần pick ảnh trong ul li */
li{
  display: inline-block;
  margin-right : 5%;
}
/* phần div ẩn hiện chọn ảnh mô tả */
.pane_choose{
  position: fixed;
  width: 90%;
  margin-left: 5%;
  height: 500px;
  z-index: 99999;
}
.close_pane_choose{
  float: right;
}
/* thiế kế radio select */

</style>