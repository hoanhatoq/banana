<div class="content_box">
<h2><?php echo __('燃焼関連処理タイプ選択'); ?></h2>
<p class="text"><?php echo __('選択してOKボタンを押してください（複数選択可能です）。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup05.html")); ?>','','scrollbars=yes,location=no,status=no,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page05'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<ul class="checkBoxList2">
<li>　<?php $vIND2 = (isset($EnergyInput['IND2']) && $EnergyInput['IND2'] == 1) ? true : false;
	if(isset($EnergyInput['IND1']) && ($EnergyInput['IND1']==2 || $EnergyInput['IND1']==3 )){	
		echo $this->Form->checkbox('IND2', array(
	    	'id' => 'IND2',
	    	'value' => '1',    
	    	'hiddenField' => false,
	    	'checked' => $vIND2
		));
	}else{
		echo $this->Form->checkbox('IND2', array(
	    	'id' => 'IND2',
	    	'value' => '1',    	
	    	'disabled' => true,
	    	'hiddenField' => false,
	    	'checked' => $vIND2
		));
	}
?><label for="IND2"><?php echo __('主燃料'); ?></label></li>
<li><label for="Fuel_name"><?php echo __('主燃料の名称'); ?></label> <?php $vFuel_name = (isset($EnergyInput['Fuel_name']))? $EnergyInput['Fuel_name'] : '';
	echo $this->Form->input('Fuel_name',
		array(
			'id' => 'Fuel_name',
			'type' => 'text',			
			'value' => $vFuel_name,
			'readonly' => true,			
			'label' => false,
			'class' => "select",
			'div' => false
		)
	); 	
?></li>
<br>
<li>　<?php $vQ3 = (isset($EnergyInput['Q3']) && $EnergyInput['Q3'] == 1) ? true : false;
	echo $this->Form->checkbox('Q3', array(
    	'id' => 'Q3',
    	'value' => '1',    	
    	'hiddenField' => false,
    	'checked' => $vQ3
	));
?><label for="Q3"><?php echo __('可燃性付着物'); ?></label></li>
<li>　<?php $vIND3 = (isset($EnergyInput['IND3']) && $EnergyInput['IND3'] == 1) ? true : false;
	echo $this->Form->checkbox('IND3', array(
    	'id' => 'IND3',
    	'value' => '1',    	
    	'hiddenField' => false,
    	'checked' => $vIND3
	));
?><label for="IND3"><?php echo __('雰囲気ガス製造'); ?></label></li>
</ul>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p05();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript">	
if($('#IND2').is(':checked')){
	$("#Fuel_name").removeAttr("readonly");	
	$("#Fuel_name").removeClass("select");
}
<?php 
if(isset($EnergyInput['IND1']) && ($EnergyInput['IND1']==2 || $EnergyInput['IND1']==3 )){	
?>	
$('#IND2').change(function(){
	if($('#IND2').is(':checked')){		
		$("#Fuel_name").removeAttr("readonly");	
		$("#Fuel_name").removeClass("select");
		$("#Fuel_name").focus();
	}else{
		$("#Fuel_name").val("");
		$("#Fuel_name").attr("readonly", true);		
		$("#Fuel_name").addClass("select");
	}
});
<?php } ?>
function submit_frm_p05(){
	var mes_err = "";
	var chk = true;
	<?php 
	if(isset($EnergyInput['IND1']) && ($EnergyInput['IND1']==2 || $EnergyInput['IND1']==3 )){	
	?>	
	if(!$('#IND2').is(':checked') && !$('#Q3').is(':checked') && !$('#IND3').is(':checked')){
		mes_err += "<?php echo __('一つ項目以上を選択してください');?>\n";
		chk = false;
	}
	<?php }else{ ?>
	if(!$('#Q3').is(':checked')){
		mes_err += "<?php echo __('可燃性付着物を選択してください');?>\n";
		chk = false;
	}

	if(!$('#IND3').is(':checked')){
		mes_err += "<?php echo __('雰囲気ガス製造を選択してください');?>\n";
		chk = false;
	}
	<?php } ?>
	if($("#IND2").is(':checked') && $("#Fuel_name").val().length < 1){
		mes_err += "<?php echo __('主燃料の名称を選択してください');?>\n";
		$("#Fuel_name").focus();
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