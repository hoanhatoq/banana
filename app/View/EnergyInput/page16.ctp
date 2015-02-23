<div class="content_box">
<h2><?php echo __('鉄：酸化熱データ入力'); ?></h2>
<p class="text"><?php echo __('デフォルト値を変更する場合は打ち変えてください。<br>入力が終了したらOKボタンを押してください'); ?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup16.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page16'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tr>
<th><label for="Wtfe"><?php echo __('酸化鉄中の鉄の含有比率'); ?></label></th>
<td><?php $vWtfe = (isset($EnergyInput['Wtfe']))? $EnergyInput['Wtfe'] : '77.7';
echo $this->Form->input('Wtfe',
		array(
			'id' => 'Wtfe',
			'type' => 'text',			
			'value' => $vWtfe,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
<th><label for="Efeo"><?php echo __('酸化鉄生成熱'); ?></label></th>
<td><?php $vEfeo = (isset($EnergyInput['Efeo']))? $EnergyInput['Efeo'] : '4814';
echo $this->Form->input('Efeo',
		array(
			'id' => 'Efeo',
			'type' => 'text',			
			'value' => $vEfeo,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/Kg</td>
</tr>
</table>

<?php echo $this->Form->end();?>

<ul class="checkBoxList5">
<li></li>
<li></li>
<li></li>
</ul>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p16();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p16(){
	var mes_err = "";
	var chk = true;
	var id_err = [];
	if(!isNumberic($("#Wtfe").val()) || $("#Wtfe").val()<0.0){
		mes_err += "<?php echo __('酸化鉄中の鉄の含有比率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('酸化鉄中の鉄の含有比率に0.0より大きく入力してください');?>\n";		
		id_err.push("Wtfe");
		chk = false;	
	}

	if(!isNumberic($("#Efeo").val()) || $("#Efeo").val()<0.0) {
		mes_err += "<?php echo __('酸化鉄生成熱に数値を入力してください');?>\n";
		mes_err += "<?php echo __('酸化鉄生成熱に0.0より大きく入力してください');?>\n";		
		id_err.push("Efeo");
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