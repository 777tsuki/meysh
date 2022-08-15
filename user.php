<!DOCTYPE html>
<?php
include 'updataip.php';
include 'table.php';
?>
<html>
<head>
<link rel="shortcut icon" href="source/icon/logo.png">
<title>梅什号 | 用户</title>
<meta name="description" content="梅什号">
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
      echo $usermenu;
    }
    else
    {
      echo $normalmenu;
    }
  }
  ?>
  <div class="row">
    <img class="blank1" src="source/icon/blank.png" width="44" height="800">
    <div class="main">
    <?php
    switch (isset($_GET["link"])+isset($_GET["uuid"])*2+isset($_GET["function"])*4)
    {
      case "0":
        if (isset($_COOKIE["user"]) or isset($_COOKIE["preuser"]))
        {
          include 'source/user/user.php';
        }
        else
        {
          header("location:user.php?link=login");
        }
        break;
      case "1":
        switch ($_GET["link"])
        {
          case "login":
            echo $login;
            break;
          case "register":
            echo $register;
            break;
          case "forgetpassword":
            echo $forgetpassword;
            break;
        }
        break;
      case "2":
        break;
      case "4":
        echo '<h1 style="text-align: center">提示</h1>';
        switch ($_GET["function"])
        {
          case "login":
            $mail=$_POST['mail'];
            $password=$_POST['password'];
            $start=0;
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
            {
              echo $mailerror;
            }
            else
            {
              $start++;
            }
            $length=strlen($password);
            if ($length<6 or $length>16)
            {
              echo $lengtherror;
            }
            else
            {
              $start++;
            }
            if ($start==2)
            {
              include 'mysql.php';
              $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
              $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
              $detect->execute();
              $result1 = $detect->fetch(PDO::FETCH_ASSOC);
              $result1="$result1[mail]";
              $redetect = $pdo->prepare("SELECT * FROM preuser WHERE mail=:mail");
              $redetect->bindValue(':mail', $mail, PDO::PARAM_STR);
              $redetect->execute();
              $result2 = $redetect->fetch(PDO::FETCH_ASSOC);
              $result2="$result2[mail]";
              echo $result1;
              echo $result2;
              switch (isset($result1)-isset($result2))
              {
                case "1":
                  $hashcode="$result1[hashcode]";
                  if (password_verify($password, $hashcode))
                  {
                    echo $loginsuccess;
                    $expire=time()+60*60*24*30;
                    setcookie("user", $mail, $expire);
                  }
                  else
                  {
                    echo $loginfail;
                  }
                  break;
                case "-1":
                  $hashcode="$result2[hashcode]";
                  if (password_verify($password, $hashcode))
                  {
                    echo $loginsuccess;
                    $expire=time()+60*60*24*30;
                    setcookie("preuser", $mail, $expire);
                  }
                  else
                  {
                    echo $loginfail;
                  }
                  break;
                case "0":
                  echo $mailnofound;
                  break;
              }
            }
            break;
          case "register":
            $mail=$_POST['registermail'];
            $password=$_POST['password'];
            $repassword=$_POST['repassword'];
            $start==0;
            if ($password === $repassword)
            {
                $start++;
            }
            else
            {
                echo $inconsistent;
            }
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
            {
                echo $mailerror;
            }
            else
            {
                $start++;
            }
            $length=strlen($password);
            if ($length<6 or $length>16)
            {
                echo $lengtherror;
            }
            else
            {
                $start++;
            }
            if ($start==3)
            {
                include 'mysql.php';
                $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
                $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
                $detect->execute();
                $result = $pdo->query($result);
                $result = $result->fetch(PDO::FETCH_ASSOC);
                if (isset($result))
                {
                echo $existmail;
                }
                else
                {
                $lnk=$lik==1;
                while ($lnk=$lik)
                {
                    $bas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                    $bas = str_split($bas, 1);
                    shuffle($bas);
                    $link = implode("", $bas);
                    $detect = $pdo->prepare("SELECT * FROM preuser WHERE link=:link");
                    $detect->bindValue(':link', $link, PDO::PARAM_STR);
                    $detect->execute();
                    $result = $pdo->query($detect);
                    $result = $result->fetch(PDO::FETCH_ASSOC);
                    if (!isset($result))
                    {
                    $lnk==2;
                    }
                }
                echo $registersuccess;
                $to = "$mail";
                $subject = "梅什号船员身份激活链接";
                $message = "https://meysh.cc/function.php?link=" . $link . "<br>" . "你也可以仅使用临时账号，这并不会影响浏览和回复，但无法发布主题帖和其它正式文章。";
                $from = "梅什号事务处";
                $headers = "From:" . $from;
                mail($to,$subject,$message,$headers);
                $cid=Mt_rand (100000001,999999999);
                $hashcode=password_hash("$password", PASSWORD_DEFAULT);
                $time = date('Y-m-d H:i:s')+10*60;
                include 'getip.php';
                $prereg = $pdo->prepare("INSERT INTO preuser (cid,mail,link,hashcode,time,ip) VALUES (?,?,?,?,?,?)");
                $prereg->execute([$cid,$mail,$link,$hashcode,$time,$ip]);
                }
            }
            break;
          case "forgetpassword":
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
            echo $inconsistent;
            }
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
            {
            echo $mailerror;
            }
            else
            {
            $start++;
            }
            $length=strlen($password);
            if ($length<6 or $length>16)
            {
            echo $lengtherror;
            }
            else
            {
            $start++;
            }
            if ($start==3)
            {
            include 'mysql.php';
            $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
            $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
            $detect->execute();
            $result = $pdo->query($detect);
            $result = $result->fetch(PDO::FETCH_ASSOC);
            if (isset($result))
            {
                $code=Mt_rand (1001,9999);
                $expire=time()+60*10;
                setcookie("forgetcode", "sbkey", $expire);
                echo $forgetcode;
                $to = "$mail";
                $subject = "梅什号-设置新密码-验证码";
                $message = "$code" . "<br>有效期十分钟";
                $from = "梅什号事务处";
                $headers = "From:" . $from;
                mail($to,$subject,$message,$headers);
                session_start();
                $_SESSION['forgetmail']=$mail;
                $_SESSION['forgetpassword']=$password;
                $_SESSION['forgetcode']=$code;
            }
            else
            {
                echo $mailnofound;
            }
            }
            break;
          default:
            header("location:source/weihu.html");
        }
        break;
      default:
        header("location:source/weihu.html");
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