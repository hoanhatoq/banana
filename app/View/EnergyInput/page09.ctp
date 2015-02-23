<div class="content_box">
<h2><?php echo __('燃料データ入力'); ?></h2>
<p class="text"><?php echo __('気体燃料か液体燃料か選んでください。<br>入力が終了したらOKボタンを押してください。'); ?>
</p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup09.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<h3><?php echo __('ラジオボタンを選択すると入力項目が表示されます。'); ?></h3>

<ul class="checkBoxList">
<li>
<?php 
// if(isset($EnergyInput['Q2']) && $EnergyInput['Q2'] =='C'){
	$vswitchPage09 = (isset($EnergyInput['Q2']) && $EnergyInput['Q2'] =='C') ? 'type1': 'type2';

	echo $this->Form->radio(
				'switchPage09', 
				array(
					'type1' => __('気体燃料'),
					'type2' => __('液体燃料'),
				), 
				array(
					'value' => $vswitchPage09,
					'legend' => false,
					'disabled' => true,
					'separator' => '</li><li class="typeRight">',
					'class' => 'check',
					'id' => false,
					'hiddenField' => false
				)
			);
// }
// if(isset($EnergyInput['Q2']) && $EnergyInput['Q2'] =='D'){
// 	echo '&nbsp;<label for="type1">&nbsp;</label></li><li class="typeRight">';
// 	$vswitchPage09 = (isset($EnergyInput['Q2']) && $EnergyInput['Q2'] =='D') ? 'type2': '';
// 	echo $this->Form->radio(
// 				'switchPage09', 
// 				array(				
// 					'type2' => __('アルミ溶解炉'),
// 				), 
// 				array(
// 					'value' => $vswitchPage09,
// 					'legend' => false,
// 					'separator' => '',
// 					'class' => 'check',
// 					'id' => false,
// 					'hiddenField' => false
// 				)
// 				);
// }
	?></li>
</ul> 
<div class="clr"></div>
<div id="switchBox">

