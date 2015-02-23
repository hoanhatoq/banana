<div id="exitBtn"><?php echo $this->Html->link(__('EXIT'), array('controller' => 'index', 'action' => 'logout'));?></div>
<!--<div id="saveBtn"><a href="javascript:w=window.open('save.html','','scrollbars=yes,Width=560,Height=500');w.focus();">下書き保存</a></div>-->
</div>
<div class="clr"></div>

<div class="content_box">
<p class="text"><?php echo __('ようこそ工業炉の効率評価解析ツールへ'); ?></p>

<h3 class="selectMenu"><?php echo __('エネルギー収支計算'); ?></h3>
<div class="btnMenuBox">
<p class="btnSelect"><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page02")); ?>"><?php echo __('はじめから入力'); ?></a></p>
<p class="btnPass"><a id="act1" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "login_02", "action" =>"index")); ?>','','scrollbars=yes,Width=560,Height=400');w.focus();"><?php echo __('続きを入力'); ?></a></p>
</div>
<div class="clr"></div>

<h3 class="selectMenu"><?php echo __('省エネ対策'); ?></h3>
<div class="btnMenuBox">
<!-- <p class="btnSelect"><a id="act2" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "login_02", "action" =>"index")); ?>','','scrollbars=yes,Width=560,Height=400');w.focus();" ><?php echo __('はじめから入力'); ?></a></p> -->
<p class="btnSelect"><a href="#" onclick='return confirm("<?php echo __('エネルギー収支計算の入力完了後に選択できます');?>")'><?php echo __('はじめから入力'); ?></a></a></p>
<p class="btnPass"><a id="act3" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "login_02", "action" =>"index")); ?>','','scrollbars=yes,Width=560,Height=400');w.focus();"><?php echo __('続きを入力'); ?></a></p>
</div>
<div class="clr"></div>

<div class="clr"></div>

</div>