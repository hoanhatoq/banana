<?php
App::uses('Component', 'Controller/Component');

/**
 * @author Nguyen Duy Linh
 * Component process page order
 */
class MathComponent extends Component{

	/**
	 * Format a number
	 * 
	 * @param: $number: The number being formatted.
	 * @param: $decimals: Sets the number of decimal points. 
	 * @param: $dec_point: Sets the separator for the decimal point. 
	 * @param: $thousands_sep: Sets the separator for the decimal point. 
	 * 
	 * @return : 1: passed all page, page: page hasn't passed.
	 */
	public function numberFormat(&$number, $decimals = 2, $dec_point = '.', $thousands_sep = ''){				
		$number = number_format(floatval($number), $decimals, $dec_point, $thousands_sep);
	}

	/**
	 * Format for all number
	 * 
	 * @param: $numbers: array of number being formatted.
	 * @param: $decimals: Sets the number of decimal points. 
	 * @param: $dec_point: Sets the separator for the decimal point. 
	 * @param: $thousands_sep: Sets the separator for the decimal point. 
	 * 
	 * @return : 1: passed all page, page: page hasn't passed.
	 */
	public function numberFormatArray(&$numbers, $decimals = 2, $dec_point = '.', $thousands_sep = ''){				
		if(is_array($numbers)){
			foreach ($numbers as $kItem => $valItem){
				if(is_array($numbers[$kItem])){																				
					$this->numberFormatArray($numbers[$kItem], $decimals, $dec_point, $thousands_sep);
				}else{					
					if(is_numeric($numbers[$kItem])){						
						if(strpos($numbers[$kItem], '.')){														
							$numbers[$kItem] = round((float)$numbers[$kItem], $decimals);														
							if($numbers[$kItem] == '-0'){
								$numbers[$kItem] = 0;
							}							
						}else{
							$numbers[$kItem] = (int)$numbers[$kItem];
						}
					}
				}
			}
		}else{
			if(is_numeric($numbers)){
				if(strpos($numbers, '.')){										
					$numbers = round($numbers, $decimals);
				}else{
					$numbers = (int)$numbers;
				}
			}								
		}		
	}

	/**
	 * Format for all number to show 
	 * 
	 * @param: $numbers: array of number being formatted.
	 * @param: $decimals: Sets the number of decimal points. 
	 * @param: $dec_point: Sets the separator for the decimal point. 
	 * @param: $thousands_sep: Sets the separator for the decimal point. 
	 * 
	 * @return : 1: passed all page, page: page hasn't passed.
	 */
	public function numberFormatToShow(&$numbers, $decimals, $dec_point, $thousands_sep){			
		if(is_array($numbers)){
			foreach ($numbers as $kItem => $valItem){
				if(is_array($numbers[$kItem])){		
					$this->numberFormatToShow($numbers[$kItem], $decimals, $dec_point, $thousands_sep);
				}else{							
					if(is_numeric($numbers[$kItem])){						
						if(strpos($numbers[$kItem], '.')){														
							$numbers[$kItem] = round((float)$numbers[$kItem], $decimals);														
							if($numbers[$kItem] == '-0'){
								$numbers[$kItem] = 0;
							}
							$tmp = $numbers[$kItem];					
							$this->numberFormat($tmp, $decimals, $dec_point, $thousands_sep);							
							$numbers[$kItem] = $tmp;
						}else{
							$numbers[$kItem] = (int)$numbers[$kItem];
							$tmp = $numbers[$kItem];					
							$this->numberFormat($tmp, 0, '', $thousands_sep);
							$numbers[$kItem] = $tmp;
						}						
					}
				}
			}
		}else{
			if(is_numeric($numbers)){								
				if(strpos($numbers, '.')){										
					$numbers = round($numbers, $decimals);
					$this->numberFormat($numbers, $decimals, $dec_point, $thousands_sep);
				}else{
					$numbers = (int)$numbers;
					$this->numberFormat($numbers, 0, '', $thousands_sep);
				}
			}								
		}		
	}
}