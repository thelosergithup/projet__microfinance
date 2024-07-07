<?php

            include_once('NufiSMSAPI.php');

        
                $url = 'http://nufisms.com/api/v1/';
                $var['api_key'] = "Ma clé API KEY";
                $var['token'] = "Mon token code";
                $var['type_sms'] = "type message";
                $var['exp_sms'] = "expediteur";
                $var['dest_sms'] = "destination";
                $var['code_phone'] = "code pays ";
                $var['sms'] = "Mon message";


           $sms = new NufiSMSAPI();
          
            $res = $sms->send_sms($var,$url);
           echo $res;
            die();
       
  