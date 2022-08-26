<?php
$page="激活临时账号";
$mail=$_POST['mail'];
$password=$_POST['password'];
$start=0;
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
{
    $main= $mailerror;
}
else
{
    $start++;
}
$length=strlen($password);
if ($length<6 or $length>16)
{
    $main= $lengtherror;
}
else
{
    $start++;
}
if ($start==2)
{
    include 'mysql.php';
    $detect = $pdo->prepare("SELECT * FROM preuser WHERE mail=:mail");
    $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
    $detect->execute();
    $result = $detect->fetch(PDO::FETCH_ASSOC);
    if (isset($result))
    {
    $hashcode=$result['hashcode'];
    if (password_verify($password, $hashcode) and $result['link']==$_SESSION['link'])
    {
        $main= $activesuccess;
        $_SESSION['activemail']=$mail;
        $_SESSION['hashcode']=$hashcode;
    }
    else
    {
        $main= $loginfail;
    }
    }
    else
    {
    $main= $mailnofound;
    }
}
?>