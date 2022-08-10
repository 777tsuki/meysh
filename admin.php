<!DOCTYPE html>
<?php
      if (isset($_POST['exitlogin']))
      {
        header("location:user?link=login");
        setcookie("user", $_COOKIE["user"], time()-60*60*24*30);
      }
      if (isset($_POST['forget']))
      {
        header("location:user?link=forgetpassword");
      }
      ?>
<html>
<head>
<link rel="shortcut icon" href="source/icon/logo.png">
<title>BTの窝 | 首页</title>
<meta name="description" content="BTの窝">
<meta name="keywords" content="nothing">
<meta name="author" content="和祯_BT">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="source/index.css">
<link rel="stylesheet" type="text/css" href="source/menus.css">
<script src='source/tinymce/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
    language:'zh_CN',
    skin: 'tinymce-5',
    min_height: 600,
    max_height: 800,
    plugins: 'autosave preview searchreplace autolink directionality visualblocks visualchars fullscreen image link code codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount emoticons indent2em autoresize importword ruby',
    toolbar: 'code undo redo | cut copy paste pastetext | fullscreen | forecolor backcolor bold italic underline strikethrough link anchor | alignleft aligncenter alignright alignjustify outdent indent | \
     styleselect formatselect fontselect fontsizeselect | bullist numlist | ruby blockquote subscript superscript removeformat | \
      table image charmap hr pagebreak | indent2em lineheight importword',
    toolbar_mode : 'wrap',
    fontsize_formats: "12px 14px 16px 18px 24px 36px 48px 56px 72px",
    font_formats: '微软雅黑=Microsoft YaHei,Helvetica   Neue,PingFang SC,sans-serif;苹果苹方=PingFang SC,Microsoft YaHei,sans-serif;宋体=simsun,serif;仿宋体=FangSong,serif;黑体=SimHei,sans-serif;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats;知乎配置=BlinkMacSystemFont, Helvetica Neue, PingFang SC, Microsoft YaHei, Source Han Sans SC, Noto Sans CJK SC, WenQuanYi Micro Hei, sans-serif;小米配置=Helvetica Neue,Helvetica,Arial,Microsoft Yahei,Hiragino Sans GB,Heiti SC,WenQuanYi Micro Hei,sans-serif',
    branding: false,
    placeholder: '在这里输入内容',
    autosave_interval: "180s",//自动保存时间间隔
    autosave_restore_when_empty: true,
    autosave_retention: "1440m",//草稿过期时间
    charmap: [//特殊字符
        [0x2615, 'morning coffee'],
        [0x2600, 'sun'],
        [0x2601, 'cloud'],
    ],
    pagebreak_split_block: true,//插入时拆分块元素
  });
</script>
</head>
<body>
  <?php
  if (isset($_COOKIE["user"]))
  {
    $mail=$_COOKIE["user"];
    include 'mysql.php';
    $search = mysqli_query($conn,"SELECT * FROM information
    WHERE mail='$mail'");
    $data = mysqli_fetch_assoc($search);
    session_start();
    $_SESSION['name']=$data['username'];
    $_SESSION['mail']=$mail;
    mysqli_close($conn);
  }
  else
  {
    header("location:login.php");
  }
  readfile("source/menus.html");
  ?>
<div class="whole">
  
<div>
  <img class="blank1" src="source/icon/blank.png" width="44" height="44">
  <div class="navbar">
    <img class="blank0" src="source/icon/blank.png" width="44px" height="30">
    <a class="navbarbotton" href="index.php">船员</a>
    <a class="navbarbotton" href="content.php">权限</a>
    <a class="navbarbotton" href="forum.php">方向</a>
    <a class="navbarbotton" href="user.php" style="float:right;">吊床</a>
  </div>
</div>
<div class="row">
  <img class="blank1" src="source/icon/blank.png" width="44" height="800px">
  <div class="main">
    <div class="tips">
      <form class="headline" method="post" >
        <input type="submit" class="mainbotton" style="text-decoration:none;border:0;" name="exitlogin" value="下船">
        <input type="submit" class="mainbotton" style="text-decoration:none;border:0;" name="forget" value="修改密码">
      </form>
      <div class="blankdiv"><h9>666</h9></div>
      <form target="_blank" class="headline" method="post" action="submit.php">
        <br>&ensp;
        <svg width="22px" style="fill:rgb(215, 215, 215)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M457.01 344.42c-25.05 20.33-52.63 37.18-82.54 49.05l54.38 94.19 53.95 23.04c9.81 4.19 20.89-2.21 22.17-12.8l7.02-58.25-54.98-95.23zm42.49-94.56c4.86-7.67 1.89-17.99-6.05-22.39l-28.07-15.57c-7.48-4.15-16.61-1.46-21.26 5.72C403.01 281.15 332.25 320 256 320c-23.93 0-47.23-4.25-69.41-11.53l67.36-116.68c.7.02 1.34.21 2.04.21s1.35-.19 2.04-.21l51.09 88.5c31.23-8.96 59.56-25.75 82.61-48.92l-51.79-89.71C347.39 128.03 352 112.63 352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96c0 16.63 4.61 32.03 12.05 45.66l-68.3 118.31c-12.55-11.61-23.96-24.59-33.68-39-4.79-7.1-13.97-9.62-21.38-5.33l-27.75 16.07c-7.85 4.54-10.63 14.9-5.64 22.47 15.57 23.64 34.69 44.21 55.98 62.02L0 439.66l7.02 58.25c1.28 10.59 12.36 16.99 22.17 12.8l53.95-23.04 70.8-122.63C186.13 377.28 220.62 384 256 384c99.05 0 190.88-51.01 243.5-134.14zM256 64c17.67 0 32 14.33 32 32s-14.33 32-32 32-32-14.33-32-32 14.33-32 32-32z"></path>
        </svg>
        <b style="font-size:30px;color:rgb(215, 215, 215)">绘制新航线&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</b>
        <a style="font-size:24px;color:rgb(215, 215, 215)">&ensp;标题&ensp;</a><input type="text" name="title" class="import">
        <hr>
        <textarea id="mytextarea" name="detail"></textarea>
        <br>
        <input type="submit" value="提交" class="clickbotton">
        <br><p></p>
      </form>
      <br>
    </div>
  </div>
</div>
<div class="footer">
  <h2>敬请期待</h2>
</div>
</div>

</body>
</html>
