<div class="content_box">
<h2><?php echo __("炉体の損失熱のデ－タ入力");?></h2>
<div class="text">
<input type="text" name="" value="" id="" class="small" style="width:80px;margin-bottom:0.3em;"><?php echo __("に実測値を入力してください。");?><br>
<span class="cul">計算</span><?php echo __('をクリックすると、理論計算用入力ページが表示されます。<br>入力が終了したらOKボタンを押してください。');?>
</div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup21.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説');?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page21'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable4">
<tr>
<th></th>
<th><?php echo __('炉体放散<br>損失');?>(kJ/t)</th>
<th><?php echo __('開口部<br>損失');?></th>
<th><?php echo __('冷却水<br>損失');?></th>
<th><?php echo __('蓄熱<br>損失');?></th>
<th><?php echo __('放炎<br>損失');?></th>
<th><?php echo __('金属部品<br>からの<br>伝導損失');?></th>
</tr>
<tr>
<td>1</td>
<td><?php $vEl_wall1 = (isset($EnergyInput['El_wall'][1]))? $EnergyInput['El_wall'][1] : '0';
echo $this->Form->input('El_wall[1]',
		array(
			'id' => 'El_wall1',
			'name' => 'data[energy_input][El_wall][1]',
			'type' => 'text',			
			'value' => $vEl_wall1,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act11" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/1")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening1 = (isset($EnergyInput['El_opening'][1]))? $EnergyInput['El_opening'][1] : '0';
echo $this->Form->input('El_opening[1]',
		array(
			'id' => 'El_opening1',
			'name' => 'data[energy_input][El_opening][1]',
			'type' => 'text',			
			'value' => $vEl_opening1,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act12" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/1")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw1 = (isset($EnergyInput['El_cw'][1]))? $EnergyInput['El_cw'][1] : '0';
echo $this->Form->input('El_cw[1]',
		array(
			'id' => 'El_cw1',
			'name' => 'data[energy_input][El_cw][1]',
			'type' => 'text',			
			'value' => $vEl_cw1,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act13" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/1")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage1 = (isset($EnergyInput['El_storage'][1]))? $EnergyInput['El_storage'][1] : '0';
echo $this->Form->input('El_storage[1]',
		array(
			'id' => 'El_storage1',
			'name' => 'data[energy_input][El_storage][1]',
			'type' => 'text',			
			'value' => $vEl_storage1,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act14" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/1")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout1 = (isset($EnergyInput['El_blowout'][1]))? $EnergyInput['El_blowout'][1] : '0';
echo $this->Form->input('El_blowout[1]',
		array(
			'id' => 'El_blowout1',
			'name' => 'data[energy_input][El_blowout][1]',
			'type' => 'text',			
			'value' => $vEl_blowout1,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act15" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/1")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts1 = (isset($EnergyInput['El_parts'][1]))? $EnergyInput['El_parts'][1] : '0';
echo $this->Form->input('El_parts[1]',
		array(
			'id' => 'El_parts1',
			'name' => 'data[energy_input][El_parts][1]',
			'type' => 'text',			
			'value' => $vEl_parts1,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act16" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/1")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>


<tr>
<td>2</td>
<td><?php $vEl_wall2 = (isset($EnergyInput['El_wall'][2]))? $EnergyInput['El_wall'][2] : '';
echo $this->Form->input('El_wall[2]',
		array(
			'id' => 'El_wall2',
			'name' => 'data[energy_input][El_wall][2]',
			'type' => 'text',			
			'value' => $vEl_wall2,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act21" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/2")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening2 = (isset($EnergyInput['El_opening'][2]))? $EnergyInput['El_opening'][2] : '';
echo $this->Form->input('El_opening[2]',
		array(
			'id' => 'El_opening2',
			'name' => 'data[energy_input][El_opening][2]',
			'type' => 'text',			
			'value' => $vEl_opening2,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act22" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/2")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw2 = (isset($EnergyInput['El_cw'][2]))? $EnergyInput['El_cw'][2] : '';
echo $this->Form->input('El_cw[2]',
		array(
			'id' => 'El_cw2',
			'name' => 'data[energy_input][El_cw][2]',
			'type' => 'text',			
			'value' => $vEl_cw2,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act23" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/2")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage2 = (isset($EnergyInput['El_storage'][2]))? $EnergyInput['El_storage'][2] : '';
echo $this->Form->input('El_storage[2]',
		array(
			'id' => 'El_storage2',
			'name' => 'data[energy_input][El_storage][2]',
			'type' => 'text',			
			'value' => $vEl_storage2,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act24" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/2")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout2 = (isset($EnergyInput['El_blowout'][2]))? $EnergyInput['El_blowout'][2] : '';
echo $this->Form->input('El_blowout[2]',
		array(
			'id' => 'El_blowout2',
			'name' => 'data[energy_input][El_blowout][2]',
			'type' => 'text',			
			'value' => $vEl_blowout2,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act25" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/2")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts2 = (isset($EnergyInput['El_parts'][2]))? $EnergyInput['El_parts'][2] : '';
echo $this->Form->input('El_parts[2]',
		array(
			'id' => 'El_parts2',
			'name' => 'data[energy_input][El_parts][2]',
			'type' => 'text',			
			'value' => $vEl_parts2,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act26" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/2")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>

<tr>
<td>3</td>
<td><?php $vEl_wall3 = (isset($EnergyInput['El_wall'][3]))? $EnergyInput['El_wall'][3] : '';
echo $this->Form->input('El_wall[3]',
		array(
			'id' => 'El_wall3',
			'name' => 'data[energy_input][El_wall][3]',
			'type' => 'text',			
			'value' => $vEl_wall3,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act31" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/3")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening3 = (isset($EnergyInput['El_opening'][3]))? $EnergyInput['El_opening'][3] : '';
echo $this->Form->input('El_opening[3]',
		array(
			'id' => 'El_opening3',
			'name' => 'data[energy_input][El_opening][3]',
			'type' => 'text',			
			'value' => $vEl_opening3,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act32" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/3")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw3 = (isset($EnergyInput['El_cw'][3]))? $EnergyInput['El_cw'][3] : '';
echo $this->Form->input('El_cw[3]',
		array(
			'id' => 'El_cw3',
			'name' => 'data[energy_input][El_cw][3]',
			'type' => 'text',			
			'value' => $vEl_cw3,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act33" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/3")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage3 = (isset($EnergyInput['El_storage'][3]))? $EnergyInput['El_storage'][3] : '';
echo $this->Form->input('El_storage[3]',
		array(
			'id' => 'El_storage3',
			'name' => 'data[energy_input][El_storage][3]',
			'type' => 'text',			
			'value' => $vEl_storage3,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act34" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/3")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout3 = (isset($EnergyInput['El_blowout'][3]))? $EnergyInput['El_blowout'][3] : '';
echo $this->Form->input('El_blowout[3]',
		array(
			'id' => 'El_blowout3',
			'name' => 'data[energy_input][El_blowout][3]',
			'type' => 'text',			
			'value' => $vEl_blowout3,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act35" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/3")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts3 = (isset($EnergyInput['El_parts'][3]))? $EnergyInput['El_parts'][3] : '';
echo $this->Form->input('El_parts[3]',
		array(
			'id' => 'El_parts3',
			'name' => 'data[energy_input][El_parts][3]',
			'type' => 'text',			
			'value' => $vEl_parts3,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act36" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/3")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>


<tr>
<td>4</td>
<td><?php $vEl_wall4 = (isset($EnergyInput['El_wall'][4]))? $EnergyInput['El_wall'][4] : '';
echo $this->Form->input('El_wall[4]',
		array(
			'id' => 'El_wall4',
			'name' => 'data[energy_input][El_wall][4]',
			'type' => 'text',			
			'value' => $vEl_wall4,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act41" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/4")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening4 = (isset($EnergyInput['El_opening'][4]))? $EnergyInput['El_opening'][4] : '';
echo $this->Form->input('El_opening[4]',
		array(
			'id' => 'El_opening4',
			'name' => 'data[energy_input][El_opening][4]',
			'type' => 'text',			
			'value' => $vEl_opening4,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act42" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/4")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw4 = (isset($EnergyInput['El_cw'][4]))? $EnergyInput['El_cw'][4] : '';
echo $this->Form->input('El_cw[4]',
		array(
			'id' => 'El_cw4',
			'name' => 'data[energy_input][El_cw][4]',
			'type' => 'text',			
			'value' => $vEl_cw4,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act43" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/4")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage4 = (isset($EnergyInput['El_storage'][4]))? $EnergyInput['El_storage'][4] : '';
echo $this->Form->input('El_storage[4]',
		array(
			'id' => 'El_storage4',
			'name' => 'data[energy_input][El_storage][4]',
			'type' => 'text',			
			'value' => $vEl_storage4,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act44" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/4")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout4 = (isset($EnergyInput['El_blowout'][4]))? $EnergyInput['El_blowout'][4] : '';
echo $this->Form->input('El_blowout[4]',
		array(
			'id' => 'El_blowout4',
			'name' => 'data[energy_input][El_blowout][4]',
			'type' => 'text',			
			'value' => $vEl_blowout4,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act45" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/4")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts4 = (isset($EnergyInput['El_parts'][4]))? $EnergyInput['El_parts'][4] : '';
echo $this->Form->input('El_parts[4]',
		array(
			'id' => 'El_parts4',
			'name' => 'data[energy_input][El_parts][4]',
			'type' => 'text',			
			'value' => $vEl_parts4,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act46" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/4")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>
<tr>


<td>5</td>
<td><?php $vEl_wall5 = (isset($EnergyInput['El_wall'][5]))? $EnergyInput['El_wall'][5] : '';
echo $this->Form->input('El_wall[5]',
		array(
			'id' => 'El_wall5',
			'name' => 'data[energy_input][El_wall][5]',
			'type' => 'text',			
			'value' => $vEl_wall5,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act51" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/5")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening5 = (isset($EnergyInput['El_opening'][5]))? $EnergyInput['El_opening'][5] : '';
echo $this->Form->input('El_opening[5]',
		array(
			'id' => 'El_opening5',
			'name' => 'data[energy_input][El_opening][5]',
			'type' => 'text',			
			'value' => $vEl_opening5,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act52" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/5")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw5 = (isset($EnergyInput['El_cw'][5]))? $EnergyInput['El_cw'][5] : '';
echo $this->Form->input('El_cw[5]',
		array(
			'id' => 'El_cw5',
			'name' => 'data[energy_input][El_cw][5]',
			'type' => 'text',			
			'value' => $vEl_cw5,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act53" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/5")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage5 = (isset($EnergyInput['El_storage'][5]))? $EnergyInput['El_storage'][5] : '';
echo $this->Form->input('El_storage[5]',
		array(
			'id' => 'El_storage5',
			'name' => 'data[energy_input][El_storage][5]',
			'type' => 'text',			
			'value' => $vEl_storage5,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act54" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/5")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout5 = (isset($EnergyInput['El_blowout'][5]))? $EnergyInput['El_blowout'][5] : '';
echo $this->Form->input('El_blowout[5]',
		array(
			'id' => 'El_blowout5',
			'name' => 'data[energy_input][El_blowout][5]',
			'type' => 'text',			
			'value' => $vEl_blowout5,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act55" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/5")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts5 = (isset($EnergyInput['El_parts'][5]))? $EnergyInput['El_parts'][5] : '';
echo $this->Form->input('El_parts[5]',
		array(
			'id' => 'El_parts5',
			'name' => 'data[energy_input][El_parts][5]',
			'type' => 'text',			
			'value' => $vEl_parts5,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act56" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/5")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>


<tr>
<td>6</td>
<td><?php $vEl_wall6 = (isset($EnergyInput['El_wall'][6]))? $EnergyInput['El_wall'][6] : '';
echo $this->Form->input('El_wall[6]',
		array(
			'id' => 'El_wall6',
			'name' => 'data[energy_input][El_wall][6]',
			'type' => 'text',			
			'value' => $vEl_wall6,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act61" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/6")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening6 = (isset($EnergyInput['El_opening'][6]))? $EnergyInput['El_opening'][6] : '';
echo $this->Form->input('El_opening[6]',
		array(
			'id' => 'El_opening6',
			'name' => 'data[energy_input][El_opening][6]',
			'type' => 'text',			
			'value' => $vEl_opening6,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act62" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/6")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw6 = (isset($EnergyInput['El_cw'][6]))? $EnergyInput['El_cw'][6] : '';
echo $this->Form->input('El_cw[6]',
		array(
			'id' => 'El_cw6',
			'name' => 'data[energy_input][El_cw][6]',
			'type' => 'text',			
			'value' => $vEl_cw6,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act63" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/6")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage6 = (isset($EnergyInput['El_storage'][6]))? $EnergyInput['El_storage'][6] : '';
echo $this->Form->input('El_storage[6]',
		array(
			'id' => 'El_storage6',
			'name' => 'data[energy_input][El_storage][6]',
			'type' => 'text',			
			'value' => $vEl_storage6,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act64" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/6")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout6 = (isset($EnergyInput['El_blowout'][6]))? $EnergyInput['El_blowout'][6] : '';
echo $this->Form->input('El_blowout[6]',
		array(
			'id' => 'El_blowout6',
			'name' => 'data[energy_input][El_blowout][6]',
			'type' => 'text',			
			'value' => $vEl_blowout6,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act65" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/6")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts6 = (isset($EnergyInput['El_parts'][6]))? $EnergyInput['El_parts'][6] : '';
echo $this->Form->input('El_parts[6]',
		array(
			'id' => 'El_parts6',
			'name' => 'data[energy_input][El_parts][6]',
			'type' => 'text',			
			'value' => $vEl_parts6,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act66" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/6")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>


<tr>
<td>7</td>
<td><?php $vEl_wall7 = (isset($EnergyInput['El_wall'][7]))? $EnergyInput['El_wall'][7] : '';
echo $this->Form->input('El_wall[7]',
		array(
			'id' => 'El_wall7',
			'name' => 'data[energy_input][El_wall][7]',
			'type' => 'text',			
			'value' => $vEl_wall7,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act71" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/7")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening7 = (isset($EnergyInput['El_opening'][7]))? $EnergyInput['El_opening'][7] : '';
echo $this->Form->input('El_opening[7]',
		array(
			'id' => 'El_opening7',
			'name' => 'data[energy_input][El_opening][7]',
			'type' => 'text',			
			'value' => $vEl_opening7,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act72" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/7")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw7 = (isset($EnergyInput['El_cw'][7]))? $EnergyInput['El_cw'][7] : '';
echo $this->Form->input('El_cw[7]',
		array(
			'id' => 'El_cw7',
			'name' => 'data[energy_input][El_cw][7]',
			'type' => 'text',			
			'value' => $vEl_cw7,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act73" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/7")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage7 = (isset($EnergyInput['El_storage'][7]))? $EnergyInput['El_storage'][7] : '';
echo $this->Form->input('El_storage[7]',
		array(
			'id' => 'El_storage7',
			'name' => 'data[energy_input][El_storage][7]',
			'type' => 'text',			
			'value' => $vEl_storage7,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act74" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/7")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout7 = (isset($EnergyInput['El_blowout'][7]))? $EnergyInput['El_blowout'][7] : '';
echo $this->Form->input('El_blowout[7]',
		array(
			'id' => 'El_blowout7',
			'name' => 'data[energy_input][El_blowout][7]',
			'type' => 'text',			
			'value' => $vEl_blowout7,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act75" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/7")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts7 = (isset($EnergyInput['El_parts'][7]))? $EnergyInput['El_parts'][7] : '';
echo $this->Form->input('El_parts[1]',
		array(
			'id' => 'El_parts7',
			'name' => 'data[energy_input][El_parts][7]',
			'type' => 'text',			
			'value' => $vEl_parts7,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act76" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/7")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>


<tr>
<td>8</td>
<td><?php $vEl_wall8 = (isset($EnergyInput['El_wall'][8]))? $EnergyInput['El_wall'][8] : '';
echo $this->Form->input('El_wall[8]',
		array(
			'id' => 'El_wall8',
			'name' => 'data[energy_input][El_wall][8]',
			'type' => 'text',			
			'value' => $vEl_wall8,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act81" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/8")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening8 = (isset($EnergyInput['El_opening'][8]))? $EnergyInput['El_opening'][8] : '';
echo $this->Form->input('El_opening[8]',
		array(
			'id' => 'El_opening8',
			'name' => 'data[energy_input][El_opening][8]',
			'type' => 'text',			
			'value' => $vEl_opening8,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act82" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/8")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw8 = (isset($EnergyInput['El_cw'][8]))? $EnergyInput['El_cw'][8] : '';
echo $this->Form->input('El_cw[8]',
		array(
			'id' => 'El_cw8',
			'name' => 'data[energy_input][El_cw][8]',
			'type' => 'text',			
			'value' => $vEl_cw8,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act83" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/8")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage8 = (isset($EnergyInput['El_storage'][8]))? $EnergyInput['El_storage'][8] : '';
echo $this->Form->input('El_storage[8]',
		array(
			'id' => 'El_storage8',
			'name' => 'data[energy_input][El_storage][8]',
			'type' => 'text',			
			'value' => $vEl_storage8,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act84" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/8")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout8 = (isset($EnergyInput['El_blowout'][8]))? $EnergyInput['El_blowout'][8] : '';
echo $this->Form->input('El_blowout[8]',
		array(
			'id' => 'El_blowout8',
			'name' => 'data[energy_input][El_blowout][8]',
			'type' => 'text',			
			'value' => $vEl_blowout8,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act85" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/8")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts8 = (isset($EnergyInput['El_parts'][8]))? $EnergyInput['El_parts'][8] : '';
echo $this->Form->input('El_parts[8]',
		array(
			'id' => 'El_parts8',
			'name' => 'data[energy_input][El_parts][8]',
			'type' => 'text',			
			'value' => $vEl_parts8,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act86" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/8")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>


<tr>
<td>9</td>
<td><?php $vEl_wall9 = (isset($EnergyInput['El_wall'][9]))? $EnergyInput['El_wall'][9] : '';
echo $this->Form->input('El_wall[9]',
		array(
			'id' => 'El_wall9',
			'name' => 'data[energy_input][El_wall][9]',
			'type' => 'text',			
			'value' => $vEl_wall9,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act91" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/9")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening9 = (isset($EnergyInput['El_opening'][9]))? $EnergyInput['El_opening'][9] : '';
echo $this->Form->input('El_opening[9]',
		array(
			'id' => 'El_opening9',
			'name' => 'data[energy_input][El_opening][9]',
			'type' => 'text',			
			'value' => $vEl_opening9,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act92" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/9")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw9 = (isset($EnergyInput['El_cw'][9]))? $EnergyInput['El_cw'][9] : '';
echo $this->Form->input('El_cw[9]',
		array(
			'id' => 'El_cw9',
			'name' => 'data[energy_input][El_cw][9]',
			'type' => 'text',			
			'value' => $vEl_cw9,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act93" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/9")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage9 = (isset($EnergyInput['El_storage'][9]))? $EnergyInput['El_storage'][9] : '';
echo $this->Form->input('El_storage[9]',
		array(
			'id' => 'El_storage9',
			'name' => 'data[energy_input][El_storage][9]',
			'type' => 'text',			
			'value' => $vEl_storage9,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act94" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/9")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout9 = (isset($EnergyInput['El_blowout'][9]))? $EnergyInput['El_blowout'][9] : '';
echo $this->Form->input('El_blowout[9]',
		array(
			'id' => 'El_blowout9',
			'name' => 'data[energy_input][El_blowout][9]',
			'type' => 'text',			
			'value' => $vEl_blowout9,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act95" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/9")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts9 = (isset($EnergyInput['El_parts'][9]))? $EnergyInput['El_parts'][9] : '';
echo $this->Form->input('El_parts[9]',
		array(
			'id' => 'El_parts9',
			'name' => 'data[energy_input][El_parts][9]',
			'type' => 'text',			
			'value' => $vEl_parts9,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act96" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/9")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>


<tr>
<td>10</td>
<td><?php $vEl_wall10 = (isset($EnergyInput['El_wall'][10]))? $EnergyInput['El_wall'][10] : '';
echo $this->Form->input('El_wall[10]',
		array(
			'id' => 'El_wall10',
			'name' => 'data[energy_input][El_wall][10]',
			'type' => 'text',			
			'value' => $vEl_wall10,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act101" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page22/10")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_opening10 = (isset($EnergyInput['El_opening'][10]))? $EnergyInput['El_opening'][10] : '';
echo $this->Form->input('El_opening[10]',
		array(
			'id' => 'El_opening10',
			'name' => 'data[energy_input][El_opening][10]',
			'type' => 'text',			
			'value' => $vEl_opening10,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act102" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page23/10")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_cw10 = (isset($EnergyInput['El_cw'][10]))? $EnergyInput['El_cw'][10] : '';
echo $this->Form->input('El_cw[10]',
		array(
			'id' => 'El_cw10',
			'name' => 'data[energy_input][El_cw][10]',
			'type' => 'text',			
			'value' => $vEl_cw10,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act103" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page24/10")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_storage10 = (isset($EnergyInput['El_storage'][10]))? $EnergyInput['El_storage'][10] : '';
echo $this->Form->input('El_storage[10]',
		array(
			'id' => 'El_storage10',
			'name' => 'data[energy_input][El_storage][10]',
			'type' => 'text',			
			'value' => $vEl_storage10,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act104" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page25/10")); ?>','','scrollbars=yes,Width=860,Height=600');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_blowout10 = (isset($EnergyInput['El_blowout'][10]))? $EnergyInput['El_blowout'][10] : '';
echo $this->Form->input('El_blowout[10]',
		array(
			'id' => 'El_blowout10',
			'name' => 'data[energy_input][El_blowout][10]',
			'type' => 'text',			
			'value' => $vEl_blowout10,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act105" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page27/10")); ?>','','scrollbars=yes,Width=860,Height=460');w.focus();"><?php echo __('計算');?></a></p></td>

<td><?php $vEl_parts10 = (isset($EnergyInput['El_parts'][10]))? $EnergyInput['El_parts'][10] : '';
echo $this->Form->input('El_parts[10]',
		array(
			'id' => 'El_parts10',
			'name' => 'data[energy_input][El_parts][10]',
			'type' => 'text',			
			'value' => $vEl_parts10,
			// 'readonly' => true,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?><p class="cul"><a id="act106" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page28/10")); ?>','','scrollbars=yes,Width=860,Height=500');w.focus();"><?php echo __('計算');?></a></p></td>
</tr>
</table>

<div class="clr"></div>

<ul class="checkBoxList4">
<li><label for="El_ot_t"><?php echo __('その他損失');?></label>
<?php $vEl_ot_t = (isset($EnergyInput['El_ot_t']))? $EnergyInput['El_ot_t'] : '0';
echo $this->Form->input('El_ot_t',
		array(
			'id' => 'El_ot_t',
			'type' => 'text',			
			'value' => $vEl_ot_t,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</li>
</ul>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok_top">
<div class="btn_ok"><p><a href="#" onClick="submit_frm_p21();" ><?php echo __('OK');?></a></p></div>
</div>
<div class="clr after"></div>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る');?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_p21(){
	var chk = true;
	var mes_err = "";
	var id_err = [];
	var mes_arr = [];
	var tmp = 0;

	$(".rowc").each(function(){
		tmp = tmp + 1;

		if($(this).attr("id") == "El_wall1" || $(this).attr("id") == "El_opening1" || $(this).attr("id") == "El_cw1" || $(this).attr("id") == "El_storage1" || $(this).attr("id") == "El_blowout1" || $(this).attr("id") == "El_parts1" ){
			if( !isNumberic($(this).val()) ){			
				id_err.push($(this).attr("id")); 
				switch(tmp){
					case 1: mes_arr[1] = "<?php echo __('炉体放散損失に数値を入力してください');?>\n"; break;
					case 2: mes_arr[2] = "<?php echo __('開口部損失に数値を入力してください');?>\n"; break;
					case 3: mes_arr[3] = "<?php echo __('冷却水損失に数値を入力してください');?>\n"; break;
					case 4: mes_arr[4] = "<?php echo __('蓄熱損失に数値を入力してください');?>\n"; break;
					case 5: mes_arr[5] = "<?php echo __('放炎損失に数値を入力してください');?>\n"; break;
					case 6: mes_arr[6] = "<?php echo __('金属部品からの伝導損失に数値を入力してください');?>\n"; break;
				}			
				chk = false;			
			}
		}else{
			if( $(this).val().length>0 && !isNumberic($(this).val()) ){			
				id_err.push($(this).attr("id")); 
				switch(tmp){
					case 1: mes_arr[1] = "<?php echo __('炉体放散損失に数値を入力してください');?>\n"; break;
					case 2: mes_arr[2] = "<?php echo __('開口部損失に数値を入力してください');?>\n"; break;
					case 3: mes_arr[3] = "<?php echo __('冷却水損失に数値を入力してください');?>\n"; break;
					case 4: mes_arr[4] = "<?php echo __('蓄熱損失に数値を入力してください');?>\n"; break;
					case 5: mes_arr[5] = "<?php echo __('放炎損失に数値を入力してください');?>\n"; break;
					case 6: mes_arr[6] = "<?php echo __('金属部品からの伝導損失に数値を入力してください');?>\n"; break;
				}			
				chk = false;			
			}
		}		
		if(tmp==6){
			tmp = 0;
		}
	}); 
	
	if(!isNumberic($("#El_ot_t").val()) || $("#El_ot_t").val()<0.0){
		mes_err += "<?php echo __('その他損失に数値を入力してください');?>\n";
		mes_err += "<?php echo __('その他損失に0.0より入力してください');?>\n";				
		id_err.push("El_ot_t");
		chk = false;
	}	

	if(chk){
		document.forms['EnergyInputForm'].submit();
	}else{		
		$("#"+id_err[0]).focus();
		var mes_arr_err = "";
		for(i=1 ; i<=6 ; i++){
			if(mes_arr[i]){
				mes_arr_err += mes_arr[i];
			}
		}		
		alert(mes_arr_err + mes_err);
		return false;		
	}	
}
</script>

</div>