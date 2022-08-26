<?php
$page="注册";
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
    if ($result1['hashcode']!=null and $result2['hashcode']!=null)
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
        $from = "Meysh@meysh.cc";
        $to = $mail;
        $subject = "梅什号-船员身份激活链接";
        $message = "https://meysh.cc/user.php?link=$link";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        $cid=Mt_rand (100000001,999999999);
        $hashcode=password_hash("$password", PASSWORD_DEFAULT);
        $time = date('Y-m-d H:i:s');
        include 'getip.php';
        $prereg = $pdo->prepare("INSERT INTO preuser (cid,mail,link,hashcode,time,ip) VALUES (?,?,?,?,?,?)");
        $prereg->execute(array($cid,$mail,$link,$hashcode,$time,$ip));
    }
}
?>