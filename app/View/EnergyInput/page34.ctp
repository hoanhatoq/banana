<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('コンプレッサ-電力の計算'); ?></h1>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup34.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page34'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<!--
<ul class="checkBoxList6">
<li><input type="radio" name="" value="" id="1"> <label for="1">レシプロ</label></li>
<li><input type="radio" name="" value="" id="2"> <label for="2">オイルレス</label></li>
<li><input type="radio" name="" value="" id="3"> <label for="3">潤滑</label></li>
<li><input type="radio" name="" value="" id="4"> <label for="4">ターボ</label></li>
</ul>-->

<input type="hidden" name="act" value="0" id="act" class="select">

<table class="checkBoxTable">
<tr>
<th><?php echo __('型式指定'); ?></th>
<td><?php $vQ45 = (isset($EnergyInput['page34']['Q45'][$act])) ? $EnergyInput['page34']['Q45'][$act]: '';
	echo $this->Form->radio(
				'Q45', 
				array(
					'1' => __('レシプロ'),
					'2' => __('オイルレス'),
					'3' => __('潤滑'),
					'4' => __('ターボ')
				), 
				array(
					'value' => $vQ45,
					'legend' => false,
					'class' => 'Q45',
					'id' => 'Q45',
					'hiddenField' => false
				)
				);
	?></td></tr>
