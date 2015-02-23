<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('駆動動力：WB式計算入力'); ?></h1>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。'); ?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup40.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page40'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">

<tr>
<th><label for="WL"><?php echo __('処理物重量'); ?></label></th>
<td><?php $vWL = (isset($EnergyInput['page40']['WL']))? $EnergyInput['page40']['WL'] : '';
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

<th><label for="Wcu"><?php echo __('ビーム台車重量(ウオーキングビーム含)'); ?></label></th>
<td><?php $vWcu = (isset($EnergyInput['page40']['Wcu']))? $EnergyInput['page40']['Wcu'] : '';
echo $this->Form->input('Wcu',
		array(
			'id' => 'Wcu',
			'type' => 'text',			
			'value' => $vWcu,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>Kg</td>
</tr>


<tr>
<th><label for="Lr"><?php echo __('昇降ロール移動距離'); ?></label></th>
<td><?php $vLr = (isset($EnergyInput['page40']['Lr']))? $EnergyInput['page40']['Lr'] : '';
echo $this->Form->input('Lr',
		array(
			'id' => 'Lr',
			'type' => 'text',			
			'value' => $vLr,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>

<th><label for="Wcl"><?php echo __('昇降台車重量'); ?></label></th>
<td><?php $vWcl = (isset($EnergyInput['page40']['Wcl']))? $EnergyInput['page40']['Wcl'] : '';
echo $this->Form->input('Wcl',
		array(
			'id' => 'Wcl',
			'type' => 'text',			
			'value' => $vWcl,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>Kg</td>
</tr>


<tr>
<th><label for="Rr1"><?php echo __('水平ロール半径'); ?></label></th>
<td><?php $vRr1 = (isset($EnergyInput['page40']['Rr1']))? $EnergyInput['page40']['Rr1'] : '0.3';
echo $this->Form->input('Rr1',
		array(
			'id' => 'Rr1',
			'type' => 'text',			
			'value' => $vRr1,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>

<th><label for="Rb1"><?php echo __('同軸受半径'); ?></label></th>
<td><?php $vRb1 = (isset($EnergyInput['page40']['Rb1']))? $EnergyInput['page40']['Rb1'] : '0.15';
echo $this->Form->input('Rb1',
		array(
			'id' => 'Rb1',
			'type' => 'text',			
			'value' => $vRb1,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>


<tr>
<th><label for="Rr2"><?php echo __('昇降ロール半径'); ?></label></th>
<td><?php $vRr2 = (isset($EnergyInput['page40']['Rr2']))? $EnergyInput['page40']['Rr2'] : '0.3';
echo $this->Form->input('Rr2',
		array(
			'id' => 'Rr2',
			'type' => 'text',			
			'value' => $vRr2,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>

<th><label for="Rb2"><?php echo __('同軸受半径'); ?></label></th>
<td><?php $vRb2 = (isset($EnergyInput['page40']['Rb2']))? $EnergyInput['page40']['Rb2'] : '0.15';
echo $this->Form->input('Rb2',
		array(
			'id' => 'Rb2',
			'type' => 'text',			
			'value' => $vRb2,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>


<tr>
<th><label for="fr"><?php echo __('ロール摩擦係数'); ?></label></th>
<td><?php $vfr = (isset($EnergyInput['page40']['fr']))? $EnergyInput['page40']['fr'] : '0.0008';
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

<th><label for="ms"><?php echo __('軸受摩擦'); ?></label></th>
<td><?php $vms = (isset($EnergyInput['page40']['ms']))? $EnergyInput['page40']['ms'] : '0.04';
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
<th><label for="Etam"><?php echo __('機械効率'); ?></label></th>
<td><?php $vEtam = (isset($EnergyInput['page40']['Etam']))? $EnergyInput['page40']['Etam'] : '81';
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
<td><?php $vTw = (isset($EnergyInput['page40']['Tw']))? $EnergyInput['page40']['Tw'] : '';
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
<th><label for="AAA"><?php echo __('傾斜台　傾斜角度'); ?></label></th>
<td><?php $vAAA = (isset($EnergyInput['page40']['AAA']))? $EnergyInput['page40']['AAA'] : '10';
echo $this->Form->input('AAA',
		array(
			'id' => 'AAA',
			'type' => 'text',			
			'value' => $vAAA,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>degree</td>

<th><label for="h"><?php echo __('昇降距離'); ?></label></th>
<td><?php $vh = (isset($EnergyInput['page40']['h']))? $EnergyInput['page40']['h'] : '200';
echo $this->Form->input('h',
		array(
			'id' => 'h',
			'type' => 'text',			
			'value' => $vh,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>
</tr>


<tr>
<th><label for="t1"><?php echo __('上昇時間'); ?></label></th>
<td><?php $vt1 = (isset($EnergyInput['page40']['t1']))? $EnergyInput['page40']['t1'] : '13';
echo $this->Form->input('t1',
		array(
			'id' => 't1',
			'type' => 'text',			
			'value' => $vt1,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>sec</td>

<th><label for="t3"><?php echo __('下降時間'); ?></label></th>
<td><?php $vt3 = (isset($EnergyInput['page40']['t3']))? $EnergyInput['page40']['t3'] : '13';
echo $this->Form->input('t3',
		array(
			'id' => 't3',
			'type' => 'text',			
			'value' => $vt3,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>sec</td>
</tr>


<tr>
<th><label for="L"><?php echo __('前後進距離'); ?></label></th>
<td><?php $vL = (isset($EnergyInput['page40']['L']))? $EnergyInput['page40']['L'] : '650';
echo $this->Form->input('L',
		array(
			'id' => 'L',
			'type' => 'text',			
			'value' => $vL,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m</td>

<th><label for="t2"><?php echo __('前進時間'); ?></label></th>
<td><?php $vt2 = (isset($EnergyInput['page40']['t2']))? $EnergyInput['page40']['t2'] : '9';
echo $this->Form->input('t2',
		array(
			'id' => 't2',
			'type' => 'text',			
			'value' => $vt2,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>sec</td>
</tr>


<tr>
<th><label for="t4"><?php echo __('後進時間'); ?></label></th>
<td><?php $vt4 = (isset($EnergyInput['page40']['t4']))? $EnergyInput['page40']['t4'] : '7';
echo $this->Form->input('t4',
		array(
			'id' => 't4',
			'type' => 'text',			
			'value' => $vt4,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>sec</td>

<th><label for="ts"><?php echo __('一時停止時間'); ?></label></th>
<td><?php $vts = (isset($EnergyInput['page40']['ts']))? $EnergyInput['page40']['ts'] : '2';
echo $this->Form->input('ts',
		array(
			'id' => 'ts',
			'type' => 'text',			
			'value' => $vts,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>sec</td>
</tr>


<tr>
<th><label for="ta"><?php echo __('加減速時間'); ?></label></th>
<td><?php $vta = (isset($EnergyInput['page40']['ta']))? $EnergyInput['page40']['ta'] : '1';
echo $this->Form->input('ta',
		array(
			'id' => 'ta',
			'type' => 'text',			
			'value' => $vta,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>sec</td>

<th><label for="ti"><?php echo __('サイクル毎停止時間'); ?></label></th>
<td><?php $vti = (isset($EnergyInput['page40']['ti']))? $EnergyInput['page40']['ti'] : '';
echo $this->Form->input('ti',
		array(
			'id' => 'ti',
			'type' => 'text',			
			'value' => $vti,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>sec</td>
</tr>

</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p40();"><?php echo __('OK'); ?></a></p></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p40(){
	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!isNumberic($("#WL").val()) || $("#WL").val()<=0.0){
		mes_err += "<?php echo __('処理物重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('処理物重量に0.0より大きく入力してください');?>\n";	
		id_err.push("WL");
		chk = false;	
	}

	if(!isNumberic($("#Wcu").val()) || $("#Wcu").val()<0.0){
		mes_err += "<?php echo __('ビーム台車重量(ウオーキングビーム含)に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ビーム台車重量(ウオーキングビーム含)に0.0より大きく入力してください');?>\n";	
		id_err.push("Wcu");
		chk = false;	
	}

	if(!isNumberic($("#Lr").val()) || $("#Lr").val()<0.0){
		mes_err += "<?php echo __('昇降ロール移動距離に数値を入力してください');?>\n";
		mes_err += "<?php echo __('昇降ロール移動距離に0.0より大きく入力してください');?>\n";	
		id_err.push("Lr");
		chk = false;	
	}

	if(!isNumberic($("#Wcl").val()) || $("#Wcl").val()<0.0){
		mes_err += "<?php echo __('昇降台車重量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('昇降台車重量に0.0より大きく入力してください');?>\n";	
		id_err.push("Wcl");
		chk = false;	
	}

	if(!isNumberic($("#Rr1").val()) || $("#Rr1").val()<0.0){
		mes_err += "<?php echo __('水平ロール半径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('水平ロール半径に0.0より大きく入力してください');?>\n";	
		id_err.push("Rr1");
		chk = false;	
	}

	if(!isNumberic($("#Rb1").val()) || $("#Rb1").val()<0.0){
		mes_err += "<?php echo __('同軸受半径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('同軸受半径に0.0より大きく入力してください');?>\n";	
		id_err.push("Rb1");
		chk = false;
	}

	if(!isNumberic($("#Rr2").val()) || $("#Rr2").val()<0.0){
		mes_err += "<?php echo __('昇降ロール半径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('昇降ロール半径に0.0より大きく入力してください');?>\n";	
		id_err.push("Rr2");
		chk = false;	
	}

	if(!isNumberic($("#Rb2").val()) || $("#Rb2").val()<0.0){
		mes_err += "<?php echo __('同軸受半径に数値を入力してください');?>\n";
		mes_err += "<?php echo __('同軸受半径に0.0より大きく入力してください');?>\n";	
		id_err.push("Rb2");
		chk = false;
	}

	if(!isNumberic($("#fr").val()) || $("#fr").val()<0.0){
		mes_err += "<?php echo __('ロール摩擦係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ロール摩擦係数に0.0より大きく入力してください');?>\n";	
		id_err.push("fr");
		chk = false;	
	}

	if(!isNumberic($("#ms").val()) || $("#ms").val()<0.0){
		mes_err += "<?php echo __('軸受摩擦に数値を入力してください');?>\n";
		mes_err += "<?php echo __('軸受摩擦に0.0より大きく入力してください');?>\n";	
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

	if(!isNumberic($("#AAA").val()) || $("#AAA").val()<0.0){
		mes_err += "<?php echo __('傾斜台　傾斜角度に数値を入力してください');?>\n";
		mes_err += "<?php echo __('傾斜台　傾斜角度に0.0より大きく入力してください');?>\n";	
		id_err.push("AAA");
		chk = false;
	}

	if(!isNumberic($("#h").val()) || $("#h").val()<0.0){
		mes_err += "<?php echo __('昇降距離に数値を入力してください');?>\n";
		mes_err += "<?php echo __('昇降距離に0.0より大きく入力してください');?>\n";	
		id_err.push("h");
		chk = false;	
	}

	if(!isNumberic($("#t1").val()) || $("#t1").val()<0.0){
		mes_err += "<?php echo __('上昇時間に数値を入力してください');?>\n";
		mes_err += "<?php echo __('上昇時間に0.0より大きく入力してください');?>\n";	
		id_err.push("t1");
		chk = false;	
	}

	if(!isNumberic($("#t3").val()) || $("#t3").val()<0.0){
		mes_err += "<?php echo __('下降時間に数値を入力してください');?>\n";
		mes_err += "<?php echo __('下降時間に0.0より大きく入力してください');?>\n";	
		id_err.push("t3");
		chk = false;	
	}

	if(!isNumberic($("#L").val()) || $("#L").val()<0.0){
		mes_err += "<?php echo __('前後進距離に数値を入力してください');?>\n";
		mes_err += "<?php echo __('前後進距離に0.0より大きく入力してください');?>\n";	
		id_err.push("L");
		chk = false;
	}

	if(!isNumberic($("#t2").val()) || $("#t2").val()<0.0){
		mes_err += "<?php echo __('前進時間に数値を入力してください');?>\n";
		mes_err += "<?php echo __('前進時間に0.0より大きく入力してください');?>\n";	
		id_err.push("t2");
		chk = false;	
	}

	if(!isNumberic($("#t4").val()) || $("#t4").val()<0.0){
		mes_err += "<?php echo __('後進時間に数値を入力してください');?>\n";
		mes_err += "<?php echo __('後進時間に0.0より大きく入力してください');?>\n";	
		id_err.push("t4");
		chk = false;	
	}

	if(!isNumberic($("#ts").val()) || $("#ts").val()<0.0){
		mes_err += "<?php echo __('一時停止時間に数値を入力してください');?>\n";
		mes_err += "<?php echo __('一時停止時間に0.0より大きく入力してください');?>\n";	
		id_err.push("ts");
		chk = false;
	}

	if(!isNumberic($("#ta").val()) || $("#ta").val()<0.0){
		mes_err += "<?php echo __('加減速時間に数値を入力してください');?>\n";
		mes_err += "<?php echo __('加減速時間に0.0より大きく入力してください');?>\n";	
		id_err.push("ta");
		chk = false;
	}

	if(!isNumberic($("#ti").val()) || $("#ti").val()<0.0){
		mes_err += "<?php echo __('サイクル毎停止時間に数値を入力してください');?>\n";
		mes_err += "<?php echo __('サイクル毎停止時間に0.0より大きく入力してください');?>\n";	
		id_err.push("ti");
		chk = false;
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}
	
	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page40",
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