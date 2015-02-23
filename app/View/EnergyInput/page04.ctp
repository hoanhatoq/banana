<div class="content_box">
<h2><?php echo __('ヒートバランス表選択'); ?></h2>
<p class="text"><?php echo __('選択してOKボタンを押してください（複数選択可能です）。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup04.html")); ?>', '', 'scrollbars=yes, Width=400, Height=400'); w.focus();"><?php echo __('解説'); ?></a></p></div>
<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page04'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<ul class="checkBoxList2">
<li><?php $vIbd1 = (isset($EnergyInput['Ibd1']) && $EnergyInput['Ibd1'] != 1) ? false : true;
	echo $this->Form->checkbox('Ibd1', array(
    	'id' => 'Ibd1',
    	'value' => '1',
    	'class' => 'Ibd',
    	'hiddenField' => false,
    	'checked' => $vIbd1
	));
?><label for="Ibd1"><?php echo __('総合効率評価'); ?></label></li>
<li><?php $vIbd2 = (isset($EnergyInput['Ibd2']) && $EnergyInput['Ibd2'] == 1) ? true : false;
	echo $this->Form->checkbox('Ibd2', array(
    	'id' => 'Ibd2',
    	'value' => '1',
    	'class' => 'Ibd',
    	'hiddenField' => false,
    	'checked' => $vIbd2
	));
?><label for="Ibd2"><?php echo __('熱交換器を含む加熱室'); ?></label></li>
<li><?php $vIbd3 = (isset($EnergyInput['Ibd3']) && $EnergyInput['Ibd3'] == 1) ? true : false;
	echo $this->Form->checkbox('Ibd3', array(
    	'id' => 'Ibd3',
    	'value' => '1',
    	'class' => 'Ibd',
    	'hiddenField' => false,
    	'checked' => $vIbd3
	));
?><label for="Ibd3"><?php echo __('加熱室のみ'); ?></label></li>
</ul>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p04();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p04(){	
	if(!$('.Ibd').is(':checked')){
		alert("<?php echo __('一つ項目以上を選択してください');?>");
		return false;	
	}
    
	document.forms['EnergyInputForm'].submit();
}
</script>

</div>