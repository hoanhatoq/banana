<div class="content_box">
<h2><?php echo __('炉の基本デ－タ入力'); ?></h2>
<p class="text"><?php echo __('入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup03.html")); ?>', '', 'scrollbars=yes, Width=400, Height=400'); w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page03'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tr>
<th><?php echo __('TPE名称'); ?></th>
<td><?php $vTPE_name = (isset($EnergyInput['TPE_name']))? $EnergyInput['TPE_name'] : '';
echo $this->Form->input('TPE_name',
		array(
			'id' => 'TPE_name',
			'type' => 'text',			
			'value' => $vTPE_name,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
?></td>
</tr>
<tr>
<th><?php echo __('型式'); ?></th>
<td><?php $vType = (isset($EnergyInput['Type']))? $EnergyInput['Type'] : '';
echo $this->Form->input('Type',
		array(
			'id' => 'Type',
			'type' => 'text',			
			'value' => $vType,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
?></td>
</tr>
<tr>
<th><?php echo __('処理形態'); ?></th>
<td><?php $vIbatch = (isset($EnergyInput['Ibatch'])) ? $EnergyInput['Ibatch']: '';
	echo $this->Form->radio(
				'Ibatch', 
				array(
					'1' => __('バッチ炉'),
					'2' => __('連続炉')
				), 
				array(
					'value' => $vIbatch,
					'legend' => false,					
					'id' => 'Ibatch',
					'class' => 'Ibatch',
					'hiddenField' => false
				)
		);
	?></td>
</tr>
<tr>
<th><label><?php echo __('周囲温度'); ?></label></th>
<td class="small"><?php $vTanb = (isset($EnergyInput['Tanb']))? $EnergyInput['Tanb'] : '20.0';
echo $this->Form->input('Tanb',
		array(
			'id' => 'Tanb',
			'type' => 'text',			
			'value' => $vTanb,
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label><?php echo __('周囲大気の相対湿度'); ?></label></th>
<td class="small"><?php $vFanb = (isset($EnergyInput['Fanb']))? $EnergyInput['Fanb'] : '0.0';
echo $this->Form->input('Fanb',
		array(
			'id' => 'Fanb',
			'type' => 'text',			
			'value' => $vFanb,
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label><?php echo __('加熱量'); ?></label></th>
<td class="small"><?php $vTPH = (isset($EnergyInput['TPH']))? $EnergyInput['TPH'] : '';
echo $this->Form->input('TPH',
		array(
			'id' => 'TPH',
			'type' => 'text',			
			'value' => $vTPH,
			'readonly' => true,
			'label' => false,
			'class' => 'select',
			'div' => false
		)
	); 
?>T/h</td>
</tr>
<tr>
<th><label><?php echo __('バッチ炉挿入量'); ?></label></th>
<td class="small"><?php $vTPC = (isset($EnergyInput['TPC']))? $EnergyInput['TPC'] : '';
echo $this->Form->input('TPC',
		array(
			'id' => 'TPC',
			'type' => 'text',			
			'value' => $vTPC,
			'readonly' => true,
			'label' => false,
			'class' => 'select',
			'div' => false
		)
	); 
?>Ton/Ch</td>
</tr>
<tr>
<th><label><?php echo __('加熱時間'); ?></label></th>
<td class="small"><?php $vTzairo = (isset($EnergyInput['Tzairo']))? $EnergyInput['Tzairo'] : '';
echo $this->Form->input('Tzairo',
		array(
			'id' => 'Tzairo',
			'type' => 'text',			
			'value' => $vTzairo,
			'readonly' => true,
			'label' => false,
			'class' => 'select',
			'div' => false
		)
	); 
?>Hr</td>
</tr>
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p03();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
if($('#Ibatch2').is(':checked')){
	$("#TPH").removeAttr("readonly");	
	$("#TPH").removeClass("select");
}
if($('#Ibatch1').is(':checked')){
	$("#TPC").removeAttr("readonly");		
	$("#TPC").removeClass("select");
	$("#Tzairo").removeAttr("readonly");	
	$("#Tzairo").removeClass("select");
}

$('#Ibatch2').change(function(){
	$("#TPH").removeAttr("readonly");	
	$("#TPH").val("");
	$("#TPH").removeClass("select");
	
	$("#TPC").val("");
	$("#TPC").attr("readonly", true);
	$("#TPC").addClass("select");
	$("#Tzairo").val("");
	$("#Tzairo").attr("readonly", true);	
	$("#Tzairo").addClass("select");
});

$('#Ibatch1').change(function(){	
	$("#TPC").removeAttr("readonly");		
	$("#TPC").removeClass("select");
	$("#TPC").val("");	
	$("#Tzairo").removeAttr("readonly");		
	$("#Tzairo").removeClass("select");
	$("#Tzairo").val("");
	

	$("#TPH").val("");
	$("#TPH").attr("readonly", true);
	$("#TPH").addClass("select");
});

$('#TPC').change(function(){
	if($('#Ibatch1').is(':checked')){
		var vTPC = 	$('#TPC').val();		
		if(vTPC==''){
			vTPC = 0;
		}
		var vTzairo = $('#Tzairo').val();
		if(vTzairo==''){
			vTzairo = 0;
		}

		var vTPH = 0;
		if(vTzairo!=0){
			vTPH = vTPC/vTzairo;
		}
		$('#TPH').val(vTPH);
	}	
});

$('#Tzairo').change(function(){
	if($('#Ibatch1').is(':checked')){
		var vTPC = 	$('#TPC').val();		
		if(vTPC==''){
			vTPC = 0;
		}
		var vTzairo = $('#Tzairo').val();
		if(vTzairo==''){
			vTzairo = 0;
		}

		var vTPH = 0;
		if(vTzairo!=0){
			vTPH = vTPC/vTzairo;
		}
		$('#TPH').val(vTPH);
	}	
});


function submit_frm_p03(){		
	var mes_err = "";
	var chk = true;
	var id_err = [];

	if($("#TPE_name").val().length<=1){
		mes_err += "<?php echo __('TPE名称に文字を入力してください');?>\n";
		id_err.push("TPE_name");
		chk = false;		
	}

	if($("#TPE_name").val().length>40){
		mes_err += "<?php echo __('TPE名称に40文字以内を入力してください');?>\n";
		id_err.push("TPE_name");
		chk = false;
	}
	
	if($("#Type").val().length<=1){
		mes_err += "<?php echo __('型式に文字を入力してください');?>\n";		
		id_err.push("Type");
		chk = false;
	}

	if($("#Type").val().length>40){
		mes_err += "<?php echo __('型式に40文字以内を入力してください');?>\n";		
		id_err.push("Type");
		chk = false;
	}

	if(!$('.Ibatch').is(':checked')){
		mes_err += "<?php echo __('処理形態を選択してください');?>\n";		
		chk = false;
	}

	if(!isNumberic($("#Tanb").val())){
		mes_err += "<?php echo __('周囲温度に数値を入力してください');?>\n";		
		id_err.push("Tanb");
		chk = false;
	}
	
	if(!isNumberic($("#Fanb").val()) || $("#Fanb").val() < 0.0){				
		mes_err += "<?php echo __('周囲大気の相対湿度に数値を入力してください');?>\n";
		mes_err += "<?php echo __('周囲大気の相対湿度に0.0より大きく入力してください');?>\n";
		id_err.push("Fanb");
		chk = false;
	}	

	if( $('#Ibatch2').is(':checked') && (!isNumberic($("#TPH").val()) || $("#TPH").val() < 0.0) ){		
		mes_err += "<?php echo __('加熱量に数値を入力してください');?>\n";		
		mes_err += "<?php echo __('加熱量に0.0より大きく入力してください');?>\n";		
		id_err.push("TPH");
		chk = false;
	}

	if( !$('#Ibatch2').is(':checked') && $("#TPH").val().length>0 && !isNumberic($("#TPH").val()) ){
		mes_err += "<?php echo __('加熱量に数値を入力してください');?>\n";		
		id_err.push("TPH");
		chk = false;
	}

	if( $('#Ibatch1').is(':checked')  && (!isNumberic($("#TPC").val()) || $("#TPC").val() < 0.0)){	
		mes_err += "<?php echo __('バッチ炉挿入量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('バッチ炉挿入量に0.0より大きく入力してください');?>\n";
		id_err.push("TPC");
		chk = false;
	}

	if( !$('#Ibatch1').is(':checked')  && $("#TPC").val().length>0 && !isNumberic($("#TPC").val()) ){
		mes_err += "<?php echo __('バッチ炉挿入量に数値を入力してください');?>\n";
		id_err.push("TPC");
		chk = false;
	}

	if( $('#Ibatch1').is(':checked')  && (!isNumberic($("#Tzairo").val()) ||  $("#Tzairo").val()<0.0)){	
		mes_err += "<?php echo __('加熱時間に数値を入力してください');?>\n";
		mes_err += "<?php echo __('加熱時間に0.0より大きく入力してください');?>\n";
		id_err.push("Tzairo");
		chk = false;
	}
		
	if( !$('#Ibatch1').is(':checked')  && $("#Tzairo").val().length>0 && !isNumberic($("#Tzairo").val()) ){
		mes_err += "<?php echo __('加熱時間に数値を入力してください');?>\n";		
		id_err.push("Tzairo");
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