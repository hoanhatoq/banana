<div id="popup">
<h1></h1>

<div class="content_box">
<h2><?php echo __('結果を保存'); ?></h2>
<p class="text"><?php echo __('ご入力いただいたメールアドレスに、パスワードを送信します。<br>
メール受信を確認後、このウィンドウを閉じてください。'); ?></span><br>
<span class="memo"><?php echo __('※メールは迷惑メールフォルダに振り分けされる場合もございます。'); ?></p>

<?php echo $this->Session->flash();?>

<?php echo $this->Form->create('UserResult', array(
		'id' => 'UserResultForm',
		'type' => 'post',
		'url' => array('controller' => 'save02', 'action' => 'index')		
	)); 
?>

<?php 	
	$vact = (isset($act))? $act : '';
	echo $this->Form->hidden('act',
		 array(
			'id' => 'act',
			'type' => 'text',
			'name' => 'act',
			'label' => false,
			'div' => false,
			'class' => 'select',
			'value' => $vact
		 )
	); 
?>

<?php 	
	echo $this->Form->hidden('savePage',
		 array(
			'id' => 'savePage',
			'type' => 'text',
			'name' => 'savePage',
			'label' => false,
			'div' => false,
			'class' => 'select',
			'value' => 0
		 )
	); 
?>
<table>
<tr>
<th><label><?php echo __('メールアドレス'); ?></label></th>
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
<th><label><?php echo __('メモ');?></label></th>
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
?></textarea></td>
</tr>
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btnLogin_out"><p class="btnSendmail"><a href="#" onclick="submit_frm_save02()"><?php echo __('メールを送信'); ?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('閉じる'); ?></a></p></div>
</div>

<div class="clr"></div>

<script type="text/javascript">  
function submit_frm_save02(){
	//var act = $("#actSave", opener.document).val();	
	//$("#act").val(act);
	var page = $("input[name='saveDraft']", opener.document).val();	
	if(page){
		$("#savePage").val(page);		
	}else{
		$("#savePage").val(1);		
	}
	document.forms['UserResultForm'].submit();				
}
</script>

</div>