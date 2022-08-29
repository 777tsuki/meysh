<?php
session_start();
include '../mysql.php';
include 'php/information.php';
include 'view/table.php';
if (isset($_POST['link']))
{
    $detect=get_headers($_POST['link']);
    $type=substr($_POST['link'],-4);
    if ($detect==false)
    {
        $_SESSION['changeavatar']="sb";
    }
    else
    {
        if (in_array($type,array('.jpg','.png','jpeg','webp')))
        {
            $updata=$pdo->prepare("UPDATE information SET img=? WHERE mail=?");
            $updata->execute(array($_POST['link'],$mail));
        }
        else
        {
            $_SESSION['changeavatar']="nt";
        }
    }
    header("location:user#admin");
}
switch ($_GET['action'])
{
    case "login":
        include 'php/login.php';
        break;
    case "register":
        include 'php/register.php';
        break;
    case "forgetpassword":
        include 'php/forgetpassword.php';
        break;
    case "active":
        include 'php/active.php';
        break;
    case "verify":
        include 'php/verify.php';
        break;
    case "setpassword":
        include 'php/setpassword.php';
        break;
    case "setusername":
        include 'php/setusername.php';
        break;
}
$main='<img class="blank1" src="source/img/blank.png" width="44" height="700"><div class="tips">'.$main.'</div>';
$page="事务处";
include 'view/frame.php';
?>