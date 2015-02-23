<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('材料予熱改善'); ?></h1>
<p class="text"><?php echo __('改善後の目標値を入力してＯＫを押してください。'); ?></p>

<div class="clr"></div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup06.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b06'),
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
<th><label for="1"><?php echo __('入口温度'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['Tp1']) ? $InnovationInput['Tp1']: 0;
	?>
	℃
</td>
<td>
	<?php $vTp12 = isset($InnovationInput['page_b06']['Tp12']) ? $InnovationInput['page_b06']['Tp12']: '';
		echo $this->Form->input('Tp12', array(
			'id'=> 'Tp12',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vTp12,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	℃
</td>
</tr>
<tr>
<th><label for="2"><?php echo __('出口温度'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['Tp2']) ? $InnovationInput['Tp2']: 0;
	?>
	℃
</td>
<td>
	<?php $vTp22 = isset($InnovationInput['page_b06']['Tp22']) ? $InnovationInput['page_b06']['Tp22']: '';
		echo $this->Form->input('Tp22', array(
			'id'=> 'Tp22',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vTp22,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	℃
</td>
</tr>
<tr>
<th><label for="3"><?php echo __('酸化減量'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['Mloss']) ? $InnovationInput['Mloss']: 0;
	?>
	t/h
</td>
<td>
	<?php $vMloss2 = isset($InnovationInput['page_b06']['Mloss2']) ? $InnovationInput['page_b06']['Mloss2']: '';
		echo $this->Form->input('Mloss2', array(
			'id'=> 'Mloss2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vMloss2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	t/h
</td>
</tr>
<tr>
<th><label for="4"><?php echo __('材料必要熱量'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['Eeffect1']) ? $InnovationInput['Eeffect1'] : 0;
	?>
	kJ/t
</td>
<td>
	<?php 	$vEeffect2 = (isset($InnovationInput['page_b06']['Eeffect2']))? 
						 $InnovationInput['page_b06']['Eeffect2'] :'';
		echo $this->Form->input('Eeffect2', array(
			'id'=> 'Eeffect2',
			'type' => 'text',
			'readonly' => true,
			'class' => 'small select',
			'label' => false,
			'value' => $vEeffect2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	kJ/t
</td>
</tr>
</table>
<div class="clr"></div>


<div class="btn_ok"><p><a href="#" onClick="submit_form_b06();"><?php echo __('OK'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

<script type="text/javascript">
	function submit_form_b06(){	
		var msg_error = "";
		var id_err = [];
		var check = true;	
		if(!isNumberic($("#Tp12").val())){				
			msg_error += "<?php echo __('入口温度に数値を入力してください');?>\n";
			id_err.push("Tp12");
			check = false;	
		}

		if(!isNumberic($("#Tp22").val())){				
			msg_error += "<?php echo __('出口温度に数値を入力してください');?>\n";
			id_err.push("Tp22");
			check = false;
		}

		if(!isNumberic($("#Mloss2").val())){				
			msg_error += "<?php echo __('酸化減量に数値を入力してください');?>\n";
			id_err.push("Mloss2");
			check = false;	
		}

		if(!check){
			$("#"+id_err[0]).focus();
			alert(msg_error);
			return false;
		}

		$.ajax({
			url: "<?php echo $this->webroot, $this->params['controller']; ?>/page_b06",
			type: "POST",
			cache: false,
			data: $("#InnovationInputForm").serialize(),
			success: function(responce){

				var resp = JSON.parse(responce);

				$("#chkStatus ", opener.document).val(0);
				$("#Eh_fuel_b06", opener.document).html(resp.Eh_fuel);
				$("#Eh_fuel2_b06", opener.document).val(resp.Eh_fuel2);
				$("#Save_energy_ratio_b06", opener.document).val(resp.Save_energy_ratio);
				
				window.close();	
			},
			error: function (){								
				alert("<?php echo __('例外エラーを発生してしまいました');?>");
				window.close();
			}
		});		
		return false;
	}
	$("#Tp12").live('change', function(){
		var valMloss2 	= $("#Mloss2").val();
		var valTp12		= $("#Tp12").val();
		var valTp22		= $("#Tp22").val();
		$.ajax({

			url: "/innovation_input/Cal_Eefect2/?valMloss2="+valMloss2+"&valTp12="+valTp12+"&valTp22="+valTp22,
			type: "GET",
			success: function(responce){
				$("#Eeffect2").val(responce);
			},
		});
	});
	$("#Tp22").live('change', function(){
		var valMloss2 	= $("#Mloss2").val();
		var valTp12		= $("#Tp12").val();
		var valTp22		= $("#Tp22").val();
		$.ajax({

			url: "/innovation_input/Cal_Eefect2/?valMloss2="+valMloss2+"&valTp12="+valTp12+"&valTp22="+valTp22,
			type: "GET",
			success: function(responce){
				$("#Eeffect2").val(responce);
			},
		});
	});
	$("#Mloss2").live('change', function(){
		var valMloss2 	= $("#Mloss2").val();
		var valTp12		= $("#Tp12").val();
		var valTp22		= $("#Tp22").val();
		$.ajax({

			url: "/innovation_input/Cal_Eefect2/?valMloss2="+valMloss2+"&valTp12="+valTp12+"&valTp22="+valTp22,
			type: "GET",
			success: function(responce){
				$("#Eeffect2").val(responce);
			},
		});
	});
</script>