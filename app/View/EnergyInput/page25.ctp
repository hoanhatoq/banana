<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('蓄熱損失の計算データ');?></h1>
<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。');?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup25.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説');?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page25'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="act" value="0" id="act" class="select">
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<ul class="checkBoxList6">
<li></li>
<li></li>
<li></li>
</ul>

<table class="checkBoxTable">

<tr>
<th><label for="Tz"><?php echo __('炉内温度');?></label></th>
<td><?php $vTz = (isset($EnergyInput['page25']['Tz'][$act]))? $EnergyInput['page25']['Tz'][$act] : '';
echo $this->Form->input('Tz',
		array(
			'id' => 'Tz',
			'type' => 'text',			
			'value' => $vTz,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
<th><label for="Ta"><?php echo __('外表面温度');?></label></th>
<td><?php $vTa = (!isset($EnergyInput['page25']['Ta'][$act]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTa = (isset($EnergyInput['page25']['Ta'][$act]))? $EnergyInput['page25']['Ta'][$act] : $vTa;
echo $this->Form->input('Ta',
		array(
			'id' => 'Ta',
			'type' => 'text',			
			'value' => $vTa,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
</tr>

<tr>
<th><label for="Sa"><?php echo __('炉体表面積');?></label></th>
<td><?php $vSa = (isset($EnergyInput['page25']['Sa'][$act]))? $EnergyInput['page25']['Sa'][$act] : '';
echo $this->Form->input('Sa',
		array(
			'id' => 'Sa',
			'type' => 'text',			
			'value' => $vSa,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m<sup>2</sup></td>
<th></th>
<td></td>
</tr>

<tr>
<th><label for="Iwall_m1"><?php echo __('炉内第1層材質');?></label></th>
<td><p class="cul2"><a id="act1" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page26/1")); ?>','','scrollbars=yes,Width=860,Height=800');w.focus();"><?php echo __('選択');?></a></p><?php $vIwall_m1 = (isset($EnergyInput['page25']['Iwall_m1'][$act]))? $EnergyInput['page25']['Iwall_m1'][$act] : '';
echo $this->Form->input('Iwall_m1',
		array(
			'id' => 'Iwall_m1',
			'type' => 'text',			
			'value' => $vIwall_m1,
			'readonly' => true,
			'hidden' => true,
			'class' => 'medium select',
			'label' => false,
			'div' => false
		)
	); 
$vIwall_m_name1 = (isset($EnergyInput['page25']['Iwall_m_name1'][$act]))? $EnergyInput['page25']['Iwall_m_name1'][$act] : '';
echo $this->Form->input('Iwall_m_name1',
		array(
			'id' => 'Iwall_m_name1',
			'type' => 'text',			
			'value' => $vIwall_m_name1,
			'readonly' => true,
			'class' => 'medium select',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th><label for="Lw1"><?php echo __('第1層厚み');?></label></th>
<td><?php $vLw1 = (isset($EnergyInput['page25']['Lw1'][$act]))? $EnergyInput['page25']['Lw1'][$act] : '0';
echo $this->Form->input('Lw1',
		array(
			'id' => 'Lw1',
			'type' => 'text',			
			'value' => $vLw1,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>

<tr>
<th><label for="Iwall_m2"><?php echo __('炉内第2層材質');?></label></th>
<td><p class="cul2"><a id="act2" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page26/2")); ?>','','scrollbars=yes,Width=860,Height=800');w.focus();"><?php echo __('選択');?></a></p><?php $vIwall_m2 = (isset($EnergyInput['page25']['Iwall_m2'][$act]))? $EnergyInput['page25']['Iwall_m2'][$act] : '';
echo $this->Form->input('Iwall_m2',
		array(
			'id' => 'Iwall_m2',
			'type' => 'text',			
			'value' => $vIwall_m2,
			'readonly' => true,
			'hidden' => true,
			'class' => 'medium select',
			'label' => false,
			'div' => false
		)
	); 
$vIwall_m_name2 = (isset($EnergyInput['page25']['Iwall_m_name2'][$act]))? $EnergyInput['page25']['Iwall_m_name2'][$act] : '';
echo $this->Form->input('Iwall_m_name2',
		array(
			'id' => 'Iwall_m_name2',
			'type' => 'text',			
			'value' => $vIwall_m_name2,
			'readonly' => true,
			'class' => 'medium select',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th><label for="Lw2"><?php echo __('第2層厚み');?></label></th>
<td><?php $vLw2 = (isset($EnergyInput['page25']['Lw2'][$act]))? $EnergyInput['page25']['Lw2'][$act] : '0';
echo $this->Form->input('Lw2',
		array(
			'id' => 'Lw2',
			'type' => 'text',			
			'value' => $vLw2,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>

<tr>
<th><label for="Iwall_m3"><?php echo __('炉内第3層材質');?></label></th>
<td><p class="cul2"><a id="act3" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page26/3")); ?>','','scrollbars=yes,Width=860,Height=800');w.focus();"><?php echo __('選択');?></a></p><?php $vIwall_m3 = (isset($EnergyInput['page25']['Iwall_m3'][$act]))? $EnergyInput['page25']['Iwall_m3'][$act] : '';
echo $this->Form->input('Iwall_m3',
		array(
			'id' => 'Iwall_m3',
			'type' => 'text',			
			'value' => $vIwall_m3,
			'readonly' => true,
			'hidden' => true,
			'class' => 'medium select',
			'label' => false,
			'div' => false
		)
	); 
$vIwall_m_name3 = (isset($EnergyInput['page25']['Iwall_m_name3'][$act]))? $EnergyInput['page25']['Iwall_m_name3'][$act] : '';
echo $this->Form->input('Iwall_m_name3',
		array(
			'id' => 'Iwall_m_name3',
			'type' => 'text',			
			'value' => $vIwall_m_name3,
			'readonly' => true,
			'class' => 'medium select',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th><label for="Lw3"><?php echo __('第3層厚み');?></label></th>
<td><?php $vLw3 = (isset($EnergyInput['page25']['Lw3'][$act]))? $EnergyInput['page25']['Lw3'][$act] : '0';
echo $this->Form->input('Lw3',
		array(
			'id' => 'Lw3',
			'type' => 'text',			
			'value' => $vLw1,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>

<tr>
<th><label for="Iwall_m4"><?php echo __('炉内第4層材質');?></label></th>
<td><p class="cul2"><a id="act4" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page26/4")); ?>','','scrollbars=yes,Width=860,Height=800');w.focus();"><?php echo __('選択');?></a></p><?php $vIwall_m4 = (isset($EnergyInput['page25']['Iwall_m4'][$act]))? $EnergyInput['page25']['Iwall_m4'][$act] : '';
echo $this->Form->input('Iwall_m4',
		array(
			'id' => 'Iwall_m4',
			'type' => 'text',			
			'value' => $vIwall_m4,
			'readonly' => true,
			'hidden' => true,
			'class' => 'medium select',
			'label' => false,
			'div' => false
		)
	); 
$vIwall_m_name4 = (isset($EnergyInput['page25']['Iwall_m_name4'][$act]))? $EnergyInput['page25']['Iwall_m_name4'][$act] : '';
echo $this->Form->input('Iwall_m_name4',
		array(
			'id' => 'Iwall_m_name4',
			'type' => 'text',			
			'value' => $vIwall_m_name4,
			'readonly' => true,
			'class' => 'medium select',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th><label for="Lw4"><?php echo __('第4層厚み');?></label></th>
<td><?php $vLw4 = (isset($EnergyInput['page25']['Lw4'][$act]))? $EnergyInput['page25']['Lw4'][$act] : '0';
echo $this->Form->input('Lw4',
		array(
			'id' => 'Lw4',
			'type' => 'text',			
			'value' => $vLw4,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>

<tr>
<th><label for="Mst"><?php echo __('補正係数');?></label></th>
<td><?php $vMst = (isset($EnergyInput['page25']['Mst'][$act]))? $EnergyInput['page25']['Mst'][$act] : '1.0';
echo $this->Form->input('Mst',
		array(
			'id' => 'Mst',
			'type' => 'text',			
			'value' => $vMst,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th></th>
<td></td>
</tr>

</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p25();"><?php echo __('OK');?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル');?></a></p></div>
</div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p25(){
	var act = opener.document.activeElement;		
	var idAct = $(act).attr("id");	
	$("#act").val(idAct);
	
	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!isNumberic($("#Tz").val()) && $("#Tz").val().length>0){
		mes_err += "<?php echo __('炉内温度に数値を入力してください');?>\n";		
		id_err.push("Tz");
		chk = false;	
	}
	if(!isNumberic($("#Ta").val()) && $("#Ta").val().length>0){
		mes_err += "<?php echo __('外表面温度に数値を入力してください');?>\n";		
		id_err.push("Ta");
		chk = false;
	}
	if(!isNumberic($("#Sa").val()) || $("#Sa").val()<0.0){
		mes_err += "<?php echo __('炉体表面積に数値を入力してください');?>\n";
		mes_err += "<?php echo __('炉体表面積に0.0より大きく入力してください');?>\n";		
		id_err.push("Sa");
		chk = false;	
	}
	if(!isNumberic($("#Iwall_m1").val())){
		mes_err += "<?php echo __('炉内第1層材質に数値を入力してください');?>\n";		
		id_err.push("Iwall_m_name1");
		chk = false;	
	} 
	if(!isNumberic($("#Lw1").val()) || $("#Lw1").val()<0.0){
		mes_err += "<?php echo __('第1層厚みに数値を入力してください');?>\n";
		mes_err += "<?php echo __('第1層厚みに0.0より大きく入力してください');?>\n";		
		id_err.push("Lw1");
		chk = false;
	} 

	if(!isNumberic($("#Iwall_m2").val()) && $("#Iwall_m2").val().length>0 ){
		mes_err += "<?php echo __('炉内第2層材質に数値を入力してください');?>\n";		
		id_err.push("Iwall_m_name2");
		chk = false;	
	} 
	if( (!isNumberic($("#Lw2").val()) || $("#Lw2").val()<0.0) && $("#Lw2").val().length>0){
		mes_err += "<?php echo __('第2層厚みに数値を入力してください');?>\n";
		mes_err += "<?php echo __('第2層厚みに0.0より大きく入力してください');?>\n";		
		id_err.push("Lw2");
		chk = false;	
	} 

	if(!isNumberic($("#Iwall_m3").val()) && $("#Iwall_m3").val().length>0 ){
		mes_err += "<?php echo __('炉内第3層材質に数値を入力してください');?>\n";		
		id_err.push("Iwall_m_name3");
		chk = false;	
	} 
	if( (!isNumberic($("#Lw3").val()) || $("#Lw3").val()<0.0) &&  $("#Lw3").val().length>0){
		mes_err += "<?php echo __('第3層厚みに数値を入力してください');?>\n";
		mes_err += "<?php echo __('第3層厚みに0.0より大きく入力してください');?>\n";		
		id_err.push("Lw3");
		chk = false;	
	} 

	if(!isNumberic($("#Iwall_m4").val()) && $("#Iwall_m4").val().length>0 ){
		mes_err += "<?php echo __('炉内第4層材質に数値を入力してください');?>\n";		
		id_err.push("Iwall_m_name4");
		chk = false;
	} 
	if( (!isNumberic($("#Lw4").val()) || $("#Lw4").val()<0.0) && $("#Lw4").val().length>0 ){
		mes_err += "<?php echo __('第4層厚みに数値を入力してください');?>\n";
		mes_err += "<?php echo __('第4層厚みに0.0より大きく入力してください');?>\n";		
		id_err.push("Lw4");
		chk = false;	
	} 

	if(!isNumberic($("#Mst").val()) || $("#Mst").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";		
		id_err.push("Mst");
		chk = false;	
	} 

	if( $("#Iwall_m2").val().length==0 ){
		$("#Lw2").val("0");
	} 

	if( $("#Iwall_m3").val().length==0 ){
		$("#Lw3").val("0");
	} 

	if( $("#Iwall_m4").val().length==0 ){
		$("#Lw4").val("0");
	} 

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page25",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act14": 
					$("#El_storage1", opener.document).val(responce);
					break;
				case "act24": 
					$("#El_storage2", opener.document).val(responce);
					break;
				case "act34": 
					$("#El_storage3", opener.document).val(responce);
					break;
				case "act44": 
					$("#El_storage4", opener.document).val(responce);
					break;
				case "act54": 
					$("#El_storage5", opener.document).val(responce);
					break;
				case "act64": 
					$("#El_storage6", opener.document).val(responce);
					break;
				case "act74": 
					$("#El_storage7", opener.document).val(responce);
					break;
				case "act84": 
					$("#El_storage8", opener.document).val(responce);
					break;
				case "act94": 
					$("#El_storage9", opener.document).val(responce);
					break;
				case "act104": 
					$("#El_storage10", opener.document).val(responce);
					break;
			}
			window.close();	
		},
		error: function (){								
			alert("<?php echo __('例外エラーを発生してしまいました');?>");
			window.close();
		}
	});		
	
	return false;
}
</script>

</div>
