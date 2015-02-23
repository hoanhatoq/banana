<div class="content_box">
<h2><?php echo __('雰囲気ガス製造用燃料入力'); ?></h2>
<p class="text"><?php echo __('入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup11.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page11'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<ul class="checkBoxList4">
<li><label for="1"><?php echo __('雰囲気ガス製造用燃料使用量'); ?> </label>
<?php $vVsource = (isset($EnergyInput['Vsource']))? $EnergyInput['Vsource'] : '0';
if(isset($EnergyInput['IND3']) && $EnergyInput['IND3']==1){
	echo $this->Form->input('Vsource',
		array(
			'id' => 'Vsource',
			'type' => 'text',			
			'value' => $vVsource,			
			'label' => false,
			'div' => false
		)
	); 
}else{
	echo $this->Form->input('Vsource',
		array(
			'id' => 'Vsource',
			'type' => 'text',			
			'value' => $vVsource,
			'readonly' => true,			
			'label' => false,
			'div' => false
		)
	); 
}
?>m<sup>3</sup>(n)/t<?php echo __('（気体燃料）'); ?>, kg/t<?php echo __('（液体燃料）'); ?></li>
</ul>

<table class="checkBoxList4 tbl">
<tbody><tr class="off">
<th class="radio"><?php echo __('選択'); ?></th>
<th class="name"><?php echo __('名称'); ?></th>
<th><?php echo __('低位発熱量'); ?></th>
<th><?php echo __('雰囲気ガス製造用燃料_A0 (理論空気量)'); ?></th>
<th><?php echo __('雰囲気ガス製造用燃料_G0 (理論湿り<br>排ガス量)'); ?></th>
<th><?php echo __('雰囲気ガス製造用燃料_G0D (理論乾き<br>排ガス量)'); ?></th>
</tr>
<?php 
$vIfuel3 = (isset($EnergyInput['Ifuel3'])) ? $EnergyInput['Ifuel3'] : '';	
foreach($FUELDATA as $kItem => $item){
	if($kItem==17) break;
	if($kItem%2 == 0 ){
		echo '<tr class="off">';
	}else{
		echo '<tr class="on">';
	}
?>
<td class="radio"><?php 
	echo $this->Form->radio(
				'Ifuel3', 
				array(					
					$kItem => ''
				), 
				array(
					'value' => $vIfuel3,
					'legend' => false,
					'label' => false,
					'class' => 'Ifuel3',
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
<div id="btn_ok" class="btn_ok"><p><a href="#" onClick="submit_frm_p11();" ><?php echo __('OK'); ?></a></p></div>
</div>
<div class="clr after"></div>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>
<div class="clr"></div>


<!--<div class="scroll">
<div class="btn_scroll"><p><a href="#btn_ok">▼ページ下へ</a></p></div>
</div>
<div class="clr after"></div>-->

<script type="text/javascript"> 
function submit_frm_p11(){
	var mes_err = "";
	var chk = true;
	if(!isNumberic($("#Vsource").val()) || $("#Vsource").val()<0.0){
		mes_err += "<?php echo __('雰囲気ガス製造用燃料使用量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('雰囲気ガス製造用燃料使用量に0.0より大きく入力してください');?>\n";
		$("#Vsource").focus();
		chk = false;
	}
	
	if(!$(".Ifuel3").is(":checked")){
		mes_err += "<?php echo __('燃料をひとつのみ選択してください');?>\n";
		chk = false;
	}

	if(!chk){
		alert(mes_err);
		return false;
	}
	
	document.forms['EnergyInputForm'].submit();
}
</script>

</div>