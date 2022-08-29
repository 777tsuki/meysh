<?php
$detect1 = $pdo->prepare("SELECT * FROM count WHERE sort=:sort");
$detect1->bindValue(':sort', 2, PDO::PARAM_STR);
$detect1->execute();
$result1 = $detect1->fetch(PDO::FETCH_ASSOC);
if ($result1['user']=0)
{
    header("location:error");
}
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
    $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
    $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
    $detect->execute();
    $result = $detect->fetch(PDO::FETCH_ASSOC);
    if ($result['hashcode']!=null)
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
        $message = "https://meysh.cc/link/$link";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        $cid=Mt_rand (100000001,999999999);
        $hashcode=password_hash("$password", PASSWORD_DEFAULT);
        $time = date('Y-m-d H:i:s');
        $username='船员'.$cid;
        $reg = $pdo->prepare("INSERT INTO information (uuid,mail,hashcode,username,permission,ip,time,img,coin) VALUES (?,?,?,?,?,?,?,?,?)");
        $reg->execute(array("$cid",$mail,$hashcode,$username,$link,"ip",$time,"source/svg/preuser.svg","1"));
    }
}
?>