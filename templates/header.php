<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="?page=home  ">Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <?php
          if(isset($_SESSION['login'])){
            $temp = $_SESSION['login'];
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo $temp;?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=logout">logout</a>
        </li>
        <?php
          }else{
        ?>
        <li class="nav-item">
          <a class="nav-link" href="?page=login">login</a>
        </li>
        <?php
          }
        ?>

      </ul>
    </div>
  </div>
</nav>
