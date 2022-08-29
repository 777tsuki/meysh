<a href="notice/<?php echo $uid?>" style="text-decoration:none;color:rgb(80,80,80)">
<div class="headline" style="padding:10px 40px 10px 10px;">
    <div style="margin:0;padding:10px 20px;float:left;width:250px;">
        <img src="<?php echo $result['img']?>" style="margin:10px auto;float:left;max-height:160px;max-width:200px">
    </div>
    <div style="text-align:left">
        <b style="font-size:30px;"><?php echo $result['title']?>&ensp;<span style="font-weight:normal;font-size:18px"><?php echo $result['time']?></span></b>
        <hr size="2" noshade="noshade" color="#a5a5a5"/>
        <a style="font-size:18px;"><?php echo $result['descript']?></a>
    </div>
</div>
</a>