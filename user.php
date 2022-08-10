<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="source/icon/logo.png">
<title>BTの窝 | 用户</title>
<meta name="description" content="BTの窝">
<meta name="keywords" content="nothing">
<meta name="author" content="和祯_BT">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="source/index.css">
<link rel="stylesheet" type="text/css" href="source/menus.css">
<script src="source/user.js"></script>
</head>
<body>
<div class="whole">
  <?php
  if (!isset($_POST["password"]))
  {
    if (!isset($_GET["link"]))
    {
      echo '<div>
              <img class="blank1" src="source/icon/blank.png" width="44" height="44">
              <div class="navbar">
                <img class="blank0" src="source/icon/blank.png" width="44px" height="30">
                <a class="navbarbotton" onclick="output()">消息</a>
                <a class="navbarbotton" onclick="input()">关注</a>
                <a class="navbarbotton" onclick="style()">仪表</a>
                <a class="navbarbotton" href="admin.php" style="float:right;">管理</a>
              </div>
            </div>';
    }
    else
    {
      echo '<div>
              <img class="blank1" src="source/icon/blank.png" width="44" height="44">
              <div class="navbar">
                <img class="blank0" src="source/icon/blank.png" width="44px" height="30">
                <a class="navbarbotton" href="index.php">甲板</a>
                <a class="navbarbotton" href="course.php">海图</a>
                <a class="navbarbotton" href="forum.php">酒馆</a>
                <a class="navbarbotton" href="user.php" style="float:right;">吊床</a>
              </div>
            </div>';
    }
  }
  ?>
  <div class="row">
    <img class="blank1" src="source/icon/blank.png" width="44" height="800">
    <div class="main">
    <?php
    if (isset($_POST["password"]))
    {
      echo '<h1 style="text-align: center">提示</h1>';
      if (isset($_POST["username"]))
      {
        $mail=$_POST['mail'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];
        $name=$_POST['username'];
        $start=0;
        if ($password === $repassword)
        {
          $start++;
        }
        else
        {
          echo '<a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>两次密码不一样，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
        }
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
        {
          echo '<br><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱格式错了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
        }
        else
        {
          $start++;
        }
        $length=strlen($password);
        if ($length<6 or $length>16)
        {
          echo '<br><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>密码长度为6-16，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
        }
        else
        {
          $start++;
        }
        if ($start==3)
        {
          $servername="localhost";
          $username="root";
          $userpassword="bt233";
          $dbname = "user";
          $conn = mysqli_connect($servername, $username, $userpassword,$dbname);
          $testfor = mysqli_query($conn,"SELECT * FROM information
          WHERE mail='$mail'");
          $test = mysqli_fetch_assoc($testfor);
          if ($test)
          {
            echo '<a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>该邮箱被注册了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
            </svg><br></h1></a>';
          }
          else
          {
            $code=Mt_rand (1001,9999);
            $expire=time()+60*10;
            setcookie("code", "imagekey", $expire);
            echo '
            <a class=login style="height:370px;text-decoration:none">
            <h1 style="color:rgb(215, 215, 215)"><br><br>请输入验证码<br>（可能会出现在垃圾箱里）</h1><br>
            <form target="_blank" method="post" action="testfor?link=register">
            <input type="text" name="inputkey" class="import"   style="width:213px;">
            <input type="submit" class="clickbotton" style="text-decoration:none;border:0;" value="确定">
            </form><br></a>';
            $to = "$mail";
            $subject = "BTの窝注册验证码";
            $message = "$code" . "<br>有效期十分钟";
            $from = "bt233.top";
            $headers = "From:" . $from;
            mail($to,$subject,$message,$headers);
            session_start();
            $_SESSION['registermail']=$mail;
            $_SESSION['registerpassword']=$password;
            $_SESSION['registercode']=$code;
            $_SESSION['registername']=$name;
          }
          mysqli_close($conn);
        }
      }
      else
      {
        if (isset($_POST["repassword"]))
        {
          $mail=$_POST['mail'];
          $password=$_POST['password'];
          $repassword=$_POST['repassword'];
          $start=0;
          if ($password === $repassword)
          {
            $start++;
          }
          else
          {
            echo '<a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>两次密码不一样，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
          </svg><br></h1></a>';
          }
          if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
          {
            echo '<br><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱格式错了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
          </svg><br></h1></a>';
          }
          else
          {
            $start++;
          }
          $length=strlen($password);
          if ($length<6 or $length>16)
          {
            echo '<br><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>密码长度为6-16，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
          </svg><br></h1></a>';
          }
          else
          {
            $start++;
          }
          if ($start==3)
          {
            $servername="localhost";
            $username="root";
            $userpassword="bt233";
            $dbname = "user";
            $conn = mysqli_connect($servername, $username, $userpassword,$dbname);
            $testfor = mysqli_query($conn,"SELECT * FROM information
            WHERE mail='$mail'");
            $test = mysqli_fetch_assoc($testfor);
            if ($test)
            {
              $code=Mt_rand (1001,9999);
              $expire=time()+60*10;
              setcookie("forgetcode", "sbkey", $expire);
              echo '
              <a class=login style="height:370px;text-decoration:none">
              <h1 style="color:rgb(215, 215, 215)"><br><br>请输入验证码<br>（可能会出现在垃圾箱里）</h1><br>
              <form target="_blank" method="post" action="testfor?link=forgetpassword">
              <input type="text" name="inputkey" class="import"   style="width:213px;">
              <input type="submit" class="clickbotton" style="text-decoration:none;border:0;" name="$code" value="确定">
              </form><br></a>';
              $to = "$mail";
              $subject = "BTの窝-设置新密码-验证码";
              $message = "$code" . "<br>有效期十分钟";
              $from = "bt233.top";
              $headers = "From:" . $from;
              mail($to,$subject,$message,$headers);
              session_start();
              $_SESSION['forgetmail']=$mail;
              $_SESSION['forgetpassword']=$password;
              $_SESSION['forgetcode']=$code;
            }
            else
            {
              echo '<a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>该邮箱不存在，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
              </svg><br></h1></a>';
            }
            mysqli_close($conn);
          }
        }
        else
        {
          $mail=$_POST['mail'];
          $password=$_POST['password'];
          $start=0;
          if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
          {
            echo '<br><a href="javascript:history.go(-1);" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱格式错了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
          </svg><br></h1></a>';
          }
          else
          {
            $start++;
          }
          $length=strlen($password);
          if ($length<6 or $length>16)
          {
            echo '<br><a href="javascript:history.go(-1);" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>密码长度为6-16，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
          </svg><br></h1></a>';
          }
          else
          {
            $start++;
          }
          if ($start==2)
          {
            $servername="localhost";
            $username="root";
            $userpassword="bt233";
            $dbname = "user";
            $conn = mysqli_connect($servername, $username, $userpassword,$dbname);
            $result = mysqli_query($conn,"SELECT * FROM information
            WHERE mail='$mail'");
            $row = mysqli_fetch_assoc($result);
            if ($row)
            {
              $hashcode="$row[hashcode]";
              if (password_verify($password, $hashcode))
              {
                echo '<br><a href="user.php" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>登录成功<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path>
                </svg><br></h1></a>';
                $expire=time()+60*60*24*30;
                setcookie("user", $mail, $expire);
              }
              else
              {
                echo '<br><a href="javascript:history.go(-1);" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱或密码错误<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
                </svg><br></h1></a>';
              }
            }
            else
            {
              echo '<br><a href="javascript:history.go(-1);" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱不存在，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
              </svg><br></h1></a>';
            }
            mysqli_close($conn);
          }
        }
      }
    }
    else
    {
      if (!isset($_GET["link"]))
      {
        $link="user";
      }
      else
      {
        $link=$_GET["link"];
      }
      switch ($link)
      {
        case "login":
          echo '<h1 style="text-align: center;">BTの窝</h1>
                <form class="login" action="user" method="post">
                  <h2>登录</h2><hr/><br>
                  <a>邮箱  </a><input type="text" name="mail" class="import"><br><br>
                  <a>密码  </a><input type="password" name="password" class="import"><br><br>
                  <input type="submit" value="LOGIN" class="clickbotton"><p></p>
                </form><br>
                <div class="others">
                  <a class="otherleft" href="../../user?link=forgetpassword" style="text-decoration:none;"><h2>忘记密码</h2></a>
                  <a class="otherright" href="../../user?link=register" style="text-decoration:none;"><h2>注册</h2></a>
                </div>';
          break;
        case "register":
          echo '<h1 style="text-align: center;">BTの窝</h1>
                <form class="login" action="user" method="post">
                  <h2>注册</h2><hr/><br>
                  <a>你的邮箱  </a><input type="text" name="mail" class="import" style="width:300px"><br><br>
                  <a>你的昵称  </a><input type="text" name="username" class="import" style="width:300px"><br><br>
                  <a>你的密码  </a><input type="password" name="password" class="import" style="width:300px"><br><br>
                  <a>重复密码  </a><input type="password" name="repassword" class="import" style="width:300px"><br><br>
                  <input type="submit" value="REGISTER" class="clickbotton"><p></p>
                </form><br>
                <div class="others">
                  <a class="otherleft" href="../../user?link=forgetpassword" style="text-decoration:none;"><h2>忘记密码</h2></a>
                  <a class="otherright" href="../../user?link=login" style="text-decoration:none;"><h2>登录</h2></a>
                </div>';
          break;
        case "forgetpassword":
          echo '<h1 style="text-align: center;">BTの窝</h1>
                <form class="login" action="user" method="post">
                  <h2>设置新密码</h2><hr/><br>
                  <a>你的邮箱  </a><input type="text" name="mail" class="import" style="width:300px"><br><br>
                  <a>新的密码  </a><input type="password" name="password" class="import" style="width:300px"><br><br>
                  <a>重复密码  </a><input type="password" name="repassword" class="import" style="width:300px"><br><br>
                  <input type="submit" value="确定" class="clickbotton"><p></p>
                </form><br>
                <div class="others">
                  <a class="otherleft" href="../../user?link=login" style="text-decoration:none;"><h2>登录</h2></a>
                  <a class="otherright" href="../../user?link=register" style="text-decoration:none;"><h2>注册</h2></a>
                </div>';
          break;
        default:
          if (isset($_COOKIE["user"]))
          {
            include 'source/user/user.php';
          }
          else
          {
            header("location:user?link=login");
          }
      }
    }
    ?>
    </div>
  </div>
  <div class="footer">
  <h2>敬请期待</h2>
</div>
</div>
<?php
readfile("source/menus.html");
?>
</body>
</html>