<div class="content_box">
<h2><?php echo __('被加熱物関連データ入力'); ?></h2>
<p class="text"><?php echo __('入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup15.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page15'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tbody><tr>
<th><label for="Mloss"><?php echo __('酸化減量'); ?></label></th>
<td><?php $vMloss = (isset($EnergyInput['Mloss']))? $EnergyInput['Mloss'] : 0;
echo $this->Form->input('Mloss',
		array(
			'id' => 'Mloss',
			'type' => 'text',			
			'value' => $vMloss,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>Kg/t</td>
<th><label for="Tp1"><?php echo __('被熱物挿入温度'); ?></label></th>
<td><?php $vTp1 = (!isset($EnergyInput['Tp1']) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTp1 = (isset($EnergyInput['Tp1']))? $EnergyInput['Tp1'] : $vTp1;
echo $this->Form->input('Tp1',
		array(
			'id' => 'Tp1',
			'type' => 'text',			
			'value' => $vTp1,			
			'label' => false,
			'class' => 'small',
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label for="Tp2"><?php echo __('被熱物抽出温度'); ?></label></th>
<td><?php $vTp2 = (isset($EnergyInput['Tp2']))? $EnergyInput['Tp2'] : '';
echo $this->Form->input('Tp2',
		array(
			'id' => 'Tp2',
			'type' => 'text',			
			'value' => $vTp2,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
<td colspan="2"></td>
</tr>
</tbody></table>
<div class="clr"></div>

<h3><?php echo __('被加熱物質を選定してください'); ?></h3>
<table class="checkBoxList4 tbl">
<tbody><tr class="off">
<th class="radio"><?php echo __('選択'); ?></th>
<th class="name"><?php echo __('物質名'); ?></th>
<th><?php echo __('比重量'); ?><br>（kg/m<sup>3</sup>）</th>
<th><?php echo __('平均比熱'); ?><br>(kJ/kg℃)</th>
<th><?php echo __('溶解熱'); ?><br>(kJ/kg)</th>
<th><?php echo __('融点'); ?><br>(℃)</th>
<th><?php echo __('流動温度'); ?><br>(℃)</th>
</tr>

<?php 
$vIpro = (isset($EnergyInput['Ipro'])) ? $EnergyInput['Ipro'] : '';	
foreach($PRODATA as $kItem => $item){
	if($kItem%2 == 0 ){
		echo '<tr class="off">';
	}else{
		echo '<tr class="on">';
	}
?>
<td class="radio"><?php 
	echo $this->Form->radio(
				'Ipro', 
				array(					
					$kItem => ''
				), 
				array(
					'value' => $vIpro,
					'legend' => false,
					'label' => false,
					'class' => 'Ipro',
					'id' => false,
					'hiddenField' => false
				)
				);
	?></td>
<td class="name"><label for="<?php echo $kItem;?>"><?php echo $item[0]; ?></label></td>
<td><?php echo $item[1]; ?></td>
<td><?php echo $item[2]; ?></td>
<td><?php echo $item[5]; ?></td>
<td><?php echo $item[4]; ?></td>
<td><?php echo $item[6]; ?></td>
</tr>
<?php } ?>
</tbody></table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok_top">
<div id="btn_ok" class="btn_ok"><p><a href="#" onClick="submit_frm_p15();" ><?php echo __('OK'); ?></a></p></div>
</div>
<div class="clr after"></div>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>

<script type="text/javascript"> 
function submit_frm_p15(){
	var mes_err = "";
	var chk = true;
	var id_err = [];
	if(!isNumberic($("#Mloss").val()) || $("#Mloss").val()<0.0){
		mes_err += "<?php echo __('酸化減量に数値を入力してください');?>\n";
		mes_err += "<?php echo __('酸化減量に0.0より大きく入力してください');?>\n";		
		id_err.push("Mloss");
		chk = false;
	}
	
	if(!isNumberic($("#Tp1").val())){
		mes_err += "<?php echo __('被熱物挿入温度に数値を入力してください');?>\n";		
		id_err.push("Tp1");
		chk = false;
	}

	if(!isNumberic($("#Tp2").val())){
		mes_err += "<?php echo __('被熱物抽出温度に数値を入力してください');?>\n";		
		id_err.push("Tp2");
		chk = false;	
	}
	
	if(!$(".Ipro").is(":checked")){
		mes_err += "<?php echo __('被加熱物質を選定してください');?>\n";
		chk = false;
	}

	if(!chk){
		$("#"+id_err[0]).focus();
		alert(mes_err);
		return false;
	}
	document.forms['EnergyInputForm'].submit();
}
</script>
</div>