<div class="content_box">
<h2><?php echo __('出力'); ?></h2>

<div class="btn_pdf"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" =>"pdf/out_03")); ?>" onclick="return confirm('<?php echo __('PDFファイルをダウンロードします'); ?>')"><?php echo __('出力'); ?></a></p></div>
<div class="clr"></div>

<h3 class="second02"><?php echo __('出力表3:Electrical　balance'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('出力値（kJ/t）'); ?></label></th>
<th class="unit"><label><?php echo __('比率（%）'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('燃料換算全電気使用量'); ?></td>
<td><?php echo (isset($EnergyInput['Efe_el']))? $EnergyInput['Efe_el'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Efe_el_ratio']))? $EnergyInput['out_03']['Efe_el_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name total"><?php echo __('Electrical energy Input'); ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_03']['Total_in']))? $EnergyInput['out_03']['Total_in'] : 0.0 ;?></td>
<td class="total"><?php echo (isset($EnergyInput['out_03']['Total_in_ratio']))? $EnergyInput['out_03']['Total_in_ratio'] : 100 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('電気加熱入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eh_el']))? $EnergyInput['Eh_el'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Eh_el_ratio']))? $EnergyInput['out_03']['Eh_el_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('周波数変換損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_fre']))? $EnergyInput['El_fre'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_fre_ratio']))? $EnergyInput['out_03']['El_fre_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('コイル損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_coil']))? $EnergyInput['El_coil'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_coil_ratio']))? $EnergyInput['out_03']['El_coil_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('トランス損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_trans']))? $EnergyInput['El_trans'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_trans_ratio']))? $EnergyInput['out_03']['El_trans_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('電極損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_terminal']))? $EnergyInput['El_terminal'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_terminal_ratio']))? $EnergyInput['out_03']['El_terminal_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('コイル損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_con']))? $EnergyInput['El_con'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_con_ratio']))? $EnergyInput['out_03']['El_con_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('配線損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_wir']))? $EnergyInput['El_wir'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_wir_ratio']))? $EnergyInput['out_03']['El_wir_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('制御損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_cl']))? $EnergyInput['El_cl'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_cl_ratio']))? $EnergyInput['out_03']['El_cl_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('ブロワー電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_blower_t']))? $EnergyInput['Eaux_blower_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Eaux_blower_t_ratio']))? $EnergyInput['out_03']['Eaux_blower_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('コンプレッサー電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_comp_t']))? $EnergyInput['Eaux_comp_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Eaux_comp_t_ratio']))? $EnergyInput['out_03']['Eaux_comp_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('ポンプ電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_pump_t']))? $EnergyInput['Eaux_pump_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Eaux_pump_t_ratio']))? $EnergyInput['out_03']['Eaux_pump_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('駆動電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_power_t']))? $EnergyInput['Eaux_power_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Eaux_power_t_ratio']))? $EnergyInput['out_03']['Eaux_power_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('その他電力'); ?></td>
<td><?php echo (isset($EnergyInput['Eaux_ot_t']))? $EnergyInput['Eaux_ot_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Eaux_ot_t_ratio']))? $EnergyInput['out_03']['Eaux_ot_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('酸素製造電力量'); ?></td>
<td><?php echo (isset($EnergyInput['Eu_oxy']))? $EnergyInput['Eu_oxy'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Eu_oxy_ratio']))? $EnergyInput['out_03']['Eu_oxy_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス製造電気入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eu_atm_gen']))? $EnergyInput['Eu_atm_gen'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['Eu_atm_gen_ratio']))? $EnergyInput['out_03']['Eu_atm_gen_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('事業所内配電損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_el_site']))? $EnergyInput['El_el_site'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_el_site_ratio']))? $EnergyInput['out_03']['El_el_site_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('電気製造損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_eg']))? $EnergyInput['El_eg'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_03']['El_eg_ratio']))? $EnergyInput['out_03']['El_eg_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name total"><?php echo __('Electrical energy output'); ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_03']['Total_out']))? $EnergyInput['out_03']['Total_out']: 0.0 ;?></td>
<td class="total"><?php echo (isset($EnergyInput['out_03']['Total_out_ratio']))? $EnergyInput['out_03']['Total_out_ratio'] : 100 ;?></td>
</tr>
</table>


<?php echo $this->Form->create('energy_input', array(
		'id' => 'EnergyInputForm',
		'type' => 'post',
		'url' => array('controller' => 'energy_input', 'action' => 'out_03'),
		'inputDefaults' => array(
        	'label' => false,
        	'div' => false
    	)
	)); 
?>

<?php echo $this->Form->end();?>


<div class="btn_ok"><p><a href="#" onClick="submit_frm_po_03();"><?php echo __('次へ'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "energy_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>

<script type="text/javascript"> 
function submit_frm_po_03(){	
	document.forms['EnergyInputForm'].submit();	
}
</script>


</div>