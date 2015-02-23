<div class="content_box">
<h2><?php echo __('省エネルギー対策処理(電気炉) 結果'); ?></h2>



<div class="btn_pdf"><p><a href="<?php echo $this->Html->url(array('controller' => 'innovation_input', 'action' =>'pdfB02')); ?>" onclick="return confirm(<?php echo __('PDFファイルをダウンロードします'); ?>)"><?php echo __('出力'); ?></a></p></div>
<div class="clr"></div>

<input type="hidden" name="saveDraft" value="<?php echo $actionDraft; ?>" ?>

<h3 class="second02"><?php echo __('出力表4: Thermal energy balance（電気炉）'); ?></h3>

<table class="resultTable tbl">
<tr>
<th class="name"><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('出力値(kJ/t)'); ?></label></th>
<th><label><?php echo __('比率(%)'); ?></label></th>
</tr>

<tr>
<td class="name"><?php echo __('電気加熱入熱'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Eh_el_accept'])) ? $InnovationInput['Eh_el_accept'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['Eh_el_accept_ratio'];
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
		echo $InnovationInput['out_b02']['Ereact_ratio'] ;
	?>
</td>
</tr>
<tr>
<td class="total"></td>
<td class="total">
	<?php echo $InnovationInput['out_b02']['Total_in']; ?>
</td>
<td class="total">
	<?php
		echo $InnovationInput['out_b02']['Total_in_ratio'];
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
		echo $InnovationInput['out_b02']['Eeffect_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_jig'][1])) ? $InnovationInput['El_jig'][1] : 0 ; ?>
</td>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_jig_ratio'];
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
		echo $InnovationInput['out_b02']['Es_oxid_ratio'];
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
		echo $InnovationInput['out_b02']['Es_atm_ratio'];
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
		echo $InnovationInput['out_b02']['El_wall_t_ratio'];
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
		echo $InnovationInput['out_b02']['El_opening_t_ratio'];
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
		echo $InnovationInput['out_b02']['El_parts_t_ratio'];
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
		echo $InnovationInput['out_b02']['El_cw_t_ratio'];
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
		echo $InnovationInput['out_b02']['El_blowout_t_ratio'];
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
		echo $InnovationInput['out_b02']['El_storage_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('その他損失'); ?></td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_other'];
	?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_other_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('駆動電力'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Eaux_power_t'])) ? $InnovationInput['Eaux_power_t'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['Eaux_power_t_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('周波数変換損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_fre'])) ? $InnovationInput['El_fre'] : 0 ; ?>
</td>
<td>	
	<?php
		echo $InnovationInput['out_b02']['El_fre_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('コイル損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_coil'])) ? $InnovationInput['El_coil'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_coil_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('トランス損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_trans'])) ? $InnovationInput['El_trans'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_trans_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('電極損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_terminal'])) ? $InnovationInput['El_terminal'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_terminal_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('コイル損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_con'])) ? $InnovationInput['El_con'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_con_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('配線損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_wir'])) ? $InnovationInput['El_wir'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_wir_ratio'];
	?>
</td>
</tr>
<tr>
<td class="name"><?php echo __('制御損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_cl'])) ? $InnovationInput['El_cl'] : 0 ; ?>
</td>
<td>
	<?php
		echo $InnovationInput['out_b02']['El_cl_ratio'];
	?>
</td>
</tr>
<tr>
<td class="total"></td>
<td class="total">
	<?php
		echo $InnovationInput['out_b02']['Total_out'];
	?>
</td>
<td class="total">
	<?php
		echo $InnovationInput['out_b02']['Total_out_ratio'];
	?>
</td>
</tr>
</table>

<div class="clr"></div>


<?php if(isset($InnovationInput['page_b15'])): ?>
<h3 class="second02"><?php echo __('電気損失（画面１１で選ばれた場合表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('周波数変換損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_fre'])) ? $InnovationInput['El_fre'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b15']['El_fre2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('コイル損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_coil'])) ? $InnovationInput['El_coil'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b15']['El_coil2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('トランス損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_trans'])) ? $InnovationInput['El_trans'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b15']['El_trans2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('電極損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_terminal'])) ? $InnovationInput['El_terminal'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b15']['El_terminal2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('コンデンサー損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_con'])) ? $InnovationInput['El_con'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b15']['El_con2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('配線損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_wir'])) ? $InnovationInput['El_wir'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b15']['El_wir2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('制御損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_cl'])) ? $InnovationInput['El_cl'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b15']['El_cl2']; ?></td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>

