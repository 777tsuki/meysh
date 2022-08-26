<?php
$page="重置密码";
$mail=$_POST['mail'];
include 'mysql.php';
$detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
$detect->bindValue(':mail', $mail, PDO::PARAM_STR);
$detect->execute();
$result1 = $detect->fetch(PDO::FETCH_ASSOC);
$redetect = $pdo->prepare("SELECT * FROM preuser WHERE mail=:mail");
$redetect->bindValue(':mail', $mail, PDO::PARAM_STR);
$redetect->execute();
$result2 = $redetect->fetch(PDO::FETCH_ASSOC);
$redetects = $pdo->prepare("SELECT * FROM loser WHERE mail=:mail");
$redetects->bindValue(':mail', $mail, PDO::PARAM_STR);
$redetects->execute();
$result3 = $redetects->fetch(PDO::FETCH_ASSOC);
if ($result1['uuid']!=null)
{$result=1;}
elseif ($result2['cid']!=null)
{$result=1;}
else
{$result=-1;}
if ($result3['code']!=null)
{$result=0;}
switch ($result)
{
    case "1":
        $bas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $bas = str_split($bas, 1);
        shuffle($bas);
        $link = implode("", $bas);
        $code=mt_rand(1001,9999);
        $main= $sendsuccess1.$code.$sendsuccess2;
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "Meysh@meysh.cc";
        $to = $mail;
        $subject = "梅什号-设置新密码链接";
        $message = "https://meysh.cc/user.php?function=$link 有效期十分钟，请勿泄露给他人";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        $time = strtotime("now")+10*60;
        $lost = $pdo->prepare("INSERT INTO loser (mail,code,link,time) VALUES (?,?,?,?)");
        $lost->execute(array($mail,$code,$link,$time));
        break;
    case "0":
        $main= $setting;
        break;
    case "-1":
        $main= $mailnofound;
        break;
}
?>