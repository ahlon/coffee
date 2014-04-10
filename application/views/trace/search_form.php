<h2>用户操作记录</h2>
<form class="well form-search">
    <input type="text" name="uid" value="<?php if(!empty($uid)) echo $uid ?>" placeholder="用户编号"> 
    <input type="text" name="url" value="<?php if(!empty($url)) echo $url ?>" placeholder="URL"> 
    <input type="text" name="referer" value="<?php if(!empty($referer)) echo $referer ?>" placeholder="Referer"> 
    <input type="text" name="time" id='time' value="<?php if(!empty($time)) echo $time ?>" placeholder="选择日期:默认是当天">
    <button type="submit" class="btn">搜索</button>
</form>
<script type="text/javascript">
// $("#time").datepicker({dateFormat: "yy-mm-dd"});
</script>