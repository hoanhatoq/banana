<div class="content_box">




<h3 class="selectMenu" style="padding-top:5em;"><?php echo __('省エネ対策 選択'); ?></h3>
<div class="btnMenuBox">

<?php if ($is_burning_type==1) {?>
<p class="btnSelect"> <a href='<?php echo $this->Html->url(array("controller" => "InnovationInput", "action" =>"page_b01/1")); ?>'><?php echo __('燃焼炉'); ?></a></p>
<?php } ?>

<?php if ($is_electric_type==1) {?>
<p class="btnPass"> <a href='<?php echo $this->Html->url(array("controller" => "InnovationInput", "action" =>"page_b10/10")); ?>'><?php echo __('電気炉'); ?></a></p>
<?php } ?>

</div>
<div class="clr"></div>
<p class="text2"><?php echo __('ハイブリット型には対応しておりません。'); ?></p>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

