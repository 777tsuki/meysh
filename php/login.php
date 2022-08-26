<?php
$page="登录";
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
?>