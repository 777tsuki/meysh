<div class="tips">
    <img class="headline" src="source/img/base/meysh.webp" style="width:60%;padding:0;"></a>
    <div class="headline" style="float:right;width:37.9%;height:517.5px">
    <a href="user"><img src="<?php echo $avatar?>" class="avatar"></a>
    <div style="height:160px;overflow:hidden">
        <b style="width:200px;text-align:left;float:right;font-size:24px;color:rgb(80,80,80);margin:30px 10px 0px 0px"><?php echo $username?></b>
        <a style="width:200px;text-align:left;float:right;font-size:18px;color:rgb(80,80,80);margin:4px 10px 0px 0px"><?php echo $userid?></a>
        <a style="width:200px;text-align:left;float:right;font-size:18px;color:rgb(80,80,80);margin:4px 10px 0px 0px"><?php echo $coin?></a>
    </div>
    <hr size="2" noshade="noshade" color="#a5a5a5"/>
    <div class="messagebox">
        <p style="width:200px;font-size:30px;margin:120px auto;text-align:center;">暂无新消息</p>
    </div>
    </div>
    <div class="headline" style="width:49%;height:400px;"><a class="more" href="notice"><span>更多</span></a><b style="padding-bottom:10px;margin:10px 0px 0px 0px;border-style:none;border-bottom:2px solid #6b6b6b;">最新公告</b>
        <div>
            <?php notice()?>
        </div>
    </div>
    <div class="headline" style="float:right;width:49%;height:400px;"><a class="more" href="forum"><span>更多</span></a><b>最新话题</b>
    
    </div>
</div>