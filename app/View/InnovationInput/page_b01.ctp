<div class="content_box">
<h2><?php echo __('燃焼炉対策の実行'); ?></h2>
<p class="text">
<?php echo __('作成したヒートバランス表に基づいて燃焼炉の省エネルギー対策の検討を行います。'); ?>
</p>

<div class="clr"></div>
<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup01.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>
<div class="clr"></div>


<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b01'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>">

<ul class="selectRadioList">

<li>
	<?php $vradioPgB01 = (isset($InnovationInput['page_b01']['radioPgB01'])) ? 
						 $InnovationInput['page_b01']['radioPgB01']:'';
	echo $this->Form->radio(
				'radioPgB01', 
				array(
					'1' => __('実行'),
					'0' => __('スキップ'),
				), 
				array(
					'value' => $vradioPgB01,
					'legend' => false,
					'separator' => '</li><li class="typeRight">',
					'class' => 'radioPgB01',
					'id' => 'radioPgB01',
					'hiddenField' => false
				)
				);
	?>
</li>
</ul>


<div class="clr"></div>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_form_b01();"><?php echo __('OK'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "innovation_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

<script type="text/javascript"> 
function submit_form_b01(){		
	if(!$('.radioPgB01').is(':checked')){
		alert("<?php echo __('燃焼炉対策の実行選択してください');?>");
		return false;	
	}
	document.forms['InnovationInputForm'].submit();		
}
</script>