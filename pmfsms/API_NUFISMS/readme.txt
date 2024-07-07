 //***** installation et utilisation de l'API ******/ 

                //****** chargement de la classe nufisms classe responsable d'envoi des sms ******/
                    include_once('NufiSMSAPI.php');

                //***** instanciation de la classe pour utilisation ********/
                     $sms = new NufiSMSAPI();

                //****** parametrage pour envoi *******/

                $url = 'http://nufisms.com/api/v1/';<br/>
                $var['api_key'] = "Your API KEY";<br/>
                $var['token'] = "Your TOKEN";<br/>
                $var['type_sms'] = "Type SMS (0 à 7) selon le besoin (0 => Plain text (GSM 3.38), 1=> Flash,2=> Unicode,3=> Reserved,4=> Wap Push,5=> Plain Text (ISO-8859-1),6=> Unicode Flash,7=> Flash (ISO-8859-1))";<br/>
                $var['exp_sms'] = "Numéro ou nom de l' expéditeur";<br/>
                $var['dest_sms'] = "Numéro destinataire sans le code téléphonique";<br/>
                $var['code_phone'] = "Code pays exemple (CM pour le cameroun et FR pour la france)";<br/>
                $var['sms'] = "Contenu SMS";<br/>

                //***** Envoi de sms au serveur *******/

                $res = $sms->submit($var,$url);

                //******** Retour serveur ******/
                echo json_encode($client);