<?php
include("connect.php");
include("src.php");
?>
<html id="foo">
     <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="/src/icon/favicon.ico" type="image/x-icon" />
     </head>
  <header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
 <div class="logo-main">
         <img src="/data/picture/logo-main.jpg" alt="" />
       </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav">
    <?php
    $query = mysqli_query($conn,"select * from d_terms");
        if($query->num_rows)
        {
            while($row = mysqli_fetch_array($query))
            {
    echo('<li class="nav-item"><a class="nav-link" href="#">'.$row["term_name"]
        .'</a></li>');
            }
        }
    ?>
    </ul>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</div>
  </nav>
</div>
     </header>
<div class="gachchan"></div>
