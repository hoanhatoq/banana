<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('炉体損失改善'); ?></h1>
<p class="text"><?php echo __('改善後の目標値を入力してＯＫを押してください。'); ?></p>

<div class="clr"></div>


<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup12.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>
<div class="clr"></div>

<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b12'),
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
<th><label for="1"><?php echo __('炉体放散損失'); ?></label></th>
<td>
 	<?php
		echo isset($InnovationInput['El_wall1']) ? $InnovationInput['El_wall1'] : 0;
	?>
 	kJ/t
</td>
<td>
	<?php $vEl_wall2 = 	isset($InnovationInput['page_b12']['El_wall2']) ? 
						$InnovationInput['page_b12']['El_wall2']: '';
		echo $this->Form->input('El_wall2', array(
			'id'=> 'El_wall2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_wall2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="2"><?php echo __('開口部損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_opening1']) ? $InnovationInput['El_opening1'] : 0;
	?>
 	kJ/t
</td>
<td>
	<?php $vEl_opening2 = 	isset($InnovationInput['page_b12']['El_opening2']) ? 
							$InnovationInput['page_b12']['El_opening2']: '';
		echo $this->Form->input('El_opening2', array(
			'id'=> 'El_opening2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' =>  $vEl_opening2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="3"><?php echo __('冷却損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_cw1']) ? $InnovationInput['El_cw1'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_cw2 = 	isset($InnovationInput['page_b12']['El_cw2']) ? 
							$InnovationInput['page_b12']['El_cw2']: '';
		echo $this->Form->input('El_cw2', array(
			'id'=> 'El_cw2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_cw2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="4"><?php echo __('蓄熱損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_storage1']) ? $InnovationInput['El_storage1'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_storage2 = 	isset($InnovationInput['page_b12']['El_storage2']) ? 
							$InnovationInput['page_b12']['El_storage2']: '';
		echo $this->Form->input('El_storage2', array(
			'id'=> 'El_storage2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_storage2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	kJ/t
</td>
</tr>
</table>
<div class="clr"></div>


<div class="btn_ok"><p><a href="#" onClick="submit_form_b12();"><?php echo __('OK'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('閉じる'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>
<script type="text/javascript"> 
	function submit_form_b12(){	
		var msg_error = "";
		var id_err = [];
		var check = true;
		if(!isNumberic($("#El_wall2").val())){				
			msg_error += "<?php echo __('炉体放散損失に数値を入力してください');?>\n";
			id_err.push("El_wall2");
			check = false;	
		}

		if(!isNumberic($("#El_opening2").val())){				
			msg_error += "<?php echo __('開口部損失に数値を入力してください');?>\n";
			id_err.push("El_opening2");
			check = false;	
		}

		if(!isNumberic($("#El_cw2").val())){				
			msg_error += "<?php echo __('冷却損失に数値を入力してください');?>\n";
			id_err.push("El_cw2");
			check = false;	
		}

		if(!isNumberic($("#El_storage2").val())){				
			msg_error += "<?php echo __('蓄熱損失に数値を入力してください');?>\n";
			id_err.push("El_storage2");
			check = false;	
		}

		if(!check){
			$("#"+id_err[0]).focus();
			alert(msg_error);
			return false;
		}
		
		$.ajax({
			url: "<?php echo $this->webroot, $this->params['controller']; ?>/page_b12",
			type: "POST",
			cache: false,
			data: $("#InnovationInputForm").serialize(),
			success: function(responce){

				var resp = JSON.parse(responce);

				$("#chkStatus ", opener.document).val(0);
				$("#EF1_b12", opener.document).html(resp.EF1);
				$("#EF2_b12", opener.document).val(resp.EF2);
				$("#Save_energy_ratio_b12", opener.document).val(resp.Save_energy_ratio);
				
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