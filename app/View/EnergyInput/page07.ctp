<div class="content_box">
<h2><?php echo __('燃料設定'); ?></h2>
<p class="text"><?php echo __('入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup07.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page07'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable_p07">
<tr>
<th class="thleft"><?php echo __('燃料関連指定方法選択'); ?></th>
<td colspan="2"><?php $vQ1 = (isset($EnergyInput['Q1'])) ? $EnergyInput['Q1']: '';
	echo $this->Form->radio(
				'Q1', 
				array(
					'A' => __('既定値選択'),
					'B' => __('デ－タ入力')
				), 
				array(
					'value' => $vQ1,
					'legend' => false,
					'class' => 'Q1',
					'id' => 'Q1',
					'hiddenField' => false
				)
				);
	?></td>
</tr>

<tr>
<th class="thleft" rowspan="2"><?php echo __('燃料種類の選択'); ?></th>
<td class="radio"> <?php $vQ2 = (isset($EnergyInput['Q2'])) ? $EnergyInput['Q2']: '';
	$vVfC = (isset($EnergyInput['VfC']))? $EnergyInput['VfC'] : '';
	$VfC = $this->Form->input('VfC',
		array(
			'id' => 'VfC',
			'type' => 'text',			
			'value' => $vVfC,
			'class' => 'small select',			
			'readonly' => true,
			'label' => false,
			'div' => false
		)
	); 
	echo $this->Form->radio(
				'Q2', 
				array(
					'C' => __('気体燃料'),
					'D' => __('液体燃料')
				), 
				array(
					'value' => $vQ2,
					'legend' => false,
					'separator' => '</td>
<td><label for="VfC">' . __('気体燃料使用量') . '</label>
'.$VfC.'m<sup>3</sup>(n)/t</td>
</td>
</tr>
<tr>
<td class="radio">',
					'class' => 'Q2',
					'id' => 'Q2',
					'hiddenField' => false
				)
				);
	?></td>
<td><label for="VfD"><?php echo __('液体燃料使用量'); ?></label>
<?php $vVfD = (isset($EnergyInput['VfD']))? $EnergyInput['VfD'] : '';
echo $this->Form->input('VfD',
		array(
			'id' => 'VfD',
			'type' => 'text',			
			'value' => $vVfD,
			'readonly' => true,
			'class' => 'small select',
			'label' => false,
			'div' => false
		)
	); 
?>
kg/t</td>
</tr>

</table>

<?php echo $this->Form->end();?>

<!--
<h3 class="second02">燃料関連指定方法選択</h3>
<ul class="checkBoxList">
<li><input type="radio" name="" value="既定値選択" id="1"><label for="1">既定値選択</label></li>
<li><input type="radio" name="" value="デ－タ入力" id="2"><label for="2">デ－タ入力</label></li>
</ul>
<div class="clr"></div>

<h3 class="second02">燃料種類の選択</h3>
<ul class="checkBoxList">
<li><input type="radio" name="" value="気体燃料" id="3"><label for="3">気体燃料  </label></li>
<li><input type="radio" name="" value="液体燃料" id="4"><label for="4">液体燃料  </label></li>
</ul>
<div class="clr"></div>


<table class="checkBoxTable">
<tr>
<th><label for="5">気体燃料使用量</label></th>
<td><input type="text" name="" value="" id="5" class="small"></td>
<th><label for="6">液体燃料使用量</label></th>
<td><input type="text" name="" value="" id="6" class="small"></td>
</tr>
</table>
-->

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p07();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
if($('#Q2C').is(':checked')){
	$("#VfC").removeAttr("readonly");
	$("#VfC").removeClass("select");	
	$("#VfC").focus();
}

if($('#Q2D').is(':checked')){
	$("#VfD").removeAttr("readonly");
	$("#VfD").removeClass("select");
	$("#VfD").focus();	
}

$('#Q2C').change(function(){
	$("#VfC").removeAttr("readonly");		
	$("#VfC").removeClass("select");
	$("#VfC").focus();

	$("#VfD").val("");
	$("#VfD").attr("readonly", true);
	$("#VfD").addClass("select");
});

$('#Q2D').change(function(){
	$("#VfD").removeAttr("readonly");		
	$("#VfD").removeClass("select");
	$("#VfD").focus();

	$("#VfC").val("");
	$("#VfC").attr("readonly", true);
	$("#VfC").addClass("select");
});

function submit_frm_p07(){
	var mes_err = "";
	var chk = true;
	if(!$('.Q1').is(':checked')){
		mes_err += "<?php echo __('燃料関連指定方法を選択してください');?>\n";		
		chk = false;
	}

	if(!$('.Q2').is(':checked')){
		mes_err += "<?php echo __('燃料種類を選択してください');?>\n";		
		chk = false;
	}

	if((!isNumberic($("#VfC").val()) || $("#VfC").val()<0.0) && $('#Q2C').is(':checked') ){
		mes_err += "<?php echo __('気体燃料使用量に数値を入力してください');?>\n";		
		mes_err += "<?php echo __('気体燃料使用量に0.0より大きく入力してください');?>\n";
		chk = false;
	}

	if( !$('#Q2C').is(':checked') && !isNumberic($("#VfC").val()) && $("#VfC").val().length>0){
		mes_err += "<?php echo __('気体燃料使用量に数値を入力してください');?>\n";
		chk = false;
	}

	if( (!isNumberic($("#VfD").val()) || $("#VfD").val()<0.0) && $('#Q2D').is(':checked') ){
		mes_err += "<?php echo __('液体燃料使用量に数値を入力してください');?>\n";		
		mes_err += "<?php echo __('液体燃料使用量に0.0より大きく入力してください');?>\n";
		chk = false;
	}
	
	if( !$('#Q2D').is(':checked') && !isNumberic($("#VfD").val()) && $("#VfD").val().length>0){
		mes_err += "<?php echo __('液体燃料使用量に数値を入力してください');?>\n";
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