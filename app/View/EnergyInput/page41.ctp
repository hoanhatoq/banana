<div class="content_box">
<h2><?php echo __('ユーティリティー入力'); ?></h2>

<p class="text"><?php echo __('必要データを入力してください。<br>入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup41.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page41'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="actSave" value="energy_input" id="actSave" class="select">
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<p><?php echo __('酸素の使用がありますか？'); ?></p>
<ul class="checkBoxList">
<li>
	<?php $vIsanso = (isset($EnergyInput['Isanso'])) ? $EnergyInput['Isanso']: '';;
	echo $this->Form->radio(
				'Isanso', 
				array(
					'1' => __('はい'),
					'0' => __('いいえ')
				), 
				array(
					'value' => $vIsanso,
					'legend' => false,
					'separator' => '</li><li class="typeRight">',
					'class' => 'Isanso',
					'id' => 'Isanso',
					'hiddenField' => false
				)
				);
	?>
</li>
</ul>
<div class="clr"></div>

<div id="switchBox_type1">
<table class="checkBoxTable type1">
<tr>
<th><label for="Aoxy"><?php echo __('酸素発生原単位'); ?></label></th>
<td><?php $vAoxy = (isset($EnergyInput['Aoxy']))? $EnergyInput['Aoxy'] : '0.5';
echo $this->Form->input('Aoxy',
		array(
			'id' => 'Aoxy',
			'type' => 'text',			
			'value' => $vAoxy,
			'label' => false,
			'class' => 'small',
			'div' => false
		)
	); 
?>kwh/m<sup>3</sup></td></tr>
<tr>
<th><label for="Voxy"><?php echo __('酸素使用量'); ?></label></th>
<td><?php $vVoxy = (isset($EnergyInput['Voxy']))? $EnergyInput['Voxy'] : '0';
echo $this->Form->input('Voxy',
		array(
			'id' => 'Voxy',
			'type' => 'text',			
			'value' => $vVoxy,
			'label' => false,
			'class' => 'small',
			'div' => false
		)
	); 
?>m<sup>3</sup>/T</td>
</tr>
</table>
<div class="type2" style="height:50px;width:100%;"></div>
</div>

<p><?php echo __('雰囲気ガスの使用がありますか？'); ?></p>

<ul class="checkBoxList">
<li>
	<?php $vIatm = (isset($EnergyInput['Iatm'])) ? $EnergyInput['Iatm']: '';;
	echo $this->Form->radio(
				'Iatm', 
				array(
					'1' => __('はい'),
					'0' => __('いいえ')
				), 
				array(
					'value' => $vIatm,
					'legend' => false,
					'separator' => '</li><li class="typeRight">',
					'class' => 'Iatm',
					'id' => 'Iatm',
					'hiddenField' => false
				)
				);
	?>
</li>
<div class="clr"></div>

<div id="switchBox_type3">
<table class="checkBoxTable type3">
<tr>
<th><label for="Aatm"><?php echo __('雰囲気ガス発生電力使用原単位'); ?></label></th>
<td><?php $vAatm = (isset($EnergyInput['Aatm']))? $EnergyInput['Aatm'] : '0';
echo $this->Form->input('Aatm',
		array(
			'id' => 'Aatm',
			'type' => 'text',			
			'value' => $vAatm,
			'label' => false,
			'class' => 'small',
			'div' => false
		)
	); 
?>kwh/m<sup>3</sup></td></tr>
<tr>
<th><label for="Vatm"><?php echo __('雰囲気ガス使用量'); ?></label></th>
<td><?php $vVatm = (isset($EnergyInput['Vatm']))? $EnergyInput['Vatm'] : '0';
echo $this->Form->input('Vatm',
		array(
			'id' => 'Vatm',
			'type' => 'text',			
			'value' => $vVatm,
			'label' => false,
			'class' => 'small',
			'div' => false
		)
	); 
?>m<sup>3</sup>/TT</td>
</tr>
</table>

<div class="type4" style="height:50px;width:100%;"></div>
</div>

<?php echo $this->Form->end();?>

<div class="clr"></div>
<div class="btn_save_next"><p><a id="save02" href="#"><?php echo __('結果を保存'); ?></a></p></div>

<div class="clr"></div>

<div class="btn_out"><p><a href="#" id="to_out" ><?php echo __('結果出力'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
var chkStatus = 0;

$(":input").change(function(){
	chkStatus = 0;
});

$("#switchBox_type1").hide();
if($('#Isanso1').is(':checked')){
	$("#switchBox_type1").show();
}

$("#switchBox_type3").hide();
if($('#Iatm1').is(':checked')){
	$("#switchBox_type3").show();
}

$(".Isanso").change(function(){	
	if($('#Isanso1').is(':checked')){
		$("#Aoxy").val("0.5");
		$("#Voxy").val("0");
		$("#switchBox_type1").show();
	}else{
		$("#switchBox_type1").hide();
		$("#Aoxy").val("");
		$("#Voxy").val("");
	}
	chkStatus = 0;
});

$(".Iatm").change(function(){
	if($('#Iatm1').is(':checked')){
		$("#Aatm").val("0");
		$("#Vatm").val("0");
		$("#switchBox_type3").show();
	}else{
		$("#switchBox_type3").hide();
		$("#Aatm").val("");
		$("#Vatm").val("");
	}
	chkStatus = 0;
});

function submit_frm_p41(){
	var mes_err = "";
	var id_err = [];
	var chk = true;

	if(!$('.Isanso').is(':checked')){
		mes_err += "<?php echo __('酸素の使用がありますか？');?>\n";	
		id_err.push("Isanso1");
		chk = false;
	}
	
	if($('#Isanso1').is(':checked')){
		if(!isNumberic($("#Aoxy").val()) || $("#Aoxy").val()<0.0){
			mes_err += "<?php echo __('酸素発生原単位に数値を入力してください');?>\n";
			mes_err += "<?php echo __('酸素発生原単位に0.0より大きく入力してください');?>\n";	
			id_err.push("Aoxy");
			chk = false;	
		}

		if(!isNumberic($("#Voxy").val()) || $("#Voxy").val()<0.0){
			mes_err += "<?php echo __('酸素使用量に数値を入力してください');?>\n";
			mes_err += "<?php echo __('酸素使用量に0.0より大きく入力してください');?>\n";	
			id_err.push("Voxy");
			chk = false;	
		}
	}
	
	if(!$('.Iatm').is(':checked')){
		mes_err += "<?php echo __('雰囲気ガスの使用がありますか？');?>\n";	
		id_err.push("Iatm1");
		chk = false;	
	}

	if($('#Iatm1').is(':checked')){
		if(!isNumberic($("#Aatm").val()) || $("#Aatm").val()<0.0){
			mes_err += "<?php echo __('雰囲気ガス発生電力使用原単位に数値を入力してください');?>\n";
			mes_err += "<?php echo __('雰囲気ガス発生電力使用原単位に0.0より大きく入力してください');?>\n";	
			id_err.push("Aatm");
			chk = false;	
		}

		if(!isNumberic($("#Vatm").val()) || $("#Vatm").val()<0.0){			
			mes_err += "<?php echo __('雰囲気ガス使用量に数値を入力してください');?>\n";
			mes_err += "<?php echo __('雰囲気ガス使用量に0.0より大きく入力してください');?>\n";	
			id_err.push("Vatm");
			chk = false;	
		}
	}

	if(!chk){
		$("#"+id_err[0]).focus();		
		alert(mes_err);
		return false;
	}else{
		return true;	
	}	
}

$("#save02").click(function(){
	if(submit_frm_p41()){
		var data = $("#EnergyInputForm").serialize();
		w=window.open('<?php echo $this->Html->url(array("controller" => "save02", "action" =>"index"));?>?' + data,'','scrollbars=yes,Width=560,Height=500');
		w.focus();
	}
});

$("#to_out").click(function(){
	if(submit_frm_p41()){
		$("#EnergyInputForm").submit();
	}
});

</script>

</div>