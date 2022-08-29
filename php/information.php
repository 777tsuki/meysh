<?php
if (isset($_COOKIE['user']))
{
    error_reporting (E_ERROR | E_WARNING | E_PARSE);
    if($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]){
    $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
    }
    elseif($HTTP_SERVER_VARS["HTTP_CLIENT_IP"]){
    $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
    }
    elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"]){
    $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
    }
    elseif (getenv("HTTP_X_FORWARDED_FOR")){
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    }
    elseif (getenv("HTTP_CLIENT_IP")){
    $ip = getenv("HTTP_CLIENT_IP");
    }
    elseif (getenv("REMOTE_ADDR")){
    $ip = getenv("REMOTE_ADDR");
    }
    else{
    $ip = "Unknown";
    }
    $mail=$_COOKIE["user"];
    $updataip=$pdo->prepare("UPDATE information SET ip=? WHERE mail=?");
    $updataip->execute(array($ip,$mail));
    $search=$pdo->prepare("SELECT * FROM information WHERE mail=:mail");
    $search->bindValue(':mail', $_COOKIE['user'], PDO::PARAM_STR);
    $search->execute();
    $result=$search->fetch(PDO::FETCH_ASSOC);
    $username=$result['username'];
    $avatar=$result['img'];
    if (strlen($result['permission'])<=2)
    {
        $userid="uid:".$result['uuid'];
        $coin="银币:".$result['coin'];
    }
    else
    {
        $userid="cid:".$result['uuid'];
        $coin="没激活没得钱包哦~";
    }
}
else
{
    $username="未登录";
    $userid="";
    $coin="";
    $avatar='source/svg/stranger.svg';
}
?>