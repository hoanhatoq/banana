<div id="langSwitcherJa"><a href="index"><?php echo __('日本語');?></a></div>
</div>
<div class="clr"></div>

<div class="content_box">

<div align="center">
<?php echo $this->Session->flash(); ?>
</div>

<?php echo $this->Form->create('MstUser', array('id'=>'MstUserForm')); ?>

<table>
<tr>
<th><label for="username"><?php echo __('Login ID');?></label></th>
<td><?php echo $this->Form->input('username',
		array(
			'id' => 'username',
			'type' => 'text',
			'size' => '20',
			'value' => '',
			'label' => false,
			'div' => false,
			'class' => 'login_txt_input',
			'placeholder'=> __('Please input login ID')
		)
	); 
?></td>
</tr>
<tr>
<th><label for="password"><?php echo __('Password');?></label></th>
<td><?php echo $this->Form->input('password',
		array(
			'id' => 'password',
			'type' => 'password',
			'size' => '20',
			'value' => '',
			'label' => false,
			'div' => false,
			'class' => 'login_txt_input',
			'placeholder'=> __('Please input password')
		)
	); 
?></td>
</tr>
</table>
<div class="clr"></div>

<div class="btnLogin_out"><p class="btnLogin"><a href="#" onclick="submit_frm();"><?php echo __('Login');?></a></p></div>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<!--<div class="password_remind"><a href="javascript:w=window.open('password_remind.html','','scrollbars=yes,Width=560,Height=400');w.focus();">パスワードを忘れた方はこちら</a></div>
<div class="clr"></div>-->

<script type="text/javascript">  
	function submit_frm(){		
		var uname = document.getElementById("username").value.length;
		var upass = document.getElementById("password").value.length;
		
		if(uname<6 || upass<8){
			alert("<?php echo __('Username, password is required.');?>");
			return false;
		}else{
			document.forms['MstUserForm'].submit();
		}
	}
</script>

</div>