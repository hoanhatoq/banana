<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('炉体放散損失計算入力');?></h1>

<p class="text"><?php echo __('必要データを入力してください');?><br>
<?php echo __('入力が終了したらOKボタンを押してください');?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup22.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説');?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page22'),
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
<th><?php echo __('壁面の方向');?></th>
<td colspan="3"><?php $vIside = (isset($EnergyInput['page22']['Iside'][$act])) ? $EnergyInput['page22']['Iside'][$act]: '';
	echo $this->Form->radio(
				'Iside', 
				array(
					'1' => __('上向き'),
					'2' => __('下向き'),
					'3' => __('横向き'),
				), 
				array(
					'value' => $vIside,
					'legend' => false,					
					'class' => 'Iside',
					'id' => 'Iside',
					'hiddenField' => false
				)
				);
	?></td>
</tr>
<tr>
<th><label for="FCG1"><?php echo __('炉壁放射率');?></label></th>
<td><?php $vFCG1 = (isset($EnergyInput['page22']['FCG1'][$act]))? $EnergyInput['page22']['FCG1'][$act] : '0.9';
echo $this->Form->input('FCG1',
		array(
			'id' => 'FCG1',
			'type' => 'text',			
			'value' => $vFCG1,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
<th><label for="Tw"><?php echo __('炉外壁表面温度');?></label></th>
<td><?php $vTw = (isset($EnergyInput['page22']['Tw'][$act]))? $EnergyInput['page22']['Tw'][$act] : '';
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
?>℃</td>
</tr>
<tr>
<th><label for="Ta"><?php echo __('外気温度');?></label></th>
<td><?php $vTa = (!isset($EnergyInput['page22']['Ta'][$act]) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTa = (isset($EnergyInput['page22']['Ta'][$act]))? $EnergyInput['page22']['Ta'][$act] : $vTa;
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
<th><label for="Ssurface"><?php echo __('炉壁損失評価対象面積（炉壁・煙道）');?></label></th>
<td><?php $vSsurface = (isset($EnergyInput['page22']['Ssurface'][$act]))? $EnergyInput['page22']['Ssurface'][$act] : '';
echo $this->Form->input('Ssurface',
		array(
			'id' => 'Ssurface',
			'type' => 'text',			
			'value' => $vSsurface,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>m<sup>2</sup></td>
</tr>

<tr>
<th><label for="Mwall"><?php echo __('補正係数');?></label></th>
<td><?php $vMwall = (isset($EnergyInput['page22']['Mwall'][$act]))? $EnergyInput['page22']['Mwall'][$act] : '1.0';
echo $this->Form->input('Mwall',
		array(
			'id' => 'Mwall',
			'type' => 'text',			
			'value' => $vMwall,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?></td>
</tr>

</table>

<?php echo $this->Form->end();?>

<li class="right clr"></li>

<div class="btn_ok"><p><a href="#" onclick="submit_frm_p22();"><?php echo __('OK');?></a></p></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル');?></a></p></div>
</div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p22(){
	var act = opener.document.activeElement;		
	var idAct = $(act).attr("id");
	$("#act").val(idAct);
	
	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!$(".Iside").is(":checked")){		
		mes_err += "<?php echo __('壁面の方向を選択してください');?>\n";
		id_err.push("Iside1");
		chk = false;
	}

	if(!isNumberic($("#FCG1").val()) || $("#FCG1").val()<0.0){
		mes_err += "<?php echo __('炉壁放射率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('炉外壁表面温度に数値を入力してください');?>\n";		
		id_err.push("FCG1");
		chk = false;
	}

	if(!isNumberic($("#Tw").val())){
		mes_err += "<?php echo __('炉外壁表面温度に数値を入力してください');?>\n";		
		id_err.push("Tw");
		chk = false;
	}
	if(!isNumberic($("#Ta").val())){
		mes_err += "<?php echo __('外気温度に数値を入力してください');?>\n";		
		id_err.push("Ta");
		chk = false;	
	}
	if(!isNumberic($("#Ssurface").val()) || $("#Ssurface").val()<0.0 ){
		mes_err += "<?php echo __('炉壁損失評価対象面積（炉壁・煙道）に数値を入力してください');?>\n";
		mes_err += "<?php echo __('炉壁損失評価対象面積（炉壁・煙道）に0.0より大きく入力してください');?>\n";		
		id_err.push("Ssurface");
		chk = false;
	}
	if(!isNumberic($("#Mwall").val())){
		mes_err += "<?php echo __('補正係数に数値を入力してください');?>\n";		
		id_err.push("Mwall");
		chk = false;
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page22",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){							
			switch(idAct){
				case "act11": 
					$("#El_wall1", opener.document).val(responce);
					break;
				case "act21": 
					$("#El_wall2", opener.document).val(responce);
					break;
				case "act31": 
					$("#El_wall3", opener.document).val(responce);
					break;
				case "act41": 
					$("#El_wall4", opener.document).val(responce);
					break;
				case "act51": 
					$("#El_wall5", opener.document).val(responce);
					break;
				case "act61": 
					$("#El_wall6", opener.document).val(responce);
					break;
				case "act71": 
					$("#El_wall7", opener.document).val(responce);
					break;
				case "act81": 
					$("#El_wall8", opener.document).val(responce);
					break;
				case "act91": 
					$("#El_wall9", opener.document).val(responce);
					break;
				case "act101": 
					$("#El_wall10", opener.document).val(responce);
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