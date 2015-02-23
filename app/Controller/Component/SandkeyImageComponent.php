<?php
class SandkeyImageComponent extends Component{

/***
/* function out_08 for Sandkey Image page Out_08
***/

	public function out_08($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_k1.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 75, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 332, 142, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 255, 372, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 335, 601, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 335, 624, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 335, 645, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 181, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 224, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 303, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 373, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 403, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 434, $black, $font_path, $params['text13']);
	  imagettftext($jpg_image, 10, 0, 742, 492, $black, $font_path, $params['text14']);
	  imagettftext($jpg_image, 10, 0, 742, 526, $black, $font_path, $params['text15']);
	  imagettftext($jpg_image, 10, 0, 742, 582, $black, $font_path, $params['text16']);
	  // Send Image to Browser  
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}

/***
/* function out_09 for Sandkey Image page Out_09
***/
	public function out_09($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_k2.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 75, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 244, 138, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 235, 558, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 235, 581, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 235, 602, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 742, 212, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 283, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 321, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 353, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 416, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 454, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 516, $black, $font_path, $params['text13']);
	  // Send Image to Browser 
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}

/***
/* function out_10 for Sandkey Image page Out_10
***/
	public function out_10($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_k3.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Set Text to Be Printed On Image
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 75, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 252, 156, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 333, 486, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 228, 527, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 228, 551, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 228, 575, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 215, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 277, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 304, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 335, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 393, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 428, $black, $font_path, $params['text13']);
	  imagettftext($jpg_image, 10, 0, 742, 491, $black, $font_path, $params['text14']);
	  // Send Image to Browser 
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}

/***
/* function out_11 for Sandkey Image page Out_11
***/
	public function out_11($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_armi1.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 75, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 285, 113, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 215, 338, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 280, 595, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 280, 616, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 280, 638, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 156, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 193, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 267, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 333, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 365, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 395, $black, $font_path, $params['text13']);
	  imagettftext($jpg_image, 10, 0, 742, 438, $black, $font_path, $params['text14']);
	  imagettftext($jpg_image, 10, 0, 742, 479, $black, $font_path, $params['text15']);
	  imagettftext($jpg_image, 10, 0, 742, 549, $black, $font_path, $params['text16']);
	  // Send Image to Browser
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}

/***
/* function out_12 for Sandkey Image page Out_12
***/
	public function out_12($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_armi2.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 75, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 205, 149, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 252, 570, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 252, 587, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 252, 605, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 742, 205, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 279, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 312, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 344, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 392, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 457, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 516, $black, $font_path, $params['text13']);
	  // Send Image to Browser 
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}

/***
/* function out_13 for Sandkey Image page Out_13
***/
	public function out_13($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_armi3.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 74, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 248, 150, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 328, 493, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 231, 539, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 231, 562, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 231, 585, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 203, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 266, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 294, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 323, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 356, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 411, $black, $font_path, $params['text13']);
	  imagettftext($jpg_image, 10, 0, 742, 493, $black, $font_path, $params['text14']);
	  // Send Image to Browser
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}

/***
/* function out_14 for Sandkey Image page Out_14
***/
	public function out_14($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_f-1.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 74, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 149, 288, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 183, 389, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 295, 601, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 295, 620, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 742, 136, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 172, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 206, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 272, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 323, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 352, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 380, $black, $font_path, $params['text13']);
	  imagettftext($jpg_image, 10, 0, 742, 414, $black, $font_path, $params['text14']);
	  imagettftext($jpg_image, 10, 0, 742, 444, $black, $font_path, $params['text15']);
	  imagettftext($jpg_image, 10, 0, 742, 477, $black, $font_path, $params['text16']);
	  imagettftext($jpg_image, 10, 0, 742, 507, $black, $font_path, $params['text17']);
	  imagettftext($jpg_image, 10, 0, 742, 536, $black, $font_path, $params['text18']);
	  imagettftext($jpg_image, 10, 0, 742, 569, $black, $font_path, $params['text19']);
	  // Send Image to Browser 
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}

/***
/* function out_15 for Sandkey Image page Out_15
***/
	public function out_15($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_f-2.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 74, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 103, 195, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 241, 555, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 241, 575, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 742, 212, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 742, 257, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 289, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 334, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 370, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 402, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 445, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 485, $black, $font_path, $params['text13']);
	  imagettftext($jpg_image, 10, 0, 742, 532, $black, $font_path, $params['text14']);
	  // Send Image to Browser
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}

/***
/* function out_16 for Sandkey Image page Out_16
***/
	public function out_16($params, $outSankeyImage){
	  //Set the Content Type
	  // header('Content-type: image/jpeg');
	  // Create Image From Existing File
	  $jpg_image = imagecreatefromjpeg(APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'out'. DIRECTORY_SEPARATOR .'sankey_f-3.jpg');
	  // Allocate A Color For The Text
	  $black = imagecolorallocate($jpg_image, 0, 0, 0);
	  // Set Path to Font File

	  $font_path = APP.WEBROOT_DIR.DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR . 'ariali.ttf';
	  // Print Text On Image
	  imagettftext($jpg_image, 10, 0, 65, 74, $black, $font_path, $params['text01']);
	  imagettftext($jpg_image, 10, 0, 675, 74, $black, $font_path, $params['text02']);
	  imagettftext($jpg_image, 10, 0, 101, 195, $black, $font_path, $params['text03']);
	  imagettftext($jpg_image, 10, 0, 257, 582, $black, $font_path, $params['text04']);
	  imagettftext($jpg_image, 10, 0, 257, 601, $black, $font_path, $params['text05']);
	  imagettftext($jpg_image, 10, 0, 742, 214, $black, $font_path, $params['text06']);
	  imagettftext($jpg_image, 10, 0, 742, 268, $black, $font_path, $params['text07']);
	  imagettftext($jpg_image, 10, 0, 742, 305, $black, $font_path, $params['text08']);
	  imagettftext($jpg_image, 10, 0, 742, 340, $black, $font_path, $params['text09']);
	  imagettftext($jpg_image, 10, 0, 742, 378, $black, $font_path, $params['text10']);
	  imagettftext($jpg_image, 10, 0, 742, 410, $black, $font_path, $params['text11']);
	  imagettftext($jpg_image, 10, 0, 742, 445, $black, $font_path, $params['text12']);
	  imagettftext($jpg_image, 10, 0, 742, 476, $black, $font_path, $params['text13']);
	  imagettftext($jpg_image, 10, 0, 742, 532, $black, $font_path, $params['text14']);
	  // Send Image to Browser 
	  imagejpeg($jpg_image,  $outSankeyImage, 100 );
	  // Clear Memory
	  imagedestroy($jpg_image);
	}
}
?>