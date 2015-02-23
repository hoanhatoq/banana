<div class="clr"></div>

<script type="text/javascript">  
var elem = "TR";  
window.onload = function() {  
  if(document.getElementsByTagName) {  
    var el = document.getElementsByTagName(elem);  
      for(var i=0; i<el.length; i++) {  
        if(el[i].childNodes[0].tagName != "TH"  
          && el[i].parentNode.parentNode.className.indexOf("tbl") != -1) {  
          if(i%2 == 1) {  
            el[i].className = "on";  
          } else {  
            el[i].className = "off";  
          }  
        }  
      }  
  }        
}  
</script> 

<div class="content_box">
<div class="left_menu">
<ul>
<li><?php echo $this->Html->link(__('結果の閲覧'),array( 'controller' => 'result','action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('会員管理'),array('controller' => 'member' ,'action' => 'index')); ?></li>
<li class="active"><?php echo $this->Html->link(__('管理者管理'),array('controller' => 'admin' ,'action' => 'index')); ?></li>
</ul>
</div>

<div class="right_contents">
<h2><?php echo __('管理者情報編集'); ?></h2>

<!-- <p class="error_message">ログインIDを入力してください。</p>
<p class="error_message">パスワード　は半角英数字のみ登録できます。</p> -->

<?php
echo "<div style='color:red'>";
echo "<pre>";
print_r((isset($error['username'][0]))? __('ログインIDエラー:') . $error['username'][0]: '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['password'][0]))? __('パスワードエラー:') . $error['password'][0]: '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['password'][0]))? __('パスワードエラー:') . __('8文字以上16文字以内の半角英数字で入力してください'): '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['password'][0]))? __('パスワードエラー:') . __('確認パスワードを同じパスワードで入力してください'): '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['password_confirmation'][0]))? __('確認パスワードエラー:') . $error['password_confirmation'][0]: '');
echo "</pre>";
echo "</div>";
?>
<div class="clr"></div>
<div style="color:red" align="center">
<?php echo $this->Session->flash(); ?> <!--Hiển thị lỗi nếu nhập sai -->
</div>
<?php echo $this->Form->create('MstAdmin'); ?>
<div class="profile_area">
	<p><?php echo __('全ての項目を入力後、保存してください'); ?></p>
	<table>
		<?php echo $this->Form->input('id'); ?>
		<tr>
			<th><?php echo __('ログインID'); ?></th>
			<td>
				<?php 
					$u = "";
					if(isset($this->request->data['MstAdmin']['username'])) { 
						$u = $this->request->data['MstAdmin']['username']; 
					}
					echo  $this->Form->input('username',
									array('type'=>'text','class' => false, 'label' => false,
									'value' => $u ,'div' => false,'placeholder' => '', 'error' => false)) 
				?>
				<p class="note"><?php echo __('半角英数字で入力してください') ?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo __('パスワード'); ?></th>
			<td>
				<?php 
					echo  $this->Form->input('password',
									array('type'=>'password','class' => 'text', 'label' => false,
									'value' => '' ,'div' => false,'placeholder' => '', 'error' => false)) 
				?>
				<p class="note"><?php echo __('8文字以上16文字以内の半角英数字で入力してください') ?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo __('確認パスワード'); ?></th>
			<td>
				<?php 
					echo  $this->Form->input('password_confirmation',
									array('type'=>'password','class' => 'text', 'label' => false,
									'value' => '' ,'div' => false,'placeholder' => '', 'error' => false)) 
				?>
				<p class="note"><?php echo __('8文字以上16文字以内の半角英数字で入力してください') ?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo __('ステータス'); ?></th>

				<!-- Check data if status = 1 -> check radio "有効"
				else check "有効" -->

				<?php if($this->data['MstAdmin']['status'] == "1"): ?>
				<td>
				<?php $valid = ('	'. __('有効') . '	'); ?>
				<?php $invalid = (' ' . __('無効')) ?>
				<?php 
					echo  $this->Form->input('status',
									array('type'=>'radio','class' => false, 'label' => false, 'legend' => false,
									'options' => array(1 => $valid,0 => $invalid), 
									'value' => true ,'div' => false,'placeholder' => '')) 
				?>
			</td>
				<?php else: ?>
				<td>
				<?php 
					echo  $this->Form->input('status',
									array('type'=>'radio','class' => false, 'label' => false, 'legend' => false,
									'options' => array(1 => $valid,0 => $invalid), 
									'value' => false ,'div' => false,'placeholder' => '')) 
				?>
			</td>
				<?php endif; ?>
			
		</tr>
	</table>
	
	
	<div class="btn_save">
		<p><a href="#" onclick="document.forms['MstAdminEditForm'].submit();"><?php echo __('保存する'); ?></a></p>
	</div>

	
	<div class="back">
		<!-- link back to member page -->
		<p><?php echo $this->Html->link(__('< 戻る'),array('controller' => 'admin' ,'action' => 'index', 'index')); ?> </p>
	</div>

<?php echo $this->Form->end(); ?>	
<br clear="all">



<br clear="all">
<!-- back to top -->
<div id="pagetop"><a href="#"><?php echo __('▲ページトップへ'); ?></a></div>
</div>

</div>

</div>

<div class="clr"></div>