<?php

            //include_once('API_NUFISMS/NufiSMSAPI.php');
			include_once('pmfsms/API_NUFISMS/NufiSMSAPI.php');
			
            function envoyersms($type, $exp, $desttel, $codetel, $contenu) 
                {
                //echo "<script language='javascript'>alert('slow')</script>";
                     $url = 'https://nufisms.com/api/v1/';
                    $var['api_key'] = "d0e22fa9efcffa049ebb3e51fe7353ee71078b66";
                    $var['token'] = "22ea75a33b214bcb2e0460cf58cdfbd5";
                    $var['type_sms'] = $type;
                    $var['exp_sms'] = $exp;
                    $var['dest_sms'] = $desttel;
                    $var['code_phone'] = $codetel;
//                    $var['code_phone'] = "CM";
                    $var['sms'] = $contenu;

                       $sms = new NufiSMSAPI();
                      
                        $res = $sms->send_sms($var,$url);
                        
                       return $res;
                }
?>