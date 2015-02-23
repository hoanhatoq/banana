<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('駆動動力：回転炉床計算入力'); ?></h1>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。'); ?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup38.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page38'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tr>
<th><label for="WL"><?php echo __('炉内処理物の総重量'); ?></label></th>
<td><?php $vWL = (isset($EnergyInput['page38']['WL']))? $EnergyInput['page38']['WL'] : '';
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
?>Kg</td>
<th><label for="WJ"><?php echo __('炉内ジグ類の総重量'); ?></label></th>
<td><?php $vWJ = (isset($EnergyInput['page38']['WJ']))? $EnergyInput['page38']['WJ'] : '';
echo $this->Form->input('WJ',
		array(
			'id' => 'WJ',
			'type' => 'text',			
			'value' => $vWJ,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>Kg</td>
</tr>
<tr>
<th><label for="Wcar"><?php echo __('台車重量'); ?></label></th>
<td><?php $vWcar = (isset($EnergyInput['page38']['Wcar']))? $EnergyInput['page38']['Wcar'] : '';
echo $this->Form->input('Wcar',
		array(
			'id' => 'Wcar',
			'type' => 'text',			
			'value' => $vWcar,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>Kg</td>
<th><label for="Dr"><?php echo __('車輪径'); ?></label></th>
<td><?php $vDr = (isset($EnergyInput['page38']['Dr']))? $EnergyInput['page38']['Dr'] : '';
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
<th><label for="Rb"><?php echo __('車輪軸受け半径'); ?></label></th>
<td><?php $vRb = (isset($EnergyInput['page38']['Rb']))? $EnergyInput['page38']['Rb'] : '0.1';
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

<th><label for="Rr">車輪回転数</label></th>
<td><?php $vRr = (isset($EnergyInput['page38']['Rr']))? $EnergyInput['page38']['Rr'] : '';
echo $this->Form->input('Rr',
		array(
			'id' => 'Rr',
			'type' => 'text',			
			'value' => $vRr,
			'readonly' => true,
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'div' => false
		)
	); 
?>rpm</td>
</tr>
<tr>
<th><label for="V"><?php echo __('処理物の移動速度'); ?></label></th>
<td><?php $vV = (isset($EnergyInput['page38']['V']))? $EnergyInput['page38']['V'] : '';
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
<th><label for="fr"><?php echo __('車輪摩擦係数'); ?></label></th>
<td><?php $vfr = (isset($EnergyInput['page38']['fr']))? $EnergyInput['page38']['fr'] : '0.0007';
echo $this->Form->input('fr',
		array(
			'id' => 'fr',
			'type' => 'text',			
			'value' => $vfr,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
</tr>
<tr>
<th><label for="ms"><?php echo __('軸受け摩擦係数'); ?></label></th>
<td><?php $vms = (isset($EnergyInput['page38']['ms']))? $EnergyInput['page38']['ms'] : '0.04';
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
<th><label for="Etam"><?php echo __('機械効率'); ?></label></th>
<td><?php $vEtam = (isset($EnergyInput['page38']['Etam']))? $EnergyInput['page38']['Etam'] : '85.5';
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
</tr>
<tr>
<th><label for="Tw"><?php echo __('稼働時間割合'); ?></label></th>
<td><?php $vTw = (isset($EnergyInput['page38']['Tw']))? $EnergyInput['page38']['Tw'] : '100';
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
<th><label for="Ta"><?php echo __('起動時間割合係数'); ?></label></th>
<td><?php $vTa = (isset($EnergyInput['page38']['Ta']))? $EnergyInput['page38']['Ta'] : '100';
echo $this->Form->input('Ta',
		array(
			'id' => 'Ta',
			'type' => 'text',			
			'value' => $vTa,
			'readonly' => true,
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label for="NKAI"><?php echo __('１時間あたりの起動回数'); ?></label></th>
<td><?php $vNKAI = (isset($EnergyInput['page38']['NKAI']))? $EnergyInput['page38']['NKAI'] : '1';
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
<th><label for="Hoseih"><?php echo __('補正係数'); ?></label></th>
<td><?php $vHoseih = (isset($EnergyInput['page38']['Hoseih']))? $EnergyInput['page38']['Hoseih'] : '1';
echo $this->Form->input('Hoseih',
		array(
			'id' => 'Hoseih',
			'type' => 'text',			
			'value' => $vHoseih,
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

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p38();"><?php echo __('OK'); ?></a></p></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
$("#V").change(function(){
	var vV = $("#V").val();	
	if(vV==''){
		vV = 0;
	}
	var vDr = $("#Dr").val();
	if(vDr==''){
		vDr = 0;
	}
	var vRr = 0;
	if(vDr!=0){
		vRr = vV/(3.1415*vDr);
	}
	$("#Rr").val(vRr);
});

$("#Dr").change(function(){
	var vV = $("#V").val();	
	if(vV==''){
		vV = 0;
	}
	var vDr = $("#Dr").val();
	if(vDr==''){
		vDr = 0;
	}
	var vRr = 0;
	if(vDr!=0){
		vRr = vV/(3.1415*vDr);
	}
	$("#Rr").val(vRr);
});

var vNKAI = $("#NKAI").val();	
if(vNKAI==''){
	vNKAI = 0;
}
var vTa = 1+5E-4 * vNKAI;
vTa = vTa*100;
$("#Ta").val(vTa);
	
$("#NKAI").change(function(){
	var vNKAI = $("#NKAI").val();	
	if(vNKAI==''){
		vNKAI = 0;
	}
	var vTa = 1+5E-4 * vNKAI;
	vTa = vTa*100;
	$("#Ta").val(vTa);
});

function submit_frm_p38(){
	var mes_err = "";
	var id_err = [];
	var chk = true;
	
	if(!isNumberic($("#WL").val()) || $("#WL").val()<=0.0){
		mes_err += "<?php echo __('炉内処理物の総重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('炉内処理物の総重量に0.0より大きく入力してください');?>\n";	
		id_err.push("WL");
		chk = false;	
	}

	if(!isNumberic($("#WJ").val()) || $("#WJ").val()<0.0){
		mes_err += "<?php echo __('炉内ジグ類の総重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('炉内ジグ類の総重量に0.0より大きく入力してください');?>\n";	
		id_err.push("WJ");
		chk = false;
	}

	if(!isNumberic($("#Wcar").val()) || $("#Wcar").val()<0.0){
		mes_err += "<?php echo __('台車重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('台車重量に0.0より大きく入力してください');?>\n";	
		id_err.push("Wcar");
		chk = false;	
	}

	if(!isNumberic($("#Dr").val()) || $("#Dr").val()<0.0){
		mes_err += "<?php echo __('車輪径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('車輪径に0.0より大きく入力してください');?>\n";	
		id_err.push("Dr");
		chk = false;
	}

	if(!isNumberic($("#Rb").val()) || $("#Rb").val()<0.0){
		mes_err += "<?php echo __('車輪軸受け半径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('車輪軸受け半径に0.0より大きく入力してください');?>\n";	
		id_err.push("Rb");
		chk = false;
	}

	if(!isNumberic($("#V").val()) || $("#V").val()<0.0){
		mes_err += "<?php echo __('処理物の移動速度に数値を入力してください');?>\n";
		mes_err += "<?php echo __('処理物の移動速度に0.0より大きく入力してください');?>\n";	
		id_err.push("V");
		chk = false;
	}

	if(!isNumberic($("#fr").val()) || $("#fr").val()<0.0){
		mes_err += "<?php echo __('車輪摩擦係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('車輪摩擦係数に0.0より大きく入力してください');?>\n";	
		id_err.push("fr");
		chk = false;
	}
	
	if(!isNumberic($("#ms").val()) || $("#ms").val()<0.0){
		mes_err += "<?php echo __('軸受け摩擦係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('軸受け摩擦係数に0.0より大きく入力してください');?>\n";	
		id_err.push("ms");
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

	if(!isNumberic($("#Hoseih").val()) || $("#Hoseih").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";	
		id_err.push("Hoseih");
		chk = false;
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page38",
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