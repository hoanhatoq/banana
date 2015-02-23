<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('金属部品伝導損失計算入力');?></h1>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。');?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup28.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説');?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page28'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="act" value="0" id="act" class="select">
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tr>
<th><label for="Lw"><?php echo __('炉壁厚さ');?></label></th>
<td><?php $vLw = (isset($EnergyInput['page28']['Lw'][$act]))? $EnergyInput['page28']['Lw'][$act] : '0';
echo $this->Form->input('Lw',
		array(
			'id' => 'Lw',
			'type' => 'text',			
			'value' => $vLw,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
<th><label for="Sparts"><?php echo __('当該路部品の断面積');?></label></th>
<td><?php $vSparts = (isset($EnergyInput['page28']['Sparts'][$act]))? $EnergyInput['page28']['Sparts'][$act] : '0';
echo $this->Form->input('Sparts',
		array(
			'id' => 'Sparts',
			'type' => 'text',			
			'value' => $vSparts,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m<sup>2</sup></td>
</tr>

<tr>
<th><label for="Tz"><?php echo __('炉内温度');?></label></th>
<td><?php $vTz = (isset($EnergyInput['page28']['Tz'][$act]))? $EnergyInput['page28']['Tz'][$act] : '0';
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
<th><label for="Ta"><?php echo __('外気温度');?></label></th>
<td><?php $vTa = (!isset($EnergyInput['page28']['Ta'][$act]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTa = (isset($EnergyInput['page28']['Ta'][$act]))? $EnergyInput['page28']['Ta'][$act] : $vTa;
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
<th><label for="Np"><?php echo __('同一計算条件の数');?></label></th>
<td><?php $vNp = (isset($EnergyInput['page28']['Np'][$act]))? $EnergyInput['page28']['Np'][$act] : '1';
echo $this->Form->input('Np',
		array(
			'id' => 'Np',
			'type' => 'text',			
			'value' => $vNp,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?><?php echo __('ヶ');?></td>
<th><label for="Mpa"><?php echo __('補正係数');?></label></th>
<td><?php $vMpa = (isset($EnergyInput['page28']['Mpa'][$act]))? $EnergyInput['page28']['Mpa'][$act] : '1';
echo $this->Form->input('Mpa',
		array(
			'id' => 'Mpa',
			'type' => 'text',			
			'value' => $vMpa,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
</tr>

<tr>
<th><label for="Kparts"><?php echo __('部品の熱伝導率');?></label></th>
<td><?php $vKparts = (isset($EnergyInput['page28']['Kparts'][$act]))? $EnergyInput['page28']['Kparts'][$act] : '';
echo $this->Form->input('Kparts',
		array(
			'id' => 'Kparts',
			'type' => 'text',			
			'value' => $vKparts,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>W/m℃</td>
<td colspan="2"></td>
</tr>

</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p28();"><?php echo __('OK');?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル');?></a></p></div>

<div class="clr"></div>


<script type="text/javascript"> 
function submit_frm_p28(){
	var act = opener.document.activeElement;		
	var idAct = $(act).attr("id");	
	$("#act").val(idAct);
	
	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!isNumberic($("#Lw").val()) || $("#Lw").val()<0.0){
		mes_err += "<?php echo __('炉壁厚さに数値を入力してください');?>\n";
		mes_err += "<?php echo __('炉壁厚さに0.0より大きく入力してください');?>\n";		
		id_err.push("Lw");
		chk = false;	
	}

	if(!isNumberic($("#Sparts").val()) || $("#Sparts").val()<0.0){
		mes_err += "<?php echo __('当該路部品の断面積に数値を入力してください');?>\n";
		mes_err += "<?php echo __('当該路部品の断面積に0.0より大きく入力してください');?>\n";		
		id_err.push("Sparts");
		chk = false;	
	}

	if(!isNumberic($("#Tz").val())){
		mes_err += "<?php echo __('炉内温度に数値を入力してください');?>\n";		
		id_err.push("Tz");
		chk = false;	
	} 

	if(!isNumberic($("#Ta").val())){
		mes_err += "<?php echo __('外気温度に数値を入力してください');?>\n";		
		id_err.push("Ta");
		chk = false;	
	} 

	if(!isNumberic($("#Np").val()) || $("#Np").val()<0.0){
		mes_err += "<?php echo __('同一計算条件の数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('同一計算条件の数に0.0より大きく入力してください');?>\n";		
		id_err.push("Np");
		chk = false;	
	} 

	if(!isNumberic($("#Mpa").val()) || $("#Mpa").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";		
		id_err.push("Mpa");
		chk = false;
	} 

	if(!isNumberic($("#Kparts").val()) || $("#Kparts").val()<=0){
		mes_err += "<?php echo __('部品の熱伝導率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('部品の熱伝導率に0.0より大きく入力してください');?>\n";		
		id_err.push("Kparts");
		chk = false;	
	}
	
	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page28",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act16": 
					$("#El_parts1", opener.document).val(responce);
					break;
				case "act26": 
					$("#El_parts2", opener.document).val(responce);
					break;
				case "act36": 
					$("#El_parts3", opener.document).val(responce);
					break;
				case "act46": 
					$("#El_parts4", opener.document).val(responce);
					break;
				case "act56": 
					$("#El_parts5", opener.document).val(responce);
					break;
				case "act66": 
					$("#El_parts6", opener.document).val(responce);
					break;
				case "act76": 
					$("#El_parts7", opener.document).val(responce);
					break;
				case "act86": 
					$("#El_parts8", opener.document).val(responce);
					break;
				case "act96": 
					$("#El_parts9", opener.document).val(responce);
					break;
				case "act106": 
					$("#El_parts10", opener.document).val(responce);
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
<div class="clr"></div>
</div>
</div>