<div class="content_box">
<h2><?php echo __('既定燃料選択'); ?></h2>
<p class="text"><?php echo __('燃料をひとつだけ選択してください。<br>選択が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup08.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page08'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxList4 tbl">
<tbody><tr class="off">
<th><?php echo __('選択'); ?></th>
<th class="name"><?php echo __('使用燃料 (使用燃料名)'); ?></th>
<th><?php echo __('HL値 (低位発熱量)'); ?></th>
<th><?php echo __('A0値 (理論空気量)'); ?></th>
<th><?php echo __('G0値 (理論湿り<br>排ガス量)'); ?></th>
<th><?php echo __('GOD値 (理論乾き<br>排ガス量)'); ?></th>
</tr>
<?php 
$vIfuel = (isset($EnergyInput['Ifuel'])) ? $EnergyInput['Ifuel'] : '';	
foreach($FUELDATA as $kItem => $item){	
	if($kItem ==17) break;
	if($kItem%2 == 0 ){
		echo '<tr class="off">';
	}else{
		echo '<tr class="on">';
	}
?>
<td class="radio"><?php 
	echo $this->Form->radio(
				'Ifuel', 
				array(					
					$kItem => ''
				), 
				array(
					'value' => $vIfuel,
					'legend' => false,
					'label' => false,
					'class' => 'Ifuel',
					'id' => false,
					'hiddenField' => false
				)
				);
	?></td>
<td class="name"><label for="<?php echo $kItem;?>"><?php echo $item[0]; ?></label></td>
<td><?php echo $item[1]*1000; ?></td>
<td><?php echo $item[3]; ?></td>
<td><?php echo $item[4]; ?></td>
<td><?php echo $item[5]; ?></td>
</tr>
<?php
	}
?>

</tbody></table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok_top">
<div class="btn_ok"><p><a href="#" onClick="submit_frm_p08();" ><?php echo __('OK'); ?></a></p></div>
</div>
<div class="clr after"></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>

<!--<div class="clr"></div>
<div class="scroll">
<div class="btn_scroll"><p><a href="#btn_ok">▼ページ下へ</a></p></div>
</div>-->
<script type="text/javascript"> 
function submit_frm_p08(){
	if(!$(".Ifuel").is(":checked")){
		alert("<?php echo __('燃料をひとつ選択してください');?>");
		return false;
	}
	document.forms['EnergyInputForm'].submit();
}
</script>

</div>