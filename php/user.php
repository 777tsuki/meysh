<?php
ob_start();
session_start();
include 'updataip.php';
include 'table.php';
include 'information.php';
switch (isset($_GET["link"])+isset($_GET["uuid"])*2+isset($_GET["function"])*4)
{
    case "0":
        if (isset($_COOKIE["user"]) or isset($_COOKIE["preuser"]))
        {
            $page="船员中心";
            unset($main);
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
                $page="登录";
                $main= $login;
                break;
            case "register":
                $page="注册";
                $main= $register;
                break;
            case "forgetpassword":
                $page="重置密码";
                $main= $forgetpassword;
                break;
            default:
                $page="验证账号";
                include 'mysql.php';
                $detect = $pdo->prepare("SELECT * FROM preuser WHERE link=:link");
                $detect->bindValue(':link', $_GET["link"], PDO::PARAM_STR);
                $detect->execute();
                $result = $detect->fetch(PDO::FETCH_ASSOC);
                if ($result['mail']!=0)
                {
                    $_SESSION['link']=$_GET["link"];
                    $main= $active;
                }
                else
                {
                    header("location:weihu.html");
                }
        }
        break;
    case "2":
        break;
    case "4":
        switch ($_GET["function"])
        {
            case "login":
                include 'login.php';
                break;
            case "register":
                include 'register.php';
                break;
            case "forgetpassword":
                include 'forgetpassword.php';
                break;
            case "active":
                include 'active.php';
                break;
            case "verify":
                include 'verify.php';
                break;
            case "setpassword":
                include 'setpassword.php';
                break;
            case "setusername":
                include 'setusername.php';
                break;
            default:
                $page="验证账号";
                include 'mysql.php';
                $detect = $pdo->prepare("SELECT * FROM loser WHERE link=:link");
                $detect->bindValue(':link', $_GET["function"], PDO::PARAM_STR);
                $detect->execute();
                $result = $detect->fetch(PDO::FETCH_ASSOC);
                if ($result['mail']==null)
                {
                    header("location:weihu.html");
                }
                elseif (strtotime("now")>$result['time'])
                {
                    $main= $outdated;
                    $delete= $pdo->prepare("DELETE FROM loser WHERE link=:link");
                    $delete->bindValue(':link', $_GET["function"], PDO::PARAM_STR);
                    $delete->execute();
                }
                else
                {
                    $_SESSION['link']=$_GET["function"];
                    $main= $verify;
                }
        }
        break;
    default:
        header("location:source/weihu.html");
}
?>