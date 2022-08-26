<?php 
function message()
{
    echo 666;
}
?>
<img class="avatar" style="float:left;width:180px;height:180px;position:absolute;margin:40px auto;left:44px;right:0;" src="<?php echo $avatar?>">
<div class="tips" style="left:0px;top:300px">
    <div class="headline" style="padding:0;display:flex;justify-content:space-around">
        <a href="#" class="abutton">消息</a>
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
            case '#collection':
                app.innerHTML = '<?php echo 111?>'
                break
            case '#item':
                app.innerHTML = '<?php echo 222?>'
                break
            case '#admin':
                app.innerHTML = '<?php echo 333?>'
                break
            default:
                app.innerHTML = "<?php message()?>"
        }
    }
    window.onhashchange = hashChange
    hashChange()
</script>