<?php
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$length=strlen($password);
if ($password != $repassword)
{
    $main= $inconsistent;
}
elseif ($length<6 or $length>16)
{
    $main= $lengtherror;
}
else
{
    $mail=$_SESSION['themail'];
    $hashcode=password_hash("$password", PASSWORD_DEFAULT);
    include 'mysql.php';
    $delete= $pdo->prepare("DELETE FROM loser WHERE mail=:mail");
    $delete->bindValue(':mail', $mail, PDO::PARAM_STR);
    $delete->execute();
    $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
    $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
    $detect->execute();
    $result1 = $detect->fetch(PDO::FETCH_ASSOC);
    $redetect = $pdo->prepare("SELECT * FROM preuser WHERE mail=:mail");
    $redetect->bindValue(':mail', $mail, PDO::PARAM_STR);
    $redetect->execute();
    $result2 = $redetect->fetch(PDO::FETCH_ASSOC);
    if ($result1['uuid']!=null)
    {
        $updata = $pdo->prepare("UPDATE information SET hashcode=? WHERE mail=?");
        $updata->execute(array($hashcode,$mail));
        setcookie("preuser", $mail, time()-3600);
        setcookie("user", $mail, time()+60*60*24*30);
        header("location:user.php");
    }
    elseif ($result2['cid']!=null)
    {
        $updata = $pdo->prepare("UPDATE preuser SET hashcode=? WHERE mail=?");
        $updata->execute(array($hashcode,$mail));
        setcookie("preuser", $mail, time()-3600);
        setcookie("user", $mail, time()+60*60*24*30);
        header("location:user.php");
    }
    else
    {
        $main= '<h1 style="margin:auto;padding:auto;">你小子怎么混进来的？</h1>';
    }
}
unset($_SESSION['themail']);
?>