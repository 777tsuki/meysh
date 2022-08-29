<?php
include 'view/table.php';
switch (isset($_GET["link"])+isset($_GET["uuid"])*2+isset($_GET["function"])*4)
{
    case "0":
        if (isset($_COOKIE["user"]))
        {
            if ($_SESSION['changeavatar']=="sb")
            {
                echo '<script type="text/javascript">alert("图片路径错误");</script>';
                unset($_SESSION['changeavatar']);
            }
            elseif ($_SESSION['changeavatar']=="nt")
            {
                echo '<script type="text/javascript">alert("图片类型错误");</script>';
                unset($_SESSION['changeavatar']);
            }
            $admin=file_get_contents("view/admin.php");
            if ($result['permission']==0)
            {

            }
            include 'view/usertable.php';
        }
        else
        {
            header("location:user?link=login");
        }
        break;
    case "1":
        switch ($_GET["link"])
        {
            case "login":
                $main= $login;
                break;
            case "register":
                $main= $register;
                break;
            case "forgetpassword":
                $main= $forgetpassword;
                break;
        }
        echo '<img class="blank1" src="source/img/blank.png" width="44" height="700"><div class="tips">'.$main.'</div>';
        break;
    case "2":
        break;
    default:
        header("location:error");
}
?>