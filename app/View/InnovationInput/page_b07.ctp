<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('空気比改善'); ?></h1>
<p class="text">
	<?php echo __('排ガス酸素濃度を入力してください。空気比は計算され表示されます。'); ?>
<br>
<?php echo __('改善後の目標値を入力してOKを押してください。'); ?></p>
<div class="clr"></div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" =>$locale."/popup07.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php 
	echo $this->Form->create('innovation_input', array(
		'id' => 'InnovationInputForm',
		'type' => 'post',
		'url' => array('controller' => 'innovation_input', 'action' => 'page_b07'),
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
<th><label for="1"><?php echo __('排ガス酸素濃度'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['Fg_O2d1']) ? $InnovationInput['Fg_O2d1'] : 0;
	?>
	%
</td>
<td>
	<?php $vFg_O2d2 = 	(isset($InnovationInput['page_b07']['Fg_O2d2']))? 
						$InnovationInput['page_b07']['Fg_O2d2'] :'';
		echo $this->Form->input('Fg_O2d2', array(
			'id'=> 'Fg_O2d2',
			'type' => 'text',
			'class' => 'small',
			'label' => false,
			'value' => $vFg_O2d2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
	%
</td>
</tr>
<tr>
<th><label for="2"><?php echo __('空気比'); ?></label></th>
<td>
	<?php
		echo isset($InnovationInput['Mhyp1']) ? $InnovationInput['Mhyp1'] : 0;
	?>
</td>
<td>
	<?php $vMhyp2 = (isset($InnovationInput['Mhyp2']))? $InnovationInput['Mhyp2'] :'';
		echo $this->Form->input('Mhyp2', array(
			'id'=> 'Mhyp2',
			'type' => 'text',
			'readonly' => true,
			'empty' => true,
			'class' => 'small select',
			'label' => false,
			'value' => $vMhyp2,
			'div' => false,
			'placeholder' => ''
	    	)); 
	?> 
</td>
</tr>
</table>
<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_form_b07();"><?php echo __('OK'); ?></a></p></div>

<?php echo $this->Form->end();?>

<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>


<div class="clr"></div>


</div>
<div class="clr"></div>
</div>

<script type="text/javascript"> 
	function submit_form_b07(){		
		var msg_error = "";
		var check = true;

		if(!isNumberic($("#Fg_O2d2").val())){				
			msg_error += "<?php echo __('排ガス酸素濃度に数値を入力してください');?>\n";
			$("#Fg_O2d2").focus();
			check = false;	
		}

		if($("#Fg_O2d2").val() < 0.0){
			msg_error += "<?php echo __('排ガス酸素濃度に0.0より大きく入力してください');?>\n";
			$("#Fg_O2d2").focus();
			check = false;		
		}

		if(!check){
			alert(msg_error);
			return false;
		}
		
		$.ajax({
				url: "<?php echo $this->webroot, $this->params['controller']; ?>/page_b07",
				type: "POST",
				cache: false,
				data: $("#InnovationInputForm").serialize(),
				success: function(responce){

					var resp = JSON.parse(responce);

					$("#chkStatus ", opener.document).val(0);
					$("#ETA1_b07", opener.document).html(resp.ETA1);
					$("#ETA2_b07", opener.document).val(resp.ETA2);
					$("#Save_energy_ratio_b07", opener.document).val(resp.Save_energy_ratio);
					
					window.close();	
				},
				error: function (){								
					alert("<?php echo __('例外エラーを発生してしまいました');?>");
					window.close();
				}
			});		
			return false;
	}
	$("#Fg_O2d2").live('change', function(){
		var valFg_O2d2 	= $("#Fg_O2d2").val();
		$.ajax({

			url: "/innovation_input/Cal_Mhyp2/?valFg_O2d2="+valFg_O2d2,
			type: "GET",
			success: function(responce){
				$("#Mhyp2").val(responce);
			},
		});
	});
</script>