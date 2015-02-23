<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('電気損失改善'); ?></h1>
<p class="text"><?php echo __('改善後の目標値を入力してＯＫを押してください。'); ?></p>

<div class="clr"></div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup15.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>
<div class="clr"></div>

<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b15'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<table class="checkBoxTable">
<tr>
<th class="name"><?php echo __('検討項目'); ?></th>
<th><?php echo __('現状'); ?></th>
<th><?php echo __('改善'); ?></th>
</tr>
<tr>
<th><label for="1"><?php echo __('周波数変換損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_fre']) ? $InnovationInput['El_fre'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_fre2 = (isset($InnovationInput['page_b15']['El_fre2']))? 
						$InnovationInput['page_b15']['El_fre2'] :'';
		echo $this->Form->input('El_fre2', array(
			'id'=> 'El_fre2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_fre2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="2"><?php echo __('コイル損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_coil']) ? $InnovationInput['El_coil'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_coil2 = (isset($InnovationInput['page_b15']['El_coil2']))? 
						$InnovationInput['page_b15']['El_coil2'] :'';
		echo $this->Form->input('El_coil2', array(
			'id'=> 'El_coil2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_coil2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="3"><?php echo __('トランス損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_trans']) ? $InnovationInput['El_trans'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_trans2 = (isset($InnovationInput['page_b15']['El_trans2']))? 
						$InnovationInput['page_b15']['El_trans2'] :'';
		echo $this->Form->input('El_trans2', array(
			'id'=> 'El_trans2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_trans2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="4"><?php echo __('電極損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_terminal']) ? $InnovationInput['El_terminal'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_terminal2 = (isset($InnovationInput['page_b15']['El_terminal2']))? 
						$InnovationInput['page_b15']['El_terminal2'] :'';
		echo $this->Form->input('El_terminal2', array(
			'id'=> 'El_terminal2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_terminal2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="5"><?php echo __('コンデンサー損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_con']) ? $InnovationInput['El_con'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_con2 = (isset($InnovationInput['page_b15']['El_con2']))? 
						$InnovationInput['page_b15']['El_con2'] :'';
		echo $this->Form->input('El_con2', array(
			'id'=> 'El_con2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_con2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="6"><?php echo __('配線損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_wir']) ? $InnovationInput['El_wir'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_wir2 = (isset($InnovationInput['page_b15']['El_wir2']))? 
						$InnovationInput['page_b15']['El_wir2'] :'';
		echo $this->Form->input('El_wir2', array(
			'id'=> 'El_wir2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_wir2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
<tr>
<th><label for="7"><?php echo __('制御損失'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['El_cl']) ? $InnovationInput['El_cl'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php $vEl_cl2 = (isset($InnovationInput['page_b15']['El_cl2']))? 
						$InnovationInput['page_b15']['El_cl2'] :'';
		echo $this->Form->input('El_cl2', array(
			'id'=> 'El_cl2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vEl_cl2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
</table>
<div class="clr"></div>


<div class="btn_ok"><p><a href="#" onClick="submit_form_b15();"><?php echo __('OK'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('閉じる'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

<script type="text/javascript">
	function submit_form_b15(){		
		var msg_error = "";
		var id_err = [];
		var check = true;

		if(!isNumberic($("#El_fre2").val())){				
			msg_error += "<?php echo __('周波数変換損失に半角数字で入力してください');?>\n";
			id_err.push("El_fre2");
			check = false;	
		}

		if(!isNumberic($("#El_coil2").val())){				
			msg_error += "<?php echo __('コイル損失に半角数字で入力してください');?>\n";
			id_err.push("El_coil2");
			check = false;	
		}

		if(!isNumberic($("#El_trans2").val())){				
			msg_error += "<?php echo __('トランス損失に半角数字で入力してください');?>\n";
			id_err.push("El_trans2");
			check = false;	
		}

		if(!isNumberic($("#El_terminal2").val())){				
			msg_error += "<?php echo __('電極損失に半角数字で入力してください');?>\n";
			id_err.push("El_terminal2");
			check = false;	
		}

		if(!isNumberic($("#El_con2").val())){				
			msg_error += "<?php echo __('コンデンサー損失に半角数字で入力してください');?>\n";
			id_err.push("El_con2");
			check = false;	
		}

		if(!isNumberic($("#El_wir2").val())){				
			msg_error += "<?php echo __('配線損失に半角数字で入力してください');?>\n";
			id_err.push("El_wir2");
			check = false;	
		}

		if(!isNumberic($("#El_cl2").val())){				
			msg_error += "<?php echo __('制御損失に半角数字で入力してください');?>\n";
			id_err.push("El_cl2");
			check = false;	
		}

		if(!check){
			$("#"+id_err[0]).focus();
			alert(msg_error);
			return false;
		}
		
		$.ajax({
			url: "<?php echo $this->webroot, $this->params['controller']; ?>/page_b15",
			type: "POST",
			cache: false,
			data: $("#InnovationInputForm").serialize(),
			success: function(responce){

				var resp = JSON.parse(responce);

				$("#chkStatus ", opener.document).val(0);
				$("#EF1_b15", opener.document).html(resp.EF1);
				$("#EF2_b15", opener.document).val(resp.EF2);
				$("#Save_energy_ratio_b15", opener.document).val(resp.Save_energy_ratio);
				
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