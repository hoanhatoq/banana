</div>
<div class="clr"></div>

<div class="content_box">
<div id="sub_title">
<h2><?php echo __('パスワード送付'); ?></h2>
</div>
<div style="color:red" align="center">

</div>
<div class="login_box">
<table>
<?php echo $this->Form->create('MstAdmin'); ?>
<tr>
<th><label for="textfield"><?php echo $this->Session->flash(); ?></label></th></tr>
<tr>
<td>
<?php $placeholder = (__('メールアドレスを入力してください')); ?>
<?php echo $this->Form->input('email', array('required'=>false,'label' => false,'placeholder' => $placeholder, 'class'=>'login_txt_input', 'type'=>'text', 'placeholder'=>$placeholder,'div'=>false)); ?>
</td>
</tr>
</table>
<div class="clr"></div>

<div class="btnLogin_out">
	<input name="" type="submit" value="<?php echo __('パスワード送付'); ?>" class="btnLogin"></div>
</div>
<div class="clr"></div>
</div>