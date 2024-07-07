<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// This function will return  
  // A random string of specified length 
//  function random_code($limit)
//{
//    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
//}


function sommedatemois($dateDepart, $duree) {
    //la première étape est de transformer cette date en timestamp
    $dateDepartTimestamp = strtotime($dateDepart);

//on calcule la date de fin
    $dateFin = date('Y-m-d', strtotime('+' . $duree . ' month', $dateDepartTimestamp));
//echo $dateFin;

    return $dateFin;
}

function sommedateannee($dateDepart, $duree) {
    //la première étape est de transformer cette date en timestamp
    $dateDepartTimestamp = strtotime($dateDepart);

//on calcule la date de fin
    $dateFin = date('Y-m-d', strtotime('+' . $duree . ' year', $dateDepartTimestamp));
//echo $dateFin;

    return $dateFin;
}


/**************************************************************************************/
/*
     Titre  : Calculer le temps restant ou le temps ecoulé                                                                
                                                                                                                          
     URL    :  
     http://phpsources.org/code/php/date-heure/457_calculer-le-temps-restant-ou-le-temps-ecoule
     Auteur         : IlbeeNetwork                                                                                        
     Date edition   : 09 Sept 2008                                                                                        
*/
/**************************************************************************************/
function Date_ConvertSqlTab($date_sql) {
    $jour = substr($date_sql, 8, 2);
    $mois = substr($date_sql, 5, 2);
    $annee = substr($date_sql, 0, 4);
    $heure = substr($date_sql, 11, 2);
    $minute = substr($date_sql, 14, 2);
    $seconde = substr($date_sql, 17, 2);
    
    $key = array('annee', 'mois', 'jour', 'heure', 'minute', 'seconde');
    $value = array($annee, $mois, $jour, $heure, $minute, $seconde);
    
    $tab_retour = array_combine($key, $value);
    
    return $tab_retour;
}
function AuPluriel($chiffre) {
    if($chiffre>1) {
        return 's';
    };
}
function TimeToJourJ($date_sql) {
    $tab_date = Date_ConvertSqlTab($date_sql);
    $mkt_jourj = mktime($tab_date['heure'],
                    $tab_date['minute'],
                    $tab_date['seconde'],
                    $tab_date['mois'],
                    $tab_date['jour'],
                    $tab_date['annee']);
    $mkt_now = time();
    
    $diff = $mkt_jourj - $mkt_now;
    
    $unjour = 3600 * 24;
    
    if($diff>=$unjour) {
        // EN JOUR
        $calcul = $diff / $unjour;
        return 'Il reste <strong>'.ceil($calcul).' jour'.AuPluriel($calcul).'</strong>.';
    } elseif($diff<$unjour && $diff>=0 && $diff>=3600) {
        // EN HEURE
        $calcul = $diff / 3600;
        return 'Il reste <strong>'.ceil($calcul).' heure'.AuPluriel($calcul).'</strong>.';
    } elseif($diff<$unjour && $diff>=0 && $diff<3600) {
        // EN MINUTES
        $calcul = $diff / 60;
        return 'Il reste <strong>'.ceil($calcul).' minute'.AuPluriel($calcul).'</strong>.';
    } elseif($diff<0 && abs($diff)<3600) {
        // DEPUIS EN MINUTES
        $calcul = abs($diff) / 60;
        return 'Depuis <strong>'.ceil($calcul).' minute'.AuPluriel($calcul).'</strong>.';
    } elseif($diff<0 && abs($diff)<=3600) {
        // DEPUIS EN HEURES
        $calcul = abs($diff) / 3600;
        return 'Depuis <strong>'.ceil($calcul).' heure'.AuPluriel($calcul).'</strong>.';        
    } else {
        // DEPUIS EN JOUR
        $calcul = abs($diff) / $unjour;
        return 'Depuis <strong>'.ceil($calcul).' jour'.AuPluriel($calcul).'</strong>.';
    };
}

// EXEMPLE //
// Affiche le temps passé depuis le 28 juin 2008 a 14h //
// Le jour de mon mariage //
//echo 'Temps depuis le 28 juin 2008 à 14 heures : ';
//echo TimeToJourJ('2008-06-28 14:00:00');
//echo '<br /><br />';
// EXEMPLE //
// Affiche le temps restant jusqu'au 01 janvier prochain //
//$next_jourdelan = date('Y') + 1;
//echo 'Temps restant jusqu\'au prochain jour de l\'an : ';
//echo TimeToJourJ($next_jourdelan.'-01-01 00:00:00');
?>
