<?php
#菜单
$normalmenu='<div>
<img class="blank1" src="source/icon/blank.png" width="44" height="44">
<div class="navbar">
  <a class="navbarbotton" href="index.php">甲板</a>
  <a class="navbarbotton" href="course.php">海图</a>
  <a class="navbarbotton" href="forum.php">酒馆</a>
  <a class="navbarbotton" href="user.php" style="float:right;">吊床</a>
</div>
</div>';
$usermenu='<div>
<img class="blank1" src="source/icon/blank.png" width="44" height="44">
<div class="navbar">
  <img class="blank0" src="source/icon/blank.png" width="44px" height="30">
  <a class="navbarbotton" onclick="output()">消息</a>
  <a class="navbarbotton" onclick="input()">关注</a>
  <a class="navbarbotton" onclick="style()">仪表</a>
  <a class="navbarbotton" href="admin.php" style="float:right;">管理</a>
</div>
</div>';
#功能界面
$forgetcode='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1>
<a class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>请输入验证码<br>（可能会出现在垃圾箱里）</h1><br><form target="_blank" method="post" action="function.php?link=forgetpassword"><input type="text" name="inputkey" class="import"   style="width:213px;">
<input type="submit" class="clickbotton" style="text-decoration:none;border:0;" value="确定">
</form><br></a>';
$activesuccess='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1>
<a class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>报上你的名字<br>（不要太长太短太奇怪哦）</h1><br><form target="_blank" method="post" action="function.php?link=setusername"><input type="text" name="inputname" class="import"   style="width:213px;">
<input type="submit" class="clickbotton" style="text-decoration:none;border:0;" value="确定">
</form><br></a>';
$active='<h1 style="text-align: center;color:rgb(80, 80, 80)">梅什号</h1>
<form class="login" action="function.php?link=active" method="post">
  <h2>激活</h2><hr/><br>
  <a>邮箱  </a><input type="text" name="mail" class="import"><br><br>
  <a>密码  </a><input type="password" name="password" class="import"><br><br>
  <input type="submit" value="LOGIN" class="clickbotton"><p></p>
</form>';
$login='<h1 style="text-align: center;color:rgb(80, 80, 80)">梅什号</h1>
<form class="login" action="user.php?function=login" method="post">
  <h2>登录</h2><hr/><br>
  <a>邮箱  </a><input type="text" name="mail" class="import"><br><br>
  <a>密码  </a><input type="password" name="password" class="import"><br><br>
  <input type="submit" value="LOGIN" class="clickbotton"><p></p>
</form><br>
<div class="others">
  <a class="otherleft" href="../../user.php?link=forgetpassword" style="text-decoration:none;"><h2>忘记密码</h2></a>
  <a class="otherright" href="../../user.php?link=register" style="text-decoration:none;"><h2>注册</h2></a>
</div>';
$register='<h1 style="text-align: center;color:rgb(80, 80, 80)">梅什号</h1>
<form class="login" action="user.php?function=register" method="post">
  <h2>注册</h2><hr/><br>
  <a>你的邮箱  </a><input type="text" name="registermail" class="import" style="width:300px"><br><br>
  <a>你的密码  </a><input type="password" name="password" class="import" style="width:300px"><br><br>
  <a>重复密码  </a><input type="password" name="repassword" class="import" style="width:300px"><br><br>
  <input type="submit" value="REGISTER" class="clickbotton"><p></p>
</form><br>
<div class="others">
  <a class="otherleft" href="../../user.php?link=forgetpassword" style="text-decoration:none;"><h2>忘记密码</h2></a>
  <a class="otherright" href="../../user.php?link=login" style="text-decoration:none;"><h2>登录</h2></a>
</div>';
$forgetpassword='<h1 style="text-align: center;color:rgb(80, 80, 80)">梅什号</h1>
<form class="login" action="user.php?function=forgetpassword" method="post">
  <h2>设置新密码</h2><hr/><br>
  <a>你的邮箱  </a><input type="text" name="mail" class="import" style="width:300px"><br><br>
  <a>新的密码  </a><input type="password" name="password" class="import" style="width:300px"><br><br>
  <a>重复密码  </a><input type="password" name="repassword" class="import" style="width:300px"><br><br>
  <input type="submit" value="确定" class="clickbotton"><p></p>
</form><br>
<div class="others">
  <a class="otherleft" href="../../user.php?link=login" style="text-decoration:none;"><h2>登录</h2></a>
  <a class="otherright" href="../../user.php?link=register" style="text-decoration:none;"><h2>注册</h2></a>
</div>';
#提示
$existmail='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>该邮箱被注册了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
</svg><br></h1></a>';
$existusername='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><a class=login style="height:370px;text-decoration:none" href="javascript:window.opener=null;window.close();"><h1 style="color:rgb(215, 215, 215)"><br><br>这个名字被用了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
</svg><br></h1></a>';
$registersuccess='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><br><a href="user.php" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>临时账号注册成功<br>可以到邮箱中激活<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path>
</svg><br></h1></a>';
$inconsistent='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>两次密码不一样，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
</svg><br></h1></a>';
$mailerror='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><br><a href="javascript:history.go(-1);" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱格式错了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
</svg><br></h1></a>';
$lengtherror='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><br><a href="javascript:history.go(-1);" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>密码长度为6-16，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
</svg><br></h1></a>';
$namelengtherror='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><br><a href="javascript:window.opener=null;window.close();" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>名字长度太奇怪了，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
</svg><br></h1></a>';
$loginsuccess='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><br><a href="user.php" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>登录成功<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path>
</svg><br></h1></a>';
$loginfail='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><br><a href="javascript:history.go(-1);" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱或密码错误<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
</svg><br></h1></a>';
$mailnofound='<h1 style="text-align: center;color:rgb(80, 80, 80);">提示</h1><br><a href="javascript:history.go(-1);" class=login style="height:370px;text-decoration:none"><h1 style="color:rgb(215, 215, 215)"><br><br>邮箱不存在，小傻瓜<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
</svg><br></h1></a>';
?>