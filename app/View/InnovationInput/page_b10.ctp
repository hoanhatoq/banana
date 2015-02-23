<div class="content_box">
<h2><?php echo __('電気炉の省エネ対策'); ?></h2>

<p class="text">
<?php echo __('作成したヒートバランス表に基づいて電気炉の省エネルギー対策の検討を行います。'); ?>
</p>

<div class="clr"></div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup10.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b10'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" ?>

<ul class="selectRadioList">
<li>
	<?php $vradioPgB10 = (isset($InnovationInput['page_b10']['radioPgB10'])) ? 
						 $InnovationInput['page_b10']['radioPgB10']:'';
	echo $this->Form->radio(
				'radioPgB10', 
				array(
					'1' => __('実行'),
					'0' => __('スキップ'),
				), 
				array(
					'value' => $vradioPgB10,
					'legend' => false,
					'separator' => '</li><li class="typeRight">',
					'class' => 'radioPgB10',
					'id' => 'radioPgB10',
					'hiddenField' => false
				));
	?>
</li>
</ul>
<div class="clr"></div>



<div class="btn_ok"><p><a href="#" onClick="submit_form();"><?php echo __('OK'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "innovation_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>
</div>

<script type="text/javascript"> 
function submit_form(){		
	if(!$('.radioPgB10').is(':checked')){
		alert("<?php echo __('電気炉の省エネ対策選択してください');?>");
		return false;	
	}
	document.forms['InnovationInputForm'].submit();	
}
</script>