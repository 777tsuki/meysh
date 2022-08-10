<!DOCTYPE html>

<html>
<head>
<link rel="shortcut icon" href="source/icon/logo.png">
<title>BTの窝 | 注册</title>
<meta name="description" content="BTの窝">
<meta name="keywords" content="nothing">
<meta name="author" content="和祯_BT">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="source/index.css">
<link rel="stylesheet" type="text/css" href="source/menus.css">
</head>
<body>
<div class="row">
  <img class="blank1" src="source/icon/blank.png" width="44" height="700">
  <div class="main">
    <h1 style="text-align: center">提示</h1>
<?php
session_start();
if (isset($_GET["link"]))
{
  $type=$_GET["link"];
}
else
{
  $type="error";
}
switch ($type)
{
  case "register":
    if (!isset($_SESSION['registermail']))
    {
        echo '<a class=login style="height:370px;text-decoration:none" href="index.php"><h1 style="color:rgb(215, 215, 215)"><br><br>Serious?<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
    }
    else
    {
    if (!isset($_COOKIE["code"]))
    {
        echo '<a class=login style="height:370px;text-decoration:none" href="register.php"><h1 style="color:rgb(215, 215, 215)"><br><br>验证码过期啦，重新注册吧<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
    }
    else
    {
        $key=$_POST["inputkey"];
        $code=$_SESSION['registercode'];
        if ($code==$key)
        {
            $mail=$_SESSION['registermail'];
            $password=$_SESSION['registerpassword'];
            $name=$_SESSION['registername'];
            setcookie("code", "imagekey", time()-60*10);
            $servername="localhost";
            $username="root";
            $userpassword="bt233";
            $dbname = "user";
            $conn = mysqli_connect($servername, $username, $userpassword,$dbname);
            $hashcode=password_hash("$password", PASSWORD_DEFAULT);
            $result = mysqli_query($conn,"SELECT * FROM count
            WHERE sort='1'");
            $row = mysqli_fetch_assoc($result);
            $user="$row[user]";
            $sql = "INSERT INTO information (uuid,mail,hashcode,username,permission)
            VALUES ('$user','$mail','$hashcode','$name','1')";
            if ($conn->query($sql) === TRUE) 
            {
              echo '<br><a href="login.php" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>注册成功<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path>
              </svg><br></h1></a>';
              mysqli_query($conn,"UPDATE count SET user=user+1 WHERE sort=1");
            } 
            else 
            {
              echo '<a class=login style="height:370px;text-decoration:none" href="index.php"><h1 style="color:rgb(215, 215, 215)"><br><br>由于未知原因炸掉了<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
              </svg><br></h1></div>';
            }
            mysqli_close($conn);
            unset($_SESSION['registermail']);
            unset($_SESSION['registerpassword']);
            unset($_SESSION['registercode']);
            unset($_SESSION['registername']);
        }
        else
        {
        echo '<a class=login style="height:370px;text-decoration:none" href="javascript:window.opener=null;window.close();"><h1 style="color:rgb(215, 215, 215)"><br><br>验证码输错了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
        }
    }
    }
    break;
  case "forgetpassword":
    if (!isset($_SESSION['forgetmail']))
    {
        echo '<a class=login style="height:370px;text-decoration:none" href="index.php"><h1 style="color:rgb(215, 215, 215)"><br><br>Serious?<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
    }
    else
    {
    if(!isset($_COOKIE['forgetcode']))
    {
        echo '<a class=login style="height:370px;text-decoration:none" href="forgetpassword.php"><h1 style="color:rgb(215, 215, 215)"><br><br>验证码过期啦，重新来吧<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
    }
    else
    {
        $key=$_POST["inputkey"];
        $code=$_SESSION['forgetcode'];
        if ($code==$key)
        {
            $mail=$_SESSION['forgetmail'];
            $password=$_SESSION['forgetpassword'];
            setcookie("forgetcode", "sbkey", time()-60*10);
            $servername="localhost";
            $username="root";
            $userpassword="bt233";
            $dbname = "user";
            $conn = mysqli_connect($servername, $username, $userpassword,$dbname);
            $hashcode=password_hash("$password", PASSWORD_DEFAULT);
            $search = mysqli_query($conn,"SELECT * FROM information
            WHERE mail='$mail'");
            $row = mysqli_fetch_assoc($search);
            echo "$row[uuid]";
            mysqli_query($conn,"UPDATE information SET hashcode='$hashcode'
            WHERE uuid=$row[uuid]");
            echo '<br><a href="login.php" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>新密码设置成功<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path>
            </svg><br></h1></a>';
            mysqli_close($conn);
            unset($_SESSION['forgetmail']);
            unset($_SESSION['forgetpassword']);
            unset($_SESSION['forgetcode']);
            if (isset($_COOKIE["user"]))
            {
                setcookie("user", $_COOKIE["user"], time()-60*60*24*30);
            }
        }
        else
        {
        echo '<a class=login style="height:370px;text-decoration:none" href="javascript:window.opener=null;window.close();"><h1 style="color:rgb(215, 215, 215)"><br><br>验证码输错了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
        }
    }
    }
    break;
  case "course":
    if (!isset($_SESSION['submitdetail']))
    {
        echo '<a class=login style="height:370px;text-decoration:none" href="index.php"><h1 style="color:rgb(215, 215, 215)"><br><br>Serious?<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
    }
    else
    {
    if (!isset($_COOKIE["submitcode"]))
    {
        echo '<a class=login style="height:370px;text-decoration:none" href="register.php"><h1 style="color:rgb(215, 215, 215)"><br><br>验证码过期啦，重新提交吧<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
    }
    else
    {
        $key=$_POST["submitkey"];
        $code=$_SESSION['submitcode'];
        if ($code==$key)
        {
            $author=$_SESSION['name'];
            $mail=$_SESSION['mail'];
            $title=$_SESSION['submittitle'];
            $detail=$_SESSION['submitdetail'];
            $time = date('Y-m-d H:i:s');
            setcookie("submitcode", "submitkey", time()-60*10);
            $servername="localhost";
            $username="root";
            $userpassword="bt233";
            $dbname = "user";
            $conn = mysqli_connect($servername, $username, $userpassword,$dbname);
            $switch=mysqli_query($conn,"SELECT * FROM count
            WHERE sort='2'");
            $course_switch = mysqli_fetch_assoc($switch);
            if ($course_switch['course']==0)
            {
              echo '<a class=login style="height:370px;text-decoration:none" href="index.php"><h1 style="color:rgb(215, 215, 215)"><br><br>发布通道已关闭<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
              </svg><br></h1></div>';
            }
            else
            {
              $result = mysqli_query($conn,"SELECT * FROM count
              WHERE sort='1'");
              $row = mysqli_fetch_assoc($result);
              $uuid="$row[course]";
              $sql = "INSERT INTO courselist (uid,title,author,time,detail,tag,exist)
              VALUES ('$uuid','$title','$author','$time','$detail','none','1')";
              if ($conn->query($sql) === TRUE) 
              {
                echo '<br><a href="course?uid=' . $uuid . '" class="login" style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>发布成功<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path>
                </svg><br></h1></a>';
                mysqli_query($conn,"UPDATE count SET course=course+1 WHERE sort=1");
              } 
              else 
              {
                echo '<a class="login" style="height:370px;text-decoration:none" href="index.php"><h1 style="color:rgb(215, 215, 215)"><br><br>由于未知原因炸掉了<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
                </svg><br></h1></div>';
              }
            }
            mysqli_close($conn);
            unset($_SESSION['submitcode']);
            unset($_SESSION['submittitle']);
            unset($_SESSION['submitdetail']);
        }
        else
        {
        echo '<a class="login" style="height:370px;text-decoration:none" href="javascript:window.opener=null;window.close();"><h1 style="color:rgb(215, 215, 215)"><br><br>验证码输错了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
        }
    }
    }
    break;
}
?>
  </div>
</div>
<?php
readfile("source/menus.html");
?>
</body>
</html>