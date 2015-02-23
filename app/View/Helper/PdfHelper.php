<?php
 App::import('Vendor','TCPDF',array('file' => 'tcpdf'. DS . 'tcpdf.php'));
 class PdfHelper extends AppHelper                                  
{
    public $core;
 
    public function PdfHelper() {
        $this->core = new TCPDF();
    }
     
}
?>