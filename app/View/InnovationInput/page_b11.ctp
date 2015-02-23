<div class="content_box">
<h2><?php echo __('電気炉対策処理'); ?></h2>
<p class="text">
<?php echo __('検討する項目の'); ?> <span class="cul"><?php echo __('計算'); ?></span><?php echo __('を選んで、改善後の数値を入力してください。'); ?>
</p>

<div class="clr"></div>
<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup11.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>
<div class="clr"></div>

<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b11'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>">

<input type="hidden" name="actSave" value="page_b11" id="actSave" class="select">
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
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b15")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="1"><?php echo __('電気損失改善検討実行'); ?></label></td>
<td>
	<div id="EF1_b15">
		<?php
			echo isset($InnovationInput['Total100']) ?  $InnovationInput['Total100']: 0;
		?>
		kJ/t
	</div>
</td>
<td><?php $vEF2_b15 = 	isset($InnovationInput['page_b15']['EF2']) ? 
						$InnovationInput['page_b15']['EF2']: '';
		echo $this->Form->input('EF2_b15', array(
			'id'=> 'EF2_b15',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vEF2_b15,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kJ/t
</td>
<td><?php $vSave_energy_ratio_b15 = isset($InnovationInput['page_b15']['Save_energy_ratio']) ? 
									$InnovationInput['page_b15']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b15', array(
			'id'=> 'Save_energy_ratio_b15',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b15,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%
</td>
</tr>
<tr>
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b12")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="2"><?php echo __('炉体損失熱改善検討実行'); ?></label></td>
<td>
	<div id="EF1_b12">
		<?php
			echo isset($InnovationInput['Total_lossB11']) ?  $InnovationInput['Total_lossB11']: 0;
		?>
		kJ/t
	</div>
</td>
<td><?php $vEF2_b12 = 	isset($InnovationInput['page_b12']['EF2']) ? 
						$InnovationInput['page_b12']['EF2']: '';
		echo $this->Form->input('EF2_b12', array(
			'id'=> 'EF2_b12',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vEF2_b12,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kJ/t
</td>
<td><?php $vSave_energy_ratio_b12 = isset($InnovationInput['page_b12']['Save_energy_ratio']) ? 
									$InnovationInput['page_b12']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b12', array(
			'id'=> 'Save_energy_ratio_b12',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b12,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%
</td>
</tr>
<tr>
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b13")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="3"><?php echo __('ジグ、トレー必要熱改善検討実行'); ?></label></td>
<td>
	<div id="EF1_b13">
		<?php
			echo isset($InnovationInput['El_jig_t']) ?  $InnovationInput['El_jig_t']: 0;
		?>
		kJ/t
	</div>
</td>
<td><?php $vEF2_b13 = 	isset($InnovationInput['page_b13']['EF2']) ? 
						$InnovationInput['page_b13']['EF2']: '';
		echo $this->Form->input('EF2_b13', array(
			'id'=> 'EF2_b13',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vEF2_b13,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kJ/t
</td>
<td><?php $vSave_energy_ratio_b13 = isset($InnovationInput['page_b13']['Save_energy_ratio']) ? 
									$InnovationInput['page_b13']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b13', array(
			'id'=> 'Save_energy_ratio_b13',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b13,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	%
</td>
</tr>
<tr>
<td class="radio"><p class="cul4"><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b14")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算'); ?></a></p></td>
<td><label for="3"><?php echo __('材料予熱効果改善検討実行'); ?></label></td>
<td>
	<div id="EF1_b14">
		<?php
			echo isset($InnovationInput['Eeffect']) ?  $InnovationInput['Eeffect']: 0;
		?>
		kJ/t
	</div>
</td>
<td><?php $vEF2_b14 = 	isset($InnovationInput['page_b14']['EF2']) ? 
						$InnovationInput['page_b14']['EF2']: '';
		echo $this->Form->input('EF2_b14', array(
			'id'=> 'EF2_b14',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vEF2_b14,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kJ/t
</td>
<td><?php $vSave_energy_ratio_b14 = isset($InnovationInput['page_b14']['Save_energy_ratio']) ? 
									$InnovationInput['page_b14']['Save_energy_ratio']: '';
		echo $this->Form->input('Save_energy_ratio_b14', array(
			'id'=> 'Save_energy_ratio_b14',
			'type' => 'text',
			'class' => 'small select',
			'readonly' => true,
			'label' => false,
			'value' => $vSave_energy_ratio_b14,
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

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "innovation_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

<script type="text/javascript"> 
	function submit_frm_b11(){
		var msg_error = [];
		var id_err = [];
		var check = true;

		if(!isNumberic($("#EF2_b15").val())){
			msg_error.push("<?php echo __('電気損失改善検討実行を計算して下さい');?>\n");
			id_err.push("EF2_b15");
			check = false;	
		}

		if(!isNumberic($("#EF2_b12").val())){
			msg_error.push("<?php echo __('炉体損失熱改善検討実行を計算して下さい');?>\n");
			id_err.push("EF2_b12");
			check = false;	
		}

		if(!isNumberic($("#EF2_b13").val())){
			msg_error.push("<?php echo __('ジグ、トレー必要熱改善検討実行を計算して下さい');?>\n");
			id_err.push("EF2_b13");
			check = false;	
		}

		if(!isNumberic($("#EF2_b14").val())){
			msg_error.push("<?php echo __('材料予熱効果改善検討実行を計算して下さい');?>\n");
			id_err.push("EF2_b14");
			check = false;	
		}

		if(!msg_error.length == 4){
			$("#"+id_err[0]).focus();
			alert(msg_error[0]);
			return false;
		}else{
			return true;
		}
	} 
	$("#save02").click(function(){		
		if(submit_frm_b11()){
			var data = $("#InnovationInputForm").serialize();
			w=window.open('<?php echo $this->Html->url(array("controller" => "save02", "action" =>"index"));?>?' + data,'','scrollbars=yes,Width=560,Height=500');
			w.focus();
		}
	});

	$("#to_out").click(function(){
		if(submit_frm_b11()){
			$("#InnovationInputForm").submit();
		}
	});
</script>