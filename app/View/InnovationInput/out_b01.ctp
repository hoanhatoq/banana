<div class="content_box">
<h2><?php echo __('省エネルギー対策処理(燃焼炉) 結果'); ?></h2>

<div class="btn_pdf"><p><a href="<?php echo $this->Html->url(array('controller' => 'innovation_input', 'action' =>'pdfB01')); ?>" onclick="return confirm(<?php echo __('PDFファイルをダウンロードします'); ?>)"><?php echo __('出力'); ?></a></p></div>
<div class="clr"></div>

<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" ?>

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
		echo isset($InnovationInput['out_b01']['ROSYU']) ? $InnovationInput['out_b01']['ROSYU']: '';
	?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('炉名'); ?></td>
<td style="text-align:center">
	<?php echo (isset($InnovationInput['TPE_name'])) ? $InnovationInput['TPE_name'] : '' ; ?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('型式'); ?></td>
<td style="text-align:center">
	<?php echo (isset($InnovationInput['Type'])) ? $InnovationInput['Type'] : '' ; ?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('加熱量'); ?></td>
<td>
	<?php echo (isset($InnovationInput['TPH'])) ? $InnovationInput['TPH'] : 0 ; ?>
</td>
<td style="text-align:center">t/h</td>
</tr>
<tr>
<td class="name"><?php echo __('被熱物入口温度'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Tp1'])) ? $InnovationInput['Tp1'] : 0 ; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('被熱物出口温度'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Tp2'])) ? $InnovationInput['Tp2'] : 0 ; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('酸化減量'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Mloss'])) ? $InnovationInput['Mloss'] : 0 ; ?>
</td>
<td style="text-align:center">Kg/t</td>
</tr>
<tr>
<td class="name"><?php echo __('燃料名称'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Fuel_name'])) ? $InnovationInput['Fuel_name'] : '' ; ?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('発熱量'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Hl'])) ? $InnovationInput['Hl'] : 0 ; ?>
</td>
<td style="text-align:center">
	<?php
		echo (isset($InnovationInput['Q2']) && $InnovationInput['Q2']=='C') ?
				'm<sup>3</sup>/t' : 'Kg/t';
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('燃料流量'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Vf'])) ? $InnovationInput['Vf'] : 0 ; ?>
</td>
<td style="text-align:center">m<sup>3</sup>/t</td>
</tr>
<tr>
<td class="name"><?php echo __('空気流量'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Vme'])) ? $InnovationInput['Vme'] : 0 ; ?>
</td>
<td style="text-align:center">m<sup>3</sup>/t</td>
</tr>
<tr>
<td class="name"><?php echo __('リジェネの有無'); ?></td>
<td>
	<?php
		echo $InnovationInput['out_b01']['regene'];
	?>
</td>
<td></td>
</tr>
<tr>
<td class="name"><?php echo __('炉入口空気温度'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Ta2'])) ? $InnovationInput['Ta2'] : 0 ; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス温度'); ?></td>
<td>
	<?php echo $InnovationInput['out_b01']['Texaust']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス酸素濃度'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Fg_O2'])) ? $InnovationInput['Fg_O2'] : 0 ; ?>
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
	<?php echo (isset($InnovationInput['Eh_fuel'])) ? $InnovationInput['Eh_fuel'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Eh_fuel_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('付着物入熱'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Eh_waste'])) ? $InnovationInput['Eh_waste'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Eh_waste_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('燃料入口顕熱'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Es_fuel'])) ? $InnovationInput['Es_fuel'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Es_fuel_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('空気入口顕熱'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Es_air'])) ? $InnovationInput['Es_air'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Es_air_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('蒸気霧化材顕熱'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Es_atmize'])) ? $InnovationInput['Es_atmize'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Es_atmize_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('反応熱'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Ereact'])) ? $InnovationInput['Ereact'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Ereact_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('侵入空気顕熱'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Es_infilt'])) ? $InnovationInput['Es_infilt'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Es_infilt_ratio'];
	?>
</td>
</tr>
<tr>
<td class="total"></td>
<td class="total">
	<?php 
		echo $InnovationInput['out_b01']['Total_in'];
	?>
</td>
<td class="total">
	<?php 
		echo $InnovationInput['out_b01']['Total_in_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('有効熱'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Eeffect'])) ? $InnovationInput['Eeffect'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Eeffect_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_jig_t'])) ? $InnovationInput['El_jig_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['El_jig_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('酸化物顕熱損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Es_oxid'])) ? $InnovationInput['Es_oxid'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Es_oxid_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('排ガス損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Eexhaust'])) ? $InnovationInput['Eexhaust'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Eexhaust_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('雰囲気ガス損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Es_atm'])) ? $InnovationInput['Es_atm'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Es_atm_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('炉体放散損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_wall_t'])) ? $InnovationInput['El_wall_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['El_wall_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('開口部損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_opening_t'])) ? $InnovationInput['El_opening_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['El_opening_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('部品熱伝導損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_parts_t'])) ? $InnovationInput['El_parts_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['El_parts_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('冷却水損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_cw_t'])) ? $InnovationInput['El_cw_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['El_cw_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('放炎損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_blowout_t'])) ? $InnovationInput['El_blowout_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['El_blowout_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('蓄熱損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_storage_t'])) ? $InnovationInput['El_storage_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['El_storage_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('その他損失'); ?></td>
<td>
	<?php echo $InnovationInput['out_b01']['El_other']; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['El_other_ratio'];
	?>
</td>
</tr>
<tr>
<td class="total"></td>
<td class="total">
	<?php echo $InnovationInput['out_b01']['Total_out']; ?>
</td>
<td class="total">
	<?php 
		echo $InnovationInput['out_b01']['Total_out_ratio'];
	?>
</td>
</tr>
</table>
<div class="clr"></div>


<?php if(isset($InnovationInput['page_b03'])) : ?>
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
	<?php echo (isset($InnovationInput['ETA_R1'])) ? $InnovationInput['ETA_R1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b03']['ETA_R2']; ?>
</td>
<td style="text-align:center">%</td>
</tr>
<tr>
<td class="name"><?php echo __('予熱温度'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Ta2'])) ? $InnovationInput['Ta2'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b03']['Ta3']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>

<?php if(isset($InnovationInput['page_b04'])) : ?>
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
	<?php echo (isset($InnovationInput['El_wall1'])) ? $InnovationInput['El_wall1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b04']['El_wall2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
<tr>
<td class="name"><?php echo __('開口部損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_opening1'])) ? $InnovationInput['El_opening1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b04']['El_opening2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
<tr>
<td class="name"><?php echo __('冷却損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_cw1'])) ? $InnovationInput['El_cw1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b04']['El_cw2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
<tr>
<td class="name"><?php echo __('蓄熱損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_storage1'])) ? $InnovationInput['El_storage1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b04']['El_storage2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>

<?php if(isset($InnovationInput['page_b05'])) : ?>
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
	<?php 
		if(isset($InnovationInput['Mj'])){
			if(is_array($InnovationInput['Mj']) && isset($InnovationInput['Mj'][1])){
				echo $InnovationInput['Mj'][1];	
			}
			if(!is_array($InnovationInput['Mj'])){
				echo $InnovationInput['Mj'];	
			}
		} else{
			echo 0.0;
		}
	?>
</td>
<td>
	<?php echo $InnovationInput['page_b05']['Mj2']; ?>
</td>
<td style="text-align:center">kg/t</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ入口温度'); ?></td>
<td>
	<?php 
		if(isset($InnovationInput['Tj11'])){
			if(is_array($InnovationInput['Tj11']) && isset($InnovationInput['Tj11'][1])){
				echo $InnovationInput['Tj11'][1];	
			}
			if(!is_array($InnovationInput['Tj11'])){
				echo $InnovationInput['Tj11'];	
			}
		} else{
			echo 0.0;
		}
	?>
</td>
<td>
	<?php echo $InnovationInput['page_b05']['Tj12']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ出口温度'); ?></td>
<td>
	<?php 
		if(isset($InnovationInput['Tj21'])){
			if(is_array($InnovationInput['Tj21']) && isset($InnovationInput['Tj21'][1])){
				echo $InnovationInput['Tj21'][1];	
			}
			if(!is_array($InnovationInput['Tj21'])){
				echo $InnovationInput['Tj21'];	
			}
		} else{
			echo 0.0;
		}
	?>
</td>
<td>
	<?php echo $InnovationInput['page_b05']['Tj22']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>


<?php if(isset($InnovationInput['page_b06'])) : ?>
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
	<?php echo (isset($InnovationInput['Tp1'])) ? $InnovationInput['Tp1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b06']['Tp12']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('出口温度'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Tp2'])) ? $InnovationInput['Tp2'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b06']['Tp22']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('材料必要熱量'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Eeffect1'])) ? $InnovationInput['Eeffect1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b06']['Eeffect2']; ?>
</td>
<td style="text-align:center">kJ/t</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>

<?php if(isset($InnovationInput['page_b07'])) : ?>
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
	<?php echo (isset($InnovationInput['Fg_O2d1'])) ? $InnovationInput['Fg_O2d1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['page_b07']['Fg_O2d2']; ?>
</td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('空気比'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Mhyp1'])) ? $InnovationInput['Mhyp1'] : 0 ; ?>
</td>
<td>
	<?php echo $InnovationInput['Mhyp2']; ?>
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
		echo $InnovationInput['out_b01']['ETA1_b03'];
	?>
	%
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['ETA2_b03'];
	?>
	%
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Save_energy_ratio_b03'];
	?>
	%
</td>
</tr>
<tr>
<td class="name"><?php echo __('炉体損失熱の改善検討'); ?></td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Eh_fuel_b04'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Eh_fuel2_b04'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Save_energy_ratio_b04'];
	?>
	%
</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ、トレー必要熱の改善'); ?></td>
<td>
	<?php
		echo $InnovationInput['out_b01']['EF1_b05'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['EF2_b05'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Save_energy_ratio_b05'];
	?>
	%
</td>
</tr>
<tr>
<td class="name"><?php echo __('材料予熱効果の検討'); ?></td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Eh_fuel_b06'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Eh_fuel2_b06'];
	?>
	kJ/t
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Save_energy_ratio_b06'];
	?>
	%
</td>
</tr>
<tr>
<td class="name"><?php echo __('空気比の改善検討実行'); ?></td>
<td>
	<?php
		echo $InnovationInput['out_b01']['ETA1_b07'];
	?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['ETA2_b07'] ;
	?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b01']['Save_energy_ratio_b07'];
	?>
	%
</td>
</tr>
</table>
<div class="clr"></div>



<div class="btn_out"><p><a id="save02" href="#" onclick="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "save02", "action" => 'index')); ?>','','scrollbars=yes,Width=560,Height=500');w.focus();"><?php echo __('保存して終了'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "innovation_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>
</div>
