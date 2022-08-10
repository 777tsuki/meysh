<div class="row">
<img class="blank1" src="source/icon/blank.png" width="44" height="700">
  <div class="main" style="width:100%;height:100%;min-height:800px">
    <h1 style="text-align: center">提示</h1>
    <?php
    $mail=$_POST['mail'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    $name=$_POST['username'];
    $start=0;
    if ($password === $repassword)
    {
      $start++;
    }
    else
    {
      echo '<a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>两次密码不一样，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
    </svg><br></h1></a>';
    }
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail)) 
    {
      echo '<br><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱格式错了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
    </svg><br></h1></a>';
    }
    else
    {
      $start++;
    }
    $length=strlen($password);
    if ($length<6 or $length>16)
    {
      echo '<br><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>密码长度为6-16，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
    </svg><br></h1></a>';
    }
    else
    {
      $start++;
    }
    if ($start==3)
    {
      $servername="localhost";
      $username="root";
      $userpassword="bt233";
      $dbname = "user";
      $conn = mysqli_connect($servername, $username, $userpassword,$dbname);
      $testfor = mysqli_query($conn,"SELECT * FROM information
      WHERE mail='$mail'");
      $test = mysqli_fetch_assoc($testfor);
      if ($test)
      {
        echo '<a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>该邮箱被注册了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
        </svg><br></h1></a>';
      }
      else
      {
        $code=Mt_rand (1001,9999);
        $expire=time()+60*10;
        setcookie("code", "imagekey", $expire);
        echo '
        <a class=login style="height:370px;text-decoration:none">
        <h1 style="color:rgb(215, 215, 215)"><br><br>请输入验证码<br>（可能会出现在垃圾箱里）</h1><br>
        <form target="_blank" method="post" action="testforcode.php">
        <input type="text" name="inputkey" class="import"   style="width:213px;">
        <input type="submit" class="clickbotton" style="text-decoration:none;border:0;" name="$code" value="确定">
        </form><br></a>';
        $to = "$mail";
        $subject = "BTの窝注册验证码";
        $message = "$code" . "<br>有效期十分钟";
        $from = "bt233.top";
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        session_start();
        $_SESSION['registermail']=$mail;
        $_SESSION['registerpassword']=$password;
        $_SESSION['registercode']=$code;
        $_SESSION['registername']=$name;
      }
      mysqli_close($conn);
    }
    ?>
  </div>
</div>