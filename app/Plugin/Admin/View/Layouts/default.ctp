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
		echo $this->Html->css('Admin.common_en.css');
	}else{
		echo $this->Html->css('Admin.common.css');
	}	
	echo $this->Html->script('Admin.jquery-1.3.2.js');
?>

</head>

<body>
	
<div id="layout">
<div id="header">	
	<h1><?php echo $this->Html->image(__('Admin.header_logo.gif'), array('alt' => __('エネルギー効率評価システム'), 'border' => '0')); ?></h1>		
	<?php echo $this->fetch('content'); ?>


</div> <!-- END LAYOUT -->

</body>

</html>