<div class="content_box">
<h2><?php echo __('出力'); ?></h2>
<div class="btn_pdf"><p><a><?php echo $this->Html->link(__('出力'), array('controller' =>'out','action' => 'out_pdf', $chk['UserResult']['id']),array(),__('PDFファイルをダウンロードします')); ?></a></p></div>
<div class="clr"></div>

<h3 class="second02"><?php echo __('出力表1:代表的入力条件の表示出力'); ?></h3>
<table class="resultTable tbl">
<tbody><tr class="off">
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('出力値'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>

</tr>
<tr class="on">
<td class="name"><?php echo __('炉の種類'); ?></td>
<td style="text-align:center"><?php echo (isset($EnergyInput['Furnace_Type']))? $EnergyInput['Furnace_Type']: '';?></td>
<td></td>
</tr>
<tr class="off">
<td class="name"><?php echo __('炉名'); ?></td>
<td style="text-align:center"><?php echo (isset($EnergyInput['TPE_name']))? $EnergyInput['TPE_name']: '';?></td>
<td></td>
</tr>
<tr class="on">
<td class="name"><?php echo __('型式'); ?></td>
<td style="text-align:center"><?php echo (isset($EnergyInput['Type']))? $EnergyInput['Type']: '';?></td>
<td></td>
</tr>
<tr class="off">
<td class="name"><?php echo __('加熱量'); ?></td>
<td><?php echo (isset($EnergyInput['TPH']))? $EnergyInput['TPH']: 0.0;?></td>
<td style="text-align:center">t/h</td>
</tr>
<tr class="on">
<td class="name"><?php echo __('被熱物入口温度'); ?></td>
<td><?php echo (isset($EnergyInput['Tp1']))? $EnergyInput['Tp1']: 0.0;?></td>
<td style="text-align:center">℃</td>
</tr>
<tr class="off">
<td class="name"><?php echo __('被熱物出口温度'); ?></td>
<td><?php echo (isset($EnergyInput['Tp2']))? $EnergyInput['Tp2']: 0.0;?></td>
<td style="text-align:center">℃</td>
</tr>
<tr class="on">
<td class="name"><?php echo __('酸化減量'); ?></td>
<td><?php echo (isset($EnergyInput['Mloss']))? $EnergyInput['Mloss']: 0.0;?></td>
<td style="text-align:center">Kg/t</td>
</tr>
<tr class="off">
<td class="name"><?php echo __('燃料名称'); ?></td>
<td style="text-align:center"><?php echo (isset($EnergyInput['Fuel_name']))? $EnergyInput['Fuel_name']: 0.0;?></td>
<td></td>
</tr>
<tr class="on">
<td class="name"><?php echo __('発熱量'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td>';
		echo (isset($EnergyInput['Hl']))? $EnergyInput['Hl']: 0.0;	
	}else{
		echo '<td style="text-align:center">-';
	}
?></td>

<td style="text-align:center">kJ/m<sup>3</sup></td>
</tr>
<tr class="off">
<td class="name"><?php echo __('燃料流量'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td>';
		echo (isset($EnergyInput['Vf']))? $EnergyInput['Vf']: 0.0;	
	}else{
		echo '<td style="text-align:center">-';
	}
?></td>

<td style="text-align:center">m<sup>3</sup>/t、kg/t</td>
</tr>
<tr class="on">
<td class="name"><?php echo __('空気流量'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td>';
		echo (isset($EnergyInput['Vair']))? $EnergyInput['Vair']: 0.0;	
	}else{
		echo '<td style="text-align:center">-';
	}
?></td>

<td style="text-align:center">m<sup>3</sup>/t</td>
</tr>
<tr class="off">
<td class="name"><?php echo __('リジェネの有無'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td style="text-align:center">';
		echo (isset($EnergyInput['Regene']))? $EnergyInput['Regene']: '';	
	}else{
		echo '<td style="text-align:center">-';
	}
?></td>

<td></td>
</tr>
<tr class="on">
<td class="name"><?php echo __('炉入口空気温度'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td>';
		echo (isset($EnergyInput['Ta2']))? $EnergyInput['Ta2']: 0.0;	
	}else{
		echo '<td style="text-align:center">-';
	}
?></td>

<td style="text-align:center">℃</td>
</tr>
<tr class="off">
<td class="name"><?php echo __('炉出口排ガス温度'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td>';
		echo (isset($EnergyInput['Twg1']))? $EnergyInput['Twg1']: 0.0;	
	}else{
		echo '<td style="text-align:center">-';
	}
?></td>

<td style="text-align:center">℃</td>
</tr>
</tr>
<tr class="off">
<td class="name"><?php echo __('炉出口排ガス温度'); ?></td>
<?php if (isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1 && isset($EnergyInput['Q5']) && $EnergyInput['Q5']==1): ?>
<td>
	<?php 
		echo (isset($EnergyInput['Te']))? $EnergyInput['Te']: 0.0;
	?>
</td>
<?php else: ?>
<td style="text-align:center">
	<?php 
		echo '-';
	?>
</td>
<?php endif; ?>
<td style="text-align:center">℃</td>
</tr>
<!--<tr>
<td class="name">排ガス温度（改修装置出口）</td>
<td>Te</td>
<td>℃</td>
</tr>-->
<tr class="on">
<td class="name"><?php echo __('排ガス酸素濃度'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td>';
		echo (isset($EnergyInput['Fg_O2D']))? $EnergyInput['Fg_O2D']: 0.0;	
	}else{
		echo '<td style="text-align:center">-';
	}
?></td>

<td style="text-align:center">%</td>
</tr>
</tbody></table>
<div class="clr"></div>
<?php echo $this->Form->create('out', array(
		'id' => 'OutForm',
		'type' => 'post',
		'url' => array('controller' => 'out', 'action' => 'out', $chk['UserResult']['id']),
		'inputDefaults' => array(
        	'label' => true,
        	'div' => true
    	)
	)); 
?>
<?php echo $this->Form->end();?>



<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_po_0(){	
	document.forms['OutForm'].submit();	
}
</script>
<!-- ok & back -->
<div class="btn_ok"><p><a href="#" onClick="submit_frm_po_0();"><?php echo __('次へ'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "Result", "action" =>"index")); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

</div>

