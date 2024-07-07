<?php

function envoyersms($type, $exp, $desttel, $codetel, $contenu) {

//***** installation et utilisation de l'API ******/ 
    //****** chargement de la classe nufisms classe responsable d'envoi des sms ******/
    include_once('simgounsms/API_NUFISMS/NufiSMSAPI.php');

    //***** instanciation de la classe pour utilisation ********/
    $sms = new NufiSMSAPI();

    //****** parametrage pour envoi *******/

    $url = 'https://nufisms.com/api/v1/';
	//$url = 'https://nufisms.com/api/v1/sendSms';
	

    $var['api_key'] = "d0e22fa9efcffa049ebb3e51fe7353ee71078b66";

    $var['token'] = "22ea75a33b214bcb2e0460cf58cdfbd5";

//                $var['type_sms'] = "Type SMS (0 à 7) selon le besoin (0 => Plain text (GSM 3.38), 1=> Flash,2=> Unicode,3=> Reserved,4=> Wap Push,5=> Plain Text (ISO-8859-1),6=> Unicode Flash,7=> Flash (ISO-8859-1))";
    $var['type_sms'] = $type;

//                $var['exp_sms'] = "Numéro ou nom de l' expéditeur";
    $var['exp_sms'] = $exp;

//                $var['dest_sms'] = "Numéro destinataire sans le code téléphonique";
    $var['dest_sms'] = $desttel;

//                $var['code_phone'] = "Code pays exemple (CM pour le cameroun et FR pour la france)";
    $var['code_phone'] = $codetel;

//                $var['sms'] = "Contenu SMS";
    $var['sms'] = $contenu;

    //***** Envoi de sms au serveur *******/

    //$res = $sms->submit($var, $url);
    $res = $sms->send_sms($var, $url);

    //******** Retour serveur ******/
    //echo json_encode($client);
	echo json_encode($res);
    //echo $res;
            //die();
}

?>