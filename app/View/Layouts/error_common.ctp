<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php echo __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会'); ?></title>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->

<?php 
	if($this->Session->read('Config.language') && $this->Session->read('Config.language') =='eng'){
		echo $this->Html->css('common_en.css');
	}else{
		echo $this->Html->css('common.css');
	}	
?>

</head>

<body>
<div id="layout">

<div id="header">
<h1><?php echo $this->Html->image('header_logo.gif', array('alt' => __('エネルギー効率評価システム'), 'border' => '0')); ?> </h1>
<div></div>
<div></div>
</div>
<div class="clr"></div>

<?php echo $this->fetch('content'); ?>

<div class="clr"></div>

</div>

</body>

</html>