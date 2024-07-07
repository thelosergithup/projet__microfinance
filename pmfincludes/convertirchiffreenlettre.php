<?php
function convertir($Montant)
{ 
	$grade = array(0 => "zero ",1=>" milliards ",2=>" millions ",3=>" mille "); 
//    $Mon = array(0=>" Euro",1=>" Euros",2=>" Cent",3=>" Cents"); 
  
    // Mise au format pour les chéques et le SWI 
    $Montant = number_format($Montant,2,".",""); 

    if ($Montant == 0)
	{ 
//        $result = $grade[0].$Mon[0]; 
        $result = $grade[0]; 
    }else
	{ 
        $result = ""; 

        // Calcule des Unités 
        $montant = intval($Montant); 
  
        // Calcul des centimes 
        $centime = round(($Montant * 100) - ($montant * 100),0); 
  
        // Traitement pour les Milliards 
        $nombre = $montant / 1000000000; 
        $nombre = intval($nombre); 
        if ($nombre > 0)
		{ 
            if ($nombre > 1)
			{ 
                $result = $result.cenvtir($nombre).$grade[1]; 
            }else
			{ 
                $result = $result." Un ".$grade[1]; 
                $result = substr($result,0,13)." "; 
            } 
            $montant = $montant - ($nombre * 1000000000); 
        } 
  
        // Traitement pour les Millions 
        $nombre = $montant / 1000000; 
        $nombre = intval($nombre); 
        if ($nombre > 0)
		{ 
            if ($nombre > 1)
			{ 
                $result = $result.cenvtir($nombre).$grade[2]; 
            }else
			{ 
                $result = $result." Un ".$grade[2]; 
                $result = substr($result,0,12)." "; 
            } 
            $montant = $montant - ($nombre * 1000000); 
        } 
  
        // Traitement pour les Milliers 
        $nombre = $montant / 1000; 
        $nombre = intval($nombre); 
        if ($nombre > 0)
		{ 
            if ($nombre > 1)
			{ 
                $result = $result.cenvtir($nombre).$grade[3]; 
            }else
			{ 
                $result = $result.$grade[3]; 
            } 
            $montant = $montant - ($nombre * 1000); 
        } 
  
        // Traitement pour les Centaines & centimes 
        $nombre = $montant; 
        if ($nombre>0)
		{ 
            $result = $result.cenvtir($nombre); 
        } 
        // Traitement si le montant = 1 
        if ((substr($result,0,7) == " et un " and strlen($result) == 7))
		{ 
            $result = substr($result,3,3); 
            $result = $result; 
//            $result = $result.$Mon[0]; 
            if (intval($centime) != 0)
			{ 
                $differ = cenvtir(intval($centime)); 
                if (substr($differ,0,7) == " et un ")
				{ 
                    if ($result == "")
					{ 
                            $differ = substr($differ,3); 
                    } 
                    $result = $result." ".$differ; 
//                    $result = $result." ".$differ.$Mon[2]; 
                }else
				{ 
                        $result = $result." et ".$differ; 
//                        $result = $result." et ".$differ.$Mon[3]; 
                } 
            } 
        // Traitement si le montant > 1 ou = 0 
        }else
		{ 
            if ($result != "")
			{ 
                $result = $result; 
//                $result = $result.$Mon[1]; 
            } 
            if (intval($centime) != 0)
			{ 
                $differ = cenvtir(intval($centime)); 
                if (substr($differ,0,7) == " et un ")
				{ 
                    if ($result == "")
					{ 
                    	$differ = substr($differ,3); 
                    } 
                    $result = $result." ".$differ; 
//                    $result = $result." ".$differ.$Mon[2]; 
                }else
				{ 
                    if ($result != "")
					{ 
                    	$result = $result." et ".$differ; 
//                    	$result = $result." et ".$differ.$Mon[3]; 
                    }else
					{ 
                        $result = $differ; 
//                        $result = $differ.$Mon[3]; 
                    } 
                } 
            } 
        } 
    } 
    return $result; 
} 
  
// fonction de convertion d'un chiffre à 3 digits en lettre 
function cenvtir($Valeur)
{ 
  
    $code = ""; 
    //texte en clair 
	$SUnit = array(1=>"un ", 2=>"deux ", 3=>"trois ", 4=>"quatre ", 5=>"cinq ", 6=>"six ", 7=>"sept ", 8=>"huit ", 9=>"neuf ", 10=>"dix ", 11=>"onze ", 12=>"douze ", 13=>"treize ", 14=>"quatorze ", 15=>"quinze ", 16=>"seize ", 17=>"dix-sept ", 18=>"dix-huit ", 19=>"dix_neuf "); 
	$sDiz = array(20=> "vingt ", 30=> "trente ", 40=>"quarante ", 50=>"cinquante ", 60=>"soixante ", 70=>"soixante dix ", 80=>"quatre vingt ", 90=>"quatre vingt dix ");
  
    if ($Valeur>99)
	{ 
		$N1= intval($Valeur/100); 
		if ($N1>1)
		{ 
        	$code = $code.$SUnit[$N1]; 
		} 
		$Valeur = $Valeur - ($N1*100); 
        if ($code != "")
		{ 
			if ($Valeur == 0)
			{
	    		$code = $code." cents "; 
			}else
			{
	            $code = $code." cent "; 
			}
        }else
		{ 
            $code = " cent "; 
        } 
    } 
    if ($Valeur != 0)
	{ 
        if ($Valeur > 19)
		{ 
            $N1 = intval($Valeur/10)*10; 
            $code = $code.$sDiz[$N1]; 
            if ((($Valeur>=70) and($Valeur<80))or($Valeur>=90))
			{ 
                $Valeur = $Valeur + 10; 
            } 
            $Valeur = $Valeur - $N1; 
        } 
        if ($Valeur > 0)
		{ 
            $code = $code." ".$SUnit[$Valeur]; 
        } 
    } 
    return $code; 
} 

?>