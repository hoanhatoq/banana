<div class="content_box">
<h2><?php echo __('サンキー図（熱流図）'); ?></h2>

<!--<p>サンキー図を表示しますか。</p>-->

<div class="btn_pdf"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"pdf/out_08")); ?>" onclick="return confirm('<?php echo __('PDFファイルをダウンロードします'); ?>')"><?php echo __('出力'); ?></a></p></div>
<div class="clr"></div>

<input type="hidden" name="actSave" value="energy_input" id="actSave" class="select">

<div class="sankey">
<h3><?php echo __('鋼材加熱炉'); ?></h3>
<div id="sankey01">
<p class="value01"><?php echo (isset($EnergyInput['out_08']['totalin11']))? $EnergyInput['out_08']['totalin11'] : 0.0 ;?></p>
<p class="value02"><?php echo (isset($EnergyInput['out_08']['totalout11']))? $EnergyInput['out_08']['totalout11'] : 0.0 ;?></p>
<p class="value03"><?php echo (isset($EnergyInput['out_08']['PEfe_el']))? $EnergyInput['out_08']['PEfe_el'] : 0.0 ;?></p>
<p class="value04"><?php echo (isset($EnergyInput['out_08']['PEh_fuel']))? $EnergyInput['out_08']['PEh_fuel'] : 0.0 ;?></p>

<p class="value07"><?php echo (isset($EnergyInput['out_08']['PEeffect']))? $EnergyInput['out_08']['PEeffect'] : 0.0 ;?></p>
<p class="value08"><?php echo (isset($EnergyInput['out_08']['PEs_oxid']))? $EnergyInput['out_08']['PEs_oxid'] : 0.0 ;?></p>
<p class="value09"><?php echo (isset($EnergyInput['out_08']['PEl_wall_t']))? $EnergyInput['out_08']['PEl_wall_t'] : 0.0 ;?></p>
<p class="value10"><?php echo (isset($EnergyInput['out_08']['PEl_cw_t']))? $EnergyInput['out_08']['PEl_cw_t'] : 0.0 ;?></p>
<p class="value11"><?php echo (isset($EnergyInput['out_08']['PEl_opening_t']))? $EnergyInput['out_08']['PEl_opening_t'] : 0.0 ;?></p>
<p class="value13"><?php echo (isset($EnergyInput['out_08']['PEexhaust']))? $EnergyInput['out_08']['PEexhaust'] : 0.0 ;?></p>
<p class="value12"><?php echo (isset($EnergyInput['out_08']['PEl_other']))? $EnergyInput['out_08']['PEl_other'] : 0.0 ;?></p>
<p class="value05"><?php echo (isset($EnergyInput['out_08']['PEl_eg']))? $EnergyInput['out_08']['PEl_eg'] : 0.0 ;?></p>
<p class="value06"><?php echo (isset($EnergyInput['out_08']['PEaux']))? $EnergyInput['out_08']['PEaux'] : 0.0 ;?></p>

<p class="value14"><?php echo (isset($EnergyInput['out_08']['PEs_fuel']))? $EnergyInput['out_08']['PEs_fuel'] : 0.0 ;?></p>
<p class="value15"><?php echo (isset($EnergyInput['out_08']['PEs_air']))? $EnergyInput['out_08']['PEs_air'] : 0.0 ;?></p>
<p class="value16"><?php echo (isset($EnergyInput['out_08']['PEreact']))? $EnergyInput['out_08']['PEreact'] : 0.0 ;?></p>
</div>
</div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'out_08'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<?php echo $this->Form->end();?>

<div class="btn_save_next"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "save02", "action" =>"index")); ?>','','scrollbars=yes,Width=560,Height=500');w.focus();"><?php echo __('結果を保存'); ?></a></p></div>
<div class="clr"></div>
<div class="btn_next"><p><?php if($isLastPageSankey){?>
<a href="<?php echo $this->Html->url(array("controller" => "menu02", "action" =>"index/1")); ?>">→　<?php echo __('省エネ対策メニューへ'); ?></a>
<?php }else{ ?>
<a href="#" onClick="submit_frm_po_08();"><?php echo __('次へ'); ?></a>
<?php } ?></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>$previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_po_08(){	
	document.forms['EnergyInputForm'].submit();	
}
</script>

</div>