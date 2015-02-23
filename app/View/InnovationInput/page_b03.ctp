<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('炉体損失熱の改善'); ?></h1>
<p class="text"><?php echo __('改善後の目標値を入力してＯＫを押してください。'); ?></p>
<div class="clr"></div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup03.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>
<div class="clr"></div>

<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b03'),
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
<th><label for="1"><?php echo __('排熱回収率'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['ETA_R1']) ? $InnovationInput['ETA_R1']: 0;
	?>
 	%	
</td>
<td>
	<?php $vETA_R2 = 	isset($InnovationInput['page_b03']['ETA_R2']) ? 
						$InnovationInput['page_b03']['ETA_R2']: '';
		echo $this->Form->input('ETA_R2', array(
			'id'=> 'ETA_R2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vETA_R2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	%
</td>
</tr>
<tr>
<th><label for="2"><?php echo __('予熱温度'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['Ta2']) ? $InnovationInput['Ta2']: 0;
	?>
 	℃
</td>
<td>
	<?php $vTa3 = isset($InnovationInput['page_b03']['Ta3']) ? $InnovationInput['page_b03']['Ta3']: '';
		echo $this->Form->input('Ta3', array(
			'id'=> 'Ta3',
			'type' => 'text',
			'readonly'=> true,
			'class' => 'small select',
			'label' => false,
			'value' => $vTa3,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?>
	℃
</td>
</tr>
</table>
<div class="clr"></div>


<div class="btn_ok"><p><a href="#" onClick="submit_form_b03();"><?php echo __('OK'); ?></a></p></div>

<?php echo $this->Form->end();?>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

<script type="text/javascript"> 
	function submit_form_b03(){	
		var msg_error = "";
		var check = true;
		if(!isNumberic($("#ETA_R2").val())){				
			msg_error += "<?php echo __('排熱回収率に数値を入力してください');?>\n";
			$("#ETA_R2").focus();
			check = false;
		}

		if($("#ETA_R2").val() < 0.0){
			msg_error += "<?php echo __('排熱回収率に0.0より大きく入力してください');?>\n";
			$("#ETA_R2").focus();
			check = false;	
		}

		if(!check){
			alert(msg_error);
			return false;
		}

		$.ajax({
			url: "<?php echo $this->webroot, $this->params['controller']; ?>/page_b03",
			type: "POST",
			cache: false,
			data: $("#InnovationInputForm").serialize(),
			success: function(responce){

				var resp = JSON.parse(responce);

				$("#chkStatus ", opener.document).val(0);
				$("#ETA1_b03", opener.document).html(resp.ETA1);
				$("#ETA2_b03", opener.document).val(resp.ETA2);
				$("#Save_energy_ratio_b03", opener.document).val(resp.Save_energy_ratio);
				
				window.close();	
			},
			error: function (){								
				alert("<?php echo __('例外エラーを発生してしまいました');?>");
				window.close();
			}
		});		
		return false;
	}
	$("#ETA_R2").live('change', function(){
		var valETA_R2 = $("#ETA_R2").val();
		var vEexhaust_hc = <?php echo $InnovationInput['Eexhaust_hc'] ?>;
		var vEs_air		 = <?php echo $InnovationInput['Es_air'] ?>;
		var vEs_air2	 = <?php echo $InnovationInput['Es_air2'] ?>;
		var vTa2 		 = <?php echo $InnovationInput['Ta2'] ?>;
		var vErecovery2  = valETA_R2 * vEexhaust_hc;
		var vEs_air3	 = vErecovery2 + vEs_air;
		if(vEs_air2 != 0){
			document.getElementById("Ta3").value= (vTa2 * vEs_air3)/vEs_air2;
		}
		else{
			document.getElementById("Ta3").value= 0;
		}
	});
</script>