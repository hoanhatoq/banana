<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('耐火物選定');?></h1>

<p class="text"><?php echo __('選択したらOKボタンを押してください。');?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup26.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説');?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page26'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="act" value="0" id="act" class="select">
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxList4">
<tr>
<th class="radio"><?php echo __('選択');?></th>
<th class="name"><?php echo __('耐火物名称');?></th>
<th><?php echo __('嵩比重');?><br>(kg/m<sup>3</sup>)</th>
<th><?php echo __('熱伝導率');?><br>(W/m・k)</th>
<th><?php echo __('比熱');?><br>(kJ/kg,℃)</th>
</tr>

<?php $vIwall_m = (isset($EnergyInput['page26']['Iwall_m'][$act])) ? $EnergyInput['page26']['Iwall_m'][$act] : '';	
foreach($TAIKA as $kItem => $item){	
?>
<tr>
<td class="radio"><?php 
	echo $this->Form->radio(
				'Iwall_m', 
				array(					
					$item[1] => ''
				), 
				array(
					'value' => $vIwall_m,
					'legend' => false,
					'label' => false,
					'class' => 'Iwall_m',
					'id' => false,
					'hiddenField' => false
				)
				);
	?></td>
<td class="name"><label for="<?php echo $kItem; ?>"><div id="Iname<?php echo $kItem; ?>"><?php echo $item[0];?></div></label></td>
<td><?php echo $item[2];?></td>
<td><?php echo $item[3];?></td>
<td><?php echo $item[4];?></td>
</tr>

<?php } ?>

</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok_top">
<div class="btn_ok"><p><a href="#" onclick="submit_frm_p26();"><?php echo __('OK');?></a></p></div>
</div>
<div class="clr after"></div>
<div class="closeBtn"><p><a href="#" onClick="window.close(); return false;">x <?php echo __('キャンセル');?></a></p></div>
<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p26(){
	var act = opener.document.activeElement;		
	var idAct = $(act).attr("id");	
	$("#act").val(idAct);
	
	if(!$(".Iwall_m").is(":checked")){		
		alert("<?php echo __('耐火物名称を選択してください');?>");
		return false;	
	}
	
	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page26",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){	
			var sel = $('input[class=Iwall_m]:checked', '#EnergyInputForm').val();	
			var Iwall_name = $("#Iname"+sel).html();

			if(idAct == "act1"){		
				$("#Iwall_m1", opener.document).val(sel);
				$("#Iwall_m_name1", opener.document).val(Iwall_name);
			}
			if(idAct == "act2"){
				$("#Iwall_m2", opener.document).val(sel);
				$("#Iwall_m_name2", opener.document).val(Iwall_name);
			}
			if(idAct == "act3"){
				$("#Iwall_m3", opener.document).val(sel);
				$("#Iwall_m_name3", opener.document).val(Iwall_name);
			}
			if(idAct == "act4"){
				$("#Iwall_m4", opener.document).val(sel);
				$("#Iwall_m_name4", opener.document).val(Iwall_name);
			}
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

</div>
<div class="clr"></div>
</div>