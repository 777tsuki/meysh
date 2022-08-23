<?php
include 'php/updataip.php';
include 'table.php';
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
        $main= $login;
        break;
        case "register":
        $main= $register;
        break;
        case "forgetpassword":
        $main= $forgetpassword;
        break;
    }
    break;
    case "2":
    break;
    case "4":
    switch ($_GET["function"])
    {
        case "login":
            $mail=$_POST['mail'];
            $password=$_POST['password'];
            $length=strlen($password);
            $start=0;
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
            {
                $main= $mailerror;
            }
            elseif ($length<6 or $length>16)
            {
                $main= $lengtherror;
            }
            else
            {
                $start++;
            }
            if ($start==1)
            {
                include 'mysql.php';
                $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
                $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
                $detect->execute();
                $result1 = $detect->fetch(PDO::FETCH_ASSOC);
                $redetect = $pdo->prepare("SELECT * FROM preuser WHERE mail=:mail");
                $redetect->bindValue(':mail', $mail, PDO::PARAM_STR);
                $redetect->execute();
                $result2 = $redetect->fetch(PDO::FETCH_ASSOC);
                if ($mail==$result1['mail'])
                {$result=1;}
                elseif ($mail==$result2['mail'])
                {$result=-1;}
                else
                {$result=0;}
                switch ($result)
                {
                case "1":
                    $hashcode=$result1['hashcode'];
                    if (password_verify($password, $hashcode))
                    {
                    $main= $loginsuccess;
                    $expire=time()+60*60*24*30;
                    setcookie("user", $mail, $expire);
                    }
                    else
                    {
                    $main= $loginfail;
                    }
                    break;
                case "-1":
                    $hashcode=$result2['hashcode'];
                    if (password_verify($password, $hashcode))
                    {
                    $main= $loginsuccess;
                    $expire=time()+60*60*24*30;
                    setcookie("preuser", $mail, $expire);
                    }
                    else
                    {
                    $main= $loginfail;
                    }
                    break;
                case "0":
                    $main= $mailnofound;
                    break;
                }
            }
            break;
        case "register":
            $mail=$_POST['registermail'];
            $password=$_POST['password'];
            $repassword=$_POST['repassword'];
            $length=strlen($password);
            $start=0;
            if ($password != $repassword)
            {
                $main= $inconsistent;
            }
            elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail))
            {
                $main= $mailerror;
            }
            elseif ($length<6 or $length>16)
            {
                $main= $lengtherror;
            }
            else
            {
            $start++;
            }
            if ($start==1)
            {
                include 'mysql.php';
                $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
                $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
                $detect->execute();
                $result1 = $detect->fetch(PDO::FETCH_ASSOC);
                $redetect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
                $redetect->bindValue(':mail', $mail, PDO::PARAM_STR);
                $redetect->execute();
                $result2 = $redetect->fetch(PDO::FETCH_ASSOC);
                if ($result1['mail']!=null and $result2['mail']!=null)
                {
                    $main= $existmail;
                }
                else
                {
                    $bas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                    $bas = str_split($bas, 1);
                    shuffle($bas);
                    $link = implode("", $bas);
                    $main= $registersuccess;
                    ini_set( 'display_errors', 1 );
                    error_reporting( E_ALL );
                    $from = "admin@meysh.cc";
                    $to = $mail;
                    $subject = "梅什号-船员身份激活链接";
                    $message = "https://meysh.cc/function.php?link=$link";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers = "From:" . $from;
                    mail($to,$subject,$message, $headers);
                    $cid=Mt_rand (100000001,999999999);
                    $hashcode=password_hash("$password", PASSWORD_DEFAULT);
                    $time = date('Y-m-d H:i:s');
                    include 'php/getip.php';
                    $prereg = $pdo->prepare("INSERT INTO preuser (cid,mail,link,hashcode,time,ip) VALUES (?,?,?,?,?,?)");
                    $prereg->execute(array($cid,$mail,$link,$hashcode,$time,$ip));
                }
            }
            break;
        case "forgetpassword":
            $mail=$_POST['mail'];
            $password=$_POST['password'];
            $repassword=$_POST['repassword'];
            $length=strlen($password);
            $start=0;
            if ($password != $repassword)
            {
                $main= $inconsistent;
            }
            elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail))
            {
                $main= $mailerror;
            }
            elseif ($length<6 or $length>16)
            {
                $main= $lengtherror;
            }
            else
            {
            $start++;
            }
            if ($start==1)
            {
            include 'mysql.php';
            $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
            $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
            $detect->execute();
            $result = $detect->fetch(PDO::FETCH_ASSOC);
            if ("$result[uuid]"!=null)
            {
                $code=Mt_rand (1001,9999);
                $expire=time()+60*10;
                setcookie("forgetcode", "sbkey", $expire);
                $main= $forgetcode;
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from = "admin@meysh.cc";
                $to = $mail;
                $subject = "梅什号-设置新密码-验证码";
                $message = "
                [梅什号事务处]$code 有效期十分钟
                ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers = "From:" . $from;
                mail($to,$subject,$message, $headers);
                session_start();
                $_SESSION['forgetmail']=$mail;
                $_SESSION['forgetpassword']=$password;
                $_SESSION['forgetcode']=$code;
            }
            else
            {
                $main= $mailnofound;
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