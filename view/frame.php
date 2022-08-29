<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="source/svg/logo.svg">
<title><?php echo '梅什号 | '.$page?></title>
<meta name="description" content="梅什号">
<meta name="keywords" content="nothing">
<meta name="author" content="和祯_BT">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<link rel="stylesheet" type="text/css" href="source/style.css">
<link rel="stylesheet" type="text/css" href="source/menus.css">
</head>
<body>
  <div class="whole" style="min-height:700px">
    <div>
      <img class="blank1" src="source/icon/blank.png" width="44" height="44">
      <div class="navbar">
        <a class="navbarbotton" style="float:left;text-align:left;">
          <?php include 'menus.php'?>
        </a>
        <a class="navbarbotton" href="user" style="width:100px;height:50px;float:right;">
          <img src="<?php echo $avatar?>" class="avatar" style="top:-15px;right:8px;width:40px;height:40px;border:0;float:right">
        </a>
        <a class="navbarbotton" style="margin:auto;font-size:24px;text-align:center;">
          <?php echo $page;?>&ensp;
        </a>
      </div>
    </div>
    <div class="row">
      <div class="main">
        <?php
        if (isset($content))
        {include $content;}
        elseif (isset($main))
        {echo $main;}
        else
        {header("/");}
        ?>
      </div>
    </div>
    <?php include 'pcmenus.php'?>
  </div>
</body>
</html>