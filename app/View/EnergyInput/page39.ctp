<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('駆動動力：メッシュベルト計算入力'); ?></h1>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。'); ?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup39.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page39'),
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
<th><label for="WL"><?php echo __('処理物重量'); ?></label></th>
<td><?php $vWL = (isset($EnergyInput['page39']['WL']))? $EnergyInput['page39']['WL'] : '';
echo $this->Form->input('WL',
		array(
			'id' => 'WL',
			'type' => 'text',			
			'value' => $vWL,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kg/m2</td>
<th><label for="Wj"><?php echo __('ｼﾞｸﾞ重量'); ?></label></th>
<td><?php $vWj = (isset($EnergyInput['page39']['Wj']))? $EnergyInput['page39']['Wj'] : '';
echo $this->Form->input('Wj',
		array(
			'id' => 'Wj',
			'type' => 'text',			
			'value' => $vWj,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kg/m2</td>
</tr>
<tr>
<th><label for="Wm"><?php echo __('メッシュベルト重量'); ?></label></th>
<td><?php $vWm = (isset($EnergyInput['page39']['Wm']))? $EnergyInput['page39']['Wm'] : '';
echo $this->Form->input('Wm',
		array(
			'id' => 'Wm',
			'type' => 'text',			
			'value' => $vWm,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kg/m2</td>
<th><label for="Mw"><?php echo __('メッシュベルト幅'); ?></label></th>
<td><?php $vMw = (isset($EnergyInput['page39']['Mw']))? $EnergyInput['page39']['Mw'] : '0.6';
echo $this->Form->input('Mw',
		array(
			'id' => 'Mw',
			'type' => 'text',			
			'value' => $vMw,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>
<tr>
<th><label for="Ld"><?php echo __('メッシュベルト長さ'); ?></label></th>
<td><?php $vLd = (isset($EnergyInput['page39']['Ld']))? $EnergyInput['page39']['Ld'] : '15';
echo $this->Form->input('Ld',
		array(
			'id' => 'Ld',
			'type' => 'text',			
			'value' => $vLd,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
<th><label for="WR"><?php echo __('ドラム重量'); ?></label></th>
<td><?php $vWR = (isset($EnergyInput['page39']['WR']))? $EnergyInput['page39']['WR'] : '';
echo $this->Form->input('WR',
		array(
			'id' => 'WR',
			'type' => 'text',			
			'value' => $vWR,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kg</td>
</tr>
<tr>
<th><label for="Wc"><?php echo __('張力'); ?></label></th>
<td><?php $vWc = (isset($EnergyInput['page39']['Wc']))? $EnergyInput['page39']['Wc'] : '';
echo $this->Form->input('Wc',
		array(
			'id' => 'Wc',
			'type' => 'text',			
			'value' => $vWc,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kg</td>
<th><label for="Dr"><?php echo __('ドラム径'); ?></label></th>
<td><?php $vDr = (isset($EnergyInput['page39']['Dr']))? $EnergyInput['page39']['Dr'] : '';
echo $this->Form->input('Dr',
		array(
			'id' => 'Dr',
			'type' => 'text',			
			'value' => $vDr,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>
<tr>
<th><label for="Rb"><?php echo __('ドラム軸受半径'); ?></label></th>
<td><?php $vRb = (isset($EnergyInput['page39']['Rb']))? $EnergyInput['page39']['Rb'] : '';
echo $this->Form->input('Rb',
		array(
			'id' => 'Rb',
			'type' => 'text',			
			'value' => $vRb,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
<th><label for="ms"><?php echo __('軸受摩擦係数'); ?></label></th>
<td><?php $vms = (isset($EnergyInput['page39']['ms']))? $EnergyInput['page39']['ms'] : '0.04';
echo $this->Form->input('ms',
		array(
			'id' => 'ms',
			'type' => 'text',			
			'value' => $vms,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
</tr>
<tr>
<th><label for="md"><?php echo __('ドラム・ベルト摩擦'); ?></label></th>
<td><?php $vmd = (isset($EnergyInput['page39']['md']))? $EnergyInput['page39']['md'] : '0.3';
echo $this->Form->input('md',
		array(
			'id' => 'md',
			'type' => 'text',			
			'value' => $vmd,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th><label for="V"><?php echo __('移動速度'); ?></label></th>
<td><?php $vV = (isset($EnergyInput['page39']['V']))? $EnergyInput['page39']['V'] : '';
echo $this->Form->input('V',
		array(
			'id' => 'V',
			'type' => 'text',			
			'value' => $vV,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m/min</td>
</tr>
<tr>
<th><label for="Etam"><?php echo __('機械効率'); ?></label></th>
<td><?php $vEtam = (isset($EnergyInput['page39']['Etam']))? $EnergyInput['page39']['Etam'] : '85.5';
echo $this->Form->input('Etam',
		array(
			'id' => 'Etam',
			'type' => 'text',			
			'value' => $vEtam,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
<th><label for="Tw"><?php echo __('稼働時間割合'); ?></label></th>
<td><?php $vTw = (isset($EnergyInput['page39']['Tw']))? $EnergyInput['page39']['Tw'] : '100';
echo $this->Form->input('Tw',
		array(
			'id' => 'Tw',
			'type' => 'text',			
			'value' => $vTw,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label for="NKAI"><?php echo __('１時間あたりの起動回数'); ?></label></th>
<td><?php $vNKAI = (isset($EnergyInput['page39']['NKAI']))? $EnergyInput['page39']['NKAI'] : '1';
echo $this->Form->input('NKAI',
		array(
			'id' => 'NKAI',
			'type' => 'text',			
			'value' => $vNKAI,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th><label for="Hoseim"><?php echo __('補正係数'); ?></label></th>
<td><?php $vHoseim = (isset($EnergyInput['page39']['Hoseim']))? $EnergyInput['page39']['Hoseim'] : '1';
echo $this->Form->input('Hoseim',
		array(
			'id' => 'Hoseim',
			'type' => 'text',			
			'value' => $vHoseim,
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

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p39();"><?php echo __('OK'); ?></a></p></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p39(){
	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!isNumberic($("#WL").val()) || $("#WL").val()<=0.0){
		mes_err += "<?php echo __('処理物重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('処理物重量に0.0より大きく入力してください');?>\n";	
		id_err.push("WL");
		chk = false;
	}

	if(!isNumberic($("#Wj").val()) || $("#Wj").val()<0.0){
		mes_err += "<?php echo __('ｼﾞｸﾞ重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ｼﾞｸﾞ重量に0.0より大きく入力してください');?>\n";	
		id_err.push("Wj");
		chk = false;	
	}

	if(!isNumberic($("#Wm").val()) || $("#Wm").val()<0.0){
		mes_err += "<?php echo __('メッシュベルト重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('メッシュベルト重量に0.0より大きく入力してください');?>\n";	
		id_err.push("Wm");
		chk = false;
	}

	if(!isNumberic($("#Mw").val()) || $("#Mw").val()<0.0){
		mes_err += "<?php echo __('メッシュベルト幅に数値を入力してください');?>\n";
		mes_err += "<?php echo __('メッシュベルト幅に0.0より大きく入力してください');?>\n";	
		id_err.push("Mw");
		chk = false;	
	}

	if(!isNumberic($("#Ld").val()) || $("#Ld").val()<0.0){
		mes_err += "<?php echo __('メッシュベルト長さに数値を入力してください');?>\n";
		mes_err += "<?php echo __('メッシュベルト長さに0.0より大きく入力してください');?>\n";	
		id_err.push("Ld");
		chk = false;	
	}

	if(!isNumberic($("#WR").val()) || $("#WR").val()<0.0){
		mes_err += "<?php echo __('ドラム重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ドラム重量に0.0より大きく入力してください');?>\n";	
		id_err.push("WR");
		chk = false;
	}

	if(!isNumberic($("#Wc").val()) || $("#Wc").val()<0.0){
		mes_err += "<?php echo __('張力に数値を入力してください');?>\n";
		mes_err += "<?php echo __('張力に0.0より大きく入力してください');?>\n";	
		id_err.push("Wc");
		chk = false;
	}

	if(!isNumberic($("#Dr").val()) || $("#Dr").val()<0.0){
		mes_err += "<?php echo __('ドラム径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ドラム径に0.0より大きく入力してください');?>\n";	
		id_err.push("Dr");
		chk = false;
	}

	if(!isNumberic($("#Rb").val()) || $("#Rb").val()<0.0){
		mes_err += "<?php echo __('ドラム軸受半径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ドラム軸受半径に0.0より大きく入力してください');?>\n";	
		id_err.push("Rb");
		chk = false;
	}

	if(!isNumberic($("#ms").val()) || $("#ms").val()<0.0){
		mes_err += "<?php echo __('軸受摩擦係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('軸受摩擦係数に0.0より大きく入力してください');?>\n";	
		id_err.push("ms");
		chk = false;	
	}

	if(!isNumberic($("#md").val()) || $("#md").val()<0.0){
		mes_err += "<?php echo __('ドラム・ベルト摩擦に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ドラム・ベルト摩擦に0.0より大きく入力してください');?>\n";	
		id_err.push("md");
		chk = false;
	}

	if(!isNumberic($("#V").val()) || $("#V").val()<0.0){
		mes_err += "<?php echo __('移動速度に数値を入力してください');?>\n";
		mes_err += "<?php echo __('移動速度に0.0より大きく入力してください');?>\n";	
		id_err.push("V");
		chk = false;	
	}

	if(!isNumberic($("#Etam").val()) || $("#Etam").val()<0.0){
		mes_err += "<?php echo __('機械効率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('機械効率に0.0より大きく入力してください');?>\n";	
		id_err.push("Etam");
		chk = false;
	}

	if(!isNumberic($("#Tw").val()) || $("#Tw").val()<0.0){
		mes_err += "<?php echo __('稼働時間割合に数値を入力してください');?>\n";
		mes_err += "<?php echo __('稼働時間割合に0.0より大きく入力してください');?>\n";	
		id_err.push("Tw");
		chk = false;	
	}

	if(!isNumberic($("#NKAI").val()) || $("#NKAI").val()<0.0){
		mes_err += "<?php echo __('１時間あたりの起動回数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('１時間あたりの起動回数に0.0より大きく入力してください');?>\n";	
		id_err.push("NKAI");
		chk = false;
	}

	if(!isNumberic($("#Hoseim").val()) || $("#Hoseim").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";	
		id_err.push("Hoseim");
		chk = false;
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page39",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){			
			$("#Eaux_power_t", opener.document).val(responce);
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