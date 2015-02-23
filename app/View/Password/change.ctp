</div>
<div class="clr"></div>
<div id="sub_title">
<h2><?php echo __('パスワード変更'); ?></h2>
</div>




<div class="login_box">
<?php echo $this->Session->flash(); ?>
<table>
<?php echo $this->Form->create();?>
<?php echo $this->Form->input('id');?>
<tr>
<th><label><?php echo __('パスワード'); ?></label></th>
<td>
	<?php $placeholder1 = (__('パスワードを入力してください')) ?>
	<?php echo $this->Form->input('password',array('label'=>'','type'=>'password','value'=>'','placeholder' => $placeholder1));?></td>
</tr>
<tr>
<th><label><?php echo __('パスワード再入力'); ?></label></th>
<td>
	<?php $placeholder2 = (__('パスワードを再入力してください')) ?>
	<?php echo $this->Form->input('password_repeat',array('label'=>'','type'=>'password', 'value'=>'','placeholder' => $placeholder2));?></td>
</tr>

</table>
<div class="clr"></div>

<div class="btnLogin_out"><?php echo $this->Form->end(__('パスワード変更'),'change'); ?></div>


</div>


