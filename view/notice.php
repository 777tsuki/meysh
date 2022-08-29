<script src='source/tinymce/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#reply',
        language:'zh_CN',
        skin: 'tinymce-5',
        min_height: 400,
        max_height: 400,
        plugins: 'autolink directionality visualblocks visualchars image link charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount emoticons indent2em autoresize ruby',
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
<a class="other" href="notice" style="margin:8px auto;padding:0px;width:100px;"><h2 style="margin:10px 0px">返回</h2></a>
<div class="headline" style="padding:5px 40px 30px 40px;">
    <a style="float:right;margin: 34px 0px 0px 0px;"><?php echo $result['time']?></a>
    <h1 style="margin:10px 0px;"><?php echo $result['title']?></h1>
    <hr size="2" noshade="noshade" color="#a5a5a5"/>
    <?php echo $result['detail']?>
</div>
<a class="other" href="#reply" style="margin:8px auto;padding:0px;width:140px;"><h2 style="margin:10px 0px">评论(<?php echo $num?>)</h2></a>
<form id="form" class="headline" style="padding:20px 20px;" action="function.php?action=reply">
    <h2 style="margin:10px 0px"></h2>
    <textarea id="reply" name="replynotice"></textarea>
    <input type="submit" value="NEXT" class="clickbotton">
</form>