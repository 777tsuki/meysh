<div id="loadingDiv" style="height:1024px;position:absolute;left:0;width:100%;top:0;background:#eaecfa;z-index:10000;"><div id="loader" class="loader">少女折寿中...</div></div>
<script>
document.onreadystatechange = completeLoading();
function completeLoading() {
    if (document.readyState == "complete") {
        document.getElementById('loadingDiv').style.display="none";
        loadingMask.parentNode.removeChild(loadingMask);
    }
}
</script>