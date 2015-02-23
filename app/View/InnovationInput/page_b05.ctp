<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('ジグ・トレー改善'); ?></h1>

<p class="text"><?php echo __('改善後の目標値を入力してＯＫを押してください。'); ?></p>
<div class="clr"></div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup05.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b05'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<table class="checkBoxTable">
<tr>
<th class="name"><?php echo __('検討項目'); ?></th>
<th class="name"><?php echo __('現状'); ?></th>
<th class="name"><?php echo __('改善'); ?></th>
</tr>
<tr>
<th><label for="1"><?php echo __('ジグ材料'); ?></label></th>
<td>
	<?php 
		$vIjig1 = (isset($InnovationInput['Ijig_name'][1]))? $InnovationInput['Ijig_name'][1] : 0;
		echo $vIjig1;
	?>
</td>
<td><p class="cul5"><a id="actp5" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "innovation_input", "action" =>"page_b19/5")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('選択'); ?></a></p>
	<?php $vIjig5 = (isset($InnovationInput['Ijig'][5]))? $InnovationInput['Ijig'][5] : '';
		echo $this->Form->input('Ijig[5]',
		array(
			'id' => 'Ijigp5',
			'name' => 'data[innovation_input][Ijig][5]',
			'type' => 'text',			
			'value' => $vIjig5,
			'class' => 'medium select',
			'hidden' => true,
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
$vIjig_name5 = (isset($InnovationInput['page_b05']['Ijig_name'][5]))? 
				$InnovationInput['page_b05']['Ijig_name'][5] : '';
		echo $this->Form->input('Ijig_name[5]',
		array(
			'id' => 'Ijig_namep5',
			'name' => 'data[innovation_input][Ijig_name][5]',
			'type' => 'text',	
			'readonly' => true,		
			'value' => $vIjig_name5,
			'class' => 'medium select',
			'label' => false,
			'div' => false,
			'maxlength' => '40'
		)
	); 
?>
</td>
</tr>
<tr>
<th><label for="1"><?php echo __('ジグ重量'); ?></label></th>
<td>
	<?php 
		echo (isset($InnovationInput['Mj'][1]))? $InnovationInput['Mj'][1] : 0;
	?>
	kg/t
</td>
<td>
	<?php $vMj2 = isset($InnovationInput['page_b05']['Mj2']) ? $InnovationInput['page_b05']['Mj2']: '';
		echo $this->Form->input('Mj2', array(
			'id'=> 'Mj2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vMj2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kg/t
</td>
</tr>
<tr>
<th><label for="2"><?php echo __('ジグ入口温度'); ?></label></th>
<td>
	<?php 
		echo (isset($InnovationInput['Tj11'][1]))? $InnovationInput['Tj11'][1] : 0;
	?>
	℃
</td>
<td>
	<?php $vTj12 = isset($InnovationInput['page_b05']['Tj12']) ? $InnovationInput['page_b05']['Tj12']: '';
		echo $this->Form->input('Tj12', array(
			'id'=> 'Tj12',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vTj12,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	℃
</td>
</tr>
<tr>
<th><label for="3"><?php echo __('ジグ出口温度'); ?></label></th>
<td>
	<?php 
		echo (isset($InnovationInput['Tj21'][1]))? $InnovationInput['Tj21'][1] : 0;
	?>
	℃
</td>
<td>
	<?php $vTj22 = isset($InnovationInput['page_b05']['Tj22']) ? $InnovationInput['page_b05']['Tj22']: '';
		echo $this->Form->input('Tj22', array(
			'id'=> 'Tj22',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vTj22,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	℃
</td>
</tr>
</table>
<div class="clr"></div>


<div class="btn_ok"><p><a href="#" onClick="submit_form_b05();"><?php echo __('OK'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

<script type="text/javascript"> 
	function submit_form_b05(){	
		var msg_error = "";
		var id_err = [];
		var check = true;
		if($("#Ijig_namep5").val().length === 0){				
			msg_error += "<?php echo __('ジグ材料を選択してください');?>\n";
			id_err.push("Ijig_namep5");
			check = false;	
		}

		if(!isNumberic($("#Mj2").val())){				
			msg_error += "<?php echo __('ジグ重量に数値を入力してください');?>\n";
			id_err.push("Mj2");
			check = false;	
		}

		if(!isNumberic($("#Tj12").val())){				
			msg_error += "<?php echo __('ジグ入口温度に数値を入力してください');?>\n";
			id_err.push("Tj12");
			check = false;	
		}

		if(!isNumberic($("#Tj22").val())){				
			msg_error += "<?php echo __('ジグ出口温度に数値を入力してください');?>\n";
			id_err.push("Tj22");
			check = false;	
		}

		if(!check){
			$("#"+id_err[0]).focus();
			alert(msg_error);
			return false;
		}

		$.ajax({
			url: "<?php echo $this->webroot, $this->params['controller']; ?>/page_b05",
			type: "POST",
			cache: false,
			data: $("#InnovationInputForm").serialize(),
			success: function(responce){

				var resp = JSON.parse(responce);

				$("#chkStatus ", opener.document).val(0);
				$("#EF1_b05", opener.document).html(resp.EF1);
				$("#EF2_b05", opener.document).val(resp.EF2);
				$("#Save_energy_ratio_b05", opener.document).val(resp.Save_energy_ratio);
				
				window.close();	
			},
			error: function (){								
				alert("<?php echo __('例外エラーを発生してしまいました');?>");
				window.close();
			}
		});		
		return false;
	}
</script>