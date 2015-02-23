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
<li class="active"><?php echo $this->Html->link(__('管理者管理'), array('plugin' => 'admin', 'controller' => 'admin', 'action' => 'index')); ?></li>
</ul>
</div>



<div class="right_contents">
<h2><?php echo __('管理者一覧'); ?></h2>
<p class="complete_message"><?php echo $this->Session->flash(); ?></p>

<div class="clr"></div>

<!-- Search -->
<table class="search">
<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?> 
<?php echo $this->Form->create(null, array('url' => array('controller' => 'admin', 'action' => 'search'))) ?>
<tr>
<td class="box">
  <?php 
          echo $this->Form->input('username',array('type'=>'text','class' => false, 'label' => false,'div' => false)); 
 ?>

</td>
<td><p class="btnsrc"><a href="#" onclick="document.forms['MstAdminIndexForm'].submit();" ><?php echo __('検索'); ?></a></p></td>
</tr>
<?php echo $this->Form->end(); ?>
</table>
<div class="clr"></div>

<div class="user_create">
<ul>
<li class="create"><?php echo $this->Html->link(__('管理者を追加'),array('action' => 'add')); ?></li>
</ul>
<div class="clr"></div>
</div>
<!-- Search result -->


<div class="list_table">
<table class="tbl">

<tr>
<th class="th_name"><?php echo __('会員名'); ?></th>
<th class="th_remove"><?php echo __('メールアドレス'); ?></th>
<th><?php echo __('ステータス'); ?></th>
<th><?php echo __('編集'); ?></th>
<th><?php echo __('削除'); ?></th>
</tr>

<tr>

<?php foreach($users as $user): ?>

<!-- Show admin name
  when click on admin name will link to the edit page of this admin
 -->
<td><?php echo $this->Html->link($user['MstAdmin']['username'] ,array('action' => 'edit', $user['MstAdmin']['id'])); ?>&nbsp;</td>
<td><?php echo h($user['MstAdmin']['email']); ?>&nbsp;</td>

<!-- status admin -->
<td class="status">
  <?php
    if($user['MstAdmin']['status'] == "1"){
      echo __('有効'); 
    }
        else{
          echo "<span style='color:red'>" . __('無効') . "</span>";
        }
   
  ?>
  &nbsp;
</td>

<!-- button edit admin -->
<td class="center"><p class="edit"><?php echo $this->Html->link(__('編集'), array('action' => 'edit', $user['MstAdmin']['id'])); ?></p></td>

<!-- Button delete admin -->
<td class="center"><div class="remove"><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $user['MstAdmin']['id']), array(), __('削除してよろしいですか？', $user['MstAdmin']['id'])); ?></div></td>
</tr>
<?php endforeach; ?>
</table>

</div>
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
</div>

<div class="clr"></div>
<div class="clr"></div>




<div id="pagetop"><a href="#"><?php echo __('▲ページトップへ'); ?></a></div>
<div class="clr"></div>
</div>
</div>
<div class="clr"></div>
