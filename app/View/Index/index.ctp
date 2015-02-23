<div id="langSwitcherEn"><a href="<?php echo $url_language; ?>"><?php echo __('English');?></a></div>
<!--<div id="langSwitcherJa"><a href="#">日本語</a></div>-->
</div>

<div class="clr"></div>

<div class="content_box">

<div align="center">
<?php echo $this->Session->flash(); ?>
</div>

<?php echo $this->Form->create('MstUser', array('id'=>'MstUserForm')); ?>

<table>
<tr>
<th><label for="username"><?php echo __('ログインID');?></label></th>
<td><?php echo $this->Form->input('username',
		array(
			'id' => 'username',
			'type' => 'text',
			'size' => '20',
			'value' => '',
			'label' => false,
			'div' => false,
			'class' => 'login_txt_input',
			'placeholder'=> __('ログインIDを入力してください')
		)
	); 
?></td>
</tr>
<tr>
<th><label for="password"><?php echo __('パスワード');?></label></th>
<td><?php echo $this->Form->input('password',
		array(
			'id' => 'password',
			'type' => 'password',
			'size' => '20',
			'value' => '',
			'label' => false,
			'div' => false,
			'class' => 'login_txt_input',
			'placeholder'=> __('パスワードを入力してください')
		)
	); 
?></td>
</tr>
</table>
<div class="clr"></div>

<div class="btnLogin_out"><p class="btnLogin"><a href="#" id="submit" onclick="submit_frm();" ><?php echo __('ログイン');?></a></p></div>

<?php echo $this->Form->end();?>

<div class="clr"></div>
<!--<div class="password_remind"><a href="javascript:w=window.open('password_remind.html','','scrollbars=yes,Width=560,Height=400');w.focus();">パスワードを忘れた方はこちら</a></div>
<div class="clr"></div>-->

<script type="text/javascript">  
	function submit_frm(){		
		var uname = document.getElementById("username").value.length;
		var upass = document.getElementById("password").value.length;
		
		if(uname<3){			
			alert("<?php echo __('ログインIDを入力してください');?>");
			return false;
		}else{			
			if(upass<8){
				alert("<?php echo __('8桁以下の場合、エラーがでてくる');?>");
			}else{
				document.forms['MstUserForm'].submit();
			}			
		}
	}
</script>

</div>