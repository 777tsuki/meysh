<img class="blank1" src="source/img/blank.png" width="44" height="1100">
<img class="avatar" style="float:left;width:180px;height:180px;position:absolute;margin:50px auto;left:44px;right:0;" src="<?php echo $avatar?>">
<div class="tips" style="top:380px">
    <div class="headline" style="padding:10px 0;display:flex;width:390px;height:80px;position:absolute;left:0;right:0;top:-100px;">
        <a style="font-size:18px;width:130px;height:60px;margin:0;border-style:none;border-right:1px solid #a5a5a5;text-align:center;"><p style="font-size:32px;margin:0;">0</p>话题</a>
        <a style="font-size:18px;width:130px;height:60px;margin:0;border-style:none;border-right:2px solid #a5a5a5;border-left:2px solid #a5a5a5;text-align:center;"><p style="font-size:32px;margin:0;">0</p>关注</a>
        <a style="font-size:18px;width:130px;height:60px;margin:0;border-style:none;border-left:1px solid #a5a5a5;text-align:center;"><p style="font-size:32px;margin:0;">0</p>粉丝</a>
    </div>
    <div class="headline" style="padding:0;display:flex;justify-content:space-around">
        <a href="#message" class="abutton">消息</a>
        <a href="#collection" class="abutton">收藏</a>
        <a href="#item" class="abutton">物品</a>
        <a href="#admin" class="abutton">管理</a>
    </div>
    <div id="app"></div>
</div>
<script>
    function hashChange(e){
        let app = document.getElementById('app')
        switch (location.hash) {
            case '#message':
                app.innerHTML = "<?php echo 6666?>"
                break
            case '#collection':
                app.innerHTML = '<?php echo 111?>'
                break
            case '#item':
                app.innerHTML = '<?php echo 222?>'
                break
            case '#admin':
                app.innerHTML = '<?php echo $admin;?>'
                break
            default:
                app.innerHTML = "<?php echo 6666?>"
        }
    }
    window.onhashchange = hashChange
    hashChange()
</script>
<script>
  function fuckyouletmeoutoftheship()
  {
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
    location.replace("user")
  }
  function changeavatar()
  {
    var imgurl = document.forms["avatar"]["link"].value;
    var result = new Promise(function(resolve, reject) {
            var ImgObj = new Image(); //判断图片是否存在
            ImgObj.src = imgurl;
            ImgObj.onload = function(res) {
                resolve(res);
            }
            ImgObj.onerror = function(err) {
                reject(err)
            }
        }).catch((e) => {});
  }
</script>
