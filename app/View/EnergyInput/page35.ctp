<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('ポンプ計算入力'); ?></h1>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup35.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page35'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<input type="hidden" name="act" value="0" id="act" class="select">

<table class="checkBoxTable">
<tr>
<th><label for="Z"><?php echo __('全楊程'); ?></label></th>
<td><?php $vZ = (isset($EnergyInput['page35']['Z'][$act]))? $EnergyInput['page35']['Z'][$act] : '';
echo $this->Form->input('Z',
		array(
			'id' => 'Z',
			'type' => 'text',			
			'value' => $vZ,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td></tr>
<tr>
<th><label for="Ph"><?php echo __('入口での静圧'); ?></label></th>
<td><?php $vPh = (isset($EnergyInput['page35']['Ph'][$act]))? $EnergyInput['page35']['Ph'][$act] : '';
echo $this->Form->input('Ph',
		array(
			'id' => 'Ph',
			'type' => 'text',			
			'value' => $vPh,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kPa</td>
</tr>
<tr>
<th><label for="Rouf"><?php echo __('流体密度'); ?></label></th>
<td><?php $vRouf = (isset($EnergyInput['page35']['Rouf'][$act]))? $EnergyInput['page35']['Rouf'][$act] : '';
echo $this->Form->input('Rouf',
		array(
			'id' => 'Rouf',
			'type' => 'text',			
			'value' => $vRouf,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>T/m<sup>3</sup></td></tr>
<tr>
<th><label for="U"><?php echo __('供給点で計測された流速'); ?></label></th>
<td><?php $vU = (isset($EnergyInput['page35']['U'][$act]))? $EnergyInput['page35']['U'][$act] : '';
echo $this->Form->input('U',
		array(
			'id' => 'U',
			'type' => 'text',			
			'value' => $vU,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m/s</td>
</tr>
<tr>
<th><label for="Rf"><?php echo __('流体の装置入口での流量'); ?></label></th>
<td><?php $vRf = (isset($EnergyInput['page35']['Rf'][$act]))? $EnergyInput['page35']['Rf'][$act] : '';
echo $this->Form->input('Rf',
		array(
			'id' => 'Rf',
			'type' => 'text',			
			'value' => $vRf,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m<sup>3</sup>/min</td>
</tr>
<tr>
<th><label for="Amp"><?php echo __('裕度（ポンプ）'); ?></label></th>
<td><?php $vAmp = (isset($EnergyInput['page35']['Amp'][$act]))? $EnergyInput['page35']['Amp'][$act] : '';
echo $this->Form->input('Amp',
		array(
			'id' => 'Amp',
			'type' => 'text',			
			'value' => $vAmp,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label for="Etasp"><?php echo __('静圧効率（ポンプ）'); ?></label></th>
<td><?php $vEtasp = (isset($EnergyInput['page35']['Etasp'][$act]))? $EnergyInput['page35']['Etasp'][$act] : '';
echo $this->Form->input('Etasp',
		array(
			'id' => 'Etasp',
			'type' => 'text',			
			'value' => $vEtasp,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label for="Apu"><?php echo __('稼働率'); ?></label></th>
<td><?php $vApu = (isset($EnergyInput['page35']['Apu'][$act]))? $EnergyInput['page35']['Apu'][$act] : '';
echo $this->Form->input('Apu',
		array(
			'id' => 'Apu',
			'type' => 'text',			
			'value' => $vApu,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label for="Mpu"><?php echo __('補正係数'); ?></label></th>
<td><?php $vMpu = (isset($EnergyInput['page35']['Mpu'][$act]))? $EnergyInput['page35']['Mpu'][$act] : '1';
echo $this->Form->input('Mpu',
		array(
			'id' => 'Mpu',
			'type' => 'text',			
			'value' => $vMpu,
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

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p35();"><?php echo __('OK'); ?></a></p></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p35(){
	var act = opener.document.activeElement;			
	var idAct = $(act).attr("id");
	$("#act").val(idAct);
	
	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!isNumberic($("#Z").val()) || $("#Z").val()<=-1.0){
		mes_err += "<?php echo __('全楊程に数値を入力してください');?>\n";
		mes_err += "<?php echo __('全楊程に-1.0より大きく入力してください');?>\n";	
		id_err.push("Z");
		chk = false;	
	}
	if(!isNumberic($("#Ph").val()) || $("#Ph").val()<0.0){
		mes_err += "<?php echo __('入口での静圧に数値を入力してください');?>\n";
		mes_err += "<?php echo __('入口での静圧に0.0より大きく入力してください');?>\n";	
		id_err.push("Ph");
		chk = false;
	}

	if(!isNumberic($("#Rouf").val()) || $("#Rouf").val()<0.0){
		mes_err += "<?php echo __('流体密度に数値を入力してください');?>\n";
		mes_err += "<?php echo __('流体密度に0.0より大きく入力してください');?>\n";	
		id_err.push("Rouf");
		chk = false;	
	}

	if(!isNumberic($("#U").val()) || $("#U").val()<0.0){
		mes_err += "<?php echo __('供給点で計測された流速に数値を入力してください');?>\n";
		mes_err += "<?php echo __('供給点で計測された流速に0.0より大きく入力してください');?>\n";	
		id_err.push("U");
		chk = false;	
	}

	if(!isNumberic($("#Rf").val()) || $("#Rf").val()<0.0){
		mes_err += "<?php echo __('流体の装置入口での流量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('流体の装置入口での流量に0.0より大きく入力してください');?>\n";	
		id_err.push("Rf");
		chk = false;	
	}

	if(!isNumberic($("#Amp").val()) || $("#Amp").val()<0.0){
		mes_err += "<?php echo __('裕度（ポンプ）に数値を入力してください');?>\n";
		mes_err += "<?php echo __('裕度（ポンプ）に0.0より入力してください');?>\n";	
		id_err.push("Amp");
		chk = false;
	}

	if(!isNumberic($("#Etasp").val()) || $("#Etasp").val()<0.0){
		mes_err += "<?php echo __('静圧効率（ポンプ）に数値を入力してください');?>\n";
		mes_err += "<?php echo __('静圧効率（ポンプ）に0.0より大きく入力してください');?>\n";	
		id_err.push("Etasp");
		chk = false;
	}

	if(!isNumberic($("#Apu").val()) || $("#Apu").val()<0.0){
		mes_err += "<?php echo __('稼働率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('稼働率に0.0より大きく入力してください');?>\n";	
		id_err.push("Apu");
		chk = false;	
	}

	if(!isNumberic($("#Mpu").val()) || $("#Mpu").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";	
		id_err.push("Mpu");
		chk = false;	
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page35",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act13": 
					$("#Eaux_pump1", opener.document).val(responce);
					break;
				case "act23": 
					$("#Eaux_pump2", opener.document).val(responce);
					break;
				case "act33": 
					$("#Eaux_pump3", opener.document).val(responce);
					break;
				case "act43": 
					$("#Eaux_pump4", opener.document).val(responce);
					break;
				case "act53": 
					$("#Eaux_pump5", opener.document).val(responce);
					break;
				case "act63": 
					$("#Eaux_pump6", opener.document).val(responce);
					break;
				case "act73": 
					$("#Eaux_pump7", opener.document).val(responce);
					break;
				case "act83": 
					$("#Eaux_pump8", opener.document).val(responce);
					break;
				case "act93": 
					$("#Eaux_pump9", opener.document).val(responce);
					break;
				case "act103": 
					$("#Eaux_pump10", opener.document).val(responce);
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