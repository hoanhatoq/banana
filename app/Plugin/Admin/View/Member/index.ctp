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
	<li>会員一覧 >></li>
</ul>-->

<h2><?php echo __('会員一覧'); ?></h2>

<p class="complete_message"><?php echo $this->Session->flash(); ?></p>
<div class="clr"></div>

<!-- Search -->
<table class="search">
<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?> 
<?php echo $this->Form->create(null,array('url'=> array('controller' => 'member' ,'action' => 'search'))); ?>
<tr>
<td class="box">
<?php echo $this->Form->input('fullname',array('type'=>'text','class' => false, 'label' => false,'div' => false)); ?>
</td>
<td><p class="btnsrc"><a href="#" onclick="document.forms['MstUserIndexForm'].submit();" ><?php echo __('検索'); ?></a></p></td>
</tr>
<?php echo $this->Form->end(); ?>
</table>

<div class="clr"></div>

<!-- Add user -->
<div class="user_create">
<ul>
<li class="create"><?php echo $this->Html->link(__('会員を追加'),array('action' => 'add')); ?></li>
</ul>
<div class="clr"></div>
</div>

<!-- List table -->
<div class="list_table">
<table class="tbl">
<tr>
<th><?php echo __('会員名'); ?></th>
<th><?php echo __('メールアドレス'); ?></th>
<th><?php echo __('ステータス'); ?></th>
<th><?php echo __('編集'); ?></th>
<th><?php echo __('削除'); ?></th>
</tr>

<!-- List User -->
<?php foreach($posts as $list): ?>
<tr>
<td class="name"><?php echo $this->Html->link($list['MstUser']['fullname'],array('action' => 'edit', $list['MstUser']['id'])); ?></td>
<td class="email"><?php echo $list['MstUser']['email']; ?></td>
<td class="status">
  <?php if ($list['MstUser']['status'] == "1"){echo __("有効");}
        else{
          echo "<span style='color:red'>" . __('無効') . "</span>";
        }
  ?>
</td>
<td class="status"><p class="edit"><?php echo $this->Html->link(__('編集'), array('action' => 'edit', $list['MstUser']['id'])); ?></p></td>
<td class="status"><div class="remove"><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $list['MstUser']['id']), array(), __('削除してよろしいですか？', $list['MstUser']['id'])); ?></div></td>
</tr>
<?php endforeach; ?>
</table>
</div>

<div class="clr"></div>

<!-- Paging -->
<div class="pagenation">
    <ul>
      <li class="prev"><?php echo $this->Paginator->prev('＜ ' . __('前のページ ', true), array(), null, array('class'=>'disabled'));?></li>
      <li class="num">
          <?php
            if($this->Paginator->counter('{:pages}') == 1){
              echo 1;
            }
            else{ 
              echo $this->Paginator->numbers(array('separator' => ' '));
            }
          ?>
      </li>
      <li class="next"><?php echo $this->Paginator->next(__(' 次のページ', true) . ' ＞', array(), null, array('class' => 'disabled'));?></li>
    </ul>
<div class="clr"></div>

<div id="pagetop"><a href="#"><?php echo __('▲ページトップへ'); ?></a></div>
<div class="clr"></div>
</div>

<div class="clr"></div>