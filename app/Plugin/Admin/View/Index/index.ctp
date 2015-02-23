
<div class="clr"></div>
</div>

<div class="clr"></div>


<div class="content_box">



<p><?php echo __('工業炉の効率評価解析ツール管理ページ'); ?></p>
<div style="color:red" align="center">
<?php echo $this->Session->flash(); ?>
</div>
<?php echo $this->Form->create('MstAdmin', array('id'=>'MstAdminForm')); ?>
<table>
<tr>
<th><label for="textfield"><?php echo __('ログインID'); ?></label></th>
<td>
	<?php $placeholder1 = (__('ログインIDを入力してください')) ?>
	<?php echo $this->Form->input('username',
		array(
			'id' => 'username',
			'type' => 'text',
			'size' => '20',
			'value' => '',
			'label' => false,
			'div' => false,
			'class' => 'login_txt_input',
			'placeholder'=> $placeholder1
		)
	); 
?>
</td>
</tr>
<tr>
<th><label for="textfield2"><?php echo __('パスワード'); ?></label></th>
<td>
	<?php $placeholder2 = (__('パスワードを入力してください')) ?>
	<?php echo $this->Form->input('password',
		array(
			'id' => 'password',
			'type' => 'password',
			'size' => '20',
			'value' => '',
			'label' => false,
			'div' => false,
			'class' => 'login_txt_input',
			'placeholder'=> $placeholder2
		)
	); 
?>
</td>
</tr>
<tr>
<td colspan="2"><div class="password_remind"><?php echo $this->Html->link(__('パスワードを忘れた方はこちら'),array( 'controller' => 'passwordRemind','action' => 'index')); ?></div></td>

</tr>
</table>
<div class="clr"></div>


<div class="btnLogin_out">
	<p class="btnLogin">
		<a href="#" onclick="submit_frm();"><?php echo __('ログイン'); ?></a>
	</p>
</div>
<?php echo $this->Form->end(); ?>
<div class="clr"></div>

<script type="text/javascript">  
	function submit_frm(){		
		var uname = document.getElementById("username").value.length;
		var upass = document.getElementById("password").value.length;
		
		if(uname<1){
			alert("<?php echo __('ログインIDを入力してください');?>");
			return false;
		}
		else if(upass<1){
			alert("<?php echo __('パスワードを入力してください');?>");
			return false;
		}else{
			document.forms['MstAdminForm'].submit();
		}
	}
</script>

</div>

<div class="clr"></div>
