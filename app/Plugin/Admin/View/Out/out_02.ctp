<div class="content_box">
<h2><?php echo __('出力'); ?></h2>
<div class="btn_pdf"><p><a><?php echo $this->Html->link(__('出力'), array('controller' =>'out','action' => 'out_02_pdf', $chk['UserResult']['id']),array(),__('PDFファイルをダウンロードします')); ?></a></p></div>
<div class="clr"></div>

<h3 class="second02"><?php echo __('出力表２:総合効率シート'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('出力値（kJ/t）'); ?></label></th>
<th class="unit"><label><?php echo __('比率（%）'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('燃料入熱'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td>';
		echo (isset($EnergyInput['Eh_fuel']))? $EnergyInput['Eh_fuel']: 0.0;
		echo '</td>';
		echo '<td>';
		echo (isset($EnergyInput['out_02']['Eh_fuel_ratio']))? $EnergyInput['out_02']['Eh_fuel_ratio'] : 0.0 ;
	}else{
		echo '<td style="text-align:center">-</td>';
		echo '<td style="text-align:center">-</td>';

	}
?>

</tr>
<tr>
<td class="name"><?php echo __('付着物入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eh_waste']))? $EnergyInput['Eh_waste'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eh_waste_ratio']))? $EnergyInput['out_02']['Eh_waste_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス製造入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eu_atm']))? $EnergyInput['Eu_atm'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eu_atm_ratio']))? $EnergyInput['out_02']['Eu_atm_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('燃料換算全電気使用量'); ?></td>
<td><?php echo (isset($EnergyInput['Efe_el']))? $EnergyInput['Efe_el'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Efe_el_ratio']))? $EnergyInput['out_02']['Efe_el_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('燃料入口顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_fuel']))? $EnergyInput['Es_fuel'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Es_fuel_ratio']))? $EnergyInput['out_02']['Es_fuel_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('空気入口顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_air']))? $EnergyInput['Es_air'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Es_air_ratio']))? $EnergyInput['out_02']['Es_air_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('蒸気霧化材顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_atmize']))? $EnergyInput['Es_atmize'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Es_atmize_ratio']))? $EnergyInput['out_02']['Es_atmize_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('反応熱'); ?></td>
<td><?php echo (isset($EnergyInput['Ereact']))? $EnergyInput['Ereact'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Ereact_ratio']))? $EnergyInput['out_02']['Ereact_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('侵入空気顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_infilt']))? $EnergyInput['Es_infilt'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Es_infilt_ratio']))? $EnergyInput['out_02']['Es_infilt_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name total"><?php echo __('Total energy Input'); ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_02']['Total_in']))? $EnergyInput['out_02']['Total_in']: 0.0; ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_02']['Total_in_ratio']))? $EnergyInput['out_02']['Total_in_ratio'] : 100; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('有効熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eeffect']))? $EnergyInput['Eeffect'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eeffect_ratio']))? $EnergyInput['out_02']['Eeffect_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_jig_t']))? $EnergyInput['El_jig_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_jig_t_ratio']))? $EnergyInput['out_02']['El_jig_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('酸化物顕熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['Es_oxid']))? $EnergyInput['Es_oxid'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Es_oxid_ratio']))? $EnergyInput['out_02']['Es_oxid_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス損失'); ?></td>

<?php 
	if(isset($EnergyInput['IND1']) && $EnergyInput['IND1'] != 1){
		echo '<td>';
		echo (isset($EnergyInput['Eexhaust']))? $EnergyInput['Eexhaust']: 0.0;
		echo '</td>';
		echo '<td>';
		echo (isset($EnergyInput['out_02']['Eexhaust_ratio']))? $EnergyInput['out_02']['Eexhaust_ratio'] : 0.0 ;
	}else{
		echo '<td style="text-align:center">-</td>';
		echo '<td style="text-align:center">-</td>';

	}
?>

</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス損失'); ?></td>
<td><?php echo (isset($EnergyInput['Es_atm']))? $EnergyInput['Es_atm'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Es_atm_ratio']))? $EnergyInput['out_02']['Es_atm_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('炉体放散損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_wall_t']))? $EnergyInput['El_wall_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_wall_t_ratio']))? $EnergyInput['out_02']['El_wall_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('開口部損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_opening_t']))? $EnergyInput['El_opening_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_opening_t_ratio']))? $EnergyInput['out_02']['El_opening_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('部品熱伝導損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_parts_t']))? $EnergyInput['El_parts_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_parts_t_ratio']))? $EnergyInput['out_02']['El_parts_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('冷却水損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_cw_t']))? $EnergyInput['El_cw_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_cw_t_ratio']))? $EnergyInput['out_02']['El_cw_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('放炎損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_blowout_t']))? $EnergyInput['El_blowout_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_blowout_t_ratio']))? $EnergyInput['out_02']['El_blowout_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('蓄熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_storage_t']))? $EnergyInput['El_storage_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_storage_t_ratio']))? $EnergyInput['out_02']['El_storage_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('その他熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_ot_t']))? $EnergyInput['El_ot_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_ot_t_ratio']))? $EnergyInput['out_02']['El_ot_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('その他損失（残余項）'); ?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_other']))? $EnergyInput['out_02']['El_other'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_other_ratio']))? $EnergyInput['out_02']['El_other_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('ブロワー電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_blower_t']))? $EnergyInput['Eaux_blower_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eaux_blower_t_ratio']))? $EnergyInput['out_02']['Eaux_blower_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('コンプレッサー電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_comp_t']))? $EnergyInput['Eaux_comp_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eaux_comp_t_ratio']))? $EnergyInput['out_02']['Eaux_comp_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('ポンプ電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_pump_t']))? $EnergyInput['Eaux_pump_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eaux_pump_t_ratio']))? $EnergyInput['out_02']['Eaux_pump_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('駆動電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_power_t']))? $EnergyInput['Eaux_power_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eaux_power_t_ratio']))? $EnergyInput['out_02']['Eaux_power_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('電力損失'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_ot_t']))? $EnergyInput['Eaux_ot_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eaux_ot_t_ratio']))? $EnergyInput['out_02']['Eaux_ot_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('酸素製造電力量'); ?></td>
<td><?php echo (isset($EnergyInput['Eu_oxy']))? $EnergyInput['Eu_oxy'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eu_oxy_ratio']))? $EnergyInput['out_02']['Eu_oxy_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス製造電気入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eu_atm_gen']))? $EnergyInput['Eu_atm_gen'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eu_atm_gen_ratio']))? $EnergyInput['out_02']['Eu_atm_gen_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス製造燃料入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eu_atm']))? $EnergyInput['Eu_atm'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['Eu_atm_out_ratio']))? $EnergyInput['out_02']['Eu_atm_out_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('電気製造損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_eg']))? $EnergyInput['El_eg'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_eg_ratio']))? $EnergyInput['out_02']['El_eg_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('事業所内配電損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_el_site']))? $EnergyInput['El_el_site'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_02']['El_el_site_ratio']))? $EnergyInput['out_02']['El_el_site_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name total"><?php echo __('Total energy output'); ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_02']['Total_out']))? $EnergyInput['out_02']['Total_out'] : 0.0 ;?></td>
<td class="total"><?php echo (isset($EnergyInput['out_02']['Total_out_ratio']))? $EnergyInput['out_02']['Total_out_ratio'] : 100 ;?></td>
</tr>
</table>
<div class="clr"></div>
<?php echo $this->Form->create('out', array(
		'id' => 'OutForm',
		'type' => 'post',
		'url' => array('controller' => 'out', 'action' => 'out_02', $chk['UserResult']['id']),
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
<div class="btn_back"><p><a><?php echo $this->Html->link(__('戻る'),array( 'controller' => 'out','action' => 'out', $chk['UserResult']['id'])); ?></a></p></div>


<div class="clr"></div>


</div>