<?php 
	if(isset($EnergyInput['Q2']) && $EnergyInput['Q2'] =='C'){
?>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page09'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable5 type1">
<tr>
<th colspan="2"><?php echo __('ガス組成'); ?></th>
</tr>
<tr>
<th><label><?php echo __('水素'); ?></label></th>
<td><?php $vXGD1 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][1] : '0';
echo $this->Form->input('[XGD][1]',
		array(
			'id' => 'XGD1',
			'name' => 'data[energy_input][XGD][1]',
			'type' => 'text',			
			'value' => $vXGD1,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr><th><label><?php echo __('一酸化炭素'); ?></label></th>
<td><?php $vXGD2 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][2] : '0';
echo $this->Form->input('[XGD][2]',
		array(
			'id' => 'XGD2',
			'name' => 'data[energy_input][XGD][2]',
			'type' => 'text',			
			'value' => $vXGD2,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('メタン'); ?></label></th>
<td><?php $vXGD3 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][3] : '0';
echo $this->Form->input('[XGD][3]',
		array(
			'id' => 'XGD3',
			'name' => 'data[energy_input][XGD][3]',
			'type' => 'text',			
			'value' => $vXGD3,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('エタン'); ?></label></th>
<td><?php $vXGD4 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][4] : '0';
echo $this->Form->input('[XGD][4]',
		array(
			'id' => 'XGD4',
			'name' => 'data[energy_input][XGD][4]',
			'type' => 'text',			
			'value' => $vXGD4,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('プロパン'); ?></label></th>
<td><?php $vXGD5 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][5] : '0';
echo $this->Form->input('[XGD][5]',
		array(
			'id' => 'XGD5',
			'name' => 'data[energy_input][XGD][5]',
			'type' => 'text',			
			'value' => $vXGD5,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('ノーマル-ブタン'); ?></label></th>
<td><?php $vXGD6 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][6] : '0';
echo $this->Form->input('[XGD][6]',
		array(
			'id' => 'XGD6',
			'name' => 'data[energy_input][XGD][6]',
			'type' => 'text',			
			'value' => $vXGD6,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('イソ-ブタン'); ?></label></th>
<td><?php $vXGD7 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][7] : '0';
echo $this->Form->input('[XGD][7]',
		array(
			'id' => 'XGD7',
			'name' => 'data[energy_input][XGD][7]',
			'type' => 'text',			
			'value' => $vXGD7,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('エチレン'); ?></label></th>
<td><?php $vXGD8 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][8] : '0';
echo $this->Form->input('[XGD][8]',
		array(
			'id' => 'XGD8',
			'name' => 'data[energy_input][XGD][8]',
			'type' => 'text',			
			'value' => $vXGD8,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('プロピレン'); ?></label></th>
<td><?php $vXGD9 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][9] : '0';
echo $this->Form->input('[XGD][9]',
		array(
			'id' => 'XGD9',
			'name' => 'data[energy_input][XGD][9]',
			'type' => 'text',			
			'value' => $vXGD9,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('1-ブテン'); ?></label></th>
<td><?php $vXGD10 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][10] : '0';
echo $this->Form->input('[XGD][10]',
		array(
			'id' => 'XGD10',
			'name' => 'data[energy_input][XGD][10]',
			'type' => 'text',			
			'value' => $vXGD10,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('シス-2-ブテン'); ?></label></th>
<td><?php $vXGD11 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][11] : '0';
echo $this->Form->input('[XGD][11]',
		array(
			'id' => 'XGD11',
			'name' => 'data[energy_input][XGD][11]',
			'type' => 'text',			
			'value' => $vXGD11,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('トランス-2-ブテン'); ?></label></th>
<td><?php $vXGD12 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][12] : '0';
echo $this->Form->input('[XGD][12]',
		array(
			'id' => 'XGD12',
			'name' => 'data[energy_input][XGD][12]',
			'type' => 'text',			
			'value' => $vXGD12,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('アセチレン'); ?></label></th>
<td><?php $vXGD13 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][13] : '0';
echo $this->Form->input('[XGD][13]',
		array(
			'id' => 'XGD13',
			'name' => 'data[energy_input][XGD][13]',
			'type' => 'text',			
			'value' => $vXGD13,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('酸素'); ?></label></th>
<td><?php $vXGD14 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][14] : '0';
echo $this->Form->input('[XGD][14]',
		array(
			'id' => 'XGD14',
			'name' => 'data[energy_input][XGD][14]',
			'type' => 'text',			
			'value' => $vXGD14,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('空気（ドライ）'); ?></label></th>
<td><?php $vXGD15 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][15] : '0';
echo $this->Form->input('[XGD][15]',
		array(
			'id' => 'XGD15',
			'name' => 'data[energy_input][XGD][15]',
			'type' => 'text',			
			'value' => $vXGD15,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('窒素'); ?></label></th>
<td><?php $vXGD16 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][16] : '0';
echo $this->Form->input('[XGD][16]',
		array(
			'id' => 'XGD16',
			'name' => 'data[energy_input][XGD][16]',
			'type' => 'text',			
			'value' => $vXGD16,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
<tr><th><label><?php echo __('二酸化炭素'); ?></label></th>
<td><?php $vXGD17 = (isset($EnergyInput['XGD']))? $EnergyInput['XGD'][17] : '0';
echo $this->Form->input('[XGD][17]',
		array(
			'id' => 'XGD17',
			'name' => 'data[energy_input][XGD][17]',
			'type' => 'text',			
			'value' => $vXGD17,
			'class' => 'small XGD',
			'label' => false,
			'div' => false
		)
	); 
?>%</td></tr>
</table>

<?php 
		echo $this->Form->end();
	}
	if(isset($EnergyInput['Q2']) && $EnergyInput['Q2'] =='D'){
?>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page09'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable5 type2">
<tr>
<th colspan="2"><?php echo __('元素分析値組成（ドライベース）<br>H+C+O+S=100%としてください。'); ?>
</th>
</tr>
<tr>
<th><label><?php echo __('元素分析値組成(1)：H'); ?></label></th>
<td><?php $vXLD1 = (isset($EnergyInput['XLD']))? $EnergyInput['XLD'][1] : '0';
echo $this->Form->input('[XLD][1]',
		array(
			'id' => 'XLD1',
			'name' => 'data[energy_input][XLD][1]',
			'type' => 'text',			
			'value' => $vXLD1,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label><?php echo __('元素分析値組成(2)：C'); ?></label></th>
<td><?php $vXLD2 = (isset($EnergyInput['XLD']))? $EnergyInput['XLD'][2] : '0';
echo $this->Form->input('[XLD][2]',
		array(
			'id' => 'XLD2',
			'name' => 'data[energy_input][XLD][2]',
			'type' => 'text',			
			'value' => $vXLD2,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label><?php echo __('元素分析値組成(3)：O'); ?></label></th>
<td><?php $vXLD3 = (isset($EnergyInput['XLD']))? $EnergyInput['XLD'][3] : 0;
echo $this->Form->input('[XLD][3]',
		array(
			'id' => 'XLD3',
			'name' => 'data[energy_input][XLD][3]',
			'type' => 'text',			
			'value' => $vXLD3,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>

<tr>
<th><label><?php echo __('元素分析値組成(4)：S'); ?></label></th>
<td><?php $vXLD4 = (isset($EnergyInput['XLD']))? $EnergyInput['XLD'][4] : '0';
echo $this->Form->input('[XLD][4]',
		array(
			'id' => 'XLD4',
			'name' => 'data[energy_input][XLD][4]',
			'type' => 'text',			
			'value' => $vXLD4,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
</table>
<div class="clr"></div>

<table class="checkBoxTable5 type2">
<tr>
<th><label><?php echo __('水分量入力'); ?></label></th>
<td><?php $vXL5 = (isset($EnergyInput['XL']))? $EnergyInput['XL'][5] : '0';
echo $this->Form->input('[XL][5]',
		array(
			'id' => 'XL5',
			'name' => 'data[energy_input][XL][5]',
			'type' => 'text',			
			'value' => $vXL5,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label><?php echo __('高位発熱量'); ?></label></th>
<td><?php $vHh = (isset($EnergyInput['Hh']))? $EnergyInput['Hh'] : '';
echo $this->Form->input('Hh',
		array(
			'id' => 'Hh',
			'type' => 'text',			
			'value' => $vHh,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/Kg</td>
</tr>
<tr>
<th><?php echo __('水蒸気噴霧の有無'); ?></th>
<td><?php $vQ4 = (isset($EnergyInput['Q4'])) ? $EnergyInput['Q4']: '';
	echo $this->Form->radio(
				'Q4', 
				array(
					'1' => __('有り'),
					'2' => __('無し')
				), 
				array(
					'value' => $vQ4,
					'legend' => false,					
					'id' => 'Q4',
					'class' => 'Q4',
					'separator' => '<br>',
					'hiddenField' => false
				)
				);
	?></td>
</tr>
</table>

<?php echo $this->Form->end();?>
<?php } ?>
</div>

<div class="clr"></div>

<div class="btn_ok"><p><a href="#" onClick="submit_frm_p09();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p09(){	
	<?php //if(isset($EnergyInput['Q2']) && $EnergyInput['Q2'] =='C'){ ?>
	if($("#Type1").is(':checked')){
		var mes_err = "";
		var chk = true;
		var id_err = [];
		$(".XGD").each(function(){			
			if(!isNumberic($(this).val()) || $(this).val()<0.0){			
				if($(this).attr("id") == "XGD1"){
					mes_err += "<?php echo __('水素に数値を入力してください');?>\n";
					mes_err += "<?php echo __('水素に0.0より大きく入力してください');?>\n";
					id_err.push("XGD1");
					chk = false;					
				}
				if($(this).attr("id") == "XGD2"){
					mes_err += "<?php echo __('一酸化炭素に数値を入力してください');?>\n";
					mes_err += "<?php echo __('一酸化炭素に0.0より大きく入力してください');?>\n";
					id_err.push("XGD2");
					chk = false;					
				}
				if($(this).attr("id") == "XGD3"){
					mes_err += "<?php echo __('メタンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('メタンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD3");
					chk = false;					
				}
				if($(this).attr("id") == "XGD4"){
					mes_err += "<?php echo __('エタンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('エタンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD4");
					chk = false;					
				}
				if($(this).attr("id") == "XGD5"){
					mes_err += "<?php echo __('プロパンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('プロパンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD5");
					chk = false;					
				}
				if($(this).attr("id") == "XGD6"){
					mes_err += "<?php echo __('ノーマル-ブタンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('ノーマル-ブタンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD6");
					chk = false;					
				}
				if($(this).attr("id") == "XGD7"){
					mes_err += "<?php echo __('イソ-ブタンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('イソ-ブタンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD7");
					chk = false;					
				}
				if($(this).attr("id") == "XGD8"){
					mes_err += "<?php echo __('エチレンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('エチレンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD8");
					chk = false;					
				}
				if($(this).attr("id") == "XGD9"){
					mes_err += "<?php echo __('プロピレンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('プロピレンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD9");
					chk = false;					
				}
				if($(this).attr("id") == "XGD10"){
					mes_err += "<?php echo __('1-ブテンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('1-ブテンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD10");
					chk = false;					
				}
				if($(this).attr("id") == "XGD11"){
					mes_err += "<?php echo __('シス-2-ブテンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('シス-2-ブテンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD11");
					chk = false;					
				}
				if($(this).attr("id") == "XGD12"){
					mes_err += "<?php echo __('トランス-2-ブテンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('トランス-2-ブテンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD12");
					chk = false;					
				}
				if($(this).attr("id") == "XGD13"){
					mes_err += "<?php echo __('アセチレンに数値を入力してください');?>\n";
					mes_err += "<?php echo __('アセチレンに0.0より大きく入力してください');?>\n";
					id_err.push("XGD13");
					chk = false;					
				}
				if($(this).attr("id") == "XGD14"){
					mes_err += "<?php echo __('酸素に数値を入力してください');?>\n";
					mes_err += "<?php echo __('酸素に0.0より大きく入力してください');?>\n";
					id_err.push("XGD14");
					chk = false;					
				}
				if($(this).attr("id") == "XGD15"){
					mes_err += "<?php echo __('空気（ドライ）に数値を入力してください');?>\n";
					mes_err += "<?php echo __('空気（ドライ）に0.0より大きく入力してください');?>\n";
					id_err.push("XGD15");
					chk = false;					
				}
				if($(this).attr("id") == "XGD16"){
					mes_err += "<?php echo __('窒素に数値を入力してください');?>\n";
					mes_err += "<?php echo __('窒素に0.0より大きく入力してください');?>\n";
					id_err.push("XGD16");
					chk = false;					
				}
				if($(this).attr("id") == "XGD17"){
					mes_err += "<?php echo __('二酸化炭素に数値を入力してください');?>\n";
					mes_err += "<?php echo __('二酸化炭素に0.0より大きく入力してください');?>\n";
					id_err.push("XGD17");
					chk = false;					
				}
			}					
		});

		if(!chk){
			$("#"+id_err[0]).focus();
			alert(mes_err);
			return false;
		}

		document.forms['EnergyInputForm'].submit();
	}
	<?php //} 

	// if(isset($EnergyInput['Q2']) && $EnergyInput['Q2'] =='D'){ ?>

	if($("#Type2").is(':checked')){
		var mes_err = "";
		var chk = true;
		var id_err = [];
		if(!isNumberic($("#XLD1").val()) || $("#XLD1").val()<0.0){			
			mes_err += "<?php echo __('元素分析値組成(1)：Hに数値を入力してください');?>\n";
			mes_err += "<?php echo __('元素分析値組成(1)：Hに0.0より大きく入力してください');?>\n";
			id_err.push("XLD1");
			chk = false;	
		}

		if(!isNumberic($("#XLD2").val()) || $("#XLD2").val()<0.0){
			mes_err += "<?php echo __('元素分析値組成(2)：Cに数値を入力してください');?>\n";
			mes_err += "<?php echo __('元素分析値組成(2)：Cに0.0より大きく入力してください');?>\n";
			id_err.push("XLD2");
			chk = false;
		}

		if(!isNumberic($("#XLD3").val()) || $("#XLD3").val()<0.0){
			mes_err += "<?php echo __('元素分析値組成(3)：O に数値をを入力してください');?>\n";
			mes_err += "<?php echo __('元素分析値組成(3)：Oに0.0より大きく入力してください');?>\n";
			id_err.push("XLD3");
			chk = false;	
		}

		if(!isNumberic($("#XLD4").val()) || $("#XLD4").val()<0.0){
			mes_err += "<?php echo __('元素分析値組成(4)：Sに数値を入力してください');?>\n";
			mes_err += "<?php echo __('元素分析値組成(4)：Sに0.0より大きく入力してください');?>\n";
			id_err.push("XLD4");
			chk = false;	
		}

		var sum = parseFloat($("#XLD1").val()) + parseFloat($("#XLD2").val()) + parseFloat($("#XLD3").val()) + parseFloat($("#XLD4").val());
		if(sum != 100){			
			mes_err += "<?php echo __('元素分析値組成（ドライベース）\\nH+C+O+S=100%としてください。');?>\n";
			chk = false;
		}

		if(!isNumberic($("#XL5").val()) || $("#XL5").val()<0.0){
			mes_err += "<?php echo __('水分量入力に数値を入力してください');?>\n";
			mes_err += "<?php echo __('水分量入力に0.0より大きく入力してください');?>\n";
			id_err.push("XL5");
			chk = false;
		}

		if( (!isNumberic($("#Hh").val()) || $("#Hh").val()<0.0 ) && $("#Hh").val().length > 0) {
			mes_err += "<?php echo __('高位発熱量に数値を入力してください');?>\n";
			mes_err += "<?php echo __('高位発熱量に0.0より大きく入力してください');?>\n";
			id_err.push("Hh");
			chk = false;
		}

		if(!$('.Q4').is(':checked')){
			mes_err += "<?php echo __('水蒸気噴霧の有無を選択してください');?>\n";
			chk = false;
		}

		if(!chk){
			$("#"+id_err[0]).focus();
			alert(mes_err);
			return false;
		}
		document.forms['EnergyInputForm'].submit();
	}		
	<?php // } ?>
}
</script>

</div>