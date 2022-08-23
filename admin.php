<!DOCTYPE html>
<?php
      if (isset($_POST['exitlogin']))
      {
        header("location:user.php?link=login");
        setcookie("user", $_COOKIE["user"], time()-60*60*24*30);
      }
      if (isset($_POST['forget']))
      {
        header("location:user.php?link=forgetpassword");
      }
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
<link rel="stylesheet" type="text/css" href="source/style.css">
<link rel="stylesheet" type="text/css" href="source/menus.css">
</head>
<body>
  <?php
  if (isset($_COOKIE["user"]))
  {
    $mail=$_COOKIE["user"];
    include 'mysql.php';
    $search = mysqli_query($conn,"SELECT * FROM information
    WHERE mail='$mail'");
    $data = mysqli_fetch_assoc($search);
    session_start();
    $_SESSION['name']=$data['username'];
    $_SESSION['mail']=$mail;
    mysqli_close($conn);
  }
  else
  {
    header("location:user.php?link=login");
  }
  readfile("source/menus.html");
  ?>
<div class="whole">
  
<div>
  <img class="blank1" src="source/icon/blank.png" width="44" height="44">
  <div class="navbar">
    <img class="blank0" src="source/icon/blank.png" width="44px" height="30">
    <a class="navbarbotton" href="index.php">船员</a>
    <a class="navbarbotton" href="content.php">权限</a>
    <a class="navbarbotton" href="forum.php">方向</a>
    <a class="navbarbotton" href="user.php" style="float:right;">吊床</a>
  </div>
</div>
<div class="row">
  <img class="blank1" src="source/icon/blank.png" width="44" height="800px">
  <div class="main">
    <div class="tips">
      <form class="headline" method="post" >
        <input type="submit" class="mainbotton" style="text-decoration:none;border:0;" name="exitlogin" value="下船">
        <input type="submit" class="mainbotton" style="text-decoration:none;border:0;" name="forget" value="修改密码">
        <?php
        include 'mysql.php';
        $mail=$_COOKIE["user"];
        $search = mysqli_query($conn,"SELECT * FROM information
        WHERE mail='$mail'");
        $data = mysqli_fetch_assoc($search);
        ?>
        <input type="submit" class="mainbotton" style="text-decoration:none;border:0;" name="exitlogin" value="关教程">
        <input type="submit" class="mainbotton" style="text-decoration:none;border:0;" name="exitlogin" value="开教程">
      </form>
      <div class="blankdiv"><h9>666</h9></div>
      <br>
    </div>
  </div>
</div>
<div class="footer">
  <h2>敬请期待</h2>
</div>
</div>

</body>
</html>
