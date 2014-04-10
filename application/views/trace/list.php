<div class="tab-content">
    <div class="tab-pane active" id="tab1">
    <?php echo $pager;?>
        <table class="table table-striped table-bordered table-condensed" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th width="280px">Ccid</th>
                    <th width="60px">User</th>
                    <th>Url</th>
                    <th width="60px">耗时</th>
                    <th width="140px">时间</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($datalist)) {
                       foreach ($datalist as $itme){?>
                <tr>
                    <td><?php echo $itme['ccid']?></td>
                    <td>
                    <?php 
                    if (!empty($itme['user'])) {
                    ?>
                    <a href="/admin/user/<?php echo $itme['user']['id']?>" target="_blank"><?php echo $itme['user']['display_name']?></a>
                    <?php
                    }
                    ?>
                    </td>
                    <td>
                    URL: <a href="<?php echo $itme['url']?>" target="_blank"><?php echo urldecode($itme['url'])?></a>
                    <br/>
                    <span style="color:#c3c3c3">Referer: <?php echo $itme['referer']?></span>
                    </td>
                    <!--  
                    <td><?php echo $itme['controller'].'/'.$itme['method']?></td>
                    -->
                    <td><?php echo $itme['time_cost']?></td>
                    <td><?php echo $itme['created_time']?></td>
                    <!--  
                    <td><input class='btn' onclick="show_detail('<?php echo $itme['id'];?>');" type="button" value="详细" ></td>
                    -->
                </tr>       
            <?php     }
                 }?>
            </tbody>
        </table>
    </div>
</div>
<form class="form-horizontal " style="display: none" method="post" name='trace_log_detail'>
<div class="control-group">
    <label class="control-label">记录编号</label>
    <div class="controls">
        <input class="input-xlarge"  name = 'id' value="">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Ccid</label>
    <div class="controls">
        <div class="textarea" >
            <textarea rows="4" style="width: 260px;" name = 'ccid'></textarea>
        </div>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Uid</label>
    <div class="controls">
        <input class="input-xlarge"  name = 'uid' value="">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Url</label>
    <div class="controls" >
            <textarea rows="4" style="width: 260px;" name = 'url'></textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Uri</label>
    <div class="controls">
        <input class="input-xlarge"  name = 'uri' value="">
    </div>
</div>
<div class="control-group">
    <label class="control-label">控制器</label>
    <div class="controls">
        <input class="input-xlarge"  name = 'controller' value="">
    </div>
</div>
<div class="control-group">
    <label class="control-label">方法</label>
    <div class="controls">
        <input class="input-xlarge"  name = 'method' value="">
    </div>
</div>
<div class="control-group">
    <label class="control-label">传递数据</label>
    <div class="controls">
        <div class="textarea" >
            <textarea rows="4" style="width: 260px;" name = 'post_data'></textarea>
        </div>
    </div>
</div>
<div class="control-group ">
    <label class="control-label">Referer</label>
    <div class="controls">
        <input class="input-xlarge"  name = 'referer' value="">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Session_id</label>
    <div class="controls">
        <div class="textarea" >
            <textarea rows="4" style="width: 260px;" name = 'session_id'></textarea>
        </div>
    </div>
</div>
<div class="control-group">
    <label class="control-label">花费时间</label>
    <div class="controls">
        <input class="input-xlarge"  name = 'time_cost' value="">
    </div>
</div>
<div class="control-group">
    <label class="control-label">创建时间</label>
    <div class="controls">
        <input class="input-xlarge"  name = 'created_time' value="">
    </div>
</div>
</form>
<script type="text/javascript">
   function show_detail(id){
       url = '/admin/trace_log/get_detail?id='+id+'&time=<?php echo $time?>';
       $.getJSON(url,function(data){
           if(data){
               reset_form(data);
               open_dialog();
           }else{
               alert('获取数据失败');
           }
       });
   };
   $(function(){
	   $("form[name='trace_log_detail']").dialog({
  		title:'详细记录',
          autoOpen: false,
          modal: true,
          width:670,
      	  height:600,
          position:'center',
      });
  });

  function open_dialog(){
	  $("form[name='trace_log_detail']").dialog('open');
  };

  function reset_form(data){
	  $.each ($("form[name='trace_log_detail']").find('input'),function (){
		  $(this).val("");
	  });
	  $.each ($("form[name='trace_log_detail']").find('textarea'),function (){
		  $(this).text("");
	  });
	  $("form[name='trace_log_detail']").find("input[name='id']").val(data.id);
	  $("form[name='trace_log_detail']").find("textarea[name='ccid']").val(data.ccid);
	  $("form[name='trace_log_detail']").find("input[name='uid']").val(data.uid);
	  $("form[name='trace_log_detail']").find("textarea[name='url']").val(data.url);
	  $("form[name='trace_log_detail']").find("input[name='uri']").val(data.uri);
	  $("form[name='trace_log_detail']").find("input[name='controller']").val(data.controller);
	  $("form[name='trace_log_detail']").find("input[name='method']").val(data.method);
	  $("form[name='trace_log_detail']").find("textarea[name='post_data']").val(data.post_data);
	  $("form[name='trace_log_detail']").find("input[name='referer']").val(data.referer);
	  $("form[name='trace_log_detail']").find("textarea[name='session_id']").val(data.session_id);
	  $("form[name='trace_log_detail']").find("input[name='time_cost']").val(data.time_cost);
	  $("form[name='trace_log_detail']").find("input[name='created_time']").val(data.created_time);
	  
  };
</script>