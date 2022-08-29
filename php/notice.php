<img class="blank1" src="source/img/blank.png" width="44" height="700">
<div class="tips">
<?php
if (isset($_GET['uid']))
{
    $search=$pdo->prepare("SELECT * FROM notice WHERE uid=:uid");
    $search->bindValue(':uid', $_GET['uid'], PDO::PARAM_STR);
    $search->execute();
    $result=$search->fetch(PDO::FETCH_ASSOC);
    $num=0;
    include 'view/notice.php';
}
else
{
    $getid=$pdo->prepare("SELECT * FROM count WHERE sort=:sort");
    $getid->bindValue(':sort', 1, PDO::PARAM_STR);
    $getid->execute();
    $row=$getid->fetch(PDO::FETCH_ASSOC);
    $uid=$row['notice'];
    while ($uid>=1)
    {
        $search=$pdo->prepare("SELECT * FROM notice WHERE uid=:uid");
        $search->bindValue(':uid', $uid, PDO::PARAM_STR);
        $search->execute();
        $result=$search->fetch(PDO::FETCH_ASSOC);
        include 'view/noticelist.php';
        $uid--;
    }
}
?>
</div>