<?php if(isset($InnovationInput['page_b12'])): ?>
<h3 class="second02"><?php echo __('炉体損失改善（画面１１で選ばれた場合表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('炉体放散損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_wall1'])) ? $InnovationInput['El_wall1'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b12']['El_wall2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('開口部損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_opening1'])) ? $InnovationInput['El_opening1'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b12']['El_opening2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('冷却損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_cw1'])) ? $InnovationInput['El_cw1'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b12']['El_cw2']; ?></td>
</tr>
<tr>
<td class="name"><?php echo __('蓄熱損失'); ?></td>
<td>
	<?php echo (isset($InnovationInput['El_storage1'])) ? $InnovationInput['El_storage1'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b12']['El_storage2']; ?></td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>

<?php if(isset($InnovationInput['page_b13'])): ?>
<h3 class="second02"><?php echo __('ジグ・トレー改善（画面２で選ばれた時表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('ジグ材料名称'); ?></td>
<td></td>
<td></td>
<td></td>
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
<td><?php echo $InnovationInput['page_b13']['Mj2']; ?></td>
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
<td><?php echo $InnovationInput['page_b13']['Tj12']; ?></td>
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
<td><?php echo $InnovationInput['page_b13']['Tj22']; ?></td>
<td style="text-align:center">℃</td>
</tr>
</table>
<div class="clr"></div>
<?php endif; ?>


<?php if(isset($InnovationInput['page_b14'])): ?>
<h3 class="second02"><?php echo __('材料予熱改善（画面１１で選ばれた場合表示）'); ?></h3>
<table class="resultTable tbl">
<tr>
<th><label><?php echo __('項目名称'); ?></label></th>
<th><label><?php echo __('現状'); ?></label></th>
<th><label><?php echo __('改善'); ?></label></th>
<th class="unit"><label><?php echo __('単位'); ?></label></th>
</tr>
<tr>
<td class="name"><?php echo __('入口温度'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Tp1'])) ? $InnovationInput['Tp1'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b14']['Tp12']; ?></td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('出口温度'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Tp2'])) ? $InnovationInput['Tp2'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b14']['Tp22']; ?></td>
<td style="text-align:center">℃</td>
</tr>
<tr>
<td class="name"><?php echo __('材料搬送量'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Mloss'])) ? $InnovationInput['Mloss'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b14']['Mloss2']; ?></td>
<td style="text-align:center">t/h</td>
</tr>
<tr>
<td class="name"><?php echo __('材料必要熱量'); ?></td>
<td>
	<?php echo (isset($InnovationInput['Eeffect1'])) ? $InnovationInput['Eeffect1'] : 0 ; ?>
</td>
<td><?php echo $InnovationInput['page_b14']['Eeffect2']; ?></td>
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
<td class="name"><?php echo __('電気損失改善検討'); ?></td>
<td><?php echo $InnovationInput['out_b02']['EF1']; ?> kJ/t</td>
<td><?php echo $InnovationInput['out_b02']['EF2_b15'];?> kJ/t</td>
<td><?php echo $InnovationInput['out_b02']['Save_energy_ratio_b15'];?> %</td>
</tr>
<tr>
<td class="name"><?php echo __('炉体損失熱改善検討'); ?></td>
<td><?php echo $InnovationInput['out_b02']['EF1']; ?> kJ/t</td>
<td><?php echo $InnovationInput['out_b02']['EF2_b12'];?> kJ/t</td>
<td><?php echo $InnovationInput['out_b02']['Save_energy_ratio_b12'];?> %</td>
</tr>
<tr>
<td class="name"><?php echo __('ジグ、トレー必要熱改善検討'); ?></td>
<td><?php echo $InnovationInput['out_b02']['EF1']; ?> kJ/t</td>
<td><?php echo $InnovationInput['out_b02']['EF2_b13'];?> kJ/t</td>
<td><?php echo $InnovationInput['out_b02']['Save_energy_ratio_b13'];?> %</td>
</tr>
<tr>
<td class="name"><?php echo __('材料予熱効果改善検討'); ?></td>
<td><?php echo $InnovationInput['out_b02']['EF1']; ?> kJ/t</td>
<td><?php echo $InnovationInput['out_b02']['EF2_b14'];?> kJ/t</td>
<td><?php echo $InnovationInput['out_b02']['Save_energy_ratio_b14'];?> %</td>
</tr>
</table>
<div class="clr"></div>



<div class="btn_out"><p><a href="#" onclick="javascript:w=window.open('<?php echo $this->Html->url(array("controller" => "save02", "action" => 'index')); ?>','','scrollbars=yes,Width=560,Height=500');w.focus();"><?php echo __('保存して終了'); ?></a></p></div>
<div class="btn_back"><p><a href="<?php echo $this->Html->url(array("controller" => "innovation_input", "action" => $previousPage)); ?>"><?php echo __('戻る'); ?></a></p></div>


<div class="clr"></div>


</div>

