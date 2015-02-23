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
<li class="active"><?php echo $this->Html->link(__('会員管理'),array('action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('管理者管理'),array( 'controller' => 'admin','action' => 'index')); ?></li>
</ul>
</div>

<div class="right_contents">
<!--<ul class="bread">
	<li><a href="index.html">管理者一覧</a></li>
	<li>会員編集</li>
</ul>-->
<h2><?php echo __('会員新規登録'); ?></h2> 
<?php
echo "<div style='color:red'>";
echo "<pre>";
print_r((isset($error['fullname'][0]))? __('会員名ラー:') . $error['fullname'][0]: '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['email'][0]))? __('メールアドレスエラー:') . $error['email'][0]: '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['username'][0]))? __('ログインIDエラー:') . $error['username'][0]: '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['password'][0]))? __('パスワードエラー:') . $error['password'][0]: '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['password'][0]))? __('パスワードエラー:') . __('確認パスワードを同じパスワードで入力してください'): '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['password_repeat'][0]))? __('確認パスワードエラー:') . $error['password_repeat'][0]: '');
echo "</pre>";
echo "<pre>";
print_r((isset($error['password_repeat'][0]))? __('確認パスワードエラー:') . __('パスワードと同様に入力してください'): '');
echo "</pre>";
echo "</div>";
?>
<div class="clr"></div>
<div style="color:red" align="">
<?php echo $this->Session->flash(); ?> <!--Hiển thị lỗi nếu nhập sai -->
</div>
<?php echo $this->Form->create('MstUser'); ?>
<div class="profile_area">
	<p><?php echo __('入力後、保存してください'); ?><br>
	<span class="required">＊</span><?php echo __('は必須項目となります'); ?></p>
	<table>
		<tr>
			<th><?php echo __('会員名'); ?></th>
			<td><?php echo  $this->Form->input('fullname',array('type'=>'text','readonly' => false,'value' => false,'label' => false,'div' => false, 'error' => false)) ?>				
			<p class="note"><?php echo __('全角50文字以内で入力してください'); ?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo __('メールアドレス'); ?></th>
			<td><?php echo  $this->Form->input('email',array('type'=>'text','readonly' => false,'value' => false,'label' => false,'div' => false, 'error' => false)) ?>				
			<p class="note"><?php echo __('半角英数字で入力してください'); ?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo __('ログインID '); ?><span class="required">*</span></th>
			<td><?php echo  $this->Form->input('username',array('type'=>'text','readonly' => false,'value' => false,'label' => false,'div' => false, 'error' => false)) ?>
			<p class="note"><?php echo __('半角英数字で入力してください'); ?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo __('パスワード '); ?><span class="required">*</span></th>
			<td><?php echo  $this->Form->input('password',array('type'=>'password','readonly' => false,'value' => false,'label' => false,'div' => false, 'error' => false)) ?>
			<p class="note"><?php echo __('8文字以上16文字以内の半角英数字で入力してください'); ?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo __('確認パスワード '); ?><span class="required">*</span></th>
			<td><?php echo  $this->Form->input('password_repeat',array('type'=>'password','readonly' => false,'value' => false,'label' => false,'div' => false, 'error' => false)) ?>
			<p class="note"><?php echo __('8文字以上16文字以内の半角英数字で入力してください'); ?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo __('ステータス '); ?><span class="required">*</span></th>
			<td>
				<?php $valid = ('	'. __('有効') . '	'); ?>
				<?php $invalid = (' ' . __('無効')) ?>
				<?php echo  $this->Form->input('status',array('type'=>'radio', 'options' => array(1 => $valid, 0 => $invalid),'legend' => false,'div' => false,'value' => false)) ?>
			</td>
		</tr>
	</table>
	
	
	<div class="btn_save">
		<p><a href="#" id="submit" onclick="document.forms['MstUserAddForm'].submit();"><?php echo __('保存する'); ?></a></p>
	</div>
<?php echo $this->Form->end(); ?>
	
	<div class="back">
		<p><?php echo $this->Html->link(__('< 戻る'),array('action' => 'index')); ?></p>
	</div>

	
<br clear="all">



<br clear="all">
<div id="pagetop"><a href="#"><?php echo __('▲ページトップへ'); ?></a></div>
</div>
</div>

</div>

<div class="clr"></div>