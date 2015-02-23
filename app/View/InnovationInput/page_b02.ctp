<div class="content_box">
<h2><?php echo __('燃焼炉対策処理'); ?></h2>
<p class="text">
<?php echo __('検討する項目の'); ?> <span class="cul"><?php echo __('計算'); ?></span><?php echo __('を選んで、改善後の数値を入力してください。'); ?>
</p>

<!--<div class="btn_pdf"><p><a href="#">出力</a></p></div>-->
<div class="clr"></div>
<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup02.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>
<div class="clr"></div>


<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b02'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" ?>

<input type="hidden" name="actSave" value="page_b02" id="actSave" class="select">
<input type="hidden" name="chkStatus" value="0" id="chkStatus" class="select">

<table class="checkBoxTable4 tbl">
<tr>
<th></th>
<th class="name"><?php echo __('検討項目'); ?></th>
<th><?php echo __('現状'); ?></th>
<th><?php echo __('改善後'); ?></th>
<th><?php echo __('省エネ率'); ?></th>
</tr>
<tr>
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b03")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="1"><?php echo __('排熱回収率の改善検討'); ?></label></td>
<td>
	<div id="ETA1_b03">
	<?php
		echo isset($InnovationInput['ETA_R1']) ? $InnovationInput['ETA_R1']: 0;
	?>
	%
	</div></td>
