<?php
$mail=$_POST['mail'];
$password=$_POST['password'];
$length=strlen($password);
$start=0;
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
{
    $main= $mailerror;
}
elseif ($length<6 or $length>16)
{
    $main= $lengtherror;
}
else
{
    $start++;
}
if ($start==1)
{
    $detect = $pdo->prepare("SELECT * FROM information WHERE mail=:mail");
    $detect->bindValue(':mail', $mail, PDO::PARAM_STR);
    $detect->execute();
    $result = $detect->fetch(PDO::FETCH_ASSOC);
    if (isset($result['hashcode']))
    {
        $hashcode=$result['hashcode'];
        if (password_verify($password, $hashcode) and $result['permission']==$_SESSION['link'])
        {
            $main= $activesuccess;
            $_SESSION['activemail']=$mail;
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