<div class="content_box">
<h2><?php echo __('電気エネルギーの一次エネルギー換算データ入力'); ?></h2>
<p class="text"><?php echo __('既定の値は発電効率です。送電効率も考慮する場合は、ユーザー指定を用いてください。<br>入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup31.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page31'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable3 tbl">
<tr>
<th></th>
<th class="name"><?php echo __('選択'); ?></th>
<th><?php echo __('発電効率'); ?></th>
</tr>
<?php 
	$vEtae_C = (isset($EnergyInput['Etae_C'])) ? $EnergyInput['Etae_C'] : '';
?>
<tr>
<td class="radio"><?php 
	echo $this->Form->radio(
				'Etae_C', 
				array(					
					'1' => ''
				), 
				array(
					'value' => $vEtae_C,
					'legend' => false,
					'label' => false,
					'class' => 'Etae_C',
					'id' => 'Etae_C',
					'hiddenField' => false
				)
				);
	?></td>
<td><label for="Etae_C1"><?php echo __('ユーザ指定'); ?></label></td>
<td><?php $vEtae = (isset($EnergyInput['Etae_C']) && $EnergyInput['Etae_C']==1 && isset($EnergyInput['Etae']))? $EnergyInput['Etae'] : '';
echo $this->Form->input('Etae',
		array(
			'id' => 'Etae',
			'type' => 'text',			
			'value' => $vEtae,	
			'readonly' => true,
			'class' => 'select',		
			'label' => false,
			'div' => false
		)
	); 
?> %</td>
</tr>

<?php foreach($HADDEN_KORITSU as $kItem => $item){ ?>

<tr>
<td class="radio"><?php 
	echo $this->Form->radio(
				'Etae_C', 
				array(					
					$kItem => ''
				), 
				array(
					'value' => $vEtae_C,
					'legend' => false,
					'label' => false,
					'class' => 'Etae_C',
					'id' => 'Etae_C',
					'hiddenField' => false
				)
			);
	?></td>
<td><label for="Etae_C<?php echo $kItem;?>"><?php echo $item[0]; ?></label></td>
<td><?php echo $item[1]; ?> %</td>
</tr>

<?php } ?>

</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p31();"><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
$('.Etae_C').change(function(){
	if($(this).attr("id") == 'Etae_C1'){
		$("#Etae").removeAttr("readonly");
		$("#Etae").removeClass("select");	
		$("#Etae").focus();
	}else{
		$("#Etae").val("");
		$("#Etae").attr("readonly", true);
		$("#Etae").addClass("select");
	}
});

function submit_frm_p31(){
	var mes_err = "";
	var chk = true;	
	if(!$(".Etae_C").is(":checked")){
		mes_err += "<?php echo __('一つ項目を選択してください');?>\n";
		chk = false;
	}

	if( $("#Etae_C1").is(":checked") && (!isNumberic($("#Etae").val()) || $("#Etae").val()<0.0)){
		mes_err += "<?php echo __('ユーザ指定に数値を入力してください');?>\n";
		mes_err += "<?php echo __('ユーザ指定に0.0より大きく入力してください');?>\n";
		$("#Etae").focus();
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