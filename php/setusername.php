<?php
$page="设置昵称";
$inputname=$_POST['inputname'];
$length=strlen($inputname);
if ($length<5 or $length>15)
{
    $main= $namelengtherror;
}
else
{
    include 'mysql.php';
    $detect = $pdo->prepare("SELECT * FROM information WHERE username=:username");
    $detect->bindValue(':username', $inputname, PDO::PARAM_STR);
    $detect->execute();
    $result = $detect->fetch(PDO::FETCH_ASSOC);
    if ("$result[username]"!=null)
    {
    $main= $existusername;
    }
    else
    {
    $getuid = $pdo->prepare("SELECT * FROM count WHERE sort=:sort");
    $getuid->bindValue(':sort', 1, PDO::PARAM_INT);
    $getuid->execute();
    $row = $getuid->fetch(PDO::FETCH_ASSOC);
    $uuid=$row['user'];
    $mail=$_SESSION['activemail'];
    include 'getip.php';
    $time = date('Y-m-d H:i:s');
    $reg = $pdo->prepare("INSERT INTO information (uuid,mail,hashcode,username,permission,ip,time,img,coin) VALUES (?,?,?,?,?,?,?,?,?)");
    $reg->execute(array($uuid,$mail,$_SESSION['hashcode'],$inputname,1,$ip,$time,"source/icon/img.svg",10));
    $updatauid = $pdo->prepare("UPDATE count SET user=:user WHERE sort=1");
    $updatauid->bindValue(':user', $uuid+1, PDO::PARAM_INT);
    $updatauid->execute();
    $delete= $pdo->prepare("DELETE FROM preuser WHERE mail=:mail");
    $delete->bindValue(':mail', $mail, PDO::PARAM_STR);
    $delete->execute();
    setcookie("preuser", $mail, time()-3600);
    setcookie("user", $mail, time()+60*60*24*30);
    unset($_SESSION['mail']);
    unset($_SESSION['hashcode']);
    unset($_SESSION['link']);
    header("location:user.php");
    }
}
?>