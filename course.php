<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
<link rel="shortcut icon" href="source/icon/logo.png">
<title>梅什号 | 航线</title>
<meta name="description" content="梅什号">
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
    min_height: 700,
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
  tinymce.init({
    selector: '#reply',
    language:'zh_CN',
    skin: 'tinymce-5',
    min_height: 400,
    max_height: 400,
    plugins: 'autosave preview searchreplace autolink directionality visualblocks visualchars fullscreen image link code codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount emoticons indent2em autoresize importword ruby',
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
<div class="whole">
  
<div>
  <img class="blank1" src="source/icon/blank.png" width="44" height="44">
  <div class="navbar">
    <img class="blank0" src="source/icon/blank.png" width="44px" height="30">
    <a class="navbarbotton" href="index.php">甲板</a>
    <a class="navbarbotton" href="course.php">海图</a>
    <a class="navbarbotton" href="forum.php">酒馆</a>
    <a class="navbarbotton" href="user.php" style="float:right;">吊床</a>
  </div>
</div>
<div class="row">
  <img class="blank1" src="source/icon/blank.png" width="44" height="1000">
  <div class="main">
    <div class="tips">
      <?php
      switch (isset($_GET['uid'])-isset($_GET['link']))
      {
        case "-1":/*功能页面 */
          switch ($_GET['link'])
          {
            case "create":/**新建教程 */
              if (isset($_COOKIE["user"]))
              {
                $mail=$_COOKIE["user"];
                include 'mysql.php';
                $search = mysqli_query($conn,"SELECT * FROM information
                WHERE mail='$mail'");
                $data = mysqli_fetch_assoc($search);
                $_SESSION['name']=$data['username'];
                $_SESSION['mail']=$mail;
                mysqli_close($conn);
              }
              else
              {
                header("location:user.php?link=login");
              }
              echo '<form class="headline" method="post" action="course.php">
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
              <br>';
              break;
          }
          break;
        case "1":/*教程详情 */
          echo '<div class="headline" style="margin:auto;">
                  <a href="course" class="mainbotton" style="text-decoration:none;">返回</a>
                </div>
                <div class="blankdiv"><h9>666</h9></div>';
          $uid=$_GET['uid'];
          include 'mysql.php';
          $result=mysqli_query($conn,"SELECT * FROM courselist
          WHERE uid='$uid'");
          $course = mysqli_fetch_assoc($result);
          echo '<div class="headline"><h1 style="text-align: center">' . $course['title'] .'</h1><br>' . $course['detail'] . '<br></div><div class="blankdiv"><h9>666</h9></div>';
          if (isset($_COOKIE["user"]))
          {
            $mail=$_COOKIE["user"];
            include 'mysql.php';
            $search = mysqli_query($conn,"SELECT * FROM information
            WHERE mail='$mail'");
            $data = mysqli_fetch_assoc($search);
            $_SESSION['name']=$data['username'];
            $_SESSION['mail']=$mail;
            mysqli_close($conn);
            echo '<form class="headline" method="post" action="reply">
              <h2 style="text-align: center">发布评论</h2>
              <textarea id="reply" name="reply"></textarea>
              <br>
              <input type="submit" value="发布" class="clickbotton" style="margin:auto;text-align: center">
              <br><br>
            </form>';
          }
          break;
        case "0":
          if (isset($_POST["detail"]) or isset($course['title']))/**提交验证 */
          {
            echo '<h1 style="text-align: center">提示</h1>';
            $title=$_POST['title'];
            $detail=$_POST['detail'];
            $start=0;
            if (strlen($detail)>1 and strlen($title)>1)
            {
                $code=Mt_rand (1001,9999);
                $expire=time()+60*10;
                setcookie("submitcode", "submitkey", $expire);
                echo '
                <a class=login style="height:370px;text-decoration:none">
                <h1 style="color:rgb(215, 215, 215)"><br><br>请输入验证码<br>（可能会出现在垃圾箱里）</h1><br>
                <form target="_blank" method="post" action="testfor.php?link=course">
                <input type="text" name="submitkey" class="import"   style="width:213px;">
                <input type="submit" class="clickbotton" style="text-decoration:none;border:0;" name="$code" value="确定">
                </form><br></a>';
                $mail=$_SESSION['mail'];
                $to = "$mail";
                $subject = "梅什号提交新航线验证码";
                $message = "$code" . "<br>有效期十分钟";
                $from = "bt233.top";
                $headers = "From:" . $from;
                mail($to,$subject,$message,$headers);
                $_SESSION['submitcode']=$code;
                $_SESSION['submittitle']=$title;
                $_SESSION['submitdetail']=$detail;
            }
            else
            {
                echo '<br><a class=login style="height:370px;text-decoration:none" href="javascript:history.go(-1);"><h1 style="color:rgb(215, 215, 215)"><br><br>好歹写个666吧<br><br><svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
            </svg><br></h1></a>';
            }
          }
          else
          {/**教程列表 */
            echo '<h1 style="text-align: center">航线</h1>
                <div class="headline" style="margin:auto;text-align: center;">
                    <h2 style="text-align: center">目前暂无分类，你可以检索关键词</h2>
                    <hr>
                    <input type="text" name="title" class="import">
                    <input type="submit" value="搜索" class="clickbotton">
                  </div>
                  <a href="course.php?link=create" class="floatbotton"><svg width="70%" style="margin-top:6px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path d="M457.01 344.42c-25.05 20.33-52.63 37.18-82.54 49.05l54.38 94.19 53.95 23.04c9.81 4.19 20.89-2.21 22.17-12.8l7.02-58.25-54.98-95.23zm42.49-94.56c4.86-7.67 1.89-17.99-6.05-22.39l-28.07-15.57c-7.48-4.15-16.61-1.46-21.26 5.72C403.01 281.15 332.25 320 256 320c-23.93 0-47.23-4.25-69.41-11.53l67.36-116.68c.7.02 1.34.21 2.04.21s1.35-.19 2.04-.21l51.09 88.5c31.23-8.96 59.56-25.75 82.61-48.92l-51.79-89.71C347.39 128.03 352 112.63 352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96c0 16.63 4.61 32.03 12.05 45.66l-68.3 118.31c-12.55-11.61-23.96-24.59-33.68-39-4.79-7.1-13.97-9.62-21.38-5.33l-27.75 16.07c-7.85 4.54-10.63 14.9-5.64 22.47 15.57 23.64 34.69 44.21 55.98 62.02L0 439.66l7.02 58.25c1.28 10.59 12.36 16.99 22.17 12.8l53.95-23.04 70.8-122.63C186.13 377.28 220.62 384 256 384c99.05 0 190.88-51.01 243.5-134.14zM256 64c17.67 0 32 14.33 32 32s-14.33 32-32 32-32-14.33-32-32 14.33-32 32-32z"></path>
                </svg><span class="noticetext">绘制新航线</span></a>';
            include 'mysql.php';
            $count=mysqli_query($conn,"SELECT * FROM count
            WHERE sort='1'");
            $count = mysqli_fetch_assoc($count);
            $uid=$count['course']-1;
            for ($uid;$uid>0;$uid--)
            {
              $result=mysqli_query($conn,"SELECT * FROM courselist
              WHERE uid='$uid'");
              $course = mysqli_fetch_assoc($result);
              if ($course['exist']==1)
              {
                echo '<div class="blankdiv"><h9>666</h9></div><a class="headline" href="course.php?uid=' . $course['uid'] . '" style="text-decoration:none"><div class="detail"><h2>' . $course['title'] .'</h2><hr style="color:white;text-decoration:none;">' . $course['detail'] . '</div><div class="blankdiv"><h9>666</h9></div></a>';
              }
            }
          }
          break;
      }
      ?>
    </div>
  </div>
</div>
<div class="footer">
  <h2>敬请期待</h2>
</div>
</div>
<?php
readfile("source/menus.html");
?>
</body>
</html>