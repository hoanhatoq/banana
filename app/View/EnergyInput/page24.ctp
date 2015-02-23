<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('冷却水損失計算入力');?></h1>
<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。');?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup24.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説');?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page24'),
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
<th><label for="Vcw"><?php echo __('冷却水量');?></label></th>
<td><?php $vVcw = (isset($EnergyInput['page24']['Vcw'][$act]))? $EnergyInput['page24']['Vcw'][$act] : '';
echo $this->Form->input('Vcw',
		array(
			'id' => 'Vcw',
			'type' => 'text',			
			'value' => $vVcw,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kg/t</td>
<th><label for="Twater_out"><?php echo __('冷却水出口温度');?></label></th>
<td><?php //$vTwater_out = (!isset($EnergyInput['page24']['Twater_out'][$act]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTwater_out = (isset($EnergyInput['page24']['Twater_out'][$act]))? $EnergyInput['page24']['Twater_out'][$act] : '';
echo $this->Form->input('Twater_out',
		array(
			'id' => 'Twater_out',
			'type' => 'text',			
			'value' => $vTwater_out,	
			'class' => 'small',		
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label for="Twater_in"><?php echo __('冷却水入口温度');?></label></th>
<td><?php $vTwater_in = (!isset($EnergyInput['page24']['Twater_out'][$act]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTwater_in = (isset($EnergyInput['page24']['Twater_in'][$act]))? $EnergyInput['page24']['Twater_in'][$act] : $vTwater_in;
echo $this->Form->input('Twater_in',
		array(
			'id' => 'Twater_in',
			'type' => 'text',			
			'value' => $vTwater_in,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
<th><label for="Mcw"><?php echo __('補正係数');?></label></th>
<td><?php $vMcw = (isset($EnergyInput['page24']['Mcw'][$act]))? $EnergyInput['page24']['Mcw'][$act] : '1.0';
echo $this->Form->input('Mcw',
		array(
			'id' => 'Mcw',
			'type' => 'text',			
			'value' => $vMcw,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
</tr>
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>
<div class="btn_ok"><p><a href="#" onclick="submit_frm_p24();"><?php echo __('OK');?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル');?></a></p></div>
</div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p24(){
	var act = opener.document.activeElement;		
	var idAct = $(act).attr("id");	
	$("#act").val(idAct);
	
	var mes_err = "";
	var id_err = [];
	var chk = true;
	
	if(!isNumberic($("#Vcw").val()) || $("#Vcw").val()<=0.0 ){
		mes_err += "<?php echo __('冷却水量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('冷却水量に0.0より大きく入力してください');?>\n";		
		id_err.push("Vcw");
		chk = false;	
	}
	if(!isNumberic($("#Twater_out").val())){
		mes_err += "<?php echo __('冷却水出口温度に数値を入力してください');?>\n";		
		id_err.push("Twater_out");
		chk = false;	
	}
	if(!isNumberic($("#Twater_in").val())){
		mes_err += "<?php echo __('冷却水入口温度に数値を入力してください');?>\n";		
		id_err.push("Twater_in");
		chk = false;	
	}
	if(!isNumberic($("#Mcw").val()) || $("#Mcw").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";		
		id_err.push("Mcw");
		chk = false;	
	} 

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page24",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act13": 
					$("#El_cw1", opener.document).val(responce);
					break;
				case "act23": 
					$("#El_cw2", opener.document).val(responce);
					break;
				case "act33": 
					$("#El_cw3", opener.document).val(responce);
					break;
				case "act43": 
					$("#El_cw4", opener.document).val(responce);
					break;
				case "act53": 
					$("#El_cw5", opener.document).val(responce);
					break;
				case "act63": 
					$("#El_cw6", opener.document).val(responce);
					break;
				case "act73": 
					$("#El_cw7", opener.document).val(responce);
					break;
				case "act83": 
					$("#El_cw8", opener.document).val(responce);
					break;
				case "act93": 
					$("#El_cw9", opener.document).val(responce);
					break;
				case "act103": 
					$("#El_cw10", opener.document).val(responce);
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