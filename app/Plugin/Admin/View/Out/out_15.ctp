<div class="content_box">
<h2><?php echo __('サンキー図（熱流図）'); ?></h2>

<!--<p>サンキー図を表示しますか。</p>-->
<div class="btn_pdf"><p><a><?php echo $this->Html->link(__('出力'), array('controller' =>'out','action' => 'out_15_pdf', $chk['UserResult']['id']),array(),__('PDFファイルをダウンロードします')); ?></a></p></div>
<div class="clr"></div>


<div class="sankey">
<h3><?php echo __('アルミ溶解炉'); ?></h3>
<div id="sankey05">
<p class="value01"><?php echo (isset($EnergyInput['out_15']['totalin11']))? $EnergyInput['out_15']['totalin11'] : 0.0 ;?></p>
<p class="value02"><?php echo (isset($EnergyInput['out_15']['totalout11']))? $EnergyInput['out_15']['totalout11'] : 0.0 ;?></p>
<p class="value03"><?php echo (isset($EnergyInput['out_15']['PEh_fuel']))? $EnergyInput['out_15']['PEh_fuel'] : 0.0 ;?></p>



<p class="value04"><?php echo (isset($EnergyInput['out_15']['PEeffect']))? $EnergyInput['out_15']['PEeffect'] : 0.0 ;?></p>
<p class="value05"><?php echo (isset($EnergyInput['out_15']['PEl_jig_t']))? $EnergyInput['out_15']['PEl_jig_t'] : 0.0 ;?></p>
<p class="value07"><?php echo (isset($EnergyInput['out_15']['PEl_wall_t']))? $EnergyInput['out_15']['PEl_wall_t'] : 0.0 ;?></p>
<p class="value10"><?php echo (isset($EnergyInput['out_15']['PEl_cw_t']))? $EnergyInput['out_15']['PEl_cw_t'] : 0.0 ;?></p>
<p class="value09"><?php echo (isset($EnergyInput['out_15']['PEl_parts_t']))? $EnergyInput['out_15']['PEl_parts_t'] : 0.0 ;?></p>
<p class="value08"><?php echo (isset($EnergyInput['out_15']['PEl_opening_t']))? $EnergyInput['out_15']['PEl_opening_t'] : 0.0 ;?></p>
<p class="value12"><?php echo (isset($EnergyInput['out_15']['PEexhaust']))? $EnergyInput['out_15']['PEexhaust'] : 0.0 ;?></p>
<p class="value11"><?php echo (isset($EnergyInput['out_15']['PEl_other']))? $EnergyInput['out_15']['PEl_other'] : 0.0 ;?></p>
<p class="value06"><?php echo (isset($EnergyInput['out_15']['PEs_atm']))? $EnergyInput['out_15']['PEs_atm'] : 0.0 ;?></p>

<p class="value13"><?php echo (isset($EnergyInput['out_15']['PEs_fuel']))? $EnergyInput['out_15']['PEs_fuel'] : 0.0 ;?></p>
<p class="value14"><?php echo (isset($EnergyInput['out_15']['PEs_air']))? $EnergyInput['out_15']['PEs_air'] : 0.0 ;?></p>

</div>
</div>

<div class="clr"></div>

<div class="clr"></div>
<!-- ok & back -->
<div class="btn_next"><p><a>
<?php
				$Q11 = $EnergyInput['Q11'];
				$Ibd1 = $EnergyInput['Ibd1'];
		        $Ibd2 = $EnergyInput['Ibd2'];
		        $Ibd3 = $EnergyInput['Ibd3'];
		        if ($Q11 == 3) {
		        	if (isset($Ibd3) && $Ibd3 == 1) {
		        		echo $this->Html->link(__('サンキー図表示'),array( 'controller' => 'out','action' => 'out_16', $chk['UserResult']['id']));
		        	}
		        	else {
		        		echo $this->Html->link(__('管理ページへ戻る'),array( 'controller' => 'Result','action' => 'index'));
		        	}
		        }
?>
</a></p></div>
<div class="btn_back"><p><a>
<?php 
if (isset($Ibd1) && $Ibd1 == 1) {
	echo $this->Html->link(__('戻る'),array( 'controller' => 'out','action' => 'out_14', $chk['UserResult']['id']));
}
else {
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
				}

?>
</a></p></div>


<div class="clr"></div>


</div>