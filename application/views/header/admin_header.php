<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="content-type" content="text/html;charset=UTF-8; width=device-width, initial-scale=1.0;" />
<link href="/static/bootstrap/v2.3.2/css/bootstrap.min.css" rel="stylesheet"/>
<link href="/static/bootstrap/v2.3.2/css/bootstrap-responsive.min.css" rel="stylesheet"/>
<!--  
<link href="/static/bootstrap-ie/css/ie.css" rel="stylesheet"/>
<link href="/static/bootstrap-ie/css/bootstrap-ie6.min.css" rel="stylesheet"/>
-->
<link href="/static/css/ui-lightness/jquery-ui-1.8.15.custom.css" rel="stylesheet"/>
<link href="/assets/css/s.css" rel="stylesheet"></link>

<script src="/static/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/static/js/jquery-ext.js" type="text/javascript"></script>
<script src="/static/js/jquery-ui-1.8.15.custom.min.js" type="text/javascript"></script>
<script src="/static/js/fm/common.js?v=<?php echo CSS_REFRESH_TIME;?>" type="text/javascript"></script>
<script src="/assets/js/common.js?v=<?php echo CSS_REFRESH_TIME;?>" type="text/javascript"></script>
<script src="/static/js/jquery.ajaxform.js" type="text/javascript"></script>
<script src="/assets/js/mail.js" type="text/javascript"></script>
<script src="/assets/js/c.js" type="text/javascript"></script>
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
<!--  
<script src="/static/sco.js/js/sco.valid.js"></script>
-->
<style>
body {
    padding-top: 50px;
}
.span12, .container {
    /*width: 98%;*/
}
.content {
    /*margin-top: 40px;*/
}
<?php 
if (APP_ENV == 'dev') {
	echo '.navbar-inverse .navbar-inner {background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#630000), to(#230000))}';
} else if (APP_ENV == 'test') {
	echo '.navbar-inverse .navbar-inner {background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#636300), to(#232300))}';
}
?>
</style>
<script>
$(function() {
	$('li.dropdown').mouseenter(function() {
		clearInterval($(this).data('timeid'));
		$(this).addClass('open');
	}).mouseleave(function() {
		var li = $(this);
		var timeid = setInterval(function() {
			li.removeClass('open');
	    }, 100);
		$(this).data('timeid', timeid);
	});
});
</script>