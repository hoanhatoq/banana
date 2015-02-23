<div class="content_box">
<h2><?php echo __('サンキー図（熱流図）'); ?></h2>

<!--<p>サンキー図を表示しますか。</p>-->
<div class="btn_pdf"><p><a><?php echo $this->Html->link(__('出力'), array('controller' =>'out','action' => 'out_11_pdf', $chk['UserResult']['id']),array(),__('PDFファイルをダウンロードします')); ?></a></p></div>
<div class="clr"></div>


<div class="sankey">
<h3><?php echo __('雰囲気熱処理炉'); ?></h3>
<div id="sankey07">
<p class="value01"><?php echo (isset($EnergyInput['out_11']['totalin11']))? $EnergyInput['out_11']['totalin11'] : 0.0 ;?></p>
<p class="value02"><?php echo (isset($EnergyInput['out_11']['totalout11']))? $EnergyInput['out_11']['totalout11'] : 0.0 ;?></p>
<p class="value03"><?php echo (isset($EnergyInput['out_11']['PEfe_el']))? $EnergyInput['out_11']['PEfe_el'] : 0.0 ;?></p>

<p class="value06"><?php echo (isset($EnergyInput['out_11']['PEeffect']))? $EnergyInput['out_11']['PEeffect'] : 0.0 ;?></p>
<p class="value07"><?php echo (isset($EnergyInput['out_11']['PEs_oxid']))? $EnergyInput['out_11']['PEs_oxid'] : 0.0 ;?></p>
<p class="value09"><?php echo (isset($EnergyInput['out_11']['PEl_wall_t']))? $EnergyInput['out_11']['PEl_wall_t'] : 0.0 ;?></p>
<p class="value10"><?php echo (isset($EnergyInput['out_11']['PEl_cw_t']))? $EnergyInput['out_11']['PEl_cw_t'] : 0.0 ;?></p>
<p class="value08"><?php echo (isset($EnergyInput['out_11']['PEl_storage_']))? $EnergyInput['out_11']['PEl_storage_'] : 0.0 ;?></p>
<p class="value12"><?php echo (isset($EnergyInput['out_11']['PEexhaust']))? $EnergyInput['out_11']['PEexhaust'] : 0.0 ;?></p>
<p class="value11"><?php echo (isset($EnergyInput['out_11']['PEl_other']))? $EnergyInput['out_11']['PEl_other'] : 0.0 ;?></p>
<p class="value04"><?php echo (isset($EnergyInput['out_11']['PEl_eg']))? $EnergyInput['out_11']['PEl_eg'] : 0.0 ;?></p>
<p class="value05"><?php echo (isset($EnergyInput['out_11']['PEaux']))? $EnergyInput['out_11']['PEaux'] : 0.0 ;?></p>

<p class="value13"><?php echo (isset($EnergyInput['out_11']['PEh_fuel']))? $EnergyInput['out_11']['PEh_fuel'] : 0.0 ;?></p>
<p class="value14"><?php echo (isset($EnergyInput['out_11']['PEs_fuel']))? $EnergyInput['out_11']['PEs_fuel'] : 0.0 ;?></p>
<p class="value15"><?php echo (isset($EnergyInput['out_11']['PEs_air']))? $EnergyInput['out_11']['PEs_air'] : 0.0 ;?></p>
<p class="value16"><?php echo (isset($EnergyInput['out_11']['PEreact']))? $EnergyInput['out_11']['PEreact'] : 0.0 ;?></p>
</div>
</div>

<div class="clr"></div>


<div class="clr"></div>
<!-- ok & back -->



<div class="btn_next"><p><a>
	<?php echo $this->Html->link(__('管理ページへ戻る'),array( 'controller' => 'Result','action' => 'index')); ?>
<?php
				$Q11 = $EnergyInput['Q11'];
		        $Ibd2 = $EnergyInput['Ibd2'];
		        $Ibd3 = $EnergyInput['Ibd3'];
		        if ($Q11 == 2) {
		        	if (isset($Ibd2) && $Ibd2 == 1) {
		        		echo $this->Html->link(__('サンキー図表示'),array( 'controller' => 'out','action' => 'out_12', $chk['UserResult']['id']));
		        	}
		        	else if (isset($Ibd3) && $Ibd3 == 1) {
		        		echo $this->Html->link(__('サンキー図表示'),array( 'controller' => 'out','action' => 'out_13', $chk['UserResult']['id']));
		        	}
		        	else {
		        		echo $this->Html->link(__('管理ページへ戻る'),array( 'controller' => 'Result','action' => 'index'));
		        	}
		        }
?>
</a></p></div>
<div class="btn_back"><p><a>
<?php
$IND1 = $EnergyInput['IND1']; 
$ibd1 = (isset($EnergyInput['Ibd1']))? $EnergyInput['Ibd1']: ''; 
$ibd2 = (isset($EnergyInput['Ibd2']))? $EnergyInput['Ibd2']: ''; 
$ibd3 = (isset($EnergyInput['Ibd3']))? $EnergyInput['Ibd3']: ''; 

					if ($ibd3 == 1 && $IND1 == 2) {
						echo $this->Html->link(__('戻る'),array( 'controller' => 'out','action' => 'out_07', $chk['UserResult']['id']));
					}
					elseif ($ibd3 == 1 && $IND1 == 3) {
						echo $this->Html->link(__('戻る'),array( 'controller' => 'out','action' => 'out_06', $chk['UserResult']['id']));
					}
					elseif ($ibd2 == 1 && $IND1 == 2) {
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