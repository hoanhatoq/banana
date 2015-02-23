<div class="content_box">
<h2><?php echo __('燃焼関連のデ－タ入力'); ?></h2>
<p class="text"><?php echo __('入力が終了したらOKボタンを押してください。'); ?></p>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup06.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page06'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tr>
<th colspan="2"><?php echo __('リジェネバーナの使用有無'); ?></th>
<td colspan="2"><?php $vQ5 = (isset($EnergyInput['Q5'])) ? $EnergyInput['Q5']: '';
	echo $this->Form->radio(
				'Q5', 
				array(
					'1' => __('有り'),
					'0' => __('無し')
				), 
				array(
					'value' => $vQ5,
					'legend' => false,
					'class' => 'Q5',
					'id' => 'Q5',
					'hiddenField' => false
				)
				);
	?></td>
</tr>
<tr>
<th><label><?php echo __('排ガスのリジェネバーナ不通過比率'); ?></label></th>
<td><?php $vAescape = (isset($EnergyInput['Aescape']))? $EnergyInput['Aescape'] : '';
echo $this->Form->input('Aescape',
		array(
			'id' => 'Aescape',
			'type' => 'text',			
			'value' => $vAescape,
			'readonly' => true,
			'class' => 'select',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
<td colspan="2"></td>
</tr>
<tr>
<th><label><?php echo __('燃料相対湿度'); ?></label></th>
<td><?php 
$vFf = (!isset($EnergyInput['Ff']) && isset($EnergyInput['Fanb'])) ? $EnergyInput['Fanb'] : '';
$vFf = (isset($EnergyInput['Ff']))? $EnergyInput['Ff'] : $vFf;
echo $this->Form->input('Ff',
		array(
			'id' => 'Ff',
			'type' => 'text',			
			'value' => $vFf,			
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
<th><label><?php echo __('空気相対湿度'); ?></label></th>
<td><?php 
$vFa = (!isset($EnergyInput['Fa']) && isset($EnergyInput['Fanb'])) ? $EnergyInput['Fanb'] : '';
$vFa = (isset($EnergyInput['Fa']))? $EnergyInput['Fa'] : $vFa;
echo $this->Form->input('Fa',
		array(
			'id' => 'Fa',
			'type' => 'text',			
			'value' => $vFa,			
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
<tr>
<th><label><?php echo __('燃焼用空気空気中の酸素濃度（dry)'); ?></label></th>
<td><?php $vFa_O2D = (isset($EnergyInput['Fa_O2D']))? $EnergyInput['Fa_O2D'] : '20.9';
echo $this->Form->input('Fa_O2D',
		array(
			'id' => 'Fa_O2D',
			'type' => 'text',			
			'value' => $vFa_O2D,
			'label' => false,
			'div' => false
		)
	); 
?>%</td><td colspan="2"></td>
</tr>
<tr>
<th><label><?php echo __('燃料予熱前温度'); ?></label></th>
<td><?php 
$vTf1 = (!isset($EnergyInput['Tf1']) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTf1 = (isset($EnergyInput['Tf1']))? $EnergyInput['Tf1'] : $vTf1;
echo $this->Form->input('Tf1',
		array(
			'id' => 'Tf1',
			'type' => 'text',			
			'value' => $vTf1,
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
<th><label><?php echo __('燃焼用空気予熱前温度'); ?></label></th>
<td><?php 
$vTa1 = (!isset($EnergyInput['Ta1']) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTa1 = (isset($EnergyInput['Ta1']))? $EnergyInput['Ta1'] : $vTa1;
echo $this->Form->input('Ta1',
		array(
			'id' => 'Ta1',
			'type' => 'text',			
			'value' => $vTa1,
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label><?php echo __('燃料予熱後温度'); ?></label></th>
<td><?php 
$vTf2 = (!isset($EnergyInput['Tf2']) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTf2 = (isset($EnergyInput['Tf2']))? $EnergyInput['Tf2'] : $vTf2;
echo $this->Form->input('Tf2',
		array(
			'id' => 'Tf2',
			'type' => 'text',			
			'value' => $vTf2,
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
<th><label><?php echo __('燃焼用空気予熱後温度'); ?></label></th>
<td><?php 
$vTa2 = (!isset($EnergyInput['Ta2']) && isset($EnergyInput['Tanb'])) ? $EnergyInput['Tanb'] : '';
$vTa2 = (isset($EnergyInput['Ta2']))? $EnergyInput['Ta2'] : $vTa2;
echo $this->Form->input('Ta2',
		array(
			'id' => 'Ta2',
			'type' => 'text',			
			'value' => $vTa2,
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label><?php echo __('エスケープ温度'); ?></label></th>
<td><?php $vTescape = (isset($EnergyInput['Tescape']))? $EnergyInput['Tescape'] : '';
echo $this->Form->input('Tescape',
		array(
			'id' => 'Tescape',
			'type' => 'text',			
			'value' => $vTescape,
			'readonly' => true,
			'class' => 'select',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
<th><label><?php echo __('加熱室出口排ガス温度'); ?></label></th>
<td><?php $vTwg1 = (isset($EnergyInput['Twg1']))? $EnergyInput['Twg1'] : '';
echo $this->Form->input('Twg1',
		array(
			'id' => 'Twg1',
			'type' => 'text',			
			'value' => $vTwg1,
			'readonly' => true,
			'class' => 'select',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label><?php echo __('排熱回収装置入口排ガス温度'); ?></label></th>
<td><?php $vTwg2 = (isset($EnergyInput['Twg2']))? $EnergyInput['Twg2'] : '';
echo $this->Form->input('Twg2',
		array(
			'id' => 'Twg2',
			'type' => 'text',			
			'value' => $vTwg2,
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
<th><label><?php echo __('排熱回収装置出口排ガス温度'); ?></label></th>
<td><?php $vTe = (isset($EnergyInput['Te']))? $EnergyInput['Te'] : '';
echo $this->Form->input('Te',
		array(
			'id' => 'Te',
			'type' => 'text',			
			'value' => $vTe,
			'readonly' => true,
			'class' => 'select',
			'label' => false,
			'div' => false
		)
	); 
?>℃</td>
</tr>
<tr>
<th><label><?php echo __('燃焼用空気量（測定値）'); ?></label></th>
<td><?php $vVme = (isset($EnergyInput['Vme']))? $EnergyInput['Vme'] : '0';
echo $this->Form->input('Vme',
		array(
			'id' => 'Vme',
			'type' => 'text',			
			'value' => $vVme,
			'label' => false,
			'div' => false
		)
	); 
?>m<sup>3</sup>(n)/t</td>
<td colspan="2"></td>
</tr>
<tr>
<th><label><?php echo __('排ガス中の酸素濃度（dry）解説'); ?></label></th>
<td><?php $vFg_O2 = (isset($EnergyInput['Fg_O2']))? $EnergyInput['Fg_O2'] : '';
echo $this->Form->input('Fg_O2',
		array(
			'id' => 'Fg_O2',
			'type' => 'text',			
			'value' => $vFg_O2,
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
<td colspan="2"></td>
</tr>
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>


<div class="btn_ok"><p><a href="#" onClick="submit_frm_p06();" ><?php echo __('OK'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
if(isNumberic($("#Fa_O2D").val()) && $("#Fa_O2D").val()<1) {	
	var tmp = $("#Fa_O2D").val();
	tmp = tmp * 100;
	$("#Fa_O2D").val(tmp);
}

if(isNumberic($("#Fg_O2").val()) && $("#Fg_O2").val()<1) {	
	var tmp = $("#Fg_O2").val();
	tmp = tmp * 100;
	$("#Fg_O2").val(tmp);
}

if(isNumberic($("#Fa_O2D").val()) && $("#Fa_O2D").val()<0) {
	var tmp = $("#Fa_O2D").val();
	tmp = tmp * 100;
	$("#Fa_O2D").val(tmp);
}

if($('#Q51').is(':checked')){
	$("#Aescape").removeAttr("readonly");	
	$("#Aescape").removeClass("select");

	$("#Tescape").removeAttr("readonly");		
	$("#Tescape").removeClass("select");

	$("#Te").removeAttr("readonly");
	$("#Te").removeClass("select");	
}

if($('#Q50').is(':checked')){
	$("#Twg1").removeAttr("readonly");	
	$("#Twg1").removeClass("select");
}

$('#Q51').change(function(){
	$("#Aescape").removeAttr("readonly");	
	$("#Aescape").removeClass("select");	
	$("#Aescape").val("10.0");
	$("#Aescape").focus();
	$("#Tescape").removeAttr("readonly");		
	$("#Tescape").removeClass("select");
	$("#Tescape").val("");
	$("#Te").removeAttr("readonly");	
	$("#Te").removeClass("select");
	$("#Te").val("");

	$("#Twg1").attr("readonly", true);
	$("#Twg1").addClass("select");
	$("#Twg1").val("");
});

$('#Q50').change(function(){	
	$("#Twg1").removeAttr("readonly");	
	$("#Twg1").removeClass("select");	
	$("#Twg1").val("");

	$("#Aescape").val("");
	$("#Aescape").attr("readonly", true);
	$("#Aescape").addClass("select");
	$("#Tescape").val("");
	$("#Tescape").attr("readonly", true);
	$("#Tescape").addClass("select");
	$("#Te").val("");
	$("#Te").attr("readonly", true);
	$("#Te").addClass("select");	
});

function submit_frm_p06(){	
	var mes_err = "";
	var chk = true;	
	var id_err = [];

	if(!$('.Q5').is(':checked')){
		mes_err += "<?php echo __('リジェネバーナの使用有無を選択してください');?>\n";
		chk = false;
	}
	
	if( (!isNumberic($("#Aescape").val()) || $("#Aescape").val()<0.0 ) && $('#Q51').is(':checked') ){
		mes_err += "<?php echo __('排ガスのリジェネバーナ不通過比率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('排ガスのリジェネバーナ不通過比率に0.0より大きく入力してください');?>\n";
		id_err.push("Aescape");
		chk = false;
	}

	if( !$('#Q51').is(':checked') && !isNumberic($("#Aescape").val()) && $("#Aescape").val().length>0){
		mes_err += "<?php echo __('排ガスのリジェネバーナ不通過比率に数値を入力してください');?>\n";
		id_err.push("Aescape");
		chk = false;
	}

	if(!isNumberic($("#Ff").val()) || $("#Ff").val() < 0.0){
		mes_err += "<?php echo __('燃料相対湿度に数値を入力してください');?>\n";
		mes_err += "<?php echo __('燃料相対湿度に0.0より大きく入力してください');?>\n";
		id_err.push("Ff");
		chk = false;
	}

	if(!isNumberic($("#Fa").val()) || $("#Fa").val()<0.0){
		mes_err += "<?php echo __('空気相対湿度に数値を入力してください');?>\n";
		mes_err += "<?php echo __('空気相対湿度に0.0より入力してください');?>\n";
		id_err.push("Fa");
		chk = false;
	}
	
	if(!isNumberic($("#Fa_O2D").val()) || $("#Fa_O2D").val() < 0.0){
		mes_err += "<?php echo __('燃焼用空気空気中の酸素濃度（dry）に数値を入力してください');?>\n";
		mes_err += "<?php echo __('燃焼用空気空気中の酸素濃度（dry）に0.0より大きく入力してください');?>\n";
		id_err.push("Fa_O2D");
		chk = false;
	}

	if(!isNumberic($("#Tf1").val())){
		mes_err += "<?php echo __('燃料予熱前温度に数値を入力してください');?>\n";
		id_err.push("Tf1");
		chk = false;
	}

	if(!isNumberic($("#Ta1").val())){
		mes_err += "<?php echo __('燃焼用空気予熱前温度に数値を入力してください');?>\n";
		id_err.push("Ta1");
		chk = false;
	}

	if(!isNumberic($("#Tf2").val())){
		mes_err += "<?php echo __('燃料予熱後温度に数値を入力してください');?>\n";
		id_err.push("Tf2");
		chk = false;
	}

	if(!isNumberic($("#Ta2").val())){
		mes_err += "<?php echo __('燃焼用空気予熱後温度に数値を入力してください');?>\n";
		id_err.push("Ta2");
		chk = false;
	}

	if(!isNumberic($("#Tescape").val()) && $('#Q51').is(':checked')){
		mes_err += "<?php echo __('エスケープ温度に数値を入力してください');?>\n";
		id_err.push("Tescape");
		chk = false;
	}
	if( !$('#Q51').is(':checked') && !isNumberic($("#Tescape").val()) && $("#Tescape").val().length>0){
		mes_err += "<?php echo __('エスケープ温度に数値を入力してください');?>\n";
		id_err.push("Tescape");
		chk = false;
	}

	if(!isNumberic($("#Twg1").val()) && $('#Q50').is(':checked')){
		mes_err += "<?php echo __('加熱室出口排ガス温度に数値を入力してください');?>\n";
		id_err.push("Twg1");
		chk = false;
	}
	if( !$('#Q50').is(':checked') && !isNumberic($("#Twg1").val()) && $("#Twg1").val().length>0){
		mes_err += "<?php echo __('加熱室出口排ガス温度に数値を入力してください');?>\n";
		id_err.push("Twg1");
		chk = false;
	}

	if( !isNumberic($("#Twg2").val()) && $("#Twg2").val().length>0){
		mes_err += "<?php echo __('排熱回収装置入口排ガス温度に数値を入力してください');?>\n";
		id_err.push("Twg2");
		chk = false;
	}

	if( !isNumberic($("#Te").val()) && $('#Q51').is(':checked') ){
		mes_err += "<?php echo __('排熱回収装置出口排ガス温度に数値を入力してください');?>\n";
		id_err.push("Te");
		chk = false;
	}
	if( !$('#Q51').is(':checked')  && !isNumberic($("#Te").val()) && $("#Te").val().length>0){
		mes_err += "<?php echo __('排熱回収装置出口排ガス温度に数値を入力してください');?>\n";
		id_err.push("Te");
		chk = false;
	}

	if( (!isNumberic($("#Vme").val()) || $("#Vme").val() <0.0) && $("#Vme").val().length>0){ 
		mes_err += "<?php echo __('燃焼用空気量（測定値）に数値を入力してください');?>\n";
		mes_err += "<?php echo __('燃焼用空気量（測定値）に0.0より大きく入力してください');?>\n";
		id_err.push("Vme");
		chk = false;
	}
	
	if( !isNumberic($("#Fg_O2").val()) || $("#Fg_O2").val()<0.0){
		mes_err += "<?php echo __('排ガス中の酸素濃度（dry）解説に数値を入力してください');?>\n";
		mes_err += "<?php echo __('排ガス中の酸素濃度（dry）解説に0.0より大きく入力してください');?>\n";
		id_err.push("Fg_O2");
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