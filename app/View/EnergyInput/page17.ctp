<div class="content_box">
<h2><?php echo __('アルミ：酸化熱データ入力'); ?></h2>
<p class="text"><?php echo __('デフォルト値を変更する場合は打ち変えてください。<br>入力が終了したらOKボタンを押してください'); ?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup17.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('page17', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page17'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tr>
<th><label for="Eal"><?php echo __('酸化アルミ生成熱'); ?></label></th>
<td><?php $vEal = (isset($EnergyInput['Eal']))? $EnergyInput['Eal'] : '31000';
echo $this->Form->input('Eal',
		array(
			'id' => 'Eal',
			'type' => 'text',			
			'value' => $vEal,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>kJ/kg</td>
</tr>
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p17();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p17(){
	var mes_err = "";
	var chk = true;
	if(!isNumberic($("#Eal").val()) || $("#Eal").val()<0.0 ){
		mes_err += "<?php echo __('酸化アルミ生成熱に数値を入力してください');?>\n";
		mes_err += "<?php echo __('酸化アルミ生成熱に0.0より大きく入力してください');?>\n";
		$("#Eal").focus();
		chk = false;
	}

	if(!chk){
		alert(mes_err);
		return false;
	}
	document.forms['EnergyInputForm'].submit();
}
</script>
</div>