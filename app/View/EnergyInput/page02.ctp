<div class="content_box">
<h2><?php echo __('工業炉タイプ選択'); ?></h2>
<p class="text"><?php echo __('どのタイプの工業炉を選択しますか？'); ?><!--（現在は３つのタイプから選べます）--><br>
<?php echo __('選択してOKボタンを押してください。'); ?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup02.html")); ?>', '', 'scrollbars=yes, Width=400, Height=400'); w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page02'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<h3 class="second"><?php echo __('炉種類'); ?></h3>
<ul class="checkBoxList">
<li><?php $vQ11 = (isset($EnergyInput['Q11'])) ? $EnergyInput['Q11']: '';
	echo $this->Form->radio(
				'Q11', 
				array(
					'1' => __('鋼材連続加熱'),
					'2' => __('アルミ溶解炉'),
					'3' => __('雰囲気熱処理炉'),
				), 
				array(
					'value' => $vQ11,
					'legend' => false,
					'separator' => '</li><li>',
					'class' => 'Q11',
					'id' => 'Q11',
					'hiddenField' => false
				)
				);
	?></li>
</ul>
<div class="clr"></div>

<h3 class="second"><?php echo __('加熱方式'); ?></h3>
<ul class="checkBoxList">
<li><?php $vIND1 = (isset($EnergyInput['IND1'])) ? $EnergyInput['IND1']: '';
	echo $this->Form->radio(
				'IND1', 
				array(
					'1' => __('電気加熱'),
					'2' => __('燃焼加熱'),
					'3' => __('混合加熱'),
				), 
				array(
					'value' => $vIND1,
					'legend' => false,
					'separator' => '</li><li>',					
					'class' => 'IND1',
					'id' => 'IND1',
					'hiddenField' => false
				)
				);
	?></li>
</ul>

<div class="clr"></div>


<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p02();" ><?php echo __('OK'); ?></a></p></div>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "menu", "action" =>"index")); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p02(){		
	var mes_err = "";
	var chk = true;
	if(!$('.Q11').is(':checked')){
		mes_err += "<?php echo __('炉種類を選択してください');?>\n";
		chk = false;
	}

	if(!$('.IND1').is(':checked')){
		mes_err += "<?php echo __('加熱方式を選択してください');?>\n";
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