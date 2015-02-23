<div class="content_box">
<h2><?php echo __('出力'); ?></h2>


<div class="btn_pdf"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"pdf/out_07")); ?>" onclick="return confirm('<?php echo __('PDFファイルをダウンロードします'); ?>')"><?php echo __('出力'); ?></a></p></div>
<div class="clr"></div>

<h3 class="second02"><?php echo __('出力表7: Thermal energy balance without heat excanger（Combustion　furnace）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('出力値'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('燃料入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eh_fuel']))? $EnergyInput['Eh_fuel'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Eh_fuel_ratio']))? $EnergyInput['out_07']['Eh_fuel_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('付着物入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eh_waste']))? $EnergyInput['Eh_waste'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Eh_waste_ratio']))? $EnergyInput['out_07']['Eh_waste_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('燃料入口顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_fuel']))? $EnergyInput['Es_fuel'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Es_fuel_ratio']))? $EnergyInput['out_07']['Es_fuel_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('空気入口顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_air']))? $EnergyInput['Es_air'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Es_air_ratio']))? $EnergyInput['out_07']['Es_air_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('回収熱'); ?></td>
<td><?php echo (isset($EnergyInput['Erecovery']))? $EnergyInput['Erecovery'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Erecovery_ratio']))? $EnergyInput['out_07']['Erecovery_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('蒸気霧化材顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_atmize']))? $EnergyInput['Es_atmize'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Es_atmize_ratio']))? $EnergyInput['out_07']['Es_atmize_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('反応熱'); ?></td>
<td><?php echo (isset($EnergyInput['Ereact']))? $EnergyInput['Ereact'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Ereact_ratio']))? $EnergyInput['out_07']['Ereact_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('侵入空気顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_infilt']))? $EnergyInput['Es_infilt'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Es_infilt_ratio']))? $EnergyInput['out_07']['Es_infilt_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name total"><?php echo __('Thermal energy input'); ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_07']['Total_in']))? $EnergyInput['out_07']['Total_in'] : 0.0 ;?></td>
<td class="total"><?php echo (isset($EnergyInput['out_07']['Total_in_ratio']))? $EnergyInput['out_07']['Total_in_ratio'] : 100 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('有効熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eeffect']))? $EnergyInput['Eeffect'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Eeffect_ratio']))? $EnergyInput['out_07']['Eeffect_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_jig_t']))? $EnergyInput['El_jig_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_jig_t_ratio']))? $EnergyInput['out_07']['El_jig_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('酸化物顕熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['Es_oxid']))? $EnergyInput['Es_oxid'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Es_oxid_ratio']))? $EnergyInput['out_07']['Es_oxid_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス損失'); ?></td>
<td><?php echo (isset($EnergyInput['Eexhaust_hc']))? $EnergyInput['Eexhaust_hc'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Eexhaust_hc_ratio']))? $EnergyInput['out_07']['Eexhaust_hc_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス損失'); ?></td>
<td><?php echo (isset($EnergyInput['Es_atm']))? $EnergyInput['Es_atm'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['Es_atm_ratio']))? $EnergyInput['out_07']['Es_atm_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('炉体放散損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_wall_t']))? $EnergyInput['El_wall_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_wall_t_ratio']))? $EnergyInput['out_07']['El_wall_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('開口部損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_opening_t']))? $EnergyInput['El_opening_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_opening_t_ratio']))? $EnergyInput['out_07']['El_opening_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('部品熱伝導損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_parts_t']))? $EnergyInput['El_parts_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_parts_t_ratio']))? $EnergyInput['out_07']['El_parts_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('冷却水損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_cw_t']))? $EnergyInput['El_cw_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_cw_t_ratio']))? $EnergyInput['out_07']['El_cw_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('放炎損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_blowout_t']))? $EnergyInput['El_blowout_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_blowout_t_ratio']))? $EnergyInput['out_07']['El_blowout_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('蓄熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_storage_t']))? $EnergyInput['El_storage_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_storage_t_ratio']))? $EnergyInput['out_07']['El_storage_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('その他熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_ot_t']))? $EnergyInput['El_ot_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_ot_t_ratio']))? $EnergyInput['out_07']['El_ot_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('その他損失'); ?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_other']))? $EnergyInput['out_07']['El_other'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_07']['El_other_ratio']))? $EnergyInput['out_07']['El_other_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name total"><?php echo __('Thermal energy output'); ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_07']['Total_out']))? $EnergyInput['out_07']['Total_out'] : 0.0 ;?></td>
<td class="total"><?php echo (isset($EnergyInput['out_07']['Total_out_ratio']))? $EnergyInput['out_07']['Total_out_ratio'] : 100 ;?></td>
</tr>
</table>
<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'out_07'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<?php echo $this->Form->end();?>

<div class="btn_next"><p><a href="#" onClick="submit_frm_po_07();" ><?php echo __('サンキー図表示'); ?></a></p></div>

<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>" ><?php echo __('戻る'); ?></a></p></div>

<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_po_07(){	
	document.forms['EnergyInputForm'].submit();	
}
</script>
</div>