<tr>
<th><label for="K"><?php echo __('空気の断熱指数'); ?></label></th>
<td><?php $vK = (isset($EnergyInput['page34']['K'][$act]))? $EnergyInput['page34']['K'][$act] : '1.4';
echo $this->Form->input('K',
		array(
			'id' => 'K',
			'type' => 'text',			
			'value' => $vK,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td></tr>
<tr>
<th><label for="Ps"><?php echo __('装置入口での絶対圧力'); ?></label></th>
<td><?php $vPs = (isset($EnergyInput['page34']['Ps'][$act]))? $EnergyInput['page34']['Ps'][$act] : '';
echo $this->Form->input('Ps',
		array(
			'id' => 'Ps',
			'type' => 'text',			
			'value' => $vPs,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>MPa</td>
</tr>
<tr>
<th><label for="Rf"><?php echo __('流体の装置入口での流量'); ?></label></th>
<td><?php $vRf = (isset($EnergyInput['page34']['Rf'][$act]))? $EnergyInput['page34']['Rf'][$act] : '';
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
?>m<sup>3</sup>/min</td></tr>
<tr>
<th><label for="Pd"><?php echo __('装置出口での絶対圧力'); ?></label></th>
<td><?php $vPd = (isset($EnergyInput['page34']['Pd'][$act]))? $EnergyInput['page34']['Pd'][$act] : '';
echo $this->Form->input('Pd',
		array(
			'id' => 'Pd',
			'type' => 'text',			
			'value' => $vPd,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>MPa</td></tr>
<tr>
<th><label for="Etac"><?php echo __('圧縮機の全断熱効率'); ?></label></th>
<td><?php $vEtac = (isset($EnergyInput['page34']['Etac'][$act]))? $EnergyInput['page34']['Etac'][$act] : '';
echo $this->Form->input('Etac',
		array(
			'id' => 'Etac',
			'type' => 'text',			
			'value' => $vEtac,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>％</td></tr>
<tr>
<th><label for="Etat"><?php echo __('伝達効率'); ?></label></th>
<td><?php $vEtat = (isset($EnergyInput['page34']['Etat'][$act]))? $EnergyInput['page34']['Etat'][$act] : '';
echo $this->Form->input('Etat',
		array(
			'id' => 'Etat',
			'type' => 'text',			
			'value' => $vEtat,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>％</td>
</tr>
<tr>
<th><label for="Aco"><?php echo __('稼働率'); ?></label></th>
<td><?php $vAco = (isset($EnergyInput['page34']['Aco'][$act]))? $EnergyInput['page34']['Aco'][$act] : '';
echo $this->Form->input('Aco',
		array(
			'id' => 'Aco',
			'type' => 'text',			
			'value' => $vAco,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>％</td></tr>
<tr>
<th><label for="Mco"><?php echo __('補正係数'); ?></label></th>
<td><?php $vMco = (isset($EnergyInput['page34']['Mco'][$act]))? $EnergyInput['page34']['Mco'][$act] : '';
echo $this->Form->input('Mco',
		array(
			'id' => 'Mco',
			'type' => 'text',			
			'value' => $vMco,
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

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p34();"><?php echo __('OK'); ?></a></p></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p34(){
	var act = opener.document.activeElement;			
	var idAct = $(act).attr("id");
	$("#act").val(idAct);

	var mes_err = "";
	var id_err = [];
	var chk = true;
	
	if(!$(".Q45").is(":checked")){		
		mes_err += "<?php echo __('型式指定を選択してください');?>\n";		
		id_err.push("Q451");
		chk = false;	
	}

	if(!isNumberic($("#K").val()) || $("#K").val()<0.0){
		mes_err += "<?php echo __('空気の断熱指数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('空気の断熱指数に0.0より大きく入力してください');?>\n";		
		id_err.push("K");
		chk = false;
	}

	if(!isNumberic($("#Ps").val()) || $("#Ps").val()<0.0){
		mes_err += "<?php echo __('装置入口での絶対圧力に数値を入力してください');?>\n";
		mes_err += "<?php echo __('装置入口での絶対圧力に0.0より大きく入力してください');?>\n";		
		id_err.push("Ps");
		chk = false;
	}

	if(!isNumberic($("#Rf").val()) || $("#Rf").val()<0.0){
		mes_err += "<?php echo __('流体の装置入口での流量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('流体の装置入口での流量に0.0より大きく入力してください');?>\n";		
		id_err.push("Rf");
		chk = false;
	}

	if(!isNumberic($("#Pd").val()) || $("#Pd").val()<0.0){
		mes_err += "<?php echo __('装置出口での絶対圧力に数値を入力してください');?>\n";
		mes_err += "<?php echo __('装置出口での絶対圧力に0.0より大きく入力してください');?>\n";		
		id_err.push("Pd");
		chk = false;
	}

	if(!isNumberic($("#Etac").val()) || $("#Etac").val()<0.0){
		mes_err += "<?php echo __('圧縮機の全断熱効率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('圧縮機の全断熱効率に0.0より大きく入力してください');?>\n";		
		id_err.push("Etac");
		chk = false;	
	}

	if(!isNumberic($("#Etat").val()) || $("#Etat").val()<0.0){
		mes_err += "<?php echo __('伝達効率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('伝達効率に0.0より大きく入力してください');?>\n";		
		id_err.push("Etat");
		chk = false;	
	}

	if(!isNumberic($("#Aco").val()) || $("#Aco").val()<0.0){
		mes_err += "<?php echo __('稼働率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('稼働率に0.0より大きく入力してください');?>\n";		
		id_err.push("Aco");
		chk = false;
	}

	if(!isNumberic($("#Mco").val()) || $("#Mco").val()<0.0){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";
		mes_err += "<?php echo __('補正係数に0.0より大きく入力してください');?>\n";		
		id_err.push("Mco");
		chk = false;	
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page34",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act12": 
					$("#Eaux_compressor1", opener.document).val(responce);
					break;
				case "act22": 
					$("#Eaux_compressor2", opener.document).val(responce);
					break;
				case "act32": 
					$("#Eaux_compressor3", opener.document).val(responce);
					break;
				case "act42": 
					$("#Eaux_compressor4", opener.document).val(responce);
					break;
				case "act52": 
					$("#Eaux_compressor5", opener.document).val(responce);
					break;
				case "act62": 
					$("#Eaux_compressor6", opener.document).val(responce);
					break;
				case "act72": 
					$("#Eaux_compressor7", opener.document).val(responce);
					break;
				case "act82": 
					$("#Eaux_compressor8", opener.document).val(responce);
					break;
				case "act92": 
					$("#Eaux_compressor9", opener.document).val(responce);
					break;
				case "act102": 
					$("#Eaux_compressor10", opener.document).val(responce);
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