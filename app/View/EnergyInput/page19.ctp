<div id="popup">
<div class="content_box">
<h1 class="p21"><?php echo __('JIG被加熱物選択'); ?></h1>
<p class="text"><?php echo __('選択したらOKボタンを押してください。'); ?></p>

<div class="clr"></div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup19.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?> </a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page19'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<input type="hidden" name="act" value="0" id="act" class="select">
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxList4 tbl">
<tbody><tr>
<th class="radio"><?php echo __('選択'); ?></th>
<th><?php echo __('物質名'); ?></th>
<th><?php echo __('比重量'); ?><br>（kg/m<sup>3</sup>）</th>
<th><?php echo __('平均比熱'); ?><br>(kJ/kg℃)</th>
<th><?php echo __('融点'); ?><br>(℃)</th>
</tr>

<?php $vIjig = (isset($EnergyInput['page19']['Ijig'][$act])) ? $EnergyInput['page19']['Ijig'][$act] : '';	
foreach($PRODATA as $kItem => $item){	
?>

<tr>
<td class="radio"><?php 
	echo $this->Form->radio(
				'Ijig', 
				array(					
					$kItem => ''
				), 
				array(
					'value' => $vIjig,
					'legend' => false,
					'label' => false,
					'class' => 'Ijig',
					'id' => false,
					'hiddenField' => false
				)
				);
	?></td>

<td class="name"><label for="<?php echo $kItem;?>"><div id="Iname<?php echo $kItem; ?>"><?php echo $item[0]; ?></div></label></td>
<td><?php echo $item[1]; ?></td>
<td><?php echo $item[2]; ?></td>
<td><?php echo $item[5]; ?></td>

</tr>
<?php } ?>

</tbody></table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok_top">
<div id="btn_ok" class="btn_ok"><p><a href="#" onclick="submit_frm_p19();"><?php echo __('OK'); ?></a></p></div>
</div>
<div class="clr after"></div>

<div class="clr"></div>
<div class="closeBtn"><p><a href="#" onclick="window.close(); return false;">x <?php echo __('キャンセル'); ?></a></p></div>
<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p19(){
	if(!$(".Ijig").is(":checked")){
		alert("<?php echo __('JIG被加熱物を選択してください');?>");
		return false;
	}
	var act = opener.document.activeElement;
	var idAct = $(act).attr("id");
	$("#act").val(idAct);

	$.ajax({
		url: "<?php echo $this->webroot, $this->params['controller']; ?>/page19",
		type: "POST",
		cache: false,
		data: $("#EnergyInputForm").serialize(),
		success: function(responce){
			var sel = $('input[class=Ijig]:checked', '#EnergyInputForm').val();
			var Ijig_name = $("#Iname"+sel).html();
			if(idAct == "actp5"){		
				$("#Ijigp5", opener.document).val(sel);
				$("#Ijig_namep5", opener.document).val(Ijig_name);
			}
			if(idAct == "act1"){		
				$("#Ijig1", opener.document).val(sel);
				$("#Ijig_name1", opener.document).val(Ijig_name);
			}
			if(idAct == "act2"){
				$("#Ijig2", opener.document).val(sel);
				$("#Ijig_name2", opener.document).val(Ijig_name);
			}
			if(idAct == "act3"){
				$("#Ijig3", opener.document).val(sel);
				$("#Ijig_name3", opener.document).val(Ijig_name);
			}
			if(idAct == "actp13"){		
				$("#Ijigp13", opener.document).val(sel);
				$("#Ijig_namep13", opener.document).val(Ijig_name);
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
