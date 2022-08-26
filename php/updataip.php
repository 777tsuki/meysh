<?php
if (isset($_COOKIE["user"]) or isset($_COOKIE["preuser"]))
{
    include 'getip.php';
    include 'mysql.php';
    switch (isset($_COOKIE["user"])-isset($_COOKIE["preuser"]))
    {
    case "1":
        $mail=$_COOKIE["user"];
        break;
    case "-1":
        $mail=$_COOKIE["preuser"];
        break;
    }
    $updataip=$pdo->prepare("UPDATE information SET ip=:ip WHERE mail=:mail");
    $updataip->bindValue(':mail', $mail, PDO::PARAM_STR);
    $updataip->bindValue(':ip', $ip, PDO::PARAM_STR);
    $updataip->execute();
}
?>