<div class="content_box">
<h2><?php echo __('省エネルギー対策処理(電気炉) 結果'); ?></h2>

<div class="btn_pdf"><p><a><?php echo $this->Html->link(__('出力'), array('controller' =>'out','action' => 'out_b01_pdf', $chk['UserResult']['id']),array(),__('PDFファイルをダウンロードします')); ?></a></p></div>
<div class="clr"></div>
<input type="hidden" name="actSave" value="out_b02" id="actSave" class="select">

<h3 class="second02"><?php echo __('出力表1:代表的入力条件の表示出力'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('出力値'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>

</tr>
<tr>
<td class="name"><?php echo __('炉の種類'); ?></td>
<td style="text-align:center">
	<?php 
		echo isset($data['out_b01']['ROSYU']) ? $data['out_b01']['ROSYU']: '';
	?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('炉名'); ?></td>
<td style="text-align:center">
	<?php echo (isset($data['TPE_name'])) ? $data['TPE_name'] : '' ; ?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('型式'); ?></td>
<td style="text-align:center">
	<?php echo (isset($data['Type'])) ? $data['Type'] : '' ; ?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('加熱量'); ?></td>
<td>
	<?php echo (isset($data['TPH'])) ? $data['TPH'] : 0 ; ?>
</td>
<td style="text-align:center">t/h</td>
</tr>
<tr>
<td class="name"><?php echo __('被熱物入口温度'); ?></td>
<td>
	<?php echo (isset($data['Tp1'])) ? $data['Tp1'] : 0 ; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('被熱物出口温度'); ?></td>
<td>
	<?php echo (isset($data['Tp2'])) ? $data['Tp2'] : 0 ; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('酸化減量'); ?></td>
<td>
	<?php echo (isset($data['Mloss'])) ? $data['Mloss'] : 0 ; ?>
</td>
<td style="text-align:center">Kg/t</td>
</tr>
<tr>
<td class="name"><?php echo __('燃料名称'); ?></td>
<td>
	<?php echo (isset($data['Fuel_name'])) ? $data['Fuel_name'] : '' ; ?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('発熱量'); ?></td>
<td>
	<?php echo (isset($data['Hl'])) ? $data['Hl'] : 0 ; ?>
</td>
<td style="text-align:center">kJ/m<sup>3</sup></td>
</tr>
<tr>
<td class="name"><?php echo __('燃料流量'); ?></td>
<td>
	<?php echo (isset($data['Vf'])) ? $data['Vf'] : 0 ; ?>
</td>
<td style="text-align:center">m<sup>3</sup>/t</td>
</tr>
<tr>
<td class="name"><?php echo __('空気流量'); ?></td>
<td>
	<?php echo (isset($data['Vme'])) ? $data['Vme'] : 0 ; ?>
</td>
<td style="text-align:center">m<sup>3</sup>/t</td>
</tr>
<tr>
<td class="name"><?php echo __('リジェネの有無'); ?></td>
<td>
	<?php
		echo $data['out_b01']['regene'];
	?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('炉入口空気温度'); ?></td>
<td>
	<?php echo (isset($data['Ta2'])) ? $data['Ta2'] : 0 ; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス温度'); ?></td>
<td>
	<?php echo $data['out_b01']['Texaust']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス酸素濃度'); ?></td>
<td>
	<?php echo (isset($data['Fg_O2'])) ? $data['Fg_O2'] : 0 ; ?>
</td>
<td style="text-align:center">%</td>
</tr>
</table>
<div class="clr"></div>



<h3 class="second02"><?php echo __('出力表5: Thermal energy balance with heat excanger（Combustion furnace）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('出力値(kJ/t)'); ?></label></th>
<th><label><?php echo __('比率(%)'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('燃料入熱'); ?></td>
<td>
	<?php echo (isset($data['Eh_fuel'])) ? $data['Eh_fuel'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Eh_fuel_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('付着物入熱'); ?></td>
<td>
	<?php echo (isset($data['Eh_waste'])) ? $data['Eh_waste'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Eh_waste_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('燃料入口顕熱'); ?></td>
<td>
	<?php echo (isset($data['Es_fuel'])) ? $data['Es_fuel'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Es_fuel_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('空気入口顕熱'); ?></td>
<td>
	<?php echo (isset($data['Es_air'])) ? $data['Es_air'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Es_air_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('蒸気霧化材顕熱'); ?></td>
<td>
	<?php echo (isset($data['Es_atmize'])) ? $data['Es_atmize'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Es_atmize_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('反応熱'); ?></td>
<td>
	<?php echo (isset($data['Ereact'])) ? $data['Ereact'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Ereact_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('侵入空気顕熱'); ?></td>
<td>
	<?php echo (isset($data['Es_infilt'])) ? $data['Es_infilt'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Es_infilt_ratio'];
	?>
</td>
</tr>
<tr>
<td class="total"></td>
<td class="total">
	<?php 
		echo $data['out_b01']['Total_in'];
	?>
</td>
<td class="total">
	<?php 
		echo $data['out_b01']['Total_in_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('有効熱'); ?></td>
<td>
	<?php echo (isset($data['Eeffect'])) ? $data['Eeffect'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Eeffect_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ損失'); ?></td>
<td>
	<?php echo (isset($data['El_jig_t'])) ? $data['El_jig_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['El_jig_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('酸化物顕熱損失'); ?></td>
<td>
	<?php echo (isset($data['Es_oxid'])) ? $data['Es_oxid'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Es_oxid_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス損失'); ?></td>
<td>
	<?php echo (isset($data['Eexhaust'])) ? $data['Eexhaust'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Eexhaust_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス損失'); ?></td>
<td>
	<?php echo (isset($data['Es_atm'])) ? $data['Es_atm'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['Es_atm_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('炉体放散損失'); ?></td>
<td>
	<?php echo (isset($data['El_wall_t'])) ? $data['El_wall_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['El_wall_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('開口部損失'); ?></td>
<td>
	<?php echo (isset($data['El_opening_t'])) ? $data['El_opening_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['El_opening_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('部品熱伝導損失'); ?></td>
<td>
	<?php echo (isset($data['El_parts_t'])) ? $data['El_parts_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['El_parts_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('冷却水損失'); ?></td>
<td>
	<?php echo (isset($data['El_cw_t'])) ? $data['El_cw_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['El_cw_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('放炎損失'); ?></td>
<td>
	<?php echo (isset($data['El_blowout_t'])) ? $data['El_blowout_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['El_blowout_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('蓄熱損失'); ?></td>
<td>
	<?php echo (isset($data['El_storage_t'])) ? $data['El_storage_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['El_storage_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('その他損失'); ?></td>
<td>
	<?php echo $data['out_b01']['El_other']; ?>
</td>
<td>
	<?php
		echo $data['out_b01']['El_other_ratio'];
	?>
</td>
</tr>
<tr>
<td class="total"></td>
<td class="total">
	<?php echo $data['out_b01']['Total_out']; ?>
</td>
<td class="total">
	<?php 
		echo $data['out_b01']['Total_out_ratio'];
	?>
</td>
</tr>
</table>
<div class="clr"></div>


<?php if(isset($data['page_b03'])): ?>
<h3 class="second02"><?php echo __('排熱回収率改善（画面２で選ばれた時表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('改善後の排熱回収率'); ?></td>
<td>
	<?php echo (isset($data['ETA_R1'])) ? $data['ETA_R1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b03']['ETA_R2']; ?>
</td>
<td style="text-align:center">%</td>
</tr>
<tr>
<td class="name"><?php echo __('予熱温度'); ?></td>
<td>
	<?php echo (isset($data['Ta2'])) ? $data['Ta2'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b03']['Ta3']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>

<?php if(isset($data['page_b04'])): ?>
<h3 class="second02"><?php echo __('炉体損失熱改善（画面２で選ばれた時表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('炉体放散損失'); ?></td>
<td>
	<?php echo (isset($data['El_wall1'])) ? $data['El_wall1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b04']['El_wall2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
<tr>
<td class="name"><?php echo __('開口部損失'); ?></td>
<td>
	<?php echo (isset($data['El_opening1'])) ? $data['El_opening1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b04']['El_opening2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
<tr>
<td class="name"><?php echo __('冷却損失'); ?></td>
<td>
	<?php echo (isset($data['El_cw1'])) ? $data['El_cw1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b04']['El_cw2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
<tr>
<td class="name"><?php echo __('蓄熱損失'); ?></td>
<td>
	<?php echo (isset($data['El_storage1'])) ? $data['El_storage1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b04']['El_storage2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>

<?php if(isset($data['page_b05'])): ?>
<h3 class="second02"><?php echo __('ジグ・トレー改善（画面２で選ばれた時表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('ジグ重量'); ?></td>
<td>
	<?php echo (isset($data['Mj'][1])) ? $data['Mj'][1] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b05']['Mj2']; ?>
</td>
<td style="text-align:center">kg/t</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ入口温度'); ?></td>
<td>
	<?php echo (isset($data['Tj11'][1])) ? $data['Tj11'][1] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b05']['Tj12']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ出口温度'); ?></td>
<td>
	<?php echo (isset($data['Tj21'][1])) ? $data['Tj21'][1] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b05']['Tj22']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>


<?php if(isset($data['page_b06'])): ?>
<h3 class="second02"><?php echo __('材料予熱改善（画面２で選ばれた時表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('入口温度'); ?></td>
<td>
	<?php echo (isset($data['Tp1'])) ? $data['Tp1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b06']['Tp12']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('出口温度'); ?></td>
<td>
	<?php echo (isset($data['Tp2'])) ? $data['Tp2'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b06']['Tp22']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('材料必要熱量'); ?></td>
<td>
	<?php echo (isset($data['Eeffect1'])) ? $data['Eeffect1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b06']['Eeffect2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>

<?php if(isset($data['page_b07'])): ?>
<h3 class="second02"><?php echo __('空気比改善（画面２で選ばれた時表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('排ガス酸素濃度'); ?></td>
<td>
	<?php echo (isset($data['Fg_O2d1'])) ? $data['Fg_O2d1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b07']['Fg_O2d2']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('空気比'); ?></td>
<td>
	<?php echo (isset($data['Mhyp1'])) ? $data['Mhyp1'] : 0 ; ?>
</td>
<td>
	<?php echo $data['page_b07']['Mhyp2']; ?>
</td>
<td style="text-align:center">（－）</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>


<h3 class="second02"><?php echo __('改善検討まとめ'); ?></h3>
<table class="resultTable tbl">
<tr>
<th><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状値'); ?></label></th>
<th><label><?php echo __('改善値'); ?></label></th>
<th><label><?php echo __('省エネ率'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('排熱回収率の改善検討'); ?></td>
<td>
	<?php
		echo $data['out_b01']['ETA1_b03'];
	?>
	%
</td>
<td>
	<?php
		echo $data['out_b01']['ETA2_b03'];
	?>
	%
</td>
<td>
	<?php
		echo $data['out_b01']['Save_energy_ratio_b03'];
	?>
	%
</td>
</tr>
<tr>
<td class="name"><?php echo __('炉体損失熱の改善検討'); ?></td>
<td>
	<?php
		echo $data['out_b01']['Eh_fuel_b04'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $data['out_b01']['Eh_fuel2_b04'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $data['out_b01']['Save_energy_ratio_b04'];
	?>
	%
</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ、トレー必要熱の改善'); ?></td>
<td>
	<?php
		echo $data['out_b01']['EF1_b05'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $data['out_b01']['EF2_b05'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $data['out_b01']['Save_energy_ratio_b05'];
	?>
	%
</td>
</tr>
<tr>
<td class="name"><?php echo __('材料予熱効果の検討'); ?></td>
<td>
	<?php
		echo $data['out_b01']['Eh_fuel_b06'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $data['out_b01']['Eh_fuel2_b06'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $data['out_b01']['Save_energy_ratio_b06'];
	?>
	%
</td>
</tr>
<tr>
<td class="name"><?php echo __('空気比の改善検討実行'); ?></td>
<td>
	<?php
		echo $data['out_b01']['ETA1_b07'];
	?>
	(-)
</td>
<td>
	<?php
		echo $data['out_b01']['ETA2_b07'] ;
	?>
	(-)
</td>
<td>
	<?php
		echo $data['out_b01']['Save_energy_ratio_b07'];
	?>
	%
</td>
</tr>
</table>
<div class="clr"></div>



<div class="btn_back"><p><a><?php echo $this->Html->link(__('戻る'),array( 'controller' => 'Result','action' => 'index')); ?></a></p></div>


<div class="clr"></div>


</div>

