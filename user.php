<!DOCTYPE html>
<?php
include 'php/user.php'
?>
<html>
<head>
<link rel="shortcut icon" href="source/icon/logo.png">
<title>梅什号 | 船员</title>
<meta name="description" content="梅什号">
<meta name="keywords" content="nothing">
<meta name="author" content="和祯_BT">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="source/style.css">
<link rel="stylesheet" type="text/css" href="source/menus.css">
<script src="source/user.js"></script>
</head>
<body>
<div class="whole">
<div>
<img class="blank1" src="source/icon/blank.png" width="44" height="44">
<div class="navbar">
  <a class="navbarbotton" href="index.php">甲板</a>
  <a class="navbarbotton" href="course.php">海图</a>
  <a class="navbarbotton" href="forum.php">酒馆</a>
  <a class="navbarbotton" href="user.php" style="float:right;">吊床</a>
</div>
</div>
  <div class="row">
    <img class="blank1" src="source/icon/blank.png" width="44" height="700">
    <div class="main">
      <?php
      echo $main;
      ?>
    </div>
  </div>
  <div class="footer">
  <p>Copyright©2022 meysh.cc.All rights reserved.</p><p>本站发布内容如无特别声明则其一切权利归属于其发布者、创作者或各自的版权所有者。</p>
</div>
</div>
<?php
readfile("source/menus.html");
?>
</body>
</html>