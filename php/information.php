<?php
include 'mysql.php';
switch (isset($_COOKIE['user'])*1+isset($_COOKIE['preuser'])*2)
{
    case "1":
        $search=$pdo->prepare("SELECT * FROM information WHERE mail=:mail");
        $search->bindValue(':mail', $_COOKIE['user'], PDO::PARAM_STR);
        $search->execute();
        $result=$search->fetch(PDO::FETCH_ASSOC);
        $username=$result['username'];
        $userid="uid:".$result['uuid'];
        $coin="银币:".$result['coin'];
        $avatar=$result['img'];
        break;
    case "2":
        $search=$pdo->prepare("SELECT * FROM preuser WHERE mail=:mail");
        $search->bindValue(':mail', $_COOKIE['preuser'], PDO::PARAM_STR);
        $search->execute();
        $result=$search->fetch(PDO::FETCH_ASSOC);
        $username="船员".$result['cid'];
        $userid="cid:".$result['cid'];
        $coin="没激活没得钱包哦~";
        $avatar='source/icon/preuser.svg';
        break;
    case "0":
        $username="未登录";
        $userid="";
        $coin="";
        $avatar='source/icon/stranger.svg';
        break;
}
?>