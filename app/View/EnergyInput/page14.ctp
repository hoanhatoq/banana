<div class="content_box">
<h2><?php echo __('JIG、台車、トレー等の計算実行選択'); ?></h2>
<p class="text"><?php echo __('被熱物関連のデータ入力をします。<br>データ入力を開始しますか？'); ?></p>
<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup14.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page14'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<h3><?php echo __('JIG等の計算実行'); ?></h3>
<ul class="selectRadioList">
<li><?php $vQ13 = (isset($EnergyInput['Q13'])) ? $EnergyInput['Q13']: '';
	echo $this->Form->radio(
				'Q13', 
				array(
					'1' => __('実行'),
					'2' => __('スキップ')
				), 
				array(
					'value' => $vQ13,
					'legend' => false,
					'separator' => '</li><li class="typeRight">',
					'class' => 'check',
					'id' => 'Q13',
					'hiddenField' => false
				)
				);
	?></li>
</ul>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p14();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p14(){	
	if(!$(".check").is(":checked")){
		alert("<?php echo __('JIG等の計算実行を選択してください');?>");
		return false;
	}

	document.forms['EnergyInputForm'].submit();
}
</script>

</div>