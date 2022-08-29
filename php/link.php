<?php
include 'view/table.php';
if (strlen($_GET['target'])==72)
{
    $detect = $pdo->prepare("SELECT * FROM loser WHERE link=:link");
    $detect->bindValue(':link', $_GET['target'], PDO::PARAM_STR);
    $detect->execute();
    $result = $detect->fetch(PDO::FETCH_ASSOC);
    if (!isset($result['mail']))
    {
        header("location:error");
    }
    elseif (strtotime("now")>$result['time'])
    {
        $main= $outdated;
        $delete= $pdo->prepare("DELETE FROM loser WHERE link=:link");
        $delete->bindValue(':link', $_GET['target'], PDO::PARAM_STR);
        $delete->execute();
    }
    else
    {
        $_SESSION['link']=$_GET['target'];
        $main= $verify;
    }
}
elseif (strlen($_GET['target'])==36)
{
    $page="验证账号";
    $detect = $pdo->prepare("SELECT * FROM information WHERE permission=:permission");
    $detect->bindValue(':permission', $_GET['target'], PDO::PARAM_STR);
    $detect->execute();
    $result = $detect->fetch(PDO::FETCH_ASSOC);
    if ($result['mail']!=null)
    {
        $_SESSION['link']=$_GET['target'];
        $main= $active;
    }
    else
    {
        header("location:error");
    }
}
echo '<img class="blank1" src="source/img/blank.png" width="44" height="700"><div class="tips">'.$main.'</div>'
?>