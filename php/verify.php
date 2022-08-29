<?php
$detect = $pdo->prepare("SELECT * FROM loser WHERE link=:link");
$detect->bindValue(':link', $_SESSION["link"], PDO::PARAM_STR);
$detect->execute();
$result = $detect->fetch(PDO::FETCH_ASSOC);
if ($result['mail']!=$_POST['mail'])
{
    $main= $mailnofound;
}
elseif ($result['code']!=$_POST['code'])
{
    $main= $codeerror;
}
else
{
    $main= $setpassword;
    $_SESSION['themail']=$_POST['mail'];
}
?>