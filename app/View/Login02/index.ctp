<div id="popup">
<h1></h1>

<div class="content_box">
<h2><?php echo __('メールアドレス,パスワードを入力');?></h2>
<p class="text"><?php echo __('前回受信したパスワード入力してください。'); ?></span><br>
<!--<p class="msg">パスワードが違います</p>-->

<?php echo $this->Session->flash();?>

<?php echo $this->Form->create('user_login02', array(
		'id' => 'UserLogin02Form',
		'type' => 'post',
		'url' => array('controller' => 'login_02', 'action' => 'index')		
	)); 
?>
<!-- <input type="text" name="act" value="<?php //echo (isset($act))? $act : 0;?>" id="act" class="select"> -->
<?php 	
	$vact = (isset($act))? $act : 0;
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
<table>
<tr>
<th><label for="textfield"><?php echo __('メールアドレス'); ?></label></th>
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
<th><label for="textfield2"><?php echo __('パスワード'); ?></label></th>
<td class="small"><?php echo $this->Form->input('creator_password',
		array(
			'id' => 'creator_password',
			'type' => 'password',
			'size' => '20',
			'label' => false,
			'div' => false,
			'class' => 'login_txt_input2',
			'placeholder'=> __('パスワードを入力してください')
		)
	); 
?></td>
</tr>
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btnLogin_out"><p class="btnSendmail"><a id href="#" onClick="submit_frm_login02();"><?php echo __('パスワードを送信'); ?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('閉じる'); ?></a></p></div>
</div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_login02(){
	if($("#act").val()==0){
		var act = opener.document.activeElement;
		var idAct = $(act).attr("id");	
		$("#act").val(idAct);
	}

	document.forms['UserLogin02Form'].submit();	
}	
</script>

</div>
