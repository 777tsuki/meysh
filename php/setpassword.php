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
    $delete= $pdo->prepare("DELETE FROM loser WHERE mail=:mail");
    $delete->bindValue(':mail', $mail, PDO::PARAM_STR);
    $delete->execute();
    $updata = $pdo->prepare("UPDATE information SET hashcode=? WHERE mail=?");
    $updata->execute(array($hashcode,$mail));
    setcookie("user", $mail, time()-60*60*24*30);
    header("location:user");
}
unset($_SESSION['themail']);
?>