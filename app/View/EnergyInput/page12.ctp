<div class="content_box">
<h2><?php echo __('霧化材エンタルピ計算用入力'); ?></h2>
<p class="text"><?php echo __('入力が終了したらOKボタンを押してください'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup12.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page12'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tr>
<th><label for="Vatmize"><?php echo __('水蒸気量'); ?></label></th>
<td><?php $vVatmize = (isset($EnergyInput['Vatmize']))? $EnergyInput['Vatmize'] : '';
echo $this->Form->input('Vatmize',
		array(
			'id' => 'Vatmize',
			'type' => 'text',			
			'value' => $vVatmize,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kg/t</td>
<th><label for="Tatmize"><?php echo __('水蒸気温度'); ?></label></th>
<td><?php $vTatmize = (isset($EnergyInput['Tatmize']))? $EnergyInput['Tatmize'] : '';
echo $this->Form->input('Tatmize',
		array(
			'id' => 'Tatmize',
			'type' => 'text',			
			'value' => $vTatmize,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label for="Patmize"><?php echo __('水蒸気圧力'); ?></label></th>
<td><?php $vPatmize = (isset($EnergyInput['Patmize']))? $EnergyInput['Patmize'] : '';
echo $this->Form->input('Patmize',
		array(
			'id' => 'Patmize',
			'type' => 'text',			
			'value' => $vPatmize,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kPa</td>
<td colspan="2"></td>
</tr>
</table>

<?php echo $this->Form->end();?>

<ul class="checkBoxList8">
<li></li>
<li class="right"></li>
<li class="right"></li>
</ul>
<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p12();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p12(){
	var mes_err = "";
	var chk = true;
	var id_err = [];
	if( (!isNumberic($("#Vatmize").val()) && $("#Vatmize").val().length>0) || $("#Vatmize").val()<0.0 ){
		mes_err += "<?php echo __('水蒸気量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('水蒸気量に0.0より大きく入力してください');?>\n";
		id_err.push("Vatmize");
		chk = false;	
	}
	
	if( (!isNumberic($("#Tatmize").val()) && $("#Tatmize").val().length>0) || $("#Tatmize").val()<0.0 ){
		mes_err += "<?php echo __('水蒸気温度に数値を入力してください');?>\n";
		mes_err += "<?php echo __('水蒸気温度に0.0より大きく入力してください');?>\n";
		id_err.push("Tatmize");
		chk = false;
	}

	if( (!isNumberic($("#Patmize").val()) && $("#Patmize").val().length>0) || $("#Patmize").val()<0.0 ){
		mes_err += "<?php echo __('水蒸気圧力に数値を入力してください');?>\n";
		mes_err += "<?php echo __('水蒸気圧力に0.0より大きく入力してください');?>\n";
		id_err.push("Patmize");
		chk = false;	
	}
	
	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}
	document.forms['EnergyInputForm'].submit();
}
</script>

</div>