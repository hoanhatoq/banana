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
<li class="active"><?php echo $this->Html->link(__('結果の閲覧'),array('action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('会員管理'),array( 'controller' => 'member','action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('管理者管理'),array( 'controller' => 'admin','action' => 'index')); ?></li>
</ul>
</div>

<div class="right_contents">
<!--<ul class="bread">
	<li>結果一覧</li>
</ul>-->

<h2><?php echo __('結果一覧'); ?></h2> 

<!-- <div class="pdf_create">
<ul>
<li class="createPdf"><a href="member_edit02.html">結果PDF出力</a></li>
</ul>
<div class="clr"></div>
</div> -->

<!-- Search -->
<table class="search">
<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<?php echo $this->Form->create(null,array('url'=> array('controller' => 'result' ,'action' => 'search'))); ?>
<tr>
<td class="box">
<?php echo $this->Form->input('creator_email',array('type'=>'text','class' => false, 'label' => false,'div' => false)); ?>
</td>
<td><p class="btnsrc"><a href="#" onclick="document.forms['UserResultIndexForm'].submit();" ><?php echo __('検索'); ?></a></p></td>
</tr>
<?php echo $this->Form->end(); ?>
</table>

<div class="clr"></div>

<div class="list_table">
<table class="tbl">
<tr>
<th><?php echo __('作成日時'); ?></th>
<th><?php echo __('ユーザ名'); ?></th>
<th><?php echo __('メールアドレス'); ?></th>
<th><?php echo __('TPE名称'); ?></th>
<th><?php echo __('PDF'); ?></th>
<th><?php echo __('PDF'); ?>/<br><?php echo __('省エネ'); ?></th>
<th><?php echo __('詳細'); ?></th>
<th><?php echo __('詳細'); ?>/<br><?php echo __('省エネ'); ?></th>
</tr>

<!-- List User -->

<?php foreach($posts as $list): ?>
<tr>
<td class="date"><?php echo $list['UserResult']['created']; ?></td><!-- 2014年10月03日 -->
<td class="name"><?php echo $list['MstUser']['username']; ?></td><!-- ユーザ名ユーザ名ユーザ名 -->
<td class="email"><?php echo $list['UserResult']['creator_email']; ?></td>
<td class="tpename"><?php echo $list['UserResult']['TPE_name']; ?></td>
<td><p class="dl"><a href="" onclick="" target="_blank">
  <?php 
  if ($list['UserResult']['is_side'] == 1 || $list['UserResult']['is_side'] == 2){
  echo $this->Html->link('DL', array('controller' =>'Result','action' => 'export_pdf_energy', $list['UserResult']['id']),array(),__('PDFファイルをダウンロードします'));}
  ?>
</a></p></td>
<td><p class="dl"><a href="" onclick="" target="_blank">
  <?php
  if ($list['UserResult']['is_side'] == 2){
  echo $this->Html->link('DL', array('controller' =>'Result','action' => 'export_pdf_innovation', $list['UserResult']['id']),array(),__('PDFファイルをダウンロードします'));}
  ?>
</a></p></td>
<td><p class="dl"><a href="" target="_blank">
  <?php
  if ($list['UserResult']['is_side'] == 1 || $list['UserResult']['is_side'] == 2){
  echo $this->Html->link(__('詳細'),array( 'controller' => 'Result','action' => 'html_energy', $list['UserResult']['id']));}
  ?>
</a></p></td>
<td><p class="dl"><a href="" target="_blank">
  <?php
  if ($list['UserResult']['is_side'] == 2){ 
  echo $this->Html->link(__('詳細'),array( 'controller' => 'Result','action' => 'html_innovation', $list['UserResult']['id']));}
  ?>
</a></p></td>
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