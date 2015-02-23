<div class="content_box">
<h2><?php echo __('雰囲気ガス損失データ入力'); ?></h2>
<p class="text"><?php echo __('入力が終了したらOKボタンを押してください'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup13.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page13'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tbody><tr>
<th><label for="Tatm1"><?php echo __('雰囲気ガス入口温度'); ?></label></th>
<td><?php $vTatm1 = (!isset($EnergyInput['Tatm1']) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTatm1 = (isset($EnergyInput['Tatm1']))? $EnergyInput['Tatm1'] : $vTatm1;
echo $this->Form->input('Tatm1',
		array(
			'id' => 'Tatm1',
			'type' => 'text',			
			'value' => $vTatm1,			
			'label' => false,
			'class' => 'small',
			'div' => false
		)
	); 
?>℃</td>
<th><label for="Tatm2"><?php echo __('雰囲気ガス出口温度'); ?></label></th>
<td><?php $vTatm2 = (!isset($EnergyInput['Tatm2']) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTatm2 = (isset($EnergyInput['Tatm2']))? $EnergyInput['Tatm2'] : $vTatm2;
echo $this->Form->input('Tatm2',
		array(
			'id' => 'Tatm2',
			'type' => 'text',			
			'value' => $vTatm2,			
			'label' => false,
			'class' => 'small',
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label for="Vatm"><?php echo __('雰囲気ガス量'); ?></label></th>
<td><?php $vVatm = (isset($EnergyInput['Vatm']))? $EnergyInput['Vatm'] : '0';
echo $this->Form->input('Vatm',
		array(
			'id' => 'Vatm',
			'type' => 'text',			
			'value' => $vVatm,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m<sup>2</sup>(n)/t</td>
<td colspan="2"></td>
</tr>
</tbody></table>

<ul class="checkBoxList8">
<li></li>
<li class="right"></li>
<li class="right"></li>
</ul>
<div class="clr"></div>

<p class="text"><?php echo __('雰囲気ガスを選定してください'); ?></p>

<table class="checkBoxList4 tbl">
<tbody><tr class="off">
<th class="radio"><?php echo __('選択'); ?></th>
<th class="name"><?php echo __('名称'); ?></th>
<th><?php echo __('CO2'); ?>(%)</th>
<th><?php echo __('CO'); ?>(%)</th>
<th><?php echo __('H2'); ?>(%)</th>
<th><?php echo __('CH4'); ?>(%)</th>
<th><?php echo __('N2'); ?>(%)</th>
</tr>
<?php 
$vIatm = (isset($EnergyInput['Iatm'])) ? $EnergyInput['Iatm'] : '';	
foreach($CATM as $kItem => $item){
	if($kItem%2 == 0 ){
		echo '<tr class="off">';
	}else{
		echo '<tr class="on">';
	}
?>
<td class="radio"><?php 
	echo $this->Form->radio(
				'Iatm', 
				array(					
					$kItem => ''
				), 
				array(
					'value' => $vIatm,
					'legend' => false,
					'label' => false,
					'class' => 'Iatm',
					'id' => false,
					'hiddenField' => false
				)
				);
	?></td>
<td class="name"><label for="<?php echo $kItem;?>"><?php echo 'Iatm('.$kItem.')'; ?></label></td>
<td><?php echo $item[1]; ?></td>
<td><?php echo $item[2]; ?></td>
<td><?php echo $item[3]; ?></td>
<td><?php echo $item[4]; ?></td>
<td><?php echo $item[5]; ?></td>
</tr>
<?php } ?>
</tbody></table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok_top">
<div id="btn_ok" class="btn_ok"><p><a href="#" onClick="submit_frm_p13();" ><?php echo __('OK'); ?></a></p></div>
</div>
<div class="clr after"></div>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>

<!--<div class="scroll">
<div class="btn_scroll"><p><a href="#btn_ok">▼ページ下へ</a></p></div>
</div>
<div class="clr after"></div>-->

<script type="text/javascript"> 
function submit_frm_p13(){
	var mes_err = "";
	var chk = true;
	var id_err = [];
	if(!isNumberic($("#Tatm1").val())){
		mes_err += "<?php echo __('雰囲気ガス入口温度に数値を入力してください');?>\n";		
		id_err.push("Tatm1");
		chk = false;
	}
	
	if(!isNumberic($("#Tatm2").val())){
		mes_err += "<?php echo __('雰囲気ガス出口温度に数値を入力してください');?>\n";		
		id_err.push("Tatm2");
		chk = false;	
	}

	if(!isNumberic($("#Vatm").val()) || $("#Vatm").val()<0.0){
		mes_err += "<?php echo __('雰囲気ガス量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('雰囲気ガス量に0.0より大きく入力してください');?>\n";		
		id_err.push("Vatm");
		chk = false;	
	}
	
	if(!$(".Iatm").is(":checked")){
		mes_err += "<?php echo __('雰囲気ガスを選定してください');?>\n";
		chk = false;
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}
	document.forms['EnergyInputForm'].submit();
}
</script>

</div>