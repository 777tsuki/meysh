<!DOCTYPE html>
<?php
include 'php/updataip.php';
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
</head>
<body>
<div class="row">
  <img class="blank1" src="source/icon/blank.png" width="44" height="700">
  <div class="main">
    <?php
    echo $main;
    ?>
  </div>
</div>
<?php
readfile("source/menus.html");
?>
</body>
</html>