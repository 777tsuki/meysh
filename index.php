<!DOCTYPE html>
<?php
include 'updataip.php';
include 'table.php';
?>
<html>
<head>
<link rel="shortcut icon" href="source/icon/logo.png">
<title>梅什号 | 首页</title>
<meta name="description" content="梅什号">
<meta name="keywords" content="nothing">
<meta name="author" content="和祯_BT">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="source/index.css">
<link rel="stylesheet" type="text/css" href="source/menus.css">
</head>
<body>
<?php
readfile("source/menus.html");
?>
<div class="whole">
<?php
echo $normalmenu;
?>
<div class="row">
  <img class="blank1" src="source/icon/blank.png" width="44" height="1000">
  <div class="main">
    <img class="headlineimg" src="source/img/base/background.webp"></a><p></p>
    <div class="tips">
      <div class="headlineleft"><h2>最新公告</h2><hr/><iframe class="iframe" loading="lazy" src="" width="100%" frameborder="0" height="100%"></iframe></div><p class="blankp"></p>
      <div class="headlineright"><h2>最新航线</h2><hr/><iframe class="iframe" loading="lazy" src="" width="100%" frameborder="0" height="100%"></iframe></div>
      <div class="blankdiv"><h9>666</h9></div>
      <div class="headlineleft"><h2>最新话题</h2><hr/><iframe class="iframe" loading="lazy" src="" width="100%" frameborder="0" height="100%"></iframe></div><p class="blankp"></p>
      <div class="headlineright"><h2>最新故事</h2><hr/><iframe class="iframe" loading="lazy" src="" width="100%" frameborder="0" height="100%"></iframe></div>
      <div class="blankdiv"><h9>666</h9></div>
      <div class="headline"><h2>相关链接</h2><hr/><a href="https://masiro.me/" target="_blank"><img src="https://www.masiro.me/masiroImg/logo-small.ico" width="40px"><p></p></a></div>
    </div>
  </div>
</div>
<div class="footer">
  <h2>敬请期待</h2>
</div>
</div>

</body>
</html>
