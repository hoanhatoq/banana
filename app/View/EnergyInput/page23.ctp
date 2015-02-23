<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('開口部損失計算入力');?></h1>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください');?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup23.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説');?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page23'),
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
<th><label for="Iopen"><?php echo __('開口部形状選択');?></label></th>
<td colspan="3" class="radiolist"><?php $vIopen = (isset($EnergyInput['page23']['Iopen'][$act])) ? $EnergyInput['page23']['Iopen'][$act]: '';
	echo $this->Form->radio(
				'Iopen', 
				array(
					'1' => __('円'),
					'2' => __('正方形'),
					'3' => __('2:1長方形'),
					'4' => __('スリット'),
				), 
				array(
					'value' => $vIopen,
					'legend' => false,					
					'class' => 'Iopen',
					'id' => 'Iopen',
					'hiddenField' => false
				)
				);
	?></td>
</tr>
<tr>
<th><label for="Lwall"><?php echo __('壁厚');?></label></th>
<td><?php $vLwall = (isset($EnergyInput['page23']['Lwall'][$act]))? $EnergyInput['page23']['Lwall'][$act] : '';
echo $this->Form->input('Lwall',
		array(
			'id' => 'Lwall',
			'type' => 'text',			
			'value' => $vLwall,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
<th><label for="D"><?php echo __('直径または最少幅');?></label></th>
<td><?php $vD = (isset($EnergyInput['page23']['D'][$act]))? $EnergyInput['page23']['D'][$act] : '';
echo $this->Form->input('D',
		array(
			'id' => 'D',
			'type' => 'text',			
			'value' => $vD,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td></tr>
<tr>
<th><label for="Mopen"><?php echo __('補正係数');?></label></th>
<td><?php $vMopen = (isset($EnergyInput['page23']['Mopen'][$act]))? $EnergyInput['page23']['Mopen'][$act] : '1.0';
echo $this->Form->input('Mopen',
		array(
			'id' => 'Mopen',
			'type' => 'text',			
			'value' => $vMopen,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th><label for="Sopening"><?php echo __('開口部面積');?></label></th>
<td><?php $vSopening = (isset($EnergyInput['page23']['Sopening'][$act]))? $EnergyInput['page23']['Sopening'][$act] : '';
echo $this->Form->input('Sopening',
		array(
			'id' => 'Sopening',
			'type' => 'text',			
			'value' => $vSopening,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m<sup>2</sup></td></tr>
<tr>
<th><label for="Tz"><?php echo __('炉内温度');?></label></th>
<td><?php $vTz = (isset($EnergyInput['page23']['Tz'][$act]))? $EnergyInput['page23']['Tz'][$act] : '';
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
<td><?php $vTa = (!isset($EnergyInput['page23']['Ta'][$act]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTa = (isset($EnergyInput['page23']['Ta'][$act]))? $EnergyInput['page23']['Ta'][$act] : $vTa;
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
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p23();"><?php echo __('OK');?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル');?></a></p></div>
</div>

<script type="text/javascript"> 
function submit_frm_p23(){
	var act = opener.document.activeElement;		
	var idAct = $(act).attr("id");
	$("#act").val(idAct);

	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!$(".Iopen").is(":checked")){		
		mes_err += "<?php echo __('開口部形状を選択してください');?>\n";		
		id_err.push("Iopen1");
		chk = false;	
	}

	if(!isNumberic($("#Lwall").val()) || $("#Lwall").val()<0.0){
		mes_err += "<?php echo __('壁厚に数値を入力してください');?>\n";
		mes_err += "<?php echo __('壁厚に0.0より大きく入力してください');?>\n";		
		id_err.push("Lwall");
		chk = false;
	}
	if(!isNumberic($("#D").val()) || $("#D").val()<0.0){
		mes_err += "<?php echo __('直径または最少幅に数値を入力してください');?>\n";
		mes_err += "<?php echo __('直径または最少幅に0.0より大きく入力してください');?>\n";		
		id_err.push("D");
		chk = false;	
	}
	if(!isNumberic($("#Mopen").val()) || $("#Mopen").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";		
		id_err.push("Mopen");
		chk = false;
	}
	if(!isNumberic($("#Sopening").val()) || $("#Sopening").val()<0.0){
		mes_err += "<?php echo __('開口部面積に数値を入力してください');?>\n";
		mes_err += "<?php echo __('開口部面積に0.0より大きく入力してください');?>\n";		
		id_err.push("Sopening");
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

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page23",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act12": 
					$("#El_opening1", opener.document).val(responce);
					break;
				case "act22": 
					$("#El_opening2", opener.document).val(responce);
					break;
				case "act32": 
					$("#El_opening3", opener.document).val(responce);
					break;
				case "act42": 
					$("#El_opening4", opener.document).val(responce);
					break;
				case "act52": 
					$("#El_opening5", opener.document).val(responce);
					break;
				case "act62": 
					$("#El_opening6", opener.document).val(responce);
					break;
				case "act72": 
					$("#El_opening7", opener.document).val(responce);
					break;
				case "act82": 
					$("#El_opening8", opener.document).val(responce);
					break;
				case "act92": 
					$("#El_opening9", opener.document).val(responce);
					break;
				case "act102": 
					$("#El_opening10", opener.document).val(responce);
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
</div>