<td>
	<?php $vETA2_b03 = 	isset($InnovationInput['page_b03']['ETA2']) ? 
						$InnovationInput['page_b03']['ETA2']: '';
		echo $this->Form->input('ETA2_b03', array(
			'id'=> 'ETA2_b03',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vETA2_b03 ,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%
</td>
<td>
	<?php $vSave_energy_ratio_b03 = isset($InnovationInput['page_b03']['Save_energy_ratio']) ? 
									$InnovationInput['page_b03']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b03', array(
			'id'=> 'Save_energy_ratio_b03',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b03,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%
</td>
</tr>
<tr>
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b04")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="2"><?php echo __('炉体損失熱の改善検討'); ?></label></td>
<td>
	<div id="Eh_fuel_b04"> 
	<?php
		echo isset($InnovationInput['Total_lossB02']) ?	$InnovationInput['Total_lossB02']: 0;
	?>
	kJ/t
	</div></td>
<td>
	<?php $vEh_fuel2_b04 = 	isset($InnovationInput['page_b04']['Eh_fuel2']) ? 
							$InnovationInput['page_b04']['Eh_fuel2']: '';
		echo $this->Form->input('Eh_fuel2_b04', array(
			'id'=> 'Eh_fuel2_b04',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vEh_fuel2_b04,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kJ/t
</td>
<td>
	<?php $vSave_energy_ratio_b04 = isset($InnovationInput['page_b04']['Save_energy_ratio']) ? 
									$InnovationInput['page_b04']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b04', array(
			'id'=> 'Save_energy_ratio_b04',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b04,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%
</td>
</tr>
<tr>
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b05")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="3"><?php echo __('ジグ、トレー必要熱の改善'); ?></label></td>
<td>
	<div id="EF1_b05"> 
	<?php
		echo isset($InnovationInput['El_jig_t']) ? $InnovationInput['El_jig_t']: 0;
	?>
	kJ/t
	</div>
</td>
<td>
	<?php $vEF2_b05 = 	isset($InnovationInput['page_b05']['EF2']) ? 
						$InnovationInput['page_b05']['EF2']: '';
		echo $this->Form->input('EF2_b05', array(
			'id'=> 'EF2_b05',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vEF2_b05 ,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kJ/t
</td>
<td>
	<?php $vSave_energy_ratio_b05 = isset($InnovationInput['page_b05']['Save_energy_ratio']) ? 
									$InnovationInput['page_b05']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b05', array(
			'id'=> 'Save_energy_ratio_b05',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b05,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%</td>
</tr>
<tr>
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b06")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="4"><?php echo __('材料予熱効果の検討'); ?></label></td>
<td>
	<div id="Eh_fuel_b06">
	<?php
		echo isset($InnovationInput['Eeffect']) ? $InnovationInput['Eeffect']: 0;
	?>
	 kJ/t
	</div>
</td>
<td><?php $vEh_fuel2_b06 = 	isset($InnovationInput['page_b06']['Eh_fuel2']) ? 
							$InnovationInput['page_b06']['Eh_fuel2']: '';
		echo $this->Form->input('Eh_fuel2_b06', array(
			'id'=> 'Eh_fuel2_b06',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vEh_fuel2_b06,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kJ/t
</td>
<td><?php $vSave_energy_ratio_b06 = isset($InnovationInput['page_b06']['Save_energy_ratio']) ? 
									$InnovationInput['page_b06']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b06', array(
			'id'=> 'Save_energy_ratio_b06',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b06,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%
</td>
</tr>
<tr>
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b07")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="5"><?php echo __('空気比の改善検討'); ?></label></td>
<td>
	<div id="ETA1_b07">
	<?php
		echo isset($InnovationInput['Mhyp']) ? $InnovationInput['Mhyp']: 0;
	?>
	</div>
</td>
<td><?php $vETA2_b07 = 	isset($InnovationInput['page_b07']['ETA2']) ? $InnovationInput['page_b07']['ETA2']: '';
		echo $this->Form->input('ETA2_b07', array(
			'id'=> 'ETA2_b07',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vETA2_b07 ,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
</td>
<td><?php $vSave_energy_ratio_b07 = isset($InnovationInput['page_b07']['Save_energy_ratio']) ? 
									$InnovationInput['page_b07']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b07', array(
			'id'=> 'Save_energy_ratio_b07',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b07,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%
</td>
</tr>

</table>
<div class="clr"></div>
<div class="btn_save_next"><p><a id="save02" href="#"><?php echo __('結果を保存'); ?></a></p></div>
<div class="clr"></div>


<div class="btn_out"><p><a href="#" id="to_out"><?php echo __('結果出力'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>$previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

<script type="text/javascript">
	function submit_frm_b02(){
		var msg_error = [];
		var id_err = []; 
		var check = true;

		if(!isNumberic($("#ETA2_b03").val())){
			msg_error.push("<?php echo __('排熱回収率の改善検討を計算して下さい');?>\n");
			id_err.push("ETA2_b03");
			check = false;	
		}

		if(!isNumberic($("#Eh_fuel2_b04").val())){
			msg_error.push("<?php echo __('炉体損失熱の改善検討を計算して下さい');?>\n");
			id_err.push("Eh_fuel2_b04");
			check = false;	
		}

		if(!isNumberic($("#EF2_b05").val())){
			msg_error.push("<?php echo __('ジグ、トレー必要熱の改善を計算して下さい');?>\n");
			id_err.push("EF2_b05");
			check = false;	
		}

		if(!isNumberic($("#Eh_fuel2_b06").val())){
			msg_error.push("<?php echo __('材料予熱効果の検討を計算して下さい');?>\n");
			id_err.push("Eh_fuel2_b06");
			check = false;	
		}

		if(!isNumberic($("#ETA2_b07").val())){
			msg_error.push("<?php echo __('空気比の改善検討を計算して下さい');?>\n");
			id_err.push("ETA2_b07");
			check = false;	
		}
		
		if(!msg_error.length == 5){
			$("#"+id_err[0]).focus();
			alert(msg_error[0]);
			return false;
		}else{
			return true;
		}
	} 
	$("#save02").click(function(){
		if(submit_frm_b02()){	
			var data = $("#InnovationInputForm").serialize();
			w=window.open('<?php echo $this->Html->url(array("controller" => "save02", "action" =>"index"));?>?' + data,'','scrollbars=yes,Width=560,Height=500');
			w.focus();
		
		}
	});

	$("#to_out").click(function(){
		if(submit_frm_b02()){
			$("#InnovationInputForm").submit();
		}
	});
</script>