<?php
class OutPdfComponent extends Component{

    // use the other component
    public $components = array('SandkeyImage');
    public $css = '<style>
        .a{
            background-color: white;
            color: #EF3E35;
            float: left;
            font-size: 14px;
            height: ;
            text-align: left;
            line-height: 2;
            width: 100%;
            padding: 1px 20px;
        }
        .a1{
            background-color: #EF3E35;
            color: white;
            float: left;
            font-size: 12px;
            height: ;
            text-align: left;
            width: 100%;
            padding: 1px 20px;
        }
        th.total1, th.total2 {
            height: 22px;
            text-align: right;
            font-family: "Times New Roman", Times, serif;
        }
        th.total0 {
            height: 22px;
            font-family: "Times New Roman", Times, serif;
        }
        th.title {
            vertical-align: middle;
            background-color: #EF3E35;
            color: white;
            text-align: center;
            line-height: 2.5;
            border: 1px solid #EF3E35;
        }
        th.title2 {
            vertical-align: middle;  
            background-color: white;
            color: #EF3E35;
            text-align: justify;
            line-height: 2.5;
            border: 1px solid #EF3E35;
        }
        th.num {
            vertical-align: middle;
            background-color: #F8E4DA;
            text-align: center;
        }
        th.co {
            height: 22px;
        }
        th.con {
            height: 22px;
            text-align: right;
        }
           </style>';
    public function genPdfInno1($data ,$username){
        // create file
        require_once(APP .'Vendor'.DIRECTORY_SEPARATOR.'tcpdf'. DIRECTORY_SEPARATOR .'tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('cid0jp', '', 12);
        $pdf->SetMargins(20, 5, true);
        $pdf->SetAutoPageBreak(TRUE, 0);
        //css
        $css = $this->css;
        //html
        $this->title($pdf, $css, $data);
        $this->out_b01($pdf, $css, $data);

        // Close file
        $namepdf = 'out_'.$username."_".date("Y年m月d日").".pdf";
        $pdf->Output($namepdf, "D");
    }
    public function genPdfInno2($data ,$username){
        // create file
        require_once(APP .'Vendor'.DIRECTORY_SEPARATOR.'tcpdf'. DIRECTORY_SEPARATOR .'tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('cid0jp', '', 12);
        $pdf->SetMargins(20, 5, true);
        $pdf->SetAutoPageBreak(TRUE, 0);
        //css
        $css = $this->css;
        //html
        $this->title($pdf, $css, $data);
        $this->out_b02($pdf, $css, $data);

        // Close file
        $namepdf = 'out_'.$username."_".date("Y年m月d日").".pdf";
        $pdf->Output($namepdf, "D");
    }
    public function genPdfInno($page ,$data ,$username){
        // create file
        require_once(APP .'Vendor'.DIRECTORY_SEPARATOR.'tcpdf'. DIRECTORY_SEPARATOR .'tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('cid0jp', '', 12);
        $pdf->SetMargins(20, 5, true);
        $pdf->SetAutoPageBreak(TRUE, 0);
        //css
        $css = $this->css;
        //html
        if($page=='all'){
            $this->title($pdf, $css, $data);
            $this->out_b01($pdf, $css, $data);
            $this->out_b02($pdf, $css, $data);
        }
        if($page=='out_b01'){
            $this->title($pdf, $css, $data);
            $this->out_b01($pdf, $css, $data);
        }
        if($page=='out_b02'){
            $this->title($pdf, $css, $data);
            $this->out_b02($pdf, $css, $data);
        }
        // Close file
        $namepdf = 'out_'.$username."_".date("Y年m月d日").".pdf";
        $pdf->Output($namepdf, "D");
    }


    public function genPdfEnergy($page ,$data ,$username){
        // 
        require_once(APP .'Vendor'.DIRECTORY_SEPARATOR.'tcpdf'. DIRECTORY_SEPARATOR .'tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('cid0jp', '', 12);
        $pdf->SetMargins(20, 5, true);
        $pdf->SetAutoPageBreak(TRUE, 0);
        //css
        $css = $this->css;
        //html

        $this->title($pdf, $css, $data);
        
        $Ibd1 = (isset($data['Ibd1']))? $data['Ibd1']: 0;
        $Ibd2 = (isset($data['Ibd2']))? $data['Ibd2']: 0;
        $Ibd3 = (isset($data['Ibd3']))? $data['Ibd3']: 0;
        $IND1 = $data['IND1'];

        if($Ibd2 != 1){
            if($page == 'out' || $page == '' || $page=='all'){
                $this->out($pdf, $css, $data);
            }
        }
        
        if($Ibd1 == 1){
            if($page == 'out_02' || $page == '' || $page=='all'){            
                $this->out_02($pdf, $css, $data);
            }

            if($page == 'out_03' || $page == '' || $page=='all'){            
                $this->out_03($pdf, $css, $data);
            }
        }

        if($IND1 == 1 && $Ibd3 == 1){
            if($page == 'out_04' || $page == '' || $page=='all'){            
                $this->out_04($pdf, $css, $data);
            }
        }
        
        if($Ibd2 == 1 && $IND1 == 2){
            if($page == 'out_05' || $page == '' || $page=='all'){            
                $this->out_05($pdf, $css, $data);
            }
        }
        
        if($Ibd3 == 1 && $IND1 == 3){
            if($page == 'out_06' || $page == '' || $page=='all'){            
                $this->out_06($pdf, $css, $data);
            }
        }
        
        if($Ibd3 == 1 && $IND1 == 2){
            if($page == 'out_07' || $page == '' || $page=='all'){            
                $this->out_07($pdf, $css, $data);
            }
        }
        
        $outSankeyImage = array();
        if(isset($data['Q11']) && $data['Q11']==1){  
            // out_08.html  
            if(isset($data['Ibd1']) && $data['Ibd1']==1){
                        //out_08
                $params['text01'] = (isset($data['out_08']['totalin11']))? $data['out_08']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_08']['totalout11']))? $data['out_08']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_08']['PEfe_el']))? $data['out_08']['PEfe_el']:0.0;
                $params['text04'] = (isset($data['out_08']['PEh_fuel']))? $data['out_08']['PEh_fuel']:0.0;
                $params['text05'] = (isset($data['out_08']['PEs_fuel']))? $data['out_08']['PEs_fuel']:0.0;
                $params['text06'] = (isset($data['out_08']['PEs_air']))? $data['out_08']['PEs_air']:0.0;
                $params['text07'] = (isset($data['out_08']['PEreact']))? $data['out_08']['PEreact']:0.0;

                $params['text10'] = (isset($data['out_08']['PEeffect']))? $data['out_08']['PEeffect']:0.0;
                $params['text11'] = (isset($data['out_08']['PEs_oxid']))? $data['out_08']['PEs_oxid']:0.0;
                $params['text12'] = (isset($data['out_08']['PEl_wall_t']))? $data['out_08']['PEl_wall_t']:0.0;
                $params['text13'] = (isset($data['out_08']['PEl_cw_t']))? $data['out_08']['PEl_cw_t']:0.0;
                $params['text14'] = (isset($data['out_08']['PEl_opening_t']))? $data['out_08']['PEl_opening_t']:0.0;
                $params['text16'] = (isset($data['out_08']['PEexhaust']))? $data['out_08']['PEexhaust']:0.0;
                $params['text15'] = (isset($data['out_08']['PEl_other']))? $data['out_08']['PEl_other']:0.0;
                $params['text08'] = (isset($data['out_08']['PEl_eg']))? $data['out_08']['PEl_eg']:0.0;
                $params['text09'] = (isset($data['out_08']['PEaux']))? $data['out_08']['PEaux']:0.0;


                
                $outSankeyImage['out_08'] = TMP . uniqid('out_08_').'.jpg';

                if($page == 'out_08' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_08($params, $outSankeyImage['out_08']);                                    
                    $this->out_08($pdf, $css, $outSankeyImage['out_08']);
                }
                
            }
            if(isset($data['Ibd2']) && $data['Ibd2']==1){
                        //out_09
                $params['text01'] = (isset($data['out_09']['totalin11']))? $data['out_09']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_09']['totalout11']))? $data['out_09']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_09']['PEh_fuel']))? $data['out_09']['PEh_fuel']:0.0;
                $params['text04'] = (isset($data['out_09']['PEs_fuel']))? $data['out_09']['PEs_fuel']:0.0;
                $params['text05'] = (isset($data['out_09']['PEs_air']))? $data['out_09']['PEs_air']:0.0;
                $params['text06'] = (isset($data['out_09']['PEreact']))? $data['out_09']['PEreact']:0.0;

                $params['text07'] = (isset($data['out_09']['PEeffect']))? $data['out_09']['PEeffect']:0.0;
                $params['text08'] = (isset($data['out_09']['PEs_oxid']))? $data['out_09']['PEs_oxid']:0.0;
                $params['text09'] = (isset($data['out_09']['PEl_wall_t']))? $data['out_09']['PEl_wall_t']:0.0;
                $params['text10'] = (isset($data['out_09']['PEl_cw_t']))? $data['out_09']['PEl_cw_t']:0.0;
                $params['text11'] = (isset($data['out_09']['PEl_opening_t']))? $data['out_09']['PEl_opening_t']:0.0;
                $params['text13'] = (isset($data['out_09']['PEexhaust']))? $data['out_09']['PEexhaust']:0.0;
                $params['text12'] = (isset($data['out_09']['PEl_other']))? $data['out_09']['PEl_other']:0.0;

                $outSankeyImage['out_09'] = TMP . uniqid('out_09_').'.jpg';
                if($page == 'out_09' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_09($params, $outSankeyImage['out_09']);                                    
                    $this->out_09($pdf, $css, $outSankeyImage['out_09']);
                }

            }
            if(isset($data['Ibd3']) && $data['Ibd3']==1){
                        //out_10
                $params['text01'] = (isset($data['out_10']['totalin11']))? $data['out_10']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_10']['totalout11']))? $data['out_10']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_10']['PEh_fuel']))? $data['out_10']['PEh_fuel']:0.0;
                $params['text04'] = (isset($data['out_10']['PEs_fuel']))? $data['out_10']['PEs_fuel']:0.0;
                $params['text05'] = (isset($data['out_10']['PEs_air']))? $data['out_10']['PEs_air']:0.0;
                $params['text06'] = (isset($data['out_10']['PEreact']))? $data['out_10']['PEreact']:0.0;
                $params['text07'] = (isset($data['out_10']['PErecovery']))? $data['out_10']['PErecovery']:0.0;

                $params['text08'] = (isset($data['out_10']['PEeffect']))? $data['out_10']['PEeffect']:0.0;
                $params['text09'] = (isset($data['out_10']['PEs_oxid']))? $data['out_10']['PEs_oxid']:0.0;
                $params['text10'] = (isset($data['out_10']['PEl_wall_t']))? $data['out_10']['PEl_wall_t']:0.0;
                $params['text11'] = (isset($data['out_10']['PEl_cw_t']))? $data['out_10']['PEl_cw_t']:0.0;
                $params['text12'] = (isset($data['out_10']['PEl_opening_t']))? $data['out_10']['PEl_opening_t']:0.0;
                $params['text14'] = (isset($data['out_10']['PEexhaust_hc']))? $data['out_10']['PEexhaust_hc']:0.0;
                $params['text13'] = (isset($data['out_10']['PEl_other']))? $data['out_10']['PEl_other']:0.0;
 
                $outSankeyImage['out_10'] = TMP . uniqid('out_10_').'.jpg';
                if($page == 'out_10' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_10($params, $outSankeyImage['out_10']);                                    
                    $this->out_10($pdf, $css, $outSankeyImage['out_10']);
                }
            }
        }
        
        
        if(isset($data['Q11']) && $data['Q11']=='2'){        
            if(isset($data['Ibd1']) && $data['Ibd1']==1){
                        //out_11
                $params['text01'] = (isset($data['out_11']['totalin11']))? $data['out_11']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_11']['totalout11']))? $data['out_11']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_11']['PEfe_el']))? $data['out_11']['PEfe_el']:0.0;
                $params['text04'] = (isset($data['out_11']['PEh_fuel']))? $data['out_11']['PEh_fuel']:0.0;
                $params['text05'] = (isset($data['out_11']['PEs_fuel']))? $data['out_11']['PEs_fuel']:0.0;
                $params['text06'] = (isset($data['out_11']['PEs_air']))? $data['out_11']['PEs_air']:0.0;
                $params['text07'] = (isset($data['out_11']['PEreact']))? $data['out_11']['PEreact']:0.0;

                $params['text10'] = (isset($data['out_11']['PEeffect']))? $data['out_11']['PEeffect']:0.0;
                $params['text11'] = (isset($data['out_11']['PEs_oxid']))? $data['out_11']['PEs_oxid']:0.0;
                $params['text13'] = (isset($data['out_11']['PEl_wall_t']))? $data['out_11']['PEl_wall_t']:0.0;
                $params['text14'] = (isset($data['out_11']['PEl_cw_t']))? $data['out_11']['PEl_cw_t']:0.0;
                $params['text12'] = (isset($data['out_11']['PEl_opening_t']))? $data['out_11']['PEl_opening_t']:0.0;
                $params['text16'] = (isset($data['out_11']['PEexhaust']))? $data['out_11']['PEexhaust']:0.0;
                $params['text15'] = (isset($data['out_11']['PEl_other']))? $data['out_11']['PEl_other']:0.0;
                $params['text08'] = (isset($data['out_11']['PEl_eg']))? $data['out_11']['PEl_eg']:0.0;
                $params['text09'] = (isset($data['out_11']['PEaux']))? $data['out_11']['PEaux']:0.0;
                
                $outSankeyImage['out_11'] = TMP . uniqid('out_11_').'.jpg';                                
                if($page == 'out_11' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_11($params, $outSankeyImage['out_11']);                                    
                    $this->out_11($pdf, $css, $outSankeyImage['out_11']);
                }
            }
            if(isset($data['Ibd2']) && $data['Ibd2']==1){
                                //out_12
                $params['text01'] = (isset($data['out_12']['totalin11']))? $data['out_12']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_12']['totalout11']))? $data['out_12']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_12']['PEh_fuel']))? $data['out_12']['PEh_fuel']:0.0;
                $params['text04'] = (isset($data['out_12']['PEs_fuel']))? $data['out_12']['PEs_fuel']:0.0;
                $params['text05'] = (isset($data['out_12']['PEs_air']))? $data['out_12']['PEs_air']:0.0;
                $params['text06'] = (isset($data['out_12']['PEreact']))? $data['out_12']['PEreact']:0.0;

                $params['text07'] = (isset($data['out_12']['PEeffect']))? $data['out_12']['PEeffect']:0.0;
                $params['text08'] = (isset($data['out_12']['PEs_oxid']))? $data['out_12']['PEs_oxid']:0.0;
                $params['text10'] = (isset($data['out_12']['PEl_wall_t']))? $data['out_12']['PEl_wall_t']:0.0;
                $params['text11'] = (isset($data['out_12']['PEl_cw_t']))? $data['out_12']['PEl_cw_t']:0.0;
                $params['text09'] = (isset($data['out_12']['PEl_storage_']))? $data['out_12']['PEl_storage_']:0.0;//may be
                $params['text13'] = (isset($data['out_12']['PEexhaust']))? $data['out_12']['PEexhaust']:0.0;
                $params['text12'] = (isset($data['out_12']['PEl_other']))? $data['out_12']['PEl_other']:0.0;
 
                $outSankeyImage['out_12'] = TMP . uniqid('out_12_').'.jpg';
                if($page == 'out_12' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_12($params, $outSankeyImage['out_12']);                                    
                    $this->out_12($pdf, $css, $outSankeyImage['out_12']);
                }
            }
            if(isset($data['Ibd3']) && $data['Ibd3']==1){
                //out_13
                $params['text01'] = (isset($data['out_13']['totalin11']))? $data['out_13']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_13']['totalout11']))? $data['out_13']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_13']['PEh_fuel']))? $data['out_13']['PEh_fuel']:0.0;
                $params['text04'] = (isset($data['out_13']['PEs_fuel']))? $data['out_13']['PEs_fuel']:0.0;
                $params['text05'] = (isset($data['out_13']['PEs_air']))? $data['out_13']['PEs_air']:0.0;
                $params['text06'] = (isset($data['out_13']['PEreact']))? $data['out_13']['PEreact']:0.0;
                $params['text07'] = (isset($data['out_13']['PErecovery']))? $data['out_13']['PErecovery']:0.0;

                $params['text08'] = (isset($data['out_13']['PEeffect']))? $data['out_13']['PEeffect']:0.0;
                $params['text09'] = (isset($data['out_13']['PEs_oxid']))? $data['out_13']['PEs_oxid']:0.0;
                $params['text11'] = (isset($data['out_13']['PEl_wall_t']))? $data['out_13']['PEl_wall_t']:0.0;
                $params['text12'] = (isset($data['out_13']['PEl_cw_t']))? $data['out_13']['PEl_cw_t']:0.0;
                $params['text10'] = (isset($data['out_13']['PEl_storage_']))? $data['out_13']['PEl_storage_']:0.0;
                $params['text14'] = (isset($data['out_13']['PEexhaust_hc']))? $data['out_13']['PEexhaust_hc']:0.0;
                $params['text13'] = (isset($data['out_13']['PEl_other']))? $data['out_13']['PEl_other']:0.0;
 
                $outSankeyImage['out_13'] = TMP . uniqid('out_13_').'.jpg';
                if($page == 'out_13' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_13($params, $outSankeyImage['out_13']);                                    
                    $this->out_13($pdf, $css, $outSankeyImage['out_13']);
                }
            }
        }

        if(isset($data['Q11']) && $data['Q11']==3){
            if(isset($data['Ibd1']) && $data['Ibd1']==1){
                        //out_14
                $params['text01'] = (isset($data['out_14']['totalin11']))? $data['out_14']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_14']['totalout11']))? $data['out_14']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_14']['PEfe_el']))? $data['out_14']['PEfe_el']:0.0;
                $params['text04'] = (isset($data['out_14']['PEh_fuel']))? $data['out_14']['PEh_fuel']:0.0;
                $params['text05'] = (isset($data['out_14']['PEs_fuel']))? $data['out_14']['PEs_fuel']:0.0;
                $params['text06'] = (isset($data['out_14']['PEs_air']))? $data['out_14']['PEs_air']:0.0;

                $params['text11'] = (isset($data['out_14']['PEeffect']))? $data['out_14']['PEeffect']:0.0;
                $params['text12'] = (isset($data['out_14']['PEl_jig_t']))? $data['out_14']['PEl_jig_t']:0.0;
                $params['text14'] = (isset($data['out_14']['PEl_wall_t']))? $data['out_14']['PEl_wall_t']:0.0;
                $params['text17'] = (isset($data['out_14']['PEl_cw_t']))? $data['out_14']['PEl_cw_t']:0.0;
                $params['text16'] = (isset($data['out_14']['PEl_parts_t']))? $data['out_14']['PEl_parts_t']:0.0;
                $params['text15'] = (isset($data['out_14']['PEl_opening_t']))? $data['out_14']['PEl_opening_t']:0.0;
                $params['text19'] = (isset($data['out_14']['PEexhaust']))? $data['out_14']['PEexhaust']:0.0;
                $params['text18'] = (isset($data['out_14']['PEl_other']))? $data['out_14']['PEl_other']:0.0;
                $params['text13'] = (isset($data['out_14']['PEs_atm']))? $data['out_14']['PEs_atm']:0.0;
                $params['text09'] = (isset($data['out_14']['PEl_eg']))? $data['out_14']['PEl_eg']:0.0;
                $params['text10'] = (isset($data['out_14']['PEaux']))? $data['out_14']['PEaux']:0.0;
                $params['text07'] = (isset($data['out_14']['PEu_atm_cal']))? $data['out_14']['PEu_atm_cal']:0.0;
                $params['text08'] = (isset($data['out_14']['PEu_atm_gen']))? $data['out_14']['PEu_atm_gen']:0.0;
 
                $outSankeyImage['out_14'] = TMP . uniqid('out_14_').'.jpg';
                if($page == 'out_14' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_14($params, $outSankeyImage['out_14']);                                    
                    $this->out_14($pdf, $css, $outSankeyImage['out_14']);
                }

            }
            if(isset($data['Ibd2']) && $data['Ibd2']==1){
                        //out_15
                $params['text01'] = (isset($data['out_15']['totalin11']))? $data['out_15']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_15']['totalout11']))? $data['out_15']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_15']['PEh_fuel']))? $data['out_15']['PEh_fuel']:0.0;
                $params['text04'] = (isset($data['out_15']['PEs_fuel']))? $data['out_15']['PEs_fuel']:0.0;
                $params['text05'] = (isset($data['out_15']['PEs_air']))? $data['out_15']['PEs_air']:0.0;

                $params['text06'] = (isset($data['out_15']['PEeffect']))? $data['out_15']['PEeffect']:0.0;
                $params['text07'] = (isset($data['out_15']['PEl_jig_t']))? $data['out_15']['PEl_jig_t']:0.0;
                $params['text09'] = (isset($data['out_15']['PEl_wall_t']))? $data['out_15']['PEl_wall_t']:0.0;
                $params['text12'] = (isset($data['out_15']['PEl_cw_t']))? $data['out_15']['PEl_cw_t']:0.0;
                $params['text11'] = (isset($data['out_15']['PEl_parts_t']))? $data['out_15']['PEl_parts_t']:0.0;
                $params['text10'] = (isset($data['out_15']['PEl_opening_t']))? $data['out_15']['PEl_opening_t']:0.0;
                $params['text14'] = (isset($data['out_15']['PEexhaust']))? $data['out_15']['PEexhaust']:0.0;
                $params['text13'] = (isset($data['out_15']['PEl_other']))? $data['out_15']['PEl_other']:0.0;
                $params['text08'] = (isset($data['out_15']['PEs_atm']))? $data['out_15']['PEs_atm']:0.0;
 
                $outSankeyImage['out_15'] = TMP . uniqid('out_15_').'.jpg';
                if($page == 'out_15' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_15($params, $outSankeyImage['out_15']);                                    
                    $this->out_15($pdf, $css, $outSankeyImage['out_15']);
                }
            }
            if(isset($data['Ibd3']) && $data['Ibd3']==1){
                        //out_16
                $params['text01'] = (isset($data['out_16']['totalin11']))? $data['out_16']['totalin11']:0.0;
                $params['text02'] = (isset($data['out_16']['totalout11']))? $data['out_16']['totalout11']:0.0;
                $params['text03'] = (isset($data['out_16']['PEh_fuel']))? $data['out_16']['PEh_fuel']:0.0;
                $params['text04'] = (isset($data['out_16']['PEs_fuel']))? $data['out_16']['PEs_fuel']:0.0;
                $params['text05'] = (isset($data['out_16']['PEs_air']))? $data['out_16']['PEs_air']:0.0;

                $params['text06'] = (isset($data['out_16']['PEeffect']))? $data['out_16']['PEeffect']:0.0;
                $params['text07'] = (isset($data['out_16']['PEl_jig_t']))? $data['out_16']['PEl_jig_t']:0.0;
                $params['text09'] = (isset($data['out_16']['PEl_wall_t']))? $data['out_16']['PEl_wall_t']:0.0;
                $params['text11'] = (isset($data['out_16']['PEl_parts_t']))? $data['out_16']['PEl_parts_t']:0.0;
                $params['text12'] = (isset($data['out_16']['PEl_cw_t']))? $data['out_16']['PEl_cw_t']:0.0;
                $params['text10'] = (isset($data['out_16']['PEl_opening_t']))? $data['out_16']['PEl_opening_t']:0.0;
                $params['text08'] = (isset($data['out_16']['PEs_atm']))? $data['out_16']['PEs_atm']:0.0;
                $params['text14'] = (isset($data['out_16']['PEexhaust_hc']))? $data['out_16']['PEexhaust_hc']:0.0;
                $params['text13'] = (isset($data['out_16']['PEl_other']))? $data['out_16']['PEl_other']:0.0;
 
                $outSankeyImage['out_16'] = TMP . uniqid('out_16_').'.jpg';
                if($page == 'out_16' || $page == '' || $page=='all'){            
                    $this->SandkeyImage->out_16($params, $outSankeyImage['out_16']);                                    
                    $this->out_16($pdf, $css, $outSankeyImage['out_16']);
                }
            }
        }
        foreach ($outSankeyImage as $image) {
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $namepdf = 'out_'.$username."_".date("Y年m月d日").".pdf";
        $pdf->Output($namepdf, "D");
    }


    public function title(&$pdf, $css, $data){

        $pdf->AddPage('L', 'A4');
        $html = '<table><tbody><tr><th height="140px"></th></tr></tbody></table>
              <div><img src="'.APP .WEBROOT_DIR.DIRECTORY_SEPARATOR.'images'. DIRECTORY_SEPARATOR .'header1_logo.gif'.'" width="250" /></div>
              <table>
              <tbody>
              <tr>
              <th class="title" width="30%" height="40px">'. __("結果出力表").'</th>
              <th class="title2" width="70%" height="40px"> '. $data['TPE_name'].'</th>
              </tr>
              <tr><th></th></tr>
              <tr>
              <th class="title" width="30%" height="40px">'. __("出力日").'</th>
              <th class="title2" width="70%" height="40px"> ' . date("Y").''. __("年").''. date("m").''. __("月").''. date("d").''. __("日"). '</th>
              </tr>
              </tbody></table>';
        $pdf->writeHTML($css . $html, true, 0, true, true);
    }

    public function out(&$pdf, $css, $data){
        //page 1
        $pdf->AddPage('L', 'A4');
        $html = '<div class="a1"> '. __("出力表1:代表的入力条件の表示出力").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        //html content

        $html .= '<div>
             <table  border="1" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値").'</th>
             <th class="num">'. __("単位").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉の種類").'</th>
             <th class="con" colspan="2" style="text-align:center">' . $data['Furnace_Type']. '</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉名").'</th>
             <th class="con" colspan="2" style="text-align:center">' . $data['TPE_name']. '</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("型式").'</th>
             <th class="con" colspan="2" style="text-align:center">' . $data['Type']. '</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("加熱量").'</th>
             <th class="con" colspan="2">' . $data['TPH']. '</th>
             <th class="con" style="text-align:center">t/h</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("被熱物入口温度").'</th>
             <th class="con" colspan="2">' . $data['Tp1']. '</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("被熱物出口温度").'</th>
             <th class="con" colspan="2">' . $data['Tp2']. '</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化減量").'</th>
             <th class="con" colspan="2">' . $data['Mloss']. '</th>
             <th class="con" style="text-align:center">Kg/t</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料名称").'</th>
             <th class="con" colspan="2" style="text-align:center">' . $data['Fuel_name']. '</th>
             <th class="con"></th>
             </tr>';

        if (isset($data['IND1']) && $data['IND1']!=1) {

        $html .='<tr>
             <th class="co" colspan="5"> '. __("発熱量").'</th>
             <th class="con" colspan="2">' . $data['Hl']. '</th>
             <th class="con" style="text-align:center">kJ/m3</th>
             </tr>
             <tr>
             <th class="co" colspan="5">' . __(" 燃料流量"). ' </th>
             <th class="con" colspan="2">' . $data['Vf']. '</th>
             <th class="con" style="text-align:center">m3/t、kg/t</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("空気流量").'</th>
             <th class="con" colspan="2">' . $data['Vair']. '</th>
             <th class="con" style="text-align:center">m3/t</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("リジェネの有無").'</th>
             <th class="con" colspan="2" style="text-align:center">' . $data['Regene']. '</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉入口空気温度").'</th>
             <th class="con" colspan="2">' . $data['Ta2']. '</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉出口排ガス温度").'</th>
             <th class="con" colspan="2">' . $data['Twg1']. '</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>';
        }
        else {
        $html .='<tr>
             <th class="co" colspan="5"> '. __("発熱量").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">kJ/m3</th>
             </tr>
             <tr>
             <th class="co" colspan="5">' . __(" 燃料流量"). ' </th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">m3/t、kg/t</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("空気流量").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">m3/t</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("リジェネの有無").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉入口空気温度").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉出口排ガス温度").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>';
        }

        if (isset($data['IND1']) && $data['IND1']!=1 && isset($data['Q5']) && $data['Q5']==1) {
             $html .='<tr>
             <th class="co" colspan="5"> '. __("炉出口排ガス温度").'</th>
             <th class="con" colspan="2">' . $data['Te']. '</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>';
        }
        else {
             $html .='<tr>
             <th class="co" colspan="5"> '. __("炉出口排ガス温度").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>';
        }

        if (isset($data['IND1']) && $data['IND1']!=1) {
             $html .='<tr>
             <th class="co" colspan="5"> '. __("排ガス酸素濃度").'</th>
             <th class="con" colspan="2">' . $data['Fg_O2D']. '</th>
             <th class="con" style="text-align:center">％</th>
             </tr>
             </tbody></table>
             </div>';
        }
        else {
             $html .='<tr>
             <th class="co" colspan="5"> '. __("排ガス酸素濃度").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">％</th>
             </tr>
             </tbody></table>
             </div>';
        }
             
            $pdf->writeHTML($css . $html, true, 0, true, 0);
            $pdf->endPage();
    }


    public function out_02(&$pdf, $css, $data){

        //page 1
        $pdf->AddPage('L', 'A4');
        $html1 = '<div class="a1"> '. __("出力表２:総合効率シート").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        $html1 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody> 
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値（kJ/t）").'</th>
             <th class="num">'. __("比率(%)").'</th>
             </tr>';
        if (isset($data['IND1']) && $data['IND1']!=1) {
        $html1 .='
             <tr>
             <th class="co" colspan="5"> '. __("燃料入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_fuel'].'</th>
             <th class="con">'.$data['out_02']['Eh_fuel_ratio'].'</th>
             </tr>';
        }else{
        $html1 .='
             <tr>
             <th class="co" colspan="5"> '. __("燃料入熱").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">-</th>
             </tr>';
        }

        $html1 .='
             <tr>
             <th class="co" colspan="5"> '. __("付着物入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_waste'].'</th>
             <th class="con">'.$data['out_02']['Eh_waste_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス製造入熱").'</th>
             <th class="con" colspan="2">'.$data['Eu_atm'].'</th>
             <th class="con">'.$data['out_02']['Eu_atm_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料換算全電気使用量").'</th>
             <th class="con" colspan="2">'.$data['Efe_el'].'</th>
             <th class="con">'.$data['out_02']['Efe_el_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_fuel'].'</th>
             <th class="con">'.$data['out_02']['Es_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("空気入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_air'].'</th>
             <th class="con">'.$data['out_02']['Es_air_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蒸気霧化材顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_atmize'].'</th>
             <th class="con">'.$data['out_02']['Es_atmize_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("反応熱").'</th>
             <th class="con" colspan="2">'.$data['Ereact'].'</th>
             <th class="con">'.$data['out_02']['Ereact_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("侵入空気顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_infilt'].'</th>
             <th class="con">'.$data['out_02']['Es_infilt_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Total energy Input").'</th>
             <th class="total1" colspan="2">'.$data['out_02']['Total_in'].'</th>
             <th class="total2">'.$data['out_02']['Total_in_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("有効熱").'</th>
             <th class="con" colspan="2">'.$data['Eeffect'].'</th>
             <th class="con">'.$data['out_02']['Eeffect_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ジグ損失").'</th>
             <th class="con" colspan="2">'.$data['El_jig_t'].'</th>
             <th class="con">'.$data['out_02']['El_jig_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化物顕熱損失").'</th>
             <th class="con" colspan="2">'.$data['Es_oxid'].'</th>
             <th class="con">'.$data['out_02']['Es_oxid_ratio'].'</th>
             </tr>';

        if (isset($data['IND1']) && $data['IND1']!=1) {
        $html1 .= '
             <tr>
             <th class="co" colspan="5"> '. __("排ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Eexhaust'].'</th>
             <th class="con">'.$data['out_02']['Eexhaust_ratio'].'</th>
             </tr>';
        }else{
        $html1 .='
             <tr>
             <th class="co" colspan="5"> '. __("排ガス損失").'</th>
             <th class="con" colspan="2" style="text-align:center">-</th>
             <th class="con" style="text-align:center">-</th>
             </tr>';
        }

        $html1 .='
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Es_atm'].'</th>
             <th class="con">'.$data['out_02']['Es_atm_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
             <th class="con" colspan="2">'.$data['El_wall_t'].'</th>
             <th class="con">'.$data['out_02']['El_wall_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("開口部損失").'</th>
             <th class="con" colspan="2">'.$data['El_opening_t'].'</th>
             <th class="con">'.$data['out_02']['El_opening_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("部品熱伝導損失").'</th>
             <th class="con" colspan="2">'.$data['El_parts_t'].'</th>
             <th class="con">'.$data['out_02']['El_parts_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("冷却水損失").'</th>
             <th class="con" colspan="2">'.$data['El_cw_t'].'</th>
             <th class="con">'.$data['out_02']['El_cw_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("放炎損失").'</th>
             <th class="con" colspan="2">'.$data['El_blowout_t'].'</th>
             <th class="con">'.$data['out_02']['El_blowout_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_storage_t'].'</th>
             <th class="con">'.$data['out_02']['El_storage_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_ot_t'].'</th>
             <th class="con">'.$data['out_02']['El_ot_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他損失（残余項）").'</th>
             <th class="con" colspan="2">'.$data['out_02']['El_other'].'</th>
             <th class="con">'.$data['out_02']['El_other_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ブロワー電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_blower_t'].'</th>
             <th class="con">'.$data['out_02']['Eaux_blower_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コンプレッサー電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_comp_t'].'</th>
             <th class="con">'.$data['out_02']['Eaux_comp_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ポンプ電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_pump_t'].'</th>
             <th class="con">'.$data['out_02']['Eaux_pump_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("駆動電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_power_t'].'</th>
             <th class="con">'.$data['out_02']['Eaux_power_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電力損失").'</th>
             <th class="con" colspan="2">'.$data['Eaux_ot_t'].'</th>
             <th class="con">'.$data['out_02']['Eaux_ot_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸素製造電力量").'</th>
             <th class="con" colspan="2">'.$data['Eu_oxy'].'</th>
             <th class="con">'.$data['out_02']['Eu_oxy_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス製造電気入熱").'</th>
             <th class="con" colspan="2">'.$data['Eu_atm_gen'].'</th>
             <th class="con">'.$data['out_02']['Eu_atm_gen_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス製造燃料入熱").'</th>
             <th class="con" colspan="2">'.$data['Eu_atm'].'</th>
             <th class="con">'.$data['out_02']['Eu_atm_out_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電気製造損失").'</th>
             <th class="con" colspan="2">'.$data['El_eg'].'</th>
             <th class="con">'.$data['out_02']['El_eg_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("事業所内配電損失").'</th>
             <th class="con" colspan="2">'.$data['El_el_site'].'</th>
             <th class="con">'.$data['out_02']['El_el_site_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Total energy output").'</th>
             <th class="total1" colspan="2">'.$data['out_02']['Total_out'].'</th>
             <th class="total2">'.$data['out_02']['Total_out_ratio'].'</th>
             </tr>
             </tbody></table>
             </div>';
        $pdf->writeHTML($css . $html1, true, 0, true, 0); 
        $pdf->endPage();
    }

    public function out_03(&$pdf, $css, $data){
        //page 1
        $pdf->AddPage('L', 'A4');
        $html1 = '<div class="a1"> '. __("出力表3:Electrical　balance").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        $html1 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody> 
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値（kJ/t）").'</th> 
             <th class="num">'. __("比率（%）").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料換算全電気使用量").'</th>
             <th class="con" colspan="2">'.$data['Efe_el'].'</th>
             <th class="con">'.$data['out_03']['Efe_el_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Electrical energy Input").'</th>
             <th class="total1" colspan="2">'.$data['out_03']['Total_in'].'</th>
             <th class="total2">'.$data['out_03']['Total_in_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電気加熱入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_el'].'</th>
             <th class="con">'.$data['out_03']['Eh_el_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("周波数変換損失").'</th>
             <th class="con" colspan="2">'.$data['El_fre'].'</th>
             <th class="con">'.$data['out_03']['El_fre_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コイル損失").'</th>
             <th class="con" colspan="2">'.$data['El_coil'].'</th>
             <th class="con">'.$data['out_03']['El_coil_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("トランス損失").'</th>
             <th class="con" colspan="2">'.$data['El_trans'].'</th>
             <th class="con">'.$data['out_03']['El_trans_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電極損失").'</th>
             <th class="con" colspan="2">'.$data['El_terminal'].'</th>
             <th class="con">'.$data['out_03']['El_terminal_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コイル損失").'</th>
             <th class="con" colspan="2">'.$data['El_con'].'</th>
             <th class="con">'.$data['out_03']['El_con_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("配線損失").'</th>
             <th class="con" colspan="2">'.$data['El_wir'].'</th>
             <th class="con">'.$data['out_03']['El_wir_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("制御損失").'</th>
             <th class="con" colspan="2">'.$data['El_cl'].'</th>
             <th class="con">'.$data['out_03']['El_cl_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ブロワー電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_blower_t'].'</th>
             <th class="con">'.$data['out_03']['Eaux_blower_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コンプレッサー電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_comp_t'].'</th>
             <th class="con">'.$data['out_03']['Eaux_comp_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ポンプ電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_pump_t'].'</th>
             <th class="con">'.$data['out_03']['Eaux_pump_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("駆動電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_power_t'].'</th>
             <th class="con">'.$data['out_03']['Eaux_power_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_ot_t'].'</th>
             <th class="con">'.$data['out_03']['Eaux_ot_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸素製造電力量").'</th>
             <th class="con" colspan="2">'.$data['Eu_oxy'].'</th>
             <th class="con">'.$data['out_03']['Eu_oxy_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス製造電気入熱").'</th>
             <th class="con" colspan="2">'.$data['Eu_atm_gen'].'</th>
             <th class="con">'.$data['out_03']['Eu_atm_gen_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("事業所内配電損失").'</th>
             <th class="con" colspan="2">'.$data['El_el_site'].'</th>
             <th class="con">'.$data['out_03']['El_el_site_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電気製造損失").'</th>
             <th class="con" colspan="2">'.$data['El_eg'].'</th>
             <th class="con">'.$data['out_03']['El_eg_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Electrical energy output").'</th>
             <th class="total1" colspan="2">'.$data['out_03']['Total_out'].'</th>
             <th class="total2">'.$data['out_03']['Total_out_ratio'].'</th>
             </tr>
             </table>
             </div>';
        $pdf->writeHTML($css . $html1, true, 0, true, 0);
        $pdf->endPage();
    }

    public function out_04(&$pdf, $css, $data){
        //page 1
        $pdf->SetMargins(20, 0, true);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->AddPage('L', 'A4');
        $html1 = '<div class="a1"> '. __("出力表4: Thermal energy balance（電気炉）").'</div>';
        $html1 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody> 
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値（kJ/t）").'</th>
             <th class="num">'. __("比率（%）").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電気加熱入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_el_accept'].'</th>
             <th class="con">'.$data['out_04']['Eh_el_accept_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("反応熱").'</th>
             <th class="con" colspan="2">'.$data['Ereact'].'</th>
             <th class="con">'.$data['out_04']['Ereact_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Thermal energy Input").'</th>
             <th class="total1" colspan="2">'.$data['out_04']['Total_in'].'</th>
             <th class="total2">'.$data['out_04']['Total_in_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("有効熱").'</th>
             <th class="con" colspan="2">'.$data['Eeffect'].'</th>
             <th class="con">'.$data['out_04']['Eeffect_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ジグ損失").'</th>
             <th class="con" colspan="2">'.$data['El_jig'][1].'</th>
             <th class="con">'.$data['out_04']['El_jig_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化物顕熱損失").'</th>
             <th class="con" colspan="2">'.$data['Es_oxid'].'</th>
             <th class="con">'.$data['out_04']['Es_oxid_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Es_atm'].'</th>
             <th class="con">'.$data['out_04']['Es_atm_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
             <th class="con" colspan="2">'.$data['El_wall_t'].'</th>
             <th class="con">'.$data['out_04']['El_wall_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("開口部損失").'</th>
             <th class="con" colspan="2">'.$data['El_opening_t'].'</th>
             <th class="con">'.$data['out_04']['El_opening_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("部品熱伝導損失").'</th>
             <th class="con" colspan="2">'.$data['El_parts_t'].'</th>
             <th class="con">'.$data['out_04']['El_parts_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("冷却水損失").'</th>
             <th class="con" colspan="2">'.$data['El_cw_t'].'</th>
             <th class="con">'.$data['out_04']['El_cw_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_storage_t'].'</th>
             <th class="con">'.$data['out_04']['El_storage_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_ot_t'].'</th>
             <th class="con">'.$data['out_04']['El_ot_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("周波数変換損失").'</th>
             <th class="con" colspan="2">'.$data['El_fre'].'</th>
             <th class="con">'.$data['out_04']['El_fre_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コイル損失").'</th>
             <th class="con" colspan="2">'.$data['El_coil'].'</th>
             <th class="con">'.$data['out_04']['El_coil_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("トランス損失").'</th>
             <th class="con" colspan="2">'.$data['El_trans'].'</th>
             <th class="con">'.$data['out_04']['El_trans_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電極損失").'</th>
             <th class="con" colspan="2">'.$data['El_terminal'].'</th>
             <th class="con">'.$data['out_04']['El_terminal_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コイル損失").'</th>
             <th class="con" colspan="2">'.$data['El_con'].'</th>
             <th class="con">'.$data['out_04']['El_con_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("配線損失").'</th>
             <th class="con" colspan="2">'.$data['El_wir'].'</th>
             <th class="con">'.$data['out_04']['El_wir_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("制御損失").'</th>
             <th class="con" colspan="2">'.$data['El_cl'].'</th>
             <th class="con">'.$data['out_04']['El_cl_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他損失（残余項）").'</th>
             <th class="con" colspan="2">'.$data['out_04']['El_other'].'</th>
             <th class="con">'.$data['out_04']['El_other_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Thermal energy output").'</th>
             <th class="total1" colspan="2">'.$data['out_04']['Total_out'].'</th>
             <th class="total2">'.$data['out_04']['Total_out_ratio'].'</th>
             </tr>
             </table>
             </div>';
        $pdf->writeHTML($css . $html1, true, 0, true, 0); 

    }

    public function out_05(&$pdf, $css, $data){
        //page 1
        $pdf->AddPage('L', 'A4');
        $html1 = '<div class="a1"> '. __("出力表5: Thermal energy balance with　heat　excanger（Combustion　furnace）").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        $html1 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody> 
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値（kJ/t）").'</th> 
             <th class="num">'. __("比率(%)").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_fuel'].'</th>
             <th class="con">'.$data['out_05']['Eh_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("付着物入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_waste'].'</th>
             <th class="con">'.$data['out_05']['Eh_waste_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_fuel'].'</th>
             <th class="con">'.$data['out_05']['Es_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("空気入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_air'].'</th>
             <th class="con">'.$data['out_05']['Es_air_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蒸気霧化材顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_atmize'].'</th>
             <th class="con">'.$data['out_05']['Es_atmize_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("反応熱").'</th>
             <th class="con" colspan="2">'.$data['Ereact'].'</th>
             <th class="con">'.$data['out_05']['Ereact_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("侵入空気顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_infilt'].'</th>
             <th class="con">'.$data['out_05']['Es_infilt_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Thermal energy input").'</th>
             <th class="total1" colspan="2">'.$data['out_05']['Total_in'].'</th>
             <th class="total2">'.$data['out_05']['Total_in_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("有効熱").'</th>
             <th class="con" colspan="2">'.$data['Eeffect'].'</th>
             <th class="con">'.$data['out_05']['Eeffect_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ジグ損失").'</th>
             <th class="con" colspan="2">'.$data['El_jig_t'].'</th>
             <th class="con">'.$data['out_05']['El_jig_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化物顕熱損失").'</th>
             <th class="con" colspan="2">'.$data['Es_oxid'].'</th>
             <th class="con">'.$data['out_05']['Es_oxid_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("排ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Eexhaust'].'</th>
             <th class="con">'.$data['out_05']['Eexhaust_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Es_atm'].'</th>
             <th class="con">'.$data['out_05']['Es_atm_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
             <th class="con" colspan="2">'.$data['El_wall_t'].'</th>
             <th class="con">'.$data['out_05']['El_wall_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("開口部損失").'</th>
             <th class="con" colspan="2">'.$data['El_opening_t'].'</th>
             <th class="con">'.$data['out_05']['El_opening_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("部品熱伝導損失").'</th>
             <th class="con" colspan="2">'.$data['El_parts_t'].'</th>
             <th class="con">'.$data['out_05']['El_parts_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("冷却水損失").'</th>
             <th class="con" colspan="2">'.$data['El_cw_t'].'</th>
             <th class="con">'.$data['out_05']['El_cw_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("放炎損失").'</th>
             <th class="con" colspan="2">'.$data['El_blowout_t'].'</th>
             <th class="con">'.$data['out_05']['El_blowout_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_storage_t'].'</th>
             <th class="con">'.$data['out_05']['El_storage_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_ot_t'].'</th>
             <th class="con">'.$data['out_05']['El_ot_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他損失").'</th>
             <th class="con" colspan="2">'.$data['out_05']['El_other'].'</th>
             <th class="con">'.$data['out_05']['El_other_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Thermal energy output").'</th>
             <th class="total1" colspan="2">'.$data['out_05']['Total_out'].'</th>
             <th class="total2">'.$data['out_05']['Total_out_ratio'].'</th>
             </tr>
             </table>
             </div>';
        $pdf->writeHTML($css . $html1, true, 0, true, 0); 

    }

    public function out_06(&$pdf, $css, $data){

        //page 1
        $pdf->SetMargins(20, 0, true);
        $pdf->SetAutoPageBreak(TRUE, 5);
        $pdf->AddPage('L', 'A4');
        $html1 = '<div class="a1"> '. __("出力表6: Thermal energy balance without heat excanger（ハイブリッド）").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        $html1 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody> 
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値（kJ/t）").'</th>
             <th class="num">'. __("比率(%)").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_fuel'].'</th>
             <th class="con">'.$data['out_06']['Eh_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電気加熱入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_el_accept'].'</th>
             <th class="con">'.$data['out_06']['Eh_el_accept_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("付着物入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_waste'].'</th>
             <th class="con">'.$data['out_06']['Eh_waste_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_fuel'].'</th>
             <th class="con">'.$data['out_06']['Es_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("空気入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_air'].'</th>
             <th class="con">'.$data['out_06']['Es_air_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("回収熱").'</th>
             <th class="con" colspan="2">'.$data['Erecovery'].'</th>
             <th class="con">'.$data['out_06']['Erecovery_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蒸気霧化材顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_atmize'].'</th>
             <th class="con">'.$data['out_06']['Es_atmize_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("反応熱").'</th>
             <th class="con" colspan="2">'.$data['Ereact'].'</th>
             <th class="con">'.$data['out_06']['Ereact_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("侵入空気顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_infilt'].'</th>
             <th class="con">'.$data['out_06']['Es_infilt_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Thermal energy input").'</th>
             <th class="total1" colspan="2">'.$data['out_06']['Total_in'].'</th>
             <th class="total2">'.$data['out_06']['Total_in_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("有効熱").'</th>
             <th class="con" colspan="2">'.$data['Eeffect'].'</th>
             <th class="con">'.$data['out_06']['Eeffect_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ジグ損失").'</th>
             <th class="con" colspan="2">'.$data['El_jig_t'].'</th>
             <th class="con">'.$data['out_06']['El_jig_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化物顕熱損失").'</th>
             <th class="con" colspan="2">'.$data['Es_oxid'].'</th>
             <th class="con">'.$data['out_06']['Es_oxid_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("排ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Eexhaust_hc'].'</th>
             <th class="con">'.$data['out_06']['Eexhaust_hc_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Es_atm'].'</th>
             <th class="con">'.$data['out_06']['Es_atm_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
             <th class="con" colspan="2">'.$data['El_wall_t'].'</th>
             <th class="con">'.$data['out_06']['El_wall_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("開口部損失").'</th>
             <th class="con" colspan="2">'.$data['El_opening_t'].'</th>
             <th class="con">'.$data['out_06']['El_opening_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("部品熱伝導損失").'</th>
             <th class="con" colspan="2">'.$data['El_parts_t'].'</th>
             <th class="con">'.$data['out_06']['El_parts_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("冷却水損失").'</th>
             <th class="con" colspan="2">'.$data['El_cw_t'].'</th>
             <th class="con">'.$data['out_06']['El_cw_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("放炎損失").'</th>
             <th class="con" colspan="2">'.$data['El_blowout_t'].'</th>
             <th class="con">'.$data['out_06']['El_blowout_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_storage_t'].'</th>
             <th class="con">'.$data['out_06']['El_storage_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_ot_t'].'</th>
             <th class="con">'.$data['out_06']['El_ot_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("周波数変換損失").'</th>
             <th class="con" colspan="2">'.$data['El_fre'].'</th>
             <th class="con">'.$data['out_06']['El_fre_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コイル損失").'</th>
             <th class="con" colspan="2">'.$data['El_coil'].'</th>
             <th class="con">'.$data['out_06']['El_coil_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("トランス損失").'</th>
             <th class="con" colspan="2">'.$data['El_trans'].'</th>
             <th class="con">'.$data['out_06']['El_trans_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電極損失").'</th>
             <th class="con" colspan="2">'.$data['El_terminal'].'</th>
             <th class="con">'.$data['out_06']['El_terminal_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コイル損失").'</th>
             <th class="con" colspan="2">'.$data['El_con'].'</th>
             <th class="con">'.$data['out_06']['El_con_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("配線損失").'</th>
             <th class="con" colspan="2">'.$data['El_wir'].'</th>
             <th class="con">'.$data['out_06']['El_wir_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("制御損失").'</th>
             <th class="con" colspan="2">'.$data['El_cl'].'</th>
             <th class="con">'.$data['out_06']['El_cl_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他損失").'</th>
             <th class="con" colspan="2">'.$data['out_06']['El_other'].'</th>
             <th class="con">'.$data['out_06']['El_other_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Thermal energy output").'</th>
             <th class="total1" colspan="2">'.$data['out_06']['Total_out'].'</th>
             <th class="total2">'.$data['out_06']['Total_out_ratio'].'</th>
             </tr>
             </table>
             </div>';
        $pdf->writeHTML($css . $html1, true, 0, true, 0); 
    }

    public function out_07(&$pdf, $css, $data){

        //page 1
        $pdf->SetMargins(20, 0, true);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->AddPage('L', 'A4');
        $html1 = '<div class="a1"> '. __("出力表7: Thermal energy balance without heat excanger（Combustion　furnace）").'</div>';
        // $pdf->Cell(0, 0, '', 0, 1, 'C');
        $html1 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody> 
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値").'</th>
             <th class="num">'. __("単位").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_fuel'].'</th>
             <th class="con">'.$data['out_07']['Eh_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("付着物入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_waste'].'</th>
             <th class="con">'.$data['out_07']['Eh_waste_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_fuel'].'</th>
             <th class="con">'.$data['out_07']['Es_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("空気入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_air'].'</th>
             <th class="con">'.$data['out_07']['Es_air_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("回収熱").'</th>
             <th class="con" colspan="2">'.$data['Erecovery'].'</th>
             <th class="con">'.$data['out_07']['Erecovery_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蒸気霧化材顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_atmize'].'</th>
             <th class="con">'.$data['out_07']['Es_atmize_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("反応熱").'</th>
             <th class="con" colspan="2">'.$data['Ereact'].'</th>
             <th class="con">'.$data['out_07']['Ereact_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("侵入空気顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_infilt'].'</th>
             <th class="con">'.$data['out_07']['Es_infilt_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Thermal energy input").'</th>
             <th class="total1" colspan="2">'.$data['out_07']['Total_in'].'</th>
             <th class="total2">'.$data['out_07']['Total_in_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("有効熱").'</th>
             <th class="con" colspan="2">'.$data['Eeffect'].'</th>
             <th class="con">'.$data['out_07']['Eeffect_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ジグ損失").'</th>
             <th class="con" colspan="2">'.$data['El_jig_t'].'</th>
             <th class="con">'.$data['out_07']['El_jig_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化物顕熱損失").'</th>
             <th class="con" colspan="2">'.$data['Es_oxid'].'</th>
             <th class="con">'.$data['out_07']['Es_oxid_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("排ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Eexhaust_hc'].'</th>
             <th class="con">'.$data['out_07']['Eexhaust_hc_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Es_atm'].'</th>
             <th class="con">'.$data['out_07']['Es_atm_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
             <th class="con" colspan="2">'.$data['El_wall_t'].'</th>
             <th class="con">'.$data['out_07']['El_wall_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("開口部損失").'</th>
             <th class="con" colspan="2">'.$data['El_opening_t'].'</th>
             <th class="con">'.$data['out_07']['El_opening_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("部品熱伝導損失").'</th>
             <th class="con" colspan="2">'.$data['El_parts_t'].'</th>
             <th class="con">'.$data['out_07']['El_parts_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("冷却水損失").'</th>
             <th class="con" colspan="2">'.$data['El_cw_t'].'</th>
             <th class="con">'.$data['out_07']['El_cw_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("放炎損失").'</th>
             <th class="con" colspan="2">'.$data['El_blowout_t'].'</th>
             <th class="con">'.$data['out_07']['El_blowout_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_storage_t'].'</th>
             <th class="con">'.$data['out_07']['El_storage_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_ot_t'].'</th>
             <th class="con">'.$data['out_07']['El_ot_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他損失").'</th>
             <th class="con" colspan="2">'.$data['out_07']['El_other'].'</th>
             <th class="con">'.$data['out_07']['El_other_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("Thermal energy output").'</th>
             <th class="total1" colspan="2">'.$data['out_07']['Total_out'].'</th>
             <th class="total2">'.$data['out_07']['Total_out_ratio'].'</th>
             </tr>
             </table>
             </div>';
        $pdf->writeHTML($css . $html1, true, 0, true, 0); 
    }

    public function out_08(&$pdf, $css, $outSankeyImage){
        // $sandkeyimage: link to file sandkey image
        // page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4');
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);

    }

    public function out_09(&$pdf, $css, $outSankeyImage){

        //page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4');
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);
    }

    public function out_10(&$pdf, $css, $outSankeyImage){

        //page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4');
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);
    }

    public function out_11(&$pdf, $css, $outSankeyImage){

        //page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4');
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);
    }

    public function out_12(&$pdf, $css, $outSankeyImage){

        //page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4');
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);
    }

    public function out_13(&$pdf, $css, $outSankeyImage){

        //page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4');
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);
    }

    public function out_14(&$pdf, $css, $outSankeyImage){

        //page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4');
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);
    }

    public function out_15(&$pdf, $css, $outSankeyImage){

        //page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4'); 
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);
    }

    public function out_16(&$pdf, $css, $outSankeyImage){

        //page pictủre
        $pdf->SetMargins(20, 5, true);
        $pdf->AddPage('L', 'A4'); 
        $html = '<div class="a1"> '. __(" サンキー図").'</div>';
        $pdf->Image($outSankeyImage,
            $x = 40,
            $y = 15,
            $w = 214,
            $h = 180,
            $type = 'JPG',
            $link = '',
            $align = '',
            $resize = true,
            $dpi = 600,
            $palign = '',
            $ismask = false,
            $imgmask = false,
            $border = 0,
            $fitbox = false,
            $hidden = false,
            $fitonpage = true,
            $alt = false,
            $altimgs = array() 
           );
        // $html .= '<img src="'.$outSankeyImage.'" width="" height="500px" text-align="center" />';
        $pdf->writeHTML($css . $html, true, 0, true, 0);
    }



///innovation


    public function out_b01(&$pdf, $css, $data){

        //page 1
        $pdf->AddPage('L', 'A4');

        $html1 = '<div class="a">'.__("省エネルギー対策処理(燃焼炉) 結果").'</div>
                  <div class="a1">'.__(" 出力表 1 代表的入力条件の表示出力").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        //html content  
        $html1 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値").'</th>
             <th class="num">'. __("単位").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉の種類").'</th>
             <th class="con" colspan="2" style="text-align:center">'.$data['out_b01']['ROSYU'].'</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉名").'</th>
             <th class="con" colspan="2" style="text-align:center">'.$data['TPE_name'].'</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("型式").'</th>
             <th class="con" colspan="2" style="text-align:center">'.$data['Type'].'</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("加熱量").'</th>
             <th class="con" colspan="2">'.$data['TPH'].'</th>
             <th class="con" style="text-align:center">t/h</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("被熱物入口温度").'</th>
             <th class="con" colspan="2">'.$data['Tp1'].'</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("被熱物出口温度").'</th>
             <th class="con" colspan="2">'.$data['Tp2'].'</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化減量").'</th>
             <th class="con" colspan="2">'.$data['Mloss'].'</th>
             <th class="con" style="text-align:center">Kg/t</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料名称").'</th>
             <th class="con" colspan="2">'.$data['Fuel_name'].'</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("発熱量").'</th>
             <th class="con" colspan="2">'.$data['Hl'].'</th>
             <th class="con" style="text-align:center">kJ/M3</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料流量").'</th>
             <th class="con" colspan="2">'.$data['Vf'].'</th>
             <th class="con" style="text-align:center">m3/t</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("空気流量").'</th>
             <th class="con" colspan="2">'.$data['Vme'].'</th>
             <th class="con" style="text-align:center">m3/t</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("リジェネの有無").'</th>
             <th class="con" colspan="2">'.$data['out_b01']['regene'].'</th>
             <th class="con"></th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉入口空気温度").'</th>
             <th class="con" colspan="2">'.$data['Ta2'].'</th>
             <th class="con" style="text-align:center">℃</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("排ガス温度").'</th>
             <th class="con" colspan="2">'.$data['Te'].'</th>
             <th class="con" style="text-align:center">％</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("排ガス酸素濃度").'</th>
             <th class="con" colspan="2">'.$data['Fg_O2'].'</th>
             <th class="con" style="text-align:center">％</th>
             </tr>
             </tbody></table>';
        $html1 .= '</div>';
        $pdf->writeHTML($css . $html1, true, 0, true, 0);
        //page 2
        $pdf->SetMargins(20, 0, true);
        $pdf->AddPage('L', 'A4');
        $html2 = '<div class="a1"> '. __("出力表5: Thermal energy balance with　heat　excanger（Combustion　furnace）").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        $html2 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値").'</th>
             <th class="num">'. __("単位").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_fuel'].'</th>
             <th class="con">'.$data['out_b01']['Eh_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("付着物入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_waste'].'</th>
             <th class="con">'.$data['out_b01']['Eh_waste_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("燃料入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_fuel'].'</th>
             <th class="con">'.$data['out_b01']['Es_fuel_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("空気入口顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_air'].'</th>
             <th class="con">'.$data['out_b01']['Es_air_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蒸気霧化材顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_atmize'].'</th>
             <th class="con">'.$data['out_b01']['Es_atmize_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("反応熱").'</th>
             <th class="con" colspan="2">'.$data['Ereact'].'</th>
             <th class="con">'.$data['out_b01']['Ereact_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("侵入空気顕熱").'</th>
             <th class="con" colspan="2">'.$data['Es_infilt'].'</th>
             <th class="con">'.$data['out_b01']['Es_infilt_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"></th>
             <th class="total1" colspan="2">'.$data['out_b01']['Total_in'].'</th>
             <th class="total2">'.$data['out_b01']['Total_in_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("有効熱").'</th>
             <th class="con" colspan="2">'.$data['Eeffect'].'</th>
             <th class="con">'.$data['out_b01']['Eeffect_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ジグ損失").'</th>
             <th class="con" colspan="2">'.$data['El_jig_t'].'</th>
             <th class="con">'.$data['out_b01']['El_jig_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化物顕熱損失").'</th>
             <th class="con" colspan="2">'.$data['Es_oxid'].'</th>
             <th class="con">'.$data['out_b01']['Es_oxid_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("排ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Eexhaust'].'</th>
             <th class="con">'.$data['out_b01']['Eexhaust_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Es_atm'].'</th>
             <th class="con">'.$data['out_b01']['Es_atm_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
             <th class="con" colspan="2">'.$data['El_wall_t'].'</th>
             <th class="con">'.$data['out_b01']['El_wall_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("開口部損失").'</th>
             <th class="con" colspan="2">'.$data['El_opening_t'].'</th>
             <th class="con">'.$data['out_b01']['El_opening_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("部品熱伝導損失").'</th>
             <th class="con" colspan="2">'.$data['El_parts_t'].'</th>
             <th class="con">'.$data['out_b01']['El_parts_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("冷却水損失").'</th>
             <th class="con" colspan="2">'.$data['El_cw_t'].'</th>
             <th class="con">'.$data['out_b01']['El_cw_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("放炎損失").'</th>
             <th class="con" colspan="2">'.$data['El_blowout_t'].'</th>
             <th class="con">'.$data['out_b01']['El_blowout_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_storage_t'].'</th>
             <th class="con">'.$data['out_b01']['El_storage_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他損失").'</th>
             <th class="con" colspan="2">'.$data['out_b01']['El_other'].'</th>
             <th class="con">'.$data['out_b01']['El_other_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"></th>
             <th class="total1" colspan="2">'.$data['out_b01']['Total_out'].'</th>
             <th class="total2">'.$data['out_b01']['Total_out_ratio'].'</th>
             </tr>
             </table>
             </div>'
             ;
        $pdf->writeHTML($css . $html2, true, 0, true, 0); 
        //page 3
        if(isset($data['page_b03']) || isset($data['page_b04']) || isset($data['page_b05'])){
            $pdf->SetMargins(20, 10, true);
            $pdf->AddPage('L', 'A4');
            $html3 = '';
            if(isset($data['page_b03'])){
                $html3 .= '<div class="a1"> '. __("排熱回収率改善（画面２で選ばれた時表示）").'<table></table></div>';
                $pdf->Cell(0, 0, '', 0, 1, 'C');
                $html3 .= '<div>'
                     . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     <th class="num">'. __("単位").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("改善後の排熱回収率").'</th>
                     <th class="con" colspan="2">'.$data['ETA_R1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b03']['ETA_R2'].'</th>
                     <th class="con" style="text-align:center">KJ/t</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("予熱温度").'</th>
                     <th class="con" colspan="2">'.$data['Ta2'].'</th>
                     <th class="con" colspan="2">'.$data['page_b03']['Ta3'].'</th>
                     <th class="con" style="text-align:center">KJ/t</th>
                     </tr>
                     </table>
                     </div>';
            }
            
            if(isset($data['page_b04'])){
                $html3 .= '<div class="a1"> '. __("炉体損失熱改善（画面２で選ばれた時表示）").'<table></table></div>
                     <div>'
                    . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     <th class="num">'. __("単位").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
                     <th class="con" colspan="2">'.$data['El_wall1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b04']['El_wall2'].'</th>
                     <th class="con" style="text-align:center">KJ/t</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("開口部損失").'</th>
                     <th class="con" colspan="2">'.$data['El_opening1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b04']['El_opening2'].'</th>
                     <th class="con" style="text-align:center">KJ/t</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("冷却損失").'</th>
                     <th class="con" colspan="2">'.$data['El_cw1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b04']['El_cw2'].'</th>
                     <th class="con" style="text-align:center">KJ/t</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
                     <th class="con" colspan="2">'.$data['El_storage1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b04']['El_storage2'].'</th>
                     <th class="con" style="text-align:center">KJ/t</th>
                     </tr>
                     </table>
                     </div>';
            }
                
            if(isset($data['page_b05'])){
                $html3 .= '<div class="a1"> '. __("ジグ・トレー改善").'<table></table></div>
                     <div>'
                     . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     <th class="num">'. __("単位").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("ジグ重量").'</th>
                     <th class="con" colspan="2">'.$data['Mj'][3].'</th>
                     <th class="con" colspan="2">'.$data['page_b05']['Mj2'].'</th>
                     <th class="con" style="text-align:center">kg/t</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("ジグ入口温度").'</th>
                     <th class="con" colspan="2">'.$data['Tj11'][3].'</th>
                     <th class="con" colspan="2">'.$data['page_b05']['Tj12'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("ジグ出口温度").'</th>
                     <th class="con" colspan="2">'.$data['Tj21'][3].'</th>
                     <th class="con" colspan="2">'.$data['page_b05']['Tj22'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     </table>
                 </div>';
            }
                 
            $pdf->writeHTML($css . $html3, true, 0, true, 0); 
        }
        

        // page 4
        if(isset($data['page_b06']) || isset($data['page_b07'])){
            $pdf->AddPage('L', 'A4');
            $html4 = '';
            if(isset($data['page_b06'])){
                $html4 .= '<div class="a1"> '. __("材料予熱改善").'</div>';
                $pdf->Cell(0, 0, '', 0, 1, 'C');
                $html4 .= '<div>'
                     . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     <th class="num">'. __("単位").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("入口温度").'</th>
                     <th class="con" colspan="2">'.$data['Tp1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b06']['Tp12'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("出口温度").'</th>
                     <th class="con" colspan="2">'.$data['Tp2'].'</th>
                     <th class="con" colspan="2">'.$data['page_b06']['Tp22'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("材料必要熱量").'</th>
                     <th class="con" colspan="2">'.$data['Eeffect1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b06']['Eeffect2'].'</th>
                     <th class="con" style="text-align:center">KJ/t</th>
                     </tr>
                     </table>
                     </div>';
            }
            
            if(isset($data['page_b07'])){
                $html4 .= '<div class="a1"> '. __("空気比改善").'<table></table></div>
                     <div>'
                    . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     <th class="num">'. __("単位").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("排ガス酸素濃度").'</th>
                     <th class="con" colspan="2">'.$data['Fg_O2d1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b07']['Fg_O2d2'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("空気比").'</th>
                     <th class="con" colspan="2">'.$data['Mhyp1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b07']['Mhyp2'].'</th>
                     <th class="con" style="text-align:center">（－）</th>
                     </tr>
                     </table>
                     </div>';
            }
                
            $pdf->writeHTML($css . $html4, true, 0, true, 0); 
        }
        
        //page 5
        $pdf->AddPage('L', 'A4');
        $html5 = '<div class="a1"> '. __("改善検討まとめ").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        //html content  
        $html5 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <th class="num" colspan="3">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("現状").'</th>
             <th class="num" colspan="2">'. __("改善").'</th>
             <th class="num">'. __("単位").'</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("排熱回収率の改善検討").'</th>
             <th class="con" colspan="2">'.$data['out_b01']['ETA1_b03'].'%</th>
             <th class="con" colspan="2">'.$data['out_b01']['ETA2_b03'].'%</th>
             <th class="con">'.$data['out_b01']['Save_energy_ratio_b03'].'%</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("炉体損失熱の改善検討").'</th>
             <th class="con" colspan="2">'.$data['out_b01']['Eh_fuel_b04'].'kJ/t</th>
             <th class="con" colspan="2">'.$data['out_b01']['Eh_fuel2_b04'].'kJ/t</th>
             <th class="con">'.$data['out_b01']['Save_energy_ratio_b04'].'%</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("ジグ、トレー必要熱の改善").'</th>
             <th class="con" colspan="2">'.$data['out_b01']['EF1_b05'].'kJ/t</th>
             <th class="con" colspan="2">'.$data['out_b01']['EF2_b05'].'kJ/t</th>
             <th class="con">'.$data['out_b01']['Save_energy_ratio_b05'].'%</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("材料予熱効果の検討").'</th>
             <th class="con" colspan="2">'.$data['out_b01']['Eh_fuel_b06'].'kJ/t</th>
             <th class="con" colspan="2">'.$data['out_b01']['Eh_fuel2_b06'].'kJ/t</th>
             <th class="con">'.$data['out_b01']['Save_energy_ratio_b06'].'%</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("空気比の改善検討実行").'</th>
             <th class="con" colspan="2">'.$data['out_b01']['ETA1_b07'].'</th>
             <th class="con" colspan="2">'.$data['out_b01']['ETA2_b07'].'</th>
             <th class="con">'.$data['out_b01']['Save_energy_ratio_b07'].'%</th>
             </tr>
             </tbody></table>';
             $html5 .= '</div>';
        $pdf->writeHTML($css . $html5, true, 0, true, 0); 
    }

    public function out_b02(&$pdf, $css, $data){

        //page 1
        $pdf->SetMargins(20, 0, true);
        $pdf->AddPage('L', 'A4');
        $html1 = '<div class="a1"> '. __("出力表4: Thermal energy balance（電気炉）").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        $html1 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <th class="num" colspan="5">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("出力値").'</th>
             <th class="num">'. __("単位").'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電気加熱入熱").'</th>
             <th class="con" colspan="2">'.$data['Eh_el_accept'].'</th>
             <th class="con">'.$data['out_b02']['Eh_el_accept_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("反応熱").'</th>
             <th class="con" colspan="2">'.$data['Ereact'].'</th>
             <th class="con">'.$data['out_b02']['Ereact_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"></th>
             <th class="total1" colspan="2">'.$data['out_b02']['Total_in'].'</th>
             <th class="total2">'.$data['out_b02']['Total_in_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("有効熱").'</th>
             <th class="con" colspan="2">'.$data['Eeffect'].'</th>
             <th class="con">'.$data['out_b02']['Eeffect_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("ジグ損失").'</th>
             <th class="con" colspan="2">'.$data['El_jig'][1].'</th>
             <th class="con">'.$data['out_b02']['El_jig_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("酸化物顕熱損失").'</th>
             <th class="con" colspan="2">'.$data['Es_oxid'].'</th>
             <th class="con">'.$data['out_b02']['Es_oxid_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("雰囲気ガス損失").'</th>
             <th class="con" colspan="2">'.$data['Es_atm'].'</th>
             <th class="con">'.$data['out_b02']['Es_atm_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
             <th class="con" colspan="2">'.$data['El_wall_t'].'</th>
             <th class="con">'.$data['out_b02']['El_wall_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("開口部損失").'</th>
             <th class="con" colspan="2">'.$data['El_opening_t'].'</th>
             <th class="con">'.$data['out_b02']['El_opening_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("部品熱伝導損失").'</th>
             <th class="con" colspan="2">'.$data['El_parts_t'].'</th>
             <th class="con">'.$data['out_b02']['El_parts_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("冷却水損失").'</th>
             <th class="con" colspan="2">'.$data['El_cw_t'].'</th>
             <th class="con">'.$data['out_b02']['El_cw_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("放炎損失").'</th>
             <th class="con" colspan="2">'.$data['El_blowout_t'].'</th>
             <th class="con">'.$data['out_b02']['El_blowout_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
             <th class="con" colspan="2">'.$data['El_storage_t'].'</th>
             <th class="con">'.$data['out_b02']['El_storage_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("その他損失").'</th>
             <th class="con" colspan="2">'.$data['out_b02']['El_other'].'</th>
             <th class="con">'.$data['out_b02']['El_other_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("駆動電力").'</th>
             <th class="con" colspan="2">'.$data['Eaux_power_t'].'</th>
             <th class="con">'.$data['out_b02']['Eaux_power_t_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("周波数変換損失").'</th>
             <th class="con" colspan="2">'.$data['El_fre'].'</th>
             <th class="con">'.$data['out_b02']['El_fre_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コイル損失").'</th>
             <th class="con" colspan="2">'.$data['El_coil'].'</th>
             <th class="con">'.$data['out_b02']['El_coil_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("トランス損失").'</th>
             <th class="con" colspan="2">'.$data['El_trans'].'</th>
             <th class="con">'.$data['out_b02']['El_trans_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("電極損失").'</th>
             <th class="con" colspan="2">'.$data['El_terminal'].'</th>
             <th class="con">'.$data['out_b02']['El_terminal_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("コイル損失").'</th>
             <th class="con" colspan="2">'.$data['El_con'].'</th>
             <th class="con">'.$data['out_b02']['El_con_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("配線損失").'</th>
             <th class="con" colspan="2">'.$data['El_wir'].'</th>
             <th class="con">'.$data['out_b02']['El_wir_ratio'].'</th>
             </tr>
             <tr>
             <th class="co" colspan="5"> '. __("制御損失").'</th>
             <th class="con" colspan="2">'.$data['El_cl'].'</th>
             <th class="con">'.$data['out_b02']['El_cl_ratio'].'</th>
             </tr>
             <tr>
             <th class="total0" colspan="5"> '. __("").'</th>
             <th class="total1" colspan="2">'.$data['out_b02']['Total_out'].'</th>
             <th class="total2">'.$data['out_b02']['Total_out_ratio'].'</th>
             </tr>
             </table>
             </div>'
             ;
        $pdf->writeHTML($css . $html1, true, 0, true, 0); 


        //page 2
        if(isset($data['page_b15']) || isset($data['page_b12']) || isset($data['page_b13']) || 
           isset($data['page_b14'])){
            $pdf->SetMargins(20, 10, true);
            $pdf->AddPage('L', 'A4');
            $html2 = '';
            if(isset($data['page_b15'])){
                $html2 .= '<div class="a1"> '. __("電気損失（画面１１で選ばれた場合表示）").'</div>';
                $pdf->Cell(0, 0, '', 0, 1, 'C');
                $html2 .= '<div>'
                     . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("周波数変換損失").'</th>
                     <th class="con" colspan="2">'.$data['El_fre'].'</th>
                     <th class="con" colspan="2">'.$data['page_b15']['El_fre2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("コイル損失").'</th>
                     <th class="con" colspan="2">'.$data['El_coil'].'</th>
                     <th class="con" colspan="2">'.$data['page_b15']['El_coil2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("トランス損失").'</th>
                     <th class="con" colspan="2">'.$data['El_trans'].'</th>
                     <th class="con" colspan="2">'.$data['page_b15']['El_trans2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("電極損失").'</th>
                     <th class="con" colspan="2">'.$data['El_terminal'].'</th>
                     <th class="con" colspan="2">'.$data['page_b15']['El_terminal2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("コンデンサー損失").'</th>
                     <th class="con" colspan="2">'.$data['El_con'].'</th>
                     <th class="con" colspan="2">'.$data['page_b15']['El_con2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("配線損失").'</th>
                     <th class="con" colspan="2">'.$data['El_wir'].'</th>
                     <th class="con" colspan="2">'.$data['page_b15']['El_wir2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("制御損失").'</th>
                     <th class="con" colspan="2">'.$data['El_cl'].'</th>
                     <th class="con" colspan="2">'.$data['page_b15']['El_cl2'].'</th>
                     </tr>
                     </table>
                     </div>';
            }
            
            if(isset($data['page_b12'])){
                $html2 .= '<div class="a1"> '. __("炉体損失改善（画面１１で選ばれた場合表示）").'<table></table></div>
                     <div>'
                    . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("炉体放散損失").'</th>
                     <th class="con" colspan="2">'.$data['El_wall1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b12']['El_wall2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("開口部損失").'</th>
                     <th class="con" colspan="2">'.$data['El_opening1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b12']['El_opening2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("冷却損失").'</th>
                     <th class="con" colspan="2">'.$data['El_cw1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b12']['El_cw2'].'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("蓄熱損失").'</th>
                     <th class="con" colspan="2">'.$data['El_storage1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b12']['El_storage2'].'</th>
                     </tr>
                     </table>
                     </div>';
            }
                
            if(isset($data['page_b13'])){
                $html2 .= '<div class="a1"> '. __("炉体損失改善（画面１１で選ばれた場合表示）").'<table></table></div>
                     <div>'
                     . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     <th class="num">'. __("単位").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("ジグ材料名称").'</th>
                     <th class="con" colspan="2"></th>
                     <th class="con" colspan="2"></th>
                     <th class="con"></th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("ジグ重量").'</th>
                     <th class="con" colspan="2">'.$data['Mj'][3].'</th>
                     <th class="con" colspan="2">'.$data['page_b13']['Mj2'].'</th>
                     <th class="con" style="text-align:center">kg/t</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("ジグ入口温度").'</th>
                     <th class="con" colspan="2">'.$data['Tj11'][3].'</th>
                     <th class="con" colspan="2">'.$data['page_b13']['Tj12'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("ジグ出口温度").'</th>
                     <th class="con" colspan="2">'.$data['Tj21'][3].'</th>
                     <th class="con" colspan="2">'.$data['page_b13']['Tj22'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     </table>
                     </div>';
            }
                
            if(isset($data['page_b14'])){
                $html2 .= '<div class="a1"> '. __("材料予熱改善（画面１１で選ばれた場合表示）").'<table></table></div>
                     <div>'
                     . '<table  border="1" cellpadding="0" cellspacing="0">
                     <tbody>
                     <tr>
                     <th class="num" colspan="5">'. __("項目名称").'</th>
                     <th class="num" colspan="2">'. __("現状").'</th>
                     <th class="num" colspan="2">'. __("改善").'</th>
                     <th class="num">'. __("単位").'</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("入口温度").'</th>
                     <th class="con" colspan="2">'.$data['Tp1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b14']['Tp12'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("出口温度").'</th>
                     <th class="con" colspan="2">'.$data['Tp2'].'</th>
                     <th class="con" colspan="2">'.$data['page_b14']['Tp22'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("材料搬送量").'</th>
                     <th class="con" colspan="2">'.$data['Mloss'].'</th>
                     <th class="con" colspan="2">'.$data['page_b14']['Mloss2'].'</th>
                     <th class="con" style="text-align:center">℃</th>
                     </tr>
                     <tr>
                     <th class="co" colspan="5"> '. __("材料必要熱量").'</th>
                     <th class="con" colspan="2">'.$data['Eeffect1'].'</th>
                     <th class="con" colspan="2">'.$data['page_b14']['Eeffect2'].'</th>
                     <th class="con"></th>
                     </tr>
                     </table>
                     </div>';
            }
            $pdf->writeHTML($css . $html2, true, 0, true, 0); 
        }
        

        //page 3
        $pdf->AddPage('L', 'A4');
        $html3 = '<div class="a1"> '. __("改善検討まとめ").'</div>';
        $pdf->Cell(0, 0, '', 0, 1, 'C');
        //html content  
        $html3 .= '<div>'
             . '<table  border="1" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <th class="num" colspan="3">'. __("項目名称").'</th>
             <th class="num" colspan="2">'. __("現状値").'</th>
             <th class="num" colspan="2">'. __("改善値").'</th>
             <th class="num">'. __("省エネ率").'</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("電気損失改善検討").'</th>
             <th class="con" colspan="2">'.$data['out_b02']['EF1'].'kJ/t</th>
             <th class="con" colspan="2">'.$data['out_b02']['EF2_b12'].'kJ/t</th>
             <th class="con">'.$data['out_b02']['Save_energy_ratio_b12'].'kJ/t</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("炉体損失熱改善検討").'</th>
             <th class="con" colspan="2">'.$data['out_b02']['EF1'].'kJ/t</th>
             <th class="con" colspan="2">'.$data['out_b02']['EF2_b13'].'kJ/t</th>
             <th class="con">'.$data['out_b02']['Save_energy_ratio_b13'].'%</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("ジグ、トレー必要熱改善検討").'</th>
             <th class="con" colspan="2">'.$data['out_b02']['EF1'].'kJ/t</th>
             <th class="con" colspan="2">'.$data['out_b02']['EF2_b14'].'kJ/t</th>
             <th class="con">'.$data['out_b02']['Save_energy_ratio_b14'].'%</th>
             </tr>
             <tr>
             <th class="co" colspan="3">'. __("材料予熱効果改善検討").'</th>
             <th class="con" colspan="2">'.$data['out_b02']['EF1'].'kJ/t</th>
             <th class="con" colspan="2">'.$data['out_b02']['EF2_b15'].'kJ/t</th>
             <th class="con">'.$data['out_b02']['Save_energy_ratio_b15'].'%</th>
             </tr>
             </tbody></table>';
             $html3 .= '</div>';
        $pdf->writeHTML($css . $html3, true, 0, true, 0); 
    }
}
?>