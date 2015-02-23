<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php echo __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会'); ?></title>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<link href="css/common.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
<div id="popup">
<h1></h1>

<div class="content_box">
<h2><?php echo __('パスワードを送信'); ?></h2>
<p class="text"><?php echo __('ご入力いただいたメールアドレスに、パスワードを送信します。'); ?><br>
<?php echo __('メール受信を確認後、このウィンドウを閉じてください。'); ?></span><br>
<span class="memo">※<?php echo __('メールは迷惑メールフォルダに振り分けされる場合もございます。'); ?></p>
<!-- <p class="msg">メールを送信しました</p> -->
<div style="color:red" align="center">
<?php echo $this->Session->flash(); ?>
</div>
<table>
<?php echo $this->Form->create('MstUser'); ?>
<td>
	<?php $placeholder = (__('メールアドレスを入力してください')); ?>
	<?php echo $this->Form->input('email', array('label' => '','placeholder' => $placeholder)); ?></td>
</tr>
</table>
<div class="clr"></div>


<div class="btnLogin_out"><p class="btnSendmail">
	<a href="" onclick="document.forms['MstUserIndexForm'].submit();"><?php echo __('パスワードを送信'); ?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('閉じる'); ?></a></p></div>
</div>

<div class="clr"></div>
</div>
</div>
</body>

</html>



   
    

   

