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
<h1><?php echo $this->Html->image('header_logo.gif', array('alt' => __('エネルギー効率評価システム'), 'border' => '0')); ?> </h1>

<?php echo $this->fetch('content'); ?>

<div class="clr"></div>

</div>

</body>

</html>