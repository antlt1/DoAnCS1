<?php
// --> src file
     include ("../nav-bar.php");
     include("../../src.php");
     include ("default.php");
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
<form action="" method="post" enctype="multipart/form-data">
<div class="input-group mb-3" style="width: 750px;margin-top:5%;">
  <input type="file" name="i_upload" class="form-control" id="inputGroupFile02" style="width:500px ; float : left;">
  <input type="submit" value="Upload Image" name="UploadFile" style="width:200px;" class="form-control btn btn-outline-secondary">
</div>
</form>