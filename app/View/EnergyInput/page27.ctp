<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('放炎損失計算入力');?></h1>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。');?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup27.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説');?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page27'),
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
<th><label for="Tgf"><?php echo __('放炎温度');?></label></th>
<td><?php $vTgf = (isset($EnergyInput['page27']['Tgf'][$act]))? $EnergyInput['page27']['Tgf'][$act] : '';
echo $this->Form->input('Tgf',
		array(
			'id' => 'Tgf',
			'type' => 'text',			
			'value' => $vTgf,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>

<th><label for="Lw"><?php echo __('壁厚み');?></label></th>
<td><?php $vLw = (isset($EnergyInput['page27']['Lw'][$act]))? $EnergyInput['page27']['Lw'][$act] : '';
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
</tr>


<tr>
<th><label for="De"><?php echo __('開口部等価直径');?></label></th>
<td><?php $vDe = (isset($EnergyInput['page27']['De'][$act]))? $EnergyInput['page27']['De'][$act] : '';
echo $this->Form->input('De',
		array(
			'id' => 'De',
			'type' => 'text',			
			'value' => $vDe,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>

<th><label for="DP0"><?php echo __('開口部における差圧');?></label></th>
<td><?php $vDP0 = (isset($EnergyInput['page27']['DP0'][$act]))? $EnergyInput['page27']['DP0'][$act] : '';
echo $this->Form->input('DP0',
		array(
			'id' => 'DP0',
			'type' => 'text',			
			'value' => $vDP0,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>Pa</td>
</tr>


<tr>
<th><label for="Sbl"><?php echo __('開口部面積');?></label></th>
<td><?php $vSbl = (isset($EnergyInput['page27']['Sbl'][$act]))? $EnergyInput['page27']['Sbl'][$act] : '';
echo $this->Form->input('Sbl',
		array(
			'id' => 'Sbl',
			'type' => 'text',			
			'value' => $vSbl,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m<sup>2</sup></td>

<th><label for="Mbl"><?php echo __('補正係数');?></label></th>
<td><?php $vMbl = (isset($EnergyInput['page27']['Mbl'][$act]))? $EnergyInput['page27']['Mbl'][$act] : '';
echo $this->Form->input('Mbl',
		array(
			'id' => 'Mbl',
			'type' => 'text',			
			'value' => $vMbl,
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

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p27();"><?php echo __('OK');?></a></p></div>
<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル');?></a></p></div>

<div class="clr"></div>


<script type="text/javascript"> 
function submit_frm_p27(){
	var act = opener.document.activeElement;		
	var idAct = $(act).attr("id");
	$("#act").val(idAct);

	var mes_err = "";
	var id_err = [];
	var chk = true;
	
	if(!isNumberic($("#Tgf").val())){
		mes_err += "<?php echo __('放炎温度に数値を入力してください');?>\n";		
		id_err.push("Tgf");
		chk = false;	
	}
	
	if(!isNumberic($("#Lw").val()) || $("#Lw").val()<=0){
		mes_err += "<?php echo __('壁厚みに数値を入力してください');?>\n";
		mes_err += "<?php echo __('壁厚みに0.0より大きく入力してください');?>\n";		
		id_err.push("Lw");
		chk = false;
	}

	if(!isNumberic($("#De").val()) || $("#De").val()<0.0){
		mes_err += "<?php echo __('開口部等価直径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('開口部等価直径に0.0より大きく入力してください');?>\n";		
		id_err.push("De");
		chk = false;	
	}

	if(!isNumberic($("#DP0").val()) || $("#DP0").val()<0.0){
		mes_err += "<?php echo __('開口部における差圧に数値を入力してください');?>\n";
		mes_err += "<?php echo __('開口部における差圧に0.0より大きく入力してください');?>\n";		
		id_err.push("DP0");
		chk = false;	
	}

	if(!isNumberic($("#Sbl").val()) || $("#Sbl").val()<0.0){
		mes_err += "<?php echo __('開口部面積に数値を入力してください');?>\n";
		mes_err += "<?php echo __('開口部面積に0.0より大きく入力してください');?>\n";		
		id_err.push("Sbl");
		chk = false;	
	}

	if(!isNumberic($("#Mbl").val()) || $("#Mbl").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";		
		id_err.push("Mbl");
		chk = false;	
	}
	
	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page27",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act15": 
					$("#El_blowout1", opener.document).val(responce);
					break;
				case "act25": 
					$("#El_blowout2", opener.document).val(responce);
					break;
				case "act35": 
					$("#El_blowout3", opener.document).val(responce);
					break;
				case "act45": 
					$("#El_blowout4", opener.document).val(responce);
					break;
				case "act55": 
					$("#El_blowout5", opener.document).val(responce);
					break;
				case "act65": 
					$("#El_blowout6", opener.document).val(responce);
					break;
				case "act75": 
					$("#El_blowout7", opener.document).val(responce);
					break;
				case "act85": 
					$("#El_blowout8", opener.document).val(responce);
					break;
				case "act95": 
					$("#El_blowout9", opener.document).val(responce);
					break;
				case "act105": 
					$("#El_blowout10", opener.document).val(responce);
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