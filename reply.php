<?php
session_start();
if (isset($_GET["uid"]))
{

}
else
{
    if (isset($_POST["reply"]))
    {
        $_SESSION['name']=$name;
    }
}
?>