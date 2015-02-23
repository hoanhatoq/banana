<div class="content_box">
<h2><?php echo __('電気エネルギー入力'); ?></h2>
<div class="text">
<input type="text" name="" value="" id="" size="3"><?php echo __('に実測値を入力。'); ?> <span class="cul"><?php echo __('計算'); ?></span><?php echo __('を選ぶと理論計算ができます。<br>入力が終了したらOKボタンを押してください。'); ?>
</div>

<div class="btn_info"><p><a href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "popup", "action" => $locale."/popup32.html")); ?>','','scrollbars=yes,Width=400,Height=400');w.focus();"><?php echo __('解説'); ?></a></p></div>

<div class="clr"></div>

<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'page32'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>
<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" id="saveDraft" class="select">
<table class="checkBoxTable">
<tr>
<th><?php echo __('加熱炉受電端ベースの加熱電力'); ?></th>
<td><?php $vEh_el_accept = (isset($EnergyInput['Eh_el_accept']))? $EnergyInput['Eh_el_accept'] : '0';
echo $this->Form->input('Eh_el_accept',
		array(
			'id' => 'Eh_el_accept',
			'type' => 'text',			
			'value' => $vEh_el_accept,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
<th><?php echo __('事業所内配電損失率'); ?></th>
<td><?php $vEta_e_loss = (isset($EnergyInput['Eta_e_loss']))? $EnergyInput['Eta_e_loss'] : '0';
echo $this->Form->input('Eta_e_loss',
		array(
			'id' => 'Eta_e_loss',
			'type' => 'text',			
			'value' => $vEta_e_loss,
			'class' => 'small',
			'label' => false,
			'div' => false
		)
	); 
?>%</td>
</tr>
</table>
<?php echo __('電力を入力するか理論計算してください。'); ?>
<table class="checkBoxList4 tbl">
<tr>
<th class="radio wh"></th>
<th><?php echo __('ブロワー電力'); ?></th>
<th><?php echo __('コンプレッサー電力'); ?></th>
<th><?php echo __('ポンプ電力'); ?></th>
</tr>
<tr>
<th class="thleft02">1</th>
<td>
<p class="cul3"><a id="act11" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/1")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p>
<?php $vEaux_blower1 = (isset($EnergyInput['Eaux_blower'][1]))? $EnergyInput['Eaux_blower'][1] : '';
echo $this->Form->input('Eaux_blower[1]',
		array(
			'id' => 'Eaux_blower1',
			'name' => 'data[energy_input][Eaux_blower][1]',
			'type' => 'text',			
			'value' => $vEaux_blower1,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
</td>
<td>
<p class="cul3"><a id="act12" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/1")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p>
<?php $vEaux_compressor1 = (isset($EnergyInput['Eaux_compressor'][1]))? $EnergyInput['Eaux_compressor'][1] : '';
echo $this->Form->input('Eaux_compressor[1]',
		array(
			'id' => 'Eaux_compressor1',
			'name' => 'data[energy_input][Eaux_compressor][1]',
			'type' => 'text',			
			'value' => $vEaux_compressor1,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
</td>

<td><?php $vEaux_pump1 = (isset($EnergyInput['Eaux_pump'][1]))? $EnergyInput['Eaux_pump'][1] : '';
echo $this->Form->input('Eaux_pump[1]',
		array(
			'id' => 'Eaux_pump1',
			'name' => 'data[energy_input][Eaux_pump][1]',
			'type' => 'text',			
			'value' => $vEaux_pump1,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act13" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/1")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">2</th>
<td><?php $vEaux_blower2 = (isset($EnergyInput['Eaux_blower'][2]))? $EnergyInput['Eaux_blower'][2] : '';
echo $this->Form->input('Eaux_blower[2]',
		array(
			'id' => 'Eaux_blower2',
			'name' => 'data[energy_input][Eaux_blower][2]',
			'type' => 'text',			
			'value' => $vEaux_blower2,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act21" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/2")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor2 = (isset($EnergyInput['Eaux_compressor'][2]))? $EnergyInput['Eaux_compressor'][2] : '';
echo $this->Form->input('Eaux_compressor[2]',
		array(
			'id' => 'Eaux_compressor2',
			'name' => 'data[energy_input][Eaux_compressor][2]',
			'type' => 'text',			
			'value' => $vEaux_compressor2,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act22" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/2")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump2 = (isset($EnergyInput['Eaux_pump'][2]))? $EnergyInput['Eaux_pump'][2] : '';
echo $this->Form->input('Eaux_pump[2]',
		array(
			'id' => 'Eaux_pump2',
			'name' => 'data[energy_input][Eaux_pump][2]',
			'type' => 'text',			
			'value' => $vEaux_pump2,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act23" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/2")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">3</th>
<td><?php $vEaux_blower3 = (isset($EnergyInput['Eaux_blower'][3]))? $EnergyInput['Eaux_blower'][3] : '';
echo $this->Form->input('Eaux_blower[3]',
		array(
			'id' => 'Eaux_blower3',
			'name' => 'data[energy_input][Eaux_blower][3]',
			'type' => 'text',			
			'value' => $vEaux_blower3,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act31" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/3")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor3 = (isset($EnergyInput['Eaux_compressor'][3]))? $EnergyInput['Eaux_compressor'][3] : '';
echo $this->Form->input('Eaux_compressor[3]',
		array(
			'id' => 'Eaux_compressor3',
			'name' => 'data[energy_input][Eaux_compressor][3]',
			'type' => 'text',			
			'value' => $vEaux_compressor3,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act32" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/3")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump3 = (isset($EnergyInput['Eaux_pump'][3]))? $EnergyInput['Eaux_pump'][3] : '';
echo $this->Form->input('Eaux_pump[3]',
		array(
			'id' => 'Eaux_pump3',
			'name' => 'data[energy_input][Eaux_pump][3]',
			'type' => 'text',			
			'value' => $vEaux_pump3,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act33" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/3")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">4</th>
<td><?php $vEaux_blower4 = (isset($EnergyInput['Eaux_blower'][4]))? $EnergyInput['Eaux_blower'][4] : '';
echo $this->Form->input('Eaux_blower[4]',
		array(
			'id' => 'Eaux_blower4',
			'name' => 'data[energy_input][Eaux_blower][4]',
			'type' => 'text',			
			'value' => $vEaux_blower4,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act41" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/4")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor4 = (isset($EnergyInput['Eaux_compressor'][4]))? $EnergyInput['Eaux_compressor'][4] : '';
echo $this->Form->input('Eaux_compressor[4]',
		array(
			'id' => 'Eaux_compressor4',
			'name' => 'data[energy_input][Eaux_compressor][4]',
			'type' => 'text',			
			'value' => $vEaux_compressor4,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act42" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/4")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump4 = (isset($EnergyInput['Eaux_pump'][4]))? $EnergyInput['Eaux_pump'][4] : '';
echo $this->Form->input('Eaux_pump[4]',
		array(
			'id' => 'Eaux_pump4',
			'name' => 'data[energy_input][Eaux_pump][4]',
			'type' => 'text',			
			'value' => $vEaux_pump4,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act43" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/4")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">5</th>
<td><?php $vEaux_blower5 = (isset($EnergyInput['Eaux_blower'][5]))? $EnergyInput['Eaux_blower'][5] : '';
echo $this->Form->input('Eaux_blower[5]',
		array(
			'id' => 'Eaux_blower5',
			'name' => 'data[energy_input][Eaux_blower][5]',
			'type' => 'text',			
			'value' => $vEaux_blower5,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act51" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/5")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor5 = (isset($EnergyInput['Eaux_compressor'][5]))? $EnergyInput['Eaux_compressor'][5] : '';
echo $this->Form->input('Eaux_compressor[5]',
		array(
			'id' => 'Eaux_compressor5',
			'name' => 'data[energy_input][Eaux_compressor][5]',
			'type' => 'text',			
			'value' => $vEaux_compressor5,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act52" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/5")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump5 = (isset($EnergyInput['Eaux_pump'][5]))? $EnergyInput['Eaux_pump'][5] : '';
echo $this->Form->input('Eaux_pump[5]',
		array(
			'id' => 'Eaux_pump5',
			'name' => 'data[energy_input][Eaux_pump][5]',
			'type' => 'text',			
			'value' => $vEaux_pump5,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act53" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/5")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">6</th>
<td><?php $vEaux_blower6 = (isset($EnergyInput['Eaux_blower'][6]))? $EnergyInput['Eaux_blower'][6] : '';
echo $this->Form->input('Eaux_blower[6]',
		array(
			'id' => 'Eaux_blower6',
			'name' => 'data[energy_input][Eaux_blower][6]',
			'type' => 'text',			
			'value' => $vEaux_blower6,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act61" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/6")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor6 = (isset($EnergyInput['Eaux_compressor'][6]))? $EnergyInput['Eaux_compressor'][6] : '';
echo $this->Form->input('Eaux_compressor[6]',
		array(
			'id' => 'Eaux_compressor6',
			'name' => 'data[energy_input][Eaux_compressor][6]',
			'type' => 'text',			
			'value' => $vEaux_compressor6,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act62" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/6")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump6 = (isset($EnergyInput['Eaux_pump'][6]))? $EnergyInput['Eaux_pump'][6] : '';
echo $this->Form->input('Eaux_pump[6]',
		array(
			'id' => 'Eaux_pump6',
			'name' => 'data[energy_input][Eaux_pump][6]',
			'type' => 'text',			
			'value' => $vEaux_pump6,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act63" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/6")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">7</th>
<td><?php $vEaux_blower7 = (isset($EnergyInput['Eaux_blower'][7]))? $EnergyInput['Eaux_blower'][7] : '';
echo $this->Form->input('Eaux_blower[7]',
		array(
			'id' => 'Eaux_blower7',
			'name' => 'data[energy_input][Eaux_blower][7]',
			'type' => 'text',			
			'value' => $vEaux_blower7,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act71" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/7")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor7 = (isset($EnergyInput['Eaux_compressor'][7]))? $EnergyInput['Eaux_compressor'][7] : '';
echo $this->Form->input('Eaux_compressor[7]',
		array(
			'id' => 'Eaux_compressor7',
			'name' => 'data[energy_input][Eaux_compressor][7]',
			'type' => 'text',			
			'value' => $vEaux_compressor7,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act72" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/7")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump7 = (isset($EnergyInput['Eaux_pump'][7]))? $EnergyInput['Eaux_pump'][7] : '';
echo $this->Form->input('Eaux_pump[7]',
		array(
			'id' => 'Eaux_pump7',
			'name' => 'data[energy_input][Eaux_pump][7]',
			'type' => 'text',			
			'value' => $vEaux_pump7,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act73" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/7")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">8</th>
<td><?php $vEaux_blower8 = (isset($EnergyInput['Eaux_blower'][8]))? $EnergyInput['Eaux_blower'][8] : '';
echo $this->Form->input('Eaux_blower[8]',
		array(
			'id' => 'Eaux_blower8',
			'name' => 'data[energy_input][Eaux_blower][8]',
			'type' => 'text',			
			'value' => $vEaux_blower8,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act81" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/8")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor8 = (isset($EnergyInput['Eaux_compressor'][8]))? $EnergyInput['Eaux_compressor'][8] : '';
echo $this->Form->input('Eaux_compressor[8]',
		array(
			'id' => 'Eaux_compressor8',
			'name' => 'data[energy_input][Eaux_compressor][8]',
			'type' => 'text',			
			'value' => $vEaux_compressor8,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act82" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/8")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump8 = (isset($EnergyInput['Eaux_pump'][8]))? $EnergyInput['Eaux_pump'][8] : '';
echo $this->Form->input('Eaux_pump[8]',
		array(
			'id' => 'Eaux_pump8',
			'name' => 'data[energy_input][Eaux_pump][8]',
			'type' => 'text',			
			'value' => $vEaux_pump8,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act83" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/8")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">9</th>
<td><?php $vEaux_blower9 = (isset($EnergyInput['Eaux_blower'][9]))? $EnergyInput['Eaux_blower'][9] : '';
echo $this->Form->input('Eaux_blower[9]',
		array(
			'id' => 'Eaux_blower9',
			'name' => 'data[energy_input][Eaux_blower][9]',
			'type' => 'text',			
			'value' => $vEaux_blower9,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act91" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/9")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor9 = (isset($EnergyInput['Eaux_compressor'][9]))? $EnergyInput['Eaux_compressor'][9] : '';
echo $this->Form->input('Eaux_compressor[9]',
		array(
			'id' => 'Eaux_compressor9',
			'name' => 'data[energy_input][Eaux_compressor][9]',
			'type' => 'text',			
			'value' => $vEaux_compressor9,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act92" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/9")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump9 = (isset($EnergyInput['Eaux_pump'][9]))? $EnergyInput['Eaux_pump'][9] : '';
echo $this->Form->input('Eaux_pump[9]',
		array(
			'id' => 'Eaux_pump9',
			'name' => 'data[energy_input][Eaux_pump][9]',
			'type' => 'text',			
			'value' => $vEaux_pump9,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act93" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/9")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th class="thleft02">10</th>
<td><?php $vEaux_blower10 = (isset($EnergyInput['Eaux_blower'][10]))? $EnergyInput['Eaux_blower'][10] : '';
echo $this->Form->input('Eaux_blower[10]',
		array(
			'id' => 'Eaux_blower10',
			'name' => 'data[energy_input][Eaux_blower][10]',
			'type' => 'text',			
			'value' => $vEaux_blower10,
			'label' => false,
			'div' => false,
			'class' => 'select small rowc'
		)
	); 
?>
<p class="cul3"><a id="act101" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page33/10")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_compressor10 = (isset($EnergyInput['Eaux_compressor'][10]))? $EnergyInput['Eaux_compressor'][10] : '';
echo $this->Form->input('Eaux_compressor[10]',
		array(
			'id' => 'Eaux_compressor10',
			'name' => 'data[energy_input][Eaux_compressor][10]',
			'type' => 'text',			
			'value' => $vEaux_compressor10,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act102" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page34/10")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>

<td><?php $vEaux_pump10 = (isset($EnergyInput['Eaux_pump'][10]))? $EnergyInput['Eaux_pump'][10] : '';
echo $this->Form->input('Eaux_pump[10]',
		array(
			'id' => 'Eaux_pump10',
			'name' => 'data[energy_input][Eaux_pump][10]',
			'type' => 'text',			
			'value' => $vEaux_pump10,
			'label' => false,
			'div' => false,
			'class' => 'select rowc'
		)
	); 
?>
<p class="cul3"><a id="act103" href="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page35/10")); ?>','','scrollbars=yes,Width=800,Height=400');w.focus();"><?php echo __('計算'); ?></a></p></td>
</tr>
</table>


<table class="checkBoxTable">
<tr>
<th><?php echo __('その他電力'); ?></th>
<td colspan="3"><?php $vEaux_ot_t = (isset($EnergyInput['Eaux_ot_t']))? $EnergyInput['Eaux_ot_t'] : '0';
echo $this->Form->input('Eaux_ot_t',
		array(
			'id' => 'Eaux_ot_t',
			'type' => 'text',			
			'value' => $vEaux_ot_t,
			'class' => 'small2',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
</tr>
<tr>
<th><?php echo __('駆動電力タイプ'); ?></th>
<td colspan="3"><?php 
	$pages = array(
		'00' => __('-選択-'), 
		'37' => __('ローラーハース'), 
		'38' => __('回転炉床'), 
		'39' => __('メッシュベルト'), 
		'40' => __('WB式')
	);
	$selected_page = (isset($EnergyInput['selpage']))? $EnergyInput['selpage'] : '00';
	echo $this->Form->input(
	    'selpage',
	    array(
	    	'id' => 'selpage',
	    	'options' => $pages, 
	    	'default' => $selected_page
	    )
	);
?></td>
</tr>

<tr>
<th><?php echo __('駆動電力'); ?></th>
<td colspan="3"><?php $vEaux_power_t = (isset($EnergyInput['Eaux_power_t']))? $EnergyInput['Eaux_power_t'] : '0';
echo $this->Form->input('Eaux_power_t',
		array(
			'id' => 'Eaux_power_t',
			'type' => 'text',			
			'value' => $vEaux_power_t,
			'class' => 'select small2',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T
<p class="cul2"><a id="act37" onclick="select_page();" href="#"><?php echo __('計算'); ?></a></p></td>
</tr>
<tr>
<th><?php echo __('周波数変換損失'); ?></th>
<td><?php $vEl_fre = (isset($EnergyInput['El_fre']))? $EnergyInput['El_fre'] : '0';
echo $this->Form->input('El_fre',
		array(
			'id' => 'El_fre',
			'type' => 'text',			
			'value' => $vEl_fre,
			'class' => '',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
<th><?php echo __('コイル損失'); ?></th>
<td><?php $vEl_coil = (isset($EnergyInput['El_coil']))? $EnergyInput['El_coil'] : '0';
echo $this->Form->input('El_coil',
		array(
			'id' => 'El_coil',
			'type' => 'text',			
			'value' => $vEl_coil,
			'class' => '',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
</tr>
<tr>
<th><?php echo __('トランス損失'); ?></th>
<td><?php $vEl_trans = (isset($EnergyInput['El_trans']))? $EnergyInput['El_trans'] : '0';
echo $this->Form->input('El_trans',
		array(
			'id' => 'El_trans',
			'type' => 'text',			
			'value' => $vEl_trans,
			'class' => '',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
<th><?php echo __('電極損失'); ?></th>
<td><?php $vEl_terminal = (isset($EnergyInput['El_terminal']))? $EnergyInput['El_terminal'] : '0';
echo $this->Form->input('El_terminal',
		array(
			'id' => 'El_terminal',
			'type' => 'text',			
			'value' => $vEl_terminal,
			'class' => '',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
</tr>
<tr>
<th><?php echo __('コンデンサー損失'); ?></th>
<td><?php $vEl_con = (isset($EnergyInput['El_con']))? $EnergyInput['El_con'] : '0';
echo $this->Form->input('El_con',
		array(
			'id' => 'El_con',
			'type' => 'text',			
			'value' => $vEl_con,
			'class' => '',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
<th><?php echo __('配線損失'); ?></th>
<td><?php $vEl_wir = (isset($EnergyInput['El_wir']))? $EnergyInput['El_wir'] : '0';
echo $this->Form->input('El_wir',
		array(
			'id' => 'El_wir',
			'type' => 'text',			
			'value' => $vEl_wir,
			'class' => '',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
</tr>
<tr>
<th><?php echo __('制御損失'); ?></th>
<td><?php $vEl_cl = (isset($EnergyInput['El_cl']))? $EnergyInput['El_cl'] : '0';
echo $this->Form->input('El_cl',
		array(
			'id' => 'El_cl',
			'type' => 'text',			
			'value' => $vEl_cl,
			'class' => '',
			'label' => false,
			'div' => false
		)
	); 
?>KJ/T</td>
<td colspan="2"></td>
</tr>
</table>

<?php echo $this->Form->end();?>

<div class="clr"></div>

<div class="btn_ok_top">
<div class="btn_ok"><p><a href="#" onClick="submit_frm_p32();"><?php echo __('OK'); ?></a></p></div>
</div>
<div class="clr after"></div>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function select_page(){	
	if($("#selpage").val() != "00"){
		var page = $("#selpage").val();
		javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"page")); ?>'+page,'','scrollbars=yes,Width=800,Height=600');w.focus();		
	}else{
		alert("<?php echo __('駆動電力タイプを選択してください');?>");
		return false;
	}	
}

function submit_frm_p32(){
	var mes_err = "";
	var id_err = [];
	var chk = true;
	var mes_arr = [];

	if(!isNumberic($("#Eh_el_accept").val()) || $("#Eh_el_accept").val()<0.0){
		mes_err += "<?php echo __('加熱炉受電端ベースの加熱電力に数値を入力してください');?>\n";
		mes_err += "<?php echo __('加熱炉受電端ベースの加熱電力に0.0より大きく入力してください');?>\n";		
		id_err.push("Eh_el_accept");
		chk = false;	
	}

	if(!isNumberic($("#Eta_e_loss").val()) || $("#Eta_e_loss").val()<0.0){
		mes_err += "<?php echo __('事業所内配電損失率に数値を入力してください');?>\n";
		mes_err += "<?php echo __('事業所内配電損失率に0.0より大きく入力してください');?>\n";		
		id_err.push("Eta_e_loss");
		chk = false;	
	}

	var tmp = 0;
	$(".rowc").each(function(){
		tmp = tmp + 1;
		if($(this).attr("id") == "Eaux_blower1" || $(this).attr("id") == "Eaux_compressor1" || $(this).attr("id") == "Eaux_pump1" ){
			if( !isNumberic($(this).val()) ){			
				id_err.push($(this).attr("id"));
				switch(tmp){
					case 1: mes_arr[1] = "<?php echo __('ブロワー電力に数値を入力してください');?>\n"; break;
					case 2: mes_arr[2] = "<?php echo __('コンプレッサー電力に数値を入力してください');?>\n"; break;
					case 3: mes_arr[3] = "<?php echo __('ポンプ電力に数値を入力してください');?>\n"; break;
				}			
				chk = false;			
			}
		}else{
			if( $(this).val().length>0 && !isNumberic($(this).val()) ){			
				id_err.push($(this).attr("id"));
				switch(tmp){
					case 1: mes_arr[1] = "<?php echo __('ブロワー電力に数値を入力してください');?>\n"; break;
					case 2: mes_arr[2] = "<?php echo __('コンプレッサー電力に数値を入力してください');?>\n"; break;
					case 3: mes_arr[3] = "<?php echo __('ポンプ電力に数値を入力してください');?>\n"; break;
				}			
				chk = false;			
			}
		}		
		if(tmp==3){
			tmp = 0;
		}
	}); 

	if(!chk){
		var mes_arr_err = "";
		for(i=1 ; i<=3 ; i++){
			if(mes_arr[i]){
				mes_arr_err += mes_arr[i];
			}
		}
		mes_err += mes_arr_err;
	}

	
	if(!isNumberic($("#Eaux_ot_t").val()) || $("#Eaux_ot_t").val()<0.0){
		mes_err += "<?php echo __('その他電力に数値を入力してください');?>\n";
		mes_err += "<?php echo __('その他電力に0.0より大きく入力してください');?>\n";		
		id_err.push("Eaux_ot_t");
		chk = false;	
	}

	// if($("#selpage").val() == "00"){
	// 	alert("<?php echo __('駆動電力タイプを選択してください');?>");
	// 	return false;		
	// }

	if(!isNumberic($("#Eaux_power_t").val()) || $("#Eaux_power_t").val()<0.0){
		mes_err += "<?php echo __('駆動電力に数値を入力してください');?>\n";
		mes_err += "<?php echo __('駆動電力に0.0より大きく入力してください');?>\n";		
		id_err.push("Eaux_power_t");
		chk = false;	
	}

	if(!isNumberic($("#El_fre").val()) || $("#El_fre").val()<0.0){
		mes_err += "<?php echo __('周波数変換損失に数値を入力してください');?>\n";
		mes_err += "<?php echo __('周波数変換損失に0.0より大きく入力してください');?>\n";
		id_err.push("El_fre");
		chk = false;				
	}

	if(!isNumberic($("#El_coil").val()) || $("#El_coil").val()<0.0){
		mes_err += "<?php echo __('コイル損失に数値を入力してください');?>\n";
		mes_err += "<?php echo __('コイル損失に0.0より大きく入力してください');?>\n";		
		id_err.push("El_coil");
		chk = false;
	}

	if(!isNumberic($("#El_trans").val()) || $("#El_trans").val()<0.0){
		mes_err += "<?php echo __('トランス損失に数値を入力してください');?>\n";
		mes_err += "<?php echo __('トランス損失に0.0より大きく入力してください');?>\n";		
		id_err.push("El_trans");
		chk = false;	
	}

	if(!isNumberic($("#El_terminal").val()) || $("#El_terminal").val()<0.0){
		mes_err += "<?php echo __('電極損失に数値を入力してください');?>\n";
		mes_err += "<?php echo __('電極損失に0.0より大きく入力してください');?>\n";		
		id_err.push("El_terminal");
		chk = false;	
	}

	if(!isNumberic($("#El_con").val()) || $("#El_con").val()<0.0){
		mes_err += "<?php echo __('コンデンサー損失に数値を入力してください');?>\n";
		mes_err += "<?php echo __('コンデンサー損失に0.0より大きく入力してください');?>\n";		
		id_err.push("El_con");
		chk = false;	
	}

	if(!isNumberic($("#El_wir").val()) || $("#El_wir").val()<0.0){
		mes_err += "<?php echo __('配線損失に数値を入力してください');?>\n";
		mes_err += "<?php echo __('配線損失に0.0より大きく入力してください');?>\n";		
		id_err.push("El_wir");
		chk = false;
	}

	if(!isNumberic($("#El_cl").val()) || $("#El_cl").val()<0.0){
		mes_err += "<?php echo __('制御損失に数値を入力してください');?>\n";
		mes_err += "<?php echo __('制御損失に0.0より大きく入力してください');?>\n";		
		id_err.push("El_cl");
		chk = false;	
	}

	if(chk){
		document.forms['EnergyInputForm'].submit();
	}else{				
		$("#"+id_err[0]).focus();		
		alert(mes_err);
		return false;		
	}	
}
</script>

</div>