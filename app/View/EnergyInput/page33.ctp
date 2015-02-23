<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('ブロワー計算入力'); ?></h1>

<p class="text"><?php echo __('入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup33.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page33'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<input type="hidden" name="act" value="0" id="act" class="select">

<!--<ul class="checkBoxList6">
<li><label for="1">選択肢１</label><input type="radio" name="" value="" id="1"></li>
<li><label for="2">選択肢２</label><input type="radio" name="" value="" id="2"></li>
<li><label for="3">選択肢３</label><input type="radio" name="" value="" id="3"></li>
</ul>-->

<table class="checkBoxTable">
<tr>
<th><label for="Ph"><?php echo __('入口での静圧'); ?></label></th>
<td><?php $vPh = (isset($EnergyInput['page33']['Ph'][$act]))? $EnergyInput['page33']['Ph'][$act] : '';
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
?>Kpa</td>
<th><label for="Rf"><?php echo __('流体の装置入口での流量'); ?></label></th>
<td><?php $vRf = (isset($EnergyInput['page33']['Rf'][$act]))? $EnergyInput['page33']['Rf'][$act] : '';
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
<th><label for="Amb"><?php echo __('裕度（ブロワー）'); ?></label></th>
<td><?php $vAmb = (isset($EnergyInput['page33']['Amb'][$act]))? $EnergyInput['page33']['Amb'][$act] : '';
echo $this->Form->input('Amb',
		array(
			'id' => 'Amb',
			'type' => 'text',			
			'value' => $vAmb,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
<th><label for="Etasb"><?php echo __('静圧効率'); ?></label></th>
<td><?php $vEtasb = (isset($EnergyInput['page33']['Etasb'][$act]))? $EnergyInput['page33']['Etasb'][$act] : '';
echo $this->Form->input('Etasb',
		array(
			'id' => 'Etasb',
			'type' => 'text',			
			'value' => $vEtasb,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label for="Abl"><?php echo __('稼働率'); ?></label></th>
<td><?php $vAbl = (isset($EnergyInput['page33']['Abl'][$act]))? $EnergyInput['page33']['Abl'][$act] : '';
echo $this->Form->input('Abl',
		array(
			'id' => 'Abl',
			'type' => 'text',			
			'value' => $vAbl,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
<th><label for="Mbl"><?php echo __('補正係数'); ?></label></th>
<td><?php $vMbl = (isset($EnergyInput['page33']['Mbl'][$act]))? $EnergyInput['page33']['Mbl'][$act] : '1.0';
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

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p33();"><?php echo __('OK'); ?></a></p></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>


<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p33(){
	var act = opener.document.activeElement;			
	var idAct = $(act).attr("id");
	$("#act").val(idAct);

	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!isNumberic($("#Ph").val()) || $("#Ph").val()<=0.0){
		mes_err += "<?php echo __('入口での静圧に数値を入力してください');?>\n";
		mes_err += "<?php echo __('入口での静圧に0.0より大きく入力してください');?>\n";		
		id_err.push("Ph");
		chk = false;
	}
	
	if(!isNumberic($("#Rf").val()) || $("#Rf").val()<0.0){
		mes_err += "<?php echo __('流体の装置入口での流量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('流体の装置入口での流量に0.0より大きく入力してください');?>\n";		
		id_err.push("Rf");
		chk = false;	
	}
	if(!isNumberic($("#Amb").val()) || $("#Amb").val()<0.0){
		mes_err += "<?php echo __('裕度（ブロワー）に数値を入力してください');?>\n";
		mes_err += "<?php echo __('裕度（ブロワー）に0.0より大きく入力してください');?>\n";		
		id_err.push("Amb");
		chk = false;	
	}

	if(!isNumberic($("#Etasb").val()) || $("#Etasb").val()<0.0){
		mes_err += "<?php echo __('静圧効率数値を入力してください');?>\n";
		mes_err += "<?php echo __('静圧効率に0.0より大きく入力してください');?>\n";		
		id_err.push("Etasb");
		chk = false;	
	}

	if(!isNumberic($("#Abl").val()) || $("#Abl").val()<0.0){
		mes_err += "<?php echo __('稼働率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('稼働率に0.0より大きく入力してください');?>\n";		
		id_err.push("Abl");
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
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page33",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act11": 
					$("#Eaux_blower1", opener.document).val(responce);
					break;
				case "act21": 
					$("#Eaux_blower2", opener.document).val(responce);
					break;
				case "act31": 
					$("#Eaux_blower3", opener.document).val(responce);
					break;
				case "act41": 
					$("#Eaux_blower4", opener.document).val(responce);
					break;
				case "act51": 
					$("#Eaux_blower5", opener.document).val(responce);
					break;
				case "act61": 
					$("#Eaux_blower6", opener.document).val(responce);
					break;
				case "act71": 
					$("#Eaux_blower7", opener.document).val(responce);
					break;
				case "act81": 
					$("#Eaux_blower8", opener.document).val(responce);
					break;
				case "act91": 
					$("#Eaux_blower9", opener.document).val(responce);
					break;
				case "act101": 
					$("#Eaux_blower10", opener.document).val(responce);
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