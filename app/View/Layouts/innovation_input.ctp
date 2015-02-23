<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php echo $this->fetch('title'); ?></title>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->

<?php 
	if($this->Session->read('Config.language') && $this->Session->read('Config.language') =='eng'){
		echo $this->Html->css('common_en.css');
	}else{
		echo $this->Html->css('common.css');
	}
	echo $this->Html->script('cellcolor.js');
	echo $this->Html->script('jquery-1.3.2.js');
	echo $this->Html->script('jquery.smoothScroll.js');
	echo $this->Html->script('switch.js');
	echo $this->Html->script('library.js');
?>

</head>

<body>
<div id="layout">

<div id="header">
<h1><?php echo $this->Html->image('header_logo.gif', array('alt' => __('エネルギー効率評価システム'), 'border' => '0')); ?></h1>

<div id="exitBtn"><a href="<?php echo $this->Html->url(array("controller" => "index", "action" =>"logout")); ?>" onclick='return confirm("<?php echo __('作業を中止すると全ての入力データは消去されます。\n終了してよろしいですか？');?>")'><?php echo __('EXIT'); ?></a></div>
<div id="saveBtn"><a href="#"><?php echo __('下書き保存');?></a></div>
</div>
<div class="clr"></div>

<?php echo $this->fetch('content'); ?>

<div class="clr"></div>
<script type="text/javascript"> 
	$("#saveBtn").click(function(){
		var data = $("#InnovationInputForm").serialize();
		w=window.open('<?php echo $this->Html->url(array("controller" => "save", "action" =>"index")); ?>?'+data,'','scrollbars=yes,Width=560,Height=500');
		w.focus();
	});
</script>
</div>

</body>

</html>