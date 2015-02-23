<div class="content_box">
<h2><?php echo __('炉体損失実行選択'); ?></h2>
<p class="text"><?php echo __('炉体の損失熱関連の処理を実行しますか？'); ?></p>

<div class="clr"></div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup20.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?> </a></p></div>

<div class="clr"></div>
<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page20'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<ul class="selectRadioList">
<li><?php $vPg20Choose = (isset($EnergyInput['Pg20Choose'])) ? $EnergyInput['Pg20Choose']: '';
	echo $this->Form->radio(
				'Pg20Choose', 
				array(
					'1' => __('実行'),
					'2' => __('スキップ')
				), 
				array(
					'value' => $vPg20Choose,
					'legend' => false,
					'separator' => '</li><li class="typeRight">',
					'class' => 'check',
					'id' => 'Pg20Choose',
					'hiddenField' => false
				)
				);
	?></li>
</ul>

<div class="clr"></div>
<div class="btn_ok"><p><a href="#" onClick="submit_frm_p20();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p20(){
	
	if(!$(".check").is(":checked")){
		alert("<?php echo __('炉体の損失熱関連の処理を選択してください');?>");
		return false;
	}

	document.forms['EnergyInputForm'].submit();
}
</script>

</div>