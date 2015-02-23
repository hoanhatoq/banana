<div class="content_box">
<h2><?php echo __('出力'); ?></h2>
<div class="btn_pdf"><p><a><?php echo $this->Html->link(__('出力'), array('controller' =>'out','action' => 'out_06_pdf', $chk['UserResult']['id']),array(),__('PDFファイルをダウンロードします')); ?></a></p></div>
<div class="clr"></div>


<h3 class="second02"><?php echo __('出力表6: Thermal energy balance without heat excanger（ハイブリッド）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('出力値（kJ/t）'); ?></label></th>
<th class="unit"><label><?php echo __('比率（%）'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('燃料入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eh_fuel']))? $EnergyInput['Eh_fuel'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Eh_fuel_ratio']))? $EnergyInput['out_06']['Eh_fuel_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('電気加熱入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eh_el_accept']))? $EnergyInput['Eh_el_accept'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Eh_el_accept_ratio']))? $EnergyInput['out_06']['Eh_el_accept_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('付着物入熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eh_waste']))? $EnergyInput['Eh_waste'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Eh_waste_ratio']))? $EnergyInput['out_06']['Eh_waste_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('燃料入口顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_fuel']))? $EnergyInput['Es_fuel'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Es_fuel_ratio']))? $EnergyInput['out_06']['Es_fuel_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('空気入口顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_air']))? $EnergyInput['Es_air'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Es_air_ratio']))? $EnergyInput['out_06']['Es_air_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('回収熱'); ?></td>
<td><?php echo (isset($EnergyInput['Erecovery']))? $EnergyInput['Erecovery'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Erecovery_ratio']))? $EnergyInput['out_06']['Erecovery_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('蒸気霧化材顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_atmize']))? $EnergyInput['Es_atmize'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Es_atmize_ratio']))? $EnergyInput['out_06']['Es_atmize_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('反応熱'); ?></td>
<td><?php echo (isset($EnergyInput['Ereact']))? $EnergyInput['Ereact'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Ereact_ratio']))? $EnergyInput['out_06']['Ereact_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('侵入空気顕熱'); ?></td>
<td><?php echo (isset($EnergyInput['Es_infilt']))? $EnergyInput['Es_infilt'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Es_infilt_ratio']))? $EnergyInput['out_06']['Es_infilt_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name total"><?php echo __('Thermal energy input'); ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_06']['Total_in']))? $EnergyInput['out_06']['Total_in'] : 0.0 ;?></td>
<td class="total"><?php echo (isset($EnergyInput['out_06']['Total_in_ratio']))? $EnergyInput['out_06']['Total_in_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('有効熱'); ?></td>
<td><?php echo (isset($EnergyInput['Eeffect']))? $EnergyInput['Eeffect'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Eeffect_ratio']))? $EnergyInput['out_06']['Eeffect_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_jig_t']))? $EnergyInput['El_jig_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_jig_t_ratio']))? $EnergyInput['out_06']['El_jig_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('酸化物顕熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['Es_oxid']))? $EnergyInput['Es_oxid'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Es_oxid_ratio']))? $EnergyInput['out_06']['Es_oxid_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス損失'); ?></td>
<td><?php echo (isset($EnergyInput['Eexhaust_hc']))? $EnergyInput['Eexhaust_hc'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Eexhaust_hc_ratio']))? $EnergyInput['out_06']['Eexhaust_hc_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス損失'); ?></td>
<td><?php echo (isset($EnergyInput['Es_atm']))? $EnergyInput['Es_atm'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['Es_atm_ratio']))? $EnergyInput['out_06']['Es_atm_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('炉体放散損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_wall_t']))? $EnergyInput['El_wall_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_wall_t_ratio']))? $EnergyInput['out_06']['El_wall_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('開口部損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_opening_t']))? $EnergyInput['El_opening_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_opening_t_ratio']))? $EnergyInput['out_06']['El_opening_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('部品熱伝導損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_parts_t']))? $EnergyInput['El_parts_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_parts_t_ratio']))? $EnergyInput['out_06']['El_parts_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('冷却水損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_cw_t']))? $EnergyInput['El_cw_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_cw_t_ratio']))? $EnergyInput['out_06']['El_cw_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('放炎損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_blowout_t']))? $EnergyInput['El_blowout_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_blowout_t_ratio']))? $EnergyInput['out_06']['El_blowout_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('蓄熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_storage_t']))? $EnergyInput['El_storage_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_storage_t_ratio']))? $EnergyInput['out_06']['El_storage_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('その他熱損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_ot_t']))? $EnergyInput['El_ot_t'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_ot_t_ratio']))? $EnergyInput['out_06']['El_ot_t_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('周波数変換損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_fre']))? $EnergyInput['El_fre'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_fre_ratio']))? $EnergyInput['out_06']['El_fre_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('コイル損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_coil']))? $EnergyInput['El_coil'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_coil_ratio']))? $EnergyInput['out_06']['El_coil_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('トランス損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_trans']))? $EnergyInput['El_trans'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_trans_ratio']))? $EnergyInput['out_06']['El_trans_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('電極損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_terminal']))? $EnergyInput['El_terminal'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_terminal_ratio']))? $EnergyInput['out_06']['El_terminal_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('コイル損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_con']))? $EnergyInput['El_con'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_con_ratio']))? $EnergyInput['out_06']['El_con_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('配線損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_wir']))? $EnergyInput['El_wir'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_wir_ratio']))? $EnergyInput['out_06']['El_wir_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('制御損失'); ?></td>
<td><?php echo (isset($EnergyInput['El_cl']))? $EnergyInput['El_cl'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_cl_ratio']))? $EnergyInput['out_06']['El_cl_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name"><?php echo __('その他損失'); ?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_other']))? $EnergyInput['out_06']['El_other'] : 0.0 ;?></td>
<td><?php echo (isset($EnergyInput['out_06']['El_other_ratio']))? $EnergyInput['out_06']['El_other_ratio'] : 0.0 ;?></td>
</tr>
<tr>
<td class="name total"><?php echo __('Thermal energy output'); ?></td>
<td class="total"><?php echo (isset($EnergyInput['out_06']['Total_out']))? $EnergyInput['out_06']['Total_out'] : 0.0 ;?></td>
<td class="total"><?php echo (isset($EnergyInput['out_06']['Total_out_ratio']))? $EnergyInput['out_06']['Total_out_ratio'] : 0.0 ;?></td>
</tr>
</table>
<div class="clr"></div>
<?php echo $this->Form->create('out', array(
		'id' => 'OutForm',
		'type' => 'post',
		'url' => array('controller' => 'out', 'action' => 'out_06', $chk['UserResult']['id']),
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
<div class="btn_back"><p><a>
<?php
$IND1 = $EnergyInput['IND1']; 
$ibd1 = (isset($EnergyInput['Ibd1']))? $EnergyInput['Ibd1']: ''; 
$ibd2 = (isset($EnergyInput['Ibd2']))? $EnergyInput['Ibd2']: ''; 
$ibd3 = (isset($EnergyInput['Ibd3']))? $EnergyInput['Ibd3']: '';  

					if ($ibd2 == 1 && $IND1 == 2) {
						echo $this->Html->link(__('戻る'),array( 'controller' => 'out','action' => 'out_05', $chk['UserResult']['id']));
					}
					elseif ($ibd3 == 1 && $IND1 == 1) {
						echo $this->Html->link(__('戻る'),array( 'controller' => 'out','action' => 'out_04', $chk['UserResult']['id']));
					}
					elseif ($ibd1 == 1) {
						echo $this->Html->link(__('戻る'),array( 'controller' => 'out','action' => 'out_03', $chk['UserResult']['id']));
					}
					elseif (($ibd==3) ||($ibd==2) || ($ibd2 == 1 && $IND1 != 1)) {
						echo $this->Html->link(__('戻る'),array( 'controller' => 'out','action' => 'out', $chk['UserResult']['id']));
					}
					elseif (($ibd2 == 1 && $IND1 == 1)) {
						echo $this->Html->link(__('戻る'),array( 'controller' => 'Result','action' => 'index'));
					}
				
?>
</a></p></div>
<div class="clr"></div>
</div>