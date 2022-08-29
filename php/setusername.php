<?php
$inputname=$_POST['inputname'];
$length=strlen($inputname);
if ($length<5 or $length>15)
{
    $main= $namelengtherror;
}
else
{
    $detect = $pdo->prepare("SELECT * FROM information WHERE username=:username");
    $detect->bindValue(':username', $inputname, PDO::PARAM_STR);
    $detect->execute();
    $result = $detect->fetch(PDO::FETCH_ASSOC);
    if ($result['username']!=null)
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
    $time = date('Y-m-d H:i:s');
    $reg = $pdo->prepare("UPDATE information SET uuid=?,username=?,permission=?,img=? WHERE mail=?");
    $reg->execute(array($uuid,$inputname,1,'source/svg/user.svg',$mail));
    $updatauid = $pdo->prepare("UPDATE count SET user=? WHERE sort=?");
    $updatauid->execute(array($uuid+1,1));
    setcookie("user", $mail, time()+60*60*24*30);
    unset($_SESSION['activemail']);
    unset($_SESSION['link']);
    header("location:user");
    }
}
?>