<div class="content_box">
<h2><?php echo __('JIGデータ入力'); ?></h2>
<p class="text"><?php echo __('入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup18.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('page18', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page18'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable tbl">
<tr>
<th colspan="2" class="name"><?php echo __('JIG材料'); ?></th>
<th><?php echo __('ジグ等挿入重量'); ?></th>
<th><?php echo __('JIG等挿入温度'); ?></th>
<th><?php echo __('JIG等抽出温度'); ?></th>
</tr>
<tr>
<td class="radio"><p class="cul2"><a id="act1" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page19/1")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('選択'); ?></a></p></td>
<td class="name2"><?php $vIjig1 = (isset($EnergyInput['Ijig'][1]))? $EnergyInput['Ijig'][1] : '';
echo $this->Form->input('Ijig[1]',
		array(
			'id' => 'Ijig1',
			'name' => 'data[energy_input][Ijig][1]',
			'type' => 'text',			
			'value' => $vIjig1,
			'class' => 'medium select',
			'readonly' => true,
			'hidden' => true,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
$vIjigName1 = (isset($EnergyInput['Ijig_name'][1]))? $EnergyInput['Ijig_name'][1] : '';
echo $this->Form->input('Ijig_name[1]',
		array(
			'id' => 'Ijig_name1',
			'name' => 'data[energy_input][Ijig_name][1]',
			'type' => 'text',			
			'value' => $vIjigName1,
			'class' => 'medium select',
			'readonly' => true,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
?></td>
<td><?php $vMj1 = (isset($EnergyInput['Mj'][1]))? $EnergyInput['Mj'][1] : '0';
echo $this->Form->input('Mj[1]',
		array(
			'id' => 'Mj1',
			'name' => 'data[energy_input][Mj][1]',
			'type' => 'text',			
			'value' => $vMj1,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>kg/t</td>
<td><?php $vTj11 = (!isset($EnergyInput['Tj1'][1]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTj11 = (isset($EnergyInput['Tj1'][1]))? $EnergyInput['Tj1'][1] : $vTj11;
echo $this->Form->input('Tj1[1]',
		array(
			'id' => 'Tj11',
			'name' => 'data[energy_input][Tj1][1]',
			'type' => 'text',			
			'value' => $vTj11,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>℃</td>
<td><?php $vTj21 = (isset($EnergyInput['Tj2'][1]))? $EnergyInput['Tj2'][1] : '';
echo $this->Form->input('Tj2[1]',
		array(
			'id' => 'Tj21',
			'name' => 'data[energy_input][Tj2][1]',
			'type' => 'text',			
			'value' => $vTj21,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>℃</td>
</tr>
<tr>
<td class="radio">
	<p class="cul2">
		<a id="act2" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page19/2")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('選択'); ?>
		</a>
	</p>
	<p class="cul2" style="width:40px">
		<a id="reset" href="#" onClick="reset_row2_Ijig();" style="color:#333"><?php echo __('クリア'); ?></a>
	</p>
</td>

<td class="name2"><?php $vIjig2 = (isset($EnergyInput['Ijig'][2]))? $EnergyInput['Ijig'][2] : '';
echo $this->Form->input('Ijig[2]',
		array(
			'id' => 'Ijig2',
			'name' => 'data[energy_input][Ijig][2]',
			'type' => 'text',			
			'value' => $vIjig2,
			'class' => 'medium select',
			'readonly' => true,
			'hidden' => true,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
$vIjigName2 = (isset($EnergyInput['Ijig_name'][2]))? $EnergyInput['Ijig_name'][2] : '';
echo $this->Form->input('Ijig_name[2]',
		array(
			'id' => 'Ijig_name2',
			'name' => 'data[energy_input][Ijig_name][2]',
			'type' => 'text',			
			'value' => $vIjigName2,
			'class' => 'medium select',
			'readonly' => true,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
?></td>
<td><?php $vMj2 = (isset($EnergyInput['Mj'][2]))? $EnergyInput['Mj'][2] : '';
echo $this->Form->input('Mj[2]',
		array(
			'id' => 'Mj2',
			'name' => 'data[energy_input][Mj][2]',
			'type' => 'text',			
			'value' => $vMj2,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>kg/t</td>
<td><?php //$vTj12 = (!isset($EnergyInput['Tj1'][2]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTj12 = (isset($EnergyInput['Tj1'][2]))? $EnergyInput['Tj1'][2] : '';
echo $this->Form->input('Tj1[2]',
		array(
			'id' => 'Tj12',
			'name' => 'data[energy_input][Tj1][2]',
			'type' => 'text',			
			'value' => $vTj12,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>℃</td>
<td><?php $vTj22 = (isset($EnergyInput['Tj2'][2]))? $EnergyInput['Tj2'][2] : '';
echo $this->Form->input('Tj2[2]',
		array(
			'id' => 'Tj22',
			'name' => 'data[energy_input][Tj2][2]',
			'type' => 'text',			
			'value' => $vTj22,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>℃</td>
</tr>
<tr>
<td class="radio">
	<p class="cul2">
		<a id="act3" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page19/3")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('選択'); ?>
		</a>
	</p>
	<p class="cul2" style="width:40px">
		<a id="reset" href="#" onClick="reset_row3_Ijig();" style="color:#333"><?php echo __('クリア'); ?></a>
	</p>
</td>
<td class="name2"><?php $vIjig3 = (isset($EnergyInput['Ijig'][3]))? $EnergyInput['Ijig'][3] : '';
echo $this->Form->input('Ijig[3]',
		array(
			'id' => 'Ijig3',
			'name' => 'data[energy_input][Ijig][3]',
			'type' => 'text',			
			'value' => $vIjig3,
			'class' => 'medium select',
			'readonly' => true,
			'hidden' => true,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
$vIjigName3 = (isset($EnergyInput['Ijig_name'][3]))? $EnergyInput['Ijig_name'][3] : '';
echo $this->Form->input('Ijig_name[3]',
		array(
			'id' => 'Ijig_name3',
			'name' => 'data[energy_input][Ijig_name][3]',
			'type' => 'text',			
			'value' => $vIjigName3,
			'class' => 'medium select',
			'readonly' => true,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
?></td>
<td><?php $vMj3 = (isset($EnergyInput['Mj'][3]))? $EnergyInput['Mj'][3] : '';
echo $this->Form->input('Mj[3]',
		array(
			'id' => 'Mj3',
			'name' => 'data[energy_input][Mj][3]',
			'type' => 'text',			
			'value' => $vMj3,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>kg/t</td>
<td><?php //$vTj13 = (!isset($EnergyInput['Tj1'][3]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTj13 = (isset($EnergyInput['Tj1'][3]))? $EnergyInput['Tj1'][3] : '';
echo $this->Form->input('Tj1[3]',
		array(
			'id' => 'Tj13',
			'name' => 'data[energy_input][Tj1][3]',
			'type' => 'text',			
			'value' => $vTj13,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>℃</td>
<td><?php $vTj23 = (isset($EnergyInput['Tj2'][3]))? $EnergyInput['Tj2'][3] : '';
echo $this->Form->input('Tj2[3]',
		array(
			'id' => 'Tj23',
			'name' => 'data[energy_input][Tj2][3]',
			'type' => 'text',			
			'value' => $vTj23,
			'label' => false,
			'div' => false,
			'class' => 'small'
		)
	); 
?>℃</td>
</tr>

</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>


<div class="btn_ok"><p><a href="#" onClick="submit_frm_p18();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>
<script type="text/javascript"> 
function submit_frm_p18(){
	var mes_err = "";
	var chk = true;
	var id_err = [];
	if(!isNumberic($("#Ijig1").val())){
		mes_err += "<?php echo __('JIG材料 1 に数値を入力してください');?>\n";		
		id_err.push("Ijig_name1");
		chk = false;	
	}
	// if($("#Ijig1").val()<0.0){
	// 	alert("<?php echo __('JIG材料 1 に0.0より大きく入力してください');?>");
	// 	$("#Ijig1").focus();
	// 	return false;	
	// }

	if(!isNumberic($("#Mj1").val()) || $("#Mj1").val()<0.0){
		mes_err += "<?php echo __('ジグ等挿入重量 1 に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ジグ等挿入重量 1 に0.0より大きく入力してください');?>\n";		
		id_err.push("Mj1");
		chk = false;
	}

	if(!isNumberic($("#Tj11").val())){
		mes_err += "<?php echo __('JIG等挿入温度 1に数値を入力してください');?>\n";		
		id_err.push("Tj11");
		chk = false;	
	}
	if(!isNumberic($("#Tj21").val())){
		mes_err += "<?php echo __('JIG等抽出温度 1 に数値を入力してください');?>\n";		
		id_err.push("Tj21");
		chk = false;
	}


	if(!isNumberic($("#Ijig2").val()) && $("#Ijig2").val().length>0 ){
		mes_err += "<?php echo __('JIG材料 2 に数値を入力してください');?>\n";		
		id_err.push("Ijig_name2");
		chk = false;	
	}
	// if($("#Ijig2").val()<0.0){
	// 	alert("<?php echo __('JIG材料 2 に0.0より大きく入力してください');?>");
	// 	$("#Ijig2").focus();
	// 	return false;	
	// }

	if( (!isNumberic($("#Mj2").val()) || $("#Mj2").val()<0.0) && $("#Ijig2").val().length>0 ){
		mes_err += "<?php echo __('ジグ等挿入重量 2 に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ジグ等挿入重量 2 に0.0より大きく入力してください');?>\n";		
		id_err.push("Mj2");
		chk = false;
	}

	if(!isNumberic($("#Tj12").val()) && $("#Ijig2").val().length>0 ){
		mes_err += "<?php echo __('JIG等挿入温度 2 に数値を入力してください');?>\n";		
		id_err.push("Tj12");
		chk = false;
	}
	if(!isNumberic($("#Tj22").val()) && $("#Ijig2").val().length>0 ){
		mes_err += "<?php echo __('JIG等抽出温度 2 に数値を入力してください');?>\n";		
		id_err.push("Tj22");
		chk = false;	
	}

	if(!isNumberic($("#Ijig3").val()) && $("#Ijig3").val().length>0 ){
		mes_err += "<?php echo __('JIG材料 3 に数値を入力してください');?>\n";		
		id_err.push("Ijig_name3");
		chk = false;	
	}
	// if($("#Ijig3").val()<0.0){
	// 	alert("<?php echo __('JIG材料 3 に0.0より大きく入力してください');?>");
	// 	$("#Ijig3").focus();
	// 	return false;	
	// }
	if( (!isNumberic($("#Mj3").val()) || $("#Mj3").val()<0.0) && $("#Ijig3").val().length>0 ){
		mes_err += "<?php echo __('ジグ等挿入重量 3 に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ジグ等挿入重量 3 に0.0より大きく入力してください');?>\n";		
		id_err.push("Mj3");
		chk = false;
	}
	
	if(!isNumberic($("#Tj13").val()) && $("#Ijig3").val().length>0 ){
		mes_err += "<?php echo __('JIG等挿入温度 3 に数値を入力してください');?>\n";		
		id_err.push("Tj13");
		chk = false;
	}
	if(!isNumberic($("#Tj23").val()) && $("#Ijig3").val().length>0 ){
		mes_err += "<?php echo __('JIG等抽出温度 3 に数値を入力してください');?>\n";		
		id_err.push("Tj23");
		chk = false;
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}
	document.forms['EnergyInputForm'].submit();
}
function reset_row2_Ijig(){
	$("#Ijig2").val("");
	$("#Ijig_name2").val("");
	$("#Mj2").val("");
	$("#Tj12").val("");
	$("#Tj22").val("");
}
function reset_row3_Ijig(){
	$("#Ijig3").val("");
	$("#Ijig_name3").val("");
	$("#Mj3").val("");
	$("#Tj13").val("");
	$("#Tj23").val("");
}
</script>

</div>