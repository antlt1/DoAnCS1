<?php
// phần nav bar và tìm kiếm
include("nav-bar.php");
/*
  // thiết lập số dl hiện trên 1 tranga_to_page
  $getting_dada_to_page = 4;
  //setting trang
  $getting_page = 4;
  //offset
  $offset = ($getting_page - 1 ) * $getting_dada_to_page;
  $sql = mysqli_query($conn,"select * from d_post");
  //.$getting_dada_to_page." OFFSET ".$offset);//.$getting_dada_to_page);
  if($sql->num_rows > 0){
  while($row = mysqli_fetch_array($sql))
      {
    /*."|".$row["post_status"]."|".$row["post_title"]."</a><br>");*/ 
?>
<div class="menu border bg-dark">
  <div class="content bg-danger text-light">
        <div class="hotnew bg-success">
          <h3>hot vkl</h3>
        </div>
          <div class="a_few_new"> <!-- 3 new -->
              <div class="news badge-info">
                new 1
              </div>
              <div class="news badge-info">
                new 2
              </div>
              <div class="news badge-info">
                new 3
              </div>
          </div>
  </div>
  <div class="bar_right bg-secondary">
        <h1>bên phải</h1>
  </div> 
  <?php
    include "footer.php";
  ?>
</div>
<?php
$conn->close();
    ?>
  </div>
  <div class="next_page">
      <a href="index.php?page_start=<?php echo 1;?>"></a>
  </div>
  <style>
    .menu{
      width: 100%;

    }
    .content{
      width: 60%;
      display: inline-block;  
    }
    .bar_right{
      display: inline-block;
      width: 39%;
      height: 400px;
      float: right;
    }
    .hotnew{
      width: 100%;
      height: 150px;
    }
    .news{
      width: 32.90%;
      display: inline-block;
      height: 150px;
    }
  </style>