
    <?php
    $mail=$_COOKIE["user"];
    $servername="localhost";
    $username="root";
    $userpassword="bt233";
    $dbname = "user";
    $conn = mysqli_connect($servername, $username, $userpassword,$dbname);
    $search = mysqli_query($conn,"SELECT * FROM information
    WHERE mail='$mail'");
    $data = mysqli_fetch_assoc($search);
    mysqli_close($conn);
    echo '<h1 style="text-align: center">Welcome!&ensp;' . $data['username'] . '</h1>';
    ?>
    <div class="tips" id="output">
      <div class="headlineleft"><a class="mainbotton">动态</a><a class="mainbotton">更新</a><br><br><br><hr/></div><p class="blankp"></p>
      <div class="headlineright"><a class="mainbotton">回复</a><a class="mainbotton">通知</a><br><br><br><hr/></div>
      <div class="blankdiv"><h9>666</h9></div>
      
      <div class="headline"><h2>相关链接</h2><hr/><a href="https://masiro.me/" target="_blank"><img src="https://www.masiro.me/masiroImg/logo-small.ico" width="40px"><p></p></a></div>
    </div>
