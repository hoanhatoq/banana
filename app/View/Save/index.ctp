<div id="popup">
<h1></h1>

<div class="content_box">
<h2><?php echo __('パスワードを送信'); ?></h2>
<p class="text"><?php echo __('ご入力いただいたメールアドレスに、パスワードを送信します。<br>
メール受信を確認後、このウィンドウを閉じてください。'); ?></span><br>
<span class="memo"><?php echo __('※メールは迷惑メールフォルダに振り分けされる場合もございます。'); ?></p>
	
<?php echo $this->Session->flash();?>

<?php echo $this->Form->create('UserDraftInput', array(
		'id' => 'UserDraftInputForm',
		'type' => 'post',
		'url' => array('controller' => 'save', 'action' => 'index')		
	)); 
?>

<input type="hidden" name="act" value="0" id="act" class="select">

<?php echo $this->Form->input('page',
		array(
			'type' => 'hidden',
			'value' => $page
		)
	);

?>
<?php echo $this->Form->input('dataDraft',
		array(
			'type' => 'hidden',
			'value' => $dataDraft
		)
	);

?>

<table>
<tr>
<th><label><?php echo __('解説'); ?></label></th>
<td><?php echo $this->Form->input('creator_email',
		array(
			'id' => 'creator_email',
			'type' => 'text',
			'size' => '20',
			'label' => false,
			'div' => false,
			'class' => 'login_txt_input2',
			'placeholder'=> __('メールアドレスを入力してください')
		)
	); 
?></td>
</tr>
<tr>
<th><label><?php echo __('メモ'); ?></label></th>
<td><?php echo $this->Form->input('memo', 
		array(
			'id' => 'memo',
			'type' => 'textarea',
			'size' => '20',		
			'rows' => '',
			'cols' => '',
			'label' => false,
			'div' => false,
			'placeholder'=> __('メモを入力してください')			
		)
	);
?></td>
</tr>
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btnLogin_out"><p class="btnSendmail"><a href="#" onclick="submit_frm_save()"><?php echo __('メールを送信'); ?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('閉じる'); ?></a></p></div>
</div>

<div class="clr"></div>

<script type="text/javascript">  
	function submit_frm_save(){			
		var href  = opener.document.baseURI;	
		var page = href.substr(href.lastIndexOf('/') + 1);
		$("#act").val(page);
		document.forms['UserDraftInputForm'].submit();		
	}
</script>

</div>